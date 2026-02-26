@extends('layouts.app')

@section('title', 'Herramientas - Cargar Mantenimiento (Realizadas)')

@section('content')
<div class="container mx-auto px-4 py-8">

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
    @if($errors->any())
        <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow border border-gray-200 p-6">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Mantenimiento — Tareas realizadas</h1>
                <p class="text-gray-600">
                    Podés cargar por <strong>CSV</strong> o agregar <strong>tareas individuales</strong> (una o varias).
                </p>
            </div>

            <div class="flex gap-2">
                <button type="button"
                        class="inline-flex items-center px-4 py-2 rounded-lg bg-[var(--pri-700)] text-white hover:bg-[var(--pri-900)] transition"
                        onclick="openManualModal()">
                    + Agregar tareas manualmente
                </button>

                <a href="{{ route('edured.herramientas.mantenimiento.realizadas.archivos.index') }}"
                   class="inline-flex items-center px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
                    Ver archivos cargados
                </a>
            </div>
        </div>

        <hr class="my-6">

        {{-- =========================
            FORM CSV
        ========================== --}}
        <h2 class="text-lg font-bold text-gray-800 mb-2">Carga por CSV</h2>
        <p class="text-gray-600 mb-6">
            Formato: <strong>FECHA</strong> (YYYY-MM-DD), <strong>ESTABLECIMIENTO</strong>, <strong>TAREA</strong>, <strong>TIPO</strong> (APH/ELEC/DEZM).<br>
            La primera fila de encabezados será ignorada automáticamente.
        </p>

        <form method="POST" action="{{ route('edured.herramientas.mantenimiento.realizadas.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div x-data="{ dragging:false, fileName:'' }"
                 @dragover.prevent="dragging = true"
                 @dragleave.prevent="dragging = false"
                 @drop.prevent="
                    dragging = false;
                    if ($event.dataTransfer.files.length) {
                        $refs.file.files = $event.dataTransfer.files;
                        fileName = $refs.file.files[0].name;
                    }
                 ">
                <label for="archivo_csv"
                       class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed rounded-xl cursor-pointer transition"
                       :class="dragging ? 'border-blue-500 bg-blue-50' : 'border-gray-300 bg-gray-50 hover:bg-white'">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-10 h-10 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6H16a4 4 0 010 8h-1" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-700"><span class="font-semibold">Arrastrá y soltá</span> el CSV aquí</p>
                        <p class="text-xs text-gray-500">o hacé clic para elegir un archivo (.csv / .txt)</p>
                    </div>

                    <input x-ref="file" id="archivo_csv" name="archivo_csv" type="file"
                           class="hidden" accept=".csv,.txt" required
                           @change="fileName = $event.target.files.length ? $event.target.files[0].name : ''">
                </label>

                <div class="mt-3 flex items-center gap-3" x-show="fileName" x-transition>
                    <p class="text-sm text-gray-700" aria-live="polite">
                        <strong>Archivo seleccionado:</strong> <span x-text="fileName"></span>
                    </p>
                    <button type="button"
                            class="px-2 py-1 text-xs rounded-md border text-gray-600 hover:bg-gray-50"
                            @click="$refs.file.value=''; fileName='';">
                        Quitar
                    </button>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-800 text-white hover:bg-gray-700 transition">
                    Subir CSV
                </button>
            </div>
        </form>
    </div>
</div>


{{-- =========================
    MODAL MANUAL (SIN ALPINE)
========================== --}}
<div id="manualModal" class="fixed inset-0 z-[9999] hidden">
    {{-- overlay --}}
    <div class="absolute inset-0 bg-black/50" onclick="closeManualModal()"></div>

    {{-- modal box --}}
    <div class="relative mx-auto mt-10 md:mt-16 w-[min(950px,95vw)] bg-white rounded-xl shadow-2xl overflow-hidden">
        <div class="px-5 py-4 bg-gray-900 text-white flex items-center justify-between">
            <div>
                <h3 class="font-bold text-lg">Agregar tareas manualmente</h3>
                <p class="text-white/80 text-sm">Podés cargar varias filas y enviarlas juntas.</p>
            </div>
            <button type="button" class="text-white/80 hover:text-white text-2xl leading-none"
                    onclick="closeManualModal()">×</button>
        </div>

        <form id="manualForm" method="POST" action="{{ route('edured.herramientas.mantenimiento.realizadas.storeManual') }}">
            @csrf

            <div class="p-5 space-y-4">
                <div class="flex items-center justify-between gap-3">
                    <div class="text-sm text-gray-600">
                        Total filas: <strong id="rowsCount">1</strong>
                    </div>
                    <div class="flex gap-2">
                        <button type="button"
                                class="px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-sm"
                                onclick="addRowManual()">
                            + Agregar fila
                        </button>
                        <button type="button"
                                class="px-3 py-2 rounded-lg bg-red-50 hover:bg-red-100 text-red-700 text-sm"
                                onclick="resetRowsManual()">
                            Limpiar
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto border rounded-lg">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left px-3 py-2">Fecha</th>
                                <th class="text-left px-3 py-2">Establecimiento</th>
                                <th class="text-left px-3 py-2">Tarea</th>
                                <th class="text-left px-3 py-2">Tipo</th>
                                <th class="text-center px-3 py-2 w-12">✕</th>
                            </tr>
                        </thead>
                        <tbody id="manualRowsBody"></tbody>
                    </table>
                </div>

                <div class="text-xs text-gray-500">
                    Se guardará como <strong>una única carga</strong> (archivo “Carga manual”) y todas las filas quedarán con el mismo <strong>cod_carga</strong>.
                </div>
            </div>

            <div class="px-5 py-4 bg-gray-50 border-t flex items-center justify-between">
                <button type="button"
                        class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-white"
                        onclick="closeManualModal()">
                    Cancelar
                </button>

                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-[var(--pri-700)] text-white hover:bg-[var(--pri-900)]">
                    Guardar tareas
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    let manualRowIndex = 0;

    function todayYmd() {
        const d = new Date();
        const yyyy = d.getFullYear();
        const mm = String(d.getMonth() + 1).padStart(2,'0');
        const dd = String(d.getDate()).padStart(2,'0');
        return `${yyyy}-${mm}-${dd}`;
    }

    function openManualModal() {
        const modal = document.getElementById('manualModal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        // Si está vacío, inicializamos 1 fila
        const body = document.getElementById('manualRowsBody');
        if (!body.children.length) addRowManual();

        // ESC para cerrar
        window.addEventListener('keydown', escCloseHandler);
    }

    function closeManualModal() {
        document.getElementById('manualModal').classList.add('hidden');
        document.body.style.overflow = '';

        window.removeEventListener('keydown', escCloseHandler);
    }

    function escCloseHandler(e) {
        if (e.key === 'Escape') closeManualModal();
    }

    function updateCount() {
        const body = document.getElementById('manualRowsBody');
        document.getElementById('rowsCount').innerText = body.children.length;
    }

    function addRowManual() {
        const body = document.getElementById('manualRowsBody');
        const i = manualRowIndex++;

        const tr = document.createElement('tr');
        tr.className = 'border-t';

        tr.innerHTML = `
            <td class="px-3 py-2">
                <input type="date" name="tareas[${i}][fecha]" value="${todayYmd()}"
                       class="w-full rounded-lg border border-gray-300 px-2 py-1" required>
            </td>
            <td class="px-3 py-2">
                <input type="text" name="tareas[${i}][establecimiento]" placeholder="Ej: Escuela N° ..."
                       class="w-full rounded-lg border border-gray-300 px-2 py-1" required>
            </td>
            <td class="px-3 py-2">
                <input type="text" name="tareas[${i}][tarea]" placeholder="Detalle de la tarea"
                       class="w-full rounded-lg border border-gray-300 px-2 py-1" required>
            </td>
            <td class="px-3 py-2">
                <select name="tareas[${i}][tipo_tarea]" class="w-full rounded-lg border border-gray-300 px-2 py-1" required>
                    <option value="APH">APH</option>
                    <option value="ELEC">ELEC</option>
                    <option value="DEZM">DEZM</option>
                </select>
            </td>
            <td class="px-3 py-2 text-center">
                <button type="button" class="text-red-600 hover:text-red-800" title="Quitar fila">✕</button>
            </td>
        `;

        tr.querySelector('button').addEventListener('click', () => {
            tr.remove();
            const body2 = document.getElementById('manualRowsBody');
            if (!body2.children.length) addRowManual();
            updateCount();
        });

        body.appendChild(tr);
        updateCount();
    }

    function resetRowsManual() {
        document.getElementById('manualRowsBody').innerHTML = '';
        addRowManual();
        updateCount();
    }

    // Seguridad: si por alguna razón se manda vacío, no debería pasar por required
    document.getElementById('manualForm')?.addEventListener('submit', () => {
        updateCount();
    });
</script>
@endsection 