@php
    $panelColor = $panelColor ?? '#f8fafc';
    $logoSrc = $logoSrc ?? asset('images/camara.png');
    $triggerLabel = $triggerLabel ?? 'Galería';
    $openDefault = isset($openDefault) ? (bool) $openDefault : false;
@endphp

<script>
    window.EDUDATA_MDK_SLIDES = @json($slides ?? []);
    window.EDUDATA_MDK_OPEN = @json($openDefault);
</script>

<style>
    .mdk-photo-panel {
        --panel-bg: {{ $panelColor }};
        --panel-grad: linear-gradient(180deg, #f8fafc 0%, #e2e8f0 100%);
        --panel-text: #334155;
        --panel-border: rgba(100, 116, 139, 0.2);
        --shadow-soft: 0 20px 40px rgba(0, 0, 0, 0.1);
        --accent-primary: #3b82f6;
        --accent-secondary: #10b981;
        --accent-tertiary: #f59e0b;
        --hover-glow: 0 0 20px rgba(59, 130, 246, 0.3);
    }

    .mdk-photo-panel {
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        z-index: 90;
        pointer-events: none;
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    /* Solapa lateral - MANTENIENDO TAMAÑO ORIGINAL */
    .mdk-photo-panel .mdk-trigger {
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

    .mdk-photo-panel .mdk-trigger:hover {
        transform: translateY(-50%) scale(1.08);
        box-shadow:
            var(--hover-glow),
            0 8px 25px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(59, 130, 246, 0.3);
        background: linear-gradient(180deg, #ffffff 0%, #e2e8f0 100%);
    }

    .mdk-photo-panel .mdk-trigger img {
        width: 42px;
        height: 42px;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        transition: all 0.3s ease;
    }

    .mdk-photo-panel .mdk-trigger:hover img {
        transform: scale(1.1) rotate(5deg);
        filter: drop-shadow(0 4px 8px rgba(59, 130, 246, 0.3));
    }

    .mdk-photo-panel .mdk-trigger .mdk-trigger-label {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        font-size: .85rem;
        letter-spacing: .15em;
        font-weight: 700;
        text-transform: uppercase;
        color: #475569;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
    }

    /* Panel principal - CON SCROLL EN TODO EL CONTENEDOR */
    .mdk-photo-panel .mdk-surface {
        width: 50vw;
        max-width: 550px;
        min-width: 420px;
        max-height: 85vh;
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
        display: flex;
        flex-direction: column;
    }

    /* Header COMPACTO */
    .mdk-photo-panel .mdk-head {
        padding: 16px 20px;
        border-bottom: 1px solid rgba(100, 116, 139, 0.1);
        text-align: center;
        background: linear-gradient(90deg, rgba(59, 130, 246, 0.05), rgba(16, 185, 129, 0.05));
        position: relative;
        overflow: hidden;
        flex-shrink: 0;
    }

    .mdk-photo-panel .mdk-head::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary), var(--accent-tertiary));
        border-radius: 0 0 3px 3px;
    }

    .mdk-photo-panel .mdk-head h3 {
        font-size: 1.2rem;
        font-weight: 800;
        margin: 0;
        position: relative;
        display: inline-block;
        background: linear-gradient(135deg, #1e40af, #059669, #d97706);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.01em;
    }

    .mdk-photo-panel .mdk-head h3::after {
        content: "📸";
        position: absolute;
        right: -28px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.9rem;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    /* Body CON SCROLL VERTICAL EN TODO EL CONTENIDO */
    .mdk-photo-panel .mdk-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        flex: 1;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.9), rgba(248, 250, 252, 0.95));
        overflow-y: auto;
        overflow-x: hidden;
    }

    /* Viewport MÁS COMPACTO */
    .mdk-viewport {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        height: 0;
        padding-bottom: 60%;
        background:
            linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(245, 158, 11, 0.05)),
            repeating-linear-gradient(45deg,
                rgba(100, 116, 139, 0.03) 0px,
                rgba(100, 116, 139, 0.03) 1px,
                transparent 1px,
                transparent 11px);
        cursor: pointer;
        border: 2px solid rgba(100, 116, 139, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        flex-shrink: 0;
    }

    .mdk-viewport:hover {
        border-color: rgba(59, 130, 246, 0.4);
        transform: translateY(-2px);
        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.1),
            0 0 0 1px rgba(59, 130, 246, 0.2);
    }

    /* Contenedor de imagen */
    .mdk-image-container {
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
    .mdk-viewport img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.5);
    }

    .mdk-viewport:hover img {
        transform: scale(1.02);
    }

    /* Indicador de zoom en hover - MÁS PEQUEÑO */
    .mdk-viewport::before {
        content: "🔍";
        position: absolute;
        top: 12px;
        right: 12px;
        background: rgba(255, 255, 255, 0.9);
        color: #475569;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.3s ease;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .mdk-viewport:hover::before {
        opacity: 1;
        transform: scale(1);
    }

    /* Flechas de navegación - MÁS COMPACTAS */
    .mdk-viewport-nav {
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

    .mdk-nav-arrow {
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

    .mdk-viewport:hover .mdk-nav-arrow {
        opacity: 1;
        transform: translateY(0);
    }

    .mdk-nav-arrow:hover {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1));
        color: #1e40af;
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(59, 130, 246, 0.2);
        border-color: rgba(59, 130, 246, 0.3);
    }

    .mdk-nav-arrow.prev {
        transform: translateX(-12px);
    }

    .mdk-nav-arrow.next {
        transform: translateX(12px);
    }

    .mdk-viewport:hover .mdk-nav-arrow.prev {
        transform: translateX(0);
    }

    .mdk-viewport:hover .mdk-nav-arrow.next {
        transform: translateX(0);
    }

    /* Overlay para el viewport - MÁS COMPACTO */
    .mdk-viewport::after {
        content: "Click para pantalla completa";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(255, 255, 255, 0.9));
        color: #475569;
        padding: 12px;
        text-align: center;
        font-size: .85rem;
        font-weight: 600;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
    }

    .mdk-viewport:hover::after {
        opacity: 1;
    }

    /* Caption MEJORADA - MÁS COMPACTA */
    .mdk-caption {
        text-align: center;
        font-size: 0.95rem;
        font-weight: 600;
        color: #334155;
        padding: 16px;
        background: linear-gradient(90deg,
                transparent,
                rgba(59, 130, 246, 0.08),
                rgba(16, 185, 129, 0.08),
                transparent);
        border-radius: 12px;
        border-left: 3px solid var(--accent-primary);
        border-right: 3px solid var(--accent-tertiary);
        min-height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1.4;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        word-wrap: break-word;
    }

    /* Indicadores de diapositiva - MÁS COMPACTOS */
    .mdk-indicators {
        display: flex;
        justify-content: center;
        gap: 6px;
        flex-wrap: wrap;
        margin-top: 8px;
        padding: 0 10px;
        flex-shrink: 0;
    }

    .mdk-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(100, 116, 139, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        outline: none;
    }

    .mdk-indicator:hover {
        background: rgba(59, 130, 246, 0.5);
        transform: scale(1.3);
    }

    .mdk-indicator.active {
        background: var(--accent-primary);
        transform: scale(1.3);
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
    }

    /* Lightbox MÁS COMPACTO */
    .mdk-lightbox {
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

    .mdk-lightbox-content {
        position: relative;
        max-width: 90%;
        max-height: 85%;
        border-radius: 16px;
        overflow: hidden;
        box-shadow:
            0 0 0 1px rgba(100, 116, 139, 0.1),
            0 20px 40px rgba(0, 0, 0, 0.1),
            0 0 80px rgba(59, 130, 246, 0.1);
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

    .mdk-lightbox-image-container {
        position: relative;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
        pointer-events: none;
    }

    .mdk-lightbox img {
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
    .mdk-lightbox-caption {
        background: linear-gradient(transparent, rgba(255, 255, 255, 0.9));
        color: #334155;
        padding: 20px;
        text-align: center;
        font-size: 1.1rem;
        font-weight: 600;
        pointer-events: none;
        line-height: 1.4;
        border-top: 1px solid rgba(100, 116, 139, 0.1);
    }

    .mdk-lightbox-close {
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

    .mdk-lightbox-close:hover {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        border-color: rgba(239, 68, 68, 0.3);
        transform: scale(1.1);
    }

    /* Scrollbar personalizado PARA EL BODY COMPLETO */
    .mdk-body::-webkit-scrollbar {
        width: 8px;
    }

    .mdk-body::-webkit-scrollbar-track {
        background: rgba(100, 116, 139, 0.1);
        border-radius: 4px;
        margin: 2px 0;
    }

    .mdk-body::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        border-radius: 4px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .mdk-body::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #1d4ed8, #059669);
    }

    /* Animaciones para dinamismo */
    @keyframes pulse-glow {
        0% {
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
        }
        70% {
            box-shadow: 0 0 0 8px rgba(59, 130, 246, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
        }
    }

    .mdk-trigger.pulse {
        animation: pulse-glow 2s infinite;
    }

    /* Media queries mejoradas */
    @media (max-width: 1400px) {
        .mdk-photo-panel .mdk-surface {
            width: 45vw;
            max-width: 500px;
        }
    }

    @media (max-width: 1200px) {
        .mdk-photo-panel .mdk-surface {
            width: 40vw;
            min-width: 380px;
        }
        
        .mdk-caption {
            font-size: 0.9rem;
            padding: 14px;
        }
        
        .mdk-head h3 {
            font-size: 1.1rem;
        }
        
        .mdk-head h3::after {
            right: -25px;
            font-size: 0.8rem;
        }
    }

    @media (max-width: 1024px) {
        .mdk-photo-panel {
            display: none;
        }
    }

    /* Para pantallas más pequeñas en altura */
    @media (max-height: 700px) {
        .mdk-photo-panel .mdk-surface {
            max-height: 80vh;
        }
        
        .mdk-viewport {
            padding-bottom: 50%;
        }
        
        .mdk-caption {
            min-height: 50px;
            padding: 12px;
            font-size: 0.85rem;
        }
    }

    /* Para pantallas muy altas */
    @media (min-height: 900px) {
        .mdk-photo-panel .mdk-surface {
            max-height: 80vh;
        }
    }
</style>

<div class="mdk-photo-panel" x-data="mdkPhotoPanel({ slides: window.EDUDATA_MDK_SLIDES, openDefault: window.EDUDATA_MDK_OPEN })" x-init="init()">

    <button class="mdk-trigger" :class="{ 'pulse': !isOpen }" @click="toggle()" :aria-expanded="isOpen ? 'true' : 'false'">
        <img src="{{ $logoSrc }}" alt="Abrir galería">
        <span class="mdk-trigger-label">{{ $triggerLabel }}</span>
    </button>

    <section class="mdk-surface" x-cloak x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-x-full"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform translate-x-0">

        <header class="mdk-head">
            <h3>Registro Fotográfico de Mantenimiento</h3>
        </header>

        <div class="mdk-body">
            <!-- Viewport con navegación tipo carrusel -->
            <div class="mdk-viewport" @click="openLightbox(slides[current])">
                <div class="mdk-image-container">
                    <img :src="slides[current].image" :alt="slides[current].title">
                </div>

                <!-- Flechas de navegación -->
                <div class="mdk-viewport-nav">
                    <button class="mdk-nav-arrow prev" @click.stop="prev()">
                        ‹
                    </button>
                    <button class="mdk-nav-arrow next" @click.stop="next()">
                        ›
                    </button>
                </div>
            </div>

            <!-- Caption principal -->
            <div class="mdk-caption" x-text="slides[current].title"></div>

            <!-- Indicadores de diapositivas -->
            <div class="mdk-indicators">
                <template x-for="(slide, index) in slides" :key="index">
                    <button class="mdk-indicator" 
                            :class="{ 'active': current === index }" 
                            @click="go(index)"
                            :aria-label="'Ir a imagen ' + (index + 1)"></button>
                </template>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <template x-if="lightbox">
        <div class="mdk-lightbox" @click="closeLightbox()">
            <div class="mdk-lightbox-content">
                <button class="mdk-lightbox-close" @click="closeLightbox()">×</button>

                <div class="mdk-lightbox-image-container">
                    <img :src="lightbox.image" :alt="lightbox.title">
                </div>

                <div class="mdk-lightbox-caption" x-text="lightbox.title"></div>
            </div>
        </div>
    </template>
</div>

<script>
    function mdkPhotoPanel({
        slides = [],
        openDefault = false
    } = {}) {
        return {
            isOpen: !!openDefault,
            lightbox: null,
            current: 0,
            imageCache: new Map(),
            autoAdvanceInterval: null,
            slides: Array.isArray(slides) && slides.length ? slides : [
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento11.jpg') }}',
                    title: '• E.P.E.T Nº 4 (Andalgalá): mejoras en acometida y pilar de luz para pasar de monofásica a trifásica, revisión de cableado y tablero principal, cambios de llaves y luminarias en todas las aulas.'
                },
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento2.jpg') }}',
                    title: '• Escuela Secundaria Nº 77: tareas de mantenimiento de griferías en sanitarios, incluyendo el cambio de presmatic, llaves de agua y griferías en bebederos.'
                },
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento3.jpg') }}',
                    title: '• Escuela Secundaria Nº 77: tareas de mantenimiento de griferías en sanitarios, incluyendo el cambio de presmatic, llaves de agua y griferías en bebederos.'
                },
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento5.jpg') }}',
                    title: '• Trabajos integrales de infraestructura sanitaria en la Escuela Nº 277 "Nicolás Avellaneda" de Tapso, departamento El Alto'
                },
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento6.jpg') }}',
                    title: '• Instituto de Formación Docente – JIN Maternal Nº 1 "Pasitos Cuidados". Regularización de pilar de luz, cambio de cableado, colocación de caja y llaves térmicas'
                },
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento7.jpg') }}',
                    title: ' • ISAC – Instituto Superior de Arte y Comunicación: desmalezamiento y limpieza del predio.'
                },
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento8.jpg') }}',
                    title: '• Instituto de Formación Docente – JIN Maternal Nº 1 "Pasitos Cuidados". Regularización de pilar de luz, cambio de cableado, colocación de caja y llaves térmicas'
                },
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento9.jpg') }}',
                    title: 'Trabajos de herrería en portones de acceso - Seguridad perimetral escolar'
                },
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento10.jpg') }}',
                    title: '• Escuela Nº 45 "Presidente Sarmiento" Huillapima (Dpto. Capayán): colocación de plafones, reparación de ventiladores y caloventores.'
                }
            ],
            init() {
                this.preloadImages();
                
                // Auto-avance cada 5 segundos si está abierto
                this.autoAdvanceInterval = setInterval(() => {
                    if (this.isOpen && !this.lightbox) {
                        this.next();
                    }
                }, 5000);
            },
            toggle() {
                this.isOpen = !this.isOpen;
                if (!this.isOpen) this.closeLightbox();
            },
            next() {
                this.current = (this.current + 1) % this.slides.length;
                this.closeLightbox();
            },
            prev() {
                this.current = (this.current - 1 + this.slides.length) % this.slides.length;
                this.closeLightbox();
            },
            go(i) {
                if (i >= 0 && i < this.slides.length) {
                    this.current = i;
                    this.closeLightbox();
                }
            },
            openLightbox(slide) {
                this.lightbox = slide;
            },
            closeLightbox() {
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