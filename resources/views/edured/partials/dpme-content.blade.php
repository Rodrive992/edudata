<div class="space-y-8">
    <div>
        <h1 class="text-2xl font-bold mb-2">Panel de Carga — Dirección de Programación y Mantenimiento Edilicio</h1>
        <p class="text-gray-600">Seleccione qué desea cargar en Edudata.</p>
    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Herramientas</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Lleva a la vista "cargar_mantenimiento_realizadas" -->
            <a href="{{ route('edured.herramientas.mantenimiento.realizadas.create') }}"
               class="group flex items-center justify-between p-4 rounded-xl border hover:shadow-md transition
                      border-gray-200 hover:border-gray-300 bg-gray-50 hover:bg-white">
                <div>
                    <p class="font-semibold text-gray-800">Cargar tareas realizadas</p>
                    <p class="text-sm text-gray-500">Subir CSV con (FECHA, ESTABLECIMIENTO, TAREA, TIPO)</p>
                </div>
                <span class="text-gray-400 group-hover:text-gray-600">➜</span>
            </a>

            <a href="#" class="group flex items-center justify-between p-4 rounded-xl border hover:shadow-md transition
                      border-gray-200 hover:border-gray-300 bg-gray-50 hover:bg-white">
                <div>
                    <p class="font-semibold text-gray-800">Cargar tareas pendientes</p>
                    <p class="text-sm text-gray-500">(Próximamente)</p>
                </div>
                <span class="text-gray-400 group-hover:text-gray-600">➜</span>
            </a>

            <a href="#" class="group flex items-center justify-between p-4 rounded-xl border hover:shadow-md transition
                      border-gray-200 hover:border-gray-300 bg-gray-50 hover:bg-white">
                <div>
                    <p class="font-semibold text-gray-800">Cargar comisiones de servicio</p>
                    <p class="text-sm text-gray-500">(Próximamente)</p>
                </div>
                <span class="text-gray-400 group-hover:text-gray-600">➜</span>
            </a>
        </div>
    </div>
</div>