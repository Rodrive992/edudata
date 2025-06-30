<nav class="bg-[#fafafa] shadow-sm py-4 border-b border-gray-100" x-data="{ openEduData: false }">
    <div class="container mx-auto px-5">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-0">
            <!-- Logo ministerio -->
           <div class="sm:w-1/4 flex justify-start">
            <a href="{{ route('edudata.index') }}">
            <img src="{{ asset('images/logo-ministerio.png') }}" alt="Logo Ministerio" 
             class="h-14 md:h-16">
            </a>
            </div>
            
            <!-- Título central con ícono y estilo mejorado -->
            <div class="flex flex-col items-center sm:mx-4">
                <div class="flex items-center space-x-2">
                    <!-- Ícono de educación (puedes usar cualquier ícono de FontAwesome, Heroicons, etc.) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 tracking-tight">EDUDATA</h1>
                </div>
                <p class="text-sm md:text-base text-gray-500 mt-1 font-medium">Dirección de Transparencia Activa</p>
            </div>
            
            <!-- Menú derecha -->
            <div class="sm:w-1/4 flex justify-center sm:justify-end space-x-6">
                <a href="#" class="text-gray-600 hover:text-blue-600 text-base md:text-lg font-medium whitespace-nowrap transition-colors">
                    Organigrama
                </a>
                <a href="#" class="text-gray-600 hover:text-blue-600 text-base md:text-lg font-medium whitespace-nowrap transition-colors">
                    Normativa
                </a>
                <button @click="openEduData = !openEduData" 
                        class="text-gray-600 hover:text-blue-600 text-base md:text-lg font-medium whitespace-nowrap transition-colors flex items-center">
                    ¿Qué es EduData?
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transition-transform" 
                         :class="{ 'rotate-180': openEduData }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Panel desplegable -->
    <div x-show="openEduData" 
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
                <h3 class="text-2xl font-bold text-gray-800">Portal EduData</h3>
            </div>
            
            <!-- Sección de Objetivos -->
            <div class="mb-8">
                <h4 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Objetivos del Portal</h4>
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Objetivo 1 -->
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <p class="text-gray-600">Visibilizar la estructura organizativa y los recursos institucionales</p>
                    </div>
                    
                    <!-- Objetivo 2 -->
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-gray-600">Publicar información clave sobre asignación y uso de recursos públicos</p>
                    </div>
                    
                    <!-- Objetivo 3 -->
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <p class="text-gray-600">Facilitar el control ciudadano e institucional sobre los actos de gestión</p>
                    </div>
                    
                    <!-- Objetivo 4 -->
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <p class="text-gray-600">Promover cultura institucional basada en transparencia y participación</p>
                    </div>
                </div>
            </div>
            
            <!-- Sección de Contenido -->
           <!-- <div>
                <h4 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Contenido del Portal</h4>
                <div class="space-y-6">
                    Item 1 -->
                    <!-- <div class="flex">
                        <div class="mr-4 mt-1">
                            <div class="bg-blue-100 text-blue-600 rounded-full w-8 h-8 flex items-center justify-center font-bold">1</div>
                        </div>
                        <div>
                            <h5 class="font-medium text-gray-800">Organigrama institucional y autoridades</h5>
                            <p class="text-gray-600 text-sm">Funciones de cada dirección, nombres de funcionarios y datos de contacto</p>
                        </div>
                    </div>-->
                    
                    <!-- Item 2 -->
                    <!--<div class="flex">
                        <div class="mr-4 mt-1">
                            <div class="bg-blue-100 text-blue-600 rounded-full w-8 h-8 flex items-center justify-center font-bold">2</div>
                        </div>
                        <div>
                            <h5 class="font-medium text-gray-800">Presupuesto y ejecución trimestral</h5>
                            <p class="text-gray-600 text-sm">Presupuesto anual aprobado y su distribución por programas</p>
                        </div>
                    </div>
                   
                    
                     Item 8 -->
                   <!-- <div class="flex">
                        <div class="mr-4 mt-1">
                            <div class="bg-blue-100 text-blue-600 rounded-full w-8 h-8 flex items-center justify-center font-bold">8</div>
                        </div>
                        <div>
                            <h5 class="font-medium text-gray-800">Solicitudes de acceso a la información</h5>
                            <p class="text-gray-600 text-sm">Instructivo para canalizar solicitudes a través del sistema TAD/GDE</p>
                        </div>
                    </div>
                </div>
            </div>-->
            
            <!-- CTA -->
            <!--<div class="mt-8 pt-6 border-t border-gray-200 text-center">
                <a href="#" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Generar Solicitud
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>-->
        </div>
    </div>
</nav>