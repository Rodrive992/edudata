@extends('layouts.app')

@section('title', 'Capacitaciones brindadas en 2025')

@section('content')
    <style>
        .c25-stat {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(226, 232, 240, .95);
            box-shadow: 0 12px 26px rgba(15, 23, 42, .06);
        }

        .c25-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
        }

        .c25-chip {
            background: #eff6ff;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
        }

        .c25-soft {
            background: linear-gradient(135deg, #eef4ff 0%, #f8fbff 45%, #eef8ff 100%);
            border: 1px solid rgba(148, 163, 184, .25);
        }

        .c25-table-th {
            @apply px-4 py-3 text-left text-xs font-bold uppercase tracking-wider;
        }
    </style>

    <div class="container mx-auto px-4 py-6">

        {{-- Header --}}
        <div class="mb-8">
            <a href="{{ route('edudata.formacion') }}"
                class="inline-flex items-center text-sm font-semibold text-blue-700 hover:text-blue-900 mb-4">
                ← Volver a Formación
            </a>

            <div class="text-center">
                <span class="inline-block px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-sm font-bold mb-4">
                    Histórico 2025
                </span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3">
                    Capacitaciones brindadas en 2025
                </h1>
                <p class="text-slate-600 max-w-3xl mx-auto">
                    Visualización consolidada de las propuestas desarrolladas durante el año 2025,
                    con estadísticas generales, filtros y detalle completo de cada capacitación.
                </p>
            </div>
        </div>

        {{-- Métricas --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-4 mb-8">
            <div class="c25-stat rounded-2xl p-5">
                <p class="text-sm text-slate-500 mb-1">Total de capacitaciones</p>
                <p class="text-3xl font-extrabold text-slate-900">{{ $totalCapacitaciones }}</p>
            </div>

            <div class="c25-stat rounded-2xl p-5">
                <p class="text-sm text-slate-500 mb-1">Oferentes</p>
                <p class="text-3xl font-extrabold text-slate-900">{{ $totalOferentes }}</p>
            </div>

            <div class="c25-stat rounded-2xl p-5">
                <p class="text-sm text-slate-500 mb-1">Localidades</p>
                <p class="text-3xl font-extrabold text-slate-900">{{ $totalLocalidades }}</p>
            </div>

            <div class="c25-stat rounded-2xl p-5">
                <p class="text-sm text-slate-500 mb-1">Virtuales</p>
                <p class="text-3xl font-extrabold text-slate-900">{{ $totalVirtuales }}</p>
            </div>

            <div class="c25-stat rounded-2xl p-5">
                <p class="text-sm text-slate-500 mb-1">Presenciales</p>
                <p class="text-3xl font-extrabold text-slate-900">{{ $totalPresenciales }}</p>
            </div>
        </div>

        {{-- Filtros --}}
        <div class="c25-card rounded-2xl p-6 mb-8">
            <h2 class="text-xl font-bold text-slate-900 mb-4">Filtrar capacitaciones</h2>

            <form id="filtrosForm" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Mes</label>
                    <select name="mes"
                        class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Todos</option>
                        @foreach (range(1, 12) as $m)
                            <option value="{{ $m }}" {{ request('mes') == $m ? 'selected' : '' }}>
                                {{ ucfirst(\Carbon\Carbon::create()->month($m)->locale('es')->isoFormat('MMMM')) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Localidad</label>
                    <input type="text"
                        name="localidad"
                        value="{{ request('localidad') }}"
                        class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Buscar localidad">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Modalidad</label>
                    <select name="modalidad"
                        class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Todas</option>
                        <option value="Virtual" {{ request('modalidad') == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                        <option value="Presencial" {{ request('modalidad') == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                    </select>
                </div>

                <div class="flex items-end gap-3">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-3 rounded-xl transition">
                        Filtrar
                    </button>
                </div>
            </form>

            @if (request()->hasAny(['mes', 'localidad', 'modalidad']))
                <div class="mt-4">
                    <a href="{{ route('edudata.formacion.2025') }}"
                        class="inline-flex items-center justify-center bg-white hover:bg-slate-50 text-slate-800 border border-slate-300 font-semibold py-2.5 px-5 rounded-lg shadow-sm transition text-sm">
                        Limpiar filtros
                    </a>
                </div>
            @endif

            @if (($capacitaciones->total() ?? 0) > 0)
                <div class="mt-4 text-sm text-slate-600 flex items-center">
                    <span>
                        Mostrando {{ $capacitaciones->firstItem() }}–{{ $capacitaciones->lastItem() }} de
                        {{ $capacitaciones->total() }} resultados
                    </span>
                </div>
            @endif
        </div>

        {{-- Distribución por mes --}}
        <div class="c25-card rounded-2xl p-6 mb-8">
            <h2 class="text-xl font-bold text-slate-900 mb-4">Distribución por mes</h2>
            <div class="flex flex-wrap gap-3">
                @forelse ($porMes as $mesNombre => $cantidad)
                    <div class="c25-chip px-4 py-2 rounded-full text-sm font-bold">
                        {{ ucfirst($mesNombre) }}: {{ $cantidad }}
                    </div>
                @empty
                    <p class="text-slate-500">No hay datos para mostrar.</p>
                @endforelse
            </div>
        </div>

        {{-- Tarjetas --}}
        <div class="mb-10">
            <h2 class="text-2xl font-extrabold text-slate-900 text-center mb-6">Capacitaciones destacadas</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                @forelse ($capacitaciones as $cap)
                    <div class="c25-card rounded-2xl p-5 hover:shadow-lg transition">
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            @php
                                $isVirtual = \Illuminate\Support\Str::contains($cap->modalidad, 'Virtual', true);
                                $modClasses = $isVirtual
                                    ? 'bg-blue-50 text-blue-700 border border-blue-100'
                                    : 'bg-emerald-50 text-emerald-700 border border-emerald-100';
                            @endphp

                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $modClasses }}">
                                {{ $cap->modalidad ?? 'Sin modalidad' }}
                            </span>

                            <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold">
                                {{ \Carbon\Carbon::parse($cap->fecha_inicio)->format('d/m/Y') }}
                            </span>
                        </div>

                        <h3 class="text-lg md:text-xl font-extrabold text-slate-900 mb-2">
                            {{ $cap->denominacion_proyecto }}
                        </h3>

                        <div class="space-y-2 text-sm text-slate-600">
                            <p><span class="font-semibold text-slate-800">Oferente:</span> {{ $cap->oferente }}</p>
                            <p><span class="font-semibold text-slate-800">Tipo:</span> {{ $cap->tipo_proyecto }}</p>
                            <p><span class="font-semibold text-slate-800">Eje:</span> {{ $cap->eje }}</p>
                            <p><span class="font-semibold text-slate-800">Nivel:</span> {{ $cap->nivel }}</p>
                            <p><span class="font-semibold text-slate-800">Localidad:</span> {{ $cap->localidad }}</p>
                            <p><span class="font-semibold text-slate-800">Dirección:</span> {{ $cap->direccion }}</p>
                            <p>
                                <span class="font-semibold text-slate-800">Período:</span>
                                {{ \Carbon\Carbon::parse($cap->fecha_inicio)->format('d/m/Y') }}
                                al
                                {{ \Carbon\Carbon::parse($cap->fecha_finalizacion)->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="c25-card rounded-2xl p-10 text-center text-slate-500">
                            No se encontraron capacitaciones con los filtros aplicados.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Tabla completa --}}
        <div class="c25-card rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 c25-soft">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                    <h2 class="text-xl font-bold text-slate-900">Detalle completo</h2>
                    <p class="text-xs md:text-sm text-slate-600">
                        <span class="font-semibold">{{ $capacitaciones->total() }} registros</span>
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto">
                @php
                    $thBase = 'px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-700';
                @endphp

                <table class="min-w-full text-sm text-slate-800">
                    <thead class="bg-slate-100">
                        <tr>
                            <th class="{{ $thBase }} w-48">Oferente</th>
                            <th class="{{ $thBase }} w-[28rem]">Denominación</th>
                            <th class="{{ $thBase }} w-44">Tipo</th>
                            <th class="{{ $thBase }} w-32">Modalidad</th>
                            <th class="{{ $thBase }} w-44">Eje</th>
                            <th class="{{ $thBase }} w-36">Nivel</th>
                            <th class="{{ $thBase }} w-40">Localidad</th>
                            <th class="{{ $thBase }} w-56">Dirección</th>
                            <th class="{{ $thBase }} w-28">Inicio</th>
                            <th class="{{ $thBase }} w-32">Finalización</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        @forelse ($capacitaciones as $cap)
                            <tr class="odd:bg-slate-50/70 hover:bg-blue-50/50 transition-colors group">
                                <td class="px-4 py-3 text-slate-900">
                                    <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                        <span class="block break-words font-medium">
                                            {{ $cap->oferente }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-slate-900">
                                    <div class="max-w-[20rem] group-hover:max-w-none transition-all duration-200">
                                        <span class="block break-words">
                                            {{ $cap->denominacion_proyecto }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-slate-900">
                                    <span class="inline-flex items-center rounded-md border border-slate-300 bg-white px-2 py-1 text-xs font-medium text-slate-800 whitespace-normal break-words">
                                        {{ $cap->tipo_proyecto }}
                                    </span>
                                </td>

                                <td class="px-4 py-3">
                                    @php
                                        $isVirtual = \Illuminate\Support\Str::contains($cap->modalidad, 'Virtual', true);
                                        $modClasses = $isVirtual
                                            ? 'bg-blue-50 text-blue-700 ring-1 ring-inset ring-blue-200'
                                            : 'bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-200';
                                    @endphp
                                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $modClasses }} whitespace-nowrap">
                                        {{ $cap->modalidad }}
                                    </span>
                                </td>

                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center rounded-full bg-slate-100 text-slate-800 px-2.5 py-1 text-xs font-medium ring-1 ring-inset ring-slate-300 break-words max-w-full">
                                        {{ $cap->eje }}
                                    </span>
                                </td>

                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center rounded-full bg-slate-100 text-slate-800 px-2.5 py-1 text-xs font-medium ring-1 ring-inset ring-slate-300 whitespace-nowrap">
                                        {{ $cap->nivel }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-slate-900">
                                    <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                        <span class="block break-words">
                                            {{ $cap->localidad }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-slate-900">
                                    <div class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                        <span class="block break-words">
                                            {{ $cap->direccion }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-slate-900 whitespace-nowrap font-medium">
                                    {{ \Carbon\Carbon::parse($cap->fecha_inicio)->format('d/m/Y') }}
                                </td>

                                <td class="px-4 py-3 text-slate-900 whitespace-nowrap font-medium">
                                    {{ \Carbon\Carbon::parse($cap->fecha_finalizacion)->format('d/m/Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-slate-500 py-8">
                                    No se encontraron datos.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-slate-200">
                {{ $capacitaciones->links() }}
            </div>
        </div>
    </div>
@endsection