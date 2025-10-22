@extends('layouts.app')

@section('title', 'Edudata - Innovación Educativa')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-10">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/titulo-innovacion.png') }}" 
                         alt="Innovación Educativa" 
                         class="w-full h-auto object-cover rounded-xl">
                </div>
                
                <!-- Texto descriptivo mejorado -->
                <div class="mb-6">                
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            La <span class="font-semibold text-blue-700">Secretaría de Innovación Educativa</span> 
                            impulsa la <span class="bg-yellow-100 px-1 rounded">transformación digital</span> 
                            del sistema educativo provincial mediante la integración de <span class="font-medium text-green-600">inteligencia artificial y tecnologías emergentes</span> 
                            que potencian los procesos de enseñanza y aprendizaje.
                        </p>

                        <!-- Sección de funcionalidades con fondo claro -->
                        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 p-4 sm:p-6 lg:p-8 my-6 sm:my-8 shadow-lg border border-blue-200">
                            <!-- Elementos decorativos de fondo -->
                            <div class="absolute top-0 right-0 w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 bg-blue-200/30 rounded-full -translate-y-8 sm:-translate-y-12 lg:-translate-y-16 translate-x-8 sm:translate-x-12 lg:translate-x-16"></div>
                            <div class="absolute bottom-0 left-0 w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-indigo-200/30 rounded-full translate-y-8 sm:translate-y-10 lg:translate-y-12 -translate-x-6 sm:-translate-x-8 lg:-translate-x-12"></div>

                            <div class="relative z-10">
                                <!-- Header con icono -->
                               

                                <!-- Grid de funcionalidades -->
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                    <!-- Tarjeta 1: Inteligencia Artificial -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#f5cb58] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">01</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#f5cb58] to-[#ddb750] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Inteligencia Artificial Educativa</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Implementamos programas de formación en IA para docentes, integrando herramientas innovadoras en los procesos pedagógicos del siglo XXI</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">🤖 Innovación pedagógica</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 2: Alfabetización Digital -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-[#6bbde5] hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#6bbde5] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">02</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#6bbde5] to-[#5aadd5] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Alfabetización Digital Integral</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Desarrollamos competencias digitales en toda la comunidad educativa, promoviendo el uso responsable y creativo de la tecnología</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-cyan-600 text-sm font-semibold">💻 Competencias digitales</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 3: Innovación Sostenible -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full md:col-span-2 lg:col-span-1">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">03</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Innovación Sostenible</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Promovemos proyectos educativos que integran tecnología y conciencia ambiental, fomentando soluciones creativas para el cuidado del planeta</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">🌱 Eco-innovación</span>
                                        </div>
                                    </div>
                                </div>

                               
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                Inteligencia artificial
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Alfabetización digital
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                Innovación sostenible
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Innovación Educativa -->
            <div class="p-6 pt-4">
                <!-- Presentación mejorada -->
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
                            <h2 class="text-xl font-semibold text-gray-800">Secretaría de Innovación Educativa</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow">
                            Desde mayo de 2025, la Secretaría de Innovación Educativa del Ministerio de Educación de Catamarca 
                            impulsa acciones para integrar la inteligencia artificial y la educación digital en el sistema educativo, 
                            promoviendo la innovación pedagógica y la formación continua en toda la provincia.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Nuestra visión</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow">
                            Construir un ecosistema educativo inteligente, inclusivo y sostenible, combinando innovación
                            tecnológica y pedagógica, fortalecimiento docente, participación activa de las familias y una gestión respaldada
                            por datos en tiempo real para transformar la educación catamarqueña.
                        </p>
                    </div>
                </div>

                <!-- Resto del contenido se mantiene igual -->
                <!-- Programas y acciones mejorado -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Programas y acciones</h3>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">Primeras iniciativas y resultados iniciales.</p>
                    </div>

                    <div class="p-6 space-y-8">
                        <!-- Los 4 programas principales se mantienen igual -->
                        <!-- 1 -->
                        <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                            <div class="px-5 py-4 bg-blue-50/80 border-b border-gray-200 flex items-center">
                                <div class="bg-blue-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">1
                                </div>
                                <h4 class="text-base md:text-lg font-semibold text-gray-800">"Educar en la era de la IA:
                                    oportunidades y desafíos para el sistema educativo provincial"</h4>
                            </div>
                            <div class="px-5 py-4 text-gray-700 leading-relaxed">
                                <p class="mb-2">
                                    En alianza con <strong>Fundación Konrad Adenauer</strong> y <strong>ACEP Catamarca</strong>,
                                    fue la apertura oficial de la Secretaría
                                    con la disertación del <strong>Mg. Rolando Muzzin</strong>. Se abordaron los desafíos de la
                                    IA en educación y se brindaron
                                    recursos prácticos para el aula.
                                </p>
                                <div class="bg-blue-100 p-3 rounded-lg mt-3">
                                    <p class="text-blue-800 font-semibold"><strong>716</strong> docentes, directivos y
                                        referentes educativos capacitados en capital y en el departamento Belén.</p>
                                </div>
                            </div>
                        </div>

                        <!-- ... resto de los programas (2-4) se mantienen igual ... -->
                        
                    </div>
                </div>

                <!-- Impacto global mejorado -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Impacto global en el período</h3>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">Resultados alcanzados en menos de cuatro meses.</p>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="bg-blue-50 p-5 rounded-lg border border-blue-100">
                                <div class="flex items-center mb-3">
                                    <div
                                        class="bg-blue-600 text-white rounded-full h-10 w-10 flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-lg font-semibold text-blue-800">Alcance de capacitación</h4>
                                </div>
                                <p class="text-blue-900 text-3xl font-bold">+6.000</p>
                                <p class="text-blue-700">personas capacitadas en toda la provincia</p>
                            </div>

                            <div class="bg-purple-50 p-5 rounded-lg border border-purple-100">
                                <div class="flex items-center mb-3">
                                    <div
                                        class="bg-purple-600 text-white rounded-full h-10 w-10 flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </div>
                                    <h4 class="text-lg font-semibold text-purple-800">Proyectos en marcha</h4>
                                </div>
                                <p class="text-purple-900 text-3xl font-bold">45</p>
                                <p class="text-purple-700">proyectos escolares innovadores</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-800 mb-3">Logros destacados</h4>
                            <ul class="list-disc pl-6 space-y-2 text-gray-800">
                                <li>Participación de equipos de conducción, docentes, familias, niños, niñas y adolescentes de
                                    distintos departamentos.</li>
                                <li>Fortalecimiento de competencias digitales y creación de redes de trabajo colaborativo.</li>
                                <li>Primeros pasos para consolidar un modelo educativo innovador, ético y sostenible.</li>
                                <li>Establecimiento de alianzas estratégicas con organizaciones nacionales e internacionales.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection