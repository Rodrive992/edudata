@extends('layouts.app')

@section('title', 'Edudata - Mantenimiento Edilicio')

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
            background: linear-gradient(90deg, var(--pri-700), var(--acc-500));
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
            background: linear-gradient(90deg, var(--sec-500), var(--ter-500));
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
            /* Hace que las pestañas "emerjan" sobre la tarjeta */
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
            border: 2px solid #e2e8f0;
            border-radius: 0 12px 12px 12px;
            padding: 1.25rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .05);
            position: relative;
            margin-top: -8px;
            /* Se superpone con las pestañas */
        }

        @media (max-width:768px) {
            .search-form-compact {
                padding: 1rem;
                margin: 0 -.5rem;
                border-radius: 12px;
                margin-top: 0.5rem;
            }
        }

        .search-grid-compact {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        @media (min-width:768px) {
            .search-grid-compact {
                grid-template-columns: 2fr 1fr;
                gap: 1rem;
            }
        }

        /* Tablas MEJORADAS para Realizadas */
        .task-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .task-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-color: #cbd5e1;
        }

        .task-info {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 0.5rem 1rem;
            align-items: start;
        }

        .task-label {
            font-weight: 600;
            color: #4b5563;
            font-size: 0.875rem;
            white-space: nowrap;
        }

        .task-value {
            color: #1f2937;
            font-size: 0.875rem;
            line-height: 1.4;
        }

        @media (max-width: 640px) {
            .task-info {
                grid-template-columns: 1fr;
                gap: 0.25rem;
            }

            .task-label {
                font-size: 0.8rem;
            }

            .task-value {
                font-size: 0.8rem;
                margin-bottom: 0.5rem;
            }
        }

        /* Contenedor para las tarjetas de tareas */
        .tasks-container {
            max-height: 400px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        .tasks-container::-webkit-scrollbar {
            width: 6px;
        }

        .tasks-container::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }

        .tasks-container::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .tasks-container::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Estilos para las secciones de archivero */
        .folder-container {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 2px solid #e2e8f0;
            border-radius: 12px 12px 12px 12px;
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
            border: 1px solid #e2e8f0;
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
            background: linear-gradient(135deg, var(--pri-700) 0%, var(--pri-900) 100%);
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

        /* Estilos para tablas de datos */
        .data-table {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
            border: 1px solid #e2e8f0;
            overflow: visible;
        }

        .table-container {
            overflow-x: auto;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-gutter: stable both-edges;
        }

        .table-container>table {
            width: max-content;
            min-width: 100%;
            table-layout: auto;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-container th,
        .table-container td {
            white-space: nowrap;
        }

        .table-container .cell-wrap {
            white-space: normal !important;
        }

        .table-container thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }

        @media (max-width:768px) {
            .data-table {
                border-radius: 12px;
                margin: 0;
                width: 100%;
            }

            .table-container>table {
                min-width: 600px;
            }

            .data-table th,
            .data-table td {
                padding: .5rem .25rem;
                font-size: .75rem;
            }

            .data-table th {
                font-size: .7rem;
                padding: .5rem .25rem;
            }
        }

        .status-badge {
            padding: .25rem .75rem;
            border-radius: 20px;
            font-size: .75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .05em;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            white-space: nowrap;
        }

        @media (max-width:768px) {
            .status-badge {
                font-size: .7rem;
                padding: .2rem .5rem;
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

        /* Estilos para las tarjetas de características */
        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
            border: 1px solid #e2e8f0;
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
                <!-- Imagen centrada y responsiva -->
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-mantenimiento.png') }}" alt="Mantenimiento Edilicio"
                        class="w-full max-w-2xl h-auto object-contain rounded-xl">
                </div>

                <!-- Sección unificada de descripción y características -->
                <div class="mb-4 md:mb-6">
                    <div
                        class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl p-4 md:p-6 my-4 border border-gray-200">
                        <!-- Descripción principal centrada -->
                        <div class="text-center mb-4 md:mb-6">
                            <p class="text-gray-700 leading-relaxed text-base md:text-lg font-  ">
                                La <span class="font-semibold text-[var(--pri-700)]">Dirección de Programación y Mantenimiento
                                    Edilicio</span>
                                se encarga del mantenimiento integral de los establecimientos escolares de la provincia,
                                llevando a cabo las tareas diarias para conservar el estado óptimo de los edificios
                                educativos.
                            </p>
                        </div>

                        <!-- Grid de características interactivas MEJORADO -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                            <!-- Tarjeta 1 - Tareas de Mantenimiento -->
                            <div class="feature-card group">
                                <div class="flex items-start gap-3 md:gap-4 mb-3 md:mb-4">
                                    <div
                                        class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[var(--sec-500)] flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-base md:text-lg font-bold text-gray-800 mb-1 font-primary">Tareas de
                                            Mantenimiento Edilicio</h4>
                                        
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <a href="#tareas" class="action-button bg-[var(--sec-500)] hover:bg-[#b8bd37] text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        Buscar
                                    </a>
                                </div>
                            </div>

                            <!-- Tarjeta 2 - Ubicación de Establecimientos -->
                            <div class="feature-card group">
                                <div class="flex items-start gap-3 md:gap-4 mb-3 md:mb-4">
                                    <div
                                        class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[var(--pri-500)] flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-base md:text-lg font-bold text-gray-800 mb-1 font-primary">Ubicación de
                                            Establecimientos</h4>
                                        
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <a href="https://nimble-gumdrop-ccc062.netlify.app/" target="_blank" rel="noopener"
                                        class="action-button bg-[var(--pri-500)] hover:bg-[#5aadd5] text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        Ver Mapa
                                    </a>
                                </div>
                            </div>

                            <!-- Tarjeta 3 - Solicitudes de Mantenimiento -->
                            <div class="feature-card group">
                                <div class="flex items-start gap-3 md:gap-4 mb-3 md:mb-4">
                                    <div
                                        class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[var(--ter-500)] flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-base md:text-lg font-bold text-gray-800 mb-1 font-primary">Solicitudes de
                                            Mantenimiento Edilicio</h4>                                        
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <a href="https://tad.catamarca.gob.ar/tramitesadistancia" target="_blank"
                                        rel="noopener" class="action-button bg-[var(--ter-500)] hover:bg-[#5a9792] text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Solicitar
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Badges informativos -->
                        <div class="flex flex-wrap gap-2 mt-4 md:mt-6 justify-center">
                            <div
                                class="inline-flex items-center bg-gray-100 px-2 py-1 md:px-3 md:py-1 rounded-full text-xs md:text-sm text-gray-700 font-secondary">
                                <span class="w-2 h-2 bg-[var(--pri-500)] rounded-full mr-2"></span>
                                Transparencia en la gestión
                            </div>
                            <div
                                class="inline-flex items-center bg-gray-100 px-2 py-1 md:px-3 md:py-1 rounded-full text-xs md:text-sm text-gray-700 font-secondary">
                                <span class="w-2 h-2 bg-[var(--ter-500)] rounded-full mr-2"></span>
                                Mantenimiento preventivo
                            </div>
                            <div
                                class="inline-flex items-center bg-gray-100 px-2 py-1 md:px-3 md:py-1 rounded-full text-xs md:text-sm text-gray-700 font-secondary">
                                <span class="w-2 h-2 bg-[var(--acc-500)] rounded-full mr-2"></span>
                                Comunidad educativa
                            </div>
                        </div>
                    </div>
                </div>

                @include('edudata.partials.mantenimiento-fotos')

                <!-- Archivero MEJORADO con pestañas emergentes -->
                <div id="tareas" class="pt-4" x-data="archivero()" x-init="initFromQuery('{{ request('tarea', 'realizadas') }}')">

                    {{-- Pestañas EMERGENTES --}}
                    <div class="folder-container mb-4 md:mb-6">
                        <div class="folder-stack px-4 md:px-6 pt-4 md:pt-6">
                            <template x-for="(tab,i) in tabs" :key="tab.key">
                                <button type="button"
                                    class="folder-tab px-3 md:px-6 py-2 md:py-3 mr-[-8px] md:mr-[-12px] border-2 border-b-0 font-primary"
                                    :class="[
                                        'text-sm md:text-base font-bold',
                                        i === 0 ? '' : 'ml-2 md:ml-4',
                                        active === tab.key ? 'is-active z-30 text-gray-900 border-gray-300' :
                                        'z-10 text-gray-700 border-transparent',
                                        active === tab.key ? tab.activeBg : tab.bg
                                    ]"
                                    @click="switchTo(tab.key)" x-text="tab.label"></button>
                            </template>
                        </div>

                        <!-- Paneles (renderizados SIEMPRE, visibles según pestaña) -->
                        <div class="border-t-0">

                            {{-- REALIZADAS - MEJORADO --}}
                            <section x-show="active==='realizadas'" x-cloak
                                class="section-padding space-y-4 md:space-y-6">

                                <!-- Tarjeta de búsqueda COMPACTA -->
                                <div class="search-form-compact">
                                    <form method="GET" :action="currentUrlWithHash('#resultados')"
                                        class="search-grid-compact items-end">
                                        <input type="hidden" name="tarea" value="realizadas">
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2 font-secondary">Buscar
                                                Establecimiento</label>
                                            <div class="relative">
                                                <input type="text" name="establecimiento"
                                                    value="{{ request('establecimiento') }}"
                                                    class="w-full rounded-lg border-2 border-gray-300 py-2 px-3 focus:border-[var(--pri-500)] focus:ring-2 focus:ring-blue-200 transition-all duration-200 placeholder-gray-400 text-sm font-secondary"
                                                    placeholder="Ingrese el nombre del establecimiento...">
                                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4 text-gray-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="btn-responsive bg-gradient-to-r from-[var(--pri-700)] to-[var(--pri-900)] hover:from-[var(--pri-800)] hover:to-[var(--pri-900)] text-white font-bold rounded-lg shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 h-11 font-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                                Buscar
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                @php
                                    $regAPH = $registros['APH'] ?? collect();
                                    $regELEC = $registros['ELEC'] ?? collect();
                                    $regDEZM = $registros['DEZM'] ?? collect();
                                @endphp

                                <div id="resultados" class="results-grid mobile-card-container">
                                    <!-- APH - MEJORADO con nueva estructura -->
                                    <div class="file-card" style="border-left-color:var(--acc-500);">
                                        <div class="section-header"
                                            style="background:linear-gradient(135deg,var(--acc-500) 0%,var(--pri-900) 100%);">
                                            <h3 class="text-base md:text-lg font-bold text-white font-primary">Albañilería - Plomería
                                                -
                                                Herrería</h3>
                                            
                                        </div>
                                        <div class="p-4 tasks-container">
                                            @forelse($regAPH as $r)
                                                <div class="task-card">
                                                    <div class="task-info">
                                                        <span class="task-label font-secondary">Fecha:</span>
                                                        <span class="task-value font-semibold text-[var(--acc-500)] font-secondary">
                                                            {{ \Carbon\Carbon::parse($r->fecha)->format('d/m/Y') }}
                                                        </span>

                                                        <span class="task-label font-secondary">Establecimiento:</span>
                                                        <span class="task-value font-secondary">{{ $r->establecimiento }}</span>

                                                        <span class="task-label font-secondary">Tarea Realizada:</span>
                                                        <span class="task-value font-secondary">{{ $r->tarea }}</span>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="text-center py-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-8 w-8 text-gray-400 mx-auto mb-2" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    <p class="text-gray-500 italic text-sm font-secondary">Sin tareas registradas</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                    <!-- ELEC - MEJORADO con nueva estructura -->
                                    <div class="file-card" style="border-left-color:var(--pri-500);">
                                        <div class="section-header"
                                            style="background:linear-gradient(135deg,var(--pri-500) 0%,var(--pri-700) 100%);">
                                            <h3 class="text-base md:text-lg font-bold text-white font-primary">Electricidad</h3>                                              
                                        </div>
                                        <div class="p-4 tasks-container">
                                            @forelse($regELEC as $r)
                                                <div class="task-card">
                                                    <div class="task-info">
                                                        <span class="task-label font-secondary">Fecha:</span>
                                                        <span class="task-value font-semibold text-[var(--pri-500)] font-secondary">
                                                            {{ \Carbon\Carbon::parse($r->fecha)->format('d/m/Y') }}
                                                        </span>

                                                        <span class="task-label font-secondary">Establecimiento:</span>
                                                        <span class="task-value font-secondary">{{ $r->establecimiento }}</span>

                                                        <span class="task-label font-secondary">Tarea Realizada:</span>
                                                        <span class="task-value font-secondary">{{ $r->tarea }}</span>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="text-center py-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-8 w-8 text-gray-400 mx-auto mb-2" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                    </svg>
                                                    <p class="text-gray-500 italic text-sm font-secondary">Sin tareas registradas</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                    <!-- DEZM - MEJORADO con nueva estructura -->
                                    <div class="file-card" style="border-left-color:var(--ter-500);">
                                        <div class="section-header"
                                            style="background:linear-gradient(135deg,var(--ter-500) 0%,#059669 100%);">
                                            <h3 class="text-base md:text-lg font-bold text-white font-primary">Desmalezamiento</h3>                                               
                                        </div>
                                        <div class="p-4 tasks-container">
                                            @forelse($regDEZM as $r)
                                                <div class="task-card">
                                                    <div class="task-info">
                                                        <span class="task-label font-secondary">Fecha:</span>
                                                        <span class="task-value font-semibold text-[var(--ter-500)] font-secondary">
                                                            {{ \Carbon\Carbon::parse($r->fecha)->format('d/m/Y') }}
                                                        </span>

                                                        <span class="task-label font-secondary">Establecimiento:</span>
                                                        <span class="task-value font-secondary">{{ $r->establecimiento }}</span>

                                                        <span class="task-label font-secondary">Tarea Realizada:</span>
                                                        <span class="task-value font-secondary">{{ $r->tarea }}</span>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="text-center py-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-8 w-8 text-gray-400 mx-auto mb-2" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                                    </svg>
                                                    <p class="text-gray-500 italic text-sm font-secondary">Sin tareas registradas</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </section>

                            {{-- PENDIENTES --}}
                            <section x-show="active==='pendientes'" x-cloak
                                class="section-padding space-y-6 md:space-y-8">
                                <div class="search-form-compact">
                                    <form method="GET" :action="currentUrlWithHash('#resultados-pend')"
                                        class="search-grid-compact items-end">
                                        <input type="hidden" name="tarea" value="pendientes">
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2 font-secondary">Filtrar
                                                por Localidad</label>
                                            <div class="relative">
                                                <input type="text" name="localidad"
                                                    value="{{ request('localidad') }}"
                                                    class="w-full rounded-lg border-2 border-gray-300 py-2 px-3 focus:border-[var(--pri-500)] focus:ring-2 focus:ring-blue-200 transition-all duration-200 placeholder-gray-400 text-sm font-secondary"
                                                    placeholder="Ingrese el nombre de la localidad...">
                                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4 text-gray-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="btn-responsive bg-gradient-to-r from-[var(--pri-500)] to-[var(--pri-700)] hover:from-[var(--pri-600)] hover:to-[var(--pri-800)] text-white font-bold rounded-lg shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 h-11 font-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                                Buscar
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                @php
                                    $pend = $pendientes ?? collect();
                                    $scrollPend = $pend->count() > 5;
                                    $maxHeightPend = $scrollPend ? 'max-h-80 md:max-h-96' : '';
                                @endphp

                                <div id="resultados-pend" class="data-table">
                                    <div class="section-header"
                                        style="background:linear-gradient(135deg,var(--pri-500) 0%,var(--pri-700) 100%);">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                            <h3 class="text-base md:text-lg font-bold text-white font-primary">Tareas Pendientes</h3>
                                            <div
                                                class="flex items-center gap-2 md:gap-4 text-xs md:text-sm text-white/90 font-secondary">
                                                <span>Localidad: <strong
                                                        class="text-white">{{ request('localidad') ?: 'Todas' }}</strong></span>
                                                <span class="hidden md:inline">•</span>
                                                <span>Registros: <strong
                                                        class="text-white">{{ $pend->count() }}</strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-container {{ $maxHeightPend }} mobile-optimized">
                                        <table class="min-w-full text-sm">
                                            <caption class="sr-only">Listado de tareas pendientes</caption>
                                            <thead>
                                                <tr class="bg-gradient-to-r from-blue-50 to-[#e8f1fb]">
                                                    @php $thBase='px-3 md:px-6 py-3 md:py-4 text-left text-xs font-bold tracking-wider uppercase text-[var(--pri-700)] border-b-2 border-blue-200 font-primary'; @endphp
                                                    <th class="{{ $thBase }} w-32 md:w-48">Localidad</th>
                                                    <th class="{{ $thBase }} w-40 md:w-56">Establecimiento</th>
                                                    <th class="{{ $thBase }} min-w-60 md:min-w-80">Pedido</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-blue-100">
                                                @forelse($pend as $p)
                                                    <tr
                                                        class="hover:bg-gradient-to-r hover:from-blue-50/80 hover:to-[#e8f1fb]/80 transition-all duration-200 group">
                                                        <td class="px-3 md:px-6 py-3 md:py-4">
                                                            <div class="max-w-[12rem]">
                                                                <span
                                                                    class="block break-words font-semibold text-[var(--pri-700)] text-xs md:text-sm font-secondary">{{ $p->localidad }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4">
                                                            <div class="max-w-[16rem]">
                                                                <span
                                                                    class="block break-words text-gray-800 text-xs md:text-sm font-secondary">{{ $p->establecimiento }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 cell-wrap">
                                                            <div class="max-w-[28rem] md:max-w-[36rem]">
                                                                <span
                                                                    class="block break-words text-gray-600 leading-relaxed text-xs md:text-sm font-secondary">{{ $p->pedido }}</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3"
                                                            class="px-3 md:px-6 py-8 md:py-12 text-center">
                                                            <div class="flex flex-col items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-12 w-12 md:h-16 md:w-16 text-gray-400 mb-3 md:mb-4"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                                                </svg>
                                                                <p class="text-gray-500 text-sm md:text-lg font-medium font-secondary">
                                                                    No
                                                                    hay tareas pendientes</p>
                                                                <p class="text-gray-400 text-xs md:text-sm mt-1 font-secondary">Todos
                                                                    los
                                                                    mantenimientos están al día</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    @if ($scrollPend)
                                        <div class="px-4 py-2 text-xs md:text-sm text-gray-500 text-center font-secondary">
                                            <span class="inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-3 w-3 md:h-4 md:w-4 mr-1 md:mr-2" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                </svg>
                                                Desplázate para ver más registros
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </section>

                            {{-- COMISIONES --}}
                            <section x-show="active==='comisiones'" x-cloak
                                class="section-padding space-y-6 md:space-y-8">
                                <div class="search-form-compact">
                                    <form method="GET" :action="currentUrlWithHash('#resultados-com')"
                                        class="search-grid-compact items-end">
                                        <input type="hidden" name="tarea" value="comisiones">
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2 font-secondary">Buscar
                                                Comisiones</label>
                                            <div class="relative">
                                                <input type="text" name="q" value="{{ request('q') }}"
                                                    class="w-full rounded-lg border-2 border-gray-300 py-2 px-3 focus:border-[var(--ter-500)] focus:ring-2 focus:ring-emerald-200 transition-all duration-200 placeholder-gray-400 text-sm font-secondary"
                                                    placeholder="Buscar por localidad o establecimiento...">
                                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4 text-gray-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="btn-responsive bg-gradient-to-r from-[var(--ter-500)] to-[#5a9792] hover:from-[#5a9792] hover:to-[#4a8772] text-white font-bold rounded-lg shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 h-11 font-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                                Buscar
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                @php
                                    $com = $comisiones ?? collect();
                                    $scrollCom = $com->count() > 5;
                                    $maxHeightCom = $scrollCom ? 'max-h-80 md:max-h-96' : '';
                                @endphp

                                <div id="resultados-com" class="data-table">
                                    <div class="section-header"
                                        style="background:linear-gradient(135deg,var(--ter-500) 0%,#059669 100%);">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                            <h3 class="text-base md:text-lg font-bold text-white font-primary">Comisiones de Servicio
                                            </h3>
                                            <div
                                                class="flex items-center gap-2 md:gap-3 text-xs md:text-sm text-white/90 font-secondary">
                                                <span class="hidden md:inline">Año: <strong
                                                        class="text-white">{{ request('anio') ?: 'Todos' }}</strong></span>
                                                <span class="hidden md:inline">•</span>
                                                <span>Registros: <strong
                                                        class="text-white">{{ $com->count() }}</strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-container {{ $maxHeightCom }} mobile-optimized">
                                        <table class="min-w-full text-sm">
                                            <caption class="sr-only">Listado de comisiones de servicio</caption>
                                            <thead>
                                                <tr class="bg-gradient-to-r from-emerald-50 to-green-50">
                                                    @php $thBase='px-3 md:px-6 py-3 md:py-4 text-left text-xs font-bold tracking-wider uppercase text-[var(--ter-500)] border-b-2 border-emerald-200 font-primary'; @endphp
                                                    <th class="{{ $thBase }} w-20 md:w-28">Fecha</th>
                                                    <th class="{{ $thBase }} w-32 md:w-56">Establecimiento</th>
                                                    <th class="{{ $thBase }} mobile-hidden">Localidad</th>
                                                    <th class="{{ $thBase }} mobile-hidden">Departamento</th>
                                                    <th class="{{ $thBase }} min-w-40 md:min-w-80">Detalle</th>
                                                    <th class="{{ $thBase }} w-16 md:w-20 text-center">Pers.</th>
                                                    <th class="{{ $thBase }} w-16 md:w-20 text-center">Días</th>
                                                    <th class="{{ $thBase }} w-18 md:w-24 text-center">Agentes
                                                    </th>
                                                    <th class="{{ $thBase }} w-24 md:w-32">Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-emerald-100">
                                                @forelse($com as $c)
                                                    <tr
                                                        class="hover:bg-gradient-to-r hover:from-emerald-50/80 hover:to-green-50/80 transition-all duration-200 group">
                                                        <td
                                                            class="px-3 md:px-6 py-3 md:py-4 text-[var(--ter-500)] whitespace-nowrap font-semibold text-xs md:text-sm font-secondary">
                                                            {{ \Carbon\Carbon::parse($c->fecha)->format('d/m/Y') }}
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4">
                                                            <div class="max-w-[16rem]">
                                                                <span
                                                                    class="block break-words text-gray-800 text-xs md:text-sm font-secondary">{{ $c->establecimiento }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 mobile-hidden">
                                                            <div class="max-w-[12rem]">
                                                                <span
                                                                    class="block break-words text-gray-800 text-xs md:text-sm font-secondary">{{ $c->localidad }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 mobile-hidden">
                                                            <div class="max-w-[10rem]">
                                                                <span
                                                                    class="block break-words text-gray-800 text-xs md:text-sm font-secondary">{{ $c->departamento }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 cell-wrap">
                                                            <div class="max-w-[28rem] md:max-w-[36rem]">
                                                                <span
                                                                    class="block break-words text-gray-600 leading-relaxed text-xs md:text-sm font-secondary">{{ $c->detalle_obra }}</span>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-3 md:px-6 py-3 md:py-4 text-[var(--ter-500)] text-center font-semibold text-xs md:text-sm font-secondary">
                                                            {{ $c->personas }}</td>
                                                        <td
                                                            class="px-3 md:px-6 py-3 md:py-4 text-[var(--ter-500)] text-center font-semibold text-xs md:text-sm font-secondary">
                                                            {{ $c->dias }}</td>
                                                        <td
                                                            class="px-3 md:px-6 py-3 md:py-4 text-[var(--ter-500)] text-center font-semibold text-xs md:text-sm font-secondary">
                                                            {{ $c->agentes }}</td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4">
                                                            @php
                                                                $estadoColor = match (strtolower($c->estado)) {
                                                                    'completado',
                                                                    'finalizado'
                                                                        => 'bg-green-100 text-green-800 border-green-200',
                                                                    'en proceso',
                                                                    'en progreso'
                                                                        => 'bg-blue-100 text-blue-800 border-blue-200',
                                                                    'pendiente'
                                                                        => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                                                    'cancelado'
                                                                        => 'bg-red-100 text-red-800 border-red-200',
                                                                    default
                                                                        => 'bg-gray-100 text-gray-800 border-gray-200',
                                                                };
                                                            @endphp
                                                            <span
                                                                class="status-badge {{ $estadoColor }} border text-xs font-secondary">{{ $c->estado }}</span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9"
                                                            class="px-3 md:px-6 py-8 md:py-12 text-center">
                                                            <div class="flex flex-col items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-12 w-12 md:h-16 md:w-16 text-gray-400 mb-3 md:mb-4"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                                                </svg>
                                                                <p class="text-gray-500 text-sm md:text-lg font-medium font-secondary">
                                                                    No
                                                                    hay comisiones registradas</p>
                                                                <p class="text-gray-400 text-xs md:text-sm mt-1 font-secondary">No se
                                                                    encontraron comisiones</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    @if ($scrollCom)
                                        <div class="px-4 py-2 text-xs md:text-sm text-gray-500 text-center font-secondary">
                                            <span class="inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-3 w-3 md:h-4 md:w-4 mr-1 md:mr-2" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                </svg>
                                                Desplázate para ver más registros
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </section>
                        </div>

                        {{-- Tira indicadora --}}
                        <div class="h-2"
                            :class="{
                                'bg-gradient-to-r from-[var(--sec-500)] via-[var(--sec-500)] to-[var(--sec-500)]': active==='realizadas',
                                'bg-gradient-to-r from-[var(--pri-500)] via-[var(--pri-700)] to-[var(--pri-500)]': active==='pendientes',
                                'bg-gradient-to-r from-[var(--ter-500)] via-[var(--ter-500)] to-[var(--ter-500)]': active==='comisiones'
                            }">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    @include('edudata.partials.mantenimiento-info')
    {{-- === FIN: incluir la solapa lateral como partial reutilizable === --}}  
    {{-- Alpine: controlador del archivero --}}
    <script>
        function archivero() {
            return {
                tabs: [{
                        key: 'realizadas',
                        label: 'Realizadas',
                        bg: 'bg-amber-100 text-amber-800',
                        activeBg: 'bg-amber-200 text-amber-900'
                    },
                    {
                        key: 'pendientes',
                        label: 'Pendientes',
                        bg: 'bg-sky-100 text-sky-800',
                        activeBg: 'bg-sky-200 text-sky-900'
                    },
                    {
                        key: 'comisiones',
                        label: 'Comisiones',
                        bg: 'bg-emerald-100 text-emerald-800',
                        activeBg: 'bg-emerald-200 text-emerald-900'
                    },
                ],
                active: 'realizadas',

                initFromQuery(serverSelected) {
                    const url = new URL(window.location.href);
                    const q = url.searchParams.get('tarea');
                    this.active = (q && ['realizadas', 'pendientes', 'comisiones'].includes(q)) ? q : 'realizadas';
                    if (!q) {
                        url.searchParams.set('tarea', 'realizadas');
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
                    url.searchParams.set('tarea', key);
                    if (key !== 'realizadas') url.searchParams.delete('establecimiento');
                    if (key !== 'pendientes') url.searchParams.delete('localidad');
                    if (key !== 'comisiones') {
                        url.searchParams.delete('q');
                        url.searchParams.delete('anio');
                        url.searchParams.delete('mes');
                    }
                    const fn = replace ? 'replaceState' : 'pushState';
                    window.history[fn]({}, '', url.toString());
                },
                currentUrlWithHash(hash) {
                    const url = new URL(window.location.href);
                    return url.pathname + (url.search || '') + (hash || '');
                }
            }
        }
    </script>
@endsection