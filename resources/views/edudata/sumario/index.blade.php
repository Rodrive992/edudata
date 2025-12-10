@extends('layouts.app')

@section('title', 'Sumario Docente')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-[color:var(--gray-200)] overflow-hidden mb-6">
            <!-- Encabezado con imagen redondeada -->
            <div class="p-4 md:p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-sumario.png') }}" alt="Dirección Provincial de Sumario Docente"
                        class="w-full max-w-2xl h-auto object-contain rounded-xl">
                </div>

                <!-- Texto descriptivo principal -->
                <div class="mb-4 md:mb-6">
                    <div class="space-y-4">
                        <!-- Bloque destacado similar al ejemplo -->
                        <div class="bg-gradient-to-br from-[#f0f4ff] to-[#f8f7ff] rounded-xl p-4 md:p-5 my-4 border border-[color:var(--pri-500)]/20"
                            style="--tw-gradient-from: #f0f4ff; --tw-gradient-to: #f8f7ff;">
                            <!-- Descripción principal -->
                            <div class="text-center mb-4 md:mb-5">
                                <p class="text-[color:var(--ink)] leading-relaxed text-base md:text-lg">
                                    La <span class="font-semibold text-[color:var(--pri-700)]">Dirección Provincial de
                                        Sumario Docente</span>,
                                    dependiente de la <span class="font-medium text-[color:var(--ter-500)]">Secretaría de
                                        Articulación Institucional</span>,
                                    es el órgano encargado de llevar adelante las
                                    <span class="bg-[color:var(--sec-500)]/20 px-1 rounded">investigaciones
                                        sumariales</span>
                                    por conductas presuntamente irregulares o de indisciplina del personal docente
                                    del Ministerio de Educación de la provincia de Catamarca.
                                </p>
                            </div>

                            <!-- Características en grid (3 columnas) -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
                                <!-- Característica 1 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--sec-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--sec-500)]" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-7 7-4-4m0 8h12" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">
                                                Procedimientos Sumariales
                                            </p>
                                            <p class="text-xs text-gray-600 mt-1">
                                                Especiales, presumariales, abreviados y sumariales.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 2 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--pri-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-500)]" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6M5 7h14M5 5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">
                                                Incompatibilidades Docentes
                                            </p>
                                            <p class="text-xs text-gray-600 mt-1">
                                                Intervención en expedientes remitidos por Recursos Humanos Docentes.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Característica 3 -->
                                <div class="feature-card group p-3">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[color:var(--ter-500)]/10 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--ter-500)]" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-[color:var(--ink)]">
                                                Protección de Derechos
                                            </p>
                                            <p class="text-xs text-gray-600 mt-1">
                                                Actuaciones en el marco de leyes nacionales y provinciales de protección.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Etiquetas informativas -->
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <div
                                    class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--pri-500)] rounded-full mr-2"></span>
                                    Sumarios docentes
                                </div>
                                <div
                                    class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--sec-500)] rounded-full mr-2"></span>
                                    Incompatibilidades
                                </div>
                                <div
                                    class="inline-flex items-center bg-white px-3 py-1 rounded-full text-xs md:text-sm text-gray-700 border border-[color:var(--gray-200)]">
                                    <span class="w-2 h-2 bg-[color:var(--ter-500)] rounded-full mr-2"></span>
                                    Normativa y protección de derechos
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido específico de Sumario Docente -->
            <div class="p-4 md:p-6 pt-4">
                <!-- 1. Organigrama y autoridades -->
                <div class="mb-6">
                    <div
                        class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] p-4 md:p-6 flex flex-col h-full">

                        <!-- Encabezado -->
                        <div class="flex items-center mb-4">
                            <div class="bg-[color:var(--pri-500)]/10 p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[color:var(--pri-500)]"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM3 21a7 7 0 0114 0H3zM17 11h4m-2-2v4" />
                                </svg>
                            </div>
                            <h2 class="text-lg md:text-xl font-semibold text-[color:var(--ink)]">
                                Organigrama y autoridades del área
                            </h2>
                        </div>

                        <div class="text-[color:var(--ink)] leading-relaxed text-sm md:text-base space-y-4">
                            <!-- Descripción general -->
                            <p class="text-justify">
                                La <strong>Dirección Provincial de Sumarios Docentes</strong>, con
                                la <strong>directora a cargo Dra. Samhara Saleme</strong>, depende de la
                                <strong>Secretaría de Articulación Institucional</strong> del Ministerio de Educación,
                                Ciencia y Tecnología de la Provincia de Catamarca.
                            </p>

                            <!-- Bloque: nivel superior -->
                            <div class="bg-[color:var(--gray-100)] rounded-lg border border-[color:var(--gray-300)] p-3">
                                <p class="text-[11px] font-semibold text-gray-600 uppercase tracking-wide">
                                    Ministerio de Educación, Ciencia y Tecnología
                                </p>
                                <p class="text-[11px] font-semibold text-gray-600 uppercase tracking-wide">
                                    Secretaría de Articulación Institucional
                                </p>
                                <p class="mt-1 text-sm font-semibold text-[color:var(--pri-700)]">
                                    Dirección Provincial de Sumario Docente
                                </p>
                                <p class="text-xs text-gray-700">
                                    Directora a cargo: <strong>Dra. Samhara Saleme</strong>
                                </p>
                            </div>

                            <!-- Bloque: Departamentos -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <!-- Departamento Coordinación y Gestión Administrativa -->
                                <div
                                    class="bg-[color:var(--pri-500)]/5 rounded-lg border border-[color:var(--pri-500)]/20 p-3">
                                    <p
                                        class="text-[11px] font-semibold text-[color:var(--pri-700)] uppercase tracking-wide mb-1">
                                        Departamento Coordinación y Gestión Administrativa
                                    </p>
                                    <p class="text-xs mb-2">
                                        Responsable: <strong>Ruth Cisternas</strong>
                                    </p>
                                    <div class="grid grid-cols-1 gap-2 text-xs">
                                        <div class="bg-white/80 rounded-md border border-[color:var(--pri-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--pri-700)]">Mesa Gral. de Entrada y
                                                Salida</p>
                                            <p>Romero Alejandra</p>
                                        </div>
                                        <div class="bg-white/80 rounded-md border border-[color:var(--pri-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--pri-700)]">Patrimonio</p>
                                            <p>Vega Kevin</p>
                                        </div>
                                        <div class="bg-white/80 rounded-md border border-[color:var(--pri-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--pri-700)]">Notificaciones</p>
                                            <p>Bulacios Marcelo</p>
                                        </div>
                                        <div class="bg-white/80 rounded-md border border-[color:var(--pri-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--pri-700)]">Archivo</p>
                                            <p>Brizuela Ramona – Gordillo Noelia</p>
                                        </div>
                                        <div class="bg-white/80 rounded-md border border-[color:var(--pri-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--pri-700)]">Recursos Humanos</p>
                                            <p>Ramírez Carolina</p>
                                        </div>
                                        <div class="bg-white/80 rounded-md border border-[color:var(--pri-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--pri-700)]">Servicios Generales</p>
                                            <p>Nieva Fernando – Sánchez Rebeca</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Departamento Legales -->
                                <div
                                    class="bg-[color:var(--sec-500)]/5 rounded-lg border border-[color:var(--sec-500)]/20 p-3">
                                    <p
                                        class="text-[11px] font-semibold text-[color:var(--sec-500)] uppercase tracking-wide mb-1">
                                        Departamento Legales
                                    </p>
                                    <p class="text-xs mb-2">
                                        Responsable: <strong>Dr. Rojas Varela Francisco</strong>
                                    </p>

                                    <div class="grid grid-cols-1 gap-2 text-xs">
                                        <div class="bg-white/80 rounded-md border border-[color:var(--sec-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--sec-500)]">Asesoría Legal</p>
                                            <p>
                                                Dr. Agüero Luis, Dra. Ariza Rosa, Dr. Barrientos Orlando,
                                                Dra. Gallo Vanesa, Dra. García A. Griselda, Dra. Moreno Lorena,
                                                Yesica Valeria Serrano.
                                            </p>
                                        </div>
                                        <div class="bg-white/80 rounded-md border border-[color:var(--sec-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--sec-500)]">Denuncias</p>
                                            <p>Lic. Antun – Báez Silvana</p>
                                        </div>
                                        <div class="bg-white/80 rounded-md border border-[color:var(--sec-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--sec-500)]">Registro Único de
                                                Reincidencia</p>
                                            <p>Brizuela Ramona</p>
                                        </div>
                                        <div class="bg-white/80 rounded-md border border-[color:var(--sec-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--sec-500)]">Inst. Sumarial y Sec.
                                                Actuantes</p>
                                            <p>Asesores y administrativos</p>
                                        </div>
                                        <div class="bg-white/80 rounded-md border border-[color:var(--sec-500)]/10 p-2">
                                            <p class="font-semibold text-[color:var(--sec-500)]">Incompatibilidades</p>
                                            <p>Heredia Luciana – Luna Mónica – Luna Valentín</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Resumen numérico -->
                            <div class="pt-4 mt-3 border-t border-[color:var(--gray-200)]">
                                <p class="text-xs font-semibold text-gray-600 mb-2">
                                    Síntesis de dotación del área
                                </p>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                    <div
                                        class="bg-[color:var(--pri-500)]/5 p-3 rounded-lg border border-[color:var(--pri-500)]/20 text-center">
                                        <p class="text-[11px] font-semibold text-[color:var(--pri-700)] uppercase">
                                            Agentes administrativos
                                        </p>
                                        <p class="text-xl font-bold text-[color:var(--pri-700)]">16</p>
                                    </div>
                                    <div
                                        class="bg-[color:var(--sec-500)]/5 p-3 rounded-lg border border-[color:var(--sec-500)]/20 text-center">
                                        <p class="text-[11px] font-semibold text-[color:var(--sec-500)] uppercase">
                                            Asesores legales
                                        </p>
                                        <p class="text-xl font-bold text-[color:var(--sec-500)]">8</p>
                                    </div>
                                    <div
                                        class="bg-[color:var(--ter-500)]/5 p-3 rounded-lg border border-[color:var(--ter-500)]/20 text-center">
                                        <p class="text-[11px] font-semibold text-[color:var(--ter-500)] uppercase">
                                            Total de agentes
                                        </p>
                                        <p class="text-xl font-bold text-[color:var(--ter-500)]">24</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- 2. Programas / Funciones -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div
                        class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)] flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-500)] mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6M8 6h8" />
                        </svg>
                        <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                            2. Funciones y procedimientos del organismo
                        </h3>
                    </div>
                    <div class="p-4 md:p-6 text-sm md:text-base text-[color:var(--ink)] leading-relaxed space-y-3">
                        <p class="text-justify">
                            La Dirección Provincial de Sumarios tiene como función central la tramitación de
                            <strong>instancias sumariales</strong>
                            para el personal docente.
                        </p>
                        <p>
                            Los trámites que se instruyen comprenden:
                        </p>
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Procedimientos especiales.</li>
                            <li>Procedimientos de investigación presumarial.</li>
                            <li>Procedimientos sumarial abreviado.</li>
                            <li>Procedimientos sumarial.</li>
                        </ul>
                        <p class="text-justify">
                            Asimismo, el organismo interviene en los expedientes remitidos por la
                            <strong>Dirección Provincial de Recursos Humanos Docentes</strong> del MTPRH vinculados a
                            <strong>incompatibilidades docentes</strong>, regidas por el Decreto 1483/93, el Estatuto
                            Docente (Ley 3122), el Nomenclador de Cargos (Decreto 2431), normativa sobre jornada
                            extendida y dictámenes plenarios de AGG, entre otros.
                        </p>
                    </div>
                </div>

                <!-- 3. Normativa aplicable -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div
                        class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)] flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-500)] mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v12m0-12L6 9m6-3l6 3" />
                        </svg>
                        <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                            3. Normativa aplicable al funcionamiento del área
                        </h3>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div
                                class="bg-[color:var(--pri-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--pri-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--pri-700)] mb-3">
                                    Marco normativo principal
                                </h4>

                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--pri-600)] text-sm md:text-base mb-4">
                                    <li><strong>Decreto 413/2000</strong> – Reglamento de Sumarios (ámbito provincial).</li>
                                    <li>Ley Federal de Educación Nº 24.195 (implementada en la provincia por Ley 4.843).
                                    </li>
                                    <li>Estatuto del Docente Provincial – Ley N.º 3.122.</li>
                                    <li><strong>Decreto 641/02</strong> – agrega arts. 83 a 87 al Reglamento de Sumarios.
                                    </li>
                                    <li><strong>Decreto Acuerdo 1.092/15</strong> – Régimen de licencias, justificaciones y
                                        franquicias para personal docente.</li>
                                </ul>

                                <!-- Botón consultar normativa -->
                                <div class="mt-3">
                                    <a href="{{ route('edudata.normativa') }}"
                                        class="inline-flex items-center justify-center w-full md:w-auto px-4 py-2
                                            bg-[color:var(--pri-700)] text-white text-sm font-medium rounded-lg
                                            hover:bg-[color:var(--pri-500)] transition">
                                        Consultar normativa
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div
                                class="bg-[color:var(--acc-500)]/5 p-4 md:p-5 rounded-lg border border-[color:var(--acc-500)]/20">
                                <h4 class="text-base md:text-lg font-semibold text-[color:var(--acc-500)] mb-3">
                                    Procedimiento y protección de derechos
                                </h4>
                                <ul class="list-disc pl-5 space-y-2 text-[color:var(--acc-500)]/80 text-sm md:text-base">
                                    <li>Código de Procedimiento Administrativo de la Provincia – Ley N.º 5.893 y Decreto N.º
                                        1.247.</li>
                                    <li>Código Penal de la Nación.</li>
                                    <li>Código Procesal Penal de la Provincia de Catamarca.</li>
                                    <li>Ley Provincial N.º 5.381, Ley Nacional N.º 26.206 y Ley N.º 26.061
                                        de Protección Integral de los Derechos de Niñas, Niños y Adolescentes.
                                    </li>
                                    <li>Decreto 1.280/91 – Normas para la elaboración y diligenciamiento de actos y
                                        documentación administrativa.</li>
                                    <li>Ley 26.485 y Ley Provincial 5.860 – Protección integral a las mujeres y adhesión
                                        al Convenio sobre eliminación de la violencia y el acoso en el mundo del trabajo
                                        (Ley Nacional 27.580).
                                    </li>
                                    <li>Jurisprudencia de la CSJN y de la Corte de Justicia de Catamarca.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Datos presupuestarios -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div
                        class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)] flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--sec-500)] mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 14l2-2 2 2m-2-2v6m-7 4h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v15a2 2 0 002 2z" />
                        </svg>
                        <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                            4. Datos presupuestarios y de ejecución
                        </h3>
                    </div>
                    <div class="p-4 md:p-6 text-sm md:text-base text-[color:var(--ink)] leading-relaxed">
                        <p class="text-justify">
                            Mediante <strong>Resolución Ministerial RES-2025-264-E-CAT-MECYT</strong> se crea una
                            <strong>caja chica</strong> para la Dirección de Sumario Docente, destinada a la compra de
                            estampillado de correo para las cédulas de notificación dirigidas al interior de la provincia.
                        </p>
                    </div>
                </div>

                <!-- 5. Informes de gestión, estadísticas y resultados -->
                <div class="bg-white rounded-xl shadow-sm border border-[color:var(--gray-200)] overflow-hidden mb-6">
                    <div
                        class="px-4 md:px-6 py-4 border-b border-[color:var(--gray-200)] bg-[color:var(--gray-100)] flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 md:h-6 md:w-6 text-[color:var(--pri-700)] mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm6 0v-4a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2zM9 5a2 2 0 104 0 2 2 0 00-4 0z" />
                        </svg>
                        <h3 class="text-base md:text-lg font-semibold text-[color:var(--ink)]">
                            5. Informes de gestión, estadísticas y resultados
                        </h3>
                    </div>

                    <div class="p-4 md:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-4">
                            <div
                                class="bg-[color:var(--pri-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--pri-500)]/20">
                                <p class="text-[color:var(--pri-700)] text-2xl md:text-3xl font-bold">106</p>
                                <p class="text-[color:var(--pri-600)] font-medium text-sm md:text-base">
                                    Instrumentos legales (Disposiciones) emitidos al 06/11/2025.
                                </p>
                                <p class="text-xs text-gray-700 mt-1">
                                    Niveles Inicial, Primario, Secundario, Superior, Técnico y Modalidades.
                                </p>
                            </div>

                            <div
                                class="bg-[color:var(--sec-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--sec-500)]/20">
                                <p class="text-[color:var(--sec-500)] text-2xl md:text-3xl font-bold">303</p>
                                <p class="text-[color:var(--sec-500)]/80 font-medium text-sm md:text-base">
                                    Expedientes en curso en la Dirección.
                                </p>
                                <p class="text-xs text-gray-700 mt-1">
                                    Distribuidos entre el cuerpo de asesores legales y administrativos.
                                </p>
                            </div>

                            <div
                                class="bg-[color:var(--acc-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--acc-500)]/20">
                                <p class="text-[color:var(--acc-500)] text-2xl md:text-3xl font-bold">40</p>
                                <p class="text-[color:var(--acc-500)]/80 font-medium text-sm md:text-base">
                                    Docentes con medidas preventivas de movilidad de funciones.
                                </p>
                            </div>

                            <div
                                class="bg-[color:var(--ter-500)]/5 p-3 md:p-4 rounded-lg border border-[color:var(--ter-500)]/20">
                                <p class="text-[color:var(--ter-500)] text-2xl md:text-3xl font-bold">4</p>
                                <p class="text-[color:var(--ter-500)]/80 font-medium text-sm md:text-base">
                                    Docentes con suspensión de haberes y funciones.
                                </p>
                            </div>
                        </div>

                        <div
                            class="bg-[color:var(--gray-100)] p-3 md:p-4 rounded-lg border border-[color:var(--gray-200)] mb-4">
                            <p class="text-[color:var(--ink)] text-sm md:text-base">
                                En el presente año lectivo se elevaron <strong>6 causas concluidas</strong> con dictamen
                                legal aconsejando sanción expulsiva (<strong>cesantías y exoneración</strong>).
                            </p>
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
