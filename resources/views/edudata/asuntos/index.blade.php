@extends('layouts.app')

@section('title', 'Edudata - Asuntos Jurídicos')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-10">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/titulo-asuntos.png') }}" 
                         alt="Asuntos Jurídicos" 
                         class="w-full h-auto object-cover rounded-xl">
                </div>
                
                <!-- Texto descriptivo mejorado -->
                <div class="mb-6">                
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            La <span class="font-semibold text-blue-700">Dirección Provincial de Asuntos Jurídicos</span> 
                            garantiza el <span class="bg-yellow-100 px-1 rounded">marco normativo adecuado</span> 
                            para el desarrollo de las actividades del <span class="font-medium text-green-600">sistema educativo provincial</span>, 
                            asegurando el cumplimiento de la normativa aplicable en todas las áreas.
                        </p>

                        <!-- Sección de funcionalidades con fondo claro -->
                        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 p-4 sm:p-6 lg:p-8 my-6 sm:my-8 shadow-lg border border-blue-200">
                            <!-- Elementos decorativos de fondo -->
                            <div class="absolute top-0 right-0 w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 bg-blue-200/30 rounded-full -translate-y-8 sm:-translate-y-12 lg:-translate-y-16 translate-x-8 sm:translate-x-12 lg:translate-x-16"></div>
                            <div class="absolute bottom-0 left-0 w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-indigo-200/30 rounded-full translate-y-8 sm:translate-y-10 lg:translate-y-12 -translate-x-6 sm:-translate-x-8 lg:-translate-x-12"></div>

                            <div class="relative z-10">
                              
                                <!-- Grid de funcionalidades -->
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                    <!-- Tarjeta 1: Asesoramiento Legal -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#f5cb58] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">01</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#f5cb58] to-[#ddb750] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Asesoramiento Legal Integral</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Brindamos asesoramiento jurídico especializado en toda la normativa aplicable al sector educativo, docente y no docente</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">⚖️ Marco normativo</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 2: Tramitación de Expedientes -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-[#6bbde5] hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#6bbde5] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">02</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#6bbde5] to-[#5aadd5] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Tramitación de Expedientes</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Gestionamos la tramitación integral de expedientes con emisión de informes y dictámenes especializados para cada caso</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-cyan-600 text-sm font-semibold">📋 Gestión documental</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 3: Normativa Educativa -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full md:col-span-2 lg:col-span-1">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">03</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Normativa Educativa</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Aplicamos Leyes, Decretos, Resoluciones y toda la normativa que rige la actividad del sistema educativo provincial</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">📚 Marco legal educativo</span>
                                        </div>
                                    </div>
                                </div>

                               
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                Asesoramiento legal
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Tramitación de expedientes
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                Normativa educativa
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Asuntos Jurídicos -->
            <div class="p-6 pt-4">
                <!-- Presentación -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Actividad Jurídica</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow">
                            Desde el mes de febrero y hasta el 27/08/2025, se han tramitado en total <strong>984
                                expedientes</strong>,
                            abarcando toda la normativa aplicable al sector docente y no docente en las áreas pedagógica,
                            administrativa y contable del Ministerio de Educación, Ciencia y Tecnología.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M7.05 16.95l-1.414 1.414m12.728 0l-1.414-1.414M7.05 7.05L5.636 5.636M8 12a4 4 0 118 0c0 2-4 6-4 6s-4-4-4-6z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Ámbito Normativo</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow">
                            La normativa aplicada es amplia y abarcativa, incluyendo Leyes, Decretos, Reglamentos,
                            Resoluciones Ministeriales, Circulares y demás instrumentos jurídicos que rigen la actividad
                            del sistema educativo provincial.
                        </p>
                    </div>
                </div>

                <!-- Resto del contenido se mantiene igual -->
                <!-- Estadísticas de expedientes -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Estadísticas de Expedientes</h3>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">Período: Febrero 2025 - Agosto 2025 (al 27/08/2025)</p>
                    </div>

                    <div class="p-6">
                        <!-- Distribución mensual -->
                        <div class="mb-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Distribución Mensual de Expedientes</h4>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                                    <p class="text-blue-900 text-2xl font-bold">116</p>
                                    <p class="text-blue-700 font-medium">Febrero</p>
                                </div>
                                <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                                    <p class="text-green-900 text-2xl font-bold">114</p>
                                    <p class="text-green-700 font-medium">Marzo</p>
                                </div>
                                <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
                                    <p class="text-purple-900 text-2xl font-bold">176</p>
                                    <p class="text-purple-700 font-medium">Abril</p>
                                </div>
                                <div class="bg-amber-50 p-4 rounded-lg border border-amber-100">
                                    <p class="text-amber-900 text-2xl font-bold">189</p>
                                    <p class="text-amber-700 font-medium">Mayo</p>
                                </div>
                                <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                                    <p class="text-indigo-900 text-2xl font-bold">147</p>
                                    <p class="text-indigo-700 font-medium">Junio</p>
                                </div>
                                <div class="bg-pink-50 p-4 rounded-lg border border-pink-100">
                                    <p class="text-pink-900 text-2xl font-bold">96</p>
                                    <p class="text-pink-700 font-medium">Julio</p>
                                </div>
                                <div class="bg-teal-50 p-4 rounded-lg border border-teal-100">
                                    <p class="text-teal-900 text-2xl font-bold">146</p>
                                    <p class="text-teal-700 font-medium">Agosto</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                                    <p class="text-gray-900 text-2xl font-bold">984</p>
                                    <p class="text-gray-700 font-medium">TOTAL</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tipos de tramitación -->
                        <div class="mb-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Tipos de Tramitación</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-blue-50 p-5 rounded-lg border border-blue-100">
                                    <div class="flex items-center mb-3">
                                        <div
                                            class="bg-blue-600 text-white rounded-full h-10 w-10 flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <h4 class="text-lg font-semibold text-blue-800">Informes Emitidos</h4>
                                    </div>
                                    <p class="text-blue-900 text-3xl font-bold">361</p>
                                    <p class="text-blue-700">expedientes tramitados con emisión de informes</p>
                                </div>

                                <div class="bg-purple-50 p-5 rounded-lg border border-purple-100">
                                    <div class="flex items-center mb-3">
                                        <div
                                            class="bg-purple-600 text-white rounded-full h-10 w-10 flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <h4 class="text-lg font-semibold text-purple-800">Dictámenes Emitidos</h4>
                                    </div>
                                    <p class="text-purple-900 text-3xl font-bold">623</p>
                                    <p class="text-purple-700">expedientes tramitados con dictámenes</p>
                                </div>
                            </div>
                        </div>

                        <!-- Datos de relevancia -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Datos de Relevancia</h4>
                            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <h5 class="font-semibold text-gray-800 mb-3">Temáticas Específicas</h5>
                                        <ul class="list-disc pl-6 space-y-2 text-gray-700">
                                            <li><strong>26</strong> expedientes sobre violencia de género</li>
                                            <li><strong>359</strong> dictámenes de Liquidaciones Finales</li>
                                            <li><strong>32</strong> expedientes de Honorarios</li>
                                            <li><strong>78</strong> expedientes de Altas Docentes</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-gray-800 mb-3">Otras Áreas</h5>
                                        <ul class="list-disc pl-6 space-y-2 text-gray-700">
                                            <li><strong>20</strong> Concursos de Precios o Contrataciones</li>
                                            <li><strong>50</strong> expedientes de Licencias Varias</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información adicional -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Información Adicional</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="prose max-w-none text-gray-700">
                            <p class="mb-4">
                                Tal como puede advertirse, la normativa con la que se trabaja es muy amplia y abarcativa de todo el
                                sector docente y no docente, en la faz pedagógica, administrativa y contable, dependiente de este
                                Ministerio de Educación, Ciencia y Tecnología.
                            </p>
                            <p>
                                Son aplicables Leyes, Decretos, Reglamentos, Resoluciones Ministeriales, Circulares, y toda la
                                normativa que rige la actividad del sistema educativo provincial, garantizando el marco legal
                                adecuado para el desarrollo de las funciones educativas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection