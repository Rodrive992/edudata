<?php

namespace App\Mail;

use App\Models\SolicitudInformacion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class RespuestaSolicitudMail extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitud;
    public $respuestaHtml;
    public $asuntoRespuesta;

    /**
     * Create a new message instance.
     */
    public function __construct(SolicitudInformacion $solicitud, string $respuestaHtml, string $asuntoRespuesta)
    {
        $this->solicitud       = $solicitud;
        $this->respuestaHtml   = $respuestaHtml;
        $this->asuntoRespuesta = $asuntoRespuesta;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // Armamos el mail base
        $mail = $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->subject($this->asuntoRespuesta)
            ->view('emails.solicitudes.respuesta', [
                'solicitud'     => $this->solicitud,
                'respuestaHtml' => $this->respuestaHtml,
            ]);

        // Si hay archivo de respuesta, lo adjuntamos
        if (!empty($this->solicitud->archivo_respuesta_solicitud)) {
            $ruta = $this->solicitud->archivo_respuesta_solicitud; // p.ej: 'solicitudes/respuestas/archivo.pdf'

            if (Storage::disk('public')->exists($ruta)) {
                $mail->attachFromStorageDisk(
                    'public',
                    $ruta,
                    basename($ruta) // nombre con el que llega el adjunto
                );
            }
        }

        return $mail;
    }
}
