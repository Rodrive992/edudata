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
        --panel-grad: linear-gradient(180deg, #f8fafc 0%, #e2e8f0 100%);
        --panel-text: #334155;
        --panel-border: rgba(100, 116, 139, 0.2);
        --shadow-soft: 0 20px 40px rgba(0, 0, 0, 0.1);
        --accent-primary: #10b981;
        --accent-secondary: #3b82f6;
        --accent-tertiary: #8b5cf6;
        --hover-glow: 0 0 20px rgba(16, 185, 129, 0.3);
    }

    .info-panel {
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        z-index: 89;
        pointer-events: none;
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    /* Solapa lateral - ESTILO INFORMACIÓN MÁS CLARO */
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
            0 0 0 1px rgba(16, 185, 129, 0.3);
        background: linear-gradient(180deg, #ffffff 0%, #e2e8f0 100%);
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
        filter: drop-shadow(0 4px 8px rgba(16, 185, 129, 0.3));
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

    /* Panel principal - MÁS CLARO Y MODERNO */
    .info-panel .info-surface {
        width: 60vw;
        max-width: 700px;
        min-width: 500px;
        max-height: 90vh;
        background: linear-gradient(160deg, #ffffff 0%, #f8fafc 50%, #f1f5f9 100%);
        color: var(--panel-text);
        border-radius: 24px 0 0 24px;
        border: 2px solid rgba(255, 255, 255, 0.8);
        border-right: none;
        box-shadow: 
            var(--shadow-soft),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        overflow: hidden;
        pointer-events: all;
        backdrop-filter: blur(15px);
    }

    /* Header MEJORADO - TEMA INFORMACIÓN MÁS CLARO */
    .info-panel .info-head {
        padding: 20px 24px;
        border-bottom: 1px solid rgba(100, 116, 139, 0.1);
        text-align: center;
        background: linear-gradient(90deg, rgba(16, 185, 129, 0.05), rgba(139, 92, 246, 0.05));
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
        background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary), var(--accent-tertiary));
        border-radius: 0 0 3px 3px;
    }

    .info-panel .info-head h3 {
        font-size: 1.4rem;
        font-weight: 800;
        margin: 0;
        position: relative;
        display: inline-block;
        background: linear-gradient(135deg, #059669, #1d4ed8, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.01em;
    }

    .info-panel .info-head h3::after {
        content: "ℹ️";
        position: absolute;
        right: -35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.1rem;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    /* Body MÁS CLARO Y LEGIBLE */
    .info-panel .info-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        height: calc(90vh - 80px);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.9), rgba(248, 250, 252, 0.95));
        overflow-y: auto;
    }

    /* Viewport para flyers - MÁS CLARO */
    .info-viewport {
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        height: 0;
        padding-bottom: 70%; /* Más alto para flyers */
        background:
            linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(139, 92, 246, 0.05)),
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
    }

    .info-viewport:hover {
        border-color: rgba(16, 185, 129, 0.4);
        transform: translateY(-3px);
        box-shadow: 
            0 12px 30px rgba(0, 0, 0, 0.1),
            0 0 0 1px rgba(16, 185, 129, 0.2);
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
        padding: 8px;
    }

    /* Imagen principal */
    .info-viewport img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* Contiene la imagen completa */
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.5);
    }

    .info-viewport:hover img {
        transform: scale(1.02);
    }

    /* Indicador de zoom en hover - MÁS CLARO */
    .info-viewport::before {
        content: "🔍";
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255, 255, 255, 0.9);
        color: #475569;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.3s ease;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .info-viewport:hover::before {
        opacity: 1;
        transform: scale(1);
    }

    /* Flechas de navegación - MÁS CLARAS */
    .info-viewport-nav {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 15px;
        pointer-events: none;
    }

    .info-nav-arrow {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.95));
        color: #475569;
        border: 2px solid rgba(100, 116, 139, 0.2);
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.3rem;
        font-weight: bold;
        transition: all 0.3s ease;
        pointer-events: all;
        opacity: 0;
        transform: translateY(-10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .info-viewport:hover .info-nav-arrow {
        opacity: 1;
        transform: translateY(0);
    }

    .info-nav-arrow:hover {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(139, 92, 246, 0.1));
        color: #059669;
        transform: scale(1.15);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.2);
        border-color: rgba(16, 185, 129, 0.3);
    }

    .info-nav-arrow.prev {
        transform: translateX(-15px);
    }

    .info-nav-arrow.next {
        transform: translateX(15px);
    }

    .info-viewport:hover .info-nav-arrow.prev {
        transform: translateX(0);
    }

    .info-viewport:hover .info-nav-arrow.next {
        transform: translateX(0);
    }

    /* Caption MEJORADA - MÁS CLARA */
    .info-caption {
        text-align: center;
        font-size: 1.1rem;
        font-weight: 600;
        color: #334155;
        padding: 16px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(16, 185, 129, 0.08), 
            rgba(139, 92, 246, 0.08), 
            transparent
        );
        border-radius: 14px;
        border-left: 4px solid var(--accent-primary);
        border-right: 4px solid var(--accent-tertiary);
        min-height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1.4;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    /* Indicadores de diapositiva - NUEVO DISEÑO */
    .info-indicators {
        display: flex;
        justify-content: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .info-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(100, 116, 139, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        outline: none;
    }

    .info-indicator:hover {
        background: rgba(16, 185, 129, 0.5);
        transform: scale(1.2);
    }

    .info-indicator.active {
        background: var(--accent-primary);
        transform: scale(1.2);
        box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
    }

    /* Lightbox MÁS CLARO */
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
        max-width: 95%;
        max-height: 95%;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 
            0 0 0 1px rgba(100, 116, 139, 0.1),
            0 25px 50px rgba(0, 0, 0, 0.1),
            0 0 100px rgba(16, 185, 129, 0.1);
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
        padding: 40px;
        pointer-events: none;
    }

    .info-lightbox img {
        display: block;
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
        width: auto;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        pointer-events: none;
    }

    /* Lightbox caption - MÁS CLARO */
    .info-lightbox-caption {
        background: linear-gradient(transparent, rgba(255, 255, 255, 0.9));
        color: #334155;
        padding: 25px;
        text-align: center;
        font-size: 1.3rem;
        font-weight: 600;
        pointer-events: none;
        line-height: 1.5;
        border-top: 1px solid rgba(100, 116, 139, 0.1);
    }

    .info-lightbox-close {
        position: absolute;
        top: 25px;
        right: 25px;
        background: rgba(255, 255, 255, 0.9);
        color: #475569;
        border: 2px solid rgba(100, 116, 139, 0.2);
        border-radius: 50%;
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.8rem;
        font-weight: bold;
        transition: all 0.3s ease;
        z-index: 10;
        pointer-events: all;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .info-lightbox-close:hover {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        border-color: rgba(239, 68, 68, 0.3);
        transform: scale(1.15);
    }

    /* Scrollbar personalizado - MÁS CLARO */
    .info-body::-webkit-scrollbar {
        width: 8px;
    }

    .info-body::-webkit-scrollbar-track {
        background: rgba(100, 116, 139, 0.1);
        border-radius: 4px;
    }

    .info-body::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-tertiary));
        border-radius: 4px;
    }

    .info-body::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #34d399, #a78bfa);
    }

    /* Animaciones adicionales para dinamismo */
    @keyframes pulse-glow-info {
        0% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
        }
    }

    .info-trigger.pulse {
        animation: pulse-glow-info 2s infinite;
    }

    /* Media queries actualizadas */
    @media (max-width: 1400px) {
        .info-panel .info-surface {
            width: 55vw;
            max-width: 650px;
        }
    }

    @media (max-width: 1200px) {
        .info-panel .info-surface {
            width: 50vw;
            min-width: 450px;
        }
        
        .info-caption {
            font-size: 1rem;
            padding: 14px;
        }
    }

    @media (max-width: 1024px) { 
        .info-panel { display: none; } 
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
                    image: '{{ asset('images/coberturas/7asamblea.png') }}',
                    title: '7ma Asamblea - Información General'
                },
                {
                    image: '{{ asset('images/coberturas/7asamblea1.png') }}',
                    title: '7ma Asamblea - Detalles y Agenda'
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