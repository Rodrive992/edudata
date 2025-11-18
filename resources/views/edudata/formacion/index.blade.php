@extends('layouts.app')

@section('title', 'Capacitaciones')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-[color:var(--gray-200)] overflow-hidden mb-6">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <!-- Imagen centrada y responsiva -->
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-formacion.png') }}" alt="Formación Profesional"
                        class="w-full max-w-2xl h-auto object-contain rounded-xl">
                </div>

                <!-- Texto descriptivo mejorado -->
                <div class="mb-4 md:mb-6">
                    <div class="space-y-4">
                        <!-- Sección de características - MEJORADO -->
                        <div class="bg-gradient-to-br from-[#f0f4ff] to-[#f8f7ff] rounded-xl p-4 md:p-5 my-4 border border-[color:var(--pri-500)]/20" style="--tw-gradient-from: #f0f4ff; --tw-gradient-to: #f8f7ff;">
                            <!-- Descripción principal -->
                            <div class="text-center mb-4 md:mb-5">
                                <p class="text-[color:var(--ink)] leading-relaxed text-base md:text-lg">
                                    Desde la <span class="font-semibold text-[color:var(--pri-700)]">Dirección Provincial de Desarrollo
                                        Profesional y Evaluación Educativa</span>
                                    se coordinan programas de formación continua
                                    que fortalecen el desempeño docente
                                    y promueven la excelencia educativa a través de la actualización pedagógica permanente.
                                </p>
                            </div>

                            <!-- Características en grid mejorado -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--sec-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--sec-500)]"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">Búsqueda avanzada</p>
                                            <p class="text-xs text-gray-600 mt-1">Por año, mes, localidad y modalidad</p>
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
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">Información detallada</p>
                                            <p class="text-xs text-gray-600 mt-1">Datos completos de cada capacitación</p>
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
                                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">Seguimiento continuo</p>
                                            <p class="text-xs text-gray-600 mt-1">Actualización periódica</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--pri-500)] rounded-full mr-2"></span>Capacitación docente
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--sec-500)] rounded-full mr-2"></span>Desarrollo profesional
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--ter-500)] rounded-full mr-2"></span>Actualización continua
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido de filtros y tabla -->
            <div class="p-4 md:p-6 pt-4">
                <!-- Tarjeta de filtros compacta en una sola línea -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] p-4 md:p-6 mb-6">
                    <h2 class="text-base md:text-lg font-semibold text-[color:var(--ink)] mb-4">Filtrar capacitaciones</h2>

                    @php
                        $anioActual = now()->year;
                        $anios = array_reverse(range(2025, $anioActual));
                    @endphp

                    <form id="filtrosForm" method="GET" class="flex flex-wrap items-end gap-4">
                        <!-- Año -->
                        <div class="w-full sm:w-auto">
                            <label class="block text-xs font-medium text-[color:var(--ink)] mb-1">Año</label>
                            <select name="anio"
                                class="w-full sm:w-40 rounded-lg border border-[color:var(--gray-200)] py-2 px-3 focus:border-[color:var(--pri-500)] focus:ring-1 focus:ring-[color:var(--pri-500)] transition text-sm">
                                <option value="">Todos</option>
                                @foreach ($anios as $a)
                                    <option value="{{ $a }}" {{ request('anio') == $a ? 'selected' : '' }}>
                                        {{ $a }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Mes -->
                        <div class="w-full sm:w-auto">
                            <label class="block text-xs font-medium text-[color:var(--ink)] mb-1">Mes</label>
                            <select name="mes"
                                class="w-full sm:w-48 rounded-lg border border-[color:var(--gray-200)] py-2 px-3 focus:border-[color:var(--pri-500)] focus:ring-1 focus:ring-[color:var(--pri-500)] transition text-sm">
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
                            <label class="block text-xs font-medium text-[color:var(--ink)] mb-1">Localidad</label>
                            <input type="text" name="localidad" value="{{ request('localidad') }}"
                                class="w-full rounded-lg border border-[color:var(--gray-200)] py-2 px-3 focus:border-[color:var(--pri-500)] focus:ring-1 focus:ring-[color:var(--pri-500)] transition text-sm"
                                placeholder="Buscar por localidad">
                        </div>

                        <!-- Modalidad -->
                        <div class="w-full sm:w-auto">
                            <label class="block text-xs font-medium text-[color:var(--ink)] mb-1">Modalidad</label>
                            <select name="modalidad"
                                class="w-full sm:w-48 rounded-lg border border-[color:var(--gray-200)] py-2 px-3 focus:border-[color:var(--pri-500)] focus:ring-1 focus:ring-[color:var(--pri-500)] transition text-sm">
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
                                class="w-full sm:w-auto bg-[color:var(--pri-700)] hover:bg-[color:var(--pri-900)] text-white font-semibold py-2.5 px-5 rounded-lg shadow-sm transition focus:outline-none focus:ring-2 focus:ring-[color:var(--pri-500)] text-sm">
                                Buscar
                            </button>
                        </div>

                        @if (request()->hasAny(['anio', 'mes', 'localidad', 'modalidad']))
                            <div class="w-full sm:w-auto">
                                <a href="{{ route('edudata.capacitaciones') }}"
                                    class="w-full sm:w-auto bg-white hover:bg-[color:var(--gray-100)] text-[color:var(--ink)] font-semibold py-2.5 px-5 rounded-lg border border-[color:var(--gray-200)] shadow-sm transition focus:outline-none focus:ring-2 focus:ring-[color:var(--gray-300)] text-sm inline-flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Limpiar
                                </a>
                            </div>
                        @endif
                    </form>

                    <!-- Información de resultados -->
                    @if (($capacitaciones->total() ?? 0) > 0)
                        <div class="mt-4 text-sm text-gray-600 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-[color:var(--sec-500)]"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Mostrando {{ $capacitaciones->firstItem() }}–{{ $capacitaciones->lastItem() }} de
                                {{ $capacitaciones->total() }} resultados</span>
                        </div>
                    @endif
                </div>

                <!-- Ancla para resultados -->
                <div id="resultados"></div>

                {{-- ===== TABLA MEJORADA ===== --}}
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden">
                    <!-- Header resumen -->
                    <div class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)]">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                            <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                                Capacitaciones registradas
                            </h3>
                            <p class="text-xs md:text-sm text-gray-600">
                                @if (request()->hasAny(['anio', 'mes', 'localidad', 'modalidad']))
                                    <span class="hidden sm:inline">
                                        Filtros: 
                                        <strong>{{ request('anio') ?: 'Todos' }}</strong> ·
                                        <strong>
                                            @if (request('mes'))
                                                {{ ucfirst(\Carbon\Carbon::create()->month((int) request('mes'))->locale('es')->isoFormat('MMMM')) }}
                                            @else
                                                Todos
                                            @endif
                                        </strong> ·
                                        <strong>{{ request('localidad') ?: 'Todas' }}</strong> ·
                                        <strong>{{ request('modalidad') ?: 'Todas' }}</strong>
                                    </span>
                                @endif
                                <span class="font-semibold">{{ $capacitaciones->total() }} registros</span>
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
                                            'px-4 py-3 text-left text-xs font-semibold tracking-wider uppercase text-[color:var(--ink)] border-b-2 border-[color:var(--gray-200)]';
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

                            <tbody class="divide-y divide-[color:var(--gray-200)]">
                                @forelse($capacitaciones as $cap)
                                    <tr class="odd:bg-[color:var(--gray-100)]/40 hover:bg-[color:var(--pri-500)]/5 transition-colors group">
                                        {{-- Oferente --}}
                                        <td class="px-4 py-3 text-[color:var(--ink)]">
                                            <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                                <span class="block break-words font-medium">
                                                    {{ $cap->oferente }}
                                                </span>
                                            </div>
                                        </td>

                                        {{-- Denominación --}}
                                        <td class="px-4 py-3 text-[color:var(--ink)]">
                                            <div class="max-w-[20rem] group-hover:max-w-none transition-all duration-200">
                                                <span class="block break-words">
                                                    {{ $cap->denominacion_proyecto }}
                                                </span>
                                            </div>
                                        </td>

                                        {{-- Tipo --}}
                                        <td class="px-4 py-3 text-[color:var(--ink)]">
                                            <span
                                                class="inline-flex items-center rounded-md border border-[color:var(--gray-300)] bg-white px-2 py-1 text-xs font-medium text-[color:var(--ink)] whitespace-normal break-words">
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
                                                    ? 'bg-[color:var(--pri-500)]/10 text-[color:var(--pri-700)] ring-1 ring-inset ring-[color:var(--pri-500)]/20'
                                                    : 'bg-[color:var(--ter-500)]/10 text-[color:var(--ter-500)] ring-1 ring-inset ring-[color:var(--ter-500)]/20';
                                            @endphp
                                            <span
                                                class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $modClasses }} whitespace-nowrap">
                                                {{ $cap->modalidad }}
                                            </span>
                                        </td>

                                        {{-- Eje (pill neutro) --}}
                                        <td class="px-4 py-3">
                                            <span
                                                class="inline-flex items-center rounded-full bg-[color:var(--gray-100)] text-[color:var(--ink)] px-2.5 py-1 text-xs font-medium ring-1 ring-inset ring-[color:var(--gray-300)] break-words max-w-full">
                                                {{ $cap->eje }}
                                            </span>
                                        </td>

                                        {{-- Nivel (pill neutro) --}}
                                        <td class="px-4 py-3">
                                            <span
                                                class="inline-flex items-center rounded-full bg-[color:var(--gray-100)] text-[color:var(--ink)] px-2.5 py-1 text-xs font-medium ring-1 ring-inset ring-[color:var(--gray-300)] whitespace-nowrap">
                                                {{ $cap->nivel }}
                                            </span>
                                        </td>

                                        {{-- Localidad --}}
                                        <td class="px-4 py-3 text-[color:var(--ink)]">
                                            <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                                <span class="block break-words">
                                                    {{ $cap->localidad }}
                                                </span>
                                            </div>
                                        </td>

                                        {{-- Dirección --}}
                                        <td class="px-4 py-3 text-[color:var(--ink)]">
                                            <div class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                                <span class="block break-words">
                                                    {{ $cap->direccion }}
                                                </span>
                                            </div>
                                        </td>

                                        {{-- Fechas --}}
                                        <td class="px-4 py-3 text-[color:var(--ink)] whitespace-nowrap font-medium">
                                            {{ \Carbon\Carbon::parse($cap->fecha_inicio)->format('d/m/Y') }}
                                        </td>
                                        <td class="px-4 py-3 text-[color:var(--ink)] whitespace-nowrap font-medium">
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
                    <div class="px-4 py-3 border-t border-[color:var(--gray-200)] bg-[color:var(--gray-100)]">
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