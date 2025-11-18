@extends('layouts.app')

@section('title', 'Edudata - Normativa')

@section('content')
    <style>
        /* Efectos y colores mejorados (sin cambios visuales fuertes) */
        .search-container {
            background: linear-gradient(135deg, var(--pri-100) 0%, #FFFf 100%);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(64, 92, 164, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            position: relative;
        }

        .search-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--pri-700), var(--ter-500), var(--pri-700));
            background-size: 200% 100%;
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { background-position: -200% 0; }
            50% { background-position: 200% 0; }
        }

        .search-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .results-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .results-container:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .results-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 2px solid #e2e8f0;
        }

        .normativa-item {
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .normativa-item:hover {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-left-color: var(--pri-700);
            transform: translateX(4px);
        }

        .document-icon {
            background: linear-gradient(135deg, var(--pri-700) 0%, var(--pri-900) 100%);
            box-shadow: 0 4px 12px rgba(64, 92, 164, 0.3);
        }

        .search-input {
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--pri-700);
            box-shadow: 0 0 0 3px rgba(64, 92, 164, 0.1);
            background: white;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border: none;
            box-shadow: 0 4px 12px rgba(64, 92, 164, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(64, 92, 164, 0.4);
        }

        .btn-secondary {
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            border-color: var(--pri-700);
            transform: translateY(-1px);
        }

        .feature-card {
            background: white;
            border-radius: 12px;
        }
    </style>

    <div class="container mx-auto px-4 py-4">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-3">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <!-- Imagen centrada y responsiva -->
                <div class="rounded-xl overflow-hidden mb-3 md:mb-4 flex justify-center">
                    <img src="{{ asset('images/titulo-digesto.png') }}" alt="Digesto Normativo"
                         class="w-full max-w-2xl h-auto object-contain rounded-xl">
                </div>

                <!-- Texto descriptivo mejorado -->
                <div class="mb-3 md:mb-4">
                    <div class="space-y-2.5">
                        <!-- Sección de características - MEJORADO -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl p-3 md:p-4 my-2 border border-blue-200">
                            <!-- Descripción principal -->
                            <div class="text-center mb-3">
                                <p class="text-gray-700 leading-relaxed text-base md:text-lg font-secondary">
                                    El <span class="font-semibold text-[var(--pri-700)]">Digesto Normativo</span>
                                    reúne toda la normativa vigente
                                    que regula el tema educativo provincial</span>,
                                    facilitando el acceso a leyes, decretos, resoluciones y disposiciones.
                                </p>
                            </div>

                            <!-- Características en grid mejorado -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-3">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-2.5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#e8f1fb] flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[var(--pri-700)]"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800 font-primary">Búsqueda avanzada</p>
                                            <p class="text-xs text-gray-600 mt-1 font-secondary">Por palabras clave y filtros</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 2 -->
                                <div class="feature-card group p-2.5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#e8f6f5] flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[var(--ter-500)]"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800 font-primary">Documentos completos</p>
                                            <p class="text-xs text-gray-600 mt-1 font-secondary">Textos íntegros oficiales</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 3 -->
                                <div class="feature-card group p-2.5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#f2f1fa] flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[var(--acc-500)]"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800 font-primary">Acceso público</p>
                                            <p class="text-xs text-gray-600 mt-1 font-secondary">Transparencia garantizada</p>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /grid -->
                        </div> <!-- /feature box -->
                    </div>
                </div>
            </div>

            <!-- Contenido de búsqueda y resultados -->
            <div class="p-4 md:p-6 pt-3">
                {{-- Tarjeta de búsqueda - ESTILO MEJORADO Y COMPACTO --}}
                <div class="mx-auto mb-2 md:mb-3">
                    <div class="search-container">
                        <div class="search-header px-4 sm:px-6 pt-3 md:pt-4 pb-3 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 md:h-10 md:w-10 rounded-lg bg-white shadow-sm flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-[var(--pri-700)]"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h2 class="text-lg md:text-xl font-bold text-gray-900 font-primary">Buscar normativa</h2>
                            </div>
                            @if (($digestos->total() ?? 0) > 0)
                                <span
                                    class="hidden sm:inline-flex items-center rounded-full bg-[#e8f1fb] text-[var(--pri-700)] text-xs md:text-sm font-semibold px-2 md:px-3 py-1 font-primary">
                                    {{ $digestos->total() }} resultados
                                </span>
                            @endif
                        </div>

                        <div class="p-3 md:p-4">
                            <form action="{{ route('edudata.normativa') }}" method="GET"
                                  class="grid grid-cols-1 sm:grid-cols-[1fr_auto_auto] gap-2 md:gap-3">
                                <div class="relative">
                                    <input type="text" name="q" value="{{ $q ?? '' }}"
                                           placeholder="Buscar por título, descripción o palabras clave…"
                                           class="search-input w-full rounded-xl pl-10 md:pl-11 py-2 md:py-2.5 text-gray-800 transition-all duration-200 text-sm md:text-base font-secondary"
                                           aria-label="Buscar por título o descripción" />
                                    <span class="absolute inset-y-0 left-3 md:left-4 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-gray-400"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </div>

                                <button type="submit"
                                        class="bg-gradient-to-br from-[var(--pri-700)] to-[var(--pri-900)] text-white inline-flex items-center justify-center px-4 md:px-5 py-2 md:py-2.5 rounded-xl font-medium shadow-sm transition-colors duration-200 text-sm md:text-base font-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd" />
                                    </svg>
                                    Buscar
                                </button>

                                @if (!empty($q))
                                    <a href="{{ route('edudata.normativa') }}"
                                       class="btn-secondary inline-flex items-center justify-center px-4 md:px-5 py-2 md:py-2.5 rounded-xl font-medium shadow-sm transition-colors duration-200 text-sm md:text-base font-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                        Limpiar
                                    </a>
                                @endif
                            </form>

                            {{-- Meta info / estado --}}
                            <div class="mt-2 md:mt-2.5 text-xs md:text-sm text-gray-600 flex items-center flex-wrap gap-x-2 gap-y-1 font-secondary">
                                @if (($digestos->total() ?? 0) > 0)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-green-500"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                              clip-rule="evenodd" />
                                    </svg>
                                    <span>Mostrando {{ $digestos->firstItem() }}–{{ $digestos->lastItem() }} de
                                        {{ $digestos->total() }} resultados</span>
                                    @if (!empty($q))
                                        <span>para <span class="font-semibold text-gray-900">"{{ $q }}"</span></span>
                                    @endif
                                @else
                                    @if (!empty($q))
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-yellow-500"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                        <span>No se encontraron resultados para <span
                                                class="font-semibold text-gray-900">"{{ $q }}"</span>.</span>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                        <span>No hay normativas cargadas por el momento.</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Listado - ESTILO MEJORADO Y COMPACTO --}}
                <div class="mx-auto">
                    @if (session('error'))
                        <div class="mb-3 rounded-xl bg-red-50 border border-red-200 text-red-800 px-4 py-3 flex items-start font-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0 text-red-500"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                      clip-rule="evenodd" />
                            </svg>
                            <div class="font-medium">{{ session('error') }}</div>
                        </div>
                    @endif

                    <div class="results-container">
                        <div class="results-header px-4 sm:px-6 py-2.5 md:py-3 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 md:h-9 md:w-9 rounded-lg bg-gradient-to-br from-[var(--pri-700)] to-[var(--pri-900)] flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-white"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-base md:text-lg font-bold text-gray-900 font-primary">Normativas</h3>
                            </div>
                            @if (!empty($q))
                                <span
                                    class="hidden sm:inline text-xs md:text-sm text-[var(--pri-700)] font-semibold bg-[#e8f1fb] px-2 md:px-3 py-1 md:py-1 rounded-lg border border-blue-200 font-primary">
                                    Filtro: "{{ $q }}"
                                </span>
                            @endif
                        </div>

                        @if (($digestos->count() ?? 0) > 0)
                            {{-- Scroll solo en md+ para no "atragantar" el móvil --}}
                            <div class="md:max-h-[520px] md:overflow-y-auto">
                                <ul role="list" class="divide-y divide-gray-100">
                                    @foreach ($digestos as $dig)
                                        <li class="normativa-item">
                                            <div
                                                class="px-4 sm:px-6 py-2.5 md:py-3 flex flex-col md:flex-row md:items-center md:justify-between gap-3 md:gap-4">
                                                {{-- Bloque izquierdo --}}
                                                <div class="flex items-start gap-3 md:gap-4 min-w-0 flex-1">
                                                    {{-- Ícono --}}
                                                    <div class="flex-shrink-0 mt-0.5">
                                                        <div
                                                            class="document-icon h-10 w-10 md:h-11 md:w-11 rounded-xl flex items-center justify-center shadow-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="h-5 w-5 md:h-6 md:w-6 text-white" viewBox="0 0 24 24"
                                                                 fill="none" stroke="currentColor"
                                                                 aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M7 3h6l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2" d="M13 3v5h5" />
                                                            </svg>
                                                        </div>
                                                    </div>

                                                    <div class="min-w-0 flex-1">
                                                        <h4 class="text-sm md:text-base font-semibold text-gray-900 leading-relaxed font-primary">
                                                            {{ $dig->titulo }}
                                                        </h4>
                                                    </div>
                                                </div>

                                                {{-- Acción --}}
                                                <div class="flex-shrink-0">
                                                    <a href="{{ route('edudata.normativa.show', $dig->id) }}"
                                                       class="bg-gradient-to-br from-[var(--pri-700)] to-[var(--pri-900)] text-white w-full md:w-auto inline-flex items-center justify-center gap-2 px-3 md:px-4 py-2 md:py-2.5 text-xs md:text-sm font-medium rounded-xl shadow-sm transition-colors duration-200 group font-primary">
                                                        Ver documento
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="h-3 w-3 md:h-4 md:w-4 group-hover:translate-x-0.5 transition-transform"
                                                             fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                             aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2" d="M9 5l7 7-7 7" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Paginación --}}
                            <div class="px-4 sm:px-6 py-1.5 md:py-2 border-t border-gray-100 bg-gray-50 rounded-b-2xl">
                                {{ $digestos->onEachSide(1)->links() }}
                            </div>
                        @else
                            <div class="p-5 md:p-6 text-center text-gray-600 font-secondary">
                                <div
                                    class="mx-auto h-12 w-12 md:h-16 md:w-16 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center mb-2.5 md:mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-gray-400"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                                @if (!empty($q))
                                    <p class="text-base md:text-lg font-semibold text-gray-800 mb-1">No hay resultados para tu
                                        búsqueda</p>
                                    <p class="text-xs md:text-sm">Intenta con otros términos o <a
                                            href="{{ route('edudata.normativa') }}"
                                            class="text-[var(--pri-700)] hover:text-[var(--pri-900)] font-medium transition-colors">ver todas las
                                            normativas</a></p>
                                @else
                                    <p class="text-base md:text-lg font-semibold text-gray-800 mb-1">Aún no hay normativas disponibles
                                    </p>
                                    <p class="text-xs md:text-sm">Vuelve pronto para consultar las normativas actualizadas</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div> <!-- /contenido búsqueda y resultados -->
        </div> <!-- /tarjeta principal -->
    </div>
    @include('edudata.partials.normativa-info')

@endsection