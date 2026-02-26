<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MantenimientoRealizadas;
use App\Models\ArchivosMantenimientoRealizadas;
use App\Models\FotoMantenimiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MantenimientoRealizadasController extends Controller
{
    /**
     * Público - Edudata /mantenimiento
     * Lista todo 2025..año actual, ordenado (año desc => 2026 primero) y filtro SOLO por establecimiento
     */
    public function index(Request $request)
    {
        $minYear = 2025;
        $maxYear = (int) date('Y');

        // ✅ ÚNICO FILTRO PÚBLICO
        $establecimiento = trim((string) $request->input('establecimiento', ''));
        $establecimiento = $establecimiento !== '' ? $establecimiento : null;

        // ✅ Fotos carrusel
        $fotos = FotoMantenimiento::query()
            ->where('activo', 1)
            ->orderByDesc('orden')
            ->orderByDesc('id')
            ->get();

        // ✅ Query principal: solo años permitidos y filtro por establecimiento (si viene)
        $realizadasQuery = MantenimientoRealizadas::query()
            ->whereNotNull('fecha')
            ->whereYear('fecha', '>=', $minYear)
            ->whereYear('fecha', '<=', $maxYear)
            ->when($establecimiento, fn($q) => $q->where('establecimiento', 'like', "%{$establecimiento}%"))
            ->orderByRaw('YEAR(fecha) DESC')
            ->orderByDesc('fecha')
            ->orderByDesc('id');

        // Agrupar por tipo (para 3 columnas)
        $registros = $realizadasQuery->get()->groupBy('tipo_tarea');

        // Totales (según filtro actual)
        $totales = [
            'APH'  => ($registros['APH']  ?? collect())->count(),
            'ELEC' => ($registros['ELEC'] ?? collect())->count(),
            'DEZM' => ($registros['DEZM'] ?? collect())->count(),
        ];
        $totalGeneral = array_sum($totales);

        // ✅ Totales por año (2025..año actual) (respeta filtro establecimiento si viene)
        $rows = MantenimientoRealizadas::query()
            ->selectRaw('YEAR(fecha) as anio, tipo_tarea, COUNT(*) as cant')
            ->whereNotNull('fecha')
            ->whereYear('fecha', '>=', $minYear)
            ->whereYear('fecha', '<=', $maxYear)
            ->when($establecimiento, fn($q) => $q->where('establecimiento', 'like', "%{$establecimiento}%"))
            ->groupBy('anio', 'tipo_tarea')
            ->orderByDesc('anio')
            ->get();

        $totalesPorAnio = [];
        foreach ($rows as $r) {
            $y = (int) $r->anio;
            $tipo = (string) $r->tipo_tarea;
            $cant = (int) $r->cant;

            if (!isset($totalesPorAnio[$y])) {
                $totalesPorAnio[$y] = ['APH' => 0, 'ELEC' => 0, 'DEZM' => 0, 'TOTAL' => 0];
            }

            if (array_key_exists($tipo, $totalesPorAnio[$y])) {
                $totalesPorAnio[$y][$tipo] = $cant;
            }
        }

        // Completar rango entero 2025..año actual
        for ($y = $minYear; $y <= $maxYear; $y++) {
            if (!isset($totalesPorAnio[$y])) {
                $totalesPorAnio[$y] = ['APH' => 0, 'ELEC' => 0, 'DEZM' => 0, 'TOTAL' => 0];
            }
            $totalesPorAnio[$y]['TOTAL'] =
                (int)($totalesPorAnio[$y]['APH'] ?? 0) +
                (int)($totalesPorAnio[$y]['ELEC'] ?? 0) +
                (int)($totalesPorAnio[$y]['DEZM'] ?? 0);
        }

        // Lista de años (si querés mostrarla en algún lado)
        $aniosDisponibles = [];
        for ($y = $maxYear; $y >= $minYear; $y--) $aniosDisponibles[] = (int)$y;

        return view('edudata.mantenimiento.index', [
            'establecimiento' => $establecimiento,

            'registros'    => $registros,
            'totales'      => $totales,
            'totalGeneral' => $totalGeneral,

            'minYear'          => $minYear,
            'maxYear'          => $maxYear,
            'aniosDisponibles' => $aniosDisponibles,
            'totalesPorAnio'   => $totalesPorAnio,

            'fotos' => $fotos,
        ]);
    }

    // ===========================
    // EDURED (privado) - Cargar CSV
    // ===========================
    public function create()
    {
        return view('edured.herramientas.mantenimiento.cargar_mantenimiento_realizadas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'archivo_csv' => ['required', 'file', 'mimes:csv,txt', 'max:10240'],
        ]);

        $minYear = 2025;
        $maxYear = (int) date('Y');

        $file           = $request->file('archivo_csv');
        $nombreOriginal = $file->getClientOriginalName();
        $nombreGuardado = now()->format('Y_m_d_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $carpetaPublica = 'mantenimiento/realizadas';
        $rutaRelativa   = $carpetaPublica . '/' . $nombreGuardado;

        Storage::disk('public')->putFileAs($carpetaPublica, $file, $nombreGuardado);

        $archivo = ArchivosMantenimientoRealizadas::create([
            'nombre_original' => $nombreOriginal,
            'nombre_guardado' => $nombreGuardado,
            'mime_type'       => $file->getMimeType(),
            'size_bytes'      => $file->getSize(),
            'ruta_publica'    => $rutaRelativa,
            'usuario_id'      => optional($request->user())->id,
            'observacion'     => null,
        ]);

        try {
            $fullPath = Storage::disk('public')->path($rutaRelativa);
            $spl = new \SplFileObject($fullPath);
            $spl->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY);

            $firstLineRaw = trim(file($fullPath)[0] ?? '');
            $delims = [
                ","  => substr_count($firstLineRaw, ","),
                ";"  => substr_count($firstLineRaw, ";"),
                "\t" => substr_count($firstLineRaw, "\t"),
                "|"  => substr_count($firstLineRaw, "|"),
            ];
            arsort($delims);
            $delimiter = array_key_first($delims) ?? ",";
            $spl->setCsvControl($delimiter);

            $rowsToInsert = [];
            $rowIndex = 0;

            foreach ($spl as $row) {
                if ($row === [null] || $row === false) continue;

                $row = array_map(function ($v) {
                    $v = is_string($v) ? trim($v) : $v;
                    if (is_string($v) && !mb_check_encoding($v, 'UTF-8')) {
                        $v = mb_convert_encoding($v, 'UTF-8', 'ISO-8859-1');
                    }
                    return $v;
                }, $row);

                if ($rowIndex === 0) { $rowIndex++; continue; }

                $fecha           = $row[0] ?? null;
                $establecimiento = $row[1] ?? null;
                $tarea           = $row[2] ?? null;
                $tipo            = $row[3] ?? null;

                if (!$fecha || !$establecimiento || !$tarea || !$tipo) { $rowIndex++; continue; }

                try {
                    $fechaNorm = Carbon::parse($fecha)->format('Y-m-d');
                } catch (\Throwable $e) {
                    $rowIndex++;
                    continue;
                }

                $y = (int) date('Y', strtotime($fechaNorm));
                if ($y < $minYear || $y > $maxYear) { $rowIndex++; continue; }

                $rowsToInsert[] = [
                    'fecha'           => $fechaNorm,
                    'establecimiento' => $establecimiento,
                    'tarea'           => $tarea,
                    'tipo_tarea'      => $tipo,
                    'cod_carga'       => $archivo->id,
                ];

                $rowIndex++;
            }

            if (empty($rowsToInsert)) {
                Storage::disk('public')->delete($rutaRelativa);
                $archivo->delete();
                return back()->with('error', 'No se encontraron filas válidas para insertar (rango 2025..año actual).');
            }

            DB::transaction(function () use ($rowsToInsert) {
                foreach (array_chunk($rowsToInsert, 1000) as $chunk) {
                    MantenimientoRealizadas::insert($chunk);
                }
            });

            return redirect()
                ->route('edured.herramientas.mantenimiento.realizadas.archivos.index')
                ->with('ok', 'Carga #' . $archivo->id . ' registrada. Filas insertadas: ' . count($rowsToInsert));
        } catch (\Throwable $e) {
            Storage::disk('public')->delete($rutaRelativa);
            $archivo->delete();
            return back()->with('error', 'Error al procesar el CSV: ' . $e->getMessage());
        }
    }

    // ✅ Manual (si lo estás usando en EDURED)
    public function storeManual(Request $request)
    {
        $request->validate([
            'tareas' => ['required', 'array', 'min:1'],
            'tareas.*.fecha' => ['required', 'date'],
            'tareas.*.establecimiento' => ['required', 'string', 'max:255'],
            'tareas.*.tarea' => ['required', 'string'],
            'tareas.*.tipo_tarea' => ['required', 'in:APH,ELEC,DEZM'],
        ]);

        $minYear = 2025;
        $maxYear = (int) date('Y');

        foreach ($request->input('tareas', []) as $row) {
            $fecha = $row['fecha'] ?? null;
            if (!$fecha) continue;
            $y = (int) date('Y', strtotime($fecha));
            if ($y < $minYear || $y > $maxYear) {
                return back()->with('error', "La fecha {$fecha} está fuera del rango permitido ($minYear - $maxYear).");
            }
        }

        $stamp = now()->format('Y_m_d_His');
        $nombreGuardado = "manual_{$stamp}_" . uniqid() . ".manual";

        $archivo = ArchivosMantenimientoRealizadas::create([
            'nombre_original' => 'Carga manual',
            'nombre_guardado' => $nombreGuardado,
            'mime_type'       => 'manual',
            'size_bytes'      => 0,
            'ruta_publica'    => 'manual/' . $nombreGuardado,
            'usuario_id'      => optional($request->user())->id,
            'observacion'     => 'Carga manual desde formulario',
        ]);

        $rowsToInsert = [];
        foreach ($request->input('tareas', []) as $t) {
            $rowsToInsert[] = [
                'fecha'           => Carbon::parse($t['fecha'])->format('Y-m-d'),
                'establecimiento' => trim($t['establecimiento']),
                'tarea'           => trim($t['tarea']),
                'tipo_tarea'      => $t['tipo_tarea'],
                'cod_carga'       => $archivo->id,
            ];
        }

        DB::transaction(function () use ($rowsToInsert) {
            foreach (array_chunk($rowsToInsert, 1000) as $chunk) {
                MantenimientoRealizadas::insert($chunk);
            }
        });

        return redirect()
            ->route('edured.herramientas.mantenimiento.realizadas.create')
            ->with('ok', 'Carga manual #' . $archivo->id . ' registrada. Filas insertadas: ' . count($rowsToInsert));
    }

    public function indexArchivos(Request $request)
    {
        $archivos = ArchivosMantenimientoRealizadas::orderBy('id', 'desc')->paginate(15);
        return view('edured.herramientas.mantenimiento.archivos_mantenimiento_realizadas', compact('archivos'));
    }

    public function descargar($id)
    {
        $a = ArchivosMantenimientoRealizadas::findOrFail($id);

        if (($a->mime_type ?? '') === 'manual') {
            return back()->with('error', 'Esta carga es manual y no tiene archivo para descargar.');
        }

        if (!Storage::disk('public')->exists($a->ruta_publica)) {
            return back()->with('error', 'El archivo no se encuentra en el servidor.');
        }

        return Storage::disk('public')->download($a->ruta_publica, $a->nombre_original);
    }

    public function destroyArchivo($id)
    {
        $a = ArchivosMantenimientoRealizadas::findOrFail($id);

        DB::transaction(function () use ($a) {
            MantenimientoRealizadas::where('cod_carga', $a->id)->delete();

            if (($a->mime_type ?? '') !== 'manual') {
                if ($a->ruta_publica && Storage::disk('public')->exists($a->ruta_publica)) {
                    Storage::disk('public')->delete($a->ruta_publica);
                }
            }

            $a->delete();
        });

        return redirect()
            ->route('edured.herramientas.mantenimiento.realizadas.archivos.index')
            ->with('ok', 'Se eliminó la carga y todas sus filas asociadas.');
    }
}