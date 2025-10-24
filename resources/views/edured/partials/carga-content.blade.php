<div class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Encabezado -->
    <div class="text-center mb-8">
        <span class="inline-flex items-center gap-2 text-xs font-semibold tracking-widest uppercase text-gray-600 bg-gray-100 px-3 py-1 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm1 15h-2v-2h2v2Zm0-4h-2V7h2v6Z"/></svg>
            Panel de gestión
        </span>
        <h1 class="mt-3 text-3xl md:text-4xl font-bold text-gray-900 tracking-tight">
            Generación y Gestión de Solicitudes
        </h1>
        <p class="mt-3 text-gray-600 text-base md:text-lg">
            Elija el tipo de solicitud y complete el formulario correspondiente
        </p>
    </div>

    <!-- Contenedor / Card -->
    <div class="bg-white/90 backdrop-blur rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
        <!-- Barra superior -->
        <div class="px-6 md:px-8 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                <!-- Selector tipo de solicitud -->
                <div class="w-full md:w-auto">
                    <label for="tipo-solicitud" class="block text-sm font-semibold text-gray-700 mb-1">
                        Tipo de Solicitud
                    </label>
                    <div class="relative">
                        <select id="tipo-solicitud"
                                class="peer block w-full md:w-72 appearance-none pl-4 pr-10 py-2.5 text-sm border-2 border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-800/30 focus:border-gray-800 transition">
                            <option value="">Seleccione una opción</option>
                            <option value="edilicio">Requerimiento Edilicio</option>
                            <option value="vacante">Cobertura por Vacante</option>
                        </select>
                        <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>

                <!-- Botón Historial -->
                <div class="flex">
                    <a href="{{ route('edured.historial') }}"
                       class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gray-800 text-white rounded-xl text-sm font-semibold shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-0.5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5a2 2 0 0 0-2 2v14l4-4h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Z"/>
                        </svg>
                        Historial
                    </a>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="p-6 md:p-8 space-y-10">

            <!-- Formulario Requerimiento Edilicio -->
            <form id="form-edilicio" action="{{ route('edured.generar-solicitud-edilicio') }}" method="POST" enctype="multipart/form-data" class="space-y-6 hidden">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="asunto" class="block text-sm font-semibold text-gray-700 mb-1">Asunto del requerimiento</label>
                        <input type="text" id="asunto" name="asunto"
                               class="block w-full border-2 border-gray-200 rounded-xl shadow-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-gray-800/30 focus:border-gray-800 text-sm transition"
                               placeholder="Ej.: Filtración en techo del laboratorio">
                    </div>

                    <div>
                        <label for="requerimiento" class="block text-sm font-semibold text-gray-700 mb-1">Requerimiento</label>
                        <textarea id="requerimiento" name="requerimiento" rows="5"
                                  class="block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-gray-800/30 focus:border-gray-800 text-sm transition"
                                  placeholder="Describa el problema, ubicación exacta, impacto y urgencia."></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Archivos adjuntos</label>
                        <div class="group mt-1 flex flex-col items-center justify-center gap-3 px-6 pt-8 pb-8 border-2 border-dashed rounded-2xl bg-gray-50 border-gray-200 hover:bg-gray-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 group-hover:text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 16v-8m0 0-3 3m3-3 3 3M4 16a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V8a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v8Z"/>
                            </svg>
                            <div class="text-center text-sm text-gray-600">
                                <label for="archivos" class="cursor-pointer font-semibold text-gray-800 hover:underline">
                                    Subir archivos
                                </label>
                                <span class="mx-1 text-gray-400">o</span>
                                arrastrar y soltar
                                <p class="mt-1 text-xs text-gray-500">PNG, JPG, PDF — máx. 10MB</p>
                            </div>
                            <input id="archivos" name="archivos[]" type="file" multiple accept="image/*,.pdf" class="sr-only">
                            <ul id="lista-archivos" class="mt-2 w-full max-w-md text-xs text-gray-600 space-y-1"></ul>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 py-2.5 px-6 rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 shadow font-semibold text-sm transition">
                        Enviar solicitud edilicia
                    </button>
                </div>
            </form>

            <!-- Formulario Cobertura por Vacante -->
            <form id="form-vacante" action="{{ route('edured.generar-solicitud-vacante') }}" method="POST" class="space-y-6 hidden">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="nombre-docente" class="block text-sm font-semibold text-gray-700 mb-1">Nombre docente</label>
                        <input type="text" id="nombre-docente" name="nombre_docente"
                               class="block w-full border-2 border-gray-200 rounded-xl shadow-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-gray-800/30 focus:border-gray-800 text-sm transition">
                    </div>

                    <div>
                        <label for="dni-docente" class="block text-sm font-semibold text-gray-700 mb-1">DNI docente</label>
                        <input type="text" id="dni-docente" name="dni_docente"
                               class="block w-full border-2 border-gray-200 rounded-xl shadow-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-gray-800/30 focus:border-gray-800 text-sm transition">
                    </div>

                    <div>
                        <label for="cargo" class="block text-sm font-semibold text-gray-700 mb-1">Cargo</label>
                        <input type="text" id="cargo" name="cargo"
                               class="block w-full border-2 border-gray-200 rounded-xl shadow-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-gray-800/30 focus:border-gray-800 text-sm transition">
                    </div>

                    <div>
                        <label for="hs" class="block text-sm font-semibold text-gray-700 mb-1">Horas</label>
                        <input type="text" id="hs" name="hs"
                               class="block w-full border-2 border-gray-200 rounded-xl shadow-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-gray-800/30 focus:border-gray-800 text-sm transition">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="materia" class="block text-sm font-semibold text-gray-700 mb-1">Materia</label>
                        <input type="text" id="materia" name="materia"
                               class="block w-full border-2 border-gray-200 rounded-xl shadow-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-gray-800/30 focus:border-gray-800 text-sm transition">
                    </div>

                    <div>
                        <label for="fecha_inicio" class="block text-sm font-semibold text-gray-700 mb-1">Fecha inicio vacante</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio"
                               class="block w-full border-2 border-gray-200 rounded-xl shadow-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-gray-800/30 focus:border-gray-800 text-sm transition">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 py-2.5 px-6 rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 shadow font-semibold text-sm transition">
                        Enviar solicitud vacante
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Lógica de alternancia (se mantiene)
    document.addEventListener('DOMContentLoaded', function () {
        const selector = document.getElementById('tipo-solicitud');
        const formEdilicio = document.getElementById('form-edilicio');
        const formVacante = document.getElementById('form-vacante');

        function toggleForms(value) {
            formEdilicio.classList.add('hidden');
            formVacante.classList.add('hidden');
            if (value === 'edilicio') formEdilicio.classList.remove('hidden');
            if (value === 'vacante') formVacante.classList.remove('hidden');
        }

        selector.addEventListener('change', function () {
            toggleForms(this.value);
        });

        // Si venís con un valor previo (ej: después de validación), respétalo
        toggleForms(selector.value);

        // Previsualización nombres de archivos (opcional, no afecta backend)
        const inputArchivos = document.getElementById('archivos');
        const lista = document.getElementById('lista-archivos');
        if (inputArchivos && lista) {
            inputArchivos.addEventListener('change', () => {
                lista.innerHTML = '';
                Array.from(inputArchivos.files || []).forEach((f) => {
                    const li = document.createElement('li');
                    li.className = 'flex items-center justify-between gap-3 bg-white border border-gray-200 rounded-lg px-3 py-2';
                    li.innerHTML = `
                        <span class="truncate">${f.name}</span>
                        <span class="text-gray-400 text-[10px]">${(f.size/1024/1024).toFixed(2)} MB</span>
                    `;
                    lista.appendChild(li);
                });
            });
        }
    });
</script>
