@extends('layouts.app')

@section('title', 'EDURED - Paso 1: Verificación de Solicitud')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('edured.herramientas.solicitudes-info.index') }}" class="text-sm text-gray-600 hover:text-gray-800">&larr; Volver</a>
        <span class="text-sm text-gray-500">Solicitud #{{ $solicitud->id }} — Estado: <strong>{{ ucfirst($solicitud->estado_solicitud) }}</strong></span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Datos del solicitante -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow border border-gray-200 p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Datos del solicitante</h2>

            <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <dt class="text-gray-500">Nombre y Apellido</dt>
                    <dd class="font-medium text-gray-900">{{ $solicitud->nombre_solicitante }} {{ $solicitud->apellido_solicitante }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">DNI</dt>
                    <dd class="font-medium text-gray-900">{{ $solicitud->dni_solicitante }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">Provincia</dt>
                    <dd class="font-medium text-gray-900">{{ $solicitud->provincia_solicitante }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">Departamento</dt>
                    <dd class="font-medium text-gray-900">{{ $solicitud->departamento_solicitante ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">Barrio</dt>
                    <dd class="font-medium text-gray-900">{{ $solicitud->barrio_solicitante ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">Código Postal</dt>
                    <dd class="font-medium text-gray-900">{{ $solicitud->codigo_postal ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">Teléfono</dt>
                    <dd class="font-medium text-gray-900">{{ $solicitud->telefono_solicitante ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">Email</dt>
                    <dd class="font-medium text-gray-900">{{ $solicitud->email_solicitante }}</dd>
                </div>
                <div class="md:col-span-2">
                    <dt class="text-gray-500">Asunto de la solicitud</dt>
                    <dd class="font-medium text-gray-900">{{ $solicitud->asunto_solicitud }}</dd>
                </div>
            </dl>
        </div>

        <!-- Imágenes DNI -->
        <div class="bg-white rounded-xl shadow border border-gray-200 p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Documentación (DNI)</h2>
            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-500 mb-1">DNI - Frente</p>
                    @if($solicitud->dni_imagen_frente)
                        <a class="block text-blue-600 hover:underline text-sm break-all"
                           href="{{ route('solicitudes.file.dni_frente', $solicitud) }}" target="_blank">
                           Ver archivo
                        </a>
                    @else
                        <p class="text-sm text-gray-400">No adjuntado</p>
                    @endif
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">DNI - Reverso</p>
                    @if($solicitud->dni_imagen_reverso)
                        <a class="block text-blue-600 hover:underline text-sm break-all"
                           href="{{ route('solicitudes.file.dni_reverso', $solicitud) }}" target="_blank">
                           Ver archivo
                        </a>
                    @else
                        <p class="text-sm text-gray-400">No adjuntado</p>
                    @endif
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <!-- Rechazar -->
                <form method="POST" action="{{ route('edured.herramientas.solicitudes-info.rechazar', $solicitud) }}">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 rounded-md bg-red-600 text-white hover:bg-red-700">
                        Rechazar
                    </button>
                </form>

                <!-- Continuar (Paso 2) -->
                <form method="POST" action="{{ route('edured.herramientas.solicitudes-info.continuar', $solicitud) }}">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 rounded-md bg-gray-900 text-white hover:bg-gray-800">
                        Continuar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
