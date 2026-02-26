<div class="py-2 md:py-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- Encabezado -->
        <div class="bg-white border-b border-gray-200 px-4 md:px-6 py-4">
            <h2 class="text-[#162172] text-lg md:text-xl font-bold">Galería de trabajos</h2>
        </div>

        <!-- Carrusel tipo propaganda con efecto de zoom desde tamaño completo -->
        <div class="relative px-2 md:px-4 py-5">
            <div class="carousel-container overflow-hidden rounded-xl">
                <div class="carousel-track flex transition-transform duration-700 ease-in-out">
                    @forelse ($fotos as $foto)
                        <div class="carousel-slide w-full shrink-0 relative">
                            <!-- Contenedor de imagen con efecto zoom desde tamaño original -->
                            <div class="relative h-[400px] md:h-[500px] lg:h-[600px] w-full overflow-hidden bg-gray-100">
                                <div class="image-zoom-container w-full h-full flex items-center justify-center">
                                    <img src="{{ asset($foto->imagen) }}"
                                        alt="{{ $foto->alt_text ?? $foto->titulo }}"
                                        class="zoom-image max-w-full max-h-full w-auto h-auto object-contain transition-all duration-7000 ease-out"
                                        style="transform: scale(1);"
                                        data-original-width=""
                                        data-original-height=""
                                        onload="this.setAttribute('data-original-width', this.naturalWidth); this.setAttribute('data-original-height', this.naturalHeight);">
                                </div>
                                
                                <!-- Overlay gradiente dinámico -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent 
                                            opacity-0 slide-overlay pointer-events-none"></div>
                                
                                <!-- Contenido superpuesto con efectos de texto -->
                                <div class="absolute inset-0 flex items-end pointer-events-none">
                                    <div class="w-full p-6 md:p-10 lg:p-16 text-white">
                                        <div class="max-w-3xl mx-auto">
                                            <!-- Línea decorativa que aparece -->
                                            <div class="h-1 w-0 bg-blue-400 mb-4 decorative-line"></div>
                                            
                                            <!-- Título con efecto de deslizamiento y blur -->
                                            <h3 class="carousel-title text-2xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4
                                                       transform translate-y-10 opacity-0 blur-sm">
                                                {{ $foto->titulo }}
                                            </h3>
                                            
                                            <!-- Descripción con efecto de aparición escalonada -->
                                            @if (!empty($foto->descripcion))
                                                <p class="carousel-desc text-base md:text-lg lg:text-xl text-gray-100 
                                                          max-w-2xl transform translate-y-10 opacity-0">
                                                    {{ $foto->descripcion }}
                                                </p>
                                            @endif
                                            
                                            <!-- Efecto de barra lateral que aparece -->
                                            <div class="h-12 w-1 bg-blue-400 absolute left-0 bottom-0 sidebar-line"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full text-center py-10 text-gray-500">
                            No hay imágenes para mostrar todavía.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Controles de navegación -->
            @if(isset($fotos) && $fotos->count() > 1)
                <button type="button"
                    class="carousel-prev absolute left-4 md:left-6 top-1/2 -translate-y-1/2 
                           bg-white/20 hover:bg-white/40 backdrop-blur-sm
                           border border-white/30 rounded-full p-3 md:p-4 
                           shadow-lg hover:shadow-xl z-20
                           transition-all duration-300 group
                           opacity-0 hover:opacity-100 focus:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-7 md:w-7 text-white" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" 
                              d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button type="button"
                    class="carousel-next absolute right-4 md:right-6 top-1/2 -translate-y-1/2 
                           bg-white/20 hover:bg-white/40 backdrop-blur-sm
                           border border-white/30 rounded-full p-3 md:p-4 
                           shadow-lg hover:shadow-xl z-20
                           transition-all duration-300 group
                           opacity-0 hover:opacity-100 focus:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-7 md:w-7 text-white" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" 
                              d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Indicadores -->
                <div class="absolute bottom-4 md:bottom-6 left-1/2 -translate-x-1/2 flex gap-2 z-20" 
                     id="carouselIndicators">
                </div>

                <!-- Contador -->
                <div class="absolute top-4 md:top-6 right-4 md:right-6 
                            bg-black/40 backdrop-blur-sm text-white 
                            px-3 py-1.5 rounded-full text-sm font-medium
                            border border-white/20 z-20
                            transform transition-all duration-300
                            hover:scale-110">
                    <span id="currentSlide" class="inline-block min-w-[1.5rem] text-center">1</span> 
                    <span class="opacity-50">/</span> 
                    <span id="totalSlides">{{ $fotos->count() }}</span>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Contenedor de imagen con efecto zoom */
    .image-zoom-container {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f3f4f6;
    }
    
    .zoom-image {
        transition: transform 8s cubic-bezier(0.4, 0, 0.2, 1);
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
    }
    
    /* Estado inicial - imagen completa */
    .carousel-slide:not(.active) .zoom-image {
        transform: scale(1);
    }
    
    /* Slide activo - efecto de zoom que llena el contenedor */
    .carousel-slide.active .zoom-image {
        transform: scale(1.2);
        object-fit: cover;
    }
    
    /* Overlay que aparece gradualmente */
    .carousel-slide.active .slide-overlay {
        animation: fadeInOverlay 2s ease-in forwards;
    }
    
    @keyframes fadeInOverlay {
        0% { opacity: 0; }
        30% { opacity: 0.3; }
        60% { opacity: 0.7; }
        100% { opacity: 1; }
    }
    
    /* Animaciones para los títulos */
    .carousel-slide.active .carousel-title {
        animation: slideUpBlur 1s cubic-bezier(0.2, 0.9, 0.3, 1) forwards;
    }
    
    @keyframes slideUpBlur {
        0% {
            transform: translateY(30px);
            opacity: 0;
            filter: blur(10px);
        }
        30% {
            transform: translateY(15px);
            opacity: 0.3;
            filter: blur(5px);
        }
        60% {
            transform: translateY(5px);
            opacity: 0.7;
            filter: blur(2px);
        }
        100% {
            transform: translateY(0);
            opacity: 1;
            filter: blur(0);
        }
    }
    
    /* Animación para la descripción */
    .carousel-slide.active .carousel-desc {
        animation: slideUpDesc 1s cubic-bezier(0.2, 0.9, 0.3, 1) 0.5s forwards;
    }
    
    @keyframes slideUpDesc {
        0% {
            transform: translateY(30px);
            opacity: 0;
        }
        30% {
            transform: translateY(15px);
            opacity: 0.3;
        }
        60% {
            transform: translateY(5px);
            opacity: 0.7;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    /* Línea decorativa superior */
    .carousel-slide.active .decorative-line {
        animation: expandLine 1.2s cubic-bezier(0.2, 0.9, 0.3, 1) 0.2s forwards;
    }
    
    @keyframes expandLine {
        0% { width: 0; }
        100% { width: 80px; }
    }
    
    /* Línea lateral */
    .carousel-slide.active .sidebar-line {
        animation: growLine 1s cubic-bezier(0.2, 0.9, 0.3, 1) 0.3s forwards;
    }
    
    @keyframes growLine {
        0% { height: 0; }
        100% { height: 48px; }
    }
    
    /* Efecto de brillo */
    .carousel-slide.active .image-zoom-container::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255, 255, 255, 0.2),
            transparent
        );
        animation: shine 2s ease-in-out 0.3s;
        pointer-events: none;
    }
    
    @keyframes shine {
        0% { left: -100%; }
        20% { left: 100%; }
        100% { left: 100%; }
    }
    
    /* Estilo para los indicadores */
    .carousel-indicator {
        width: 12px;
        height: 12px;
        border-radius: 9999px;
        background: rgba(255, 255, 255, 0.5);
        border: 2px solid transparent;
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.3, 1);
        cursor: pointer;
        padding: 0;
    }
    
    .carousel-indicator:hover {
        background: rgba(255, 255, 255, 0.8);
        transform: scale(1.2) translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .carousel-indicator.active {
        width: 32px;
        background: white;
        border-color: rgba(59, 130, 246, 0.5);
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.6);
        transform: translateY(-2px);
    }
    
    /* Botones de navegación */
    .carousel-container:hover + .carousel-prev,
    .carousel-container:hover + .carousel-next,
    .carousel-prev:hover,
    .carousel-next:hover,
    .carousel-prev:focus,
    .carousel-next:focus {
        opacity: 1 !important;
    }
    
    .carousel-prev, .carousel-next {
        opacity: 0;
        transition: opacity 0.3s ease, transform 0.3s ease, background-color 0.3s ease;
    }
    
    .carousel-prev:hover, .carousel-next:hover {
        transform: translateY(-50%) scale(1.15);
        background: rgba(255, 255, 255, 0.3);
    }
    
    /* Ocultar scrollbar */
    .carousel-container {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    .carousel-container::-webkit-scrollbar {
        display: none;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .carousel-slide .relative {
            height: 350px;
        }
        
        @keyframes expandLine {
            0% { width: 0; }
            100% { width: 60px; }
        }
        
        .zoom-image {
            transition-duration: 6s;
        }
    }
    
    @media (max-width: 640px) {
        .carousel-slide .relative {
            height: 300px;
        }
        
        @keyframes expandLine {
            0% { width: 0; }
            100% { width: 40px; }
        }
        
        .carousel-indicator.active {
            width: 24px;
        }
        
        .zoom-image {
            transition-duration: 5s;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const track = document.querySelector('.carousel-track');
        const container = document.querySelector('.carousel-container');
        const slides = Array.from(document.querySelectorAll('.carousel-slide'));
        
        if (!track || !container || !slides.length) return;
        
        const prevBtn = document.querySelector('.carousel-prev');
        const nextBtn = document.querySelector('.carousel-next');
        const indicatorsWrap = document.getElementById('carouselIndicators');
        const currentSlideSpan = document.getElementById('currentSlide');
        const totalSlidesSpan = document.getElementById('totalSlides');
        
        let currentIndex = 0;
        let autoTimer = null;
        let isTransitioning = false;
        let animationFrame = null;
        
        // Función para resetear el zoom de todas las imágenes
        function resetZoom() {
            slides.forEach(slide => {
                const img = slide.querySelector('.zoom-image');
                if (img) {
                    img.style.transform = 'scale(1)';
                    img.style.objectFit = 'contain';
                }
            });
        }
        
        // Función para activar el zoom en el slide actual
        function activateZoom(index) {
            const activeSlide = slides[index];
            if (activeSlide) {
                const img = activeSlide.querySelector('.zoom-image');
                if (img) {
                    // Pequeño retraso para que primero se vea la imagen completa
                    setTimeout(() => {
                        img.style.transform = 'scale(1.2)';
                        img.style.objectFit = 'cover';
                    }, 100);
                }
            }
        }
        
        function updateActiveSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
            });
        }
        
        function updateCounter(index) {
            if (currentSlideSpan) {
                currentSlideSpan.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    currentSlideSpan.textContent = index + 1;
                    currentSlideSpan.style.transform = 'scale(1)';
                }, 150);
            }
        }
        
        function goTo(index) {
            if (isTransitioning) return;
            
            isTransitioning = true;
            
            const maxIndex = slides.length - 1;
            currentIndex = Math.min(Math.max(index, 0), maxIndex);
            
            // Resetear zoom de todas las imágenes
            resetZoom();
            
            // Calcular la posición basada en el ancho del contenedor
            const slideWidth = container.offsetWidth;
            const x = -currentIndex * slideWidth;
            
            if (animationFrame) {
                cancelAnimationFrame(animationFrame);
            }
            
            animationFrame = requestAnimationFrame(() => {
                track.style.transform = `translateX(${x}px)`;
            });
            
            // Actualizar estados
            updateActiveSlide(currentIndex);
            
            // Activar zoom para el nuevo slide
            activateZoom(currentIndex);
            
            // Actualizar indicadores
            const dots = indicatorsWrap?.querySelectorAll('.carousel-indicator');
            if (dots) {
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === currentIndex);
                });
            }
            
            updateCounter(currentIndex);
            
            setTimeout(() => {
                isTransitioning = false;
                animationFrame = null;
            }, 700);
        }
        
        function next() {
            if (isTransitioning) return;
            const nextIndex = currentIndex + 1;
            if (nextIndex < slides.length) {
                goTo(nextIndex);
            } else {
                goTo(0);
            }
            resetAuto();
        }
        
        function prev() {
            if (isTransitioning) return;
            const prevIndex = currentIndex - 1;
            if (prevIndex >= 0) {
                goTo(prevIndex);
            } else {
                goTo(slides.length - 1);
            }
            resetAuto();
        }
        
        function stopAuto() {
            if (autoTimer) {
                clearInterval(autoTimer);
                autoTimer = null;
            }
        }
        
        function startAuto() {
            if (slides.length <= 1) return;
            
            stopAuto();
            autoTimer = setInterval(() => {
                next();
            }, 8000);
        }
        
        function resetAuto() {
            stopAuto();
            startAuto();
        }
        
        // Crear indicadores
        if (indicatorsWrap && slides.length > 1) {
            indicatorsWrap.innerHTML = '';
            slides.forEach((_, i) => {
                const dot = document.createElement('button');
                dot.className = 'carousel-indicator';
                dot.setAttribute('aria-label', `Ir a la imagen ${i + 1}`);
                dot.addEventListener('click', () => {
                    if (!isTransitioning) {
                        goTo(i);
                        resetAuto();
                    }
                });
                indicatorsWrap.appendChild(dot);
            });
        }
        
        // Event listeners
        if (nextBtn) nextBtn.addEventListener('click', next);
        if (prevBtn) prevBtn.addEventListener('click', prev);
        
        // Pausar autoplay en hover
        track.addEventListener('mouseenter', stopAuto);
        track.addEventListener('mouseleave', startAuto);
        
        // Manejar resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                const slideWidth = container.offsetWidth;
                const x = -currentIndex * slideWidth;
                track.style.transform = `translateX(${x}px)`;
            }, 150);
        });
        
        // Inicializar
        goTo(0);
        startAuto();
        
        // Ocultar controles si solo hay una imagen
        if (slides.length <= 1) {
            if (prevBtn) prevBtn.style.display = 'none';
            if (nextBtn) nextBtn.style.display = 'none';
            if (indicatorsWrap) indicatorsWrap.style.display = 'none';
            if (currentSlideSpan?.parentElement) currentSlideSpan.parentElement.style.display = 'none';
        }
        
        // Precargar imágenes
        slides.forEach(slide => {
            const img = slide.querySelector('img');
            if (img && !img.complete) {
                img.loading = 'lazy';
            }
        });
    });
</script>