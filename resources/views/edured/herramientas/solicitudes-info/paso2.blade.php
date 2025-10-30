@extends('layouts.app')

@section('title', 'EDURED - Paso 2: Responder Solicitud')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6 flex items-center justify-between">
        <a href="{{route('edured.herramientas.solicitudes-info.index')}}" class="text-sm text-gray-600 hover:text-gray-800">&larr; Volver</a>
        <span class="text-sm text-gray-500">Solicitud #{{ $solicitud->id }} — Estado: <strong>{{ ucfirst($solicitud->estado_solicitud) }}</strong></span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Compacto: Solicitante -->
        <div class="bg-white rounded-xl shadow border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-3">Solicitante</h2>
            <ul class="text-sm text-gray-800 space-y-1">
                <li><span class="text-gray-500">Nombre:</span> {{ $solicitud->nombre_solicitante }} {{ $solicitud->apellido_solicitante }}</li>
                <li><span class="text-gray-500">DNI:</span> {{ $solicitud->dni_solicitante }}</li>
                <li><span class="text-gray-500">Email:</span> {{ $solicitud->email_solicitante }}</li>
                <li><span class="text-gray-500">Teléfono:</span> {{ $solicitud->telefono_solicitante ?? '—' }}</li>
            </ul>
        </div>

        <!-- Descripción de la solicitud -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-3">Detalle de la solicitud</h2>
            <p class="text-sm text-gray-500 mb-1">Asunto: <span class="font-medium text-gray-900">{{ $solicitud->asunto_solicitud }}</span></p>
            <div class="mt-3 p-4 rounded-lg bg-gray-50 border border-gray-200 max-h-[40vh] overflow-y-auto">
                <p class="whitespace-pre-line break-words text-gray-800 text-sm">
                    {{ $solicitud->solicitud_texto }}
                </p>
            </div>
        </div>

        <!-- Formulario de respuesta -->
        <div class="lg:col-span-3 bg-white rounded-xl shadow border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Responder solicitud</h2>

            <form method="POST" action="{{ route('edured.herramientas.solicitudes-info.responder', $solicitud) }}" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm text-gray-700 mb-1" for="asunto_respuesta_solicitud">Asunto de la respuesta</label>
                    <input type="text" id="asunto_respuesta_solicitud" name="asunto_respuesta_solicitud"
                           value="{{ old('asunto_respuesta_solicitud', 'Respuesta a su solicitud #'.$solicitud->id) }}"
                           class="w-full border-gray-300 rounded-md"
                           required maxlength="150">
                    @error('asunto_respuesta_solicitud')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-gray-700 mb-1" for="respuesta_solicitud">Respuesta</label>
                    <textarea id="respuesta_solicitud" name="respuesta_solicitud" rows="8"
                              class="w-full border-gray-300 rounded-md"
                              required>{{ old('respuesta_solicitud') }}</textarea>
                    @error('respuesta_solicitud')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-gray-700 mb-1" for="archivo_respuesta_solicitud">Adjuntar archivo (opcional)</label>
                    <input type="file" id="archivo_respuesta_solicitud" name="archivo_respuesta_solicitud" class="block w-full text-sm">
                    <p class="text-xs text-gray-500 mt-1">Formatos: pdf, jpg, jpeg, png, webp, doc, docx, xls, xlsx, zip (máx. 8MB)</p>
                    @error('archivo_respuesta_solicitud')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror

                    @if($solicitud->archivo_respuesta_solicitud)
                        <div class="mt-3 space-y-2">
                            <!-- Ver inline usando la ruta del controller -->
                            <a class="text-sm text-blue-600 hover:underline"
                               href="{{ route('solicitudes.file.respuesta', $solicitud) }}" target="_blank">
                                Ver archivo de respuesta actual
                            </a>

                            <!-- Preview embebido (si es PDF o imagen) -->
                            @php
                                $p = $solicitud->archivo_respuesta_solicitud;
                                $esPdf = \Illuminate\Support\Str::of($p)->lower()->endsWith('.pdf');
                                $esImg = \Illuminate\Support\Str::of($p)->lower()->endsWith(['.jpg','.jpeg','.png','.webp','.gif']);
                            @endphp

                            @if($esPdf)
                                <div class="mt-2 border border-gray-200 rounded-lg overflow-hidden">
                                    <iframe src="{{ route('solicitudes.file.respuesta', $solicitud) }}"
                                            class="w-full h-[60vh]" title="Vista previa PDF" loading="lazy"></iframe>
                                </div>
                            @elseif($esImg)
                                <div class="mt-2">
                                    <img src="{{ route('solicitudes.file.respuesta', $solicitud) }}"
                                         alt="Archivo de respuesta"
                                         class="max-h-[60vh] rounded-lg border border-gray-200 object-contain">
                                </div>
                            @endif

                            <!-- Descargar -->
                            <div>
                                <a class="text-sm text-gray-700 hover:underline"
                                   href="{{ route('solicitudes.download.respuesta', $solicitud) }}">
                                    Descargar archivo
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="flex items-center gap-2">
                    <input id="enviar_email" name="enviar_email" type="checkbox" value="1"
                           class="rounded border-gray-300" {{ old('enviar_email', true) ? 'checked' : '' }}>
                    <label for="enviar_email" class="text-sm text-gray-700">Enviar correo al solicitante</label>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 rounded-md bg-gray-900 text-white hover:bg-gray-800">
                        Responder solicitud
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection