@php
    $panelColor   = $panelColor   ?? '#f8fafc';
    $logoSrc      = $logoSrc      ?? asset('images/informacion.png');
    $triggerLabel = $triggerLabel ?? 'Información';
    $openDefault  = isset($openDefault) ? (bool)$openDefault : false;
@endphp

<script>
    window.EDUDATA_INFO_SLIDES = @json($infoSlides ?? []);
    window.EDUDATA_INFO_OPEN   = @json($openDefault);
</script>

<style>
    .info-panel {
        --panel-bg: {{ $panelColor }};
        --panel-grad: linear-gradient(180deg, var(--gray-100) 0%, var(--gray-200) 100%);
        --panel-text: var(--ink);
        --panel-border: rgba(100, 116, 139, 0.2);
        --shadow-soft: 0 20px 40px rgba(0, 0, 0, 0.1);
        --accent-primary: var(--pri-500);
        --accent-secondary: var(--sec-500);
        --accent-tertiary: var(--ter-500);
        --hover-glow: 0 0 20px rgba(100, 161, 213, 0.3);
    }

    .info-panel {
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        z-index: 89;
        pointer-events: none;
        font-family: 'Open Sans', sans-serif;
    }

    /* Solapa lateral - IGUAL AL DE NORMATIVA */
    .info-panel .info-trigger {
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

    .info-panel .info-trigger:hover {
        transform: translateY(-50%) scale(1.08);
        box-shadow: 
            var(--hover-glow),
            0 8px 25px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(100, 161, 213, 0.3);
        background: linear-gradient(180deg, #ffffff 0%, var(--gray-200) 100%);
    }

    .info-panel .info-trigger img {
        width: 42px;
        height: 42px;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        transition: all 0.3s ease;
    }

    .info-panel .info-trigger:hover img {
        transform: scale(1.1) rotate(-5deg);
        filter: drop-shadow(0 4px 8px rgba(100, 161, 213, 0.3));
    }

    .info-panel .info-trigger .info-trigger-label {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        font-size: .85rem;
        letter-spacing: .15em;
        font-weight: 700;
        text-transform: uppercase;
        color: #475569;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
    }

    /* Panel principal - MÁS COMPACTO COMO NORMATIVA */
    .info-panel .info-surface {
        width: 50vw;
        max-width: 500px;
        min-width: 400px;
        max-height: 75vh;
        background: linear-gradient(160deg, #ffffff 0%, var(--gray-100) 50%, #f1f5f9 100%);
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

    /* Header COMPACTO - IGUAL AL DE NORMATIVA */
    .info-panel .info-head {
        padding: 16px 20px;
        border-bottom: 1px solid rgba(100, 116, 139, 0.1);
        text-align: center;
        background: linear-gradient(90deg, rgba(100, 161, 213, 0.05), rgba(101, 168, 163, 0.05));
        position: relative;
        overflow: hidden;
    }

    .info-panel .info-head::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--pri-500), var(--sec-500), var(--ter-500));
        border-radius: 0 0 3px 3px;
    }

    .info-panel .info-head h3 {
        font-size: 1.2rem;
        font-weight: 800;
        margin: 0;
        position: relative;
        display: inline-block;
        background: linear-gradient(135deg, var(--pri-700), var(--pri-900), var(--ter-500));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.01em;
    }

    .info-panel .info-head h3::after {
        content: "ℹ️";
        position: absolute;
        right: -28px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.9rem;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    /* Body - CONTENIDO MÁS COMPACTO */
    .info-panel .info-body {
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

    /* Viewport para flyers - MÁS COMPACTO */
    .info-viewport {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        height: 0;
        padding-bottom: 60%; /* Más compacto como las fotos */
        background:
            linear-gradient(135deg, rgba(100, 161, 213, 0.05), rgba(101, 168, 163, 0.05)),
            repeating-linear-gradient(
                45deg,
                rgba(100, 116, 139, 0.03) 0px,
                rgba(100, 116, 139, 0.03) 1px,
                transparent 1px,
                transparent 11px
            );
        cursor: pointer;
        border: 2px solid rgba(100, 116, 139, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        width: 100%;
        max-width: 100%;
    }

    .info-viewport:hover {
        border-color: rgba(100, 161, 213, 0.4);
        transform: translateY(-2px);
        box-shadow: 
            0 8px 25px rgba(0, 0, 0, 0.1),
            0 0 0 1px rgba(100, 161, 213, 0.2);
    }

    /* Contenedor de imagen */
    .info-image-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4px;
    }

    /* Imagen principal */
    .info-viewport img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.5);
    }

    .info-viewport:hover img {
        transform: scale(1.02);
    }

    /* Flechas de navegación - MÁS COMPACTAS */
    .info-viewport-nav {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 12px;
        pointer-events: none;
    }

    .info-nav-arrow {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.95));
        color: #475569;
        border: 2px solid rgba(100, 116, 139, 0.2);
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.1rem;
        font-weight: bold;
        transition: all 0.3s ease;
        pointer-events: all;
        opacity: 0;
        transform: translateY(-8px);
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
    }

    .info-viewport:hover .info-nav-arrow {
        opacity: 1;
        transform: translateY(0);
    }

    .info-nav-arrow:hover {
        background: linear-gradient(135deg, rgba(100, 161, 213, 0.1), rgba(101, 168, 163, 0.1));
        color: var(--pri-700);
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(100, 161, 213, 0.2);
        border-color: rgba(100, 161, 213, 0.3);
    }

    .info-nav-arrow.prev {
        transform: translateX(-12px);
    }

    .info-nav-arrow.next {
        transform: translateX(12px);
    }

    .info-viewport:hover .info-nav-arrow.prev {
        transform: translateX(0);
    }

    .info-viewport:hover .info-nav-arrow.next {
        transform: translateX(0);
    }

    /* Caption MEJORADA - MÁS COMPACTA */
    .info-caption {
        text-align: center;
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--ink);
        padding: 16px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(100, 161, 213, 0.08), 
            rgba(101, 168, 163, 0.08), 
            transparent
        );
        border-radius: 12px;
        border-left: 3px solid var(--pri-500);
        border-right: 3px solid var(--ter-500);
        min-height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1.4;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        word-wrap: break-word;
        width: 100%;
    }

    /* Indicadores de diapositiva - MÁS COMPACTOS */
    .info-indicators {
        display: flex;
        justify-content: center;
        gap: 6px;
        flex-wrap: wrap;
        margin-top: 8px;
        padding: 0 10px;
        flex-shrink: 0;
        width: 100%;
    }

    .info-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(100, 116, 139, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        outline: none;
    }

    .info-indicator:hover {
        background: rgba(100, 161, 213, 0.5);
        transform: scale(1.3);
    }

    .info-indicator.active {
        background: var(--pri-500);
        transform: scale(1.3);
        box-shadow: 0 0 0 2px rgba(100, 161, 213, 0.2);
    }

    /* Lightbox MÁS COMPACTO */
    .info-lightbox {
        position: fixed;
        inset: 0;
        background: rgba(255, 255, 255, 0.95);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        cursor: pointer;
        backdrop-filter: blur(15px);
    }

    .info-lightbox-content {
        position: relative;
        max-width: 90%;
        max-height: 85%;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 
            0 0 0 1px rgba(100, 116, 139, 0.1),
            0 20px 40px rgba(0, 0, 0, 0.1),
            0 0 80px rgba(100, 161, 213, 0.1);
        animation: lightboxAppear 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: default;
        display: flex;
        flex-direction: column;
        background: #fff;
        pointer-events: none;
        border: 1px solid rgba(100, 116, 139, 0.1);
    }

    @keyframes lightboxAppear {
        from { 
            transform: scale(0.8) translateY(20px);
            opacity: 0;
        }
        to { 
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    }

    .info-lightbox-image-container {
        position: relative;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
        pointer-events: none;
    }

    .info-lightbox img {
        display: block;
        max-width: 100%;
        max-height: 70vh;
        object-fit: contain;
        width: auto;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        pointer-events: none;
    }

    /* Lightbox caption - MÁS COMPACTO */
    .info-lightbox-caption {
        background: linear-gradient(transparent, rgba(255, 255, 255, 0.9));
        color: var(--ink);
        padding: 20px;
        text-align: center;
        font-size: 1.1rem;
        font-weight: 600;
        pointer-events: none;
        line-height: 1.4;
        border-top: 1px solid rgba(100, 116, 139, 0.1);
    }

    .info-lightbox-close {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.9);
        color: #475569;
        border: 2px solid rgba(100, 116, 139, 0.2);
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.5rem;
        font-weight: bold;
        transition: all 0.3s ease;
        z-index: 10;
        pointer-events: all;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
    }

    .info-lightbox-close:hover {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        border-color: rgba(239, 68, 68, 0.3);
        transform: scale(1.1);
    }

    /* Scrollbar personalizado */
    .info-body::-webkit-scrollbar {
        width: 8px;
    }

    .info-body::-webkit-scrollbar-track {
        background: rgba(100, 116, 139, 0.1);
        border-radius: 4px;
        margin: 2px 0;
    }

    .info-body::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--pri-500), var(--ter-500));
        border-radius: 4px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .info-body::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, var(--pri-700), var(--ter-500));
    }

    /* Animaciones para dinamismo */
    @keyframes pulse-glow-info {
        0% {
            box-shadow: 0 0 0 0 rgba(100, 161, 213, 0.4);
        }
        70% {
            box-shadow: 0 0 0 8px rgba(100, 161, 213, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(100, 161, 213, 0);
        }
    }

    .info-trigger.pulse {
        animation: pulse-glow-info 2s infinite;
    }

    /* =========================== */
    /* MEDIA QUERIES PARA MÓVILES  */
    /* =========================== */
    
    /* Para tablets y móviles */
    @media (max-width: 1024px) {
        .info-panel {
            position: fixed;
            top: auto;
            bottom: 20px;
            right: 20px;
            left: auto;
            transform: none;
            z-index: 89;
        }

        /* Solapa móvil - botón flotante */
        .info-panel .info-trigger {
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

        .info-panel .info-trigger:hover {
            transform: scale(1.1);
        }

        .info-panel .info-trigger .info-trigger-label {
            display: none; /* Ocultar label en móvil */
        }

        .info-panel .info-trigger img {
            width: 35px;
            height: 35px;
            margin: 0;
        }

        /* Panel móvil - ocupa toda la pantalla */
        .info-panel .info-surface {
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
        .info-panel .info-head {
            padding: 12px 16px;
        }

        .info-panel .info-head h3 {
            font-size: 1.1rem;
        }

        .info-panel .info-head h3::after {
            right: -25px;
            font-size: 0.8rem;
        }

        /* Body móvil con mejor espaciado */
        .info-panel .info-body {
            padding: 16px;
            gap: 1rem;
            height: calc(100vh - 60px);
        }

        /* Viewport móvil - relación de aspecto optimizada */
        .info-viewport {
            padding-bottom: 70%;
            border-radius: 16px;
        }

        /* Flechas de navegación más grandes en móvil */
        .info-nav-arrow {
            width: 45px;
            height: 45px;
            font-size: 1.3rem;
            opacity: 0.7; /* Siempre visibles en móvil */
            transform: none;
        }

        .info-nav-arrow.prev {
            transform: none;
        }

        .info-nav-arrow.next {
            transform: none;
        }

        .info-viewport:hover .info-nav-arrow {
            opacity: 0.9;
        }

        /* Caption móvil más compacta */
        .info-caption {
            font-size: 0.9rem;
            padding: 14px;
            min-height: 50px;
        }

        /* Indicadores móviles */
        .info-indicators {
            gap: 6px;
            margin-top: 8px;
        }

        .info-indicator {
            width: 7px;
            height: 7px;
        }

        /* Lightbox móvil mejorado */
        .info-lightbox-content {
            max-width: 95%;
            max-height: 90%;
        }

        .info-lightbox-image-container {
            padding: 20px;
        }

        .info-lightbox-caption {
            padding: 16px;
            font-size: 1rem;
        }

        .info-lightbox-close {
            top: 10px;
            right: 10px;
            width: 40px;
            height: 40px;
            font-size: 1.3rem;
        }
    }

    /* Para móviles muy pequeños */
    @media (max-width: 480px) {
        .info-panel {
            bottom: 15px;
            right: 15px;
        }

        .info-panel .info-trigger {
            width: 60px;
            height: 60px;
        }

        .info-panel .info-trigger img {
            width: 30px;
            height: 30px;
        }

        .info-panel .info-head h3 {
            font-size: 1rem;
        }

        .info-panel .info-body {
            padding: 12px;
            gap: 0.85rem;
        }

        .info-viewport {
            padding-bottom: 75%;
        }

        .info-caption {
            font-size: 0.85rem;
            padding: 12px;
        }

        .info-nav-arrow {
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }
    }

    /* Para tablets en orientación horizontal */
    @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
        .info-panel .info-surface {
            max-height: 90vh;
        }

        .info-panel .info-body {
            height: calc(90vh - 60px);
        }

        .info-viewport {
            padding-bottom: 50%;
        }
    }

    /* Media queries existentes para desktop */
    @media (max-width: 1400px) {
        .info-panel .info-surface {
            width: 45vw;
            max-width: 480px;
        }
    }

    @media (max-width: 1200px) {
        .info-panel .info-surface {
            width: 40vw;
            min-width: 380px;
        }
        
        .info-caption {
            font-size: 0.9rem;
            padding: 14px;
        }
    }

    /* Para pantallas más pequeñas en altura */
    @media (max-height: 700px) {
        .info-panel .info-surface {
            max-height: 65vh;
        }
        
        .info-panel .info-body {
            height: calc(65vh - 60px);
            gap: 1rem;
            padding: 15px;
        }
        
        .info-viewport {
            padding-bottom: 50%;
        }
        
        .info-caption {
            min-height: 50px;
            padding: 12px;
            font-size: 0.85rem;
        }
    }
</style>

<div class="info-panel"
     x-data="infoPanel({ slides: window.EDUDATA_INFO_SLIDES, openDefault: window.EDUDATA_INFO_OPEN })"
     x-init="init()">

    <button class="info-trigger" :class="{ 'pulse': !isOpen }" @click="toggle()" :aria-expanded="isOpen ? 'true' : 'false'">
        <img src="{{ $logoSrc }}" alt="Información importante">
        <span class="info-trigger-label">{{ $triggerLabel }}</span>
    </button>

    <section class="info-surface" x-cloak x-show="isOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-x-full"
             x-transition:enter-end="opacity-100 transform translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-x-0"
             x-transition:leave-end="opacity-0 transform translate-x-0">
        
        <header class="info-head">
            <h3>Información Importante</h3>
        </header>

        <div class="info-body">
            <!-- Viewport para flyers -->
            <div class="info-viewport" @click="openLightbox(slides[current])">
                <div class="info-image-container">
                    <img :src="slides[current].image" :alt="slides[current].title">
                </div>
                
                <!-- Flechas de navegación -->
                <div class="info-viewport-nav">
                    <button class="info-nav-arrow prev" @click.stop="prev()">
                        ‹
                    </button>
                    <button class="info-nav-arrow next" @click.stop="next()">
                        ›
                    </button>
                </div>
            </div>

            <!-- Caption principal -->
            <div class="info-caption" x-text="slides[current].title"></div>

            <!-- Indicadores de diapositivas -->
            <div class="info-indicators">
                <template x-for="(slide, index) in slides" :key="index">
                    <button class="info-indicator" 
                            :class="{ 'active': current === index }" 
                            @click="go(index)"
                            :aria-label="'Ir a información ' + (index + 1)"></button>
                </template>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <template x-if="lightbox">
        <div class="info-lightbox" @click="closeLightbox()">
            <div class="info-lightbox-content">
                <button class="info-lightbox-close" @click="closeLightbox()">×</button>
                
                <div class="info-lightbox-image-container">
                    <img :src="lightbox.image" :alt="lightbox.title">
                </div>
                
                <div class="info-lightbox-caption" x-text="lightbox.title"></div>
            </div>
        </div>
    </template>
</div>

<script>
    function infoPanel({ slides = [], openDefault = false } = {}) {
        return {
            isOpen: !!openDefault,
            lightbox: null,
            current: 0,
            imageCache: new Map(),
            autoAdvanceInterval: null,
            slides: Array.isArray(slides) && slides.length ? slides : [
                {
                    image: '{{ asset('images/coberturas/8va_asamblea2.jpg') }}',
                    title: '8va Asamblea - Información General'
                },
                {
                    image: '{{ asset('images/coberturas/8va_asamblea.jpg') }}',
                    title: '8va Asamblea - Detalles y Agenda'
                },
                {
                    image: '{{ asset('images/coberturas/4ta_asamblea_cabecera.jpg') }}',
                    title: 'Asamblea Cabecera Cero'
                }
            ],
            init(){
                this.preloadImages();
                
                // Auto-avance cada 6 segundos si está abierto
                this.autoAdvanceInterval = setInterval(() => {
                    if (this.isOpen && !this.lightbox) {
                        this.next();
                    }
                }, 6000);
            },
            toggle(){ 
                this.isOpen = !this.isOpen;
                if(!this.isOpen) this.closeLightbox();
            },
            next(){ 
                this.current = (this.current + 1) % this.slides.length;
                this.closeLightbox();
            },
            prev(){ 
                this.current = (this.current - 1 + this.slides.length) % this.slides.length;
                this.closeLightbox();
            },
            go(i){ 
                if(i >= 0 && i < this.slides.length) {
                    this.current = i;
                    this.closeLightbox();
                }
            },
            openLightbox(slide){ 
                this.lightbox = slide;
            },
            closeLightbox(){
                this.lightbox = null;
            },
            preloadImages() {
                this.slides.forEach(slide => {
                    const img = new Image();
                    img.src = slide.image;
                    this.imageCache.set(slide.image, img);
                });
            }
        }
    }
</script>