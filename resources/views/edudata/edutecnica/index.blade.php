{{-- resources/views/edudata/edutecnica/index.blade.php --}}

@php
    $openDefault = false;
    $anio = 2025;
@endphp

@extends('layouts.app')

@section('title', 'Educación Técnica')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-[color:var(--gray-200)] overflow-hidden mb-6">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <!-- Imagen centrada y responsiva -->
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-edutecnica.png') }}" alt="Educación Técnica"
                        class="w-full max-w-2xl h-auto object-contain rounded-xl">
                </div>

                <!-- Texto descriptivo mejorado -->
                <div class="mb-4 md:mb-6">
                    <div class="space-y-4">
                        <!-- Sección de características -->
                        <div class="bg-gradient-to-br from-[#f0f4ff] to-[#f8f7ff] rounded-xl p-4 md:p-5 my-4 border border-[color:var(--pri-500)]/20"
                             style="--tw-gradient-from: #f0f4ff; --tw-gradient-to: #f8f7ff;">
                            <!-- Descripción principal -->
                            <div class="text-center mb-4 md:mb-5">
                                <p class="text-[color:var(--ink)] leading-relaxed text-base md:text-lg">
                                    La <span class="font-semibold text-[color:var(--pri-700)]">Dirección Provincial de Educación Técnica,
                                        Agrotécnica y Formación Profesional</span>
                                    impulsa la <span class="bg-[color:var(--sec-500)]/20 px-1 rounded">formación técnica especializada</span>
                                    que integra <span class="font-medium text-[color:var(--ter-500)]">conocimientos científicos y
                                        tecnológicos</span>
                                    con las demandas del sector productivo provincial.
                                </p>
                            </div>

                            <!-- Características en grid -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--sec-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--sec-500)]"
                                                   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">Formación Técnica</p>
                                            <p class="text-xs text-gray-600 mt-1">Programas educativos integrales</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 2 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--pri-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-500)]"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">Vinculación Productiva</p>
                                            <p class="text-xs text-gray-600 mt-1">Articulación con el sector productivo</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 3 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--ter-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--ter-500)]"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">Innovación Tecnológica</p>
                                            <p class="text-xs text-gray-600 mt-1">Equipamiento y centros especializados</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--pri-500)] rounded-full mr-2"></span>Educación técnica
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--sec-500)] rounded-full mr-2"></span>Formación agrotécnica
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--ter-500)] rounded-full mr-2"></span>Vinculación productiva
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Educación Técnica -->
            <div class="p-4 md:p-6 pt-4">
                <!-- Presentación -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] p-4 md:p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-[color:var(--pri-500)]/10 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[color:var(--pri-500)]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h2 class="text-lg md:text-xl font-semibold text-[color:var(--ink)]">Fortalecimiento de la Educación Técnica</h2>
                    </div>
                    <p class="text-[color:var(--ink)] leading-relaxed mb-4 md:mb-6 text-sm md:text-base">
                        Actividades la Dirección Provincial de Educación
                        Técnica, Agrotécnica y Formación Profesional durante el período 2025. Estas actividades se orientan
                        al fortalecimiento de la educación técnica y agrotécnica en la provincia, a través de la articulación
                        con distintos actores del sistema educativo, el sector productivo y otros ministerios, con el objetivo
                        de garantizar una formación integral y de calidad para los estudiantes.
                    </p>

                    <!-- Botón para descargar el PDF -->
                    <div class="mt-4">
                        <a href="{{ asset('archivos/Programa39-Financiamiento.pdf') }}"
                            download="Programa39-Financiamiento.pdf"
                            class="inline-flex items-center px-4 py-2 bg-[color:var(--pri-700)] hover:bg-[color:var(--pri-900)] border border-transparent rounded-lg font-semibold text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[color:var(--pri-500)] transition ease-in-out duration-150 text-sm md:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Programa y Financiamiento
                        </a>
                    </div>
                </div>

                {{-- ✅ Bloque INET 2025 (Partial) --}}
                @include('edudata.partials.exp-inet', [
                    'anio' => 2025,
                    'titulo' => 'Ejecución de financiamiento INET',
                    'subtitulo' => 'Control de expedientes y estado de avance (2025)',
                ])
            </div>
        </div>

        <!-- SOLAPA ESTILO MANTENIMIENTO CON CONTENIDO DE ACCIONES -->
        @include('edudata.partials.tareas-edu-tecnica', [
            'anio' => 2025,
            'openDefault' => false
        ])

    </div>

    <style>
        .feature-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
    </style>
@endsection