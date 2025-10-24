@extends('layouts.app')

@section('title', 'Edudata - Normativa')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Tarjeta principal con encabezado de imagen -->
    <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-10">
        <!-- Encabezado con imagen redondeada -->
        <div class="p-6 pb-0">
            <div class="rounded-xl overflow-hidden mb-6">
                <img src="{{ asset('images/titulo-digesto.png') }}" 
                     alt="Digesto Normativo" 
                     class="w-full h-auto object-cover rounded-xl">
            </div>
            
            <!-- Texto descriptivo mejorado -->
            <div class="mb-6">                
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed text-lg">
                        El <span class="font-semibold text-blue-700">Digesto Normativo</span> 
                        reúne toda la <span class="bg-yellow-100 px-1 rounded">normativa vigente</span> 
                        que regula el <span class="font-medium text-green-600">sistema educativo provincial</span>, 
                        facilitando el acceso a leyes, decretos, resoluciones y disposiciones.
                    </p>

                    <!-- Sección de funcionalidades con fondo claro -->
                    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 p-4 sm:p-6 lg:p-8 my-6 sm:my-8 shadow-lg border border-blue-200">
                        <!-- Elementos decorativos de fondo -->
                        <div class="absolute top-0 right-0 w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 bg-blue-200/30 rounded-full -translate-y-8 sm:-translate-y-12 lg:-translate-y-16 translate-x-8 sm:translate-x-12 lg:translate-x-16"></div>
                        <div class="absolute bottom-0 left-0 w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-indigo-200/30 rounded-full translate-y-8 sm:translate-y-10 lg:translate-y-12 -translate-x-6 sm:-translate-x-8 lg:-translate-x-12"></div>

                        <div class="relative z-10">
                            <!-- Header con icono -->
                            

                            <!-- Grid de funcionalidades -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                <!-- Tarjeta 1: Búsqueda -->
                                <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                    <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                        <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#f5cb58] flex items-center justify-center shadow-lg">
                                            <span class="text-white font-bold text-xs sm:text-sm">01</span>
                                        </div>
                                    </div>
                                    <div class="mb-3 sm:mb-4">
                                        <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#f5cb58] to-[#ddb750] flex items-center justify-center mb-2 sm:mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Búsqueda Avanzada</h4>
                                    <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Encuentra normativa específica utilizando palabras clave, títulos o descripciones con filtros precisos</p>
                                    <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                        <span class="text-green-600 text-sm font-semibold">🔍 Búsqueda por contenido</span>
                                    </div>
                                </div>

                                <!-- Tarjeta 2: Documentos -->
                                <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-[#6bbde5] hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                    <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                        <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#6bbde5] flex items-center justify-center shadow-lg">
                                            <span class="text-white font-bold text-xs sm:text-sm">02</span>
                                        </div>
                                    </div>
                                    <div class="mb-3 sm:mb-4">
                                        <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#6bbde5] to-[#5aadd5] flex items-center justify-center mb-2 sm:mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Documentos Completos</h4>
                                    <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Accede a los textos íntegros de leyes, decretos y resoluciones con toda la información oficial</p>
                                    <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                        <span class="text-cyan-600 text-sm font-semibold">📄 Acceso completo</span>
                                    </div>
                                </div>

                                <!-- Tarjeta 3: Transparencia -->
                                <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full md:col-span-2 lg:col-span-1">
                                    <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                        <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                                            <span class="text-white font-bold text-xs sm:text-sm">03</span>
                                        </div>
                                    </div>
                                    <div class="mb-3 sm:mb-4">
                                        <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center mb-2 sm:mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Transparencia Total</h4>
                                    <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Consulta toda la normativa educativa de manera pública y accesible para toda la comunidad</p>
                                    <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                        <span class="text-green-600 text-sm font-semibold">🌐 Acceso público garantizado</span>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 mt-4">
                        <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                            Normativa actualizada
                        </div>
                        <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                            Acceso público
                        </div>
                        <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                            <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                            Búsqueda avanzada
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido de búsqueda y resultados -->
        <div class="p-6 pt-4">
            {{-- Tarjeta de búsqueda --}}
            <div class="max-w-5xl mx-auto mb-8">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                    <div class="px-4 sm:px-6 pt-6 pb-4 border-b border-gray-200 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-gray-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900">Buscar normativa</h2>
                        </div>
                        @if(($digestos->total() ?? 0) > 0)
                            <span class="hidden sm:inline-flex items-center rounded-full bg-gray-200 text-gray-800 text-sm font-medium px-3 py-1">
                                {{ $digestos->total() }} resultados
                            </span>
                        @endif
                    </div>

                    <div class="p-4 sm:p-6">
                        <form action="{{ route('edudata.normativa') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-[1fr_auto_auto] gap-3 sm:gap-4">
                            <div class="relative">
                                <input
                                    type="text"
                                    name="q"
                                    value="{{ $q ?? '' }}"
                                    placeholder="Buscar por título, descripción o palabras clave…"
                                    class="w-full rounded-xl border-gray-300 focus:border-gray-600 focus:ring-2 focus:ring-gray-200 pl-11 py-3 text-gray-800 shadow-sm transition-all duration-200"
                                    aria-label="Buscar por título o descripción"
                                />
                                <span class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>

                            <button type="submit"
                                    class="inline-flex items-center justify-center px-5 py-3 rounded-xl border border-gray-700 bg-gray-700 text-white hover:bg-gray-800 hover:border-gray-800 font-medium shadow-sm transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                                Buscar
                            </button>

                            @if(!empty($q))
                                <a href="{{ route('edudata.normativa') }}"
                                   class="inline-flex items-center justify-center px-5 py-3 rounded-xl border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                    Limpiar
                                </a>
                            @endif
                        </form>

                        {{-- Meta info / estado --}}
                        <div class="mt-3 sm:mt-4 text-sm text-gray-700 flex items-center flex-wrap gap-x-2 gap-y-1">
                            @if(($digestos->total() ?? 0) > 0)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Mostrando {{ $digestos->firstItem() }}–{{ $digestos->lastItem() }} de {{ $digestos->total() }} resultados</span>
                                @if(!empty($q)) <span>para <span class="font-medium text-gray-900">"{{ $q }}"</span></span> @endif
                            @else
                                @if(!empty($q))
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span>No se encontraron resultados para <span class="font-medium text-gray-900">"{{ $q }}"</span>.</span>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                    <span>No hay normativas cargadas por el momento.</span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Resto del código se mantiene igual --}}
            {{-- Listado --}}
            <div class="max-w-5xl mx-auto">
                @if(session('error'))
                    <div class="mb-4 rounded-xl bg-gray-100 border border-gray-300 text-gray-800 px-4 py-3 flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <div>{{ session('error') }}</div>
                    </div>
                @endif

                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                    <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-200 flex items-center justify-between bg-gradient-to-r from-gray-50 to-white">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 rounded-lg bg-gray-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Normativas</h3>
                        </div>
                        @if(!empty($q))
                            <span class="hidden sm:inline text-sm text-gray-700 font-medium bg-gray-200 px-3 py-1.5 rounded-lg">Filtro: "{{ $q }}"</span>
                        @endif
                    </div>

                    @if(($digestos->count() ?? 0) > 0)
                        {{-- Scroll solo en md+ para no "atragantar" el móvil --}}
                        <div class="md:max-h-[520px] md:overflow-y-auto">
                            <ul role="list" class="divide-y divide-gray-200">
                                @foreach($digestos as $dig)
                                    <li class="hover:bg-gray-50 transition-colors duration-200">
                                        <div class="px-4 sm:px-6 py-4 sm:py-5 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                            {{-- Bloque izquierdo --}}
                                            <div class="flex items-start gap-4 min-w-0 flex-1">
                                                {{-- Ícono --}}
                                                <div class="flex-shrink-0 mt-0.5">
                                                    <div class="h-11 w-11 sm:h-12 sm:w-12 rounded-xl border border-gray-300 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center shadow-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M7 3h6l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M13 3v5h5"/>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <div class="min-w-0 flex-1">
                                                    <h4 class="text-base font-semibold text-gray-900 truncate">
                                                        {{ $dig->titulo }}
                                                    </h4>
                                                </div>
                                            </div>

                                            {{-- Acción (abajo en móvil, al costado en desktop) --}}
                                            <div class="flex-shrink-0">
                                                <a href="{{ route('edudata.normativa.show', $dig->id) }}"
                                                   class="w-full md:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium rounded-xl border border-gray-700 bg-gray-700 text-white hover:bg-gray-800 hover:border-gray-800 focus:outline-none shadow-sm transition-colors duration-200 group">
                                                    Ver documento
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-0.5 transition-transform" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Paginación --}}
                        <div class="px-4 sm:px-6 py-3 sm:py-4 border-t border-gray-200 bg-gray-50">
                            {{ $digestos->onEachSide(1)->links() }}
                        </div>
                    @else
                        <div class="p-8 sm:p-10 text-center text-gray-600">
                            <div class="mx-auto h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            @if(!empty($q))
                                <p class="text-lg font-medium text-gray-800 mb-1">No hay resultados para tu búsqueda</p>
                                <p class="text-sm">Intenta con otros términos o <a href="{{ route('edudata.normativa') }}" class="text-gray-700 hover:underline font-medium">ver todas las normativas</a></p>
                            @else
                                <p class="text-lg font-medium text-gray-800 mb-1">Aún no hay normativas disponibles</p>
                                <p class="text-sm">Vuelve pronto para consultar las normativas actualizadas</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection