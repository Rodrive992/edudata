@extends('layouts.app')

@section('title', 'Edudata - Programas y Proyectos')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-6">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <!-- Imagen centrada y responsiva -->
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-programas.png') }}" alt="Programas y Proyectos"
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
                                    La <span class="font-semibold text-blue-700">Dirección Provincial Unidad Ejecutora de Programas
                                        y Proyectos</span>
                                    coordina la implementación estratégica
                                    de iniciativas educativas
                                    que fortalecen el sistema educativo provincial a través de programas nacionales y
                                    jurisdiccionales.
                                </p>
                            </div>

                            <!-- Características en grid mejorado -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-yellow-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Programas Nacionales</p>
                                            <p class="text-xs text-gray-600 mt-1">Becas Progresar, Belgrano, Pueblos Originarios</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 2 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-cyan-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-cyan-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Programa 29 Integral</p>
                                            <p class="text-xs text-gray-600 mt-1">Plan Fines, Fortalecimiento y Gestión Educativa</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 3 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-green-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Planificación Estratégica</p>
                                            <p class="text-xs text-gray-600 mt-1">Planificación Educativa Anual Jurisdiccional</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>Programas nacionales
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>Gestión presupuestaria
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>Planificación estratégica
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Programas y Proyectos -->
            <div class="p-4 md:p-6 pt-4">
                <!-- Presentación -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-6">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Estructura Organizativa</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            La Dirección cuenta con áreas que cumplen funciones específicas correlativas a los programas
                            nacionales,
                            incluyendo líneas de Becas Progresar, Belgrano, Pueblos Originarios, entre otras. Además
                            gestiona el
                            Programa 29 que integra Plan Fines, Fortalecimiento Educativo y Gestión Educativa y Calidad.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-green-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Gestión Actual</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            Actualmente se ejecuta el Programa 29 (incluyendo líneas de acción de PLAN FINES, G.E.Y.C. y
                            F.E.),
                            realizando ejecuciones presupuestarias y rendiciones por Sistema Sitrared. El Plan Fines inició
                            actividades con el Trayecto 3 y 4 del Nivel Secundario, y Fines Deudor.
                        </p>
                    </div>
                </div>

                <!-- Programas en Ejecución -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Programas en Ejecución</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
                            <div class="bg-blue-50 p-4 md:p-5 rounded-lg border border-blue-100">
                                <h4 class="text-base md:text-lg font-semibold text-blue-800 mb-3">Planificación Educativa 2025</h4>
                                <p class="text-blue-700 text-sm md:text-base">
                                    En agosto se aprobó la nueva Planificación Educativa Anual Jurisdiccional (PEAJ 2025),
                                    seleccionando líneas de acción para el financiamiento, incluyendo: ESI, Debate Joven,
                                    Alfabetización, Escuelas de Jóvenes y Adultos, Streaming, Convivencia Escolar, Programa
                                    CERCA,
                                    Coros y Orquestas, entre otros.
                                </p>
                            </div>

                            <div class="bg-green-50 p-4 md:p-5 rounded-lg border border-green-100">
                                <h4 class="text-base md:text-lg font-semibold text-green-800 mb-3">Instrumentos de Gestión</h4>
                                <p class="text-green-700 text-sm md:text-base">
                                    La Dirección ha elaborado un Instructivo para las contrataciones de Bienes y Servicios,
                                    y para contrataciones de perfiles, asegurando la transparencia y eficiencia en la
                                    ejecución
                                    de los programas.
                                </p>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-200">
                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-3">Proyectos en Desarrollo</h4>
                            <ul class="list-disc pl-5 space-y-2 text-gray-700 text-sm md:text-base">
                                <li><strong>Educación Solidaria:</strong> Proyecto "Cuentos que Abrazan" con inicio el 29 de
                                    septiembre</li>
                                <li><strong>Alfabetización:</strong> Encargado de la ejecución del nuevo "Programa 40" de
                                    las 100
                                    escuelas Alfa de la Provincia</li>
                                <li><strong>Innovación Digital:</strong> Área traspasada a la Dirección de Nivel Superior
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Proyectos Futuros -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-purple-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Proyectos en Elaboración</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div class="bg-purple-50 p-4 md:p-5 rounded-lg border border-purple-100">
                                <h4 class="text-base md:text-lg font-semibold text-purple-800 mb-3">Convenios de Colaboración</h4>
                                <ul class="list-disc pl-5 space-y-2 text-purple-700 text-sm md:text-base">
                                    <li>Convenio con Municipalidad de la Capital para programa FINES provincial</li>
                                    <li>Convenio con Mineras para plan Fines Provincial adaptado a operarios</li>
                                    <li>Articulación con dirección de modalidades para titulación en escuelas de jóvenes y
                                        adultos
                                    </li>
                                </ul>
                            </div>

                            <div class="bg-pink-50 p-4 md:p-5 rounded-lg border border-pink-100">
                                <h4 class="text-base md:text-lg font-semibold text-pink-800 mb-3">Iniciativas Educativas</h4>
                                <ul class="list-disc pl-5 space-y-2 text-pink-700 text-sm md:text-base">
                                    <li>Convocatoria voluntaria a docentes de música para Programa de Coros y Orquestas</li>
                                    <li>Capacitación a docentes desde el área de "educación solidaria"</li>
                                    <li>Creación de EQUIPO DE ALFABETIZACIÓN PROVINCIAL</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Matriz Jurisdiccional PEA 2025 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-orange-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Matriz Jurisdiccional PEA 2025</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6 overflow-x-auto">
                        <table class="min-w-full text-sm border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700 text-xs md:text-sm">EJE</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700 text-xs md:text-sm">
                                        Denominación de la Política</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700 text-xs md:text-sm">Línea de acción</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700 text-xs md:text-sm">Nivel</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700 text-xs md:text-sm">Modalidad</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700 text-xs md:text-sm">Honorarios</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700 text-xs md:text-sm">Bienes y servicios</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700 text-xs md:text-sm">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Eje 1 -->
                                <tr class="bg-blue-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">Eje 1</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Acompañamiento a la Alfabetización</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Fortalecimiento pedagógico</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Primario</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Especial</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$15.653.385,00</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">-</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$15.653.385,00</td>
                                </tr>
                                <tr class="bg-blue-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">Eje 1</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Acompañamiento a la Alfabetización</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Plan de Alfabetización Jóvenes y Adultos</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Primario/Secundario</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Permanente Jóvenes y Adultos</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$11.962.125,00</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$1.242.140,00</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$13.204.265,00</td>
                                </tr>
                                <tr class="bg-blue-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">Eje 1</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Acompañamiento a la Alfabetización</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Alfabetización transversal secundaria</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Secundario</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">-</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$14.303.906,25</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$14.303.906,25</td>
                                </tr>
                                <tr class="bg-blue-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">Eje 1</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Acompañamiento a la Alfabetización</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Fortalecimiento Plan Alfabetización Primario</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Primario</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$19.412.820,00</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$10.000.000,00</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$29.412.820,00</td>
                                </tr>

                                <!-- Eje 2 -->
                                <tr class="bg-green-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">Eje 2</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Transformación Educación Secundaria</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Plan de Mejora Institucional</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Secundario</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$3.007.620,00</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">-</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$3.007.620,00</td>
                                </tr>
                                <tr class="bg-green-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">Eje 2</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Transformación Educación Secundaria</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Revisión currículo escolar</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Secundario</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$33.835.730,40</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">-</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$33.835.730,40</td>
                                </tr>

                                <!-- Eje 3 -->
                                <tr class="bg-purple-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">Eje 3</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Fortalecimiento Trayectorias</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Convivencia Escolar</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todos</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">-</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$2.085.794,50</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$2.085.794,50</td>
                                </tr>
                                <tr class="bg-purple-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">Eje 3</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Fortalecimiento Trayectorias</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Educación en Afectividad y Sexualidad</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todos</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">-</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$3.000.000,00</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$3.000.000,00</td>
                                </tr>
                                <tr class="bg-purple-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">Eje 3</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Fortalecimiento Trayectorias</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Arte en la escuela</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Educación Obligatoria</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$5.000.000,00</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$5.400.000,00</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$10.400.000,00</td>
                                </tr>

                                <!-- Eje 4 -->
                                <tr class="bg-orange-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">Eje 4</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Fortalecimiento equipos técnicos</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Acciones transversales</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todos</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">$27.466.300,10</td>
                                    <td class="border border-gray-300 px-3 py-2 text-xs md:text-sm">-</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$27.466.300,10</td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-gray-800 text-white">
                                <tr>
                                    <td colspan="5" class="border border-gray-300 px-3 py-2 text-right font-semibold text-xs md:text-sm">
                                        TOTAL GENERAL</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$116.637.920,50</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$36.031.840,75</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold text-xs md:text-sm">$152.669.761,25</td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="mt-4 text-sm text-gray-600">
                            <p class="text-center italic">Matriz Jurisdiccional PEA 2025 - Resumen ejecutivo de las
                                principales
                                líneas de acción</p>
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