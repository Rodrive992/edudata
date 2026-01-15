<?php

namespace App\Http\Controllers;

use App\Models\FotoMantenimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FotosMantenimientoController extends Controller
{
    public function index()
    {
        $fotos = FotoMantenimiento::orderByDesc('activo')
            ->orderBy('orden')
            ->orderByDesc('id')
            ->get();

        return view('edured.herramientas.mantenimiento.fotos.index', compact('fotos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo'      => ['required', 'string', 'max:180'],
            'descripcion' => ['nullable', 'string'],
            'alt_text'    => ['nullable', 'string', 'max:255'],
            'orden'       => ['nullable', 'integer', 'min:0', 'max:9999'],
            'activo'      => ['nullable', 'in:0,1'],
            'imagen'      => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:6144'],
        ]);

        $file = $request->file('imagen');

        // Guardar en: public/images/mantenimiento
        $dir = public_path('images/mantenimiento');
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $ext = $file->getClientOriginalExtension();
        $filename = now()->format('Ymd_His') . '_' . Str::random(10) . '.' . $ext;

        $file->move($dir, $filename);

        FotoMantenimiento::create([
            'titulo'      => $data['titulo'],
            'descripcion' => $data['descripcion'] ?? null,
            'alt_text'    => $data['alt_text'] ?? $data['titulo'],
            'orden'       => $data['orden'] ?? 0,
            'activo'      => (int)($data['activo'] ?? 1),
            'imagen'      => 'images/mantenimiento/' . $filename,
        ]);

        return back()->with('ok', 'Foto cargada correctamente.');
    }

    public function update(Request $request, FotoMantenimiento $foto)
    {
        $data = $request->validate([
            'titulo'      => ['required', 'string', 'max:180'],
            'descripcion' => ['nullable', 'string'],
            'alt_text'    => ['nullable', 'string', 'max:255'],
            'orden'       => ['nullable', 'integer', 'min:0', 'max:9999'],
            'activo'      => ['nullable', 'in:0,1'],
            'imagen'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:6144'],
        ]);

        // Si sube nueva imagen, reemplazar
        if ($request->hasFile('imagen')) {
            $oldPath = public_path($foto->imagen);
            if ($foto->imagen && file_exists($oldPath)) {
                @unlink($oldPath);
            }

            $dir = public_path('images/mantenimiento');
            if (!is_dir($dir)) {
                @mkdir($dir, 0775, true);
            }

            $file = $request->file('imagen');
            $ext = $file->getClientOriginalExtension();
            $filename = now()->format('Ymd_His') . '_' . Str::random(10) . '.' . $ext;
            $file->move($dir, $filename);

            $foto->imagen = 'images/mantenimiento/' . $filename;
        }

        $foto->titulo      = $data['titulo'];
        $foto->descripcion = $data['descripcion'] ?? null;
        $foto->alt_text    = $data['alt_text'] ?? $data['titulo'];
        $foto->orden       = $data['orden'] ?? 0;
        $foto->activo      = (int)($data['activo'] ?? 1);
        $foto->save();

        return back()->with('ok', 'Foto actualizada.');
    }

    public function destroy(FotoMantenimiento $foto)
    {
        $path = public_path($foto->imagen);
        if ($foto->imagen && file_exists($path)) {
            @unlink($path);
        }

        $foto->delete();

        return back()->with('ok', 'Foto eliminada.');
    }
}

