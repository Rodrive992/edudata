{{-- resources/views/edudata/partials/tareas-edu-tecnica.blade.php --}}

@php
    $openDefault = $openDefault ?? false;
    $anio = $anio ?? 2025;
@endphp

<style>
    /* --- Panel de acciones con solapa azul (solo desktop) --- */
    .acciones-panel-desktop {
        --shadow-soft: 0 20px 40px rgba(0, 0, 0, 0.1);
        --hover-glow: 0 0 20px rgba(30, 58, 138, 0.3);
        
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        z-index: 9999;
        pointer-events: none;
        font-family: 'Open Sans', sans-serif;
        display: none;
    }

    @media (min-width: 1025px) {
        .acciones-panel-desktop {
            display: block;
        }
    }

    /* Solapa azul desktop */
    .acciones-panel-desktop .acciones-trigger {
        position: absolute;
        left: -100px;
        top: 50%;
        transform: translateY(-50%);
        width: 90px;
        border-radius: 20px 0 0 20px;
        background: #1e3a8a;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-right: none;
        box-shadow: var(--shadow-soft), 0 0 0 1px rgba(255, 255, 255, 0.2);
        padding: 1.25rem .75rem;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: .45rem;
        pointer-events: all;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .acciones-panel-desktop .acciones-trigger:hover {
        transform: translateY(-50%) scale(1.05);
        box-shadow: var(--hover-glow), 0 8px 25px rgba(0, 0, 0, 0.15);
        background: #2563eb;
        left: -105px;
    }

    .acciones-panel-desktop .acciones-trigger .acciones-trigger-icon {
        width: 42px;
        height: 42px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .acciones-panel-desktop .acciones-trigger .acciones-trigger-label {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        font-size: .85rem;
        letter-spacing: .15em;
        font-weight: 600;
        text-transform: uppercase;
        color: #ffffff;
    }

    /* Superficie del panel desktop */
    .acciones-panel-desktop .acciones-surface {
        width: 450px;
        max-height: 85vh;
        background: #ffffff;
        border-radius: 20px 0 0 20px;
        border: 2px solid rgba(255, 255, 255, 0.9);
        border-right: none;
        box-shadow: var(--shadow-soft);
        overflow: hidden;
        pointer-events: all;
        display: flex;
        flex-direction: column;
    }

    /* Header del panel */
    .acciones-panel-desktop .acciones-head {
        padding: 16px 20px;
        border-bottom: 1px solid rgba(100, 116, 139, 0.1);
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-shrink: 0;
    }

    .acciones-panel-desktop .acciones-head h3 {
        font-size: 1rem;
        font-weight: 600;
        margin: 0;
        color: #1e293b;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .acciones-panel-desktop .acciones-head h3 span {
        background: #1e3a8a;
        color: white;
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 0.8rem;
    }

    .acciones-panel-desktop .acciones-close {
        background: transparent;
        color: #64748b;
        border: none;
        border-radius: 4px;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.2rem;
    }

    .acciones-panel-desktop .acciones-close:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    /* Body del panel */
    .acciones-panel-desktop .acciones-body {
        padding: 20px;
        flex: 1;
        overflow-y: auto;
    }

    /* --- Versión móvil: botón flotante y modal --- */
    .acciones-mobile {
        display: block;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        font-family: 'Open Sans', sans-serif;
    }

    @media (min-width: 1025px) {
        .acciones-mobile {
            display: none;
        }
    }

    .acciones-mobile-button {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #1e3a8a;
        color: white;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }

    .acciones-mobile-button:hover {
        background: #2563eb;
        transform: scale(1.1);
    }

    .acciones-mobile-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }

    .acciones-mobile-modal.hidden {
        display: none;
    }

    .acciones-mobile-content {
        background: white;
        border-radius: 24px;
        width: 100%;
        max-width: 400px;
        max-height: 80vh;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .acciones-mobile-header {
        padding: 16px 20px;
        background: #1e3a8a;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .acciones-mobile-header h3 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .acciones-mobile-header h3 span {
        background: rgba(255, 255, 255, 0.2);
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 0.8rem;
    }

    .acciones-mobile-close {
        background: transparent;
        color: white;
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        cursor: pointer;
    }

    .acciones-mobile-close:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .acciones-mobile-body {
        padding: 16px;
        max-height: calc(80vh - 80px);
        overflow-y: auto;
    }

    /* Estilos comunes para las tarjetas de acciones */
    .acciones-lista {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .accion-item {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        overflow: hidden;
    }

    .accion-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .accion-numero {
        width: 30px;
        height: 30px;
        background: #1e3a8a;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
        flex-shrink: 0;
    }

    .accion-titulo {
        font-weight: 700;
        color: #0f172a;
        font-size: 0.9rem;
        line-height: 1.4;
    }

    .accion-contenido {
        padding: 12px 16px;
        background: white;
    }

    .accion-descripcion {
        font-size: 0.85rem;
        color: #334155;
        line-height: 1.5;
        margin: 0;
    }

    .accion-footer {
        margin-top: 8px;
        display: flex;
        justify-content: flex-end;
    }

    .accion-badge {
        background: #f1f5f9;
        color: #475569;
        font-size: 0.65rem;
        padding: 4px 8px;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
    }

    /* Animación pulse */
    @keyframes pulse-glow {
        0% { box-shadow: 0 0 0 0 rgba(30, 58, 138, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(30, 58, 138, 0); }
        100% { box-shadow: 0 0 0 0 rgba(30, 58, 138, 0); }
    }

    .pulse { 
        animation: pulse-glow 2s infinite; 
    }
</style>

<!-- VERSIÓN DESKTOP -->
<div class="acciones-panel-desktop" 
     x-data="{ isOpen: false }"
     @keydown.window.escape="isOpen = false">

    <!-- Solapa azul -->
    <button class="acciones-trigger" 
            :class="{ 'pulse': !isOpen }" 
            @click="isOpen = !isOpen">
        <div class="acciones-trigger-icon">📋</div>
        <span class="acciones-trigger-label">ACCIONES 2025</span>
    </button>

    <!-- Panel -->
    <section class="acciones-surface" 
             x-show="isOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-x-full"
             x-transition:enter-end="opacity-100 transform translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-x-0"
             x-transition:leave-end="opacity-0 transform translate-x-full"
             @click.away="isOpen = false">

        <div class="acciones-head">
            <h3>📋 Acciones 2025 <span>14</span></h3>
            <button class="acciones-close" @click="isOpen = false">×</button>
        </div>

        <div class="acciones-body">
            <div class="acciones-lista">
                <!-- Acción 1 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">1</div>
                        <div class="accion-titulo">Congreso Nacional de Educación Técnica Agropecuaria – Encuentro Regional NOA</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Organización y desarrollo del congreso que reunió a instituciones educativas, sectores productivos y autoridades de la región NOA para fortalecer la educación técnica y agropecuaria.</p>
                        <div class="accion-footer">
                            <span class="accion-badge">Junio 2025</span>
                        </div>
                    </div>
                </div>

                <!-- Acción 2 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">2</div>
                        <div class="accion-titulo">Lanzamiento del Consejo Provincial de Educación, Trabajo y Producción (CoPETyP)</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Puesta en funcionamiento de un espacio de articulación entre el sistema educativo y el sector productivo, orientado a mejorar la empleabilidad de los egresados y fortalecer las prácticas profesionalizantes.</p>
                    </div>
                </div>

                <!-- Acción 3 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">3</div>
                        <div class="accion-titulo">Capacitación y articulación pedagógica y bienestar institucional</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Desarrollo de capacitaciones y encuentros con equipos directivos y docentes para mejorar la articulación pedagógica y fortalecer el bienestar institucional de las escuelas técnicas y agrotécnicas de la provincia.</p>
                    </div>
                </div>

                <!-- Acción 4 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">4</div>
                        <div class="accion-titulo">Acompañamiento territorial del equipo técnico de la Dirección</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Visitas periódicas a las instituciones educativas para brindar asesoramiento, seguimiento y apoyo en la gestión académica y administrativa.</p>
                    </div>
                </div>

                <!-- Acción 5 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">5</div>
                        <div class="accion-titulo">Jornada en la Escuela Agrotécnica de Huaco – Semana de la Educación Agropecuaria</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Realización de actividades en el marco de la semana de la educación agropecuaria, fortaleciendo el vínculo entre la escuela y su entorno productivo.</p>
                    </div>
                </div>

                <!-- Acción 6 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">6</div>
                        <div class="accion-titulo">Acompañamiento en el aniversario 80 de la Escuela de Minería</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Participación y apoyo institucional en la conmemoración del 80° aniversario de la Escuela de Minería, reconociendo su trayectoria y aporte a la educación técnica provincial.</p>
                    </div>
                </div>

                <!-- Acción 7 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">7</div>
                        <div class="accion-titulo">Intervenciones ante situaciones complejas</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Acciones inmediatas y coordinadas ante situaciones problemáticas en escuelas técnicas y agrotécnicas, garantizando la continuidad pedagógica y el bienestar de la comunidad educativa.</p>
                    </div>
                </div>

                <!-- Acción 8 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">8</div>
                        <div class="accion-titulo">Firma de convenios con empresas</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Celebración de convenios con empresas para la realización de prácticas profesionalizantes de los estudiantes de 7° año de tres escuelas técnicas y agrotécnicas, fortaleciendo la vinculación escuela-trabajo.</p>
                    </div>
                </div>

                <!-- Acción 9 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">9</div>
                        <div class="accion-titulo">Articulación interministerial</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Trabajo conjunto con el Ministerio de Salud, Ministerio de Desarrollo Social y Ministerio de Desarrollo Productivo para implementar políticas integrales que impacten en la educación técnica y agrotécnica.</p>
                    </div>
                </div>

                <!-- Acción 10 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">10</div>
                        <div class="accion-titulo">Asistencia a Mesas Federales INET</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Participación en reuniones federales convocadas por el INET, representando a la provincia y gestionando recursos y programas destinados a la educación técnica.</p>
                    </div>
                </div>

                <!-- Acción 11 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">11</div>
                        <div class="accion-titulo">Reunión con centros de estudiantes</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Encuentro con representantes de centros de estudiantes de escuelas técnicas y agrotécnicas para fortalecer la participación estudiantil y promover el liderazgo juvenil.</p>
                    </div>
                </div>

                <!-- Acción 12 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">12</div>
                        <div class="accion-titulo">Inauguración del Centro Integral de Manejo Bovino</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Habilitación de un espacio destinado a la formación práctica de estudiantes en la Escuela Agroganadera Fray Vicente Alcaraz, con tecnología y equipamiento para el manejo integral de la producción bovina.</p>
                    </div>
                </div>

                <!-- Acción 13 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">13</div>
                        <div class="accion-titulo">Acompañamiento en el Rally del Poncho 2025</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Apoyo y asistencia a la participación de estudiantes de la EPET N° 6 en el Rally del Poncho, promoviendo la aplicación de conocimientos técnicos en eventos de relevancia provincial.</p>
                    </div>
                </div>

                <!-- Acción 14 -->
                <div class="accion-item">
                    <div class="accion-header">
                        <div class="accion-numero">14</div>
                        <div class="accion-titulo">Apoyo técnico a instituciones educativas</div>
                    </div>
                    <div class="accion-contenido">
                        <p class="accion-descripcion">Asistencia de las escuelas técnicas a escuelas primarias, secundarias y jardines de infantes mediante proyectos y trabajos orientados a la mejora y mantenimiento de las instalaciones edilicias, fortaleciendo la comunidad educativa y promoviendo el aprendizaje basado en proyectos.</p>
                    </div>
                </div>
            </div>
            
            <!-- Footer con resumen -->
            <div class="mt-6 text-xs text-gray-500 pt-4 border-t border-gray-200 text-center italic">
                Resumen ejecutivo de las principales acciones desarrolladas durante 2025
            </div>
        </div>
    </section>
</div>

<!-- VERSIÓN MÓVIL -->
<div class="acciones-mobile" x-data="{ isOpen: false }">
    <!-- Botón flotante -->
    <button class="acciones-mobile-button pulse" @click="isOpen = true">
        📋
    </button>

    <!-- Modal -->
    <div class="acciones-mobile-modal" :class="{ 'hidden': !isOpen }" @click="isOpen = false">
        <div class="acciones-mobile-content" @click.stop>
            <div class="acciones-mobile-header">
                <h3>📋 Acciones 2025 <span>14</span></h3>
                <button class="acciones-mobile-close" @click="isOpen = false">×</button>
            </div>
            <div class="acciones-mobile-body">
                <div class="acciones-lista">
                    <!-- Acción 1 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">1</div>
                            <div class="accion-titulo">Congreso Nacional de Educación Técnica Agropecuaria – Encuentro Regional NOA</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Organización y desarrollo del congreso que reunió a instituciones educativas, sectores productivos y autoridades de la región NOA para fortalecer la educación técnica y agropecuaria.</p>
                            <div class="accion-footer">
                                <span class="accion-badge">Junio 2025</span>
                            </div>
                        </div>
                    </div>

                    <!-- Acción 2 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">2</div>
                            <div class="accion-titulo">Lanzamiento del Consejo Provincial de Educación, Trabajo y Producción (CoPETyP)</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Puesta en funcionamiento de un espacio de articulación entre el sistema educativo y el sector productivo, orientado a mejorar la empleabilidad de los egresados y fortalecer las prácticas profesionalizantes.</p>
                        </div>
                    </div>

                    <!-- Acción 3 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">3</div>
                            <div class="accion-titulo">Capacitación y articulación pedagógica y bienestar institucional</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Desarrollo de capacitaciones y encuentros con equipos directivos y docentes para mejorar la articulación pedagógica y fortalecer el bienestar institucional de las escuelas técnicas y agrotécnicas de la provincia.</p>
                        </div>
                    </div>

                    <!-- Acción 4 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">4</div>
                            <div class="accion-titulo">Acompañamiento territorial del equipo técnico de la Dirección</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Visitas periódicas a las instituciones educativas para brindar asesoramiento, seguimiento y apoyo en la gestión académica y administrativa.</p>
                        </div>
                    </div>

                    <!-- Acción 5 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">5</div>
                            <div class="accion-titulo">Jornada en la Escuela Agrotécnica de Huaco – Semana de la Educación Agropecuaria</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Realización de actividades en el marco de la semana de la educación agropecuaria, fortaleciendo el vínculo entre la escuela y su entorno productivo.</p>
                        </div>
                    </div>

                    <!-- Acción 6 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">6</div>
                            <div class="accion-titulo">Acompañamiento en el aniversario 80 de la Escuela de Minería</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Participación y apoyo institucional en la conmemoración del 80° aniversario de la Escuela de Minería, reconociendo su trayectoria y aporte a la educación técnica provincial.</p>
                        </div>
                    </div>

                    <!-- Acción 7 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">7</div>
                            <div class="accion-titulo">Intervenciones ante situaciones complejas</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Acciones inmediatas y coordinadas ante situaciones problemáticas en escuelas técnicas y agrotécnicas, garantizando la continuidad pedagógica y el bienestar de la comunidad educativa.</p>
                        </div>
                    </div>

                    <!-- Acción 8 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">8</div>
                            <div class="accion-titulo">Firma de convenios con empresas</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Celebración de convenios con empresas para la realización de prácticas profesionalizantes de los estudiantes de 7° año de tres escuelas técnicas y agrotécnicas, fortaleciendo la vinculación escuela-trabajo.</p>
                        </div>
                    </div>

                    <!-- Acción 9 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">9</div>
                            <div class="accion-titulo">Articulación interministerial</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Trabajo conjunto con el Ministerio de Salud, Ministerio de Desarrollo Social y Ministerio de Desarrollo Productivo para implementar políticas integrales que impacten en la educación técnica y agrotécnica.</p>
                        </div>
                    </div>

                    <!-- Acción 10 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">10</div>
                            <div class="accion-titulo">Asistencia a Mesas Federales INET</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Participación en reuniones federales convocadas por el INET, representando a la provincia y gestionando recursos y programas destinados a la educación técnica.</p>
                        </div>
                    </div>

                    <!-- Acción 11 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">11</div>
                            <div class="accion-titulo">Reunión con centros de estudiantes</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Encuentro con representantes de centros de estudiantes de escuelas técnicas y agrotécnicas para fortalecer la participación estudiantil y promover el liderazgo juvenil.</p>
                        </div>
                    </div>

                    <!-- Acción 12 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">12</div>
                            <div class="accion-titulo">Inauguración del Centro Integral de Manejo Bovino</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Habilitación de un espacio destinado a la formación práctica de estudiantes en la Escuela Agroganadera Fray Vicente Alcaraz, con tecnología y equipamiento para el manejo integral de la producción bovina.</p>
                        </div>
                    </div>

                    <!-- Acción 13 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">13</div>
                            <div class="accion-titulo">Acompañamiento en el Rally del Poncho 2025</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Apoyo y asistencia a la participación de estudiantes de la EPET N° 6 en el Rally del Poncho, promoviendo la aplicación de conocimientos técnicos en eventos de relevancia provincial.</p>
                        </div>
                    </div>

                    <!-- Acción 14 -->
                    <div class="accion-item">
                        <div class="accion-header">
                            <div class="accion-numero">14</div>
                            <div class="accion-titulo">Apoyo técnico a instituciones educativas</div>
                        </div>
                        <div class="accion-contenido">
                            <p class="accion-descripcion">Asistencia de las escuelas técnicas a escuelas primarias, secundarias y jardines de infantes mediante proyectos y trabajos orientados a la mejora y mantenimiento de las instalaciones edilicias, fortaleciendo la comunidad educativa y promoviendo el aprendizaje basado en proyectos.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Footer con resumen -->
                <div class="mt-6 text-xs text-gray-500 pt-4 border-t border-gray-200 text-center italic">
                    Resumen ejecutivo de las principales acciones desarrolladas durante 2025
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        // Alpine ya está inicializado, no necesitamos hacer nada más
    });
</script>