@extends('layouts.app')

@section('title', 'Cobertura de Cargos')

@section('content')
    <style>
        [x-cloak] {
            display: none !important
        }

        /* --- Estilos MEJORADOS para archivero compacto --- */
        .folder-tab {
            position: relative;
            border-radius: .75rem .75rem 0 0;
            box-shadow: 0 1px 0 0 rgba(0, 0, 0, .05) inset;
            transition: all .4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            margin-bottom: -1px;
        }

        .folder-tab::before {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: transparent;
            transition: all .3s ease;
        }

        .folder-tab:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, .1);
        }

        .folder-tab:hover::before {
            background: linear-gradient(90deg, var(--pri-700), var(--pri-500));
        }

        @media (max-width:768px) {
            .folder-tab::before {
                display: none
            }

            .folder-tab:hover {
                transform: none;
            }
        }

        .folder-tab.is-active {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .15), 0 4px 12px rgba(0, 0, 0, .1);
            z-index: 40;
            border-bottom: 2px solid transparent;
        }

        .folder-tab.is-active::before {
            background: linear-gradient(90deg, var(--pri-700), var(--pri-500));
            height: 3px;
            bottom: -3px;
        }

        .folder-stack>button {
            transition: all .4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
        }

        .folder-stack>button:hover {
            filter: brightness(1.08);
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .12);
        }

        /* Stack de pestañas compacto */
        .folder-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 0;
            align-items: flex-end;
            margin-bottom: -26px;
        }

        .folder-stack>button:not(:first-child) {
            margin-left: 6px;
        }

        @media (max-width:768px) {
            .folder-stack {
                flex-direction: column;
                gap: .25rem;
                padding: 1rem;
                margin-bottom: 0;
            }

            .folder-stack>button:not(:first-child) {
                margin-left: 0;
                margin-top: -4px;
            }

            .folder-tab {
                margin-right: 0 !important;
                margin-left: 0 !important;
                border-radius: .5rem;
                width: 100%;
                text-align: center;
            }

            .folder-tab.is-active {
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(0, 0, 0, .18);
            }

            .folder-tab:hover {
                transform: translateY(-1px);
            }
        }

        /* Tarjeta de búsqueda MÁS COMPACTA */
        .search-form-compact {
            background: #fff;
            border: 2px solid var(--gray-200);
            border-radius: 0 12px 12px 12px;
            padding: 1.25rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .05);
            position: relative;
            margin-top: -8px;
        }

        @media (max-width:768px) {
            .search-form-compact {
                padding: 1rem;
                margin: 0 -.5rem;
                border-radius: 12px;
                margin-top: 0.5rem;
            }
        }

        /* Contenedor para las tarjetas de contenido */
        .folder-container {
            background: linear-gradient(135deg, var(--gray-100) 0%, #f1f5f9 100%);
            border: 2px solid var(--gray-200);
            border-radius: 0 12px 12px 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            position: relative;
            overflow: visible;
        }

        @media (max-width:768px) {
            .folder-container {
                border-radius: 12px;
                margin-top: 1rem;
            }
        }

        .section-padding {
            padding: 1rem;
        }

        @media (min-width:768px) {
            .section-padding {
                padding: 2rem;
            }
        }

        /* Estilos para tarjetas de archivo */
        .file-card {
            background: #fff;
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .04);
            transition: all .3s ease;
            position: relative;
            overflow: hidden;
        }

        .file-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 6px;
            border-radius: 6px 0 0 6px;
            background: inherit;
        }

        .section-header {
            background: linear-gradient(135deg, var(--pri-500) 0%, var(--pri-900) 100%);
            color: #fff;
            padding: 1rem 1.5rem;
            border-radius: 12px 12px 0 0;
            position: relative;
            overflow: hidden;
        }

        @media (max-width:768px) {
            .section-header {
                padding: .75rem 1rem;
            }

            .section-header h3 {
                font-size: 1.1rem;
            }
        }

        .results-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        @media (min-width:768px) {
            .results-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 1.5rem;
            }
        }

        @media (min-width:1024px) {
            .results-grid {
                gap: 2rem;
            }
        }

        .btn-responsive {
            width: 100%;
            padding: .75rem 1rem;
            font-size: .875rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
        }

        @media (min-width:768px) {
            .btn-responsive {
                width: auto;
                padding: .875rem 1.5rem;
                font-size: 1rem;
            }
        }

        .text-responsive {
            font-size: .875rem;
            line-height: 1.5;
        }

        @media (min-width:768px) {
            .text-responsive {
                font-size: 1rem;
            }
        }

        @media (max-width:768px) {
            .mobile-hidden {
                display: none;
            }
        }

        .mobile-optimized {
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
        }

        .mobile-card-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        /* Estilos específicos para cobertura de cargos */
        .counter-card {
            background: linear-gradient(135deg, #fff 0%, var(--gray-100) 100%);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
            border: 1px solid var(--gray-200);
            text-align: center;
            transition: all 0.3s ease;
        }

        .counter-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, .12);
        }

        .counter-number {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .counter-label {
            font-size: 0.875rem;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .assembly-card {
            background: #fff;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .04);
            border-left: 4px solid;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
        }

        .assembly-card:hover {
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
        }

        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, .15);
            border-color: #cbd5e1;
        }

        .action-button {
            width: 100%;
            max-width: 140px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        @media (max-width: 640px) {
            .container {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .feature-card {
                padding: 1rem;
            }

            .grid-cols-1 {
                gap: 1rem;
            }
        }
    </style>

    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-6">
            <div class="p-4 md:p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-coberturas.png') }}" alt="Cobertura de Cargos"
                         class="w-full max-w-2xl h-auto object-contain rounded-xl">
                </div>

                <div class="mb-4 md:mb-6">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl p-4 md:p-6 my-4 border border-gray-200">
                        <div class="text-center mb-4 md:mb-6">
                            <p class="text-gray-700 leading-relaxed text-base md:text-lg">
                                EL <span class="font-semibold text-primary-700">Ministerio de Educación, Ciencia y
                                    Tecnología</span>
                                informa la cantidad de cargos ofrecidos en las
                                asambleas ordinarias y extraordinarias del año 2025,
                                organizados por nivel educativo y tipo de concurso.
                            </p>
                        </div>

                        <!-- Resumen general -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                            <!-- Inicial / Primario: se mantiene 431 -->
                            <div class="counter-card group p-4" style="border-left-color: var(--pri-700);">
                                <div class="flex items-center gap-3">
                                    <div class="flex-1 min-w-0">
                                        <div class="counter-number text-primary-700">431</div>
                                        <div class="counter-label">Nivel Inicial, Primario, Especial y Adultos</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Secundario actualizado: 1.979 -->
                            <div class="counter-card group p-4" style="border-left-color: var(--pri-500);">
                                <div class="flex items-center gap-3">
                                    <div class="flex-1 min-w-0">
                                        <div class="counter-number text-primary-500">1,979</div>
                                        <div class="counter-label">Nivel Secundario y Modalidades</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Superior: 1.062 -->
                            <div class="counter-card group p-4" style="border-left-color: var(--ter-500);">
                                <div class="flex items-center gap-3">
                                    <div class="flex-1 min-w-0">
                                        <div class="counter-number text-tertiary-500">1,062</div>
                                        <div class="counter-label">Nivel Superior</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4 justify-center">
                            <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                <span class="w-2 h-2 bg-primary-500 rounded-full mr-2"></span>Asambleas Ordinarias
                            </div>
                            <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                <span class="w-2 h-2 bg-secondary-500 rounded-full mr-2"></span>Asambleas Extraordinarias
                            </div>
                            <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                <span class="w-2 h-2 bg-accent-500 rounded-full mr-2"></span>Concursos de Nivel Superior
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Archivero -->
        <div x-data="archiveroCargos()" x-init="initFromQuery('{{ request('nivel', 'inicial-primario') }}')">
            <div class="folder-container mb-4 md:mb-6">
                <div class="folder-stack px-4 md:px-6 pt-4 md:pt-6">
                    <template x-for="(tab,i) in tabs" :key="tab.key">
                        <button type="button"
                                class="folder-tab px-3 md:px-6 py-2 md:py-3 mr-[-8px] md:mr-[-12px] border-2 border-b-0"
                                :class="[
                                    'text-sm md:text-base font-bold',
                                    i === 0 ? '' : 'ml-2 md:ml-4',
                                    active === tab.key ? 'is-active z-30 text-gray-900 border-gray-300' :
                                    'z-10 text-gray-700 border-transparent',
                                    active === tab.key ? tab.activeBg : tab.bg
                                ]"
                                @click="switchTo(tab.key)"
                                x-text="tab.label"></button>
                    </template>
                </div>

                <div class="border-t-0">

                    {{-- NIVEL INICIAL, PRIMARIO, ESPECIAL Y ADULTOS --}}
                    <section x-show="active==='inicial-primario'" x-cloak class="section-padding space-y-4 md:space-y-6">

                        <div class="search-form-compact">
                            <div class="text-center">
                                <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">
                                    Instituciones Educativas de Nivel Inicial, Primario, Especial y Adultos
                                </h3>
                                <p class="text-gray-600">Asambleas Ordinarias y Extraordinarias - Año 2025</p>
                            </div>
                        </div>

                        <div class="results-grid mobile-card-container">
                            <!-- Asambleas Ordinarias -->
                            <div class="file-card" style="border-left-color: var(--pri-700);">
                                <div class="section-header"
                                     style="background:linear-gradient(135deg, var(--pri-700) 0%, var(--pri-900) 100%);">
                                    <h3 class="text-base md:text-lg font-bold text-white">Asambleas Ordinarias</h3>
                                </div>
                                <div class="p-4 max-h-96 overflow-y-auto mobile-optimized">
                                    <div class="assembly-card" style="border-left-color: var(--pri-700);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">1° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">31 de mayo de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                67 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--pri-700);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">2° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">12 de junio de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                66 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--pri-700);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">3° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">03 de julio de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                69 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--pri-700);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">4° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">21 de agosto de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                18 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--pri-700);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">5° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">08 de septiembre de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                50 cargos
                                            </span>
                                        </div>
                                    </div>

                                    {{-- 6° ordinaria original --}}
                                    <div class="assembly-card" style="border-left-color: var(--pri-700);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">6° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">09 de octubre de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                110 cargos
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Asambleas Extraordinarias -->
                            <div class="file-card" style="border-left-color: var(--sec-500);">
                                <div class="section-header"
                                     style="background:linear-gradient(135deg, var(--sec-500) 0%, #a8b41d 100%);">
                                    <h3 class="text-base md:text-lg font-bold text-white">Asambleas Extraordinarias</h3>
                                </div>
                                <div class="p-4 max-h-96 overflow-y-auto mobile-optimized">
                                    <div class="assembly-card" style="border-left-color: var(--sec-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">1° Asamblea extraordinaria</h4>
                                                <p class="text-sm text-gray-600">08 de agosto de 2025</p>
                                            </div>
                                            <span class="bg-secondary-100 text-secondary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                27 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--sec-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">2° Asamblea extraordinaria</h4>
                                                <p class="text-sm text-gray-600">12 de septiembre de 2025</p>
                                            </div>
                                            <span class="bg-secondary-100 text-secondary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                13 cargos
                                            </span>
                                        </div>
                                    </div>

                                    {{-- 3° extraordinaria original --}}
                                    <div class="assembly-card" style="border-left-color: var(--sec-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">3° Asamblea extraordinaria</h4>
                                                <p class="text-sm text-gray-600">24 de octubre de 2025</p>
                                            </div>
                                            <span class="bg-secondary-100 text-secondary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                11 cargos
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Resumen Total Inicial/Primario -->
                            <div class="file-card" style="border-left-color: var(--ter-500);">
                                <div class="section-header"
                                     style="background:linear-gradient(135deg, var(--ter-500) 0%, #4f8c87 100%);">
                                    <h3 class="text-base md:text-lg font-bold text-white">Resumen Total</h3>
                                    <p class="text-xs md:text-sm text-white/90 mt-1">
                                        Nivel Inicial, Primario, Especial y Adultos
                                    </p>
                                </div>
                                <div class="p-4">
                                    <div class="text-center py-4">
                                        {{-- 67+66+69+18+50+110 = 380 / 27+13+11 = 51 / Total 431 --}}
                                        <div class="text-4xl md:text-5xl font-bold text-tertiary-500 mb-2">431</div>
                                        <p class="text-lg font-semibold text-gray-700">Cargos Totales Ofrecidos</p>
                                        <div class="mt-4 space-y-2">
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Asambleas Ordinarias:</span>
                                                <span class="font-bold text-gray-800">380 cargos</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Asambleas Extraordinarias:</span>
                                                <span class="font-bold text-gray-800">51 cargos</span>
                                            </div>
                                            <div class="flex justify-between border-t pt-2 mt-2">
                                                <span class="text-gray-800 font-semibold">Total General:</span>
                                                <span class="font-bold text-tertiary-500">431 cargos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- NIVEL SECUNDARIO Y MODALIDADES --}}
                    <section x-show="active==='secundario'" x-cloak class="section-padding space-y-4 md:space-y-6">
                        <div class="search-form-compact">
                            <div class="text-center">
                                <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">
                                    Instituciones Educativas de Nivel Secundario y Modalidades
                                </h3>
                                <p class="text-gray-600">Asambleas Ordinarias y Extraordinarias - Año 2025</p>
                            </div>
                        </div>

                        <div class="results-grid mobile-card-container">
                            <!-- Asambleas Ordinarias Secundario -->
                            <div class="file-card" style="border-left-color: var(--pri-500);">
                                <div class="section-header"
                                     style="background:linear-gradient(135deg, var(--pri-500) 0%, var(--pri-700) 100%);">
                                    <h3 class="text-base md:text-lg font-bold text-white">Asambleas Ordinarias</h3>
                                </div>
                                <div class="p-4 max-h-96 overflow-y-auto mobile-optimized">
                                    <div class="assembly-card" style="border-left-color: var(--pri-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">1° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">02 de junio de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                366 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--pri-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">2° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">11 de junio de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                259 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--pri-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">3° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">1° de julio de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                462 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--pri-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">4° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">22 de agosto de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                344 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--pri-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">5° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">05 de septiembre de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                148 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--pri-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">6° Asamblea ordinaria</h4>
                                                <p class="text-sm text-gray-600">13 de octubre de 2025</p>
                                            </div>
                                            <span class="bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                298 cargos
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Asambleas Extraordinarias Secundario -->
                            <div class="file-card" style="border-left-color: var(--acc-500);">
                                <div class="section-header"
                                     style="background:linear-gradient(135deg, var(--acc-500) 0%, #6c6991 100%);">
                                    <h3 class="text-base md:text-lg font-bold text-white">Asambleas Extraordinarias</h3>
                                </div>
                                <div class="p-4 max-h-96 overflow-y-auto mobile-optimized">
                                    <div class="assembly-card" style="border-left-color: var(--acc-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">1° Asamblea extraordinaria</h4>
                                                <p class="text-sm text-gray-600">11 de agosto de 2025</p>
                                            </div>
                                            <span class="bg-accent-100 text-accent-800 px-3 py-1 rounded-full text-sm font-bold">
                                                26 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--acc-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">2° Asamblea extraordinaria</h4>
                                                <p class="text-sm text-gray-600">15 de septiembre de 2025</p>
                                            </div>
                                            <span class="bg-accent-100 text-accent-800 px-3 py-1 rounded-full text-sm font-bold">
                                                43 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--acc-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">3° Asamblea extraordinaria</h4>
                                                <p class="text-sm text-gray-600">
                                                    17 de octubre de 2025 (Antofagasta de la Sierra)
                                                </p>
                                            </div>
                                            <span class="bg-accent-100 text-accent-800 px-3 py-1 rounded-full text-sm font-bold">
                                                15 cargos
                                            </span>
                                        </div>
                                    </div>

                                    <div class="assembly-card" style="border-left-color: var(--acc-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">4° Asamblea extraordinaria</h4>
                                                <p class="text-sm text-gray-600">24 de octubre de 2025</p>
                                            </div>
                                            <span class="bg-accent-100 text-accent-800 px-3 py-1 rounded-full text-sm font-bold">
                                                18 cargos
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Resumen Total Secundario -->
                            <div class="file-card" style="border-left-color: var(--pri-700);">
                                <div class="section-header"
                                     style="background:linear-gradient(135deg, var(--pri-700) 0%, var(--pri-900) 100%);">
                                    <h3 class="text-base md:text-lg font-bold text-white">Resumen Total</h3>
                                    <p class="text-xs md:text-sm text-white/90 mt-1">
                                        Nivel Secundario y Modalidades
                                    </p>
                                </div>
                                <div class="p-4">
                                    <div class="text-center py-4">
                                        {{-- Ordinarias: 1.877 / Extraordinarias: 102 / Total: 1.979 --}}
                                        <div class="text-4xl md:text-5xl font-bold text-primary-700 mb-2">1,979</div>
                                        <p class="text-lg font-semibold text-gray-700">Cargos Totales Ofrecidos</p>
                                        <div class="mt-4 space-y-2">
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Asambleas Ordinarias:</span>
                                                <span class="font-bold text-gray-800">1,877 cargos</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Asambleas Extraordinarias:</span>
                                                <span class="font-bold text-gray-800">102 cargos</span>
                                            </div>
                                            <div class="flex justify-between border-t pt-2 mt-2">
                                                <span class="text-gray-800 font-semibold">Total General:</span>
                                                <span class="font-bold text-primary-700">1,979 cargos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- NIVEL SUPERIOR --}}
                    <section x-show="active==='superior'" x-cloak class="section-padding space-y-4 md:space-y-6">
                        <div class="search-form-compact">
                            <div class="text-center">
                                <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">
                                    Concurso del Nivel Superior 2025
                                </h3>
                                <p class="text-gray-600">Llamados a cobertura de interinatos y suplencias</p>
                            </div>
                        </div>

                        <div class="results-grid mobile-card-container">
                            <!-- Llamados a Concurso (resumen por llamado) -->
                            <div class="file-card" style="border-left-color: var(--ter-500);">
                                <div class="section-header"
                                     style="background:linear-gradient(135deg, var(--ter-500) 0%, #4f8c87 100%);">
                                    <h3 class="text-base md:text-lg font-bold text-white">Llamados a Concurso</h3>
                                </div>
                                <div class="p-4 max-h-96 overflow-y-auto mobile-optimized">
                                    {{-- 1º LLAMADO - 187 --}}
                                    <div class="assembly-card" style="border-left-color: var(--ter-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">1º llamado a cobertura</h4>
                                                <p class="text-sm text-gray-600">24 de junio de 2025</p>
                                            </div>
                                            <span class="bg-tertiary-100 text-tertiary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                187 cargos
                                            </span>
                                        </div>
                                    </div>

                                    {{-- 2º LLAMADO - 392 --}}
                                    <div class="assembly-card" style="border-left-color: var(--ter-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">2º llamado a cobertura</h4>
                                                <p class="text-sm text-gray-600">
                                                    30 de junio / 08 de julio (ampliación) de 2025
                                                </p>
                                            </div>
                                            <span class="bg-tertiary-100 text-tertiary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                392 cargos
                                            </span>
                                        </div>
                                    </div>

                                    {{-- 3º LLAMADO - 111 --}}
                                    <div class="assembly-card" style="border-left-color: var(--ter-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">3º llamado a cobertura</h4>
                                                <p class="text-sm text-gray-600">15 de septiembre de 2025</p>
                                            </div>
                                            <span class="bg-tertiary-100 text-tertiary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                111 cargos
                                            </span>
                                        </div>
                                    </div>

                                    {{-- 4º LLAMADO - 165 --}}
                                    <div class="assembly-card" style="border-left-color: var(--ter-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">4º llamado a cobertura</h4>
                                                <p class="text-sm text-gray-600">19 de septiembre de 2025</p>
                                            </div>
                                            <span class="bg-tertiary-100 text-tertiary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                165 cargos
                                            </span>
                                        </div>
                                    </div>

                                    {{-- 5º LLAMADO - CARGOS NUEVOS - 119 --}}
                                    <div class="assembly-card" style="border-left-color: var(--ter-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">
                                                    5º llamado a cobertura – Cargos nuevos
                                                </h4>
                                                <p class="text-sm text-gray-600">11 de noviembre de 2025</p>
                                            </div>
                                            <span class="bg-tertiary-100 text-tertiary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                119 cargos
                                            </span>
                                        </div>
                                    </div>

                                    {{-- 5º LLAMADO - VACANTES LLAMADOS ANTERIORES - 88 --}}
                                    <div class="assembly-card" style="border-left-color: var(--ter-500);">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-800">
                                                    5º llamado a cobertura – Vacantes de llamados anteriores
                                                </h4>
                                                <p class="text-sm text-gray-600">11 de noviembre de 2025</p>
                                            </div>
                                            <span class="bg-tertiary-100 text-tertiary-800 px-3 py-1 rounded-full text-sm font-bold">
                                                88 cargos
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- NUEVA tarjeta: Detalle por Instituto -->
                            <div class="file-card" style="border-left-color: var(--sec-500);">
                                <div class="section-header"
                                     style="background:linear-gradient(135deg, var(--sec-500) 0%, #a8b41d 100%);">
                                    <h3 class="text-base md:text-lg font-bold text-white">Detalle por Instituto</h3>
                                    <p class="text-xs md:text-sm text-white/90 mt-1">Distribución de cargos por IES</p>
                                </div>
                                <div class="p-4 max-h-96 overflow-y-auto mobile-optimized text-sm space-y-4">
                                    {{-- 1º llamado --}}
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">
                                            1º llamado – 24 de junio de 2025 (187 cargos)
                                        </h4>
                                        <ul class="list-disc list-inside text-gray-700 space-y-0.5">
                                            <li>IES Andalgalá: 11</li>
                                            <li>IES Belén: 9</li>
                                            <li>IES Capayán: 15</li>
                                            <li>IES Chavarría: 9</li>
                                            <li>IES Clara J. Armstrong: 8</li>
                                            <li>IES Corpacci: sin cargos</li>
                                            <li>IES Fiambalá: 8</li>
                                            <li>IES José Cubas: 18</li>
                                            <li>IES Maldones: 16</li>
                                            <li>IES Pomán: 22</li>
                                            <li>IES Recreo: 25</li>
                                            <li>IES Santa María: 4</li>
                                            <li>IES Santa Rosa: 4</li>
                                            <li>IES Tinogasta: 25</li>
                                            <li>ISAC: 4</li>
                                            <li>ISEF: 3</li>
                                            <li>ISTI: 6</li>
                                        </ul>
                                    </div>

                                    {{-- 2º llamado --}}
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">
                                            2º llamado – 30 de junio / 08 de julio 2025 (392 cargos)
                                        </h4>
                                        <ul class="list-disc list-inside text-gray-700 space-y-0.5">
                                            <li>IES Andalgalá: 47</li>
                                            <li>IES Belén: 57</li>
                                            <li>IES Capayán: 28</li>
                                            <li>IES Chavarría: sin cargos</li>
                                            <li>IES Clara J. Armstrong: sin cargos</li>
                                            <li>IES Corpacci: sin cargos</li>
                                            <li>IES Fiambalá: 33</li>
                                            <li>IES José Cubas: 8</li>
                                            <li>IES Maldones: 36</li>
                                            <li>IES Pomán: 46</li>
                                            <li>IES Recreo: 27</li>
                                            <li>IES Santa María: 48</li>
                                            <li>IES Santa Rosa: 32</li>
                                            <li>IES Tinogasta: 30</li>
                                            <li>ISAC: sin cargos</li>
                                            <li>ISEF: sin cargos</li>
                                            <li>ISTI: sin cargos</li>
                                        </ul>
                                    </div>

                                    {{-- 3º llamado --}}
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">
                                            3º llamado – 15 de septiembre de 2025 (111 cargos)
                                        </h4>
                                        <ul class="list-disc list-inside text-gray-700 space-y-0.5">
                                            <li>IES Andalgalá: 12</li>
                                            <li>IES Belén: 12</li>
                                            <li>IES Capayán: sin cargos</li>
                                            <li>IES Chavarría: sin cargos</li>
                                            <li>IES Clara J. Armstrong: 1</li>
                                            <li>IES Corpacci: 4</li>
                                            <li>IES Fiambalá: 2</li>
                                            <li>IES José Cubas: 3</li>
                                            <li>IES Maldones: 21</li>
                                            <li>IES Pomán: 12</li>
                                            <li>IES Recreo: 12</li>
                                            <li>IES Santa María: 21</li>
                                            <li>IES Santa Rosa: 6</li>
                                            <li>IES Tinogasta: 5</li>
                                            <li>ISAC: sin cargos</li>
                                            <li>ISEF: sin cargos</li>
                                            <li>ISTI: sin cargos</li>
                                        </ul>
                                    </div>

                                    {{-- 4º llamado --}}
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">
                                            4º llamado – 19 de septiembre de 2025 (165 cargos)
                                        </h4>
                                        <ul class="list-disc list-inside text-gray-700 space-y-0.5">
                                            <li>IES Andalgalá: 1</li>
                                            <li>IES Belén: 15</li>
                                            <li>IES Capayán: 7</li>
                                            <li>IES Chavarría: 23</li>
                                            <li>IES Clara J. Armstrong: 8</li>
                                            <li>IES Corpacci: 4</li>
                                            <li>IES Fiambalá: sin cargos</li>
                                            <li>IES José Cubas: 11</li>
                                            <li>IES Maldones: 15</li>
                                            <li>IES Pomán: 22</li>
                                            <li>IES Recreo: sin cargos</li>
                                            <li>IES Santa María: 6</li>
                                            <li>IES Santa Rosa: 13</li>
                                            <li>IES Tinogasta: 15</li>
                                            <li>ISAC: 21</li>
                                            <li>ISEF: sin cargos</li>
                                            <li>ISTI: 4</li>
                                        </ul>
                                    </div>

                                    {{-- 5º llamado – Cargos nuevos --}}
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">
                                            5º llamado – 11 de noviembre de 2025 (Cargos nuevos, 119 cargos)
                                        </h4>
                                        <ul class="list-disc list-inside text-gray-700 space-y-0.5">
                                            <li>IES Andalgalá: 7</li>
                                            <li>IES Belén: 7</li>
                                            <li>IES Chavarría: 18</li>
                                            <li>IES Clara J. Armstrong: 5</li>
                                            <li>IES Corpacci: sin cargos</li>
                                            <li>IES Fiambalá: 6</li>
                                            <li>IES José Cubas: 9</li>
                                            <li>IES Maldones: 6</li>
                                            <li>IES Pomán: 2</li>
                                            <li>IES Recreo: 33</li>
                                            <li>IES Santa María: 3</li>
                                            <li>IES Santa Rosa: 4</li>
                                            <li>IES Tinogasta: 2</li>
                                            <li>ISAC: 10</li>
                                            <li>ISEF: 2</li>
                                            <li>ISTI: 5</li>
                                        </ul>
                                    </div>

                                    {{-- 5º llamado – Vacantes llamados anteriores --}}
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-1">
                                            5º llamado – 11 de noviembre de 2025 (Vacantes de llamados anteriores, 88 cargos)
                                        </h4>
                                        <ul class="list-disc list-inside text-gray-700 space-y-0.5">
                                            <li>IES Andalgalá: 8</li>
                                            <li>IES Belén: 9</li>
                                            <li>IES Chavarría: sin cargos</li>
                                            <li>IES Clara J. Armstrong: sin cargos</li>
                                            <li>IES Corpacci: 2</li>
                                            <li>IES Fiambalá: sin cargos</li>
                                            <li>IES José Cubas: 2</li>
                                            <li>IES Maldones: 15</li>
                                            <li>IES Pomán: 20</li>
                                            <li>IES Recreo: 4</li>
                                            <li>IES Santa María: 12</li>
                                            <li>IES Santa Rosa: 7</li>
                                            <li>IES Tinogasta: 6</li>
                                            <li>ISAC: 3</li>
                                            <li>ISEF: sin cargos</li>
                                            <li>ISTI: sin cargos</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Resumen Total Superior -->
                            <div class="file-card" style="border-left-color: var(--pri-500);">
                                <div class="section-header"
                                     style="background:linear-gradient(135deg, var(--pri-500) 0%, var(--pri-700) 100%);">
                                    <h3 class="text-base md:text-lg font-bold text-white">Resumen Total</h3>
                                    <p class="text-xs md:text-sm text-white/90 mt-1">Nivel Superior 2025</p>
                                </div>
                                <div class="p-4">
                                    <div class="text-center py-4">
                                        {{-- 187+392+111+165+119+88 = 1.062 --}}
                                        <div class="text-4xl md:text-5xl font-bold text-primary-500 mb-2">1,062</div>
                                        <p class="text-lg font-semibold text-gray-700">Cargos Totales Concursados</p>
                                        <div class="mt-4 space-y-3">
                                            <div class="bg-primary-50 rounded-lg p-3">
                                                <div class="text-sm text-primary-800 font-semibold">
                                                    6 llamados a concurso durante 2025
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-sm">
                                                <div class="bg-gray-50 rounded p-2 text-center">
                                                    <div class="font-bold text-gray-800">187</div>
                                                    <div class="text-gray-600">1º llamado</div>
                                                </div>
                                                <div class="bg-gray-50 rounded p-2 text-center">
                                                    <div class="font-bold text-gray-800">392</div>
                                                    <div class="text-gray-600">2º llamado</div>
                                                </div>
                                                <div class="bg-gray-50 rounded p-2 text-center">
                                                    <div class="font-bold text-gray-800">111</div>
                                                    <div class="text-gray-600">3º llamado</div>
                                                </div>
                                                <div class="bg-gray-50 rounded p-2 text-center">
                                                    <div class="font-bold text-gray-800">165</div>
                                                    <div class="text-gray-600">4º llamado</div>
                                                </div>
                                                <div class="bg-gray-50 rounded p-2 text-center">
                                                    <div class="font-bold text-gray-800">119</div>
                                                    <div class="text-gray-600">5º (nuevos)</div>
                                                </div>
                                                <div class="bg-gray-50 rounded p-2 text-center">
                                                    <div class="font-bold text-gray-800">88</div>
                                                    <div class="text-gray-600">5º (vacantes)</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="h-2"
                     :class="{
                        'bg-gradient-to-r from-primary-500 via-primary-600 to-primary-700': active==='inicial-primario',
                        'bg-gradient-to-r from-primary-400 via-primary-500 to-primary-600': active==='secundario',
                        'bg-gradient-to-r from-tertiary-400 via-tertiary-500 to-tertiary-600': active==='superior'
                    }">
                </div>
            </div>
        </div>
    </div>

    @include('edudata.partials.coberturas-info')

    <script>
        function archiveroCargos() {
            return {
                tabs: [
                    {
                        key: 'inicial-primario',
                        label: 'Inicial/Primario',
                        bg: 'bg-primary-100 text-primary-800',
                        activeBg: 'bg-primary-200 text-primary-900'
                    },
                    {
                        key: 'secundario',
                        label: 'Secundario',
                        bg: 'bg-primary-100 text-primary-800',
                        activeBg: 'bg-primary-200 text-primary-900'
                    },
                    {
                        key: 'superior',
                        label: 'Superior',
                        bg: 'bg-tertiary-100 text-tertiary-800',
                        activeBg: 'bg-tertiary-200 text-tertiary-900'
                    },
                ],
                active: 'inicial-primario',

                initFromQuery(serverSelected) {
                    const url = new URL(window.location.href);
                    const q = url.searchParams.get('nivel');
                    this.active = (q && ['inicial-primario', 'secundario', 'superior'].includes(q)) ? q : 'inicial-primario';
                    if (!q) {
                        url.searchParams.set('nivel', 'inicial-primario');
                        window.history.replaceState({}, '', url.toString());
                    }
                },
                switchTo(key) {
                    if (this.active === key) return;
                    this.active = key;
                    this.pushUrl(key, true);
                },
                pushUrl(key, replace) {
                    const url = new URL(window.location.href);
                    url.searchParams.set('nivel', key);
                    const fn = replace ? 'replaceState' : 'pushState';
                    window.history[fn]({}, '', url.toString());
                }
            }
        }
    </script>
@endsection
