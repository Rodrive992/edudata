@extends('layouts.app')

@section('title', 'Generar Solicitud - Cobertura de Cargos')

@section('content')
<div class="container mx-auto px-4 py-10" x-data="{
    motivo: '',
    otroMotivo: '',
    observaciones: '',
    maxObs: 500,
    get motivoVal() { return this.motivo === 'otro' ? this.otroMotivo.trim() : this.motivo.trim() },
    get canSubmit() { return this.motivoVal.length > 0 }
}">
  <!-- Header centrado -->
  <div class="text-center mb-10">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-medium mb-3">
      
    </div>
    <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900">Generar Solicitud</h1>
    <p class="mt-2 text-gray-600">Completá los datos y confirmá el envío.</p>
  </div>

  <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white flex items-center justify-between">
      <div class="flex items-center gap-3">
        <div class="h-10 w-10 rounded-xl bg-gray-200/70 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
            <path d="M4 3a2 2 0 00-2 2v8a2 2 0 002 2h5l3 3 3-3h1a2 2 0 002-2V9a1 1 0 10-2 0v4H4V5h12v1a1 1 0 002 0V5a2 2 0 00-2-2H4z"/>
          </svg>
        </div>
        <div>
          <h2 class="text-lg font-bold text-gray-900">Solicitud de Cobertura</h2>
          <p class="text-sm text-gray-600">Vinculada al cargo seleccionado</p>
        </div>
      </div>
      <a href="{{ route('edured.herramientas.solicitudcargos.index') }}"
         class="text-sm text-gray-600 hover:text-gray-900 underline underline-offset-2">Volver</a>
    </div>

    <div class="p-6 space-y-8">
      <!-- Resumen del cargo -->
      <div class="rounded-xl border border-gray-200 p-5 bg-gray-50">
        <div class="flex items-center gap-2 mb-4">
          <span class="text-[11px] uppercase tracking-wider text-gray-500">ID cargo</span>
          <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-gray-200 text-gray-800">
            #{{ $cargo->id }}
          </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 text-sm">
          <div>
            <p class="text-xs text-gray-500">Docente</p>
            <p class="font-semibold text-gray-900">{{ $cargo->nombre_apellido }}</p>
          </div>
          <div>
            <p class="text-xs text-gray-500">Cargo</p>
            <p class="font-semibold text-gray-900">{{ $cargo->cargo }}</p>
          </div>
          <div>
            <p class="text-xs text-gray-500">CUE</p>
            <p class="font-semibold text-gray-900">{{ $cargo->cue }}</p>
          </div>
          <div>
            <p class="text-xs text-gray-500">Establecimiento</p>
            <p class="font-semibold text-gray-900">{{ $cargo->establecimiento }}</p>
          </div>
        </div>
      </div>

      <!-- Formulario -->
      {{-- TODO: cambiá "#" por tu ruta store cuando la tengas, ej:
           route('edured.herramientas.solicitudcargos.store') --}}
      <form method="POST" action="#" class="space-y-6">
        @csrf

        <!-- Hidden útiles -->
        <input type="hidden" name="cargo_id" value="{{ $cargo->id }}">
        <input type="hidden" name="cue" value="{{ $cargo->cue }}">
        <input type="hidden" name="establecimiento" value="{{ $cargo->establecimiento }}">

        <!-- Motivo -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Motivo de la solicitud</label>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <select name="motivo"
                    x-model="motivo"
                    class="col-span-2 w-full rounded-xl border-gray-300 focus:border-gray-700 focus:ring-2 focus:ring-gray-200 px-4 py-3">
              <option value="" disabled selected>Seleccioná un motivo</option>
              <option value="licencia">Licencia del titular</option>
              <option value="vacante">Cargo vacante</option>
              <option value="ampliacion_hs">Ampliación de horas</option>
              <option value="reasignacion">Reasignación</option>
              <option value="otro">Otro (especificar)</option>
            </select>

            <input type="text"
                   x-show="motivo === 'otro'"
                   x-model="otroMotivo"
                   name="motivo_otro"
                   placeholder="Especificá el motivo"
                   class="w-full rounded-xl border-gray-300 focus:border-gray-700 focus:ring-2 focus:ring-gray-200 px-4 py-3"
                   x-cloak>
          </div>
          <p class="mt-1 text-xs text-gray-500">Si elegís “Otro”, detallalo en el campo a la derecha.</p>
        </div>

        <!-- Observaciones -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Observaciones</label>
          <textarea name="observaciones" rows="4"
                    x-model="observaciones"
                    maxlength="500"
                    class="w-full rounded-xl border-gray-300 focus:border-gray-700 focus:ring-2 focus:ring-gray-200 px-4 py-3"></textarea>
          <div class="mt-1 text-xs text-gray-500 flex justify-between">
            <span>Información adicional para la Dirección de Nivel.</span>
            <span x-text="`${observaciones.length}/${maxObs}`"></span>
          </div>
        </div>

        <!-- CTA -->
        <div class="pt-2">
          <button type="submit"
                  :disabled="!canSubmit"
                  :class="canSubmit ? 'bg-gray-800 hover:bg-gray-900 cursor-pointer' : 'bg-gray-300 cursor-not-allowed'"
                  class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-white font-semibold transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M4 3a2 2 0 00-2 2v3a1 1 0 102 0V5h12v10H4v-3a1 1 0 10-2 0v3a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4z"/>
              <path d="M8.293 9.293a1 1 0 011.414 0L11 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3.002 3a1 1 0 01-1.414 0l-3.002-3a1 1 0 010-1.414z"/>
            </svg>
            Enviar solicitud
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
