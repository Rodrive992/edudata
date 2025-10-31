@php
    $panelColor = $panelColor ?? '#1e2939';
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
        --panel-grad: linear-gradient(180deg, #1e2939 0%, #2c3e50 100%);
        --panel-text: #fff;
        --panel-border: rgba(255, 255, 255, .15);
        --shadow-soft: 0 20px 40px rgba(0, 0, 0, .35);
        --accent-primary: #f59e0b;
        --accent-secondary: #3b82f6;
        --accent-tertiary: #10b981;
    }

    .mdk-photo-panel {
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        z-index: 90;
        pointer-events: none;
    }

    /* Solapa lateral */
    .mdk-photo-panel .mdk-trigger {
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
            inset 0 2px 8px rgba(255, 255, 255, .15),
            0 8px 25px rgba(0, 0, 0, .4),
            0 0 0 1px rgba(255, 255, 255, .1);
        padding: 1.25rem .75rem;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: .75rem;
        pointer-events: all;
        transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .mdk-photo-panel .mdk-trigger:hover {
        transform: translateY(-50%) scale(1.08);
        box-shadow:
            0 12px 35px rgba(59, 130, 246, 0.4),
            0 0 0 2px rgba(255, 255, 255, .2);
        background: linear-gradient(180deg, #2c3e50 0%, #3c5065 100%);
    }

    .mdk-photo-panel .mdk-trigger img {
        width: 42px;
        height: 42px;
        object-fit: contain;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, .4));
        transition: transform .3s ease;
    }

    .mdk-photo-panel .mdk-trigger:hover img {
        transform: scale(1.1) rotate(5deg);
    }

    .mdk-photo-panel .mdk-trigger .mdk-trigger-label {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        font-size: .85rem;
        letter-spacing: .15em;
        font-weight: 800;
        text-transform: uppercase;
        color: rgba(255, 255, 255, .9);
        text-shadow: 0 2px 4px rgba(0, 0, 0, .3);
    }

    /* Panel principal - MÁS COMPACTO */
    .mdk-photo-panel .mdk-surface {
        width: 60vw;
        max-width: 700px;
        min-width: 500px;
        max-height: 90vh;
        background: linear-gradient(160deg, #1e293b 0%, #334155 50%, #475569 100%);
        color: var(--panel-text);
        border-radius: 24px 0 0 24px;
        border: 3px solid rgba(255, 255, 255, .2);
        border-right: none;
        box-shadow:
            var(--shadow-soft),
            inset 0 1px 0 rgba(255, 255, 255, .1);
        overflow: hidden;
        pointer-events: all;
        backdrop-filter: blur(10px);
    }

    /* Header MEJORADO */
    .mdk-photo-panel .mdk-head {
        padding: 20px 24px;
        border-bottom: 2px solid rgba(255, 255, 255, .15);
        text-align: center;
        background: linear-gradient(90deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1));
        position: relative;
        overflow: hidden;
    }

    .mdk-photo-panel .mdk-head::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary), var(--accent-tertiary));
    }

    .mdk-photo-panel .mdk-head h3 {
        font-size: 1.4rem;
        font-weight: 900;
        margin: 0;
        position: relative;
        display: inline-block;
        background: linear-gradient(135deg, #fef3c7, #dbeafe, #d1fae5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 2px 4px rgba(0, 0, 0, .2);
    }

    .mdk-photo-panel .mdk-head h3::after {
        content: "📸";
        position: absolute;
        right: -35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.1rem;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, .3));
    }

    /* Body SIMPLIFICADO */
    .mdk-photo-panel .mdk-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        height: calc(90vh - 80px);
        background: linear-gradient(180deg, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 0.95));
    }

    /* Viewport MÁS GRANDE */
    .mdk-viewport {
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        height: 0;
        padding-bottom: 55%; /* Más alto para mejor visualización */
        background:
            linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(245, 158, 11, 0.1)),
            repeating-linear-gradient(45deg,
                rgba(255, 255, 255, 0.02) 0px,
                rgba(255, 255, 255, 0.02) 1px,
                transparent 1px,
                transparent 11px);
        cursor: pointer;
        border: 2px solid rgba(255, 255, 255, .15);
        transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .mdk-viewport:hover {
        border-color: rgba(245, 158, 11, 0.6);
        transform: translateY(-3px);
        box-shadow:
            0 12px 30px rgba(0, 0, 0, .5),
            0 0 0 1px rgba(245, 158, 11, 0.3);
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
        padding: 6px;
    }

    /* Imagen principal */
    .mdk-viewport img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 12px;
        background: rgba(255, 255, 255, .02);
    }

    .mdk-viewport:hover img {
        transform: scale(1.02);
    }

    /* Indicador de zoom en hover */
    .mdk-viewport::before {
        content: "🔍";
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(0, 0, 0, .7);
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

    .mdk-viewport:hover::before {
        opacity: 1;
        transform: scale(1);
    }

    /* Flechas de navegación */
    .mdk-viewport-nav {
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

    .mdk-nav-arrow {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.9), rgba(30, 64, 175, 0.9));
        color: white;
        border: 2px solid rgba(255, 255, 255, .3);
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
        box-shadow: 0 4px 15px rgba(0, 0, 0, .3);
    }

    .mdk-viewport:hover .mdk-nav-arrow {
        opacity: 1;
        transform: translateY(0);
    }

    .mdk-nav-arrow:hover {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.9), rgba(30, 64, 175, 0.9));
        transform: scale(1.15);
        box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
    }

    .mdk-nav-arrow.prev {
        transform: translateX(-15px);
    }

    .mdk-nav-arrow.next {
        transform: translateX(15px);
    }

    .mdk-viewport:hover .mdk-nav-arrow.prev {
        transform: translateX(0);
    }

    .mdk-viewport:hover .mdk-nav-arrow.next {
        transform: translateX(0);
    }

    /* Overlay para el viewport */
    .mdk-viewport::after {
        content: "Click para ver en pantalla completa";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, .8));
        color: white;
        padding: 15px;
        text-align: center;
        font-size: .95rem;
        font-weight: 600;
        opacity: 0;
        transition: opacity .3s ease;
        z-index: 1;
    }

    .mdk-viewport:hover::after {
        opacity: 1;
    }

    /* Caption MEJORADA - MÁS GRANDE Y LEGIBLE */
    .mdk-caption {
        text-align: center;
        font-size: 1rem;
        font-weight: 600;
        color: #f8fafc;
        text-shadow: 0 2px 8px rgba(0, 0, 0, .5);
        padding: 18px;
        background: linear-gradient(90deg,
                transparent,
                rgba(59, 130, 246, 0.15),
                rgba(16, 185, 129, 0.15),
                transparent);
        border-radius: 14px;
        border-left: 4px solid var(--accent-primary);
        border-right: 4px solid var(--accent-tertiary);
        min-height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1.5;
        flex-shrink: 0;
    }

   

    /* Lightbox SIMPLIFICADO */
    .mdk-lightbox {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .95);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        cursor: pointer;
        backdrop-filter: blur(10px);
    }

    .mdk-lightbox-content {
        position: relative;
        max-width: 95%;
        max-height: 95%;
        border-radius: 20px;
        overflow: hidden;
        box-shadow:
            0 0 0 1px rgba(255, 255, 255, .1),
            0 25px 50px rgba(0, 0, 0, .5),
            0 0 100px rgba(59, 130, 246, 0.2);
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

    .mdk-lightbox-image-container {
        position: relative;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        pointer-events: none;
    }

    .mdk-lightbox img {
        display: block;
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
        width: auto;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .5);
        pointer-events: none;
    }

    /* Lightbox caption - TEXTO MÁS GRANDE */
    .mdk-lightbox-caption {
        background: linear-gradient(transparent, rgba(0, 0, 0, .9));
        color: white;
        padding: 25px;
        text-align: center;
        font-size: 1.3rem;
        font-weight: 600;
        pointer-events: none;
        line-height: 1.5;
    }

    .mdk-lightbox-close {
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
        box-shadow: 0 4px 15px rgba(0, 0, 0, .4);
    }

    .mdk-lightbox-close:hover {
        background: rgba(220, 38, 38, 0.9);
        transform: scale(1.15);
    }

    /* Media queries actualizadas */
    @media (max-width: 1400px) {
        .mdk-photo-panel .mdk-surface {
            width: 55vw;
            max-width: 650px;
        }
    }

    @media (max-width: 1200px) {
        .mdk-photo-panel .mdk-surface {
            width: 50vw;
            min-width: 450px;
        }
        
        .mdk-caption {
            font-size: 1.05rem;
            padding: 16px;
        }
    }

    @media (max-width: 1024px) {
        .mdk-photo-panel {
            display: none;
        }
    }
</style>

<div class="mdk-photo-panel" x-data="mdkPhotoPanel({ slides: window.EDUDATA_MDK_SLIDES, openDefault: window.EDUDATA_MDK_OPEN })" x-init="init()">

    <button class="mdk-trigger" @click="toggle()" :aria-expanded="isOpen ? 'true' : 'false'">
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
                    title: '• Instituto de Formación Docente – JIN Maternal Nº 1 “Pasitos Cuidados”. Regularización de pilar de luz, cambio de cableado, colocación de caja y llaves térmicas'
                },
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento7.jpg') }}',
                    title: ' • ISAC – Instituto Superior de Arte y Comunicación: desmalezamiento y limpieza del predio.'
                },
                {
                    image: '{{ asset('images/mantenimiento/mantenimiento8.jpg') }}',
                    title: '• Instituto de Formación Docente – JIN Maternal Nº 1 “Pasitos Cuidados”. Regularización de pilar de luz, cambio de cableado, colocación de caja y llaves térmicas'
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