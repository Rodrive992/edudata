@extends('layouts.app')

@section('title', 'Edudata - Educación Técnica')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-6">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <!-- Imagen centrada y responsiva -->
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-edutecnica.png') }}" alt="Educación Técnica"
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
                                    La <span class="font-semibold text-blue-700">Dirección Provincial de Educación Técnica,
                                        Agrotécnica y Formación Profesional</span>
                                    impulsa la <span class="bg-yellow-100 px-1 rounded">formación técnica especializada</span>
                                    que integra <span class="font-medium text-green-600">conocimientos científicos y
                                        tecnológicos</span>
                                    con las demandas del sector productivo provincial.
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
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Formación Técnica</p>
                                            <p class="text-xs text-gray-600 mt-1">Programas educativos integrales</p>
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
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Vinculación Productiva</p>
                                            <p class="text-xs text-gray-600 mt-1">Articulación con el sector productivo</p>
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
                                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Innovación Tecnológica</p>
                                            <p class="text-xs text-gray-600 mt-1">Equipamiento y centros especializados</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>Educación técnica
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>Formación agrotécnica
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>Vinculación productiva
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Educación Técnica -->
            <div class="p-4 md:p-6 pt-4">
                <!-- Presentación -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h2 class="text-lg md:text-xl font-semibold text-gray-800">Fortalecimiento de la Educación Técnica</h2>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4 md:mb-6 text-sm md:text-base">
                        Actividades la Dirección Provincial de Educación
                        Técnica, Agrotécnica y Formación Profesional durante el período 2025. Estas actividades se orientan
                        al
                        fortalecimiento de la educación técnica y agrotécnica en la provincia, a través de la articulación
                        con
                        distintos actores del sistema educativo, el sector productivo y otros ministerios, con el objetivo
                        de
                        garantizar una formación integral y de calidad para los estudiantes.
                    </p>

                    <!-- Botón para descargar el PDF -->
                    <div class="mt-4">
                        <a href="{{ asset('archivos/Programa39-Financiamiento.pdf') }}"
                            download="Programa39-Financiamiento.pdf"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 hover:bg-gray-700 border border-transparent rounded-lg font-semibold text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150 text-sm md:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Programa y Financiamiento
                        </a>
                    </div>
                </div>

                <!-- Acciones realizadas -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Acciones realizadas</h3>
                        </div>
                        <p class="text-xs md:text-sm text-gray-600 mt-1">Principales iniciativas desarrolladas durante 2025</p>
                    </div>

                    <div class="p-4 md:p-6 space-y-4 md:space-y-6">
                        <!-- Las 14 acciones con diseño mejorado -->
                        <!-- 1 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-blue-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-blue-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    1
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Congreso Nacional de Educación
                                    Técnica Agropecuaria – Encuentro Regional NOA</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Organización y desarrollo del congreso que reunió a instituciones educativas, sectores
                                    productivos y autoridades de la región NOA para fortalecer la educación técnica y
                                    agropecuaria.
                                </p>
                            </div>
                        </div>

                        <!-- 2 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-emerald-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-emerald-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    2
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Lanzamiento del Consejo
                                    Provincial de Educación, Trabajo y Producción (CoPETyP)</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Puesta en funcionamiento de un espacio de articulación entre el sistema educativo y el
                                    sector
                                    productivo, orientado a mejorar la empleabilidad de los egresados y fortalecer las
                                    prácticas
                                    profesionalizantes.</p>
                            </div>
                        </div>

                        <!-- 3 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-amber-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-amber-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    3
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Capacitación y articulación
                                    pedagógica y bienestar institucional</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Desarrollo de capacitaciones y encuentros con equipos directivos y docentes para mejorar
                                    la
                                    articulación pedagógica y fortalecer el bienestar institucional de las escuelas técnicas
                                    y
                                    agrotécnicas de la provincia.</p>
                            </div>
                        </div>

                        <!-- 4 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-purple-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-purple-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    4
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Acompañamiento territorial del
                                    equipo técnico de la Dirección</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Visitas periódicas a las instituciones educativas para brindar asesoramiento, seguimiento
                                    y apoyo
                                    en la gestión académica y administrativa.</p>
                            </div>
                        </div>

                        <!-- 5 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-red-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-red-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    5
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Jornada en la Escuela
                                    Agrotécnica de Huaco – Semana de la Educación Agropecuaria</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Realización de actividades en el marco de la semana de la educación agropecuaria,
                                    fortaleciendo
                                    el vínculo entre la escuela y su entorno productivo.</p>
                            </div>
                        </div>

                        <!-- 6 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-indigo-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-indigo-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    6
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Acompañamiento en el
                                    aniversario 80 de la Escuela de Minería</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Participación y apoyo institucional en la conmemoración del 80° aniversario de la Escuela
                                    de
                                    Minería, reconociendo su trayectoria y aporte a la educación técnica provincial.</p>
                            </div>
                        </div>

                        <!-- 7 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-pink-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-pink-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    7
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Intervenciones ante
                                    situaciones complejas</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Acciones inmediatas y coordinadas ante situaciones problemáticas en escuelas técnicas y
                                    agrotécnicas, garantizando la continuidad pedagógica y el bienestar de la comunidad
                                    educativa.
                                </p>
                            </div>
                        </div>

                        <!-- 8 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-teal-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-teal-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    8
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Firma de convenios con
                                    empresas</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Celebración de convenios con empresas para la realización de prácticas profesionalizantes
                                    de los
                                    estudiantes de 7° año de tres escuelas técnicas y agrotécnicas, fortaleciendo la
                                    vinculación
                                    escuela-trabajo.</p>
                            </div>
                        </div>

                        <!-- 9 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-orange-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-orange-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    9
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Articulación interministerial</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Trabajo conjunto con el Ministerio de Salud, Ministerio de Desarrollo Social y Ministerio
                                    de
                                    Desarrollo Productivo para implementar políticas integrales que impacten en la educación
                                    técnica
                                    y agrotécnica.</p>
                            </div>
                        </div>

                        <!-- 10 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-cyan-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-cyan-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    10
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Asistencia a Mesas Federales
                                    INET</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Participación en reuniones federales convocadas por el INET, representando a la provincia
                                    y
                                    gestionando recursos y programas destinados a la educación técnica.</p>
                            </div>
                        </div>

                        <!-- 11 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-lime-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-lime-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    11
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Reunión con centros de
                                    estudiantes</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Encuentro con representantes de centros de estudiantes de escuelas técnicas y
                                    agrotécnicas para
                                    fortalecer la participación estudiantil y promover el liderazgo juvenil.</p>
                            </div>
                        </div>

                        <!-- 12 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-fuchsia-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-fuchsia-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    12
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Inauguración del Centro
                                    Integral de Manejo Bovino</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Habilitación de un espacio destinado a la formación práctica de estudiantes en la Escuela
                                    Agroganadera Fray Vicente Alcaraz, con tecnología y equipamiento para el manejo integral
                                    de la
                                    producción bovina.</p>
                            </div>
                        </div>

                        <!-- 13 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-rose-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-rose-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    13
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Acompañamiento en el Rally del
                                    Poncho 2025</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Apoyo y asistencia a la participación de estudiantes de la EPET N° 6 en el Rally del
                                    Poncho,
                                    promoviendo la aplicación de conocimientos técnicos en eventos de relevancia provincial.
                                </p>
                            </div>
                        </div>

                        <!-- 14 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-violet-50/80 border-b border-gray-200 flex items-center">
                                <div
                                    class="bg-violet-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">
                                    14
                                </div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">Apoyo técnico a instituciones
                                    educativas</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p>Asistencia de las escuelas técnicas a escuelas primarias, secundarias y jardines de
                                    infantes
                                    mediante proyectos y trabajos orientados a la mejora y mantenimiento de las
                                    instalaciones
                                    edilicias, fortaleciendo la comunidad educativa y promoviendo el aprendizaje basado en
                                    proyectos.</p>
                            </div>
                        </div>

                        <div class="mt-4 text-xs md:text-sm text-gray-600">
                            <p class="text-center italic">Resumen ejecutivo de las principales acciones desarrolladas durante 2025</p>
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