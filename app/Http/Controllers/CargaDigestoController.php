<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Digesto;

class CargaDigestoController extends Controller
{
    // Muestra el formulario (vista herramientas/digesto.blade.php)
    public function index()
    {
        // Podés traer últimos documentos si querés listarlos
        $docs = Digesto::orderByDesc('fecha_subida')->limit(20)->get();

        return view('edured.herramientas.digesto.index', compact('docs'));
    }

    // Procesa la carga del PDF
    public function store(Request $request)
    {
        $request->validate([
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'archivo'     => 'required|file|mimes:pdf|max:20480', // 20MB
        ], [
            'archivo.mimes' => 'El archivo debe ser un PDF.',
            'archivo.max'   => 'El tamaño máximo permitido es 20MB.',
        ]);

        $file = $request->file('archivo');

        // Guardar en storage/app/public/digesto/AAAA/MM/
        $folder = 'digesto/' . now()->format('Y') . '/' . now()->format('m');
        $path   = $file->store($folder, 'public'); // requiere storage:link

        // Crear registro
        Digesto::create([
            'titulo'         => $request->titulo,
            'descripcion'    => $request->descripcion,
            'nombre_archivo' => $file->getClientOriginalName(),
            'ruta_archivo'   => $path, // ej: digesto/2025/09/archivo.pdf
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

    public function destroy(Digesto $digesto)
    {
        try {
            // borrar archivo físico si existe
            if ($digesto->ruta_archivo && Storage::disk('public')->exists($digesto->ruta_archivo)) {
                Storage::disk('public')->delete($digesto->ruta_archivo);
            }

            // borrar registro
            $digesto->delete();

            return back()->with('ok', 'Documento eliminado correctamente.');
        } catch (\Throwable $e) {
            report($e);
            return back()->with('error', 'No se pudo eliminar el documento.');
        }
    }
}
