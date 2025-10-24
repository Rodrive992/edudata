@extends('layouts.app')

@section('title', 'Herramientas - Solicitud de Cobertura de Cargos')

@section('content')
<div class="container mx-auto px-4 py-10">

    <!-- Header centrado mejorado -->
    <div class="text-center mb-10">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-medium mb-3">
            
        </div>
        <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900">
            Solicitud de Cobertura de Cargos
        </h1>
        <p class="mt-2 text-gray-600">
            Seleccioná el cargo sobre el que querés generar la solicitud.
        </p>
    </div>

    <!-- Tarjeta: Usuario -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">
        <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-xl bg-gray-200/70 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.464 14.243A7 7 0 0117 14.2V15a2 2 0 01-2 2H5a2 2 0 01-2-2v-.757a1 1 0 01.464-.843z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Usuario</h2>
                    <p class="text-sm text-gray-600">Datos vinculados al establecimiento</p>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-sm">
                <div class="space-y-1">
                    <p class="text-gray-500">Usuario</p>
                    <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-gray-500">CUE</p>
                    <div class="inline-flex items-center gap-2">
                        <span class="font-semibold text-gray-900">{{ $user->cue ?? '-' }}</span>
                        @if($user->cue)
                            <span class="px-2 py-0.5 rounded-full text-[11px] font-medium bg-gray-100 text-gray-700">verificado</span>
                        @endif
                    </div>
                </div>
                <div class="space-y-1">
                    <p class="text-gray-500">Establecimiento</p>
                    <p class="font-semibold text-gray-900">{{ $user->dependencia ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta: Cargos del establecimiento -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200 flex items-center justify-between">
            <h2 class="text-lg font-bold text-gray-900">
                Cargos del establecimiento <span class="text-gray-500 font-medium">(CUE {{ $user->cue ?? '-' }})</span>
            </h2>
            <span class="text-sm text-gray-600">{{ $cargos->count() }} registro(s)</span>
        </div>

        @if ($cargos->isEmpty())
            <div class="p-10 text-center text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto mb-3 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M4 3a2 2 0 00-2 2v8a2 2 0 002 2h5l3 3 3-3h1a2 2 0 002-2V9a1 1 0 10-2 0v4H4V5h12v1a1 1 0 002 0V5a2 2 0 00-2-2H4z"/>
                </svg>
                No se encontraron cargos para el CUE del usuario.
            </div>
        @else
            <div class="divide-y divide-gray-100">
                @foreach ($cargos as $cargo)
                    <div class="p-5 hover:bg-gray-50/60 transition">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                            <!-- Bloque izquierdo -->
                            <div class="space-y-3 w-full">
                                <!-- Badge ID -->
                                <div class="flex items-center gap-2">
                                    <span class="text-[11px] uppercase tracking-wider text-gray-500">ID cargo</span>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-gray-200 text-gray-800">
                                        #{{ $cargo->id }}
                                    </span>
                                </div>

                                <!-- Grilla de datos -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-500">Docente</p>
                                        <p class="font-semibold text-gray-900">{{ $cargo->nombre_apellido }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Cargo</p>
                                        <p class="font-semibold text-gray-900">{{ $cargo->cargo }}</p>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <p class="text-xs text-gray-500">Hs</p>
                                            <p class="font-semibold text-gray-900">{{ $cargo->hs }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Puntaje</p>
                                            <p class="font-semibold text-gray-900">{{ $cargo->puntaje }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Sit. revista</p>
                                            <p class="font-semibold text-gray-900">{{ $cargo->situacion_revista }}</p>
                                        </div>
                                    </div>
                                    <div class="md:col-span-3">
                                        <p class="text-xs text-gray-500">Establecimiento</p>
                                        <p class="font-medium text-gray-900">{{ $cargo->establecimiento }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- CTA -->
                            <div class="flex items-center justify-end">
                                <a href="{{ route('edured.herramientas.solicitudcargos.generar', $cargo->id) }}"
                                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gray-800 text-white font-semibold
                                          hover:bg-gray-900 active:scale-[.99] transition will-change-transform shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M4 3a2 2 0 00-2 2v3a1 1 0 102 0V5h12v10H4v-3a1 1 0 10-2 0v3a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4z"/>
                                        <path d="M8.293 9.293a1 1 0 011.414 0L11 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3.002 3a1 1 0 01-1.414 0l-3.002-3a1 1 0 010-1.414z"/>
                                    </svg>
                                    Generar solicitud
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
