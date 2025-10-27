@extends('layouts.app')

@section('title', 'Edudata - Mantenimiento Edilicio')

@section('content')
    <style>
        [x-cloak]{display:none!important}

        /* --- Estilos del archivero mejorado --- */
        .folder-tab{
            position:relative;border-radius:.75rem .75rem 0 0;box-shadow:0 1px 0 0 rgba(0,0,0,.05) inset;
            transition:all .3s cubic-bezier(.4,0,.2,1)
        }
        .folder-tab::before{
            content:"";position:absolute;left:-16px;top:0;width:16px;height:100%;background:inherit;border-top-left-radius:.75rem;
            clip-path:polygon(100% 0,100% 100%,0 100%,40% 0);box-shadow:-1px 0 0 rgba(0,0,0,.05) inset
        }
        @media (max-width:768px){.folder-tab::before{display:none}}
        .folder-tab.is-active{transform:translateY(-4px);box-shadow:0 8px 25px rgba(0,0,0,.12),0 2px 8px rgba(0,0,0,.08);z-index:40}
        .folder-stack>button{transition:transform .3s ease,box-shadow .3s ease,filter .3s ease}
        .folder-stack>button:hover{filter:brightness(1.05);transform:translateY(-2px)}

        /* Contenedor tipo carpeta (OJO: sin overflow hidden para no ocultar scrolls) */
        .folder-container{
            background:linear-gradient(135deg,#f8fafc 0%,#f1f5f9 100%);border:2px solid #e2e8f0;border-radius:0 12px 12px 12px;
            box-shadow:0 10px 30px rgba(0,0,0,.08);position:relative;overflow:visible
        }
        @media (max-width:768px){.folder-container{border-radius:12px;margin-top:1rem}}
        .folder-container::before{content:"";position:absolute;top:0;left:0;right:0;height:4px;
            background:linear-gradient(90deg,#f59e0b 0%,#3b82f6 50%,#10b981 100%)}

        /* Stack de pestañas responsivo */
        .folder-stack{display:flex;flex-wrap:wrap;gap:.5rem}
        @media (max-width:768px){
            .folder-stack{flex-direction:column;gap:.25rem;padding:1rem}
            .folder-tab{margin-right:0!important;margin-left:0!important;border-radius:.5rem;width:100%;text-align:center}
            .folder-tab.is-active{transform:none;box-shadow:0 4px 12px rgba(0,0,0,.15)}
        }

        /* Tarjetas de contenido */
        .file-card{background:#fff;border:1px solid #e2e8f0;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.04);
            transition:all .3s ease;position:relative;overflow:hidden}
        .file-card::before{content:"";position:absolute;left:0;top:0;bottom:0;width:4px;background:inherit}
        .file-card:hover{transform:translateY(-2px);box-shadow:0 8px 25px rgba(0,0,0,.1);border-color:#cbd5e1}
        @media (max-width:768px){.file-card{margin-bottom:1rem}.file-card:hover{transform:none}}

        /* Cabeceras sección */
        .section-header{
            background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);color:#fff;padding:1rem 1.5rem;border-radius:8px 8px 0 0;position:relative;overflow:hidden
        }
        @media (max-width:768px){.section-header{padding:.75rem 1rem}.section-header h3{font-size:1.1rem}}

        /* Formularios */
        .search-form{background:#fff;border:2px solid #e2e8f0;border-radius:12px;padding:1.5rem;box-shadow:0 4px 12px rgba(0,0,0,.05);position:relative}
        @media (max-width:768px){.search-form{padding:1rem;margin:0 -.5rem}.search-form::before{display:none}}
        .search-grid{display:grid;grid-template-columns:1fr;gap:1rem}
        @media (min-width:768px){.search-grid{grid-template-columns:2fr 1fr;gap:1.5rem}}

        /* --- Tablas con scroll horizontal real --- */
        .data-table{background:#fff;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,.08);border:1px solid #e2e8f0;overflow:visible}
        .data-table thead{background:linear-gradient(135deg,#f8fafc 0%,#f1f5f9 100%)}
        .data-table th{border-bottom:2px solid #e2e8f0;font-weight:600;text-transform:uppercase;letter-spacing:.05em}

        /* Contenedor que permite el scroll horizontal */
        .table-container{
            overflow-x:auto;overflow-y:auto; /* ambos, por si también hay alto limitado */
            -webkit-overflow-scrolling:touch;scrollbar-gutter:stable both-edges
        }

        /* La tabla puede superar el ancho del contenedor */
        .table-container>table{
            width:max-content;           /* clave para que crezca según contenido */
            min-width:100%;              /* pero nunca más chica que su contenedor */
            table-layout:auto;
            border-collapse:separate;border-spacing:0
        }

        /* No wrap por defecto para forzar crecimiento y activar scroll */
        .table-container th,
        .table-container td{white-space:nowrap}

        /* Columnas que sí pueden envolver texto largo */
        .table-container .cell-wrap{white-space:normal!important}

        /* Sticky header estable con scroll */
        .table-container thead{position:sticky;top:0;z-index:10;background:linear-gradient(135deg,#f8fafc 0%,#f1f5f9 100%)}

        /* Ajustes móviles */
        @media (max-width:768px){
            .data-table{border-radius:8px;margin:0 -.5rem;width:calc(100% + 1rem)}
            .table-container>table{min-width:720px}  /* fuerza base mayor en celular */
            .data-table th,.data-table td{padding:.75rem .5rem;font-size:.875rem}
            .data-table th{font-size:.75rem}
        }

        .status-badge{padding:.25rem .75rem;border-radius:20px;font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;box-shadow:0 2px 4px rgba(0,0,0,.1);white-space:nowrap}
        @media (max-width:768px){.status-badge{font-size:.7rem;padding:.2rem .5rem}}

        .results-grid{display:grid;grid-template-columns:1fr;gap:1.5rem}
        @media (min-width:768px){.results-grid{grid-template-columns:repeat(3,1fr);gap:1.5rem}}
        @media (min-width:1024px){.results-grid{gap:2rem}}

        .btn-responsive{width:100%;padding:.75rem 1rem;font-size:.875rem;display:flex;align-items:center;justify-content:center;gap:.5rem}
        @media (min-width:768px){.btn-responsive{width:auto;padding:.875rem 1.5rem;font-size:1rem}}

        .text-responsive{font-size:.875rem;line-height:1.5}
        @media (min-width:768px){.text-responsive{font-size:1rem}}

        .section-padding{padding:1rem}
        @media (min-width:768px){.section-padding{padding:2rem}}

        @media (max-width:768px){.mobile-hidden{display:none}}
        .mobile-optimized{-webkit-overflow-scrolling:touch;scrollbar-width:thin}
        .mobile-card-container{display:flex;flex-direction:column;gap:1rem}
    </style>

    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-8">
            <div class="p-4 md:p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6">
                    <img src="{{ asset('images/titulo-mantenimiento.png') }}" alt="Mantenimiento Edilicio" class="w-full h-auto object-cover rounded-xl">
                </div>

                <!-- Intro + tarjetas -->
                <div class="mb-4 md:mb-6">
                    <div class="space-y-3 md:space-y-4">
                        <p class="text-gray-700 leading-relaxed text-lg md:text-xl text-responsive">
                            La <span class="font-semibold text-blue-700">Dirección de Programación y Mantenimiento Edilicio</span>
                            se encarga del <span class="bg-yellow-100 px-1 rounded">mantenimiento integral</span> de los
                            <span class="font-medium text-green-600">establecimientos escolares</span> de la provincia,
                            llevando a cabo las <span class="font-semibold">tareas diarias para conservar el estado óptimo</span>
                            de los edificios educativos.
                        </p>

                        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 p-4 md:p-6 lg:p-8 my-4 md:my-6 lg:my-8 shadow-lg border border-blue-200">
                            <div class="absolute top-0 right-0 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 bg-blue-200/30 rounded-full -translate-y-6 md:-translate-y-8 lg:-translate-y-10 translate-x-4 md:translate-x-6 lg:translate-x-8"></div>
                            <div class="absolute bottom-0 left-0 w-12 h-12 md:w-16 md:h-16 lg:w-20 lg:h-20 bg-indigo-200/30 rounded-full translate-y-4 md:translate-y-6 lg:translate-y-8 -translate-x-3 md:-translate-x-4 lg:-translate-x-6"></div>

                            <div class="relative z-10">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                                    <!-- Tarjeta 1 -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 md:p-6 border border-blue-100 hover:bg-white transition-all duration-300 md:hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 md:-top-3 md:-left-3">
                                            <div class="h-5 w-5 md:h-6 md:w-6 rounded-full bg-[#f5cb58] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs">01</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 md:mb-4">
                                            <div class="h-8 w-8 md:h-10 md:w-10 rounded-lg bg-gradient-to-br from-[#f5cb58] to-[#ddb750] flex items-center justify-center mb-2 md:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </div>
                                        </div>
                                        <h4 class="text-base md:text-lg font-bold text-gray-800 mb-2 md:mb-3">Tareas de Mantenimiento</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm">Consulta el
                                            historial de realizadas, pendientes y comisiones, filtrado por establecimiento.</p>
                                        <div class="mt-3 md:mt-4 pt-3 md:pt-4 border-t border-gray-200">
                                            <a href="#tareas" rel="noopener" class="btn-responsive bg-[#f5cb58] hover:bg-[#e5bb48] text-white font-semibold rounded-lg shadow-sm transition-all duration-200 md:hover:scale-105">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                                Búsqueda avanzada
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 2 -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 md:p-6 border border-[#6bbde5] hover:bg-white transition-all duration-300 md:hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 md:-top-3 md:-left-3">
                                            <div class="h-5 w-5 md:h-6 md:w-6 rounded-full bg-[#6bbde5] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs">02</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 md:mb-4">
                                            <div class="h-8 w-8 md:h-10 md:w-10 rounded-lg bg-gradient-to-br from-[#6bbde5] to-[#5aadd5] flex items-center justify-center mb-2 md:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            </div>
                                        </div>
                                        <h4 class="text-base md:text-lg font-bold text-gray-800 mb-2 md:mb-3">Ubicación de Establecimientos</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm">Mapa completo con la localización de instituciones educativas provinciales.</p>
                                        <div class="mt-3 md:mt-4 pt-3 md:pt-4 border-t border-gray-200">
                                            <a href="https://nimble-gumdrop-ccc062.netlify.app/" target="_blank" rel="noopener" class="btn-responsive bg-[#6bbde5] hover:bg-[#5aadd5] text-white font-semibold rounded-lg shadow-sm transition-all duration-200 md:hover:scale-105">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                Ver Establecimientos
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 3 -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 md:p-6 border border-blue-100 hover:bg-white transition-all duration-300 md:hover:scale-105 shadow-sm flex flex-col h-full md:col-span-2 lg:col-span-1">
                                        <div class="absolute -top-2 -left-2 md:-top-3 md:-left-3">
                                            <div class="h-5 w-5 md:h-6 md:w-6 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs">03</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 md:mb-4">
                                            <div class="h-8 w-8 md:h-10 md:w-10 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center mb-2 md:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                                            </div>
                                        </div>
                                        <h4 class="text-base md:text-lg font-bold text-gray-800 mb-2 md:mb-3">Solicitudes de Mantenimiento</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm">Generá solicitudes si pertenecés a la comunidad educativa.</p>
                                        <div class="mt-3 md:mt-4 pt-3 md:pt-4 border-t border-gray-200">
                                            <a href="https://tad.catamarca.gob.ar/tramitesadistancia" target="_blank" rel="noopener" class="btn-responsive bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-sm transition-all duration-200 md:hover:scale-105">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                Realizar Solicitud
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-xs md:text-sm text-gray-700"><span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>Transparencia en la gestión</div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-xs md:text-sm text-gray-700"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>Mantenimiento preventivo</div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-xs md:text-sm text-gray-700"><span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>Comunidad educativa</div>
                        </div>
                    </div>
                </div>

                <!-- Archivero con inputs + tablas dentro de cada carpeta -->
                <div id="tareas" class="pt-4" x-data="archivero()" x-init="initFromQuery('{{ request('tarea','realizadas') }}')">

                    {{-- Pestañas --}}
                    <div class="folder-container mb-8">
                        <div class="folder-stack px-4 md:px-6 pt-4 md:pt-6">
                            <template x-for="(tab,i) in tabs" :key="tab.key">
                                <button type="button"
                                    class="folder-tab px-4 md:px-6 py-3 md:py-4 mr-[-8px] md:mr-[-12px] border-2 border-b-0"
                                    :class="[
                                        'text-sm md:text-base font-bold',
                                        i===0?'':'ml-2 md:ml-4',
                                        active===tab.key ? 'is-active z-30 text-gray-900 border-gray-300' : 'z-10 text-gray-700 border-transparent',
                                        active===tab.key ? tab.activeBg : tab.bg
                                    ]"
                                    @click="switchTo(tab.key)" x-text="tab.label"></button>
                            </template>
                        </div>

                        <!-- Paneles (renderizados SIEMPRE, visibles según pestaña) -->
                        <div class="border-t-0">

                            {{-- REALIZADAS --}}
                            <section x-show="active==='realizadas'" x-cloak class="section-padding space-y-6 md:space-y-8">
                                <div class="search-form">
                                    <form method="GET" :action="currentUrlWithHash('#resultados')"
                                        class="search-grid items-end">
                                        <input type="hidden" name="tarea" value="realizadas">
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2 md:mb-3">Buscar Establecimiento</label>
                                            <div class="relative">
                                                <input type="text" name="establecimiento" value="{{ request('establecimiento') }}"
                                                    class="w-full rounded-lg border-2 border-gray-300 py-2 md:py-3 px-3 md:px-4 focus:border-blue-500 focus:ring-2 md:focus:ring-4 focus:ring-blue-200 transition-all duration-200 placeholder-gray-400 text-sm md:text-base"
                                                    placeholder="Ingrese el nombre del establecimiento...">
                                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn-responsive bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold rounded-lg shadow-lg transition-all duration-200 md:hover:shadow-xl md:transform md:hover:-translate-y-0.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                                Buscar
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                @php
                                    $regAPH  = $registros['APH']  ?? collect();
                                    $regELEC = $registros['ELEC'] ?? collect();
                                    $regDEZM = $registros['DEZM'] ?? collect();

                                    $cntAPH = $regAPH->count();
                                    $cntELEC = $regELEC->count();
                                    $cntDEZM = $regDEZM->count();

                                    $scrollAPH = $cntAPH > 8;
                                    $scrollELEC = $cntELEC > 8;
                                    $scrollDEZM = $cntDEZM > 8;
                                @endphp

                                <div id="resultados" class="results-grid mobile-card-container">
                                    <!-- APH -->
                                    <div class="file-card" style="border-left-color:#8b5cf6;">
                                        <div class="section-header" style="background:linear-gradient(135deg,#8b5cf6 0%,#7c3aed 100%);">
                                            <h3 class="text-base md:text-lg font-bold text-white">Albañilería - Plomería - Herrería</h3>
                                            <p class="text-xs md:text-sm text-white/90 mt-1">Registros: <strong>{{ $cntAPH }}</strong></p>
                                        </div>
                                        <div class="p-4 md:p-6 {{ $scrollAPH ? 'max-h-64 md:max-h-96 overflow-y-auto pr-1 md:pr-2' : '' }} mobile-optimized">
                                            @forelse($regAPH as $r)
                                                <div class="border-l-4 border-purple-400 bg-purple-50/50 rounded-r-lg p-3 md:p-4 mb-2 md:mb-3 last:mb-0 hover:bg-purple-100/50 transition-colors">
                                                    <p class="font-semibold text-gray-800 text-xs md:text-sm">
                                                        <span class="text-purple-600 font-bold">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span> - {{ $r->establecimiento }}
                                                    </p>
                                                    <p class="text-gray-600 text-xs md:text-sm mt-1 md:mt-2 leading-relaxed">{{ $r->tarea }}</p>
                                                </div>
                                            @empty
                                                <div class="text-center py-6 md:py-8">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-12 md:w-12 text-gray-400 mx-auto mb-2 md:mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                    <p class="text-gray-500 italic text-sm">Sin tareas registradas</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                    <!-- ELEC -->
                                    <div class="file-card" style="border-left-color:#3b82f6;">
                                        <div class="section-header" style="background:linear-gradient(135deg,#3b82f6 0%,#1d4ed8 100%);">
                                            <h3 class="text-base md:text-lg font-bold text-white">Electricidad</h3>
                                            <p class="text-xs md:text-sm text-white/90 mt-1">Registros: <strong>{{ $cntELEC }}</strong></p>
                                        </div>
                                        <div class="p-4 md:p-6 {{ $scrollELEC ? 'max-h-64 md:max-h-96 overflow-y-auto pr-1 md:pr-2' : '' }} mobile-optimized">
                                            @forelse($regELEC as $r)
                                                <div class="border-l-4 border-blue-400 bg-blue-50/50 rounded-r-lg p-3 md:p-4 mb-2 md:mb-3 last:mb-0 hover:bg-blue-100/50 transition-colors">
                                                    <p class="font-semibold text-gray-800 text-xs md:text-sm">
                                                        <span class="text-blue-600 font-bold">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span> - {{ $r->establecimiento }}
                                                    </p>
                                                    <p class="text-gray-600 text-xs md:text-sm mt-1 md:mt-2 leading-relaxed">{{ $r->tarea }}</p>
                                                </div>
                                            @empty
                                                <div class="text-center py-6 md:py-8">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-12 md:w-12 text-gray-400 mx-auto mb-2 md:mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                                    <p class="text-gray-500 italic text-sm">Sin tareas registradas</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                    <!-- DEZM -->
                                    <div class="file-card" style="border-left-color:#10b981;">
                                        <div class="section-header" style="background:linear-gradient(135deg,#10b981 0%,#059669 100%);">
                                            <h3 class="text-base md:text-lg font-bold text-white">Desmalezamiento</h3>
                                            <p class="text-xs md:text-sm text-white/90 mt-1">Registros: <strong>{{ $cntDEZM }}</strong></p>
                                        </div>
                                        <div class="p-4 md:p-6 {{ $scrollDEZM ? 'max-h-64 md:max-h-96 overflow-y-auto pr-1 md:pr-2' : '' }} mobile-optimized">
                                            @forelse($regDEZM as $r)
                                                <div class="border-l-4 border-green-400 bg-green-50/50 rounded-r-lg p-3 md:p-4 mb-2 md:mb-3 last:mb-0 hover:bg-green-100/50 transition-colors">
                                                    <p class="font-semibold text-gray-800 text-xs md:text-sm">
                                                        <span class="text-green-600 font-bold">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span> - {{ $r->establecimiento }}
                                                    </p>
                                                    <p class="text-gray-600 text-xs md:text-sm mt-1 md:mt-2 leading-relaxed">{{ $r->tarea }}</p>
                                                </div>
                                            @empty
                                                <div class="text-center py-6 md:py-8">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-12 md:w-12 text-gray-400 mx-auto mb-2 md:mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                                                    <p class="text-gray-500 italic text-sm">Sin tareas registradas</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </section>

                            {{-- PENDIENTES --}}
                            <section x-show="active==='pendientes'" x-cloak class="section-padding space-y-6 md:space-y-8">
                                <div class="search-form">
                                    <form method="GET" :action="currentUrlWithHash('#resultados-pend')" class="search-grid items-end">
                                        <input type="hidden" name="tarea" value="pendientes">
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2 md:mb-3">Filtrar por Localidad</label>
                                            <div class="relative">
                                                <input type="text" name="localidad" value="{{ request('localidad') }}"
                                                    class="w-full rounded-lg border-2 border-gray-300 py-2 md:py-3 px-3 md:px-4 focus:border-blue-500 focus:ring-2 md:focus:ring-4 focus:ring-blue-200 transition-all duration-200 placeholder-gray-400 text-sm md:text-base"
                                                    placeholder="Ingrese el nombre de la localidad...">
                                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn-responsive bg-gradient-to-r from-sky-600 to-sky-700 hover:from-sky-700 hover:to-sky-800 text-white font-bold rounded-lg shadow-lg transition-all duration-200 md:hover:shadow-xl md:transform md:hover:-translate-y-0.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
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
                                    <div class="section-header" style="background:linear-gradient(135deg,#0ea5e9 0%,#0369a1 100%);">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                            <h3 class="text-base md:text-lg font-bold text-white">Tareas Pendientes</h3>
                                            <div class="flex items-center gap-2 md:gap-4 text-xs md:text-sm text-white/90">
                                                <span>Localidad: <strong class="text-white">{{ request('localidad') ?: 'Todas' }}</strong></span>
                                                <span class="hidden md:inline">•</span>
                                                <span>Registros: <strong class="text-white">{{ $pend->count() }}</strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-container {{ $maxHeightPend }} mobile-optimized">
                                        <table class="min-w-full text-sm">
                                            <caption class="sr-only">Listado de tareas pendientes</caption>
                                            <thead>
                                                <tr class="bg-gradient-to-r from-sky-50 to-blue-50">
                                                    @php $thBase='px-3 md:px-6 py-3 md:py-4 text-left text-xs font-bold tracking-wider uppercase text-sky-800 border-b-2 border-sky-200'; @endphp
                                                    <th class="{{ $thBase }} w-32 md:w-48">Localidad</th>
                                                    <th class="{{ $thBase }} w-40 md:w-56">Establecimiento</th>
                                                    <th class="{{ $thBase }} min-w-60 md:min-w-80">Pedido</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-sky-100">
                                                @forelse($pend as $p)
                                                    <tr class="hover:bg-gradient-to-r hover:from-sky-50/80 hover:to-blue-50/80 transition-all duration-200 group">
                                                        <td class="px-3 md:px-6 py-3 md:py-4">
                                                            <div class="max-w-[12rem]">
                                                                <span class="block break-words font-semibold text-sky-900 text-xs md:text-sm">{{ $p->localidad }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4">
                                                            <div class="max-w-[16rem]">
                                                                <span class="block break-words text-gray-800 text-xs md:text-sm">{{ $p->establecimiento }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 cell-wrap">
                                                            <div class="max-w-[28rem] md:max-w-[36rem]">
                                                                <span class="block break-words text-gray-600 leading-relaxed text-xs md:text-sm">{{ $p->pedido }}</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="px-3 md:px-6 py-8 md:py-12 text-center">
                                                            <div class="flex flex-col items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 md:h-16 md:w-16 text-gray-400 mb-3 md:mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                                                                <p class="text-gray-500 text-sm md:text-lg font-medium">No hay tareas pendientes</p>
                                                                <p class="text-gray-400 text-xs md:text-sm mt-1">Todos los mantenimientos están al día</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    @if ($scrollPend)
                                        <div class="px-4 py-2 text-xs md:text-sm text-gray-500 text-center">
                                            <span class="inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4 mr-1 md:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                                                Desplázate para ver más registros
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </section>

                            {{-- COMISIONES --}}
                            <section x-show="active==='comisiones'" x-cloak class="section-padding space-y-6 md:space-y-8">
                                <div class="search-form">
                                    <form method="GET" :action="currentUrlWithHash('#resultados-com')" class="search-grid items-end">
                                        <input type="hidden" name="tarea" value="comisiones">
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2 md:mb-3">Buscar Comisiones</label>
                                            <div class="relative">
                                                <input type="text" name="q" value="{{ request('q') }}"
                                                    class="w-full rounded-lg border-2 border-gray-300 py-2 md:py-3 px-3 md:px-4 focus:border-emerald-500 focus:ring-2 md:focus:ring-4 focus:ring-emerald-200 transition-all duration-200 placeholder-gray-400 text-sm md:text-base"
                                                    placeholder="Buscar por localidad o establecimiento...">
                                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn-responsive bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-bold rounded-lg shadow-lg transition-all duration-200 md:hover:shadow-xl md:transform md:hover:-translate-y-0.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
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
                                    <div class="section-header" style="background:linear-gradient(135deg,#10b981 0%,#059669 100%);">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                            <h3 class="text-base md:text-lg font-bold text-white">Comisiones de Servicio</h3>
                                            <div class="flex items-center gap-2 md:gap-3 text-xs md:text-sm text-white/90">
                                                <span class="hidden md:inline">Año: <strong class="text-white">{{ request('anio') ?: 'Todos' }}</strong></span>
                                                <span class="hidden md:inline">•</span>
                                                <span>Registros: <strong class="text-white">{{ $com->count() }}</strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-container {{ $maxHeightCom }} mobile-optimized">
                                        <table class="min-w-full text-sm">
                                            <caption class="sr-only">Listado de comisiones de servicio</caption>
                                            <thead>
                                                <tr class="bg-gradient-to-r from-emerald-50 to-green-50">
                                                    @php $thBase='px-3 md:px-6 py-3 md:py-4 text-left text-xs font-bold tracking-wider uppercase text-emerald-800 border-b-2 border-emerald-200'; @endphp
                                                    <th class="{{ $thBase }} w-20 md:w-28">Fecha</th>
                                                    <th class="{{ $thBase }} w-32 md:w-56">Establecimiento</th>
                                                    <th class="{{ $thBase }} mobile-hidden">Localidad</th>
                                                    <th class="{{ $thBase }} mobile-hidden">Departamento</th>
                                                    <th class="{{ $thBase }} min-w-40 md:min-w-80">Detalle</th>
                                                    <th class="{{ $thBase }} w-16 md:w-20 text-center">Pers.</th>
                                                    <th class="{{ $thBase }} w-16 md:w-20 text-center">Días</th>
                                                    <th class="{{ $thBase }} w-18 md:w-24 text-center">Agentes</th>
                                                    <th class="{{ $thBase }} w-24 md:w-32">Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-emerald-100">
                                                @forelse($com as $c)
                                                    <tr class="hover:bg-gradient-to-r hover:from-emerald-50/80 hover:to-green-50/80 transition-all duration-200 group">
                                                        <td class="px-3 md:px-6 py-3 md:py-4 text-emerald-900 whitespace-nowrap font-semibold text-xs md:text-sm">
                                                            {{ \Carbon\Carbon::parse($c->fecha)->format('d/m/Y') }}
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4">
                                                            <div class="max-w-[16rem]">
                                                                <span class="block break-words text-gray-800 text-xs md:text-sm">{{ $c->establecimiento }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 mobile-hidden">
                                                            <div class="max-w-[12rem]">
                                                                <span class="block break-words text-gray-800 text-xs md:text-sm">{{ $c->localidad }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 mobile-hidden">
                                                            <div class="max-w-[10rem]">
                                                                <span class="block break-words text-gray-800 text-xs md:text-sm">{{ $c->departamento }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 cell-wrap">
                                                            <div class="max-w-[28rem] md:max-w-[36rem]">
                                                                <span class="block break-words text-gray-600 leading-relaxed text-xs md:text-sm">{{ $c->detalle_obra }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 text-emerald-900 text-center font-semibold text-xs md:text-sm">{{ $c->personas }}</td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 text-emerald-900 text-center font-semibold text-xs md:text-sm">{{ $c->dias }}</td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4 text-emerald-900 text-center font-semibold text-xs md:text-sm">{{ $c->agentes }}</td>
                                                        <td class="px-3 md:px-6 py-3 md:py-4">
                                                            @php
                                                                $estadoColor = match (strtolower($c->estado)) {
                                                                    'completado','finalizado' => 'bg-green-100 text-green-800 border-green-200',
                                                                    'en proceso','en progreso' => 'bg-blue-100 text-blue-800 border-blue-200',
                                                                    'pendiente' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                                                    'cancelado' => 'bg-red-100 text-red-800 border-red-200',
                                                                    default => 'bg-gray-100 text-gray-800 border-gray-200',
                                                                };
                                                            @endphp
                                                            <span class="status-badge {{ $estadoColor }} border text-xs">{{ $c->estado }}</span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="px-3 md:px-6 py-8 md:py-12 text-center">
                                                            <div class="flex flex-col items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 md:h-16 md:w-16 text-gray-400 mb-3 md:mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                                                <p class="text-gray-500 text-sm md:text-lg font-medium">No hay comisiones registradas</p>
                                                                <p class="text-gray-400 text-xs md:text-sm mt-1">No se encontraron comisiones</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    @if ($scrollCom)
                                        <div class="px-4 py-2 text-xs md:text-sm text-gray-500 text-center">
                                            <span class="inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4 mr-1 md:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
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
                                'bg-gradient-to-r from-amber-400 via-yellow-500 to-amber-600': active==='realizadas',
                                'bg-gradient-to-r from-sky-400 via-blue-500 to-sky-600': active==='pendientes',
                                'bg-gradient-to-r from-emerald-400 via-green-500 to-emerald-600': active==='comisiones'
                            }"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Alpine: controlador del archivero --}}
    <script>
        function archivero() {
            return {
                tabs: [
                    { key:'realizadas', label:'Realizadas', bg:'bg-amber-100 text-amber-800', activeBg:'bg-amber-200 text-amber-900' },
                    { key:'pendientes', label:'Pendientes', bg:'bg-sky-100 text-sky-800', activeBg:'bg-sky-200 text-sky-900' },
                    { key:'comisiones', label:'Comisiones', bg:'bg-emerald-100 text-emerald-800', activeBg:'bg-emerald-200 text-emerald-900' },
                ],
                active:'realizadas',

                initFromQuery(serverSelected){
                    const url = new URL(window.location.href);
                    const q = url.searchParams.get('tarea');
                    this.active = (q && ['realizadas','pendientes','comisiones'].includes(q)) ? q : 'realizadas';
                    if(!q){
                        url.searchParams.set('tarea','realizadas');
                        window.history.replaceState({},'',url.toString());
                    }
                },
                switchTo(key){
                    if(this.active===key) return;
                    this.active = key;
                    this.pushUrl(key,true);
                },
                pushUrl(key,replace){
                    const url = new URL(window.location.href);
                    url.searchParams.set('tarea',key);
                    if(key!=='realizadas') url.searchParams.delete('establecimiento');
                    if(key!=='pendientes') url.searchParams.delete('localidad');
                    if(key!=='comisiones'){ url.searchParams.delete('q'); url.searchParams.delete('anio'); url.searchParams.delete('mes'); }
                    const fn = replace ? 'replaceState':'pushState';
                    window.history[fn]({},'',url.toString());
                },
                currentUrlWithHash(hash){
                    const url = new URL(window.location.href);
                    return url.pathname + (url.search||'') + (hash||'');
                }
            }
        }
    </script>
@endsection
