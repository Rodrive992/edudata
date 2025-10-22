@extends('layouts.app')

@section('title', 'Edured – Cargas de Mantenimiento (Realizadas)')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="{{ route('edured.herramientas.mantenimiento.realizadas.create') }}" class="text-sm text-gray-600 hover:text-gray-800">&larr; Volver a cargar</a>
    </div>

    @if(session('ok'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3">{{ session('ok') }}</div>
    @endif
    @if(session('error'))
        <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3">{{ session('error') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow border border-gray-200">
        <div class="p-6 border-b border-gray-100">
            <h1 class="text-2xl font-bold text-gray-800">Cargas de “Tareas realizadas”</h1>
            <p class="text-gray-600 mt-1">Descargar archivo o eliminar la carga (archivo + filas).</p>
        </div>

        <div class="p-6 overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-600 border-b">
                        <th class="py-2 pr-4"># (cod_carga)</th>
                        <th class="py-2 pr-4">Archivo</th>
                        <th class="py-2 pr-4">Tamaño</th>
                        <th class="py-2 pr-4">Fecha</th>
                        <th class="py-2 pr-4">Filas asociadas</th>
                        <th class="py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($archivos as $a)
                        <tr>
                            <td class="py-2 pr-4 font-semibold">#{{ $a->id }}</td>
                            <td class="py-2 pr-4">
                                <div class="text-gray-800">{{ $a->nombre_original }}</div>
                                <div class="text-xs text-gray-500">{{ $a->ruta_publica }}</div>
                            </td>
                            <td class="py-2 pr-4">{{ number_format($a->size_bytes / 1024, 0) }} KB</td>
                            <td class="py-2 pr-4">{{ $a->created_at?->format('Y-m-d H:i') }}</td>
                            <td class="py-2 pr-4">
                                {{ \App\Models\MantenimientoRealizadas::where('cod_carga', $a->id)->count() }}
                            </td>
                            <td class="py-2">
                                <div class="flex gap-2">
                                    <a href="{{ route('edured.herramientas.mantenimiento.realizadas.archivos.descargar', $a->id) }}"
                                       class="px-3 py-1 rounded-md border text-gray-700 hover:bg-gray-50">Descargar</a>

                                    <form method="POST"
                                          action="{{ route('edured.herramientas.mantenimiento.realizadas.archivos.destroy', $a->id) }}"
                                          onsubmit="return confirm('¿Eliminar la carga #{{ $a->id }} y todas sus filas asociadas?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 rounded-md border border-red-300 text-red-600 hover:bg-red-50">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td class="py-6 text-gray-500" colspan="6">No hay cargas registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $archivos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection