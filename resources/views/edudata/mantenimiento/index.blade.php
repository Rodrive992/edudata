@extends('layouts.app')

@section('title', 'Edudata - Mantenimiento Edilicio')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-10">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/titulo-mantenimiento.png') }}" alt="Mantenimiento Edilicio"
                        class="w-full h-full object-cover rounded-xl ">
                </div>

                <!-- Texto descriptivo mejorado -->
                <div class="mb-6">
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed text-xl">
                            La <span class="font-semibold text-blue-700">Dirección de Programación y Mantenimiento
                                Edilicio</span>
                            se encarga del <span class="bg-yellow-100 px-1 rounded">mantenimiento integral</span> de los
                            <span class="font-medium text-green-600">establecimientos escolares</span> de la provincia,
                            llevando a cabo las <span class="font-semibold">tareas diarias para conservar el estado
                                óptimo</span>
                            de los edificios educativos.
                        </p>

                        <!-- Sección de funcionalidades con fondo claro -->
                        <div
                            class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 p-4 sm:p-6 lg:p-8 my-6 sm:my-8 shadow-lg border border-blue-200">
                            <!-- Elementos decorativos de fondo -->
                            <div
                                class="absolute top-0 right-0 w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 bg-blue-200/30 rounded-full -translate-y-8 sm:-translate-y-12 lg:-translate-y-16 translate-x-8 sm:translate-x-12 lg:translate-x-16">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-indigo-200/30 rounded-full translate-y-8 sm:translate-y-10 lg:translate-y-12 -translate-x-6 sm:-translate-x-8 lg:-translate-x-12">
                            </div>

                            <div class="relative z-10">
                                <!-- Grid de funcionalidades -->
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                    <!-- Tarjeta 1: Tareas realizadas -->
                                    <div
                                        class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div
                                                class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#f5cb58] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">01</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div
                                                class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#f5cb58] to-[#ddb750] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Tareas de
                                            Mantenimiento</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Consulta el
                                            historial completo de mantenimiento realizadas, pendientes y comisiones de
                                            servicio, filtrado por establecimiento educativo</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <a href="#tareas" rel="noopener"
                                                class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 sm:px-4 sm:py-2 bg-[#f5cb58] hover:bg-[#e5bb48] text-white font-semibold rounded-lg shadow-sm transition-all duration-200 hover:scale-105 text-sm sm:text-base">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                                Búsqueda avanzada
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 2: Ubicación -->
                                    <div
                                        class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-[#6bbde5] hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div
                                                class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#6bbde5] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">02</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div
                                                class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#6bbde5] to-[#5aadd5] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Ubicación de
                                            Establecimientos</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Accede al
                                            mapa completo con la localización de todas las instituciones educativas
                                            provinciales</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <a href="https://nimble-gumdrop-ccc062.netlify.app/" target="_blank"
                                                rel="noopener"
                                                class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 sm:px-4 sm:py-2 bg-[#6bbde5] hover:bg-[#5aadd5] text-white font-semibold rounded-lg shadow-sm transition-all duration-200 hover:scale-105 text-sm sm:text-base">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                Ver Establecimientos
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 3: Solicitudes -->
                                    <div
                                        class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full md:col-span-2 lg:col-span-1">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div
                                                class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">03</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div
                                                class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Solicitudes de
                                            Mantenimiento</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Genera
                                            solicitudes específicas si pertenecés a la comunidad educativa de la provincia
                                        </p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <a href="https://tad.catamarca.gob.ar/tramitesadistancia" target="_blank"
                                                rel="noopener"
                                                class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 sm:px-4 sm:py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-sm transition-all duration-200 hover:scale-105 text-sm sm:text-base">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Realizar Solicitud
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                Transparencia en la gestión
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Mantenimiento preventivo
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                Comunidad educativa
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contenido de filtros y tablas -->
                <div id="tareas" class="p-6 pt-4">
                    @php $tareaSel = request('tarea', 'realizadas'); @endphp

                    <!-- Tarjeta de filtros mejorada -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-10">
                        <form id="filtrosForm" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-6   items-end">
                            <!-- Tarea (siempre) -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tareas</label>
                                <select name="tarea"
                                    class="w-full rounded-md border border-gray-300 py-2.5 px-3 focus:border-gray-700 focus:ring-2 focus:ring-gray-700 transition text-sm">
                                    <option value="realizadas" {{ $tareaSel === 'realizadas' ? 'selected' : '' }}>
                                        Realizadas
                                    </option>
                                    <option value="pendientes" {{ $tareaSel === 'pendientes' ? 'selected' : '' }}>
                                        Pendientes
                                    </option>
                                    <option value="comisiones" {{ $tareaSel === 'comisiones' ? 'selected' : '' }}>
                                        Comisiones
                                    </option>
                                </select>
                            </div>

                            @if ($tareaSel === 'realizadas')
                                <!-- Establecimiento-->
                                <div class="md:col-span-5">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Establecimiento</label>
                                    <input type="text" name="establecimiento" value="{{ request('establecimiento') }}"
                                        class="w-full rounded-md border border-gray-300 py-2.5 px-3 focus:border-gray-700 focus:ring-2 focus:ring-gray-700 transition"
                                        placeholder="Buscar establecimiento...">
                                </div>
                            @endif

                            @if ($tareaSel === 'pendientes')
                                <!-- Localidad -->
                                <div class="md:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Localidad</label>
                                    <input type="text" name="localidad" value="{{ request('localidad') }}"
                                        class="w-full rounded-md border border-gray-300 py-2.5 px-3 focus:border-gray-700 focus:ring-2 focus:ring-gray-700 transition"
                                        placeholder="Filtrar por localidad">
                                </div>
                            @endif

                            @if ($tareaSel === 'comisiones')
                                <!-- Búsqueda -->
                                <div class="md:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
                                    <input type="text" name="q" value="{{ request('q') }}"
                                        class="w-full rounded-md border border-gray-300 py-2.5 px-3 focus:border-gray-700 focus:ring-2 focus:ring-gray-700 transition"
                                        placeholder="Localidad o establecimiento">
                                </div>
                            @endif

                            <!-- Botón Buscar -->
                            <div class="md:col-span-3">
                                <button type="submit"
                                    class="w-full bg-[#162172] hover:bg-gray-700 text-white font-semibold py-2.5 px-5 rounded-md shadow-sm transition focus:outline-none focus:ring-2 focus:ring-gray-500">
                                    Buscar
                                </button>
                            </div>
                        </form>
                    </div>

                    </form>
                </div>

                <!-- Ancla de resultados para que el navegador baje aquí tras buscar -->
                <div id="resultados"></div>

                {{-- CONTENIDOS SEGÚN TAREA --}}
                @if ($tareaSel === 'realizadas')
                    @php
                        $cntAPH = isset($registros['APH']) ? $registros['APH']->count() : 0;
                        $cntELEC = isset($registros['ELEC']) ? $registros['ELEC']->count() : 0;
                        $cntDEZM = isset($registros['DEZM']) ? $registros['DEZM']->count() : 0;

                        $scrollAPH = $cntAPH > 15;
                        $scrollELEC = $cntELEC > 15;
                        $scrollDEZM = $cntDEZM > 15;
                    @endphp

                    <!-- Tarjetas por tipo de tarea -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <!-- APH -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                            <div class="bg-purple-100/50 px-4 py-3 border-b border-purple-200/50">
                                <h3 class="text-lg font-bold text-purple-800">Albañilería - Plomería - Herrería</h3>
                                <p class="text-xs text-purple-800/80">Registros: <strong>{{ $cntAPH }}</strong>
                                </p>
                            </div>
                            <div class="p-4 {{ $scrollAPH ? 'max-h-96 overflow-y-auto pr-1' : '' }}">
                                @forelse(($registros['APH'] ?? []) as $r)
                                    <div class="border-b border-gray-100 last:border-0 py-3">
                                        <p class="font-medium text-gray-800">
                                            <span
                                                class="text-purple-600">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span>
                                            -
                                            {{ $r->establecimiento }}
                                        </p>
                                        <p class="text-gray-600 text-sm mt-1">{{ $r->tarea }}</p>
                                    </div>
                                @empty
                                    <p class="text-gray-500 italic py-3">Sin tareas registradas</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- ELEC -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                            <div class="bg-blue-100/50 px-4 py-3 border-b border-blue-200/50">
                                <h3 class="text-lg font-bold text-blue-800">Electricidad</h3>
                                <p class="text-xs text-blue-800/80">Registros: <strong>{{ $cntELEC }}</strong>
                                </p>
                            </div>
                            <div class="p-4 {{ $scrollELEC ? 'max-h-96 overflow-y-auto pr-1' : '' }}">
                                @forelse(($registros['ELEC'] ?? []) as $r)
                                    <div class="border-b border-gray-100 last:border-0 py-3">
                                        <p class="font-medium text-gray-800">
                                            <span
                                                class="text-blue-600">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span>
                                            -
                                            {{ $r->establecimiento }}
                                        </p>
                                        <p class="text-gray-600 text-sm mt-1">{{ $r->tarea }}</p>
                                    </div>
                                @empty
                                    <p class="text-gray-500 italic py-3">Sin tareas registradas</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- DEZM -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                            <div class="bg-green-100/50 px-4 py-3 border-b border-green-200/50">
                                <h3 class="text-lg font-bold text-green-800">Desmalezamiento</h3>
                                <p class="text-xs text-green-800/80">Registros: <strong>{{ $cntDEZM }}</strong>
                                </p>
                            </div>
                            <div class="p-4 {{ $scrollDEZM ? 'max-h-96 overflow-y-auto pr-1' : '' }}">
                                @forelse(($registros['DEZM'] ?? []) as $r)
                                    <div class="border-b border-gray-100 last:border-0 py-3">
                                        <p class="font-medium text-gray-800">
                                            <span
                                                class="text-green-600">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span>
                                            -
                                            {{ $r->establecimiento }}
                                        </p>
                                        <p class="text-gray-600 text-sm mt-1">{{ $r->tarea }}</p>
                                    </div>
                                @empty
                                    <p class="text-gray-500 italic py-3">Sin tareas registradas</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endif

                @if ($tareaSel === 'pendientes')
                    @php
                        $scrollPend = isset($pendientes) && $pendientes->count() > 10;
                        $maxHeight = $scrollPend ? 'max-h-[30rem]' : '';
                    @endphp
                    <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden mb-12">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-orange-50 to-amber-50">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                <h3 class="text-lg font-semibold text-gray-800">Tareas pendientes</h3>
                                <p class="text-sm text-gray-600">
                                    Localidad: <strong>{{ request('localidad') ?: 'Todas' }}</strong> •
                                    Registros: <strong>{{ $pendientes->count() }}</strong>
                                </p>
                            </div>
                        </div>

                        <div class="w-full overflow-x-auto {{ $maxHeight }} overflow-y-auto">
                            <table class="min-w-full text-sm">
                                <caption class="sr-only">Listado de tareas pendientes</caption>
                                <thead class="sticky top-0 z-10">
                                    <tr class="bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
                                        @php
                                            $thBase =
                                                'px-4 py-3 text-left text-xs font-semibold tracking-wider uppercase text-gray-700 border-b-2 border-gray-200';
                                        @endphp
                                        <th class="{{ $thBase }} w-48">Localidad</th>
                                        <th class="{{ $thBase }} w-56">Establecimiento</th>
                                        <th class="{{ $thBase }} min-w-80">Pedido</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @forelse($pendientes as $p)
                                        <tr class="odd:bg-gray-50/40 hover:bg-orange-50/60 transition-colors group">
                                            {{-- Localidad --}}
                                            <td class="px-4 py-3 text-gray-900">
                                                <div
                                                    class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                                    <span class="block break-words font-medium">
                                                        {{ $p->localidad }}
                                                    </span>
                                                </div>
                                            </td>

                                            {{-- Establecimiento --}}
                                            <td class="px-4 py-3 text-gray-900">
                                                <div
                                                    class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                                    <span class="block break-words">
                                                        {{ $p->establecimiento }}
                                                    </span>
                                                </div>
                                            </td>

                                            {{-- Pedido --}}
                                            <td class="px-4 py-3 text-gray-600">
                                                <div
                                                    class="max-w-[24rem] group-hover:max-w-none transition-all duration-200">
                                                    <span class="block break-words">
                                                        {{ $p->pedido }}
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-6 py-8 text-center text-gray-500 italic">Sin
                                                pendientes
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if ($scrollPend)
                            <div class="px-4 py-2 bg-gray-50 border-t border-gray-200 text-xs text-gray-500 text-center">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                    </svg>
                                    Desplázate para ver más registros
                                </span>
                            </div>
                        @endif
                    </div>
                @endif

                @if ($tareaSel === 'comisiones')
                    @php
                        $scrollCom = isset($comisiones) && $comisiones->count() > 10;
                        $maxHeight = $scrollCom ? 'max-h-[30rem]' : '';
                    @endphp
                    <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden mb-12">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                <h3 class="text-lg font-semibold text-gray-800">Comisiones de servicio</h3>
                                <p class="text-sm text-gray-600">
                                    Año: <strong>{{ request('anio') ?: 'Todos' }}</strong> •
                                    Mes: <strong>
                                        @if (request('mes'))
                                            {{ ucfirst(\Carbon\Carbon::create()->month((int) request('mes'))->locale('es')->isoFormat('MMMM')) }}
                                        @else
                                            Todos
                                        @endif
                                    </strong> •
                                    Búsqueda: <strong>{{ request('q') ?: '—' }}</strong> •
                                    Registros: <strong>{{ $comisiones->count() }}</strong>
                                </p>
                            </div>
                        </div>

                        <div class="w-full overflow-x-auto {{ $maxHeight }} overflow-y-auto">
                            <table class="min-w-full text-sm">
                                <caption class="sr-only">Listado de comisiones de servicio</caption>
                                <thead class="sticky top-0 z-10">
                                    <tr class="bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
                                        @php
                                            $thBase =
                                                'px-4 py-3 text-left text-xs font-semibold tracking-wider uppercase text-gray-700 border-b-2 border-gray-200';
                                        @endphp
                                        <th class="{{ $thBase }} w-28">Fecha</th>
                                        <th class="{{ $thBase }} w-56">Establecimiento</th>
                                        <th class="{{ $thBase }} w-48">Localidad</th>
                                        <th class="{{ $thBase }} w-40">Departamento</th>
                                        <th class="{{ $thBase }} min-w-80">Detalle</th>
                                        <th class="{{ $thBase }} w-20 text-center">Personas</th>
                                        <th class="{{ $thBase }} w-20 text-center">Días</th>
                                        <th class="{{ $thBase }} w-24 text-center">Agentes</th>
                                        <th class="{{ $thBase }} w-32">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @forelse($comisiones as $c)
                                        <tr class="odd:bg-gray-50/40 hover:bg-blue-50/60 transition-colors group">
                                            {{-- Fecha --}}
                                            <td class="px-4 py-3 text-gray-900 whitespace-nowrap font-medium">
                                                {{ \Carbon\Carbon::parse($c->fecha)->format('d/m/Y') }}
                                            </td>

                                            {{-- Establecimiento --}}
                                            <td class="px-4 py-3 text-gray-900">
                                                <div
                                                    class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                                    <span class="block break-words">
                                                        {{ $c->establecimiento }}
                                                    </span>
                                                </div>
                                            </td>

                                            {{-- Localidad --}}
                                            <td class="px-4 py-3 text-gray-900">
                                                <div
                                                    class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                                    <span class="block break-words">
                                                        {{ $c->localidad }}
                                                    </span>
                                                </div>
                                            </td>

                                            {{-- Departamento --}}
                                            <td class="px-4 py-3 text-gray-900">
                                                <div
                                                    class="max-w-[10rem] group-hover:max-w-none transition-all duration-200">
                                                    <span class="block break-words">
                                                        {{ $c->departamento }}
                                                    </span>
                                                </div>
                                            </td>

                                            {{-- Detalle --}}
                                            <td class="px-4 py-3 text-gray-600">
                                                <div
                                                    class="max-w-[24rem] group-hover:max-w-none transition-all duration-200">
                                                    <span class="block break-words">
                                                        {{ $c->detalle_obra }}
                                                    </span>
                                                </div>
                                            </td>

                                            {{-- Personas --}}
                                            <td class="px-4 py-3 text-gray-800 text-center">
                                                {{ $c->personas }}
                                            </td>

                                            {{-- Días --}}
                                            <td class="px-4 py-3 text-gray-800 text-center">
                                                {{ $c->dias }}
                                            </td>

                                            {{-- Agentes --}}
                                            <td class="px-4 py-3 text-gray-800 text-center">
                                                {{ $c->agentes }}
                                            </td>

                                            {{-- Estado --}}
                                            <td class="px-4 py-3">
                                                @php
                                                    $estadoColor = match (strtolower($c->estado)) {
                                                        'completado',
                                                        'finalizado'
                                                            => 'bg-green-100 text-green-800 ring-green-200',
                                                        'en proceso',
                                                        'en progreso'
                                                            => 'bg-blue-100 text-blue-800 ring-blue-200',
                                                        'pendiente' => 'bg-yellow-100 text-yellow-800 ring-yellow-200',
                                                        'cancelado' => 'bg-red-100 text-red-800 ring-red-200',
                                                        default => 'bg-gray-100 text-gray-800 ring-gray-200',
                                                    };
                                                @endphp
                                                <span
                                                    class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $estadoColor }} ring-1 ring-inset whitespace-nowrap">
                                                    {{ $c->estado }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="px-6 py-8 text-center text-gray-500 italic">Sin
                                                comisiones
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if ($scrollCom)
                            <div class="px-4 py-2 bg-gray-50 border-t border-gray-200 text-xs text-gray-500 text-center">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                    </svg>
                                    Desplázate para ver más registros
                                </span>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- OPCIONAL: restaurar posición exacta de scroll tras enviar el formulario --}}
    <script>
        (function() {
            const form = document.getElementById('filtrosForm');
            if (!form) return;

            form.addEventListener('submit', function() {
                try {
                    sessionStorage.setItem('edudata_mant_scrollY', String(window.scrollY || window
                        .pageYOffset || 0));
                } catch (e) {}
            });

            window.addEventListener('load', function() {
                try {
                    const y = parseInt(sessionStorage.getItem('edudata_mant_scrollY') || '0', 10);
                    if (!isNaN(y) && y > 0) {
                        window.scrollTo({
                            top: y,
                            behavior: 'instant' in window ? 'instant' : 'auto'
                        });
                    }
                } catch (e) {}
            });
        })();
    </script>
@endsection
