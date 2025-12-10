@extends('layouts.app')

@section('title', 'Paso 1: Verificación de Solicitud')

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
            <h1 class="text-3xl font-bold text-gray-900">Verificación de Solicitud</h1>
            <p class="mt-2 text-gray-600">Revise los datos del solicitante antes de continuar con la gestión</p>
        </div>
    </div>

    <!-- Grid de contenido -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Datos del solicitante -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Datos del solicitante</h2>
                        <p class="text-sm text-gray-500 mt-1">Información personal y de contacto</p>
                    </div>
                </div>

                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">Nombre y Apellido</dt>
                            <dd class="text-lg font-semibold text-gray-900 bg-gray-50 rounded-lg px-3 py-2">
                                {{ $solicitud->nombre_solicitante }} {{ $solicitud->apellido_solicitante }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">DNI</dt>
                            <dd class="font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2">
                                {{ $solicitud->dni_solicitante }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">Provincia</dt>
                            <dd class="font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2">
                                {{ $solicitud->provincia_solicitante }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">Departamento</dt>
                            <dd class="font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2">
                                {{ $solicitud->departamento_solicitante ?? '—' }}
                            </dd>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">Barrio</dt>
                            <dd class="font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2">
                                {{ $solicitud->barrio_solicitante ?? '—' }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">Código Postal</dt>
                            <dd class="font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2">
                                {{ $solicitud->codigo_postal ?? '—' }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">Teléfono</dt>
                            <dd class="font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2">
                                @if($solicitud->telefono_solicitante)
                                    <a href="tel:{{ $solicitud->telefono_solicitante }}" class="hover:text-blue-600 transition-colors duration-200">
                                        {{ $solicitud->telefono_solicitante }}
                                    </a>
                                @else
                                    —
                                @endif
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 mb-1">Email</dt>
                            <dd class="font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2">
                                <a href="mailto:{{ $solicitud->email_solicitante }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-200">
                                    {{ $solicitud->email_solicitante }}
                                </a>
                            </dd>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <dt class="text-sm font-medium text-gray-500 mb-1">Asunto de la solicitud</dt>
                        <dd class="font-medium text-gray-900 bg-blue-50 border border-blue-100 rounded-lg px-4 py-3">
                            {{ $solicitud->asunto_solicitud }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Panel lateral - Documentación y acciones -->
        <div class="space-y-6">
            <!-- Documentación DNI -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200">
                    <div class="p-2 bg-amber-100 rounded-lg">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Documentación (DNI)</h2>
                        <p class="text-sm text-gray-500 mt-1">Archivos adjuntos del solicitante</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- DNI Frente -->
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-gray-300 transition-colors duration-200">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-700">DNI - Frente</span>
                            </div>
                            @if($solicitud->dni_imagen_frente)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Adjuntado
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    No adjuntado
                                </span>
                            @endif
                        </div>
                        @if($solicitud->dni_imagen_frente)
                            <a href="{{ route('solicitudes.file.dni_frente', $solicitud) }}" 
                               target="_blank"
                               class="inline-flex items-center px-3 py-2 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors duration-200 text-sm font-medium">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Ver archivo
                            </a>
                        @endif
                    </div>

                    <!-- DNI Reverso -->
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-gray-300 transition-colors duration-200">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-700">DNI - Reverso</span>
                            </div>
                            @if($solicitud->dni_imagen_reverso)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Adjuntado
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    No adjuntado
                                </span>
                            @endif
                        </div>
                        @if($solicitud->dni_imagen_reverso)
                            <a href="{{ route('solicitudes.file.dni_reverso', $solicitud) }}" 
                               target="_blank"
                               class="inline-flex items-center px-3 py-2 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors duration-200 text-sm font-medium">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Ver archivo
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Acciones -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Continuar gestión</h2>
                        <p class="text-sm text-gray-500 mt-1">Proceda con el siguiente paso</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('edured.herramientas.solicitudes-info.continuar', $solicitud) }}">
                    @csrf
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center px-6 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold hover:from-blue-700 hover:to-blue-800 shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                        Continuar al Paso 2
                    </button>
                </form>

                <p class="text-xs text-gray-500 mt-3 text-center">
                    Será redirigido al formulario de respuesta
                </p>
            </div>
        </div>
    </div>
</div>
@endsection