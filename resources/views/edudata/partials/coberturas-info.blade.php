@php
    $panelColor   = $panelColor   ?? '#1e2939';
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
        --panel-grad: linear-gradient(180deg, #1e2939 0%, #2c3e50 100%);
        --panel-text: #fff;
        --panel-border: rgba(255,255,255,.15);
        --shadow-soft: 0 20px 40px rgba(0,0,0,.35);
        --accent-primary: #10b981;
        --accent-secondary: #3b82f6;
        --accent-tertiary: #8b5cf6;
    }

    .info-panel {
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        z-index: 89;
        pointer-events: none;
    }

    /* Solapa lateral - ESTILO INFORMACIÓN */
    .info-panel .info-trigger {
        position: absolute;
        left: -100px;
        top: 50%;
        transform: translateY(-50%);
        width: 90px;
        border-radius: 20px 0 0 20px;
        background: var(--panel-grad);
        color: var(--panel-text);
        border: 3px solid var(--panel-border);
        border-right: none;
        box-shadow: 
            inset 0 2px 8px rgba(255,255,255,.15),
            0 8px 25px rgba(0,0,0,.4),
            0 0 0 1px rgba(255,255,255,.1);
        padding: 1.25rem .75rem;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: .75rem;
        pointer-events: all;
        transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .info-panel .info-trigger:hover {
        transform: translateY(-50%) scale(1.08);
        box-shadow: 
            0 12px 35px rgba(16, 185, 129, 0.4),
            0 0 0 2px rgba(255,255,255,.2);
        background: linear-gradient(180deg, #2c3e50 0%, #3c5065 100%);
    }

    .info-panel .info-trigger img {
        width: 42px;
        height: 42px;
        object-fit: contain;
        filter: drop-shadow(0 4px 8px rgba(0,0,0,.4));
        transition: transform .3s ease;
    }

    .info-panel .info-trigger:hover img {
        transform: scale(1.1) rotate(-5deg);
    }

    .info-panel .info-trigger .info-trigger-label {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        font-size: .85rem;
        letter-spacing: .15em;
        font-weight: 800;
        text-transform: uppercase;
        color: rgba(255,255,255,.9);
        text-shadow: 0 2px 4px rgba(0,0,0,.3);
    }

    /* Panel principal */
    .info-panel .info-surface {
        width: 60vw;
        max-width: 700px;
        min-width: 500px;
        max-height: 90vh;
        background: linear-gradient(160deg, #1e293b 0%, #334155 50%, #475569 100%);
        color: var(--panel-text);
        border-radius: 24px 0 0 24px;
        border: 3px solid rgba(255,255,255,.2);
        border-right: none;
        box-shadow: 
            var(--shadow-soft),
            inset 0 1px 0 rgba(255,255,255,.1);
        overflow: hidden;
        pointer-events: all;
        backdrop-filter: blur(10px);
    }

    /* Header MEJORADO - TEMA INFORMACIÓN */
    .info-panel .info-head {
        padding: 20px 24px;
        border-bottom: 2px solid rgba(255,255,255,.15);
        text-align: center;
        background: linear-gradient(90deg, rgba(16, 185, 129, 0.1), rgba(139, 92, 246, 0.1));
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
    }

    .info-panel .info-head h3 {
        font-size: 1.4rem;
        font-weight: 900;
        margin: 0;
        position: relative;
        display: inline-block;
        background: linear-gradient(135deg, #d1fae5, #dbeafe, #e9d5ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 2px 4px rgba(0,0,0,.2);
    }

    .info-panel .info-head h3::after {
        content: "ℹ️";
        position: absolute;
        right: -35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.1rem;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,.3));
    }

    /* Body SIMPLIFICADO */
    .info-panel .info-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        height: calc(90vh - 80px);
        background: linear-gradient(180deg, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 0.95));
        overflow-y: auto;
    }

    /* Viewport para flyers */
    .info-viewport {
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        height: 0;
        padding-bottom: 70%; /* Más alto para flyers */
        background:
            linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(139, 92, 246, 0.1)),
            repeating-linear-gradient(
                45deg,
                rgba(255,255,255,0.02) 0px,
                rgba(255,255,255,0.02) 1px,
                transparent 1px,
                transparent 11px
            );
        cursor: pointer;
        border: 2px solid rgba(255,255,255,.15);
        transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .info-viewport:hover {
        border-color: rgba(16, 185, 129, 0.6);
        transform: translateY(-3px);
        box-shadow: 
            0 12px 30px rgba(0,0,0,.5),
            0 0 0 1px rgba(16, 185, 129, 0.3);
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
        transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 12px;
        background: rgba(255,255,255,.02);
    }

    .info-viewport:hover img {
        transform: scale(1.02);
    }

    /* Indicador de zoom en hover */
    .info-viewport::before {
        content: "🔍";
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(0,0,0,.7);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        opacity: 0;
        transform: scale(0.8);
        transition: all .3s ease;
        z-index: 2;
    }

    .info-viewport:hover::before {
        opacity: 1;
        transform: scale(1);
    }

    /* Flechas de navegación */
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
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.9), rgba(139, 92, 246, 0.9));
        color: white;
        border: 2px solid rgba(255,255,255,.3);
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.3rem;
        font-weight: bold;
        transition: all .3s ease;
        pointer-events: all;
        opacity: 0;
        transform: translateY(-10px);
        box-shadow: 0 4px 15px rgba(0,0,0,.3);
    }

    .info-viewport:hover .info-nav-arrow {
        opacity: 1;
        transform: translateY(0);
    }

    .info-nav-arrow:hover {
        background: linear-gradient(135deg, rgba(5, 150, 105, 0.9), rgba(124, 58, 237, 0.9));
        transform: scale(1.15);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
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

    /* Caption MEJORADA */
    .info-caption {
        text-align: center;
        font-size: 1.1rem;
        font-weight: 600;
        color: #f8fafc;
        text-shadow: 0 2px 8px rgba(0,0,0,.5);
        padding: 16px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(16, 185, 129, 0.15), 
            rgba(139, 92, 246, 0.15), 
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
    }

    /* Lightbox MEJORADO */
    .info-lightbox {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,.95);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        cursor: pointer;
        backdrop-filter: blur(10px);
    }

    .info-lightbox-content {
        position: relative;
        max-width: 95%;
        max-height: 95%;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 
            0 0 0 1px rgba(255,255,255,.1),
            0 25px 50px rgba(0,0,0,.5),
            0 0 100px rgba(16, 185, 129, 0.2);
        animation: lightboxAppear .4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: default;
        display: flex;
        flex-direction: column;
        background: #000;
        pointer-events: none;
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
        box-shadow: 0 10px 30px rgba(0,0,0,.5);
        pointer-events: none;
    }

    .info-lightbox-caption {
        background: linear-gradient(transparent, rgba(0,0,0,.9));
        color: white;
        padding: 25px;
        text-align: center;
        font-size: 1.3rem;
        font-weight: 600;
        pointer-events: none;
        line-height: 1.5;
    }

    .info-lightbox-close {
        position: absolute;
        top: 25px;
        right: 25px;
        background: rgba(239, 68, 68, 0.9);
        color: white;
        border: none;
        border-radius: 50%;
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.8rem;
        font-weight: bold;
        transition: all .3s ease;
        z-index: 10;
        pointer-events: all;
        box-shadow: 0 4px 15px rgba(0,0,0,.4);
    }

    .info-lightbox-close:hover {
        background: rgba(220, 38, 38, 0.9);
        transform: scale(1.15);
    }

    /* Scrollbar personalizado */
    .info-body::-webkit-scrollbar {
        width: 8px;
    }

    .info-body::-webkit-scrollbar-track {
        background: rgba(255,255,255,.1);
        border-radius: 4px;
    }

    .info-body::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-tertiary));
        border-radius: 4px;
    }

    .info-body::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #34d399, #a78bfa);
    }

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

    <button class="info-trigger" @click="toggle()" :aria-expanded="isOpen ? 'true' : 'false'">
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

            <div class="info-caption" x-text="slides[current].title"></div>
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