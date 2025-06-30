<nav class="bg-[#fafafa] shadow-sm py-4 border-b border-gray-100" x-data="{ openEduRed: false }">
    <div class="container mx-auto px-5">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-0">
            
            <!-- Logo ministerio -->
            <div class="sm:w-1/4 flex justify-start">
                <a href="{{ route('edudata.index') }}">
                    <img src="{{ asset('images/logo-ministerio.png') }}" alt="Logo Ministerio" class="h-14 md:h-16">
                </a>
            </div>
            
            <!-- Título central -->
            <div class="flex flex-col items-center sm:mx-4">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 tracking-tight">EDURED</h1>
                </div>
                <p class="text-sm md:text-base text-gray-500 mt-1 font-medium">Sistema de Requerimientos y Comunicación</p>
            </div>
            
            <!-- Menú derecha -->
            <div class="sm:w-1/4 flex justify-center sm:justify-end space-x-6">
                
                <button @click="openEduRed = !openEduRed" 
                        class="text-gray-600 hover:text-blue-600 text-base md:text-lg font-medium whitespace-nowrap transition-colors flex items-center">
                    ¿Qué es EduRed?
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transition-transform" 
                         :class="{ 'rotate-180': openEduRed }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 text-base md:text-lg font-medium whitespace-nowrap transition-colors">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Panel desplegable -->
    <div x-show="openEduRed" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-1"
         class="absolute right-0 mt-2 w-full md:w-1/2 lg:w-1/3 bg-white shadow-xl rounded-lg z-50 border border-gray-200 overflow-hidden">
         
        <div class="p-6 max-h-[80vh] overflow-y-auto">
            
            <!-- Encabezado -->
            <div class="flex items-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-2xl font-bold text-gray-800">¿Qué es EduRed?</h3>
            </div>
            
            <p class="text-gray-600 text-base leading-relaxed">
                EduRed es el sistema de requerimientos y comunicación de las dependencias del Ministerio de Educación.
                Desde aquí, las áreas podrán generar solicitudes, consultar estados y facilitar la interacción institucional de forma ordenada y transparente.
            </p>
        </div>
    </div>
</nav>