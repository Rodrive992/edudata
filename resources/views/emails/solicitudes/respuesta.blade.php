<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $solicitud->asunto_respuesta_solicitud ?? 'Respuesta a su solicitud de información' }}</title>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f3f4f6;
            color: #111827;
            margin: 0;
            padding: 0;
        }
        .wrapper {
            width: 100%;
            padding: 24px 0;
        }
        .container {
            max-width: 640px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }
        .header {
            background: #111827;
            color: #f9fafb;
            padding: 16px 24px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 4px 0 0;
            font-size: 12px;
            opacity: .85;
        }
        .content {
            padding: 20px 24px 24px;
            font-size: 14px;
            line-height: 1.6;
            color: #111827;
        }
        .content h2 {
            font-size: 16px;
            margin-top: 0;
            margin-bottom: 8px;
        }
        .content p {
            margin: 0 0 10px;
        }
        .pill {
            display: inline-block;
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 999px;
            background: #e5e7eb;
            color: #374151;
            margin-bottom: 8px;
        }
        .respuesta {
            margin-top: 12px;
            padding: 12px 14px;
            border-radius: 6px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
        }
        .respuesta p {
            margin-bottom: 8px;
        }
        .footer {
            padding: 16px 24px 10px;
            font-size: 11px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            background: #f9fafb;
        }
        .footer p {
            margin: 0 0 4px;
        }
        a {
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="header">
            <h1>Portal de Transparencia Activa</h1>
            <p>Ministerio de Educación – Provincia de Catamarca</p>
        </div>

        <div class="content">
            <span class="pill">
                Solicitud N° {{ $solicitud->id }}
            </span>

            <p>
                Estimado/a
                <strong>{{ $solicitud->nombre_solicitante }} {{ $solicitud->apellido_solicitante }}</strong>,
            </p>

            <p>
                En relación con su solicitud de acceso a la información pública
                (Asunto: <strong>{{ $solicitud->asunto_solicitud }}</strong>),
                le enviamos la siguiente respuesta a través del
                <strong>Portal de Transparencia Activa del Ministerio de Educación</strong>.
            </p>

            <div class="respuesta">
                {!! $respuestaHtml !!}
            </div>

            <p>
                Si usted no realizó esta solicitud o considera que se trata de un error,
                por favor ignore este mensaje o comuníquese con la Dirección de Transparencia Activa.
            </p>
        </div>

        <div class="footer">
            <p>
                Este correo ha sido generado  por el
                <strong>Portal de Transparencia Activa</strong>.
                No responda directamente a este mensaje.
            </p>
            <p>
                Ministerio de Educación, Ciencia y Tecnología – Gobierno de Catamarca.
            </p>
        </div>
    </div>
</div>
</body>
</html>
