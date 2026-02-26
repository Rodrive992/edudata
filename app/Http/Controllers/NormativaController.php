<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Digesto;
use Illuminate\Support\Facades\Storage;
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
     * Servir el PDF INLINE (NO depende de symlink /storage)
     */
    public function file($id)
    {
        $digesto = Digesto::findOrFail($id);

        $disk = Storage::disk('public');
        $path = (string) ($digesto->ruta_archivo ?? '');
        $filename = $digesto->nombre_archivo ?: basename($path ?: 'documento.pdf');

        // 1) Si el archivo está en storage/app/public/... (disk public)
        if ($path !== '' && $disk->exists($path)) {
            return $disk->response($path, $filename, [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"',
                'X-Frame-Options'     => 'SAMEORIGIN',
                'Cache-Control'       => 'private, max-age=60',
            ]);
        }

        // 2) Si en DB guardaste una URL externa absoluta
        if ($path !== '' && preg_match('#^https?://#i', $path)) {
            return redirect()->away($path);
        }

        abort(Response::HTTP_NOT_FOUND, 'Archivo no encontrado o no disponible.');
    }

    /**
     * Descargar el archivo (NO depende de symlink /storage)
     */
    public function download($id)
    {
        $digesto = Digesto::findOrFail($id);

        $disk = Storage::disk('public');
        $path = (string) ($digesto->ruta_archivo ?? '');
        $filename = $digesto->nombre_archivo ?: basename($path ?: 'documento.pdf');

        if ($path !== '' && $disk->exists($path)) {
            return $disk->download($path, $filename);
        }

        if ($path !== '' && preg_match('#^https?://#i', $path)) {
            return redirect()->away($path);
        }

        return back()->with('error', 'No se pudo localizar el archivo para descargar.');
    }
}