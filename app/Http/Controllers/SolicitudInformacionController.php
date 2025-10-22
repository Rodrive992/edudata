<?php

namespace App\Http\Controllers;

use App\Models\SolicitudInformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class SolicitudInformacionController extends Controller
{
    public function index()
    {
        return view('edudata.solicitud-info.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'dni_solicitante'          => ['required', 'digits_between:7,10'],
            'nombre_solicitante'       => ['required', 'string', 'max:100'],
            'apellido_solicitante'     => ['required', 'string', 'max:100'],

            // NUEVO: dos archivos para DNI
            'dni_imagen_frente'        => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:4096'],
            'dni_imagen_reverso'       => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:4096'],

            'provincia_solicitante'    => ['required', 'string', 'max:100'],
            'departamento_solicitante' => ['nullable', 'string', 'max:100'],
            'codigo_postal'            => ['nullable', 'string', 'max:10'],
            'barrio_solicitante'       => ['nullable', 'string', 'max:100'],
            'telefono_solicitante'     => ['nullable', 'string', 'max:30'],
            'email_solicitante'        => ['required', 'email', 'max:150'],
            'asunto_solicitud'          => ['required', 'string', 'min:10', 'max:100'],
            'solicitud_texto'          => ['required', 'string', 'min:10', 'max:10000'],
        ]);

        // Guardar archivos (si llegan)
        $dniFrentePath = null;
        $dniReversoPath = null;

        if ($request->hasFile('dni_imagen_frente')) {
            $dniFrentePath = $request->file('dni_imagen_frente')->store('solicitudes/dni_frente', 'public');
        }
        if ($request->hasFile('dni_imagen_reverso')) {
            $dniReversoPath = $request->file('dni_imagen_reverso')->store('solicitudes/dni_reverso', 'public');
        }

        // Crear registro
        $sol = SolicitudInformacion::create([
            'dni_solicitante'           => $data['dni_solicitante'],
            'nombre_solicitante'        => $data['nombre_solicitante'],
            'apellido_solicitante'      => $data['apellido_solicitante'],
            'dni_imagen_frente'         => $dniFrentePath,
            'dni_imagen_reverso'        => $dniReversoPath,
            'provincia_solicitante'     => $data['provincia_solicitante'],
            'departamento_solicitante'  => $data['departamento_solicitante'] ?? null,
            'codigo_postal'             => $data['codigo_postal'] ?? null,
            'barrio_solicitante'        => $data['barrio_solicitante'] ?? null,
            'telefono_solicitante'      => $data['telefono_solicitante'] ?? null,
            'email_solicitante'         => $data['email_solicitante'],
            'solicitud_texto'           => $data['solicitud_texto'],
            'asunto_solicitud'           => $data['asunto_solicitud'],
            'estado_solicitud'          => 'pendiente',
        ]);

        return redirect()
            ->route('edudata.solicitud-info.store')
            ->with('ok', 'Tu solicitud fue registrada con el N° ' . $sol->id . '. Te contactaremos al correo indicado.');
    }
    public function registro()
    {
        $solicitudes = \App\Models\SolicitudInformacion::query()
            ->latest('id')
            ->paginate(15);

        return view('edudata.solicitud-info.registro_solicitudes_info', compact('solicitudes'));
    }
    public function gestionSolicitudes()
    {

        return view('edured.herramientas.solicitudes-info.index');
    }
}
