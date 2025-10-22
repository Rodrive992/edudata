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
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Cargar CSV — Tareas realizadas</h1>
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

                <!-- Nombre del archivo seleccionado -->
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
                <button type="submit" class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-800 text-white hover:bg-gray-700 transition">
                    Subir tareas a Edudata
                </button>

                <a href="{{ route('edured.herramientas.mantenimiento.realizadas.archivos.index') }}"
                   class="text-sm text-gray-600 hover:text-gray-800">
                    Ver archivos cargados
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

