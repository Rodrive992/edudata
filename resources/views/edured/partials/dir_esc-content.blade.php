<div class="space-y-8">

  <!-- Header centrado mejorado -->
  <div class="text-center">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-medium mb-3">
      
    </div>
    <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900">Panel de Solicitudes</h1>
    <p class="text-gray-600 mt-2">Seleccione un tipo de solicitud.</p>
  </div>

  <!-- Tarjeta usuario -->
  <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
    <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
      <div class="flex items-center gap-3">
        <div class="h-10 w-10 rounded-xl bg-gray-200/70 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.464 14.243A7 7 0 0117 14.2V15a2 2 0 01-2 2H5a2 2 0 01-2-2v-.757a1 1 0 01.464-.843z"/>
          </svg>
        </div>
        <div>
          <h2 class="text-lg font-bold text-gray-900">Usuario</h2>
          <p class="text-sm text-gray-600">Datos del establecimiento vinculado</p>
        </div>
      </div>
    </div>
    <div class="p-6">
      @php($u = Auth::user())
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-sm">
        <div class="space-y-1">
          <p class="text-gray-500">Usuario</p>
          <p class="font-semibold text-gray-900 break-words">{{ $u->name }}</p>
        </div>
        <div class="space-y-1">
          <p class="text-gray-500">CUE</p>
          <div class="inline-flex items-center gap-2">
            <span class="font-semibold text-gray-900">{{ $u->cue ?? '-' }}</span>
            @if($u->cue)
              <span class="px-2 py-0.5 rounded-full text-[11px] font-medium bg-gray-100 text-gray-700">verificado</span>
            @endif
          </div>
        </div>
        <div class="space-y-1">
          <p class="text-gray-500">Establecimiento</p>
          <p class="font-semibold text-gray-900 break-words">{{ $u->dependencia ?? '-' }}</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Tarjeta solicitudes -->
  <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
    <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
      <h2 class="text-lg font-bold text-gray-900">Solicitudes disponibles</h2>
    </div>

    <div class="p-6">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        <!-- Solicitud de cobertura de cargos -->
        <a href="{{ route('edured.herramientas.solicitudcargos.index') }}"
           class="group relative overflow-hidden rounded-xl border border-gray-200 bg-gray-50 p-5 hover:bg-white hover:shadow-md hover:border-gray-300 transition focus:outline-none focus:ring-2 focus:ring-gray-300">
          <div class="flex items-start justify-between">
            <div class="space-y-1">
              <p class="font-semibold text-gray-900">Solicitud cobertura de cargos</p>
              <p class="text-sm text-gray-600">Generar solicitud vinculada a tus cargos</p>
            </div>
            <div class="shrink-0 h-9 w-9 rounded-lg bg-gray-200/70 flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                <path d="M4 4a2 2 0 012-2h6l4 4v10a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/><path d="M9 8h2v5H9zM9 6h2v1H9z"/>
              </svg>
            </div>
          </div>
          <span class="absolute right-3 bottom-3 text-gray-400 group-hover:text-gray-600 transition">➜</span>
        </a>

        <!-- Solicitud de Mantenimiento Edilicio (placeholder) -->
        <a href="#"
           class="group relative overflow-hidden rounded-xl border border-gray-200 bg-gray-50 p-5 hover:bg-white hover:shadow-md hover:border-gray-300 transition focus:outline-none focus:ring-2 focus:ring-gray-300">
          <div class="flex items-start justify-between">
            <div class="space-y-1">
              <p class="font-semibold text-gray-900">Solicitud de Mantenimiento Edilicio</p>
              <p class="text-sm text-gray-600">Próximamente</p>
            </div>
            <div class="shrink-0 h-9 w-9 rounded-lg bg-gray-200/70 flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2 11l6-6 3 3 6-6v8h-4l-3 3-3-3-5 5V11z"/>
              </svg>
            </div>
          </div>
          <span class="absolute right-3 bottom-3 text-gray-400 group-hover:text-gray-600 transition">➜</span>
        </a>

      </div>
    </div>
  </div>

</div>
