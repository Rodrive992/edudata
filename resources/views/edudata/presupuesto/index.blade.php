@extends('layouts.app')

@section('title', 'Edudata - Presupuesto')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <!-- Encabezado mejorado -->
    <div class="flex items-center mb-8">
        <div class="bg-blue-100 p-3 rounded-full mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Presupuesto y Estado de Ejecución</h1>
            <p class="text-gray-600">Consulta y analiza los datos presupuestarios</p>
        </div>
    </div>

    <!-- Tarjeta de Búsqueda mejorada -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8 border border-gray-100">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Filtros de búsqueda</h2>
            <form method="GET" action="{{ route('edudata.presupuesto') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                
                <div>
                    <label for="ano" class="block text-sm font-medium text-gray-700 mb-1">Año</label>
                    <select name="ano" id="ano" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md shadow-sm">
                        <option value="">Todos los años</option>
                        @foreach($anios as $anio)
                            <option value="{{ $anio }}" {{ request('ano') == $anio ? 'selected' : '' }}>{{ $anio }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="unidad_ejecutora" class="block text-sm font-medium text-gray-700 mb-1">Unidad Ejecutora</label>
                    <input type="text" name="unidad_ejecutora" id="unidad_ejecutora" value="{{ request('unidad_ejecutora') }}" placeholder="Ej: Ministerio de Educación" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div>
                    <label for="concepto" class="block text-sm font-medium text-gray-700 mb-1">Concepto</label>
                    <input type="text" name="concepto" id="concepto" value="{{ request('concepto') }}" placeholder="Ej: Materiales educativos" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="flex items-end">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tarjeta de Resultados mejorada -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
        <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">Resultados de la búsqueda</h2>
            <p class="text-sm text-gray-500 mt-1">{{ $registros->total() }} registros encontrados</p>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Año</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unidad Ejecutora</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Concepto</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Presupuesto</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Devengado</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pagado</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Pago</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($registros as $item)
                        <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->ano }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->unidad_ejecutora }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->concepto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">${{ number_format($item->presupuesto_vigente, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($item->devengado, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">${{ number_format($item->pagado, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->fecha_pago ? \Carbon\Carbon::parse($item->fecha_pago)->format('d/m/Y') : 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                No se encontraron registros con los criterios de búsqueda actuales.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación mejorada -->
        <div class="bg-white px-6 py-4 border-t border-gray-200">
            {{ $registros->links() }}
        </div>
    </div>
</div>
@endsection