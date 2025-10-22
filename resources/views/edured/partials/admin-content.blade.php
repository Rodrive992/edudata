<div class="space-y-8">
    <div>
        <h1 class="text-2xl font-bold mb-2">Panel de control y carga -  Dirección de Transparencia Activa</h1>
        <p class="text-gray-600">Seleccione una herramienta para administrar secciones de Edudata.</p>
    </div>

    <!-- Herramientas -->
    <div class="bg-white rounded-xl shadow border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Herramientas</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
             <!-- Botón real: Solicitudes info-->
            <a href="{{ route('edured.herramientas.solicitudes-info.index') }}"
               class="group flex items-center justify-between p-4 rounded-xl border hover:shadow-md transition
                      border-gray-200 hover:border-gray-300 bg-gray-50 hover:bg-white">
                <div>
                    <p class="font-semibold text-gray-800">Solicitudes de Información</p>
                    <p class="text-sm text-gray-500">Gestión de las solicitudes</p>
                </div>
                <span class="text-gray-400 group-hover:text-gray-600">➜</span>
            </a>
            <!-- Botón real: Cargar Digesto -->
            <a href="{{ route('edured.herramientas.digesto.index') }}"
               class="group flex items-center justify-between p-4 rounded-xl border hover:shadow-md transition
                      border-gray-200 hover:border-gray-300 bg-gray-50 hover:bg-white">
                <div>
                    <p class="font-semibold text-gray-800">Cargar Digesto</p>
                    <p class="text-sm text-gray-500">Subir PDFs de normativa</p>
                </div>
                <span class="text-gray-400 group-hover:text-gray-600">➜</span>
            </a>

            <!-- Ejemplos con # -->
            <a href="#"
               class="group flex items-center justify-between p-4 rounded-xl border hover:shadow-md transition
                      border-gray-200 hover:border-gray-300 bg-gray-50 hover:bg-white">
                <div>
                    <p class="font-semibold text-gray-800">Gestión de Usuarios</p>
                    <p class="text-sm text-gray-500">Crear, editar y eliminar usuarios Edured</p>
                </div>
                <span class="text-gray-400 group-hover:text-gray-600">➜</span>
            </a>

            <a href="{{ route('edured.herramientas.mantenimiento.realizadas.create') }}"
               class="group flex items-center justify-between p-4 rounded-xl border hover:shadow-md transition
                      border-gray-200 hover:border-gray-300 bg-gray-50 hover:bg-white">
                <div>
                    <p class="font-semibold text-gray-800">Cargar Mantenimiento</p>
                    <p class="text-sm text-gray-500">Tareas y registros</p>
                </div>
                <span class="text-gray-400 group-hover:text-gray-600">➜</span>
            </a>
        </div>
    </div>
</div>