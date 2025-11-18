@php
    $panelColor   = $panelColor   ?? '#f8fafc';
    $logoSrc      = $logoSrc      ?? asset('images/contrato.png');
    $triggerLabel = $triggerLabel ?? 'Solicitar';
    $openDefault  = isset($openDefault) ? (bool)$openDefault : false;
@endphp

<script>
    window.EDUDATA_NORMATIVA_OPEN = @json($openDefault);
</script>

<style>
    .normativa-panel {
        --panel-bg: {{ $panelColor }};
        --panel-grad: linear-gradient(180deg, var(--pri-100) 0%, #e2e8f0 100%);
        --panel-text: #334155;
        --panel-border: rgba(100, 116, 139, 0.2);
        --shadow-soft: 0 20px 40px rgba(0, 0, 0, 0.1);
        --accent-primary: var(--ter-500);
        --accent-secondary: var(--pri-700);
        --accent-tertiary: var(--acc-500);
        --hover-glow: 0 0 20px rgba(101, 168, 163, 0.3);
    }

    .normativa-panel {
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        z-index: 88;
        pointer-events: none;
        font-family: 'Open Sans', sans-serif;
    }

    /* Solapa lateral - MANTENIENDO TAMAÑO ORIGINAL */
    .normativa-panel .normativa-trigger {
        position: absolute;
        left: -100px;
        top: 50%;
        transform: translateY(-50%);
        width: 90px;
        border-radius: 20px 0 0 20px;
        background: var(--panel-grad);
        color: var(--panel-text);
        border: 2px solid var(--panel-border);
        border-right: none;
        box-shadow: 
            var(--shadow-soft),
            0 0 0 1px rgba(255, 255, 255, 0.8);
        padding: 1.25rem .75rem;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: .75rem;
        pointer-events: all;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(10px);
    }

    .normativa-panel .normativa-trigger:hover {
        transform: translateY(-50%) scale(1.08);
        box-shadow: 
            var(--hover-glow),
            0 8px 25px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(101, 168, 163, 0.3);
        background: linear-gradient(180deg, #ffffff 0%, var(--pri-100) 100%);
    }

    .normativa-panel .normativa-trigger img {
        width: 42px;
        height: 42px;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        transition: all 0.3s ease;
    }

    .normativa-panel .normativa-trigger:hover img {
        transform: scale(1.1) rotate(5deg);
        filter: drop-shadow(0 4px 8px rgba(101, 168, 163, 0.3));
    }

    .normativa-panel .normativa-trigger .normativa-trigger-label {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        font-size: .85rem;
        letter-spacing: .15em;
        font-weight: 700;
        text-transform: uppercase;
        color: #475569;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
        font-family: 'Open Sans', sans-serif;
    }

    /* Panel principal - MÁS COMPACTO PERO MANTENIENDO PROPORCIONES */
    .normativa-panel .normativa-surface {
        width: 50vw;
        max-width: 500px;
        min-width: 400px;
        max-height: 75vh;
        background: linear-gradient(160deg, #ffffff 0%, #f8fafc 50%, #f1f5f9 100%);
        color: var(--panel-text);
        border-radius: 20px 0 0 20px;
        border: 2px solid rgba(255, 255, 255, 0.8);
        border-right: none;
        box-shadow: 
            var(--shadow-soft),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        overflow: hidden;
        pointer-events: all;
        backdrop-filter: blur(15px);
    }

    /* Header COMPACTO */
    .normativa-panel .normativa-head {
        padding: 16px 20px;
        border-bottom: 1px solid rgba(100, 116, 139, 0.1);
        text-align: center;
        background: linear-gradient(90deg, rgba(101, 168, 163, 0.05), rgba(64, 92, 164, 0.05));
        position: relative;
        overflow: hidden;
    }

    .normativa-panel .normativa-head::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary), var(--accent-tertiary));
        border-radius: 0 0 3px 3px;
    }

    .normativa-panel .normativa-head h3 {
        font-size: 1.2rem;
        font-weight: 800;
        margin: 0;
        position: relative;
        display: inline-block;
        background: linear-gradient(135deg, var(--ter-500), var(--pri-700), var(--acc-500));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.01em;
        font-family: 'Open Sans', sans-serif;
    }

    .normativa-panel .normativa-head h3::after {
        content: "📋";
        position: absolute;
        right: -28px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.9rem;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    /* Body - CONTENIDO MÁS COMPACTO */
    .normativa-panel .normativa-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        height: calc(75vh - 60px);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.98));
        overflow-y: auto;
        align-items: center;
        text-align: center;
    }

    /* Contenedor principal más compacto */
    .normativa-content {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        max-width: 100%;
        width: 100%;
    }

    /* Icono principal */
    .normativa-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto;
        background: linear-gradient(135deg, var(--ter-500), var(--pri-700));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        box-shadow: 0 6px 20px rgba(101, 168, 163, 0.2);
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    /* Mensaje compacto */
    .normativa-message {
        font-size: 0.95rem;
        line-height: 1.5;
        color: #475569;
        text-align: center;
        margin: 0;
        padding: 0 0.5rem;
        font-family: 'Open Sans', sans-serif;
    }

    .normativa-message strong {
        color: #1e293b;
        font-weight: 700;
    }

    /* Botón de acción compacto */
    .normativa-action {
        margin: 0.5rem 0;
    }

    .btn-solicitud {
        background: linear-gradient(135deg, var(--ter-500), var(--pri-700));
        color: white;
        border: none;
        border-radius: 10px;
        padding: 0.9rem 1.5rem;
        font-size: 1rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(101, 168, 163, 0.4);
        cursor: pointer;
        width: 100%;
        justify-content: center;
        max-width: 280px;
        margin: 0 auto;
        font-family: 'Open Sans', sans-serif;
    }

    .btn-solicitud:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(101, 168, 163, 0.5);
        background: linear-gradient(135deg, var(--pri-700), var(--pri-900));
        color: white;
        text-decoration: none;
    }

    .btn-solicitud:active {
        transform: translateY(0);
    }

    /* Separador visual compacto */
    .normativa-separator {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin: 0.5rem 0;
        color: #94a3b8;
        font-size: 0.8rem;
        font-weight: 600;
        font-family: 'Open Sans', sans-serif;
    }

    .normativa-separator::before,
    .normativa-separator::after {
        content: "";
        flex: 1;
        height: 1px;
        background: linear-gradient(90deg, transparent, #cbd5e1, transparent);
    }

    /* Pasos más compactos */
    .normativa-steps {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        width: 100%;
    }

    .normativa-step {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        padding: 0.75rem;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 10px;
        border-left: 3px solid var(--accent-primary);
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .normativa-step:hover {
        transform: translateX(3px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.9);
    }

    .step-number {
        width: 24px;
        height: 24px;
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: 700;
        flex-shrink: 0;
        margin-top: 0.1rem;
        font-family: 'Open Sans', sans-serif;
    }

    .step-content {
        flex: 1;
        text-align: left;
    }

    .step-title {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.2rem;
        font-size: 0.9rem;
        font-family: 'Open Sans', sans-serif;
    }

    .step-description {
        color: #64748b;
        font-size: 0.8rem;
        line-height: 1.4;
        margin: 0;
        font-family: 'Open Sans', sans-serif;
    }

    /* Nota final compacta */
    .normativa-note {
        font-size: 0.8rem;
        color: #64748b;
        text-align: center;
        margin-top: 0.75rem;
        padding: 0.75rem;
        background: rgba(241, 245, 249, 0.7);
        border-radius: 8px;
        border: 1px solid rgba(100, 116, 139, 0.1);
        line-height: 1.4;
        font-family: 'Open Sans', sans-serif;
    }

    .normativa-note strong {
        color: #475569;
    }

    /* Scrollbar personalizado */
    .normativa-body::-webkit-scrollbar {
        width: 4px;
    }

    .normativa-body::-webkit-scrollbar-track {
        background: rgba(100, 116, 139, 0.1);
        border-radius: 2px;
    }

    .normativa-body::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        border-radius: 2px;
    }

    .normativa-body::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, var(--pri-700), var(--pri-900));
    }

    /* Animaciones para dinamismo */
    @keyframes pulse-glow-normativa {
        0% {
            box-shadow: 0 0 0 0 rgba(101, 168, 163, 0.4);
        }
        70% {
            box-shadow: 0 0 0 8px rgba(101, 168, 163, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(101, 168, 163, 0);
        }
    }

    .normativa-trigger.pulse {
        animation: pulse-glow-normativa 2s infinite;
    }

    /* =========================== */
    /* MEDIA QUERIES PARA MÓVILES  */
    /* =========================== */
    
    /* Para tablets y móviles */
    @media (max-width: 1024px) {
        .normativa-panel {
            position: fixed;
            top: auto;
            bottom: 20px;
            right: 20px;
            left: auto;
            transform: none;
            z-index: 88;
        }

        /* Solapa móvil - botón flotante */
        .normativa-panel .normativa-trigger {
            position: relative;
            left: auto;
            top: auto;
            transform: none;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px solid var(--panel-border);
            padding: 0;
            flex-direction: row;
            justify-content: center;
            box-shadow: 
                0 8px 25px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.8);
        }

        .normativa-panel .normativa-trigger:hover {
            transform: scale(1.1);
        }

        .normativa-panel .normativa-trigger .normativa-trigger-label {
            display: none; /* Ocultar label en móvil */
        }

        .normativa-panel .normativa-trigger img {
            width: 35px;
            height: 35px;
            margin: 0;
        }

        /* Panel móvil - ocupa toda la pantalla */
        .normativa-panel .normativa-surface {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100vw;
            max-width: none;
            min-width: auto;
            max-height: 100vh;
            border-radius: 0;
            border: none;
            z-index: 100;
        }

        /* Header móvil más compacto */
        .normativa-panel .normativa-head {
            padding: 12px 16px;
        }

        .normativa-panel .normativa-head h3 {
            font-size: 1.1rem;
        }

        .normativa-panel .normativa-head h3::after {
            right: -25px;
            font-size: 0.8rem;
        }

        /* Body móvil con mejor espaciado */
        .normativa-panel .normativa-body {
            padding: 16px;
            gap: 1rem;
            height: calc(100vh - 60px);
        }

        /* Contenido móvil más compacto */
        .normativa-content {
            gap: 1.25rem;
        }

        /* Icono móvil */
        .normativa-icon {
            width: 55px;
            height: 55px;
            font-size: 1.3rem;
        }

        /* Mensaje móvil */
        .normativa-message {
            font-size: 0.9rem;
            padding: 0;
        }

        /* Botón móvil */
        .btn-solicitud {
            padding: 0.85rem 1.25rem;
            font-size: 0.95rem;
            max-width: 260px;
        }

        /* Pasos móviles más compactos */
        .normativa-steps {
            gap: 0.6rem;
        }

        .normativa-step {
            padding: 0.65rem;
            gap: 0.65rem;
        }

        .step-number {
            width: 22px;
            height: 22px;
            font-size: 0.7rem;
        }

        .step-title {
            font-size: 0.85rem;
        }

        .step-description {
            font-size: 0.75rem;
        }

        /* Nota móvil */
        .normativa-note {
            font-size: 0.75rem;
            padding: 0.65rem;
            margin-top: 0.5rem;
        }
    }

    /* Para móviles muy pequeños */
    @media (max-width: 480px) {
        .normativa-panel {
            bottom: 15px;
            right: 15px;
        }

        .normativa-panel .normativa-trigger {
            width: 60px;
            height: 60px;
        }

        .normativa-panel .normativa-trigger img {
            width: 30px;
            height: 30px;
        }

        .normativa-panel .normativa-head h3 {
            font-size: 1rem;
        }

        .normativa-panel .normativa-body {
            padding: 12px;
            gap: 0.85rem;
        }

        .normativa-content {
            gap: 1rem;
        }

        .normativa-icon {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .normativa-message {
            font-size: 0.85rem;
        }

        .btn-solicitud {
            padding: 0.8rem 1rem;
            font-size: 0.9rem;
            max-width: 240px;
        }

        .normativa-steps {
            gap: 0.5rem;
        }

        .normativa-step {
            padding: 0.6rem;
            gap: 0.6rem;
        }

        .step-number {
            width: 20px;
            height: 20px;
            font-size: 0.65rem;
        }

        .step-title {
            font-size: 0.8rem;
        }

        .step-description {
            font-size: 0.7rem;
        }

        .normativa-note {
            font-size: 0.7rem;
            padding: 0.6rem;
        }
    }

    /* Para tablets en orientación horizontal */
    @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
        .normativa-panel .normativa-surface {
            max-height: 85vh;
        }

        .normativa-panel .normativa-body {
            height: calc(85vh - 60px);
        }
    }

    /* Media queries existentes para desktop */
    @media (max-width: 1400px) {
        .normativa-panel .normativa-surface {
            width: 45vw;
            max-width: 480px;
        }
    }

    @media (max-width: 1200px) {
        .normativa-panel .normativa-surface {
            width: 40vw;
            min-width: 380px;
        }
        
        .normativa-message {
            font-size: 0.9rem;
        }
        
        .btn-solicitud {
            padding: 0.8rem 1.25rem;
            font-size: 0.95rem;
            max-width: 250px;
        }
    }

    /* Para pantallas más pequeñas en altura */
    @media (max-height: 700px) {
        .normativa-panel .normativa-surface {
            max-height: 65vh;
        }
        
        .normativa-panel .normativa-body {
            height: calc(65vh - 60px);
            gap: 1rem;
            padding: 15px;
        }
        
        .normativa-content {
            gap: 1rem;
        }
        
        .normativa-steps {
            gap: 0.5rem;
        }
        
        .normativa-step {
            padding: 0.6rem;
        }
    }
</style>

<div class="normativa-panel"
     x-data="normativaPanel({ openDefault: window.EDUDATA_NORMATIVA_OPEN })"
     x-init="init()">

    <button class="normativa-trigger" :class="{ 'pulse': !isOpen }" @click="toggle()" :aria-expanded="isOpen ? 'true' : 'false'">
        <img src="{{ $logoSrc }}" alt="Solicitar normativa">
        <span class="normativa-trigger-label">{{ $triggerLabel }}</span>
    </button>

    <section class="normativa-surface" x-cloak x-show="isOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-x-full"
             x-transition:enter-end="opacity-100 transform translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-x-0"
             x-transition:leave-end="opacity-0 transform translate-x-0">
        
        <header class="normativa-head">
            <h3>Solicitud de Normativa</h3>
        </header>

        <div class="normativa-body">
            <div class="normativa-content">
                <!-- Icono principal -->
                <div class="normativa-icon">
                    📄
                </div>

                <!-- Mensaje principal -->
                <p class="normativa-message">
                    Para solicitar una <strong>resolución o normativa particular</strong> al Ministerio de Educación, Ciencia y Tecnología.
                </p>

                <!-- Botón de acción -->
                <div class="normativa-action">
                    <a href="{{ route('edudata.solicitud-info') }}"  class="btn-solicitud">
                        📝 Ir al Formulario
                    </a>
                </div>

                <!-- Separador visual -->
                <div class="normativa-separator">
                    Pasos a seguir
                </div>

                <!-- Pasos del proceso -->
                <div class="normativa-steps">
                    <div class="normativa-step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <div class="step-title">Completá tus Datos</div>
                            <p class="step-description">Información personal requerida para el trámite.</p>
                        </div>
                    </div>

                    <div class="normativa-step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <div class="step-title">Especificá el Asunto</div>
                            <p class="step-description">Asunto claro que describa tu solicitud.</p>
                        </div>
                    </div>

                    <div class="normativa-step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <div class="step-title">Detallá tu Solicitud</div>
                            <p class="step-description">Qué información o resolución necesitás.</p>
                        </div>
                    </div>

                    <div class="normativa-step">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <div class="step-title">Recibí tu Respuesta</div>
                            <p class="step-description">Respuesta a la brevedad por Transparencia.</p>
                        </div>
                    </div>
                </div>

                <!-- Nota final -->
                <div class="normativa-note">
                    <strong>Importante:</strong> Trámites gestionados por la Dirección de Transparencia.
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function normativaPanel({ openDefault = false } = {}) {
        return {
            isOpen: !!openDefault,
            init(){
                // Inicialización si es necesaria
            },
            toggle(){ 
                this.isOpen = !this.isOpen;
            }
        }
    }
</script>