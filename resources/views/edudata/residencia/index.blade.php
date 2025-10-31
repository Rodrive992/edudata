@extends('layouts.app')

@section('title', 'Edudata - Residencia Universitaria')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-6">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-residencia.png') }}" 
                         alt="Residencia Universitaria" 
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
                                    La <span class="font-semibold text-blue-700">Dirección Provincial Residencia Universitaria</span> 
                                    gestiona la <span class="bg-yellow-100 px-1 rounded">Residencia "Abuelas Plaza de Mayo"</span> 
                                    que brinda alojamiento y servicios integrales a <span class="font-medium text-green-600">estudiantes del interior provincial</span>, 
                                    promoviendo la igualdad de oportunidades en el acceso a la educación superior.
                                </p>
                            </div>

                            <!-- Características en grid mejorado -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Alojamiento Estudiantil</p>
                                            <p class="text-xs text-gray-600 mt-1">40 habitaciones amobladas</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 2 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-cyan-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Becas RUP</p>
                                            <p class="text-xs text-gray-600 mt-1">Apoyo económico para estudiantes</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 3 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Servicios Integrales</p>
                                            <p class="text-xs text-gray-600 mt-1">Alimentación completa y áreas de estudio</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                    Alojamiento estudiantil
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    Becas RUP
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                    Servicios integrales
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Residencia Universitaria -->
            <div class="p-4 md:p-6 pt-4">
                <!-- Reseña histórica con imagen - ADAPTADA -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6 mb-6">
                    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Reseña Histórica</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            La residencia provincial "Abuelas Plaza de Mayo" es creada en el año 2015, constituyendo un
                            emplazamiento estructural destinado a albergar a jóvenes del interior provincial Catamarqueño que deseen
                            iniciar o continuar sus estudios superiores en el ámbito de la Universidad Nacional de Catamarca.
                        </p>
                        <p class="text-gray-700 leading-relaxed mt-3 text-sm md:text-base">
                            Su creación responde a una demanda real que es atendida a través de edificios de índole privado, lo cual
                            constituía un posicionamiento desigual para quienes no contaban con las posibilidades económicas para
                            afrontar los gastos que ello implica.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <img src="{{ asset('images/residencia.jpg') }}" 
                             alt="Residencia Universitaria Abuelas de Plaza de Mayo"
                             class="w-full h-48 md:h-64 object-cover">
                    </div>
                </div>

                <!-- Objetivo y Misión -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-6">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-green-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Objetivo y Misión</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            La residencia tiene como misión promover la igualdad de oportunidades a través de la implementación de
                            un sistema de becas (BECAS RUP) que permita a los alumnos de escasos recursos económicos y que posean
                            buen nivel académico y regularidad en sus estudios, siempre que la carrera elegida no se encuentre
                            disponible como oferta académica en el lugar de origen.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Infraestructura</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            La residencia cuenta con entrada principal, recepción, comedor, cocina, baños, 40 habitaciones amobladas
                            cada una con su baño personal, sala de estudio, biblioteca, lavadero, terraza, patio y playón
                            multideportivos. Durante 2023-2024 se realizó una refacción completa que incluyó techos, paredes,
                            ventanas, sistemas eléctricos y de aire acondicionado.
                        </p>
                    </div>
                </div>

                <!-- Infraestructura y Servicios -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-purple-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Infraestructura y Servicios</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="text-gray-700 text-sm md:text-base mb-4 md:mb-6">
                            <p class="mb-4">
                                La residencia cuenta con entrada principal, recepción, comedor, cocina, baños, 40 habitaciones amobladas
                                cada una con su baño personal, sala de estudio, biblioteca, lavadero, terraza, patio y playón
                                multideportivos.
                            </p>
                            <p>
                                Durante 2023-2024 se realizó una refacción completa que incluyó techos, paredes, ventanas,
                                sistemas eléctricos y de aire acondicionado.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div class="bg-purple-50 p-4 md:p-5 rounded-lg border border-purple-100">
                                <h4 class="text-base md:text-lg font-semibold text-purple-800 mb-3">Servicios Incluidos</h4>
                                <ul class="list-disc pl-5 space-y-2 text-purple-700 text-sm md:text-base">
                                    <li>Agua potable, electricidad y gas</li>
                                    <li>Internet de alta velocidad</li>
                                    <li>Servicio de catering completo</li>
                                    <li>Sistema de seguridad 24/7</li>
                                </ul>
                            </div>

                            <div class="bg-green-50 p-4 md:p-5 rounded-lg border border-green-100">
                                <h4 class="text-base md:text-lg font-semibold text-green-800 mb-3">Servicio de Catering</h4>
                                <ul class="list-disc pl-5 space-y-2 text-green-700 text-sm md:text-base">
                                    <li>Desayuno completo</li>
                                    <li>Almuerzo balanceado</li>
                                    <li>Merienda nutritiva</li>
                                    <li>Cena variada</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Becas RUP -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Becas RUP - Sistema de Becas</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-6">
                            <div class="bg-blue-50 p-4 md:p-5 rounded-lg border border-blue-100">
                                <h4 class="text-base md:text-lg font-semibold text-blue-800 mb-3">Proceso de Selección</h4>
                                <p class="text-blue-700 text-sm md:text-base mb-3">
                                    Durante los meses de diciembre a febrero se abre un formulario de preinscripción donde se
                                    solicitan datos personales, socioeconómicos y académicos, los cuales son analizados por la
                                    comisión evaluadora de la RUP.
                                </p>
                                <p class="text-blue-700 text-sm md:text-base">
                                    La evaluación se realiza conforme a un sistema de puntaje diferencial, teniendo en cuenta
                                    variables socioeconómicas y académicas.
                                </p>
                            </div>

                            <div class="bg-pink-50 p-4 md:p-5 rounded-lg border border-pink-100">
                                <h4 class="text-base md:text-lg font-semibold text-pink-800 mb-3">Criterios de Evaluación</h4>
                                <ul class="list-disc pl-5 space-y-2 text-pink-700 text-sm md:text-base">
                                    <li>Acreditar ingresos familiares ≤ 3 salarios mínimos</li>
                                    <li>Ser del interior de la provincia de Catamarca</li>
                                    <li>Condición laboral de los aportantes del hogar</li>
                                    <li>Edad del postulante</li>
                                    <li>Promedio académico obtenido</li>
                                    <li>Carreras estratégicas y regularidad académica</li>
                                </ul>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-200">
                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-3">Mantenimiento del Beneficio</h4>
                            <p class="text-gray-700 mb-3 text-sm md:text-base">Evaluado semestralmente considerando:</p>
                            <ul class="list-disc pl-5 space-y-2 text-gray-700 text-sm md:text-base">
                                <li>Permanencia de las condiciones que justificaron el otorgamiento</li>
                                <li>Condición de estudiante regular en el 75% de las asignaturas</li>
                                <li>Aprobar el 60% de las asignaturas inscriptas anualmente</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Estadísticas de Residentes -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-orange-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Estadísticas de Residentes</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-6">
                            <div class="bg-blue-50 p-3 md:p-4 rounded-lg border border-blue-100">
                                <p class="text-blue-900 text-xl md:text-2xl font-bold">85</p>
                                <p class="text-blue-700 font-medium text-sm md:text-base">Estudiantes Residentes Actuales</p>
                                <p class="text-blue-600 text-xs md:text-sm mt-1">Varones y mujeres de todos los departamentos</p>
                            </div>
                            <div class="bg-green-50 p-3 md:p-4 rounded-lg border border-green-100">
                                <p class="text-green-900 text-xl md:text-2xl font-bold">8</p>
                                <p class="text-green-700 font-medium text-sm md:text-base">Estudiantes Recibidos Recientemente</p>
                                <p class="text-green-600 text-xs md:text-sm mt-1">Proyección de 13 para fin de año</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-200">
                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-3">Carreras que Cursan los Residentes</h4>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 md:gap-3 text-xs md:text-sm">
                                <div class="bg-white p-2 rounded border border-gray-200">Tec. en Procesamiento de Salmuera y Litio</div>
                                <div class="bg-white p-2 rounded border border-gray-200">Lic. en Administración</div>
                                <div class="bg-white p-2 rounded border border-gray-200">Profesorado en Inglés</div>
                                <div class="bg-white p-2 rounded border border-gray-200">Tec. en Hemoterapia</div>
                                <div class="bg-white p-2 rounded border border-gray-200">Prof. en Matemáticas</div>
                                <div class="bg-white p-2 rounded border border-gray-200">Relaciones Internacionales</div>
                                <div class="bg-white p-2 rounded border border-gray-200">Contador Público</div>
                                <div class="bg-white p-2 rounded border border-gray-200">Abogacía</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Personal -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-purple-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Personal de la Residencia</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4">
                            <div class="bg-white p-3 md:p-4 rounded-lg border border-gray-200">
                                <h4 class="font-semibold text-blue-700 text-sm md:text-base">Director</h4>
                                <p class="text-gray-700 text-xs md:text-sm">Abogado y Profesor Alejandro Bambicha</p>
                            </div>
                            <div class="bg-white p-3 md:p-4 rounded-lg border border-gray-200">
                                <h4 class="font-semibold text-blue-700 text-sm md:text-base">Supervisión Académica</h4>
                                <p class="text-gray-700 text-xs md:text-sm">Lic. Luz Pizarro</p>
                            </div>
                            <div class="bg-white p-3 md:p-4 rounded-lg border border-gray-200">
                                <h4 class="font-semibold text-blue-700 text-sm md:text-base">Coordinación y Control</h4>
                                <p class="text-gray-700 text-xs md:text-sm">Claudia Bambicha</p>
                            </div>
                            <div class="bg-white p-3 md:p-4 rounded-lg border border-gray-200">
                                <h4 class="font-semibold text-blue-700 text-sm md:text-base">Jefe de Personal</h4>
                                <p class="text-gray-700 text-xs md:text-sm">Mariano Cuello</p>
                            </div>
                            <div class="bg-white p-3 md:p-4 rounded-lg border border-gray-200">
                                <h4 class="font-semibold text-blue-700 text-sm md:text-base">Encargadas de Recepción</h4>
                                <p class="text-gray-700 text-xs md:text-sm">María Catalina Constantini / Verónica Galván</p>
                            </div>
                            <div class="bg-white p-3 md:p-4 rounded-lg border border-gray-200">
                                <h4 class="font-semibold text-blue-700 text-sm md:text-base">Supervisión Nutricional</h4>
                                <p class="text-gray-700 text-xs md:text-sm">Lic. Mirian Flores</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Normativa -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-red-100 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h2 class="text-lg md:text-xl font-semibold text-gray-800">Normativa Aplicable</h2>
                    </div>

                    <div class="pl-0 md:pl-12">
                        <ul class="list-disc pl-5 space-y-2 text-gray-700 text-sm md:text-base">
                            <li><strong>Decreto Acuerdo N.º 1068/15</strong>, publicado en el B.O. N.º 87/15: determina la creación,
                                objetivos y fines del establecimiento.</li>
                            <li><strong>Anexo II del Decreto Acuerdo N.º 1068/15</strong>: Reglamento General de Acceso, Permanencia
                                y Egreso a la RUP.</li>
                        </ul>

                        <div class="mt-4 md:mt-6 bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <p class="text-blue-800 font-semibold text-sm md:text-base">Importante:</p>
                            <p class="text-blue-700 mt-2 text-sm md:text-base">Todos los servicios y beneficios que brinda la Residencia Universitaria
                                Provincial "Abuelas de Plaza de Mayo" son completamente gratuitos para los y las estudiantes
                                residentes.</p>
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