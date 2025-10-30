@extends('layouts.app')

@section('title', 'Edudata - Innovación Educativa')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-6">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <!-- Imagen centrada y responsiva -->
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-innovacion.png') }}" 
                         alt="Innovación Educativa" 
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
                                    La <span class="font-semibold text-blue-700">Secretaría de Innovación Educativa</span> 
                                    impulsa la transformación digital
                                    del sistema educativo provincial mediante la integración de inteligencia artificial y tecnologías emergentes
                                    que potencian los procesos de enseñanza y aprendizaje.
                                </p>
                            </div>

                            <!-- Características en grid mejorado -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Inteligencia Artificial</p>
                                            <p class="text-xs text-gray-600 mt-1">Formación en IA para docentes</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 2 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-cyan-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Alfabetización Digital</p>
                                            <p class="text-xs text-gray-600 mt-1">Competencias digitales integrales</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 3 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Innovación Sostenible</p>
                                            <p class="text-xs text-gray-600 mt-1">Tecnología y conciencia ambiental</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                    Inteligencia artificial
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    Alfabetización digital
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                    Innovación sostenible
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Innovación Educativa -->
            <div class="p-4 md:p-6 pt-4">
                <!-- Presentación mejorada -->
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
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Secretaría de Innovación Educativa</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            Desde mayo de 2025, la Secretaría de Innovación Educativa del Ministerio de Educación de Catamarca 
                            impulsa acciones para integrar la inteligencia artificial y la educación digital en el sistema educativo, 
                            promoviendo la innovación pedagógica y la formación continua en toda la provincia.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Nuestra visión</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            Construir un ecosistema educativo inteligente, inclusivo y sostenible, combinando innovación
                            tecnológica y pedagógica, fortalecimiento docente, participación activa de las familias y una gestión respaldada
                            por datos en tiempo real para transformar la educación catamarqueña.
                        </p>
                    </div>
                </div>

                <!-- Programas y acciones mejorado -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Programas y acciones</h3>
                        </div>
                        <p class="text-xs md:text-sm text-gray-600 mt-1">Primeras iniciativas y resultados iniciales.</p>
                    </div>

                    <div class="p-4 md:p-6 space-y-4 md:space-y-6">
                        <!-- 1 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-blue-50/80 border-b border-gray-200 flex items-center">
                                <div class="bg-blue-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">1</div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">"Educar en la era de la IA: oportunidades y desafíos para el sistema educativo provincial"</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p class="mb-2">
                                    En alianza con <strong>Fundación Konrad Adenauer</strong> y <strong>ACEP Catamarca</strong>,
                                    fue la apertura oficial de la Secretaría
                                    con la disertación del <strong>Mg. Rolando Muzzin</strong>. Se abordaron los desafíos de la
                                    IA en educación y se brindaron
                                    recursos prácticos para el aula.
                                </p>
                                <div class="bg-blue-100 p-3 rounded-lg mt-3">
                                    <p class="text-blue-800 font-semibold text-sm md:text-base"><strong>716</strong> docentes, directivos y referentes educativos capacitados en capital y en el departamento Belén.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 2 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-green-50/80 border-b border-gray-200 flex items-center">
                                <div class="bg-green-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">2</div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">"La IA como aliada en la planificación áulica"</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p class="mb-2">
                                    Taller práctico para docentes de todos los niveles y modalidades, enfocado en la aplicación concreta de herramientas de IA en la planificación didáctica.
                                </p>
                                <div class="bg-green-100 p-3 rounded-lg mt-3">
                                    <p class="text-green-800 font-semibold text-sm md:text-base"><strong>1.200</strong> docentes capacitados en modalidad presencial y virtual.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 3 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-purple-50/80 border-b border-gray-200 flex items-center">
                                <div class="bg-purple-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">3</div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">"Familias Conectadas"</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p class="mb-2">
                                    Ciclo de charlas para familias sobre uso responsable de la tecnología, redes sociales e inteligencia artificial, promoviendo la participación familiar en la educación digital.
                                </p>
                                <div class="bg-purple-100 p-3 rounded-lg mt-3">
                                    <p class="text-purple-800 font-semibold text-sm md:text-base"><strong>800</strong> familias participaron activamente en los encuentros.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 4 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-4 md:px-5 py-3 md:py-4 bg-orange-50/80 border-b border-gray-200 flex items-center">
                                <div class="bg-orange-600 text-white rounded-full h-7 w-7 md:h-8 md:w-8 flex items-center justify-center mr-3 text-sm md:text-base">4</div>
                                <h4 class="text-sm md:text-base font-semibold text-gray-800">"Innovación Sostenible"</h4>
                            </div>
                            <div class="px-4 md:px-5 py-3 md:py-4 text-gray-700 leading-relaxed text-sm md:text-base">
                                <p class="mb-2">
                                    Concurso provincial que promueve proyectos educativos que integran tecnología y conciencia ambiental, fomentando soluciones creativas para el cuidado del planeta.
                                </p>
                                <div class="bg-orange-100 p-3 rounded-lg mt-3">
                                    <p class="text-orange-800 font-semibold text-sm md:text-base"><strong>45</strong> proyectos escolares innovadores presentados por estudiantes de toda la provincia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Impacto global mejorado -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-green-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Impacto global en el período</h3>
                        </div>
                        <p class="text-xs md:text-sm text-gray-600 mt-1">Resultados alcanzados en menos de cuatro meses.</p>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
                            <div class="bg-blue-50 p-4 md:p-5 rounded-lg border border-blue-100">
                                <div class="flex items-center mb-3">
                                    <div class="bg-blue-600 text-white rounded-full h-8 w-8 md:h-10 md:w-10 flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-base md:text-lg font-semibold text-blue-800">Alcance de capacitación</h4>
                                </div>
                                <p class="text-blue-900 text-2xl md:text-3xl font-bold">+6.000</p>
                                <p class="text-blue-700 text-sm md:text-base">personas capacitadas en toda la provincia</p>
                            </div>

                            <div class="bg-purple-50 p-4 md:p-5 rounded-lg border border-purple-100">
                                <div class="flex items-center mb-3">
                                    <div class="bg-purple-600 text-white rounded-full h-8 w-8 md:h-10 md:w-10 flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </div>
                                    <h4 class="text-base md:text-lg font-semibold text-purple-800">Proyectos en marcha</h4>
                                </div>
                                <p class="text-purple-900 text-2xl md:text-3xl font-bold">45</p>
                                <p class="text-purple-700 text-sm md:text-base">proyectos escolares innovadores</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-200">
                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-3">Logros destacados</h4>
                            <ul class="list-disc pl-5 md:pl-6 space-y-2 text-gray-800 text-sm md:text-base">
                                <li>Participación de equipos de conducción, docentes, familias, niños, niñas y adolescentes de distintos departamentos.</li>
                                <li>Fortalecimiento de competencias digitales y creación de redes de trabajo colaborativo.</li>
                                <li>Primeros pasos para consolidar un modelo educativo innovador, ético y sostenible.</li>
                                <li>Establecimiento de alianzas estratégicas con organizaciones nacionales e internacionales.</li>
                            </ul>
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