@extends('layouts.app')

@section('title', 'Edudata - Organigrama Ministerial')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-10">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/titulo-organigrama.png') }}" 
                         alt="Organigrama Ministerial" 
                         class="w-full h-auto object-cover rounded-xl">
                </div>
                
                <!-- Texto descriptivo mejorado -->
                <div class="mb-6">                
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            El <span class="font-semibold text-blue-700">Ministerio de Educación, Ciencia y Tecnología</span> 
                            de Catamarca está compuesto por diversas <span class="bg-yellow-100 px-1 rounded">secretarías y direcciones provinciales</span> 
                            que trabajan de manera coordinada para garantizar una <span class="font-medium text-green-600">educación de calidad</span> 
                            en todos los niveles y modalidades del sistema educativo provincial.
                        </p>

                        <!-- Sección de funcionalidades con fondo claro -->
                        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 p-4 sm:p-6 lg:p-8 my-6 sm:my-8 shadow-lg border border-blue-200">
                            <!-- Elementos decorativos de fondo -->
                            <div class="absolute top-0 right-0 w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 bg-blue-200/30 rounded-full -translate-y-8 sm:-translate-y-12 lg:-translate-y-16 translate-x-8 sm:translate-x-12 lg:translate-x-16"></div>
                            <div class="absolute bottom-0 left-0 w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-indigo-200/30 rounded-full translate-y-8 sm:translate-y-10 lg:translate-y-12 -translate-x-6 sm:-translate-x-8 lg:-translate-x-12"></div>

                            <div class="relative z-10">
                                <!-- Grid de funcionalidades -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                                    <!-- Tarjeta 1: Estructura Organizativa -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#f5cb58] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">01</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#f5cb58] to-[#ddb750] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Estructura Organizativa</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Organización compuesta por secretarías y direcciones provinciales especializadas en cada área educativa</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">🏛️ Estructura ministerial</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 2: Equipo de Gestión -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-[#6bbde5] hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#6bbde5] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">02</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#6bbde5] to-[#5aadd5] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Equipo de Gestión</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Liderado por el Ministro Nicolás Rosales Matienzo con un equipo de secretarios y directores especializados</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-cyan-600 text-sm font-semibold">👥 Liderazgo especializado</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 3: Coordinación Articulada -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">03</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Coordinación Articulada</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Trabajo conjunto entre áreas para implementar políticas educativas innovadoras y de calidad</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">🔄 Trabajo en equipo</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                Estructura organizativa
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Equipo de gestión
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                Coordinación articulada
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico del Organigrama -->
            <div class="p-6 pt-4">
                <!-- Nivel Ministerial -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                        <div class="flex items-center gap-3">
                            <div class="bg-blue-100 p-2 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-blue-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Nivel Ministerial</h3>
                                <p class="text-gray-600 text-sm">Liderazgo y dirección general del Ministerio</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="bg-blue-50 p-6 rounded-lg border border-blue-100 mb-6">
                            <h4 class="text-lg font-semibold text-blue-800 mb-3">Ministro</h4>
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div class="flex-1">
                                    <p class="text-blue-900 font-bold text-xl">Nicolás Rosales Matienzo</p>
                                    <p class="text-blue-700">Pabellón N° 11 - CAPE</p>
                                    <p class="text-blue-600">educacion@catamarca.edu.ar</p>
                                </div>
                                <div class="bg-white px-4 py-2 rounded-lg border border-blue-200">
                                    <span class="text-blue-700 font-medium text-sm">Liderazgo Ministerial</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Secretarías -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-teal-50">
                        <div class="flex items-center gap-3">
                            <div class="bg-green-100 p-2 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Secretarías</h3>
                                <p class="text-gray-600 text-sm">Áreas estratégicas de gestión educativa</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @php
                                $secretarias = [
                                    ['t' => 'Innovación Educativa', 'n' => 'Cesar Garetto', 'l' => 'Pabellón N° 13 - CAPE', 'e' => 'innovacion@catamarca.edu.ar'],
                                    ['t' => 'Articulación Institucional', 'n' => 'Milena Chasampi Rios', 'l' => 'Pabellón N° 15 - CAPE', 'e' => 'innovacion@catamarca.edu.ar'],
                                    ['t' => 'Planeamiento Educativo', 'n' => 'Angela Sonia Aibar', 'l' => 'Pabellón N° 11 - CAPE', 'e' => 'planeamiento@catamarca.edu.ar'],
                                    ['t' => 'Educación', 'n' => 'Roxana María Inés Monasterio', 'l' => 'Pabellón N° 12 - CAPE', 'e' => 'innovacion@catamarca.edu.ar'],
                                    ['t' => 'Ciencia y Tecnología', 'n' => 'Luis Rafael Castro', 'l' => 'Pabellón N° 11 - CAPE', 'e' => 'innovacion@catamarca.edu.ar'],
                                ];
                            @endphp

                            @foreach ($secretarias as $s)
                                <div class="bg-green-50 p-5 rounded-lg border border-green-100 hover:border-green-300 transition-all duration-200 hover:shadow-md">
                                    <h4 class="text-lg font-semibold text-green-800 mb-2">{{ $s['t'] }}</h4>
                                    <div class="space-y-2">
                                        <p class="text-green-900 font-semibold flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            {{ $s['n'] }}
                                        </p>
                                        <p class="text-green-700 text-sm flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $s['l'] }}
                                        </p>
                                        <p class="text-green-600 text-sm flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            {{ $s['e'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Direcciones Provinciales -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-indigo-50">
                        <div class="flex items-center gap-3">
                            <div class="bg-purple-100 p-2 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Direcciones Provinciales</h3>
                                <p class="text-gray-600 text-sm">Áreas especializadas de implementación y gestión</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @php
                                $direcciones = [
                                    ['t'=>'Inteligencia Artificial y Alfabetización Digital','n'=>'Deborah Nancy Dumitru','l'=>'Pabellón N° 13 - CAPE','e'=>'dirinteligenciaartificial@catamarca.edu.ar'],
                                    ['t'=>'Despacho','n'=>'Guillermo Eduardo Osella','l'=>'Pabellón N° 11 - CAPE','e'=>'mesadeentradas-despacho@catamarca.edu.ar'],
                                    ['t'=>'Sumario Docente','n'=>'Samhara Saleme','l'=>'Pabellón N° 12 - CAPE','e'=>'dirsumariodocente@catamarca.gov.ar'],
                                    ['t'=>'Asuntos Jurídicos','n'=>'Carolina del Valle Reynoso','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Programación y Mantenimiento Edilicio','n'=>'Silvia Inés Zalazar','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Transparencia Activa','n'=>'Renzo Augusto Gonzalez','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Unidad Ejecutora de Programas y Proyectos','n'=>'Victoria María Gonzalez Rojas','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Administración','n'=>'Lucas Rojas','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Parque Automotor','n'=>'Cristian Eduardo Agüero Arreguez','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Desarrollo Profesional y Evaluación Educativa','n'=>'Melisa Ludmila Schonhals','l'=>'Pabellón N° 11 - CAPE','e'=>'capacitacion@catamarca.edu.ar'],
                                    ['t'=>'Estadística Educativa y Análisis Poblacional','n'=>'Ivana Elizabeth Herrera','l'=>'Pabellón N° 11 - CAPE','e'=>'estadistica@catamarca.edu.ar'],
                                    ['t'=>'Educación Inicial','n'=>'Flavia Vanesa Chasampi','l'=>'Pabellón N° 13 - CAPE','e'=>'educacioninicial@catamarca.edu.ar'],
                                    ['t'=>'Educación Primaria','n'=>'León Camij','l'=>'Pabellón N° 14 - CAPE','e'=>'educacionprimaria@catamarca.edu.ar'],
                                    ['t'=>'Educación Secundaria','n'=>'Andrea María Silvina Perea','l'=>'Pabellón N° 13 - CAPE','e'=>'educacionsecundaria@catamarca.edu.ar'],
                                    ['t'=>'Educación Superior','n'=>'Cintia Brizuela','l'=>'Pabellón N° 13 - CAPE','e'=>'educacionsuperior@catamarca.edu.ar'],
                                    ['t'=>'Modalidades Educativas','n'=>'Fuente, Andrea Julieta','l'=>'Pabellón N° 14 - CAPE','e'=>'modalidadeseducativas@catamarca.edu.ar'],
                                    ['t'=>'Educación de Gestión Municipal Privada, Social y Cooperativa','n'=>'Pablo Javier Figueroa','l'=>'Pabellón N° 13 - CAPE','e'=>'educacionprivadaymunicipal@catamarca.edu.ar'],
                                    ['t'=>'Educación Técnica, Agrotécnica y Formación Profesional','n'=>'Matías Andrés Cabrera','l'=>'Pabellón N° 26 - CAPE','e'=>'educaciontecnicaagrotecticayfp@catamarca.edu.ar'],
                                    ['t'=>'Startups y Ecosistema Emprendedor','n'=>'Ivanna Alejandra del V. Altamiranda','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Ciencia Aplicada y Formación Tecnológica','n'=>'María Luz Diaz Rodriguez','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Transformación Digital e Infraestructura Tecnológica','n'=>'Carlos David Ponce','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Legalización y Registro de Títulos','n'=>'Julio Rubén Quiroga','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Residencia Universitaria','n'=>'Alejandro Renée Bambicha','l'=>'Maximio Victoria S/N','e'=>'rup@catamarca.edu.ar'],
                                    ['t'=>'Tesorería','n'=>'Florencia Anahí Merep','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Compras','n'=>'Daina Montivero','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Sistemas y Desarrollo Tecnológico','n'=>'Pablo Pedemonte','l'=>'Pabellón N° 13 - CAPE','e'=>'dsdt@catamarca.edu.ar'],
                                    ['t'=>'Administración, Ejecución y Financiamiento Científico','n'=>'Jesica Alejandra Aybar','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                    ['t'=>'Investigación, Innovación y Extensión','n'=>'María Fernanda Carrizo Lopez','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                                ];
                            @endphp

                            @foreach ($direcciones as $d)
                                <div class="bg-purple-50 p-5 rounded-lg border border-purple-100 hover:border-purple-300 transition-all duration-200 hover:shadow-md">
                                    <h4 class="text-lg font-semibold text-purple-800 mb-2">{{ $d['t'] }}</h4>
                                    <div class="space-y-2">
                                        <p class="text-purple-900 font-semibold flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            {{ $d['n'] }}
                                        </p>
                                        <p class="text-purple-700 text-sm flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $d['l'] }}
                                        </p>
                                        <p class="text-purple-600 text-sm flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            {{ $d['e'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection