@extends('layouts.app')

@section('title', 'Edudata - Registro de Solicitudes de Información')

@section('content')
<div class="container mx-auto px-4 py-8" x-data="modalVista()">

    {{-- Mensajes de estado --}}
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

    @php
        // Fallback: si el controller no envía $solicitudes, lo resolvemos acá
        $solicitudes = $solicitudes ?? \App\Models\SolicitudInformacion::query()
            ->latest('id')
            ->paginate(15);
    @endphp

    <div class="bg-white rounded-xl shadow border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">Registro de Solicitudes</h1>
            <p class="text-sm text-gray-500 mt-1">Listado de solicitudes enviadas por los ciudadanos.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr class="text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nombre y Apellido</th>
                        <th class="px-6 py-3">DNI</th>
                        <th class="px-6 py-3">Asunto</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($solicitudes as $sol)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $sol->id }}</td>
                            <td class="px-6 py-3 text-sm text-gray-800 font-medium">
                                {{ $sol->nombre_solicitante }} {{ $sol->apellido_solicitante }}
                            </td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $sol->dni_solicitante }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">
                                <span class="line-clamp-1" title="{{ $sol->asunto_solicitud }}">
                                    {{ $sol->asunto_solicitud }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-sm">
                                @php
                                    $estado = strtolower($sol->estado_solicitud ?? 'pendiente');
                                    $badgeClasses = match($estado) {
                                        'pendiente' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                        'en proceso', 'en_proceso' => 'bg-blue-100 text-blue-800 border-blue-200',
                                        'respondida', 'finalizada' => 'bg-green-100 text-green-800 border-green-200',
                                        'rechazada' => 'bg-red-100 text-red-800 border-red-200',
                                        default => 'bg-gray-100 text-gray-800 border-gray-200',
                                    };
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 border text-xs font-medium rounded-md {{ $badgeClasses }}">
                                    {{ ucfirst($estado) }}
                                </span>
                            </td>
                            <td class="px-6 py-3">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Botón Ver (abre modal) -->
                                    <button
                                        type="button"
                                        class="inline-flex items-center gap-2 px-3 py-2 rounded-md border bg-white hover:bg-gray-50 text-gray-700 text-sm"
                                        @click="abrir({ id: {{ $sol->id }},
                                                        asunto: @js($sol->asunto_solicitud),
                                                        texto: @js($sol->solicitud_texto),
                                                        solicitante: @js($sol->nombre_solicitante . ' ' . $sol->apellido_solicitante) })"
                                        title="Ver detalle">
                                        <!-- Ícono ojo -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                        Ver
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-6 text-center text-sm text-gray-500" colspan="6">
                                No hay solicitudes registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($solicitudes instanceof \Illuminate\Contracts\Pagination\Paginator)
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $solicitudes->onEachSide(1)->links() }}
            </div>
        @endif
    </div>

    <!-- Modal -->
    <div
        class="fixed inset-0 z-50 flex items-center justify-center"
        x-show="abierto"
        x-cloak
        @keydown.escape.window="cerrar()"
        @click.self="cerrar()"
    >
        <!-- Fondo -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Contenido -->
        <div class="relative bg-white w-full max-w-2xl rounded-xl shadow-xl border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 flex items-start justify-between gap-4">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900" x-text="detalle.asunto"></h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Solicitante: <span class="font-medium" x-text="detalle.solicitante"></span> — ID #<span x-text="detalle.id"></span>
                    </p>
                </div>
                <button class="text-gray-500 hover:text-gray-700" @click="cerrar()" aria-label="Cerrar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 6 6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="px-6 py-5 max-h-[70vh] overflow-y-auto">
                <div class="prose prose-sm max-w-none">
                    <p class="whitespace-pre-line break-words text-gray-800" x-text="detalle.texto"></p>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
                <button class="inline-flex items-center px-4 py-2 rounded-md bg-gray-900 text-white hover:bg-gray-800"
                        @click="cerrar()">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

{{-- AlpineJS helpers para el modal --}}
<script>
function modalVista() {
    return {
        abierto: false,
        detalle: { id: null, asunto: '', texto: '', solicitante: '' },
        abrir(data) {
            this.detalle = data || { id: null, asunto: '', texto: '', solicitante: '' };
            this.abierto = true;
            // Evita scroll de fondo
            document.documentElement.classList.add('overflow-y-hidden');
        },
        cerrar() {
            this.abierto = false;
            // Restablece scroll
            document.documentElement.classList.remove('overflow-y-hidden');
        }
    }
}
</script>
@endsection
