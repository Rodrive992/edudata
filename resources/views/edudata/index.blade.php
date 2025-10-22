@extends('layouts.app')

@section('title', 'Edudata - Portal de Transparencia Educativa')

@section('content')
    <!-- Fondo blanco para toda la vista -->
    <div class="bg-white">

        {{-- Carrusel --}}
        <section x-data="{
            i: 0,
            imgs: [
                '{{ asset('images/banner-portal-v6.png') }}',
                '{{ asset('images/banner-portal2-v6.png') }}'
            ],
            intervalId: null,
            start() { this.intervalId = setInterval(() => this.next(), 4000) },
            stop() { if (this.intervalId) clearInterval(this.intervalId) },
            next() { this.i = (this.i + 1) % this.imgs.length },
            prev() { this.i = (this.i - 1 + this.imgs.length) % this.imgs.length }
        }" x-init="start()" @mouseenter="stop()" @mouseleave="start()"
            class="relative left-1/2 right-1/2 -mx-[50vw] w-screen">

            <div class="relative w-full h-[100px] sm:h-[340px] md:h-[420px] lg:h-[435px] bg-white">
                <!-- Slides -->
                <template x-for="(src, idx) in imgs" :key="idx">
                    <div x-show="i === idx" x-transition.opacity.duration.500ms class="absolute inset-0">
                        <img :src="src" :alt="`Banner ${idx+1}`" class="w-full h-full object-cover block"
                            loading="eager" fetchpriority="high" />
                    </div>
                </template>

                <!-- Controles -->
                <button @click="prev()"
                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white rounded-full p-2 shadow outline-none"
                    aria-label="Anterior">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next()"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white rounded-full p-2 shadow outline-none"
                    aria-label="Siguiente">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Indicadores -->
                <div class="absolute bottom-3 w-full flex items-center justify-center gap-2">
                    <template x-for="(src, idx) in imgs" :key="idx">
                        <button @click="i = idx" class="h-2.5 w-2.5 rounded-full transition-all"
                            :class="i === idx ? 'bg-white w-4' : 'bg-white/40'" aria-label="Ir a la imagen"></button>
                    </template>
                </div>
            </div>
        </section>

        {{-- TARJETAS CON EXPLICACIÓN IZQUIERDA Y SOLICITUD DERECHA --}}
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-3">

            @php

                // Paleta de colores más contrastante pero coherente
                $colorPalette = [
                    'border-blue-500', // Azul intenso
                    'border-cyan-500', // Cian vibrante
                    'border-indigo-500', // Índigo profundo
                    'border-sky-500', // Azul cielo intenso
                    'border-blue-600', // Azul oscuro
                    'border-cyan-600', // Cian oscuro
                    'border-indigo-600', // Índigo oscuro
                    'border-sky-600', // Azul cielo oscuro
                    'border-blue-400', // Azul medio
                    'border-cyan-400', // Cian medio
                ];

                // Base path para las imágenes
                $imgBasePath = 'images/tarjeta-';
                $imgExtension = '-v6.png';

                $cards = [
                    [
                        'href' => route('edudata.mantenimiento'),
                        'alt' => 'Mantenimiento Establecimientos',
                        'color' => $colorPalette[2],
                        'image' => $imgBasePath . 'mantenimiento' . $imgExtension,
                    ],
                    [
                        'href' => route('edudata.normativa'),
                        'alt' => 'Normativa Educativa',
                        'color' => $colorPalette[1],
                        'image' => $imgBasePath . 'normativa' . $imgExtension,
                    ],
                    [
                        'href' => route('edudata.formacion'),
                        'alt' => 'Formación y Programación',
                        'color' => $colorPalette[5],
                        'image' => $imgBasePath . 'formacion' . $imgExtension,
                    ],
                    [
                        'href' => route('edudata.programas'),
                        'alt' => 'Programas y Proyectos',
                        'color' => $colorPalette[8],
                        'image' => $imgBasePath . 'programas' . $imgExtension,
                    ],
                    [
                        'href' => route('edudata.edutecnica'),
                        'alt' => 'Educación Técnica',
                        'color' => $colorPalette[3],
                        'image' => $imgBasePath . 'edutecnica' . $imgExtension,
                    ],
                    [
                        'href' => route('edudata.innovacion'),
                        'alt' => 'Innovación Educativa',
                        'color' => $colorPalette[4],
                        'image' => $imgBasePath . 'innovacion' . $imgExtension,
                    ],

                    [
                        'href' => route('edudata.asuntos'),
                        'alt' => 'Asuntos Jurídicos',
                        'color' => $colorPalette[6],
                        'image' => $imgBasePath . 'asuntos' . $imgExtension,
                    ],
                    [
                        'href' => route('edudata.titulos'),
                        'alt' => 'Títulos y Certificaciones',
                        'color' => $colorPalette[7],
                        'image' => $imgBasePath . 'titulos' . $imgExtension,
                    ],

                    [
                        'href' => route('edudata.residencia'),
                        'alt' => 'Residencia Universitaria',
                        'color' => $colorPalette[9],
                        'image' => $imgBasePath . 'residencia' . $imgExtension,
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">

                <!-- Recuadro de explicación - Columna izquierda - DISEÑO MEJORADO -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden h-full">
                        <!-- Header con gradiente profesional -->
                        <div class="bg-gradient-to-r from-[#f5cb58] to-[#ddb954] px-6 py-3">
                            <div class="flex items-center justify-center">
                                <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <h2 class="text-white font-bold text-lg text-center">
                                    Transparencia
                                </h2>
                            </div>
                        </div>

                        <!-- Contenido -->
                        <div class="p-6">
                            <div class="space-y-4 text-gray-700 text-sm leading-relaxed text-justify">
                                <p>
                                    En el marco de la <strong class="text-blue-600">Ley N.º 2.275 de Acceso a la Información
                                        Pública</strong>, el
                                    Ministerio de Educación, Ciencia y Tecnología de la Provincia de Catamarca pone a
                                    disposición de la ciudadanía un portal de acceso público que permite conocer el
                                    funcionamiento y el uso de los recursos públicos de su dependencia.
                                </p>

                                <p>
                                    El portal forma parte del sistema <strong class="text-blue-600">EDUDATA</strong>,
                                    desarrollado por la Dirección de
                                    Transparencia Activa, y tiene como objetivo garantizar una gestión abierta, eficiente y
                                    accesible, permitiendo que cada área del ministerio publique información actualizada y
                                    relevante para todos los ciudadanos.
                                </p>
                            </div>

                            <!-- Badge informativo mejorado -->
                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-xs text-gray-600">
                                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                        <span class="font-medium">Información actualizada</span>
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        Ley 2.275
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenedor de tarjetas scrollable - Columna centro -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-md overflow-hidden h-full">
                        <!-- Encabezado más compacto -->
                        <div class="bg-gradient-to-r from-[#6bbde5] to-blue-500 px-4 py-3">
                            <h2 class="text-white font-bold text-lg text-center">
                                Consultar Información
                            </h2>
                        </div>

                        <!-- Contenedor scrollable con menos padding -->
                        <div
                            class="h-[540px] overflow-y-auto scrollbar-thin scrollbar-thumb-blue-300 scrollbar-track-blue-100">
                            <div class="flex flex-col">
                                @foreach ($cards as $index => $card)
                                    <a href="{{ $card['href'] }}"
                                        class="group block w-full bg-white transition-all duration-300 ease-out
                                              hover:bg-blue-50 relative
                                              {{ $index !== count($cards) - 1 ? 'border-b-4 ' . $card['color'] : '' }}
                                              px-4 py-3">

                                        <!-- Separador decorativo más grueso -->
                                        @if ($index !== count($cards) - 1)
                                            <div
                                                class="absolute bottom-0 left-4 right-4 h-1 bg-gradient-to-r {{ $card['color'] }} opacity-80">
                                            </div>
                                        @endif

                                        <!-- Contenedor de imagen más grande -->
                                        <div class="relative overflow-hidden w-full">
                                            <img src="{{ asset($card['image']) }}" alt="{{ $card['alt'] }}"
                                                class="w-full h-auto max-h-28 object-contain block transition-transform duration-500 group-hover:scale-110"
                                                loading="lazy" decoding="async" draggable="false" />

                                            <!-- Overlay más contrastante -->
                                            <div
                                                class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/10 transition-all duration-300 rounded">
                                            </div>

                                            <!-- Indicador de hover más visible -->
                                            <div
                                                class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                                <div
                                                    class="bg-white/95 backdrop-blur-sm rounded-full p-2 shadow-lg border border-blue-200">
                                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Efecto de borde lateral más grueso -->
                                        <div
                                            class="absolute left-0 top-0 bottom-0 w-2 bg-gradient-to-b from-blue-400 to-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recuadro de Solicitud de Información - Columna derecha - DISEÑO MEJORADO -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden h-full">
                        <!-- Header con gradiente profesional -->
                        <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-3">
                            <div class="flex items-center justify-center">
                                <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h2 class="text-white font-bold text-lg text-center">
                                    Solicitud
                                </h2>
                            </div>
                        </div>

                        <!-- Contenido -->
                        <div class="p-6">
                            <!-- Cartel informativo -->
                            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-green-600 mt-0.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-green-800 text-sm text_center font-medium">
                                            Solicitar información pública del Ministerio de Educación, Ciencia y Tecnología
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <!-- Lista de pasos mejorada -->
                                <div class="space-y-4">
                                    <div class="flex items-start group/step">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-4 mt-0.5 transition-all group-hover/step:bg-green-200">
                                            1
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-gray-700 text-sm font-medium">Ingresa al <a href="{{ route('edudata.solicitud-info') }}"
                                                    class="text-green-600 hover:text-green-700 underline font-semibold">formulario</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-start group/step">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-4 mt-0.5 transition-all group-hover/step:bg-green-200">
                                            2
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-gray-700 text-sm">Completa con tus datos personales</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start group/step">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-4 mt-0.5 transition-all group-hover/step:bg-green-200">
                                            3
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-gray-700 text-sm">Escribe la información que deseas solicitar
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-start group/step">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-4 mt-0.5 transition-all group-hover/step:bg-green-200">
                                            4
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-gray-700 text-sm">Envía el formulario</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start group/step">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-4 mt-0.5 transition-all group-hover/step:bg-green-200">
                                            5
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-gray-700 text-sm">Consulta tu solicitud en <a href="{{ route('edudata.solicitud-info.registro_solicitudes_info') }}"
                                                    class="text-green-600 hover:text-green-700 underline font-semibold">Registro
                                                    de Solicitudes</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Call to action -->
                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <a href="{{ route('edudata.solicitud-info') }}"
                                    class="block w-full bg-green-500 hover:bg-green-600 text-white text-center py-2 px-4 rounded-lg font-medium transition-colors duration-200">
                                    Iniciar Solicitud
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('styles')
        <style>
            /* Scrollbar más contrastante */
            .scrollbar-thin::-webkit-scrollbar {
                width: 8px;
            }

            .scrollbar-thumb-blue-300::-webkit-scrollbar-thumb {
                background-color: #93c5fd;
                border-radius: 4px;
            }

            .scrollbar-thumb-blue-300::-webkit-scrollbar-thumb:hover {
                background-color: #60a5fa;
            }

            .scrollbar-track-blue-100::-webkit-scrollbar-track {
                background-color: #dbeafe;
            }
        </style>
    @endpush
@endsection
