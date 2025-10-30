@extends('layouts.app')

@section('title', 'Edudata - Legalización y Registro de Títulos')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-6">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-titulos.png') }}" 
                         alt="Legalización y Registro de Títulos" 
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
                                    La <span class="font-semibold text-blue-700">Dirección de Legalización y Registro de Títulos</span> 
                                    lidera la <span class="bg-yellow-100 px-1 rounded">transformación digital</span> 
                                    del sistema de titulación en la <span class="font-medium text-green-600">provincia de Catamarca</span>, 
                                    implementando el Sistema de Título Digital para agilizar y modernizar los procesos.
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
                                            <p class="text-sm font-semibold text-gray-800">Transformación Digital</p>
                                            <p class="text-xs text-gray-600 mt-1">Sistema de Título Digital</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 2 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-cyan-100 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800">Sistema SISFET Web</p>
                                            <p class="text-xs text-gray-600 mt-1">Plataforma nacional digital</p>
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
                                            <p class="text-sm font-semibold text-gray-800">Capacitación Continua</p>
                                            <p class="text-xs text-gray-600 mt-1">Acompañamiento a establecimientos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                    Transformación digital
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    SISFET Web
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-gray-200">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                    Capacitación continua
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Legalización y Registro de Títulos -->
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
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Transformación Digital</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            Desde el 01/01/2024, la Dirección de Legalización y Registro de Títulos afrontó una modificación
                            sustancial en la emisión de títulos, representando un cambio de paradigmas de gestión para los
                            Establecimientos Educativos de Nivel Secundario y Superior de nuestra provincia.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Objetivo Principal</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow text-sm md:text-base">
                            Acercar y poner a disposición de los egresados sus títulos en tiempos acordes a la fecha de egreso,
                            avanzando en la despapelización de los procesos mediante la implementación del Sistema de Título
                            Digital.
                        </p>
                    </div>
                </div>

                <!-- Normativa Aplicable -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Normativa Aplicable al Área</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div class="bg-blue-50 p-4 md:p-5 rounded-lg border border-blue-100">
                                <h4 class="text-base md:text-lg font-semibold text-blue-800 mb-3">Resoluciones CFE</h4>
                                <ul class="list-disc pl-5 space-y-2 text-blue-700 text-sm md:text-base">
                                    <li><strong>Res. CFE 440/23</strong> - Sistema de Título Digital en la República Argentina</li>
                                    <li><strong>Res. CFE 491/25</strong> - Analítico Parcial a incluir en el SISFET Web</li>
                                </ul>
                            </div>

                            <div class="bg-purple-50 p-4 md:p-5 rounded-lg border border-purple-100">
                                <h4 class="text-base md:text-lg font-semibold text-purple-800 mb-3">Normativa Provincial</h4>
                                <ul class="list-disc pl-5 space-y-2 text-purple-700 text-sm md:text-base">
                                    <li><strong>Res. Min. 201/24</strong> - Implementación del Sistema de Título Digital en la
                                        Provincia de Catamarca y Reglamentación Jurisdiccional</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sistema SISFET Web -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-green-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Sistema SISFET Web</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="text-gray-700 text-sm md:text-base mb-4 md:mb-6">
                            <p class="mb-4">
                                El marco normativo emitido por el Ministerio de Educación de la Nación mediante Res. CFE 440/23
                                creó una estructura de desarrollos informáticos: ReNaFEJu, ReFE, ReTiDi y SISFET Web.
                            </p>
                            <p>
                                La Dirección se vincula con los establecimientos desde el SISFET Web con la habilitación de usuarios
                                identificados como "Carga y Firma", culminando el proceso con Firma Digital y código QR para cada
                                certificado.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div class="bg-green-50 p-4 md:p-5 rounded-lg border border-green-100">
                                <h4 class="text-base md:text-lg font-semibold text-green-800 mb-3">Etapas Desarrolladas</h4>
                                <ul class="list-disc pl-5 space-y-2 text-green-700 text-sm md:text-base">
                                    <li>Acompañamiento permanente a establecimientos educativos</li>
                                    <li>Capacitaciones y asesoramiento continuo virtual y presencial</li>
                                    <li>Habilitación de usuarios para carga y firma digital</li>
                                </ul>
                            </div>

                            <div class="bg-teal-50 p-4 md:p-5 rounded-lg border border-teal-100">
                                <h4 class="text-base md:text-lg font-semibold text-teal-800 mb-3">Objetivos 2025</h4>
                                <ul class="list-disc pl-5 space-y-2 text-teal-700 text-sm md:text-base">
                                    <li>Segunda etapa de inserción del Sistema de Título Digital</li>
                                    <li>Capacitación en Zona Norte, Este, Sur y Oeste de la Provincia</li>
                                    <li>Digitalización de documentos y archivos existentes</li>
                                    <li>Fortalecimiento del registro de títulos de profesionales</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estadísticas -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-orange-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Estadísticas de Gestión</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <!-- Estadísticas 2024 -->
                        <div class="mb-6 md:mb-8">
                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-4">Implementación SISFET Web - Año 2024</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <div class="bg-blue-50 p-3 md:p-4 rounded-lg border border-blue-100">
                                    <p class="text-blue-900 text-xl md:text-2xl font-bold">2,451</p>
                                    <p class="text-blue-700 font-medium text-sm md:text-base">Nivel Secundario Estatal</p>
                                </div>
                                <div class="bg-green-50 p-3 md:p-4 rounded-lg border border-green-100">
                                    <p class="text-green-900 text-xl md:text-2xl font-bold">1,183</p>
                                    <p class="text-green-700 font-medium text-sm md:text-base">Nivel Secundario Privado</p>
                                </div>
                                <div class="bg-purple-50 p-3 md:p-4 rounded-lg border border-purple-100">
                                    <p class="text-purple-900 text-xl md:text-2xl font-bold">637</p>
                                    <p class="text-purple-700 font-medium text-sm md:text-base">Nivel Superior Estatal</p>
                                </div>
                                <div class="bg-pink-50 p-3 md:p-4 rounded-lg border border-pink-100">
                                    <p class="text-pink-900 text-xl md:text-2xl font-bold">134</p>
                                    <p class="text-pink-700 font-medium text-sm md:text-base">Nivel Superior Privado</p>
                                </div>
                                <div class="bg-gray-50 p-3 md:p-4 rounded-lg border border-gray-100 md:col-span-2">
                                    <p class="text-gray-900 text-2xl md:text-3xl font-bold">4,405</p>
                                    <p class="text-gray-700 font-medium text-sm md:text-base">Total Títulos Legalizados 2024</p>
                                </div>
                            </div>
                        </div>

                        <!-- Estadísticas 2025 -->
                        <div class="mb-6 md:mb-8">
                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-4">Implementación SISFET Web - Año 2025 (Parcial)</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <div class="bg-blue-50 p-3 md:p-4 rounded-lg border border-blue-100">
                                    <p class="text-blue-900 text-xl md:text-2xl font-bold">3,211</p>
                                    <p class="text-blue-700 font-medium text-sm md:text-base">Nivel Secundario Estatal</p>
                                </div>
                                <div class="bg-green-50 p-3 md:p-4 rounded-lg border border-green-100">
                                    <p class="text-green-900 text-xl md:text-2xl font-bold">1,063</p>
                                    <p class="text-green-700 font-medium text-sm md:text-base">Nivel Secundario Privado</p>
                                </div>
                                <div class="bg-purple-50 p-3 md:p-4 rounded-lg border border-purple-100">
                                    <p class="text-purple-900 text-xl md:text-2xl font-bold">587</p>
                                    <p class="text-purple-700 font-medium text-sm md:text-base">Nivel Superior Estatal</p>
                                </div>
                                <div class="bg-pink-50 p-3 md:p-4 rounded-lg border border-pink-100">
                                    <p class="text-pink-900 text-xl md:text-2xl font-bold">165</p>
                                    <p class="text-pink-700 font-medium text-sm md:text-base">Nivel Superior Privado</p>
                                </div>
                                <div class="bg-gray-50 p-3 md:p-4 rounded-lg border border-gray-100 md:col-span-2">
                                    <p class="text-gray-900 text-2xl md:text-3xl font-bold">5,026</p>
                                    <p class="text-gray-700 font-medium text-sm md:text-base">Total Títulos Legalizados 2025</p>
                                </div>
                            </div>
                        </div>

                        <!-- Otras estadísticas -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                            <div class="bg-orange-50 p-3 md:p-4 rounded-lg border border-orange-100">
                                <p class="text-orange-900 text-xl md:text-2xl font-bold">564</p>
                                <p class="text-orange-700 font-medium text-sm md:text-base">Títulos Registrados de Otras Jurisdicciones (2024)</p>
                            </div>
                            <div class="bg-teal-50 p-3 md:p-4 rounded-lg border border-teal-100">
                                <p class="text-teal-900 text-xl md:text-2xl font-bold">403</p>
                                <p class="text-teal-700 font-medium text-sm md:text-base">Títulos Registrados de Otras Jurisdicciones (2025 Parcial)</p>
                            </div>
                            <div class="bg-indigo-50 p-3 md:p-4 rounded-lg border border-indigo-100">
                                <p class="text-indigo-900 text-xl md:text-2xl font-bold">47</p>
                                <p class="text-indigo-700 font-medium text-sm md:text-base">Solicitudes de Validez Nacional 2024/25</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Capacitaciones y Logros -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-purple-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">Capacitaciones y Logros</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div class="bg-purple-50 p-4 md:p-5 rounded-lg border border-purple-100">
                                <h4 class="text-base md:text-lg font-semibold text-purple-800 mb-3">Capacitaciones Realizadas</h4>
                                <ul class="list-disc pl-5 space-y-2 text-purple-700 text-sm md:text-base">
                                    <li><strong>10</strong> capacitaciones (presenciales y virtuales)</li>
                                    <li><strong>306</strong> referentes (usuarios carga y firma) capacitados</li>
                                    <li><strong>249</strong> carreras cargadas en el SISFET Web</li>
                                </ul>
                            </div>

                            <div class="bg-pink-50 p-4 md:p-5 rounded-lg border border-pink-100">
                                <h4 class="text-base md:text-lg font-semibold text-pink-800 mb-3">Coordinación Interárea</h4>
                                <ul class="list-disc pl-5 space-y-2 text-pink-700 text-sm md:text-base">
                                    <li>Coordinación con Dirección Provincial de Educación Superior</li>
                                    <li>Coordinación con Dirección Provincial de Educación de Gestión Privada</li>
                                    <li>Trabajo conjunto para solicitudes de Validez Nacional</li>
                                </ul>
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