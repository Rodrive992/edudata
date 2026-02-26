<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Digesto;

class CargaDigestoController extends Controller
{
    public function index()
    {
        $docs = Digesto::orderByDesc('fecha_subida')->limit(20)->get();
        return view('edured.herramientas.digesto.index', compact('docs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'archivo'     => 'required|file|mimes:pdf|max:20480',
        ], [
            'archivo.mimes' => 'El archivo debe ser un PDF.',
            'archivo.max'   => 'El tamaño máximo permitido es 20MB.',
        ]);

        $file = $request->file('archivo');

        $folder = 'digesto/' . now()->format('Y') . '/' . now()->format('m');

        $original = $file->getClientOriginalName();
        $safeName = preg_replace('/[^A-Za-z0-9\.\-_]/', '_', $original);
        $safeName = time() . '_' . $safeName;

        $path = $file->storeAs($folder, $safeName, 'public');

        Digesto::create([
            'titulo'         => $request->titulo,
            'descripcion'    => $request->descripcion,
            'nombre_archivo' => $original,
            'ruta_archivo'   => $path,
            'tipo_archivo'   => $file->getClientMimeType(),
            'tamano_archivo' => $file->getSize(),
            'usuario_id'     => auth()->id(),
            'estado'         => 'activo',
            'fecha_subida'   => now(),
        ]);

        return redirect()
            ->route('edured.herramientas.digesto.index')
            ->with('ok', 'Documento cargado correctamente.');
    }

    /**
     * ✅ NUEVO: devuelve datos para edición (modal)
     */
    public function edit(Digesto $digesto)
    {
        return response()->json([
            'id'            => $digesto->id,
            'titulo'         => $digesto->titulo,
            'descripcion'    => $digesto->descripcion,
            'nombre_archivo' => $digesto->nombre_archivo,
            'fecha_subida'   => optional($digesto->fecha_subida)->format('d/m/Y H:i'),
        ]);
    }

    /**
     * ✅ NUEVO: actualiza título/desc y opcionalmente reemplaza PDF
     */
    public function update(Request $request, Digesto $digesto)
    {
        $request->validate([
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'archivo'     => 'nullable|file|mimes:pdf|max:20480',
        ], [
            'archivo.mimes' => 'El archivo debe ser un PDF.',
            'archivo.max'   => 'El tamaño máximo permitido es 20MB.',
        ]);

        $digesto->titulo = $request->titulo;
        $digesto->descripcion = $request->descripcion;

        // Si subieron nuevo PDF, reemplazar
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');

            // borrar archivo anterior si existe
            if ($digesto->ruta_archivo && Storage::disk('public')->exists($digesto->ruta_archivo)) {
                Storage::disk('public')->delete($digesto->ruta_archivo);
            }

            $folder = 'digesto/' . now()->format('Y') . '/' . now()->format('m');

            $original = $file->getClientOriginalName();
            $safeName = preg_replace('/[^A-Za-z0-9\.\-_]/', '_', $original);
            $safeName = time() . '_' . $safeName;

            $path = $file->storeAs($folder, $safeName, 'public');

            $digesto->nombre_archivo = $original;
            $digesto->ruta_archivo   = $path;
            $digesto->tipo_archivo   = $file->getClientMimeType();
            $digesto->tamano_archivo = $file->getSize();
            $digesto->fecha_subida   = now(); // para que quede arriba y registre “re-subida”
        }

        $digesto->save();

        return redirect()
            ->route('edured.herramientas.digesto.index')
            ->with('ok', 'Documento actualizado correctamente.');
    }

    public function destroy(Digesto $digesto)
    {
        try {
            if ($digesto->ruta_archivo && Storage::disk('public')->exists($digesto->ruta_archivo)) {
                Storage::disk('public')->delete($digesto->ruta_archivo);
            }

            $digesto->delete();

            return back()->with('ok', 'Documento eliminado correctamente.');
        } catch (\Throwable $e) {
            report($e);
            return back()->with('error', 'No se pudo eliminar el documento.');
        }
    }
}