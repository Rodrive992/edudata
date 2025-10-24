<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Digesto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class NormativaController extends Controller
{
    /**
     * Listado + búsqueda
     */
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q', ''));
        $perPage = 10;

        $digestos = Digesto::when($q !== '', function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('titulo', 'like', "%{$q}%")
                      ->orWhere('descripcion', 'like', "%{$q}%");
                });
            })
            ->orderBy('fecha_subida', 'desc')
            ->paginate($perPage)
            ->appends(['q' => $q]);

        return view('edudata.normativa.index', compact('digestos', 'q'));
    }

    /**
     * Ver detalle
     */
    public function show($id)
    {
        $digesto = Digesto::findOrFail($id);
        return view('edudata.normativa.normativa', compact('digesto'));
    }

    /**
     * Servir el PDF INLINE
     */
    public function file($id)
    {
        $digesto = Digesto::findOrFail($id);

        [$url, $path, $isExternal] = $this->resolveFileLocation($digesto->ruta_archivo);
        $filename = $digesto->nombre_archivo
            ?: ($path ? basename($path) : 'documento.pdf');

        // 1) LOCAL
        if ($path && file_exists($path)) {
            return response()->file($path, [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"',
                'X-Frame-Options'     => 'SAMEORIGIN',
            ]);
        }

        // 2) EXTERNO
        if ($isExternal && $url) {
            try {
                $resp = Http::timeout(20)
                    ->withHeaders(['Accept' => 'application/pdf,*/*'])
                    ->get($url);

                if ($resp->successful()) {
                    return response($resp->body(), 200, [
                        'Content-Type'        => 'application/pdf',
                        'Content-Disposition' => 'inline; filename="'.$filename.'"',
                        'X-Frame-Options'     => 'SAMEORIGIN',
                        'Cache-Control'       => 'private, max-age=60',
                    ]);
                }
            } catch (\Throwable $e) {
                // log si querés
            }
        }

        abort(Response::HTTP_NOT_FOUND, 'Archivo no encontrado o no embebible.');
    }

    /**
     * Descargar el archivo
     */
    public function download($id)
    {
        $digesto = Digesto::findOrFail($id);
        [$url, $path] = $this->resolveFileLocation($digesto->ruta_archivo);

        if ($path && file_exists($path)) {
            $filename = $digesto->nombre_archivo ?: basename($path);
            return response()->download($path, $filename);
        }

        if ($url) {
            return redirect()->away($url);
        }

        return back()->with('error', 'No se pudo localizar el archivo para descargar.');
    }

    /**
     * Resolver ubicación del archivo
     */
    private function resolveFileLocation(?string $ruta): array
    {
        if (!$ruta) {
            return [null, null, false];
        }

        $ruta = str_replace('\\', '/', trim($ruta));

        // 0) URL absoluta
        if (preg_match('#^https?://#i', $ruta)) {
            return [$ruta, null, true];
        }

        // Normalizar ruta relativa
        $clean = ltrim($ruta, '/');
        $clean = preg_replace('#^\./#', '', $clean);
        $clean = preg_replace('#^\.\./#', '', $clean);

        // === OPCIÓN 1: Compatibilidad con rutas "digesto/..." ===
        if (Str::startsWith($clean, 'digesto/')) {
            $archivosCandidate = 'archivos/' . $clean; // ej: archivos/digesto/2025/09/file.pdf
            $archivosPath = public_path($archivosCandidate);
            if (file_exists($archivosPath)) {
                return [asset($archivosCandidate), $archivosPath, false];
            }
        }

        // 1) public/archivos/... (recomendado)
        $publicCandidate = $clean;
        if (Str::startsWith($publicCandidate, 'public/')) {
            $publicCandidate = substr($publicCandidate, 7);
        }

        $publicPath = public_path($publicCandidate);
        if (file_exists($publicPath)) {
            return [asset($publicCandidate), $publicPath, false];
        }

        // 2) storage (fallback)
        if (Str::startsWith($clean, 'storage/')) {
            $p = public_path($clean);
            if (file_exists($p)) {
                return [asset($clean), $p, false];
            }
        }

        // 3) disk public (fallback)
        $storageCandidate = Str::startsWith($clean, 'public/')
            ? substr($clean, 7)
            : $clean;

        if (Storage::disk('public')->exists($storageCandidate)) {
            return [
                Storage::disk('public')->url($storageCandidate),
                Storage::disk('public')->path($storageCandidate),
                false,
            ];
        }

        return [null, null, false];
    }
}
