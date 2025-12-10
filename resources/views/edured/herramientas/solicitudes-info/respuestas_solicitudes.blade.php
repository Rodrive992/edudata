@extends('layouts.app')

@section('title', 'Respuesta Solicitud')

@section('content')
    <div class="container mx-auto px-4 py-8">
        @php
            $visiblePortal = strtolower($solicitud->mostrar_solicitud ?? 'no') === 'si';
        @endphp

        {{-- Header / navegación --}}
        <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <a href="{{ route('edured.herramientas.solicitudes-info.index') }}"
                class="text-sm text-gray-600 hover:text-gray-800">&larr; Volver a solicitudes</a>

            <div class="flex flex-col md:items-end gap-1 text-sm text-gray-500">
                <div class="flex flex-wrap items-center gap-2">
                    <span>
                        Solicitud #{{ $solicitud->id }} —
                        Estado: <strong>{{ ucfirst($solicitud->estado_solicitud) }}</strong>
                    </span>

                    @if ($visiblePortal)
                        <span
                            class="inline-flex items-center px-2 py-0.5 rounded text-xs bg-green-100 text-green-800 border border-green-200">
                            Mostrada en portal
                        </span>
                    @else
                        <span
                            class="inline-flex items-center px-2 py-0.5 rounded text-xs bg-gray-100 text-gray-800 border border-gray-200">
                            Oculta en portal
                        </span>
                    @endif
                </div>

                <span class="text-xs text-gray-400">
                    Recibida el
                    {{ optional($solicitud->created_at)->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }} hs
                </span>

                @if($solicitud->fecha_respuesta)
                    <span class="text-xs text-gray-400">
                        Respondida el
                        {{ $solicitud->fecha_respuesta->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }} hs
                        @if($solicitud->usuario_respuesta)
                            por {{ $solicitud->usuario_respuesta }}
                        @endif
                    </span>
                @endif
            </div>
        </div>

        {{-- Mensajes de sesión --}}
        @if (session('ok'))
            <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3">
                {{ session('ok') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Columna izquierda: Solicitante + texto original --}}
            <div class="bg-white rounded-xl shadow border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-3">Solicitante</h2>
                <ul class="text-sm text-gray-800 space-y-1">
                    <li>
                        <span class="text-gray-500">Nombre:</span>
                        {{ $solicitud->nombre_solicitante }} {{ $solicitud->apellido_solicitante }}
                    </li>
                    <li>
                        <span class="text-gray-500">DNI:</span>
                        {{ $solicitud->dni_solicitante }}
                    </li>
                    <li>
                        <span class="text-gray-500">Email:</span>
                        {{ $solicitud->email_solicitante }}
                    </li>
                    <li>
                        <span class="text-gray-500">Teléfono:</span>
                        {{ $solicitud->telefono_solicitante ?? '—' }}
                    </li>
                </ul>

                <div class="mt-5">
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Solicitud</h3>
                    <p class="text-xs text-gray-500 mb-1">
                        Asunto:
                        <span class="font-medium text-gray-900">
                            {{ $solicitud->asunto_solicitud }}
                        </span>
                    </p>
                    <div class="mt-2 p-3 rounded-lg bg-gray-50 border border-gray-200 max-h-[32vh] overflow-y-auto">
                        <p class="whitespace-pre-line break-words text-gray-800 text-sm">
                            {{ $solicitud->solicitud_texto }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Columna derecha: Respuesta + archivo + acciones --}}
            <div class="lg:col-span-2 bg-white rounded-xl shadow border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-2">Respuesta del organismo</h2>

                @if($solicitud->fecha_respuesta)
                    <p class="text-xs text-gray-500 mb-3">
                        Respondida el
                        <strong>{{ $solicitud->fecha_respuesta->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }} hs</strong>
                        @if($solicitud->usuario_respuesta)
                            por <strong>{{ $solicitud->usuario_respuesta }}</strong>
                        @endif
                    </p>
                @endif

                <p class="text-xs text-gray-400 mb-2">
                    Esta respuesta fue generada a través del
                    <strong>Portal de Transparencia Activa</strong> y puede haber sido enviada al correo
                    <span class="font-medium">{{ $solicitud->email_solicitante }}</span>
                    según la opción seleccionada al momento de responder.
                </p>

                <p class="text-sm text-gray-500 mb-1">
                    Asunto:
                    <span class="font-medium text-gray-900">
                        {{ $solicitud->asunto_respuesta_solicitud }}
                    </span>
                </p>

                <div class="mt-3 p-4 rounded-lg bg-gray-50 border border-gray-200">
                    <div class="prose prose-sm max-w-none text-gray-800">
                        {!! $solicitud->respuesta_solicitud !!}
                    </div>
                </div>

                {{-- Archivo de respuesta (si existe) --}}
                @if ($solicitud->archivo_respuesta_solicitud)
                    <div class="mt-5 space-y-2">
                        <a class="text-sm text-blue-600 hover:underline"
                            href="{{ route('solicitudes.file.respuesta', $solicitud) }}" target="_blank">
                            Ver archivo adjunto
                        </a>

                        @php
                            $p = $solicitud->archivo_respuesta_solicitud;
                            $esPdf = \Illuminate\Support\Str::of($p)->lower()->endsWith('.pdf');
                            $esImg = \Illuminate\Support\Str::of($p)
                                ->lower()
                                ->endsWith(['.jpg', '.jpeg', '.png', '.webp', '.gif']);
                        @endphp

                        @if ($esPdf)
                            <div class="mt-2 border border-gray-200 rounded-lg overflow-hidden">
                                <iframe src="{{ route('solicitudes.file.respuesta', $solicitud) }}" class="w-full h-[60vh]"
                                    title="Vista previa PDF" loading="lazy"></iframe>
                            </div>
                        @elseif($esImg)
                            <div class="mt-2">
                                <img src="{{ route('solicitudes.file.respuesta', $solicitud) }}" alt="Archivo de respuesta"
                                    class="max-h-[60vh] rounded-lg border border-gray-200 object-contain">
                            </div>
                        @endif

                        <div>
                            <a class="text-sm text-gray-700 hover:underline"
                                href="{{ route('solicitudes.download.respuesta', $solicitud) }}">
                                Descargar archivo
                            </a>
                        </div>
                    </div>
                @endif

                {{-- Acciones: Mostrar / Ocultar en portal + volver --}}
                <div class="mt-6 flex flex-wrap items-center gap-3">
                    @if (!$visiblePortal)
                        <form method="POST"
                            action="{{ route('edured.herramientas.solicitudes-info.publicar', $solicitud) }}">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 text-sm">
                                Mostrar en el portal
                            </button>
                        </form>
                    @else
                        <form method="POST"
                            action="{{ route('edured.herramientas.solicitudes-info.ocultar', $solicitud) }}">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 rounded-md bg-yellow-500 text-white hover:bg-yellow-600 text-sm">
                                Ocultar del portal
                            </button>
                        </form>
                    @endif

                    <a href="{{ route('edured.herramientas.solicitudes-info.index') }}"
                        class="inline-flex items-center px-4 py-2 rounded-md border bg-white hover:bg-gray-50 text-gray-700 text-sm">
                        Volver al listado
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
