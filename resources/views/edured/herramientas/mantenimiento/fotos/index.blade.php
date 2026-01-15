@extends('layouts.app')

@section('title', 'Fotos de Mantenimiento')

@section('content')
<div class="container mx-auto px-4 py-8" x-data="fotoAdmin()">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-gray-900">Fotos de Mantenimiento</h1>
            <p class="text-gray-600 mt-1">Estas fotos alimentan automáticamente el carrusel público.</p>
        </div>

        <button @click="openCreate()"
            class="rounded-xl px-4 py-2 text-sm font-extrabold border border-gray-200 hover:bg-gray-50 bg-white">
            + Cargar foto
        </button>
    </div>

    @if (session('ok'))
        <div class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800">
            {{ session('ok') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-800">
            <p class="font-bold mb-1">Revisá estos errores:</p>
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="border-b border-gray-200 px-4 md:px-6 py-4">
            <h2 class="text-[#162172] text-lg font-bold">Listado</h2>
        </div>

        <div class="p-4 md:p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                @foreach($fotos as $f)
                    <div class="rounded-2xl border border-gray-200 overflow-hidden bg-white">
                        <div class="h-44 overflow-hidden">
                            <img src="{{ asset($f->imagen) }}" alt="{{ $f->alt_text }}"
                                class="w-full h-full object-cover">
                        </div>

                        <div class="p-4">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="font-extrabold text-gray-900 leading-tight">{{ $f->titulo }}</p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        Orden: <b>{{ $f->orden }}</b>
                                        · Estado:
                                        @if($f->activo)
                                            <span class="text-green-700 font-bold">Activo</span>
                                        @else
                                            <span class="text-gray-500 font-bold">Oculto</span>
                                        @endif
                                    </p>
                                </div>

                                <div class="flex gap-2">
                                    <button
                                        @click="openEdit(@js([
                                            'id' => $f->id,
                                            'titulo' => $f->titulo,
                                            'descripcion' => $f->descripcion,
                                            'alt_text' => $f->alt_text,
                                            'orden' => $f->orden,
                                            'activo' => $f->activo ? 1 : 0,
                                            'imagen' => asset($f->imagen),
                                        ]))"
                                        class="rounded-xl px-3 py-1.5 text-xs font-black border border-gray-200 hover:bg-gray-50">
                                        Editar
                                    </button>

                                    <form method="POST" action="{{ route('edured.herramientas.mantenimiento.fotos.destroy', $f) }}"
                                          onsubmit="return confirm('¿Eliminar esta foto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-xl px-3 py-1.5 text-xs font-black border border-red-200 text-red-700 hover:bg-red-50">
                                            Borrar
                                        </button>
                                    </form>
                                </div>
                            </div>

                            @if($f->descripcion)
                                <p class="text-sm text-gray-700 mt-3 leading-relaxed">
                                    {{ $f->descripcion }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            @if($fotos->isEmpty())
                <div class="text-center py-12 text-gray-500">
                    No hay fotos cargadas todavía.
                </div>
            @endif
        </div>
    </div>

    <!-- MODAL -->
    <div x-show="modalOpen" x-cloak
        class="fixed inset-0 z-[9999] flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/40" @click="close()"></div>

        <div class="relative w-full max-w-2xl rounded-2xl bg-white shadow-xl border border-gray-200 overflow-hidden">
            <div class="px-4 md:px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="font-black text-gray-900" x-text="mode === 'create' ? 'Cargar foto' : 'Editar foto'"></h3>
                <button @click="close()" class="text-gray-500 hover:text-gray-800 font-black">✕</button>
            </div>

            <form :method="mode === 'create' ? 'POST' : 'POST'"
                  :action="mode === 'create' ? '{{ route('edured.herramientas.mantenimiento.fotos.store') }}' : updateUrl"
                  enctype="multipart/form-data"
                  class="p-4 md:p-6 space-y-4">
                @csrf
                <template x-if="mode === 'edit'">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-bold text-gray-700">Título</label>
                        <input name="titulo" x-model="form.titulo" required maxlength="180"
                               class="mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="text-sm font-bold text-gray-700">Orden</label>
                        <input name="orden" x-model="form.orden" type="number" min="0" max="9999"
                               class="mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label class="text-sm font-bold text-gray-700">Descripción</label>
                    <textarea name="descripcion" x-model="form.descripcion" rows="3"
                              class="mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-bold text-gray-700">Alt (accesibilidad)</label>
                        <input name="alt_text" x-model="form.alt_text" maxlength="255"
                               class="mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="flex items-center gap-2 mt-6">
                        <input id="activo" type="checkbox" name="activo" value="1" :checked="form.activo == 1"
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="activo" class="text-sm font-bold text-gray-700">Activo (visible en carrusel)</label>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                    <div>
                        <label class="text-sm font-bold text-gray-700" x-text="mode === 'create' ? 'Imagen *' : 'Reemplazar imagen (opcional)'"></label>
                        <input name="imagen" type="file" accept="image/png,image/jpeg,image/webp"
                               :required="mode === 'create'"
                               class="mt-1 w-full rounded-xl border border-gray-200 bg-white p-2">
                        <p class="text-xs text-gray-500 mt-1">Se guarda en <b>public/images/mantenimiento</b>.</p>
                    </div>

                    <template x-if="mode === 'edit'">
                        <div class="rounded-2xl border border-gray-200 overflow-hidden">
                            <img :src="form.imagen_preview" alt="" class="w-full h-40 object-cover">
                        </div>
                    </template>
                </div>

                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" @click="close()"
                        class="rounded-xl px-4 py-2 text-sm font-extrabold border border-gray-200 hover:bg-gray-50 bg-white">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="rounded-xl px-4 py-2 text-sm font-extrabold bg-[#162172] text-white hover:opacity-95">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function fotoAdmin() {
    return {
        modalOpen: false,
        mode: 'create',
        updateUrl: '',
        form: {
            titulo: '',
            descripcion: '',
            alt_text: '',
            orden: 0,
            activo: 1,
            imagen_preview: '',
        },

        openCreate() {
            this.mode = 'create';
            this.updateUrl = '';
            this.form = { titulo:'', descripcion:'', alt_text:'', orden:0, activo:1, imagen_preview:'' };
            this.modalOpen = true;
        },

        openEdit(payload) {
            this.mode = 'edit';
            this.updateUrl = `{{ url('/edured/herramientas/mantenimiento/fotos') }}/${payload.id}`;
            this.form = {
                titulo: payload.titulo || '',
                descripcion: payload.descripcion || '',
                alt_text: payload.alt_text || '',
                orden: payload.orden ?? 0,
                activo: payload.activo ?? 1,
                imagen_preview: payload.imagen || '',
            };
            this.modalOpen = true;
        },

        close() {
            this.modalOpen = false;
        }
    }
}
</script>
@endsection
