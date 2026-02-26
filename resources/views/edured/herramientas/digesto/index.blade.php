@extends('layouts.app')

@section('title', 'Herramientas - Cargar Digesto')

@section('content')
    <div class="container mx-auto px-4 py-8">

        {{-- Mensajes de estado mejorados --}}
        @if (session('ok'))
            <div class="mb-6 rounded-xl bg-gray-100 border border-gray-300 text-gray-800 px-4 py-3 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-gray-600 flex-shrink-0"
                     viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd" />
                </svg>
                <div>{{ session('ok') }}</div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 rounded-xl bg-gray-100 border border-gray-300 text-gray-800 px-4 py-3 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-gray-600 flex-shrink-0"
                     viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                          clip-rule="evenodd" />
                </svg>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        {{-- Formulario principal mejorado --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-gray-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Cargar Digesto</h1>
                        <p class="text-gray-600 mt-1">Subí archivos PDF de normativa para la sección de Normativa/Digesto.</p>
                    </div>
                </div>
            </div>

            <div class="p-6">
                @if ($errors->any())
                    <div class="mb-6 rounded-xl bg-gray-100 border border-gray-300 text-gray-800 px-4 py-3">
                        <div class="flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                      clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Por favor, corrige los siguientes errores:</span>
                        </div>
                        <ul class="list-disc pl-5 space-y-1 text-sm">
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('edured.herramientas.digesto.store') }}" method="POST" enctype="multipart/form-data"
                      class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">Título</label>
                            <input type="text" name="titulo" value="{{ old('titulo') }}"
                                   class="w-full rounded-xl border-gray-300 focus:border-gray-600 focus:ring-2 focus:ring-gray-200 px-4 py-3 text-gray-800 shadow-sm transition-all duration-200"
                                   placeholder="Ej: Régimen Docente Provincial - Decreto 123/2025">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">Descripción</label>
                            <input type="text" name="descripcion" value="{{ old('descripcion') }}"
                                   class="w-full rounded-xl border-gray-300 focus:border-gray-600 focus:ring-2 focus:ring-gray-200 px-4 py-3 text-gray-800 shadow-sm transition-all duration-200"
                                   placeholder="Breve descripción del documento">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">Archivo PDF</label>
                            <div class="relative">
                                <input type="file" name="archivo" accept="application/pdf"
                                       class="block w-full text-sm text-gray-700 file:mr-4 file:py-3 file:px-4
                                          file:rounded-xl file:border-0 file:text-sm file:font-semibold
                                          file:bg-gray-700 file:text-white hover:file:bg-gray-800
                                          file:transition-colors file:duration-200 border border-gray-300 rounded-xl">
                            </div>
                            <p class="text-xs text-gray-500 mt-2">Formato: PDF. Tamaño máx: 20MB.</p>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gray-700 text-white font-semibold hover:bg-gray-800
                                   focus:outline-none shadow-sm transition-colors duration-200 group">
                            Subir PDF
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Lista de documentos cargados --}}
        @isset($docs)
            <div class="mt-8 bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-lg bg-gray-200 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                      clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-gray-900">Documentos cargados</h2>
                    </div>
                </div>

                <div class="p-6">
                    @if ($docs->isEmpty())
                        <div class="text-center py-8 text-gray-500">
                            <p class="text-gray-600">Aún no hay documentos cargados.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto border border-gray-200 rounded-xl">
                            <div class="max-h-[450px] overflow-y-auto">
                                <table class="min-w-full divide-y divide-gray-200 text-sm">
                                    <thead class="bg-gray-50 sticky top-0 z-10">
                                        <tr>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700 bg-gray-50">Título</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700 bg-gray-50">Descripción</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700 bg-gray-50">Archivo</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700 bg-gray-50">Fecha</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-700 bg-gray-50">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 bg-white">
                                        @foreach ($docs as $d)
                                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                                <td class="px-4 py-3 font-medium text-gray-900">{{ $d->titulo }}</td>
                                                <td class="px-4 py-3 text-gray-700">{{ $d->descripcion ?? '-' }}</td>

                                                <td class="px-4 py-3">
                                                    <a href="{{ route('edudata.normativa.file', $d->id) }}" target="_blank"
                                                       class="inline-flex items-center gap-1 text-gray-700 hover:text-gray-900 hover:underline transition-colors">
                                                        {{ $d->nombre_archivo }}
                                                    </a>
                                                </td>

                                                <td class="px-4 py-3 text-gray-600">
                                                    {{ $d->fecha_subida?->format('d/m/Y H:i') ?? '-' }}
                                                </td>

                                                <td class="px-4 py-3">
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        {{-- ✅ NUEVO: Editar --}}
                                                        <button type="button"
                                                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg border border-gray-300 text-gray-700
                                                                       hover:bg-gray-100 hover:border-gray-400 transition-all duration-200 text-sm"
                                                                onclick="openEditDigesto({{ $d->id }})">
                                                            Editar
                                                        </button>

                                                        {{-- Eliminar --}}
                                                        <form action="{{ route('edured.herramientas.digesto.destroy', $d) }}"
                                                              method="POST"
                                                              onsubmit="return confirm('¿Eliminar definitivamente \"{{ $d->titulo }}\"?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg border border-gray-300 text-gray-700
                                                                           hover:bg-gray-100 hover:border-gray-400 transition-all duration-200 text-sm">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endisset

        {{-- ✅ MODAL EDICIÓN --}}
        <div id="modalEditDigesto" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black/40" onclick="closeEditDigesto()"></div>

            <div class="relative mx-auto mt-10 w-[95%] max-w-2xl bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b bg-gray-50 flex items-start justify-between gap-3">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Editar documento</h3>
                        <p class="text-sm text-gray-600 mt-1">Podés modificar título/descripcion y re-subir el PDF si el deploy borró el archivo.</p>
                    </div>
                    <button type="button" class="px-3 py-1.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100"
                            onclick="closeEditDigesto()">
                        Cerrar
                    </button>
                </div>

                <div class="p-6">
                    <form id="formEditDigesto" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Título</label>
                                <input id="edit_titulo" type="text" name="titulo"
                                       class="w-full rounded-xl border-gray-300 focus:border-gray-600 focus:ring-2 focus:ring-gray-200 px-4 py-3 text-gray-800 shadow-sm transition-all duration-200"
                                       required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                                <input id="edit_descripcion" type="text" name="descripcion"
                                       class="w-full rounded-xl border-gray-300 focus:border-gray-600 focus:ring-2 focus:ring-gray-200 px-4 py-3 text-gray-800 shadow-sm transition-all duration-200"
                                       required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Reemplazar PDF (opcional)</label>
                                <input id="edit_archivo" type="file" name="archivo" accept="application/pdf"
                                       class="block w-full text-sm text-gray-700 file:mr-4 file:py-3 file:px-4
                                          file:rounded-xl file:border-0 file:text-sm file:font-semibold
                                          file:bg-gray-700 file:text-white hover:file:bg-gray-800
                                          file:transition-colors file:duration-200 border border-gray-300 rounded-xl">
                                <p id="edit_actual" class="text-xs text-gray-600 mt-2"></p>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-2">
                            <button type="button"
                                    class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100"
                                    onclick="closeEditDigesto()">
                                Cancelar
                            </button>
                            <button type="submit"
                                    class="px-6 py-2.5 rounded-xl bg-gray-700 text-white font-semibold hover:bg-gray-800">
                                Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function openEditDigesto(id) {
                const modal = document.getElementById('modalEditDigesto');
                const form  = document.getElementById('formEditDigesto');

                // set action del form (PUT)
                form.action = `{{ url('/edured/herramientas/digesto') }}/${id}`;

                // limpiar archivo seleccionado
                const fileInput = document.getElementById('edit_archivo');
                if (fileInput) fileInput.value = '';

                // traer datos
                fetch(`{{ url('/edured/herramientas/digesto') }}/${id}/edit`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(r => r.json())
                .then(data => {
                    document.getElementById('edit_titulo').value = data.titulo ?? '';
                    document.getElementById('edit_descripcion').value = data.descripcion ?? '';
                    document.getElementById('edit_actual').textContent =
                        `Archivo actual: ${data.nombre_archivo ?? '-'}${data.fecha_subida ? ' | Última carga: ' + data.fecha_subida : ''}`;

                    modal.classList.remove('hidden');
                })
                .catch(() => {
                    alert('No se pudo cargar la información del documento.');
                });
            }

            function closeEditDigesto() {
                document.getElementById('modalEditDigesto').classList.add('hidden');
            }
        </script>
    </div>
@endsection