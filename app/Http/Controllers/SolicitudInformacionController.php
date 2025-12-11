<?php

namespace App\Http\Controllers;

use App\Models\SolicitudInformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use App\Mail\RespuestaSolicitudMail;

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

            'dni_imagen_frente'        => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:4096'],
            'dni_imagen_reverso'       => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:4096'],

            'provincia_solicitante'    => ['required', 'string', 'max:100'],
            'departamento_solicitante' => ['nullable', 'string', 'max:100'],
            'codigo_postal'            => ['nullable', 'string', 'max:10'],
            'barrio_solicitante'       => ['nullable', 'string', 'max:100'],
            'telefono_solicitante'     => ['nullable', 'string', 'max:30'],
            'email_solicitante'        => ['required', 'email', 'max:150'],
            'asunto_solicitud'         => ['required', 'string', 'min:10', 'max:100'],
            'solicitud_texto'          => ['required', 'string', 'min:10', 'max:10000'],
        ]);

        $dniFrentePath  = $request->hasFile('dni_imagen_frente')
            ? $request->file('dni_imagen_frente')->store('solicitudes/dni_frente', 'public')
            : null;

        $dniReversoPath = $request->hasFile('dni_imagen_reverso')
            ? $request->file('dni_imagen_reverso')->store('solicitudes/dni_reverso', 'public')
            : null;

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
            'asunto_solicitud'          => $data['asunto_solicitud'],
            'solicitud_texto'           => $data['solicitud_texto'],
            'estado_solicitud'          => 'pendiente',
            'mostrar_solicitud'         => 'no',
        ]);

        return redirect()
            ->route('edudata.solicitud-info')
            ->with('ok', 'Tu solicitud fue registrada con el N° ' . $sol->id . '. Te contactaremos al correo indicado.');
    }

    public function registro()
    {
        $solicitudes = \App\Models\SolicitudInformacion::query()
            ->where('mostrar_solicitud', 'si')   // ← filtro 
            ->latest('id')
            ->paginate(15);

        return view('edudata.solicitud-info.registro_solicitudes_info', compact('solicitudes'));
    }

    public function gestionSolicitudes()
    {
        $solicitudes = SolicitudInformacion::latest('id')->paginate(15);
        return view('edured.herramientas.solicitudes-info.index', compact('solicitudes'));
    }

    public function gestionPaso1(SolicitudInformacion $solicitud)
    {
        return view('edured.herramientas.solicitudes-info.paso1', compact('solicitud'));
    }

    public function rechazar(Request $request, SolicitudInformacion $solicitud)
    {
        $solicitud->update(['estado_solicitud' => 'rechazada']);

        return redirect()
            ->route('edured.herramientas.solicitudes-info.index')
            ->with('ok', "Solicitud #{$solicitud->id} rechazada.");
    }

    public function continuar(Request $request, SolicitudInformacion $solicitud)
    {
        $solicitud->update(['estado_solicitud' => 'en_proceso']);

        return redirect()
            ->route('edured.herramientas.solicitudes-info.paso2', $solicitud);
    }

    public function gestionPaso2(SolicitudInformacion $solicitud)
    {
        return view('edured.herramientas.solicitudes-info.paso2', compact('solicitud'));
    }

    public function responder(Request $request, SolicitudInformacion $solicitud)
    {
        $data = $request->validate([
            'asunto_respuesta_solicitud'   => ['required', 'string', 'min:5', 'max:150'],
            'respuesta_solicitud'          => ['required', 'string', 'min:5', 'max:20000'],
            'archivo_respuesta_solicitud'  => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,webp,doc,docx,xls,xlsx,zip', 'max:8192'],
            'enviar_email'                 => ['nullable', 'boolean'],
        ]);

        $rutaArchivo = $solicitud->archivo_respuesta_solicitud;
        if ($request->hasFile('archivo_respuesta_solicitud')) {
            $rutaArchivo = $request->file('archivo_respuesta_solicitud')
                ->store('solicitudes/respuestas', 'public');
        }

        $ahoraAr = now(); 

        $user = Auth::user();
        $usuarioRespuesta = $user
            ? ($user->name ?? $user->usuario ?? $user->email)
            : 'sistema';

        $solicitud->update([
            'asunto_respuesta_solicitud'  => $data['asunto_respuesta_solicitud'],
            'respuesta_solicitud'         => $data['respuesta_solicitud'],
            'archivo_respuesta_solicitud' => $rutaArchivo,
            'estado_solicitud'            => 'respondida',
            'fecha_respuesta'             => $ahoraAr,
            'usuario_respuesta'           => $usuarioRespuesta,
        ]);

        $correoEnviado = false;

        if ($request->boolean('enviar_email')) {
            try {
                Mail::to($solicitud->email_solicitante)
                    ->send(new RespuestaSolicitudMail(
                        $solicitud,
                        $data['respuesta_solicitud'],
                        $data['asunto_respuesta_solicitud']
                    ));

                $correoEnviado = true;
            } catch (\Throwable $e) {
                $correoEnviado = false;
            }
        }

        $mensaje = $correoEnviado
            ? "Respuesta registrada y correo enviado para la solicitud #{$solicitud->id}."
            : "Respuesta registrada para la solicitud #{$solicitud->id}. (No se envió correo electrónico).";

        return redirect()
            ->route('edured.herramientas.solicitudes-info.respuesta', $solicitud)
            ->with('ok', $mensaje);
    }




    /* =========================
       Servir archivos (INLINE)
       ========================= */

    public function fileDniFrente(SolicitudInformacion $solicitud)
    {
        return $this->serveInline($solicitud->dni_imagen_frente, 'dni_frente');
    }

    public function fileDniReverso(SolicitudInformacion $solicitud)
    {
        return $this->serveInline($solicitud->dni_imagen_reverso, 'dni_reverso');
    }

    public function fileRespuesta(SolicitudInformacion $solicitud)
    {
        return $this->serveInline($solicitud->archivo_respuesta_solicitud, 'respuesta');
    }

    public function downloadRespuesta(SolicitudInformacion $solicitud)
    {
        [$url, $path] = $this->resolveFileLocation($solicitud->archivo_respuesta_solicitud);
        if ($path && file_exists($path)) {
            return response()->download($path, basename($path));
        }
        if ($url) {
            return redirect()->away($url);
        }
        return back()->with('error', 'No se pudo localizar el archivo para descargar.');
    }

    /* =========================
       Helpers estilo Normativa
       ========================= */

    private function serveInline(?string $ruta, string $fallbackName = 'archivo')
    {
        [$url, $path, $isExternal] = $this->resolveFileLocation($ruta);
        $filename = $path ? basename($path) : ($fallbackName . '.file');

        if ($path && file_exists($path)) {
            $mime = $this->guessMime($path);
            return response()->file($path, [
                'Content-Type'        => $mime,
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
                'X-Frame-Options'     => 'SAMEORIGIN',
                'Cache-Control'       => 'private, max-age=60',
            ]);
        }

        if ($isExternal && $url) {
            try {
                $resp = Http::timeout(20)->get($url);
                if ($resp->successful()) {
                    return response($resp->body(), 200, [
                        'Content-Type'        => $resp->header('Content-Type', 'application/octet-stream'),
                        'Content-Disposition' => 'inline; filename="' . $filename . '"',
                        'X-Frame-Options'     => 'SAMEORIGIN',
                        'Cache-Control'       => 'private, max-age=60',
                    ]);
                }
            } catch (\Throwable $e) {
            }
        }

        abort(Response::HTTP_NOT_FOUND, 'Archivo no encontrado.');
    }

    private function resolveFileLocation(?string $ruta): array
    {
        if (!$ruta) {
            return [null, null, false];
        }

        $ruta = str_replace('\\', '/', trim($ruta));

        // URL absoluta
        if (preg_match('#^https?://#i', $ruta)) {
            return [$ruta, null, true];
        }

        // Normalizar
        $clean = ltrim($ruta, '/');
        $clean = preg_replace('#^\./#', '', $clean);
        $clean = preg_replace('#^\.\./#', '', $clean);

        // 1) public/... (asset directo)
        $publicCandidate = $clean;
        if (Str::startsWith($publicCandidate, 'public/')) {
            $publicCandidate = substr($publicCandidate, 7);
        }
        $publicPath = public_path($publicCandidate);
        if (file_exists($publicPath)) {
            return [asset($publicCandidate), $publicPath, false];
        }

        // 2) public/storage/... (symlink)
        if (Str::startsWith($clean, 'storage/')) {
            $p = public_path($clean);
            if (file_exists($p)) {
                return [asset($clean), $p, false];
            }
        }

        // 3) disk public (storage/app/public)
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

    private function guessMime(string $path): string
    {
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        return match ($ext) {
            'pdf'       => 'application/pdf',
            'jpg', 'jpeg' => 'image/jpeg',
            'png'       => 'image/png',
            'webp'      => 'image/webp',
            'gif'       => 'image/gif',
            'doc'       => 'application/msword',
            'docx'      => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls'       => 'application/vnd.ms-excel',
            'xlsx'      => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'zip'       => 'application/zip',
            default     => 'application/octet-stream',
        };
    }

    public function gestionRespuesta(SolicitudInformacion $solicitud)
    {
        if (strtolower($solicitud->estado_solicitud ?? '') !== 'respondida') {
            return redirect()
                ->route('edured.herramientas.solicitudes-info.index')
                ->with('error', "La solicitud #{$solicitud->id} aún no está respondida.");
        }

        return view('edured.herramientas.solicitudes-info.respuestas_solicitudes', compact('solicitud'));
    }

    public function publicar(Request $request, SolicitudInformacion $solicitud)
    {
        $solicitud->update([
            'mostrar_solicitud' => 'si',
        ]);

        return back()->with('ok', "La solicitud #{$solicitud->id} ahora se muestra en el portal.");
    }

    public function ocultar(Request $request, SolicitudInformacion $solicitud)
    {
        $solicitud->update([
            'mostrar_solicitud' => 'no',
        ]);

        return back()->with('ok', "La solicitud #{$solicitud->id} fue ocultada del portal.");
    }
}
