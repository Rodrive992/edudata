@extends('layouts.app')

@section('title', 'Portal de Transparencia')

@section('content')
    <div class="bg-[#FFFFFF]">
        {{-- ==================== HERO (solo texto) móvil – versión profesional ==================== --}}
        <section class="md:hidden relative left-1/2 right-1/2 -mx-[50vw] w-screen">
            <div class="relative overflow-hidden bg-gradient-to-br from-[var(--pri-500)] via-[var(--pri-700)] to-[var(--pri-900)]">

                <!-- Efecto de brillo diagonal animado -->
                <div class="absolute inset-0 pointer-events-none">
                    <div
                        class="absolute -inset-x-1 top-0 h-[140%] opacity-[0.08]
          bg-gradient-to-tr from-white via-transparent to-white
          animate-[sweep_6s_linear_infinite]">
                    </div>
                </div>

                <!-- Contenido principal -->
                <div class="relative px-6 py-14">
                    <div class="max-w-[720px] mx-auto text-center text-white" x-data="{
                        showTitle: false,
                        showUnderline: false,
                        showAccess: false,
                        init() {
                            setTimeout(() => {
                                this.showTitle = true;
                                this.showUnderline = true
                            }, 100);
                            setTimeout(() => { this.showAccess = true }, 1600);
                        }
                    }">

                        <!-- Título -->
                        <h1 x-show="showTitle" x-transition.opacity.duration.600ms
                            class="text-[30px] leading-tight font-extrabold tracking-tight drop-shadow-sm font-primary">
                            Portal de Transparencia
                        </h1>

                        <!-- Descripción unificada con efecto de escritura -->
                        <div x-data="{
                            fullText: 'Acceso a la Información Pública del Ministerio de Educación, Ciencia y Tecnología de la provincia de Catamarca.',
                            displayedText: '',
                            index: 0,
                            isTyping: false,
                            init() {
                                setTimeout(() => {
                                    this.isTyping = true;
                                    this.typeWriter();
                                }, 800);
                            },
                            typeWriter() {
                                if (this.index < this.fullText.length) {
                                    this.displayedText += this.fullText.charAt(this.index);
                                    this.index++;
                                    setTimeout(() => this.typeWriter(), 30);
                                } else {
                                    this.isTyping = false;
                                }
                            }
                        }" class="mt-4 text-center">

                            <!-- Subrayado que aparece antes de la escritura -->
                            <span x-show="!isTyping && index > 0" x-transition.scale.origin-center.duration.500ms
                                class="inline-block h-[3px] w-32 mx-auto bg-white/90 rounded mb-4">
                            </span>

                            <!-- Texto que se escribe -->
                            <p x-text="displayedText"
                                class="text-[15px] leading-relaxed text-white/95 min-h-[60px] flex items-center justify-center">
                                <span x-show="isTyping" class="inline-block w-1 h-4 bg-white/80 ml-1 animate-pulse"></span>
                            </p>
                        </div>

                        <!-- Dirección de Transparencia Activa en negrita -->
                        <div class="mt-4">
                            <p class="text-[16px] font-bold text-white/95">
                                Dirección de Transparencia Activa
                            </p>
                        </div>

                        <!-- Logo del ministerio - más grande y antes del botón -->
                        <div class="mt-7 mb-6 flex justify-center">
                            <div class="p-3">
                                <img src="{{ asset('images/logo-ministerio-blanco.png') }}"
                                    alt="Ministerio de Educación, Ciencia y Tecnología" class="h-16 w-auto object-contain">
                            </div>
                        </div>

                        <!-- Botón CTA - más llamativo y con efectos mejorados -->
                        <div class="flex items-center justify-center">
                            <a href="{{ route('edudata.solicitud-info') }}"
                                class="group relative inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-gradient-to-r from-white to-blue-50 text-[var(--pri-900)]
                        font-bold text-sm shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1
                        border border-white/30 overflow-hidden">

                                <!-- Efecto de brillo en hover -->
                                <span
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent 
                            -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>

                                Solicitar información
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Animación keyframes -->
        <style>
            @keyframes sweep {
                0% {
                    transform: translateX(-25%) skewX(-10deg);
                }

                50% {
                    transform: translateX(25%) skewX(-10deg);
                }

                100% {
                    transform: translateX(-25%) skewX(-10deg);
                }
            }
        </style>

        {{-- ==================== Presentación (solo desktop/tablet) ==================== --}}
        @include('edudata.partials.presentacion-index')

        {{-- ==================== Sección de estadísticas (compacta) ==================== --}}
        <section class="relative">
         
            <div
                class="absolute inset-x-0 -top-2 h-[2px] bg-gradient-to-r from-transparent via-[color:var(--pri-500)] to-transparent">
            </div>

            <div class="estadisticas-bg">
                <div class="container mx-auto px-4 py-4"> 
                    @include('edudata.partials.estadisticas-index')
                </div>
            </div>

            <div
                class="absolute inset-x-0 -bottom-2 h-[2px] bg-gradient-to-r from-transparent via-[color:var(--pri-500)] to-transparent">
            </div>
        </section>

        {{-- ==================== Resto del contenido ==================== --}}
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-3">
            @php
                $colorPalette = [
                    'border-[var(--pri-900)]',
                    'border-[var(--pri-700)]',
                    'border-[var(--pri-500)]',
                    'border-[var(--sec-500)]',
                    'border-[var(--ter-500)]',
                    'border-[var(--acc-500)]',
                ];
                $imgBasePath = 'images/tarjeta-';
                $imgExtension = '-v6-v2.png';
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
                        'href' => route('edudata.asambleas'),
                        'alt' => 'Cobertura de Cargos',
                        'color' => $colorPalette[1],
                        'image' => $imgBasePath . 'asambleas' . $imgExtension,
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
                        'color' => $colorPalette[4],
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
                        'color' => $colorPalette[0],
                        'image' => $imgBasePath . 'asuntos' . $imgExtension,
                    ],
                    [
                        'href' => route('edudata.titulos'),
                        'alt' => 'Títulos y Certificaciones',
                        'color' => $colorPalette[5],
                        'image' => $imgBasePath . 'titulos' . $imgExtension,
                    ],
                    [
                        'href' => route('edudata.residencia'),
                        'alt' => 'Residencia Universitaria',
                        'color' => $colorPalette[4],
                        'image' => $imgBasePath . 'residencia' . $imgExtension,
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
                {{-- Columna izquierda: Transparencia --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden h-full">
                        <div class="bg-gradient-to-r from-[var(--sec-500)] to-[#b8bd37] px-6 py-3">
                            <div class="flex items-center justify-center">
                                <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <h2 class="text-white font-bold text-lg text-center font-primary">Transparencia</h2>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4 text-gray-700 text-sm leading-relaxed text-justify">
                                <p>En el marco de la <strong class="text-[var(--pri-700)]">Ley N.º 27.275 de Acceso a la
                                        Información
                                        Pública</strong>,
                                    el Ministerio de Educación, Ciencia y Tecnología de Catamarca pone a disposición de la
                                    ciudadanía
                                    un portal para conocer el funcionamiento y uso de los recursos públicos.</p>
                                <p>El portal integra el sistema <strong class="text-[var(--pri-700)]">EDUDATA</strong>,
                                    desarrollado
                                    por la Dirección de
                                    Transparencia Activa, promoviendo una gestión abierta, eficiente y accesible con
                                    información actualizada.</p>
                            </div>
                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-xs text-gray-600">
                                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                        <span class="font-medium">Información actualizada</span>
                                    </div>
                                    <span class="bg-[#64A1D5] text-white px-1 py-1 ">17-11-2025</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Columna centro: Tarjetas --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-md overflow-hidden h-full">
                        <div class="bg-[#64A1D5] px-4 py-3">
                            <h2 class="text-white font-bold text-lg text-center font-primary">Consultar información por área</h2>
                        </div>
                        <div
                            class="h-[540px] overflow-y-auto scrollbar-thin scrollbar-thumb-[var(--pri-500)] scrollbar-track-blue-100">
                            <div class="flex flex-col">
                                @foreach ($cards as $index => $card)
                                    <a href="{{ $card['href'] }}"
                                        class="group block w-full bg-white transition-all duration-300 ease-out hover:bg-blue-50 relative
                                              {{ $index !== count($cards) - 1 ? 'border-b-4 ' . $card['color'] : '' }} px-4 py-3">
                                        @if ($index !== count($cards) - 1)
                                            <div
                                                class="absolute bottom-0 left-4 right-4 h-1 bg-gradient-to-r {{ $card['color'] }} opacity-80">
                                            </div>
                                        @endif
                                        <div class="relative overflow-hidden w-full">
                                            <img src="{{ asset($card['image']) }}" alt="{{ $card['alt'] }}"
                                                class="w-full h-auto max-h-28 object-contain block transition-transform duration-500 group-hover:scale-110"
                                                loading="lazy" decoding="async" draggable="false" />
                                            <div
                                                class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/10 transition-all duration-300 rounded">
                                            </div>
                                            <div
                                                class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                                <div
                                                    class="bg-white/95 backdrop-blur-sm rounded-full p-2 shadow-lg border border-blue-200">
                                                    <svg class="w-4 h-4 text-blue-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute left-0 top-0 bottom-0 w-2 bg-gradient-to-b from-[var(--pri-500)] to-[var(--pri-700)] opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Columna derecha: Solicitud --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden h-full">
                        <div class="bg-gradient-to-r from-[var(--ter-500)] to-[#5a9792] px-6 py-3">
                            <div class="flex items-center justify-center">
                                <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h2 class="text-white font-bold text-lg text-center font-primary">Solicitud</h2>
                            </div>
                        </div>
                        <div class="p-6">
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
                                <div class="space-y-4">
                                    <div class="flex items-start group/step">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-4 mt-0.5 transition-all group-hover/step:bg-green-200">
                                            1</div>
                                        <div class="flex-1">
                                            <p class="text-gray-700 text-sm font-medium">Ingresa al
                                                <a href="{{ route('edudata.solicitud-info') }}"
                                                    class="text-green-600 hover:text-green-700 underline font-semibold">formulario</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-start group/step">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-4 mt-0.5 transition-all group-hover/step:bg-green-200">
                                            2</div>
                                        <div class="flex-1">
                                            <p class="text-gray-700 text-sm">Completa con tus datos personales</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start group/step">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-4 mt-0.5 transition-all group-hover/step:bg-green-200">
                                            3</div>
                                        <div class="flex-1">
                                            <p class="text-gray-700 text-sm">Escribe la información que deseas solicitar
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-start group/step">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-4 mt-0.5 transition-all group-hover/step:bg-green-200">
                                            4</div>
                                        <div class="flex-1">
                                            <p class="text-gray-700 text-sm">Envía el formulario</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start group/step">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-4 mt-0.5 transition-all group-hover/step:bg-green-200">
                                            5</div>
                                        <div class="flex-1">
                                            <p class="text-gray-700 text-sm">Consulta tu solicitud en
                                                <a href="{{ route('edudata.solicitud-info.registro_solicitudes_info') }}"
                                                    class="text-green-600 hover:text-green-700 underline font-semibold">Registro
                                                    de Solicitudes</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <a href="{{ route('edudata.solicitud-info') }}"
                                    class="block w-full bg-[var(--ter-500)] hover:bg-[#5a9792] text-white text-center py-2 px-4 rounded-lg font-medium transition-colors duration-200">
                                    Iniciar Solicitud
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> {{-- grid --}}
        </div> {{-- container --}}
    </div>

    @push('styles')
        <style>
            /* Fondo de estadísticas: patrón sutil con degradé lateral */
            .estadisticas-bg {
                position: relative;
                background:
                    radial-gradient(circle at 24px 24px, rgba(100, 161, 213, .14) 1px, transparent 1.2px) 0 0/32px 32px,
                    linear-gradient(90deg, rgba(255, 255, 255, .95) 0%, rgba(255, 255, 255, .97) 18%, rgba(255, 255, 255, 1) 40%) left/45% 100% no-repeat,
                    linear-gradient(180deg, rgba(255, 255, 255, 1), rgba(255, 255, 255, 1));
            }

            /* Scrollbars del listado central */
            .scrollbar-thin::-webkit-scrollbar {
                width: 8px;
            }

            .scrollbar-thumb-blue-300::-webkit-scrollbar-thumb {
                background-color: var(--pri-500);
                border-radius: 4px;
            }

            .scrollbar-thumb-blue-300::-webkit-scrollbar-thumb:hover {
                background-color: var(--pri-700);
            }

            .scrollbar-track-blue-100::-webkit-scrollbar-track {
                background-color: #e8f1fb;
            }
        </style>
    @endpush
@endsection