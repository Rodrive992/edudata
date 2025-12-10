@extends('layouts.app')

@section('title', 'EDURED - Paso 2: Responder Solicitud')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Header mejorado -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <!-- Botón volver -->
                <a href="{{ route('edured.herramientas.solicitudes-info.index') }}" 
                   class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors duration-200 group">
                    <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Volver al listado
                </a>

                <!-- Información de la solicitud -->
                <div class="flex flex-col md:items-end gap-1">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-sm font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Solicitud #{{ $solicitud->id }}
                        </span>
                        @php
                            $estado = strtolower($solicitud->estado_solicitud);
                            $badgeEstado = match ($estado) {
                                'pendiente' => 'bg-yellow-100 text-yellow-800',
                                'en_proceso', 'en proceso' => 'bg-blue-100 text-blue-800',
                                'respondida' => 'bg-green-100 text-green-800',
                                'rechazada' => 'bg-red-100 text-red-800',
                                default => 'bg-gray-100 text-gray-800',
                            };
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $badgeEstado }}">
                            {{ ucfirst($solicitud->estado_solicitud) }}
                        </span>
                    </div>
                    
                    <div class="flex flex-col md:flex-row md:items-center md:gap-4 text-xs text-gray-500">
                        <span class="flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Recibida el {{ optional($solicitud->created_at)->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }} hs
                        </span>

                        @if($solicitud->fecha_respuesta)
                            <span class="flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Última respuesta: {{ $solicitud->fecha_respuesta->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }} hs
                                @if($solicitud->usuario_respuesta)
                                    — por {{ $solicitud->usuario_respuesta }}
                                @endif
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Título principal -->
            <div class="mt-6">
                <h1 class="text-3xl font-bold text-gray-900">Responder Solicitud</h1>
                <p class="mt-2 text-gray-600">Complete el formulario para enviar una respuesta al solicitante</p>
            </div>
        </div>

        <!-- Grid de contenido -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Información unificada de la solicitud -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 sticky top-6">
                    <!-- Información del solicitante -->
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg font-bold text-gray-900">Solicitante</h2>
                        </div>
                        <div class="space-y-3 text-sm">
                            <div>
                                <p class="text-gray-500 text-xs font-medium">Nombre completo</p>
                                <p class="text-gray-900 font-semibold">{{ $solicitud->nombre_solicitante }} {{ $solicitud->apellido_solicitante }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs font-medium">DNI</p>
                                <p class="text-gray-900 font-semibold">{{ $solicitud->dni_solicitante }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs font-medium">Email</p>
                                <a href="mailto:{{ $solicitud->email_solicitante }}" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors duration-200 break-all">
                                    {{ $solicitud->email_solicitante }}
                                </a>
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs font-medium">Teléfono</p>
                                <p class="text-gray-900 font-semibold">
                                    @if($solicitud->telefono_solicitante)
                                        <a href="tel:{{ $solicitud->telefono_solicitante }}" class="hover:text-blue-600 transition-colors duration-200">
                                            {{ $solicitud->telefono_solicitante }}
                                        </a>
                                    @else
                                        <span class="text-gray-400">—</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Asunto y detalles de la solicitud -->
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg font-bold text-gray-900">Solicitud</h2>
                        </div>
                        
                        <!-- Asunto -->
                        <div class="mb-4">
                            <p class="text-gray-500 text-xs font-medium mb-2">Asunto</p>
                            <p class="text-gray-900 font-semibold bg-purple-50 rounded-lg px-3 py-2 border border-purple-100 text-sm">
                                {{ $solicitud->asunto_solicitud }}
                            </p>
                        </div>

                        <!-- Detalle de la solicitud -->
                        <div>
                            <p class="text-gray-500 text-xs font-medium mb-2">Detalle</p>
                            <div class="p-3 rounded-xl bg-gray-50 border border-gray-200 max-h-60 overflow-y-auto">
                                <p class="whitespace-pre-line break-words text-gray-800 text-sm leading-relaxed">
                                    {{ $solicitud->solicitud_texto }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario de respuesta -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Formulario de respuesta</h2>
                            <p class="text-sm text-gray-500 mt-1">Complete los campos para enviar la respuesta</p>
                        </div>
                    </div>

                    @if ($solicitud->fecha_respuesta)
                        <div class="mb-6 p-4 rounded-xl bg-blue-50 border border-blue-200">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="text-sm text-blue-800">
                                    <p class="font-medium">Ya existe una respuesta registrada</p>
                                    <p class="mt-1">
                                        Última respuesta el 
                                        <strong>{{ $solicitud->fecha_respuesta->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }} hs</strong>
                                        @if ($solicitud->usuario_respuesta)
                                            por <strong>{{ $solicitud->usuario_respuesta }}</strong>
                                        @endif
                                    </p>
                                    <p class="mt-1 text-blue-700">Puede actualizar la respuesta si es necesario.</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (session('debug_mail'))
                        <div class="mb-6 rounded-xl bg-yellow-50 border-l-4 border-yellow-400 p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-yellow-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold text-yellow-800">DEBUG ENVÍO DE MAIL</h3>
                                    <pre class="mt-2 text-xs p-3 bg-white rounded-lg border border-yellow-200 overflow-auto text-yellow-900">{{ print_r(session('debug_mail'), true) }}</pre>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('edured.herramientas.solicitudes-info.responder', $solicitud) }}"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Asunto de respuesta -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="asunto_respuesta_solicitud">
                                Asunto de la respuesta
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="asunto_respuesta_solicitud" name="asunto_respuesta_solicitud"
                                value="{{ old('asunto_respuesta_solicitud', $solicitud->asunto_respuesta_solicitud ?? 'Respuesta a su solicitud #' . $solicitud->id) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                required maxlength="150" placeholder="Ingrese el asunto de la respuesta...">
                            @error('asunto_respuesta_solicitud')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Respuesta - Mayor espacio -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="respuesta_solicitud">
                                Respuesta
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="border border-gray-300 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition-all duration-200">
                                <textarea id="respuesta_solicitud" name="respuesta_solicitud" rows="16" 
                                    class="w-full px-4 py-3 border-0 focus:ring-0 resize-none"
                                    placeholder="Escriba la respuesta detallada aquí...">{{ old('respuesta_solicitud', $solicitud->respuesta_solicitud) }}</textarea>
                            </div>
                            @error('respuesta_solicitud')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Puede aplicar formato (negritas, listas, enlaces, citas, etc.)
                            </p>
                        </div>

                        <!-- Archivo adjunto -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="archivo_respuesta_solicitud">
                                Adjuntar archivo (opcional)
                            </label>
                            <input type="file" id="archivo_respuesta_solicitud" name="archivo_respuesta_solicitud"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors duration-200">
                            <p class="mt-2 text-xs text-gray-500">
                                Formatos permitidos: PDF, JPG, JPEG, PNG, WEBP, DOC, DOCX, XLS, XLSX, ZIP (máx. 8MB)
                            </p>
                            @error('archivo_respuesta_solicitud')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror

                            <!-- Vista previa del archivo actual -->
                            @if ($solicitud->archivo_respuesta_solicitud)
                                <div class="mt-4 p-4 rounded-xl bg-gray-50 border border-gray-200">
                                    <h4 class="text-sm font-medium text-gray-700 mb-3">Archivo de respuesta actual</h4>
                                    <div class="flex items-center gap-3 mb-3">
                                        <a class="inline-flex items-center px-3 py-2 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors duration-200 text-sm font-medium"
                                           href="{{ route('solicitudes.file.respuesta', $solicitud) }}" target="_blank">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Ver archivo
                                        </a>
                                        <a class="inline-flex items-center px-3 py-2 rounded-lg bg-green-50 text-green-700 hover:bg-green-100 transition-colors duration-200 text-sm font-medium"
                                           href="{{ route('solicitudes.download.respuesta', $solicitud) }}">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            Descargar
                                        </a>
                                    </div>

                                    @php
                                        $p = $solicitud->archivo_respuesta_solicitud;
                                        $esPdf = \Illuminate\Support\Str::of($p)->lower()->endsWith('.pdf');
                                        $esImg = \Illuminate\Support\Str::of($p)
                                            ->lower()
                                            ->endsWith(['.jpg', '.jpeg', '.png', '.webp', '.gif']);
                                    @endphp

                                    @if ($esPdf)
                                        <div class="mt-3 border border-gray-200 rounded-lg overflow-hidden">
                                            <iframe src="{{ route('solicitudes.file.respuesta', $solicitud) }}"
                                                class="w-full h-64" title="Vista previa PDF" loading="lazy"></iframe>
                                        </div>
                                    @elseif($esImg)
                                        <div class="mt-3">
                                            <img src="{{ route('solicitudes.file.respuesta', $solicitud) }}"
                                                alt="Archivo de respuesta"
                                                class="max-h-64 rounded-lg border border-gray-200 object-contain mx-auto">
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Envío de email -->
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200">
                            <input id="enviar_email" name="enviar_email" type="checkbox" value="1"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                {{ old('enviar_email', true) ? 'checked' : '' }}>
                            <label for="enviar_email" class="text-sm font-medium text-gray-700 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Enviar correo electrónico al solicitante
                            </label>
                        </div>

                        <!-- Botón de envío -->
                        <div class="flex justify-end pt-4 border-t border-gray-200">
                            <button type="submit"
                                class="inline-flex items-center px-8 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold hover:from-blue-700 hover:to-blue-800 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Enviar respuesta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- CKEditor 5 (Classic) --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const textarea = document.querySelector('#respuesta_solicitud');

            if (textarea) {
                ClassicEditor
                    .create(textarea, {
                        language: 'es',
                        toolbar: [
                            'heading', '|',
                            'bold', 'italic', 'link',
                            'bulletedList', 'numberedList',
                            'blockQuote', '|',
                            'undo', 'redo'
                        ]
                    })
                    .catch(error => {
                        console.error('Error al inicializar CKEditor:', error);
                    });
            }
        });
    </script>
@endsection