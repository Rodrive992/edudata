<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MantenimientoPendiente;
use App\Models\MantenimientoComision;
use App\Models\MantenimientoRealizadas;
use App\Models\ArchivosMantenimientoRealizadas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MantenimientoRealizadasController extends Controller
{
    public function index(Request $request)
    {
        $tarea = $request->input('tarea', 'realizadas'); // realizadas | pendientes | comisiones

        // Variables comunes de filtros
        $anio = $request->input('anio');
        $mes  = $request->input('mes');

        // Para realizadas
        $establecimiento = $request->input('establecimiento');

        // Para pendientes
        $localidadPend = $request->input('localidad'); // input único para pendientes

        // Para comisiones
        $qComisiones = $request->input('q'); // busca por localidad o establecimiento

        // Datos a pasar a la vista
        $registros = collect();     // para realizadas (agrupados por tipo_tarea)
        $pendientes = collect();    // para pendientes
        $comisiones = collect();    // para comisiones

        if ($tarea === 'realizadas') {
            $query = MantenimientoRealizadas::query();

            if ($anio) {
                $query->whereYear('fecha', $anio);
            }
            if ($mes) {
                $query->whereMonth('fecha', $mes);
            }
            if ($establecimiento) {
                $query->where('establecimiento', 'like', '%' . $establecimiento . '%');
            }

            $registros = $query->orderBy('fecha')->get()->groupBy('tipo_tarea');
        }

        if ($tarea === 'pendientes') {
            $query = MantenimientoPendiente::query();

            if ($localidadPend) {
                $query->where('localidad', 'like', '%' . $localidadPend . '%');
            }

            $pendientes = $query->orderBy('id', 'desc')->get();
        }

        if ($tarea === 'comisiones') {
            $query = MantenimientoComision::query();

            if ($anio) {
                $query->whereYear('fecha', $anio);
            }
            if ($mes) {
                $query->whereMonth('fecha', $mes);
            }
            if ($qComisiones) {
                $query->where(function ($qq) use ($qComisiones) {
                    $qq->where('localidad', 'like', '%' . $qComisiones . '%')
                        ->orWhere('establecimiento', 'like', '%' . $qComisiones . '%');
                });
            }

            $comisiones = $query->orderBy('fecha', 'desc')->get();
        }

        return view('edudata.mantenimiento.index', [
            'tarea'           => $tarea,
            'anio'            => $anio,
            'mes'             => $mes,
            'establecimiento' => $establecimiento,
            'localidadPend'   => $localidadPend,
            'qComisiones'     => $qComisiones,
            'registros'       => $registros,
            'pendientes'      => $pendientes,
            'comisiones'      => $comisiones,
        ]);
    }

  
    // GET: formulario de carga
    public function create()
    {
        return view('edured.herramientas.mantenimiento.cargar_mantenimiento_realizadas');
    }

    // POST: procesar CSV y guardar archivo + filas con cod_carga
    public function store(Request $request)
    {
        $request->validate([
            'archivo_csv' => ['required','file','mimes:csv,txt','max:10240'],
        ]);

        $file           = $request->file('archivo_csv');
        $nombreOriginal = $file->getClientOriginalName();
        $nombreGuardado = now()->format('Y_m_d_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $carpetaPublica = 'mantenimiento/realizadas';
        $rutaRelativa   = $carpetaPublica . '/' . $nombreGuardado;

        Storage::disk('public')->putFileAs($carpetaPublica, $file, $nombreGuardado);

        // Registro del archivo = cod_carga
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

            // detectar delimitador
            $firstLineRaw = trim(file($fullPath)[0] ?? '');
            $delims = ["," => substr_count($firstLineRaw, ","), ";" => substr_count($firstLineRaw, ";"),
                       "\t" => substr_count($firstLineRaw, "\t"), "|" => substr_count($firstLineRaw, "|")];
            arsort($delims);
            $delimiter = array_key_first($delims) ?? ",";

            $spl->setCsvControl($delimiter);

            $rowsToInsert = [];
            $rowIndex = 0;

            foreach ($spl as $row) {
                if ($row === [null] || $row === false) { continue; }

                $row = array_map(function($v){
                    $v = is_string($v) ? trim($v) : $v;
                    if (is_string($v) && !mb_check_encoding($v, 'UTF-8')) {
                        $v = mb_convert_encoding($v, 'UTF-8', 'ISO-8859-1');
                    }
                    return $v;
                }, $row);

                // encabezado
                if ($rowIndex === 0) { $rowIndex++; continue; }

                $fecha           = $row[0] ?? null;
                $establecimiento = $row[1] ?? null;
                $tarea           = $row[2] ?? null;
                $tipo            = $row[3] ?? null;

                if (!$fecha || !$establecimiento || !$tarea || !$tipo) { $rowIndex++; continue; }

                try {
                    $fechaNorm = Carbon::parse($fecha)->format('Y-m-d');
                } catch (\Throwable $e) {
                    $rowIndex++; continue;
                }

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
                return back()->with('error', 'No se encontraron filas válidas para insertar.');
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

    // GET: listado de archivos
    public function indexArchivos(Request $request)
    {
        $archivos = ArchivosMantenimientoRealizadas::orderBy('id', 'desc')->paginate(15);
        return view('edured.herramientas.mantenimiento.archivos_mantenimiento_realizadas', compact('archivos'));
    }

    // GET: descargar archivo original
    public function descargar($id)
    {
        $a = ArchivosMantenimientoRealizadas::findOrFail($id);
        if (!Storage::disk('public')->exists($a->ruta_publica)) {
            return back()->with('error', 'El archivo no se encuentra en el servidor.');
        }
        return Storage::disk('public')->download($a->ruta_publica, $a->nombre_original);
    }

    // DELETE: eliminar carga completa
    public function destroyArchivo($id)
    {
        $a = ArchivosMantenimientoRealizadas::findOrFail($id);

        DB::transaction(function() use ($a) {
            MantenimientoRealizadas::where('cod_carga', $a->id)->delete();
            if ($a->ruta_publica && Storage::disk('public')->exists($a->ruta_publica)) {
                Storage::disk('public')->delete($a->ruta_publica);
            }
            $a->delete();
        });

        return redirect()
            ->route('edured.herramientas.mantenimiento.realizadas.archivos.index')
            ->with('ok', 'Se eliminó la carga y todas sus filas asociadas.');
    }
}