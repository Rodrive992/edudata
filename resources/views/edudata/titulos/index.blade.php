@extends('layouts.app')

@section('title', 'Edudata - Legalización y Registro de Títulos')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-10">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/titulo-titulos.png') }}" 
                         alt="Legalización y Registro de Títulos" 
                         class="w-full h-auto object-cover rounded-xl">
                </div>
                
                <!-- Texto descriptivo mejorado -->
                <div class="mb-6">                
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            La <span class="font-semibold text-blue-700">Dirección de Legalización y Registro de Títulos</span> 
                            lidera la <span class="bg-yellow-100 px-1 rounded">transformación digital</span> 
                            del sistema de titulación en la <span class="font-medium text-green-600">provincia de Catamarca</span>, 
                            implementando el Sistema de Título Digital para agilizar y modernizar los procesos.
                        </p>

                        <!-- Sección de funcionalidades con fondo claro -->
                        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 p-4 sm:p-6 lg:p-8 my-6 sm:my-8 shadow-lg border border-blue-200">
                            <!-- Elementos decorativos de fondo -->
                            <div class="absolute top-0 right-0 w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 bg-blue-200/30 rounded-full -translate-y-8 sm:-translate-y-12 lg:-translate-y-16 translate-x-8 sm:translate-x-12 lg:translate-x-16"></div>
                            <div class="absolute bottom-0 left-0 w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-indigo-200/30 rounded-full translate-y-8 sm:translate-y-10 lg:translate-y-12 -translate-x-6 sm:-translate-x-8 lg:-translate-x-12"></div>

                            <div class="relative z-10">
                              
                                <!-- Grid de funcionalidades -->
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                    <!-- Tarjeta 1: Transformación Digital -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#f5cb58] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">01</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#f5cb58] to-[#ddb750] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Transformación Digital</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Implementamos el Sistema de Título Digital representando un cambio de paradigmas de gestión para establecimientos educativos</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">🚀 Innovación tecnológica</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 2: Sistema SISFET Web -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-[#6bbde5] hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#6bbde5] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">02</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#6bbde5] to-[#5aadd5] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Sistema SISFET Web</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Gestionamos la implementación del sistema nacional con habilitación de usuarios, firma digital y código QR para certificados</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-cyan-600 text-sm font-semibold">💻 Plataforma digital</span>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 3: Capacitación Continua -->
                                    <div class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full md:col-span-2 lg:col-span-1">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">03</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Capacitación Continua</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Brindamos acompañamiento permanente, capacitaciones y asesoramiento a establecimientos educativos de toda la provincia</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <span class="text-green-600 text-sm font-semibold">📚 Formación especializada</span>
                                        </div>
                                    </div>
                                </div>

                               
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                Transformación digital
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                SISFET Web
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                Capacitación continua
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Legalización y Registro de Títulos -->
            <div class="p-6 pt-4">
                <!-- Presentación -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Transformación Digital</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow">
                            Desde el 01/01/2024, la Dirección de Legalización y Registro de Títulos afrontó una modificación
                            sustancial en la emisión de títulos, representando un cambio de paradigmas de gestión para los
                            Establecimientos Educativos de Nivel Secundario y Superior de nuestra provincia.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Objetivo Principal</h2>
                        </div>
                        <p class="text-gray-700 leading-relaxed flex-grow">
                            Acercar y poner a disposición de los egresados sus títulos en tiempos acordes a la fecha de egreso,
                            avanzando en la despapelización de los procesos mediante la implementación del Sistema de Título
                            Digital.
                        </p>
                    </div>
                </div>

                <!-- Normativa Aplicable -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Normativa Aplicable al Área</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-blue-50 p-5 rounded-lg border border-blue-100">
                                <h4 class="text-lg font-semibold text-blue-800 mb-3">Resoluciones CFE</h4>
                                <ul class="list-disc pl-5 space-y-2 text-blue-700">
                                    <li><strong>Res. CFE 440/23</strong> - Sistema de Título Digital en la República Argentina</li>
                                    <li><strong>Res. CFE 491/25</strong> - Analítico Parcial a incluir en el SISFET Web</li>
                                </ul>
                            </div>

                            <div class="bg-purple-50 p-5 rounded-lg border border-purple-100">
                                <h4 class="text-lg font-semibold text-purple-800 mb-3">Normativa Provincial</h4>
                                <ul class="list-disc pl-5 space-y-2 text-purple-700">
                                    <li><strong>Res. Min. 201/24</strong> - Implementación del Sistema de Título Digital en la
                                        Provincia de Catamarca y Reglamentación Jurisdiccional</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sistema SISFET Web -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-teal-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Sistema SISFET Web</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="prose max-w-none text-gray-700 mb-6">
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

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-green-50 p-5 rounded-lg border border-green-100">
                                <h4 class="text-lg font-semibold text-green-800 mb-3">Etapas Desarrolladas</h4>
                                <ul class="list-disc pl-5 space-y-2 text-green-700">
                                    <li>Acompañamiento permanente a establecimientos educativos</li>
                                    <li>Capacitaciones y asesoramiento continuo virtual y presencial</li>
                                    <li>Habilitación de usuarios para carga y firma digital</li>
                                </ul>
                            </div>

                            <div class="bg-teal-50 p-5 rounded-lg border border-teal-100">
                                <h4 class="text-lg font-semibold text-teal-800 mb-3">Objetivos 2025</h4>
                                <ul class="list-disc pl-5 space-y-2 text-teal-700">
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
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-orange-50 to-amber-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Estadísticas de Gestión</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <!-- Estadísticas 2024 -->
                        <div class="mb-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Implementación SISFET Web - Año 2024</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                                    <p class="text-blue-900 text-2xl font-bold">2,451</p>
                                    <p class="text-blue-700 font-medium">Nivel Secundario Estatal</p>
                                </div>
                                <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                                    <p class="text-green-900 text-2xl font-bold">1,183</p>
                                    <p class="text-green-700 font-medium">Nivel Secundario Privado</p>
                                </div>
                                <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
                                    <p class="text-purple-900 text-2xl font-bold">637</p>
                                    <p class="text-purple-700 font-medium">Nivel Superior Estatal</p>
                                </div>
                                <div class="bg-pink-50 p-4 rounded-lg border border-pink-100">
                                    <p class="text-pink-900 text-2xl font-bold">134</p>
                                    <p class="text-pink-700 font-medium">Nivel Superior Privado</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 col-span-2">
                                    <p class="text-gray-900 text-3xl font-bold">4,405</p>
                                    <p class="text-gray-700 font-medium">Total Títulos Legalizados 2024</p>
                                </div>
                            </div>
                        </div>

                        <!-- Estadísticas 2025 -->
                        <div class="mb-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Implementación SISFET Web - Año 2025 (Parcial)
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                                    <p class="text-blue-900 text-2xl font-bold">3,211</p>
                                    <p class="text-blue-700 font-medium">Nivel Secundario Estatal</p>
                                </div>
                                <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                                    <p class="text-green-900 text-2xl font-bold">1,063</p>
                                    <p class="text-green-700 font-medium">Nivel Secundario Privado</p>
                                </div>
                                <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
                                    <p class="text-purple-900 text-2xl font-bold">587</p>
                                    <p class="text-purple-700 font-medium">Nivel Superior Estatal</p>
                                </div>
                                <div class="bg-pink-50 p-4 rounded-lg border border-pink-100">
                                    <p class="text-pink-900 text-2xl font-bold">165</p>
                                    <p class="text-pink-700 font-medium">Nivel Superior Privado</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 col-span-2">
                                    <p class="text-gray-900 text-3xl font-bold">5,026</p>
                                    <p class="text-gray-700 font-medium">Total Títulos Legalizados 2025</p>
                                </div>
                            </div>
                        </div>

                        <!-- Otras estadísticas -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-orange-50 p-4 rounded-lg border border-orange-100">
                                <p class="text-orange-900 text-2xl font-bold">564</p>
                                <p class="text-orange-700 font-medium">Títulos Registrados de Otras Jurisdicciones (2024)</p>
                            </div>
                            <div class="bg-teal-50 p-4 rounded-lg border border-teal-100">
                                <p class="text-teal-900 text-2xl font-bold">403</p>
                                <p class="text-teal-700 font-medium">Títulos Registrados de Otras Jurisdicciones (2025 Parcial)</p>
                            </div>
                            <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                                <p class="text-indigo-900 text-2xl font-bold">47</p>
                                <p class="text-indigo-700 font-medium">Solicitudes de Validez Nacional 2024/25</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Capacitaciones y Logros -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-pink-50">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Capacitaciones y Logros</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-purple-50 p-5 rounded-lg border border-purple-100">
                                <h4 class="text-lg font-semibold text-purple-800 mb-3">Capacitaciones Realizadas</h4>
                                <ul class="list-disc pl-5 space-y-2 text-purple-700">
                                    <li><strong>10</strong> capacitaciones (presenciales y virtuales)</li>
                                    <li><strong>306</strong> referentes (usuarios carga y firma) capacitados</li>
                                    <li><strong>249</strong> carreras cargadas en el SISFET Web</li>
                                </ul>
                            </div>

                            <div class="bg-pink-50 p-5 rounded-lg border border-pink-100">
                                <h4 class="text-lg font-semibold text-pink-800 mb-3">Coordinación Interárea</h4>
                                <ul class="list-disc pl-5 space-y-2 text-pink-700">
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
@endsection