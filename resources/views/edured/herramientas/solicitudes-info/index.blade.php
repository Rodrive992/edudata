@extends('layouts.app')

@section('title', 'EDURED - Gestión de Solicitudes de Información')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="{{ route('edured.index') }}" class="text-sm text-gray-600 hover:text-gray-800">&larr; Volver al panel</a>
    </div>

    @if(session('ok'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3">
            {{ session('ok') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">Solicitudes recibidas</h1>
            <p class="text-sm text-gray-500 mt-1">Ordenadas por N° (descendente)</p>
        </div>

        @php
            $solicitudes = $solicitudes ?? \App\Models\SolicitudInformacion::query()
                ->latest('id')
                ->paginate(15);
        @endphp

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr class="text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <th class="px-6 py-3">N°</th>
                        <th class="px-6 py-3">Solicitante</th>
                        <th class="px-6 py-3">DNI</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Teléfono</th>
                        <th class="px-6 py-3">Fecha</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($solicitudes as $s)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 text-sm text-gray-700">#{{ $s->id }}</td>
                            <td class="px-6 py-3 text-sm text-gray-800 font-medium">
                                {{ $s->nombre_solicitante }} {{ $s->apellido_solicitante }}
                            </td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $s->dni_solicitante }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $s->email_solicitante }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $s->telefono_solicitante ?? '—' }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ optional($s->created_at)->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-3 text-sm">
                                @php
                                    $estado = strtolower($s->estado_solicitud ?? 'pendiente');
                                    $badge = match($estado) {
                                        'pendiente' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                        'en_proceso','en proceso' => 'bg-blue-100 text-blue-800 border-blue-200',
                                        'respondida' => 'bg-green-100 text-green-800 border-green-200',
                                        'rechazada' => 'bg-red-100 text-red-800 border-red-200',
                                        default => 'bg-gray-100 text-gray-800 border-gray-200',
                                    };
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 border text-xs font-medium rounded-md {{ $badge }}">
                                    {{ ucfirst($estado) }}
                                </span>
                            </td>
                            <td class="px-6 py-3">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('edured.herramientas.solicitudes-info.paso1', $s) }}"
                                       class="inline-flex items-center px-3 py-2 rounded-md border bg-white hover:bg-gray-50 text-gray-700 text-sm">
                                        Ver / Gestionar
                                    </a>

                                    @if(($s->estado_solicitud ?? 'pendiente') === 'pendiente')
                                        <a href="{{ route('edured.herramientas.solicitudes-info.paso1', $s) }}"
                                           class="inline-flex items-center px-3 py-2 rounded-md bg-gray-900 text-white hover:bg-gray-800 text-sm">
                                            Responder
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-6 text-center text-sm text-gray-500">
                                No hay solicitudes registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $solicitudes->onEachSide(1)->links() }}
        </div>
    </div>
</div>
@endsection
