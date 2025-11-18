@extends('layouts.app')

@section('title', 'Legalización y Registro de Títulos')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-[color:var(--gray-200)] overflow-hidden mb-6">
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
                        <div class="bg-gradient-to-br from-[#f0f4ff] to-[#f8f7ff] rounded-xl p-4 md:p-5 my-4 border border-[color:var(--pri-500)]/20" style="--tw-gradient-from: #f0f4ff; --tw-gradient-to: #f8f7ff;">
                            <!-- Descripción principal -->
                            <div class="text-center mb-4 md:mb-5">
                                <p class="text-[color:var(--ink)] leading-relaxed text-base md:text-lg">
                                    La <span class="font-semibold text-[color:var(--pri-700)]">Dirección de Legalización y Registro de Títulos</span> 
                                    lidera la <span class="bg-[color:var(--sec-500)]/20 px-1 rounded">transformación digital</span> 
                                    del sistema de titulación en la <span class="font-medium text-[color:var(--ter-500)]">provincia de Catamarca</span>, 
                                    implementando el Sistema de Título Digital para agilizar y modernizar los procesos.
                                </p>
                            </div>

                            <!-- Características en grid mejorado -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--sec-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--sec-500)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">Transformación Digital</p>
                                            <p class="text-xs text-gray-600 mt-1">Sistema de Título Digital</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 2 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--pri-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-500)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">Sistema SISFET Web</p>
                                            <p class="text-xs text-gray-600 mt-1">Plataforma nacional digital</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 3 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--ter-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--ter-500)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">Capacitación Continua</p>
                                            <p class="text-xs text-gray-600 mt-1">Acompañamiento a establecimientos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--pri-500)] rounded-full mr-2"></span>
                                    Transformación digital
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--sec-500)] rounded-full mr-2"></span>
                                    SISFET Web
                                </div>
                                <div class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--ter-500)] rounded-full mr-2"></span>
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
                    <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-[color:var(--pri-500)]/10 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[color:var(--pri-500)]" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-[color:var(--ink)]">Transformación Digital</h2>
                        </div>
                        <p class="text-[color:var(--ink)] leading-relaxed flex-grow text-sm md:text-base">
                            Desde el 01/01/2024, la Dirección de Legalización y Registro de Títulos afrontó una modificación
                            sustancial en la emisión de títulos, representando un cambio de paradigmas de gestión para los
                            Establecimientos Educativos de Nivel Secundario y Superior de nuestra provincia.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-[color:var(--acc-500)]/10 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[color:var(--acc-500)]" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-[color:var(--ink)]">Objetivo Principal</h2>
                        </div>
                        <p class="text-[color:var(--ink)] leading-relaxed flex-grow text-sm md:text-base">
                            Acercar y poner a disposición de los egresados sus títulos en tiempos acordes a la fecha de egreso,
                            avanzando en la despapelización de los procesos mediante la implementación del Sistema de Título
                            Digital.
                        </p>
                    </div>
                </div>

                <!-- Normativa Aplicable -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-500)] mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">Normativa Aplicable al Área</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div class="bg-[color:var(--pri-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--pri-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--pri-700)] mb-3">Resoluciones CFE</h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--pri-600)] text-sm md:text-base">
                                    <li><strong>Res. CFE 440/23</strong> - Sistema de Título Digital en la República Argentina</li>
                                    <li><strong>Res. CFE 491/25</strong> - Analítico Parcial a incluir en el SISFET Web</li>
                                </ul>
                            </div>

                            <div class="bg-[color:var(--acc-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--acc-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--acc-500)] mb-3">Normativa Provincial</h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--acc-500)]/80 text-sm md:text-base">
                                    <li><strong>Res. Min. 201/24</strong> - Implementación del Sistema de Título Digital en la
                                        Provincia de Catamarca y Reglamentación Jurisdiccional</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sistema SISFET Web -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--sec-500)] mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">Sistema SISFET Web</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="text-[color:var(--ink)] text-sm md:text-base mb-4 md:mb-6">
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
                            <div class="bg-[color:var(--sec-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--sec-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--sec-500)] mb-3">Etapas Desarrolladas</h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--sec-500)]/80 text-sm md:text-base">
                                    <li>Acompañamiento permanente a establecimientos educativos</li>
                                    <li>Capacitaciones y asesoramiento continuo virtual y presencial</li>
                                    <li>Habilitación de usuarios para carga y firma digital</li>
                                </ul>
                            </div>

                            <div class="bg-[color:var(--ter-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--ter-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--ter-500)] mb-3">Objetivos 2025</h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--ter-500)]/80 text-sm md:text-base">
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
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-700)] mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">Estadísticas de Gestión</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <!-- Estadísticas 2024 -->
                        <div class="mb-6 md:mb-8">
                            <h4 class="text-base md:text-lg font-semibold text-[color:var(--ink)] mb-4">Implementación SISFET Web - Año 2024</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <div class="bg-[color:var(--pri-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--pri-500)]/20">
                                    <p class="text-[color:var(--pri-700)] text-xl md:text-2xl font-bold">2,451</p>
                                    <p class="text-[color:var(--pri-600)] font-medium text-sm md:text-base">Nivel Secundario Estatal</p>
                                </div>
                                <div class="bg-[color:var(--sec-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--sec-500)]/20">
                                    <p class="text-[color:var(--sec-500)] text-xl md:text-2xl font-bold">1,183</p>
                                    <p class="text-[color:var(--sec-500)]/80 font-medium text-sm md:text-base">Nivel Secundario Privado</p>
                                </div>
                                <div class="bg-[color:var(--acc-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--acc-500)]/20">
                                    <p class="text-[color:var(--acc-500)] text-xl md:text-2xl font-bold">637</p>
                                    <p class="text-[color:var(--acc-500)]/80 font-medium text-sm md:text-base">Nivel Superior Estatal</p>
                                </div>
                                <div class="bg-[color:var(--ter-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--ter-500)]/20">
                                    <p class="text-[color:var(--ter-500)] text-xl md:text-2xl font-bold">134</p>
                                    <p class="text-[color:var(--ter-500)]/80 font-medium text-sm md:text-base">Nivel Superior Privado</p>
                                </div>
                                <div class="bg-[color:var(--gray-100)] p-3 md:p-4 rounded-lg border border-[color:var(--gray-200)] md:col-span-2">
                                    <p class="text-[color:var(--ink)] text-2xl md:text-3xl font-bold">4,405</p>
                                    <p class="text-gray-700 font-medium text-sm md:text-base">Total Títulos Legalizados 2024</p>
                                </div>
                            </div>
                        </div>

                        <!-- Estadísticas 2025 -->
                        <div class="mb-6 md:mb-8">
                            <h4 class="text-base md:text-lg font-semibold text-[color:var(--ink)] mb-4">Implementación SISFET Web - Año 2025 (Parcial)</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <div class="bg-[color:var(--pri-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--pri-500)]/20">
                                    <p class="text-[color:var(--pri-700)] text-xl md:text-2xl font-bold">3,211</p>
                                    <p class="text-[color:var(--pri-600)] font-medium text-sm md:text-base">Nivel Secundario Estatal</p>
                                </div>
                                <div class="bg-[color:var(--sec-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--sec-500)]/20">
                                    <p class="text-[color:var(--sec-500)] text-xl md:text-2xl font-bold">1,063</p>
                                    <p class="text-[color:var(--sec-500)]/80 font-medium text-sm md:text-base">Nivel Secundario Privado</p>
                                </div>
                                <div class="bg-[color:var(--acc-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--acc-500)]/20">
                                    <p class="text-[color:var(--acc-500)] text-xl md:text-2xl font-bold">587</p>
                                    <p class="text-[color:var(--acc-500)]/80 font-medium text-sm md:text-base">Nivel Superior Estatal</p>
                                </div>
                                <div class="bg-[color:var(--ter-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--ter-500)]/20">
                                    <p class="text-[color:var(--ter-500)] text-xl md:text-2xl font-bold">165</p>
                                    <p class="text-[color:var(--ter-500)]/80 font-medium text-sm md:text-base">Nivel Superior Privado</p>
                                </div>
                                <div class="bg-[color:var(--gray-100)] p-3 md:p-4 rounded-lg border border-[color:var(--gray-200)] md:col-span-2">
                                    <p class="text-[color:var(--ink)] text-2xl md:text-3xl font-bold">5,026</p>
                                    <p class="text-gray-700 font-medium text-sm md:text-base">Total Títulos Legalizados 2025</p>
                                </div>
                            </div>
                        </div>

                        <!-- Otras estadísticas -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                            <div class="bg-[color:var(--pri-700)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--pri-700)]/20">
                                <p class="text-[color:var(--pri-700)] text-xl md:text-2xl font-bold">564</p>
                                <p class="text-[color:var(--pri-600)] font-medium text-sm md:text-base">Títulos Registrados de Otras Jurisdicciones (2024)</p>
                            </div>
                            <div class="bg-[color:var(--sec-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--sec-500)]/20">
                                <p class="text-[color:var(--sec-500)] text-xl md:text-2xl font-bold">403</p>
                                <p class="text-[color:var(--sec-500)]/80 font-medium text-sm md:text-base">Títulos Registrados de Otras Jurisdicciones (2025 Parcial)</p>
                            </div>
                            <div class="bg-[color:var(--acc-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--acc-500)]/20">
                                <p class="text-[color:var(--acc-500)] text-xl md:text-2xl font-bold">47</p>
                                <p class="text-[color:var(--acc-500)]/80 font-medium text-sm md:text-base">Solicitudes de Validez Nacional 2024/25</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Capacitaciones y Logros -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--acc-500)] mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">Capacitaciones y Logros</h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div class="bg-[color:var(--acc-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--acc-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--acc-500)] mb-3">Capacitaciones Realizadas</h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--acc-500)]/80 text-sm md:text-base">
                                    <li><strong>10</strong> capacitaciones (presenciales y virtuales)</li>
                                    <li><strong>306</strong> referentes (usuarios carga y firma) capacitados</li>
                                    <li><strong>249</strong> carreras cargadas en el SISFET Web</li>
                                </ul>
                            </div>

                            <div class="bg-[color:var(--ter-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--ter-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--ter-500)] mb-3">Coordinación Interárea</h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--ter-500)]/80 text-sm md:text-base">
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