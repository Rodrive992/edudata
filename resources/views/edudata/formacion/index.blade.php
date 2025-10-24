@extends('layouts.app')

@section('title', 'Edudata - Formación Profesional')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-10">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/titulo-formacion.png') }}" alt="Formación Profesional"
                        class="w-full h-auto object-cover rounded-xl">
                </div>

                <!-- Texto descriptivo mejorado -->
                <div class="mb-6">
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            Desde la <span class="font-semibold text-blue-700">Dirección Provincial de Desarrollo
                                Profesional y Evaluación Educativa</span>
                            se coordinan <span class="bg-yellow-100 px-1 rounded">programas de formación continua</span>
                            que fortalecen el <span class="font-medium text-green-600">desempeño docente</span>
                            y promueven la excelencia educativa a través de la actualización pedagógica permanente.
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
                                    <!-- Tarjeta 1: Búsqueda avanzada -->
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
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Búsqueda
                                            Avanzada</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Encuentra
                                            capacitaciones específicas filtrando por año, mes, localidad, modalidad y tipo
                                            de formación</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">🔍 Filtros múltiples
                                                disponibles</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 2: Información detallada -->
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
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Información
                                            Detallada</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Accede a
                                            datos completos de cada capacitación: oferente, denominación, ejes temáticos,
                                            fechas y ubicación</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-cyan-600 text-sm font-semibold">📊 Datos completos</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 3: Seguimiento -->
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
                                                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Seguimiento
                                            Continuo</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Monitorea el
                                            desarrollo de las capacitaciones a través del tiempo con información actualizada
                                            periódicamente</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">📈 Actualización
                                                constante</span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                Capacitación docente
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Desarrollo profesional
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                Actualización continua
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido de filtros y tabla -->
            <div class="p-6 pt-4">
                <!-- Tarjeta de filtros compacta en una sola línea -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-10">
                    <h2 class="text-base md:text-lg font-semibold text-gray-800 mb-3">Capacitaciones brindadas</h2>

                    @php
                        $anioActual = now()->year;
                        // Lista de años descendente (ajusta el año inicial si querés acotar)
                        $anios = array_reverse(range(2025, $anioActual));
                    @endphp

                    <form id="filtrosForm" method="GET" class="flex flex-wrap items-end gap-3">
                        <!-- Año -->
                        <div class="w-full sm:w-auto">
                            <label class="block text-xs font-medium text-gray-700 mb-1">Año</label>
                            <select name="anio"
                                class="w-40 rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition">
                                <option value="">Todos</option>
                                @foreach ($anios as $a)
                                    <option value="{{ $a }}" {{ request('anio') == $a ? 'selected' : '' }}>
                                        {{ $a }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Mes -->
                        <div class="w-full sm:w-auto">
                            <label class="block text-xs font-medium text-gray-700 mb-1">Mes</label>
                            <select name="mes"
                                class="w-48 rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition">
                                <option value="">Todos</option>
                                @foreach (range(1, 12) as $m)
                                    <option value="{{ $m }}" {{ request('mes') == $m ? 'selected' : '' }}>
                                        {{ ucfirst(\Carbon\Carbon::create()->month($m)->locale('es')->isoFormat('MMMM')) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Localidad -->
                        <div class="flex-1 min-w-[14rem]">
                            <label class="block text-xs font-medium text-gray-700 mb-1">Localidad</label>
                            <input type="text" name="localidad" value="{{ request('localidad') }}"
                                class="w-full rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition"
                                placeholder="Buscar por localidad">
                        </div>

                        <!-- Modalidad -->
                        <div class="w-full sm:w-auto">
                            <label class="block text-xs font-medium text-gray-700 mb-1">Modalidad</label>
                            <select name="modalidad"
                                class="w-48 rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition">
                                <option value="">Todas</option>
                                <option value="Virtual" {{ request('modalidad') == 'Virtual' ? 'selected' : '' }}>Virtual
                                </option>
                                <option value="Presencial" {{ request('modalidad') == 'Presencial' ? 'selected' : '' }}>
                                    Presencial
                                </option>
                            </select>
                        </div>

                        <!-- Botón Buscar -->
                        <div class="w-full sm:w-auto">
                            <button type="submit"
                                class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2.5 px-5 rounded-md shadow-sm transition focus:outline-none focus:ring-2 focus:ring-gray-500">
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Ancla para resultados -->
                <div id="resultados"></div>

                {{-- ===== TABLA MEJORADA ===== --}}
                @php
                    $scrollCaps = isset($capacitaciones) && $capacitaciones->count() > 15;
                @endphp

                <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">
                    <!-- Header resumen -->
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">
                                Capacitaciones registradas
                            </h3>
                            <p class="text-sm text-gray-600">
                                Año: <strong>{{ request('anio') ?: 'Todos' }}</strong> ·
                                Mes: <strong>
                                    @if (request('mes'))
                                        {{ ucfirst(\Carbon\Carbon::create()->month((int) request('mes'))->locale('es')->isoFormat('MMMM')) }}
                                    @else
                                        Todos
                                    @endif
                                </strong> ·
                                Localidad: <strong>{{ request('localidad') ?: 'Todas' }}</strong> ·
                                Modalidad: <strong>{{ request('modalidad') ?: 'Todas' }}</strong> ·
                                Registros: <strong>{{ $capacitaciones->total() ?? $capacitaciones->count() }}</strong>
                            </p>
                        </div>
                    </div>

                    <!-- Contenedor de tabla con scroll horizontal -->
                    <div class="w-full overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <caption class="sr-only">Listado de capacitaciones</caption>
                            <thead class="sticky top-0 z-10">
                                <tr class="bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
                                    @php
                                        $thBase =
                                            'px-4 py-3 text-left text-xs font-semibold tracking-wider uppercase text-gray-700 border-b-2 border-gray-200';
                                    @endphp
                                    <th class="{{ $thBase }} w-48">Oferente</th>
                                    <th class="{{ $thBase }} min-w-80">Denominación</th>
                                    <th class="{{ $thBase }} w-32">Tipo</th>
                                    <th class="{{ $thBase }} w-32">Modalidad</th>
                                    <th class="{{ $thBase }} w-40">Eje</th>
                                    <th class="{{ $thBase }} w-32">Nivel</th>
                                    <th class="{{ $thBase }} w-48">Localidad</th>
                                    <th class="{{ $thBase }} w-56">Dirección</th>
                                    <th class="{{ $thBase }} w-28">Inicio</th>
                                    <th class="{{ $thBase }} w-32">Finalización</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100">
                                @forelse($capacitaciones as $cap)
                                    <tr class="odd:bg-gray-50/40 hover:bg-blue-50/60 transition-colors group">
                                        {{-- Oferente --}}
                                        <td class="px-4 py-3 text-gray-900">
                                            <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                                <span class="block break-words font-medium">
                                                    {{ $cap->oferente }}
                                                </span>
                                            </div>
                                        </td>

                                        {{-- Denominación --}}
                                        <td class="px-4 py-3 text-gray-900">
                                            <div class="max-w-[20rem] group-hover:max-w-none transition-all duration-200">
                                                <span class="block break-words">
                                                    {{ $cap->denominacion_proyecto }}
                                                </span>
                                            </div>
                                        </td>

                                        {{-- Tipo --}}
                                        <td class="px-4 py-3 text-gray-800">
                                            <span
                                                class="inline-flex items-center rounded-md border border-gray-300 bg-white px-2 py-1 text-xs font-medium text-gray-700 whitespace-normal break-words">
                                                {{ $cap->tipo_proyecto }}
                                            </span>
                                        </td>

                                        {{-- Modalidad (badge con color) --}}
                                        <td class="px-4 py-3">
                                            @php
                                                $isVirtual = \Illuminate\Support\Str::contains(
                                                    $cap->modalidad,
                                                    'Virtual',
                                                    true,
                                                );
                                                $modClasses = $isVirtual
                                                    ? 'bg-blue-50 text-blue-700 ring-1 ring-inset ring-blue-200'
                                                    : 'bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-200';
                                            @endphp
                                            <span
                                                class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $modClasses }} whitespace-nowrap">
                                                {{ $cap->modalidad }}
                                            </span>
                                        </td>

                                        {{-- Eje (pill neutro) --}}
                                        <td class="px-4 py-3">
                                            <span
                                                class="inline-flex items-center rounded-full bg-gray-100 text-gray-700 px-2.5 py-1 text-xs font-medium ring-1 ring-inset ring-gray-200 break-words max-w-full">
                                                {{ $cap->eje }}
                                            </span>
                                        </td>

                                        {{-- Nivel (pill neutro) --}}
                                        <td class="px-4 py-3">
                                            <span
                                                class="inline-flex items-center rounded-full bg-slate-100 text-slate-700 px-2.5 py-1 text-xs font-medium ring-1 ring-inset ring-slate-200 whitespace-nowrap">
                                                {{ $cap->nivel }}
                                            </span>
                                        </td>

                                        {{-- Localidad --}}
                                        <td class="px-4 py-3 text-gray-800">
                                            <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                                <span class="block break-words">
                                                    {{ $cap->localidad }}
                                                </span>
                                            </div>
                                        </td>

                                        {{-- Dirección --}}
                                        <td class="px-4 py-3 text-gray-800">
                                            <div class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                                <span class="block break-words">
                                                    {{ $cap->direccion }}
                                                </span>
                                            </div>
                                        </td>

                                        {{-- Fechas --}}
                                        <td class="px-4 py-3 text-gray-900 whitespace-nowrap font-medium">
                                            {{ \Carbon\Carbon::parse($cap->fecha_inicio)->format('d/m/Y') }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-900 whitespace-nowrap font-medium">
                                            {{ \Carbon\Carbon::parse($cap->fecha_finalizacion)->format('d/m/Y') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="px-6 py-8 text-center text-gray-500 italic">
                                            No se encontraron capacitaciones con los filtros aplicados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="p-4 border-t border-gray-100">
                        {{ $capacitaciones->appends(request()->query())->links() }}
                    </div>
                </div>
                {{-- ===== FIN TABLA MEJORADA ===== --}}
            </div>
        </div>

    </div>

    {{-- Restaurar posición de scroll tras enviar el formulario --}}
    <script>
        (function() {
            const form = document.getElementById('filtrosForm');
            if (!form) return;

            form.addEventListener('submit', function() {
                try {
                    sessionStorage.setItem('edudata_forma_scrollY', String(window.scrollY || window
                        .pageYOffset || 0));
                } catch (e) {}
            });

            window.addEventListener('load', function() {
                try {
                    const y = parseInt(sessionStorage.getItem('edudata_forma_scrollY') || '0', 10);
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
