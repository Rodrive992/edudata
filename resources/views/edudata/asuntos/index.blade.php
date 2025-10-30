@extends('layouts.app')

@section('title', 'Edudata - Asuntos Jurídicos')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-6">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-asuntos.png') }}" 
                         alt="Asuntos Jurídicos" 
                         class="w-full max-w-2xl h-auto object-contain rounded-xl">
                </div>
                
                <!-- Texto descriptivo mejorado -->
                <div class="mb-4 md:mb-6">                
                    <div class="space-y-4">
                        <!-- Sección de características - MEJORADO -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl p-4 md:p-5 my-4 border border-blue-200">
                            <!-- Descripción principal -->
                            <div class="text-center mb-4 md:mb-5">
                                <p class="text-gray-700 leading-relaxed text-base md:text-lg">
                                    La <span class="font-semibold text-blue-700">Dirección Provincial de Asuntos Jurídicos</span> 
                                    garantiza el <span class="bg-yellow-100 px-1 rounded">marco normativo adecuado</span> 
                                    para el desarrollo de las actividades del <span class="font-medium text-green-600">sistema educativo provincial</span>, 
                                    asegurando el cumplimiento de la normativa aplicable en todas las áreas.
                                </p>
                            </div>

                            <!-- Características en grid mejorado -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Asesoramiento Legal</p>
                                            <p class="text-xs text-gray-600 mt-1">Normativa sector educativo</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 2 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-cyan-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Tramitación de Expedientes</p>
                                            <p class="text-xs text-gray-600 mt-1">Informes y dictámenes</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 3 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Normativa Educativa</p>
                                            <p class="text-xs text-gray-600 mt-1">Leyes, decretos y resoluciones</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                    Asesoramiento legal
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    Tramitación de expedientes
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                    Normativa educativa
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Asuntos Jurídicos -->
            <div class="p-4 md:p-6 pt-4">
                <!-- Presentación -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-6">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Actividad Jurídica</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            Desde el mes de febrero y hasta el 27/08/2025, se han tramitado en total <strong>984
                                expedientes</strong>,
                            abarcando toda la normativa aplicable al sector docente y no docente en las áreas pedagógica,
                            administrativa y contable del Ministerio de Educación, Ciencia y Tecnología.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M7.05 16.95l-1.414 1.414m12.728 0l-1.414-1.414M7.05 7.05L5.636 5.636M8 12a4 4 0 118 0c0 2-4 6-4 6s-4-4-4-6z" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Ámbito Normativo</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            La normativa aplicada es amplia y abarcativa, incluyendo Leyes, Decretos, Reglamentos,
                            Resoluciones Ministeriales, Circulares y demás instrumentos jurídicos que rigen la actividad
                            del sistema educativo provincial.
                        </p>
                    </div>
                </div>

                <!-- Estadísticas de expedientes -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Estadísticas de Expedientes</h3>
                        </div>
                        <p class="text-xs md:text-sm text-gray-600 mt-1">Período: Febrero 2025 - Agosto 2025 (al 27/08/2025)</p>
                    </div>

                    <div class="p-4 md:p-6">
                        <!-- Distribución mensual -->
                        <div class="mb-6 md:mb-8">
                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-4">Distribución Mensual de Expedientes</h4>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">
                                <div class="bg-blue-50 p-3 md:p-4 rounded-lg border border-blue-100">
                                    <p class="text-blue-900 text-xl md:text-2xl font-bold">116</p>
                                    <p class="text-blue-700 font-medium text-sm md:text-base">Febrero</p>
                                </div>
                                <div class="bg-green-50 p-3 md:p-4 rounded-lg border border-green-100">
                                    <p class="text-green-900 text-xl md:text-2xl font-bold">114</p>
                                    <p class="text-green-700 font-medium text-sm md:text-base">Marzo</p>
                                </div>
                                <div class="bg-purple-50 p-3 md:p-4 rounded-lg border border-purple-100">
                                    <p class="text-purple-900 text-xl md:text-2xl font-bold">176</p>
                                    <p class="text-purple-700 font-medium text-sm md:text-base">Abril</p>
                                </div>
                                <div class="bg-amber-50 p-3 md:p-4 rounded-lg border border-amber-100">
                                    <p class="text-amber-900 text-xl md:text-2xl font-bold">189</p>
                                    <p class="text-amber-700 font-medium text-sm md:text-base">Mayo</p>
                                </div>
                                <div class="bg-indigo-50 p-3 md:p-4 rounded-lg border border-indigo-100">
                                    <p class="text-indigo-900 text-xl md:text-2xl font-bold">147</p>
                                    <p class="text-indigo-700 font-medium text-sm md:text-base">Junio</p>
                                </div>
                                <div class="bg-pink-50 p-3 md:p-4 rounded-lg border border-pink-100">
                                    <p class="text-pink-900 text-xl md:text-2xl font-bold">96</p>
                                    <p class="text-pink-700 font-medium text-sm md:text-base">Julio</p>
                                </div>
                                <div class="bg-teal-50 p-3 md:p-4 rounded-lg border border-teal-100">
                                    <p class="text-teal-900 text-xl md:text-2xl font-bold">146</p>
                                    <p class="text-teal-700 font-medium text-sm md:text-base">Agosto</p>
                                </div>
                                <div class="bg-gray-50 p-3 md:p-4 rounded-lg border border-gray-100">
                                    <p class="text-gray-900 text-xl md:text-2xl font-bold">984</p>
                                    <p class="text-gray-700 font-medium text-sm md:text-base">TOTAL</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tipos de tramitación -->
                        <div class="mb-6 md:mb-8">
                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-4">Tipos de Tramitación</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <div class="bg-blue-50 p-4 md:p-5 rounded-lg border border-blue-100">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-blue-600 text-white rounded-full h-8 w-8 md:h-10 md:w-10 flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <h4 class="text-base md:text-lg font-semibold text-blue-800">Informes Emitidos</h4>
                                    </div>
                                    <p class="text-blue-900 text-2xl md:text-3xl font-bold">361</p>
                                    <p class="text-blue-700 text-sm md:text-base">expedientes tramitados con emisión de informes</p>
                                </div>

                                <div class="bg-purple-50 p-4 md:p-5 rounded-lg border border-purple-100">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-purple-600 text-white rounded-full h-8 w-8 md:h-10 md:w-10 flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <h4 class="text-base md:text-lg font-semibold text-purple-800">Dictámenes Emitidos</h4>
                                    </div>
                                    <p class="text-purple-900 text-2xl md:text-3xl font-bold">623</p>
                                    <p class="text-purple-700 text-sm md:text-base">expedientes tramitados con dictámenes</p>
                                </div>
                            </div>
                        </div>

                        <!-- Datos de relevancia -->
                        <div>
                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-4">Datos de Relevancia</h4>
                            <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-200">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                    <div>
                                        <h5 class="font-semibold text-gray-800 mb-3 text-sm md:text-base">Temáticas Específicas</h5>
                                        <ul class="list-disc pl-5 space-y-2 text-gray-700 text-sm md:text-base">
                                            <li><strong>26</strong> expedientes sobre violencia de género</li>
                                            <li><strong>359</strong> dictámenes de Liquidaciones Finales</li>
                                            <li><strong>32</strong> expedientes de Honorarios</li>
                                            <li><strong>78</strong> expedientes de Altas Docentes</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-gray-800 mb-3 text-sm md:text-base">Otras Áreas</h5>
                                        <ul class="list-disc pl-5 space-y-2 text-gray-700 text-sm md:text-base">
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
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Información Adicional</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="text-gray-700 text-sm md:text-base">
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

    <style>
        .feature-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
    </style>
@endsection