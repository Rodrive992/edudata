@extends('layouts.app')

@section('title', 'Organigrama Ministerial')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-6">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-organigrama.png') }}" 
                         alt="Organigrama Ministerial" 
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
                                    El <span class="font-semibold text-blue-700">Ministerio de Educación, Ciencia y Tecnología</span> 
                                    de Catamarca está compuesto por diversas <span class="bg-yellow-100 px-1 rounded">secretarías y direcciones provinciales</span> 
                                    que trabajan de manera coordinada para garantizar una <span class="font-medium text-green-600">educación de calidad</span> 
                                    en todos los niveles y modalidades del sistema educativo provincial.
                                </p>
                            </div>

                            <!-- Características en grid mejorado -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Estructura Organizativa</p>
                                            <p class="text-xs text-gray-600 mt-1">Secretarías y direcciones especializadas</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 2 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Equipo de Gestión</p>
                                            <p class="text-xs text-gray-600 mt-1">Liderazgo especializado por áreas</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 3 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-purple-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Coordinación Articulada</p>
                                            <p class="text-xs text-gray-600 mt-1">Trabajo conjunto entre áreas</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                    Estructura organizativa
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    Equipo de gestión
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                    Coordinación articulada
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico del Organigrama -->
            <div class="p-4 md:p-6 pt-4">
                <!-- Nivel Ministerial -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Nivel Ministerial</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 md:p-6 rounded-lg border border-blue-200">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                <div class="flex-1">
                                    <h4 class="text-lg md:text-xl font-bold text-blue-800 mb-2">Ministro</h4>
                                    <p class="text-blue-900 font-bold text-xl md:text-2xl mb-1">Nicolás Rosales Matienzo</p>
                                    <div class="space-y-1 text-blue-700 text-sm md:text-base">
                                        <p class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            </svg>
                                            Pabellón N° 11 - CAPE
                                        </p>
                                        <p class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            educacion@catamarca.edu.ar
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Secretarías -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-green-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Secretarías</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
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
                                <div class="bg-white rounded-lg border border-gray-200 p-4 md:p-5 hover:border-green-300 hover:shadow-md transition-all duration-200 group">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="bg-green-100 p-2 rounded-lg flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-1">{{ $s['t'] }}</h4>
                                            <p class="text-green-700 font-medium text-sm md:text-base">{{ $s['n'] }}</p>
                                        </div>
                                    </div>
                                    <div class="space-y-2 pl-11">
                                        <p class="text-gray-600 text-sm flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            </svg>
                                            {{ $s['l'] }}
                                        </p>
                                        <p class="text-gray-600 text-sm flex items-center gap-2">
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
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-purple-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Direcciones Provinciales</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
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
                                <div class="bg-white rounded-lg border border-gray-200 p-4 md:p-5 hover:border-purple-300 hover:shadow-md transition-all duration-200 group">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-1">{{ $d['t'] }}</h4>
                                            <p class="text-purple-700 font-medium text-sm md:text-base">{{ $d['n'] }}</p>
                                        </div>
                                    </div>
                                    <div class="space-y-2 pl-11">
                                        <p class="text-gray-600 text-sm flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            </svg>
                                            {{ $d['l'] }}
                                        </p>
                                        <p class="text-gray-600 text-sm flex items-center gap-2">
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

                <!-- Información Adicional -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="text-lg md:text-xl font-semibold text-gray-800">Información General</h2>
                    </div>

                    <div class="pl-0 md:pl-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                <h4 class="font-semibold text-gray-800 mb-2">Ubicación Central</h4>
                                <p class="text-gray-700 text-sm">Complejo Administrativo Provincial de Ejecución (CAPE)</p>
                                <p class="text-gray-600 text-sm mt-1">Pabellones 11 al 15 y 26</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                <h4 class="font-semibold text-gray-800 mb-2">Horario de Atención</h4>
                                <p class="text-gray-700 text-sm">Lunes a Viernes</p>
                                <p class="text-gray-600 text-sm mt-1">07:00 - 14:00 hs</p>
                            </div>
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