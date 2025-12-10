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

                <!-- Texto descriptivo + autoridad -->
                <div class="mb-4 md:mb-6">
                    <div class="space-y-4">
                        <!-- Bloque destacado -->
                        <div class="bg-gradient-to-br from-[#f0f4ff] to-[#f8f7ff] rounded-xl p-4 md:p-5 my-4 border border-[color:var(--pri-500)]/20"
                             style="--tw-gradient-from: #f0f4ff; --tw-gradient-to: #f8f7ff;">
                            <!-- Descripción principal -->
                            <div class="text-center mb-4 md:mb-5">
                                <p class="text-[color:var(--ink)] leading-relaxed text-base md:text-lg">
                                    La <span class="font-semibold text-[color:var(--pri-700)]">Dirección de Legalización y Registro de Títulos</span>
                                    lidera la <span class="bg-[color:var(--sec-500)]/20 px-1 rounded">transformación digital</span>
                                    del sistema de titulación en la <span class="font-medium text-[color:var(--ter-500)]">provincia de Catamarca</span>,
                                    implementando el Sistema de Título Digital para modernizar los procesos y garantizar
                                    tiempos acordes a la fecha de egreso de las y los estudiantes.
                                </p>
                            </div>

                            <!-- Características en grid -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--sec-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--sec-500)]"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
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
                                        <div
                                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--pri-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-500)]"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
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
                                        <div
                                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--ter-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--ter-500)]"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
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
                                <div
                                    class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--pri-500)] rounded-full mr-2"></span>
                                    Transformación digital
                                </div>
                                <div
                                    class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--sec-500)] rounded-full mr-2"></span>
                                    SISFET Web
                                </div>
                                <div
                                    class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--ter-500)] rounded-full mr-2"></span>
                                    Capacitación continua
                                </div>
                            </div>

                            <!-- Autoridad del área -->
                            <div class="flex flex-wrap justify-center gap-3 mt-4">
                                <div
                                    class="inline-flex items-center bg-white px-3 py-1.5 rounded-full text-xs md:text-sm text-gray-800 border border-[color:var(--gray-200)] shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4 mr-2 text-[color:var(--pri-700)]"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM3 21a7 7 0 0114 0H3z" />
                                    </svg>
                                    <span class="font-medium">
                                        Autoridad del área: Julio Rubén Quiroga
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Legalización y Registro de Títulos -->
            <div class="p-4 md:p-6 pt-4">
                <!-- 1. Presentación / Introducción y Objetivo -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-6">
                    <div
                        class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-[color:var(--pri-500)]/10 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-6 w-6 text-[color:var(--pri-500)]" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 6h13M8 12h9M8 18h5M3 6h.01M3 12h.01M3 18h.01" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-[color:var(--ink)]">
                                1. Introducción
                            </h2>
                        </div>
                        <p class="text-[color:var(--ink)] leading-relaxed flex-grow text-sm md:text-base text-justify">
                            En el período <strong>01/01/2024 a la fecha</strong>, la Dirección de Legalización y Registro de
                            Títulos afrontó una modificación sustancial en la emisión de títulos en la jurisdicción. Este
                            cambio constituye un desafío de gran trascendencia y un <strong>cambio de paradigma en la gestión</strong>
                            para los establecimientos educativos de <strong>Nivel Secundario y Superior</strong> de la provincia.
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] p-4 md:p-6 flex flex-col h-full">
                        <div class="flex items-center mb-4">
                            <div class="bg-[color:var(--acc-500)]/10 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-6 w-6 text-[color:var(--acc-500)]" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8c-1.657 0-3 .843-3 2.5 0 1.063.734 1.788 1.672 2.223C11.648 13.67 12 14.174 12 15m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-[color:var(--ink)]">
                                2. Objetivo del organismo
                            </h2>
                        </div>
                        <p class="text-[color:var(--ink)] leading-relaxed flex-grow text-sm md:text-base text-justify">
                            El objetivo principal es <strong>acercar y poner a disposición de los egresados sus títulos</strong>
                            en tiempos acordes a la fecha de egreso, avanzando en la <strong>despapelización de los procesos</strong>
                            y en la modernización administrativa. Desde el marco normativo de la
                            <strong>Res. CFE 440/23</strong> se creó una estructura de desarrollos informáticos (ReNaFEJu, ReFE,
                            ReTiDi y <strong>SISFET Web</strong>) que sostiene este proceso a nivel nacional y jurisdiccional.
                        </p>
                    </div>
                </div>

                <!-- 3. Normativa aplicable al área -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-500)] mr-2"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                                3. Normativa aplicable al área
                            </h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div
                                class="bg-[color:var(--pri-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--pri-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--pri-700)] mb-3">
                                    Resoluciones CFE
                                </h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--pri-600)] text-sm md:text-base">
                                    <li>
                                        <strong>Res. CFE 440/23</strong> – Sistema de Título Digital en la República Argentina.
                                    </li>
                                    <li>
                                        <strong>Res. CFE 491/25</strong> – Analítico parcial a incluir en el SISFET Web.
                                    </li>
                                </ul>
                            </div>

                            <div
                                class="bg-[color:var(--acc-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--acc-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--acc-500)] mb-3">
                                    Normativa provincial
                                </h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--acc-500)]/80 text-sm md:text-base">
                                    <li>
                                        <strong>Res. Min. 201/24</strong> – Implementación del Sistema de Título Digital en la
                                        Provincia de Catamarca y reglamentación jurisdiccional.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Datos presupuestarios y de ejecución -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div
                        class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)] flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--sec-500)] mr-2"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 14l2-2 2 2m-2-2v6m-7 4h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v15a2 2 0 002 2z" />
                        </svg>
                        <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                            4. Datos presupuestarios y de ejecución vinculados al área
                        </h3>
                    </div>
                    <div class="p-4 md:p-6 text-sm md:text-base text-[color:var(--ink)] leading-relaxed">
                        <p class="text-justify">
                            Desde la creación de la Dirección mediante el <strong>Decreto 2100/20</strong> y hasta la fecha,
                            la información presupuestaria y de ejecución <strong>no es de uso ni conocimiento del
                            organismo</strong>.
                        </p>
                        <p class="mt-2 font-semibold text-[color:var(--pri-700)]">
                            Situación informada: SIN DATOS.
                        </p>
                    </div>
                </div>

                <!-- 5. Contrataciones, convenios y subsidios -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div
                        class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)] flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--ter-500)] mr-2"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                            5. Contrataciones, convenios y subsidios
                        </h3>
                    </div>
                    <div class="p-4 md:p-6 text-sm md:text-base text-[color:var(--ink)] leading-relaxed">
                        <p class="text-justify">
                            El organismo <strong>no cuenta con autonomía funcional</strong> para realizar contrataciones,
                            convenios o subsidios de manera directa, por lo que este tipo de tramitaciones se gestionan a
                            través de otras áreas competentes del Ministerio.
                        </p>
                    </div>
                </div>

                <!-- 6. Sistema SISFET Web: desarrollo y objetivos -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--sec-500)] mr-2"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                                6. Sistema SISFET Web y etapas de implementación
                            </h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="text-[color:var(--ink)] text-sm md:text-base mb-4 md:mb-6">
                            <p class="mb-4 text-justify">
                                En el marco de la <strong>Res. CFE 440/23</strong>, el Ministerio de Educación de la Nación
                                creó una estructura de desarrollos informáticos: <strong>ReNaFEJu, ReFE, ReTiDi y SISFET Web</strong>.
                            </p>
                            <p class="text-justify">
                                En la <strong>jurisdicción de la Provincia de Catamarca</strong>, la Dirección de Legalización
                                y Registro de Títulos se vincula con los establecimientos a través del
                                <strong>SISFET Web</strong>, habilitando usuarios identificados como
                                <strong>"Carga" y "Firma"</strong> para los establecimientos de Nivel Secundario y Superior
                                dependientes del Ministerio. El proceso de emisión culmina con la
                                <strong>Firma Digital</strong>, otorgando a cada certificado su correspondiente
                                <strong>código QR</strong>.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <!-- Etapas desarrolladas -->
                            <div
                                class="bg-[color:var(--sec-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--sec-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--sec-500)] mb-3">
                                    Etapas desarrolladas
                                </h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--sec-500)]/80 text-sm md:text-base">
                                    <li>
                                        Acompañamiento permanente a establecimientos de Nivel Secundario y Superior de gestión
                                        estatal y privada.
                                    </li>
                                    <li>
                                        Capacitaciones y asesoramiento continuo, tanto <strong>virtual</strong> como
                                        <strong>presencial</strong>.
                                    </li>
                                    <li>
                                        Habilitación de usuarios de carga y firma para la gestión de títulos y certificados en
                                        SISFET Web.
                                    </li>
                                </ul>
                            </div>

                            <!-- Objetivos agosto - diciembre 2025 -->
                            <div
                                class="bg-[color:var(--ter-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--ter-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--ter-500)] mb-3">
                                    Objetivos agosto – diciembre 2025
                                </h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--ter-500)]/80 text-sm md:text-base">
                                    <li>
                                        Segunda etapa de inserción del Sistema de Título Digital, reforzando circuitos de
                                        ejecución y emisión en <strong>SISFET Web</strong> y certificados de pase
                                        jurisdiccionales e interjurisdiccionales (SISFET v4.1.3).
                                    </li>
                                    <li>
                                        Capacitaciones a establecimientos de <strong>Zonas Norte, Este, Sur y Oeste</strong> de
                                        la provincia según necesidades y requerimientos.
                                    </li>
                                    <li>
                                        Contribuir a la <strong>despapelización</strong> incorporando documentos digitales al
                                        archivo y digitalizando antecedentes en papel.
                                    </li>
                                    <li>
                                        Reforzar el trámite de <strong>Registro de Títulos</strong> de profesionales egresados
                                        de universidades y otras jurisdicciones, en articulación con Juntas de Clasificación.
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Otros objetivos y coordinación -->
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div
                                class="bg-[color:var(--pri-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--pri-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--pri-700)] mb-3">
                                    Coordinación interjurisdiccional
                                </h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--pri-600)] text-sm md:text-base">
                                    <li>
                                        Seguimiento de carreras que requieren convalidación y/o relocalización de planes de
                                        estudio, en concordancia con el <strong>mapa de oferta anual</strong> de la
                                        jurisdicción.
                                    </li>
                                    <li>
                                        Coordinación para la presentación de <strong>solicitudes de Validez Nacional</strong>
                                        para ofertas de Nivel Inicial, Primario, Secundario y Superior, junto a la Dirección
                                        Provincial de Educación Superior y la Dirección Provincial de Educación de Gestión
                                        Privada, Municipal y Cooperativa.
                                    </li>
                                    <li>
                                        Presentación del SISFET Web a organismos dependientes del Ministerio que requieren
                                        mayor información sobre títulos (Supervisiones de Nivel, Juntas de Clasificación, etc.).
                                    </li>
                                </ul>
                            </div>

                            <div
                                class="bg-[color:var(--acc-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--acc-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--acc-500)] mb-3">
                                    Proyecciones nacionales 2025–2027
                                </h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--acc-500)]/80 text-sm md:text-base">
                                    <li>
                                        Coordinación con la jurisdicción nacional para la incorporación al SISFET Web del
                                        <strong>Certificado Parcial</strong> (certificados de pase) según Res. CFE 391/25, con
                                        implementación prevista para <strong>2026</strong>.
                                    </li>
                                    <li>
                                        Ajustes preliminares para la incorporación del <strong>Certificado Final de
                                        Terminalidad</strong> de Nivel Inicial y Primario al SISFET Web para su emisión digital
                                        a partir de <strong>2027</strong>.
                                    </li>
                                    <li>
                                        Digitalización de planes de estudios e informes finales que integran la estructura
                                        documental de la Dirección.
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Cierre del programa de fortalecimiento -->
                        <div class="mt-6 bg-[color:var(--gray-100)] p-4 md:p-5 rounded-lg border border-[color:var(--gray-200)]">
                            <p class="text-[color:var(--ink)] text-sm md:text-base text-justify">
                                El <strong>Programa de Fortalecimiento y Gestión de Títulos</strong> a partir de la
                                implementación del Sistema de Título Digital –a través del desarrollo informático SISFET Web,
                                con su normativa federal y jurisdiccional– se encuentra en <strong>plena ejecución por segundo
                                año consecutivo</strong>, con una dinámica permanente y un régimen anual de emisión de títulos
                                del <strong>01/01 al 31/12</strong> de cada año.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 7. Estadísticas de gestión -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-700)] mr-2"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm6 0v-4a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2zM9 5a2 2 0 104 0 2 2 0 00-4 0z" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                                7. Estadísticas de gestión
                            </h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <!-- Estadísticas 2024 -->
                        <div class="mb-6 md:mb-8">
                            <h4 class="text-base md:text-lg font-semibold text-[color:var(--ink)] mb-4">
                                Implementación SISFET Web – Año 2024 (Serie 2024)
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <div
                                    class="bg-[color:var(--pri-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--pri-500)]/20">
                                    <p class="text-[color:var(--pri-700)] text-xl md:text-2xl font-bold">2.451</p>
                                    <p class="text-[color:var(--pri-600)] font-medium text-sm md:text-base">
                                        Nivel Secundario Estatal
                                    </p>
                                </div>
                                <div
                                    class="bg-[color:var(--sec-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--sec-500)]/20">
                                    <p class="text-[color:var(--sec-500)] text-xl md:text-2xl font-bold">1.183</p>
                                    <p class="text-[color:var(--sec-500)]/80 font-medium text-sm md:text-base">
                                        Nivel Secundario Privado
                                    </p>
                                </div>
                                <div
                                    class="bg-[color:var(--acc-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--acc-500)]/20">
                                    <p class="text-[color:var(--acc-500)] text-xl md:text-2xl font-bold">637</p>
                                    <p class="text-[color:var(--acc-500)]/80 font-medium text-sm md:text-base">
                                        Nivel Superior Estatal
                                    </p>
                                </div>
                                <div
                                    class="bg-[color:var(--ter-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--ter-500)]/20">
                                    <p class="text-[color:var(--ter-500)] text-xl md:text-2xl font-bold">134</p>
                                    <p class="text-[color:var(--ter-500)]/80 font-medium text-sm md:text-base">
                                        Nivel Superior Privado
                                    </p>
                                </div>
                                <div
                                    class="bg-[color:var(--gray-100)] p-3 md:p-4 rounded-lg border border-[color:var(--gray-200)] md:col-span-2">
                                    <p class="text-[color:var(--ink)] text-2xl md:text-3xl font-bold">4.405</p>
                                    <p class="text-gray-700 font-medium text-sm md:text-base">
                                        Total de títulos legalizados 2024
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Estadísticas 2025 -->
                        <div class="mb-6 md:mb-8">
                            <h4 class="text-base md:text-lg font-semibold text-[color:var(--ink)] mb-4">
                                Implementación SISFET Web – Año 2025 (Serie 2025, a la fecha)
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <div
                                    class="bg-[color:var(--pri-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--pri-500)]/20">
                                    <p class="text-[color:var(--pri-700)] text-xl md:text-2xl font-bold">4.439</p>
                                    <p class="text-[color:var(--pri-600)] font-medium text-sm md:text-base">
                                        Nivel Secundario Estatal
                                    </p>
                                </div>
                                <div
                                    class="bg-[color:var(--sec-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--sec-500)]/20">
                                    <p class="text-[color:var(--sec-500)] text-xl md:text-2xl font-bold">1.280</p>
                                    <p class="text-[color:var(--sec-500)]/80 font-medium text-sm md:text-base">
                                        Nivel Secundario Privado
                                    </p>
                                </div>
                                <div
                                    class="bg-[color:var(--acc-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--acc-500)]/20">
                                    <p class="text-[color:var(--acc-500)] text-xl md:text-2xl font-bold">942</p>
                                    <p class="text-[color:var(--acc-500)]/80 font-medium text-sm md:text-base">
                                        Nivel Superior Estatal
                                    </p>
                                </div>
                                <div
                                    class="bg-[color:var(--ter-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--ter-500)]/20">
                                    <p class="text-[color:var(--ter-500)] text-xl md:text-2xl font-bold">242</p>
                                    <p class="text-[color:var(--ter-500)]/80 font-medium text-sm md:text-base">
                                        Nivel Superior Privado
                                    </p>
                                </div>
                                <div
                                    class="bg-[color:var(--gray-100)] p-3 md:p-4 rounded-lg border border-[color:var(--gray-200)] md:col-span-2">
                                    <p class="text-[color:var(--ink)] text-2xl md:text-3xl font-bold">6.903</p>
                                    <p class="text-gray-700 font-medium text-sm md:text-base">
                                        Total de títulos legalizados 2025 (a la fecha)
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Otras estadísticas -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                            <div
                                class="bg-[color:var(--pri-700)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--pri-700)]/20">
                                <p class="text-[color:var(--pri-700)] text-xl md:text-2xl font-bold">564</p>
                                <p class="text-[color:var(--pri-600)] font-medium text-sm md:text-base">
                                    Títulos registrados de otras jurisdicciones (2024)
                                </p>
                            </div>
                            <div
                                class="bg-[color:var(--sec-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--sec-500)]/20">
                                <p class="text-[color:var(--sec-500)] text-xl md:text-2xl font-bold">457</p>
                                <p class="text-[color:var(--sec-500)]/80 font-medium text-sm md:text-base">
                                    Títulos registrados de otras jurisdicciones (2025, parcial)
                                </p>
                            </div>
                            <div
                                class="bg-[color:var(--acc-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--acc-500)]/20">
                                <p class="text-[color:var(--acc-500)] text-xl md:text-2xl font-bold">84</p>
                                <p class="text-[color:var(--acc-500)]/80 font-medium text-sm md:text-base">
                                    Solicitudes de Validez Nacional (2024/2025) –
                                    <span class="block text-xs mt-1">
                                        <strong>38</strong> resoluciones/disp. de validez otorgadas.
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 8. Capacitaciones y logros -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--acc-500)] mr-2"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                                8. Capacitaciones y logros
                            </h3>
                        </div>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div
                                class="bg-[color:var(--acc-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--acc-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--acc-500)] mb-3">
                                    Capacitaciones realizadas
                                </h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--acc-500)]/80 text-sm md:text-base">
                                    <li><strong>10</strong> capacitaciones (presenciales y virtuales) en los ciclos 2024/2025.</li>
                                    <li><strong>306</strong> referentes (usuarios de carga y firma) capacitados para el SISFET Web.</li>
                                    <li><strong>249</strong> carreras cargadas en el SISFET Web a la fecha.</li>
                                </ul>
                            </div>

                            <div
                                class="bg-[color:var(--ter-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--ter-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--ter-500)] mb-3">
                                    Coordinación interárea
                                </h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--ter-500)]/80 text-sm md:text-base">
                                    <li>
                                        Coordinación con la <strong>Dirección Provincial de Educación Superior</strong> para
                                        la gestión de validez nacional y registro de títulos.
                                    </li>
                                    <li>
                                        Coordinación con la <strong>Dirección Provincial de Educación de Gestión Privada,
                                        Municipal y Cooperativa</strong> en temas de ofertas educativas y titulación.
                                    </li>
                                    <li>
                                        Trabajo conjunto con <strong>Juntas de Clasificación</strong> de los distintos niveles
                                        del sistema educativo provincial.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /contenido -->
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
