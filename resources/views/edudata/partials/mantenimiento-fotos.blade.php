<div class="py-2 md:py-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- Encabezado -->
        <div class="bg-white border-b border-gray-200 px-4 md:px-6 py-4">
            <h2 class="text-[#162172] text-lg md:text-xl font-bold">Tareas de mantenimiento</h2>
        </div>

        <!-- Carrusel -->
        <div class="relative px-2 md:px-4 py-5">
            <div class="carousel-container overflow-hidden">
                <div class="carousel-track flex transition-transform duration-500 ease-in-out gap-4 md:gap-4">

                    @forelse ($fotos as $foto)
                        <article class="carousel-slide w-[280px] md:w-[320px] shrink-0">
                            <div
                                class="group bg-white border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                                <div class="h-48 md:h-56 overflow-hidden">
                                    <img src="{{ asset($foto->imagen) }}"
                                        alt="{{ $foto->alt_text ?? $foto->titulo }}"
                                        class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-300">
                                </div>
                                <div class="p-3 md:p-4">
                                    <h3 class="text-gray-900 font-semibold leading-tight">
                                        {{ $foto->titulo }}
                                    </h3>

                                    @if (!empty($foto->descripcion))
                                        <p class="text-gray-700 text-sm mt-1 leading-relaxed">
                                            {{ $foto->descripcion }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="w-full text-center py-10 text-gray-500">
                            No hay fotos cargadas para mostrar todavía.
                        </div>
                    @endforelse

                </div>
            </div>

            <!-- Controles (solo si hay más de 1 slide) -->
            <button type="button"
                class="carousel-prev absolute left-1 md:left-2 top-1/2 -translate-y-1/2 bg-white/95 hover:bg-white border border-gray-300 rounded-full p-2 shadow-sm hover:shadow-md z-10"
                aria-label="Anterior" style="{{ (isset($fotos) && $fotos->count() > 1) ? '' : 'display:none;' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button type="button"
                class="carousel-next absolute right-1 md:right-2 top-1/2 -translate-y-1/2 bg-white/95 hover:bg-white border border-gray-300 rounded-full p-2 shadow-sm hover:shadow-md z-10"
                aria-label="Siguiente" style="{{ (isset($fotos) && $fotos->count() > 1) ? '' : 'display:none;' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Indicadores -->
            <div class="mt-5 flex justify-center gap-2" id="carouselIndicators"
                aria-label="Indicadores del carrusel"></div>
        </div>
    </div>
</div>

<style>
    .carousel-indicator {
        width: 8px;
        height: 8px;
        border-radius: 9999px;
        background: #cbd5e1;
        /* slate-300 */
        transition: transform .2s ease, background-color .2s ease;
    }

    .carousel-indicator.active {
        background: #1e40af;
        /* Edudata blue */
        transform: scale(1.25);
    }

    /* Ocultar scrollbar manteniendo el scroll interno si se usa */
    .carousel-container {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .carousel-container::-webkit-scrollbar {
        display: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const track = document.querySelector('.carousel-track');
        const container = document.querySelector('.carousel-container');

        // Si no hay track/container, salimos
        if (!track || !container) return;

        let slides = Array.from(document.querySelectorAll('.carousel-slide'));

        // Si no hay slides o hay 1 solo, no armamos carrusel (evita errores por slides[0])
        if (!slides.length) return;

        const prevBtn = document.querySelector('.carousel-prev');
        const nextBtn = document.querySelector('.carousel-next');
        const indicatorsWrap = document.getElementById('carouselIndicators');

        // Medidas: ancho de tarjeta + gap (coincide con Tailwind gap-4 md:gap-4)
        const gap = window.matchMedia('(min-width: 768px)').matches ? 24 : 16;

        function slideWidthPx() {
            return slides[0].getBoundingClientRect().width + gap;
        }

        let currentIndex = 0;
        let autoTimer = null;

        function visibleSlides() {
            const w = container.getBoundingClientRect().width;
            return Math.max(1, Math.floor(w / slideWidthPx()));
        }

        function updateIndicators() {
            if (!indicatorsWrap) return;
            const dots = indicatorsWrap.querySelectorAll('.carousel-indicator');
            dots.forEach((d, i) => d.classList.toggle('active', i === currentIndex));
        }

        function goTo(i) {
            const maxIndex = Math.max(0, slides.length - visibleSlides());
            currentIndex = Math.min(Math.max(i, 0), maxIndex);
            const x = -currentIndex * slideWidthPx();
            track.style.transform = `translateX(${x}px)`;
            updateIndicators();
        }

        function stopAuto() {
            if (autoTimer) clearInterval(autoTimer);
            autoTimer = null;
        }

        function startAuto() {
            // Autoplay solo si hay más de 1
            if (slides.length <= 1) return;

            stopAuto();
            autoTimer = setInterval(() => {
                const maxIndex = Math.max(0, slides.length - visibleSlides());
                if (currentIndex >= maxIndex) goTo(0);
                else goTo(currentIndex + 1);
            }, 1500);
        }

        function resetAuto() {
            stopAuto();
            startAuto();
        }

        function next() {
            goTo(currentIndex + 1);
            resetAuto();
        }

        function prev() {
            goTo(currentIndex - 1);
            resetAuto();
        }

        // ===== Indicadores dinámicos =====
        if (indicatorsWrap) {
            indicatorsWrap.innerHTML = '';

            // Si hay 1 o menos, no mostramos indicadores
            if (slides.length > 1) {
                slides.forEach((_, i) => {
                    const b = document.createElement('button');
                    b.className = 'carousel-indicator';
                    b.type = 'button';
                    b.setAttribute('aria-label', `Ir a la tarjeta ${i + 1}`);
                    b.addEventListener('click', () => goTo(i));
                    indicatorsWrap.appendChild(b);
                });
            }
        }

        // ===== Eventos (si existen botones) =====
        if (nextBtn) nextBtn.addEventListener('click', next);
        if (prevBtn) prevBtn.addEventListener('click', prev);

        track.addEventListener('mouseenter', stopAuto);
        track.addEventListener('mouseleave', startAuto);

        window.addEventListener('resize', () => {
            // Recalcular slides por si cambia el layout
            slides = Array.from(document.querySelectorAll('.carousel-slide'));
            goTo(currentIndex);
        });

        // Init
        goTo(0);
        startAuto();
    });
</script>
