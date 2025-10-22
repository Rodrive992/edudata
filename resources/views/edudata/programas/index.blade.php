@extends('layouts.app')

@section('title', 'Edudata - Programas y Proyectos')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-10">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/titulo-programas.png') }}" alt="Programas y Proyectos"
                        class="w-full h-auto object-cover rounded-xl">
                </div>

                <!-- Texto descriptivo mejorado -->
                <div class="mb-6">
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            La <span class="font-semibold text-blue-700">Dirección Provincial Unidad Ejecutora de Programas
                                y Proyectos</span>
                            coordina la <span class="bg-yellow-100 px-1 rounded">implementación estratégica</span>
                            de <span class="font-medium text-green-600">iniciativas educativas</span>
                            que fortalecen el sistema educativo provincial a través de programas nacionales y
                            jurisdiccionales.
                        </p>

                        <!-- Sección de funcionalidades con fondo claro -->
                        <div
                            class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 p-4 sm:p-6 lg:p-8 my-6 sm:my-8 shadow-lg border border-blue-200">
                            <!-- Elementos decorativos de fondo -->
                            <div
                                class="absolute top-0 right-0 w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 bg-blue-200/30 rounded-full -translate-y-8 sm:-translate-y-12 lg:-translate-y-16 translate-x-8 sm:translate-x-12 lg:translate-x-16">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-indigo-200/30 rounded-full translate-y-8 sm:translate-y-10 lg:translate-y-12 -translate-x-6 sm:-translate-x-8 lg:-translate-x-12">
                            </div>

                            <div class="relative z-10">
                                <!-- Header con icono -->
                                <div class="flex items-center gap-4 mb-6 sm:mb-8">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-1">Desde la Dirección
                                            gestionamos:</h3>
                                    </div>
                                </div>

                                <!-- Grid de funcionalidades -->
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                    <!-- Tarjeta 1: Programas Nacionales -->
                                    <div
                                        class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div
                                                class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#f5cb58] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">01</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div
                                                class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#f5cb58] to-[#ddb750] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Programas
                                            Nacionales</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Coordinamos
                                            la implementación de programas como Becas Progresar, Belgrano, Pueblos
                                            Originarios y otras líneas de acción federales</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">🏛️ Acción federal
                                                coordinada</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 2: Programa 29 -->
                                    <div
                                        class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-[#6bbde5] hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div
                                                class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#6bbde5] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">02</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div
                                                class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#6bbde5] to-[#5aadd5] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Programa 29
                                            Integral</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Gestionamos
                                            el Programa 29 que integra Plan Fines, Fortalecimiento Educativo y Gestión
                                            Educativa con ejecuciones presupuestarias</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-cyan-600 text-sm font-semibold">📊 Gestión integral</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 3: Planificación Estratégica -->
                                    <div
                                        class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full md:col-span-2 lg:col-span-1">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div
                                                class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">03</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div
                                                class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Planificación
                                            Estratégica</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Elaboramos
                                            la Planificación Educativa Anual Jurisdiccional y matrices presupuestarias para
                                            financiamiento de políticas educativas</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">📈 Proyección
                                                estratégica</span>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                Programas nacionales
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Gestión presupuestaria
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                Planificación estratégica
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Programas y Proyectos -->
            <div class="p-6 pt-4">
                <!-- Presentación -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Estructura Organizativa</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow">
                            La Dirección cuenta con áreas que cumplen funciones específicas correlativas a los programas
                            nacionales,
                            incluyendo líneas de Becas Progresar, Belgrano, Pueblos Originarios, entre otras. Además
                            gestiona el
                            Programa 29 que integra Plan Fines, Fortalecimiento Educativo y Gestión Educativa y Calidad.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-green-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Gestión Actual</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow">
                            Actualmente se ejecuta el Programa 29 (incluyendo líneas de acción de PLAN FINES, G.E.Y.C. y
                            F.E.),
                            realizando ejecuciones presupuestarias y rendiciones por Sistema Sitrared. El Plan Fines inició
                            actividades con el Trayecto 3 y 4 del Nivel Secundario, y Fines Deudor.
                        </p>
                    </div>
                </div>

                <!-- Resto del contenido se mantiene igual -->
                <!-- Programas en Ejecución -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-green-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Programas en Ejecución</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="bg-blue-50 p-5 rounded-lg border border-blue-100">
                                <h4 class="text-lg font-semibold text-blue-800 mb-3">Planificación Educativa 2025</h4>
                                <p class="text-blue-700 text-sm">
                                    En agosto se aprobó la nueva Planificación Educativa Anual Jurisdiccional (PEAJ 2025),
                                    seleccionando líneas de acción para el financiamiento, incluyendo: ESI, Debate Joven,
                                    Alfabetización, Escuelas de Jóvenes y Adultos, Streaming, Convivencia Escolar, Programa
                                    CERCA,
                                    Coros y Orquestas, entre otros.
                                </p>
                            </div>

                            <div class="bg-green-50 p-5 rounded-lg border border-green-100">
                                <h4 class="text-lg font-semibold text-green-800 mb-3">Instrumentos de Gestión</h4>
                                <p class="text-green-700 text-sm">
                                    La Dirección ha elaborado un Instructivo para las contrataciones de Bienes y Servicios,
                                    y para contrataciones de perfiles, asegurando la transparencia y eficiencia en la
                                    ejecución
                                    de los programas.
                                </p>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-800 mb-3">Proyectos en Desarrollo</h4>
                            <ul class="list-disc pl-5 space-y-2 text-gray-700">
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
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-pink-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Proyectos en Elaboración</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-purple-50 p-5 rounded-lg border border-purple-100">
                                <h4 class="text-lg font-semibold text-purple-800 mb-3">Convenios de Colaboración</h4>
                                <ul class="list-disc pl-5 space-y-2 text-purple-700">
                                    <li>Convenio con Municipalidad de la Capital para programa FINES provincial</li>
                                    <li>Convenio con Mineras para plan Fines Provincial adaptado a operarios</li>
                                    <li>Articulación con dirección de modalidades para titulación en escuelas de jóvenes y
                                        adultos
                                    </li>
                                </ul>
                            </div>

                            <div class="bg-pink-50 p-5 rounded-lg border border-pink-100">
                                <h4 class="text-lg font-semibold text-pink-800 mb-3">Iniciativas Educativas</h4>
                                <ul class="list-disc pl-5 space-y-2 text-pink-700">
                                    <li>Convocatoria voluntaria a docentes de música para Programa de Coros y Orquestas</li>
                                    <li>Capacitación a docentes desde el área de "educación solidaria"</li>
                                    <li>Creación de EQUIPO DE ALFABETIZACIÓN PROVINCIAL</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Matriz Jurisdiccional PEA 2025 -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-orange-50 to-amber-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Matriz Jurisdiccional PEA 2025</h3>
                        </div>
                    </div>

                    <div class="p-6 overflow-x-auto">
                        <!-- Tabla se mantiene igual -->
                        <table class="min-w-full text-sm border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700">EJE
                                    </th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700">
                                        Denominación
                                        de la Política</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700">Línea
                                        de
                                        acción</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700">Nivel
                                    </th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700">
                                        Modalidad</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700">
                                        Honorarios
                                    </th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700">Bienes
                                        y
                                        servicios</th>
                                    <th class="border border-gray-300 px-3 py-2 text-left font-medium text-gray-700">Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Eje 1 -->
                                <tr class="bg-blue-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">Eje 1</td>
                                    <td class="border border-gray-300 px-3 py-2">Acompañamiento a la Alfabetización</td>
                                    <td class="border border-gray-300 px-3 py-2">Fortalecimiento pedagógico</td>
                                    <td class="border border-gray-300 px-3 py-2">Primario</td>
                                    <td class="border border-gray-300 px-3 py-2">Especial</td>
                                    <td class="border border-gray-300 px-3 py-2">$15.653.385,00</td>
                                    <td class="border border-gray-300 px-3 py-2">-</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$15.653.385,00</td>
                                </tr>
                                <tr class="bg-blue-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">Eje 1</td>
                                    <td class="border border-gray-300 px-3 py-2">Acompañamiento a la Alfabetización</td>
                                    <td class="border border-gray-300 px-3 py-2">Plan de Alfabetización Jóvenes y Adultos
                                    </td>
                                    <td class="border border-gray-300 px-3 py-2">Primario/Secundario</td>
                                    <td class="border border-gray-300 px-3 py-2">Permanente Jóvenes y Adultos</td>
                                    <td class="border border-gray-300 px-3 py-2">$11.962.125,00</td>
                                    <td class="border border-gray-300 px-3 py-2">$1.242.140,00</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$13.204.265,00</td>
                                </tr>
                                <tr class="bg-blue-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">Eje 1</td>
                                    <td class="border border-gray-300 px-3 py-2">Acompañamiento a la Alfabetización</td>
                                    <td class="border border-gray-300 px-3 py-2">Alfabetización transversal secundaria</td>
                                    <td class="border border-gray-300 px-3 py-2">Secundario</td>
                                    <td class="border border-gray-300 px-3 py-2">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2">-</td>
                                    <td class="border border-gray-300 px-3 py-2">$14.303.906,25</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$14.303.906,25</td>
                                </tr>
                                <tr class="bg-blue-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">Eje 1</td>
                                    <td class="border border-gray-300 px-3 py-2">Acompañamiento a la Alfabetización</td>
                                    <td class="border border-gray-300 px-3 py-2">Fortalecimiento Plan Alfabetización
                                        Primario</td>
                                    <td class="border border-gray-300 px-3 py-2">Primario</td>
                                    <td class="border border-gray-300 px-3 py-2">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2">$19.412.820,00</td>
                                    <td class="border border-gray-300 px-3 py-2">$10.000.000,00</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$29.412.820,00</td>
                                </tr>

                                <!-- Eje 2 -->
                                <tr class="bg-green-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">Eje 2</td>
                                    <td class="border border-gray-300 px-3 py-2">Transformación Educación Secundaria</td>
                                    <td class="border border-gray-300 px-3 py-2">Plan de Mejora Institucional</td>
                                    <td class="border border-gray-300 px-3 py-2">Secundario</td>
                                    <td class="border border-gray-300 px-3 py-2">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2">$3.007.620,00</td>
                                    <td class="border border-gray-300 px-3 py-2">-</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$3.007.620,00</td>
                                </tr>
                                <tr class="bg-green-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">Eje 2</td>
                                    <td class="border border-gray-300 px-3 py-2">Transformación Educación Secundaria</td>
                                    <td class="border border-gray-300 px-3 py-2">Revisión currículo escolar</td>
                                    <td class="border border-gray-300 px-3 py-2">Secundario</td>
                                    <td class="border border-gray-300 px-3 py-2">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2">$33.835.730,40</td>
                                    <td class="border border-gray-300 px-3 py-2">-</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$33.835.730,40</td>
                                </tr>

                                <!-- Eje 3 -->
                                <tr class="bg-purple-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">Eje 3</td>
                                    <td class="border border-gray-300 px-3 py-2">Fortalecimiento Trayectorias</td>
                                    <td class="border border-gray-300 px-3 py-2">Convivencia Escolar</td>
                                    <td class="border border-gray-300 px-3 py-2">Todos</td>
                                    <td class="border border-gray-300 px-3 py-2">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2">-</td>
                                    <td class="border border-gray-300 px-3 py-2">$2.085.794,50</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$2.085.794,50</td>
                                </tr>
                                <tr class="bg-purple-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">Eje 3</td>
                                    <td class="border border-gray-300 px-3 py-2">Fortalecimiento Trayectorias</td>
                                    <td class="border border-gray-300 px-3 py-2">Educación en Afectividad y Sexualidad</td>
                                    <td class="border border-gray-300 px-3 py-2">Todos</td>
                                    <td class="border border-gray-300 px-3 py-2">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2">-</td>
                                    <td class="border border-gray-300 px-3 py-2">$3.000.000,00</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$3.000.000,00</td>
                                </tr>
                                <tr class="bg-purple-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">Eje 3</td>
                                    <td class="border border-gray-300 px-3 py-2">Fortalecimiento Trayectorias</td>
                                    <td class="border border-gray-300 px-3 py-2">Arte en la escuela</td>
                                    <td class="border border-gray-300 px-3 py-2">Educación Obligatoria</td>
                                    <td class="border border-gray-300 px-3 py-2">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2">$5.000.000,00</td>
                                    <td class="border border-gray-300 px-3 py-2">$5.400.000,00</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$10.400.000,00</td>
                                </tr>

                                <!-- Eje 4 -->
                                <tr class="bg-orange-50/30">
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">Eje 4</td>
                                    <td class="border border-gray-300 px-3 py-2">Fortalecimiento equipos técnicos</td>
                                    <td class="border border-gray-300 px-3 py-2">Acciones transversales</td>
                                    <td class="border border-gray-300 px-3 py-2">Todos</td>
                                    <td class="border border-gray-300 px-3 py-2">Todas</td>
                                    <td class="border border-gray-300 px-3 py-2">$27.466.300,10</td>
                                    <td class="border border-gray-300 px-3 py-2">-</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$27.466.300,10</td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-gray-800 text-white">
                                <tr>
                                    <td colspan="5" class="border border-gray-300 px-3 py-2 text-right font-semibold">
                                        TOTAL
                                        GENERAL</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$116.637.920,50</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$36.031.840,75</td>
                                    <td class="border border-gray-300 px-3 py-2 font-semibold">$152.669.761,25</td>
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
@endsection
