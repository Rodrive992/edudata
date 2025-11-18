<section class="relative left-1/2 right-1/2 -mx-[50vw] w-screen hidden md:block">
    <div class="relative w-full h-[420px] lg:h-[500px] overflow-hidden">

        {{-- Imagen de fondo --}}
        <div x-data="{ loaded: false }" x-init="loaded = true"
             class="relative w-full h-full">
            <img src="{{ asset('images/banner-portal-6-1.png') }}"
                 alt="Portal de Transparencia"
                 class="w-full h-full object-cover block transition-opacity duration-700 ease-out"
                 :class="loaded ? 'opacity-100' : 'opacity-0'">
        </div>

        {{-- Contenido directamente sobre la imagen --}}    
        <div class="absolute inset-0 flex items-start pt-24"> {{-- Cambiado: items-center por items-start pt-16 --}}
            <div class="w-full max-w-6xl mx-auto px-8 lg:px-16">
                <div x-data="bannerCarousel()"
                    class="max-w-3xl ml-4"> {{-- Agregado: ml-8 para mover a la izquierda --}}

                    {{-- Contenedor principal --}}
                    <div class="relative min-h-[320px] flex items-center">

                        {{-- Estado 1: Portal de Transparencia + logo --}}
                        <div x-show="activeSlide === 0"
                             x-transition:enter="transition ease-out duration-1000"
                             x-transition:enter-start="opacity-0 transform translate-x-12"
                             x-transition:enter-end="opacity-100 transform translate-x-0"
                             x-transition:leave="transition ease-in duration-700"
                             x-transition:leave-start="opacity-100 transform translate-x-0"
                             x-transition:leave-end="opacity-0 transform -translate-x-12"
                             class="absolute inset-0 flex flex-col justify-center space-y-2 presentacion-font text-white"> {{-- Cambiado: space-y-6 por space-y-4 --}}

                            <div x-data="{
                                    loaded: false,
                                    init() {
                                        this.loaded = true;
                                    }
                                }">
                                <h2 class="text-6xl lg:text-7xl xl:text-8xl leading-[1.1] font-bold mb-4" {{-- Cambiado: mb-6 por mb-4 --}}
                                    x-data="{
                                        animated: false,
                                        init() {
                                            this.animated = true;
                                        }
                                    }"
                                    x-transition:enter="transition ease-out duration-1200 delay-300"
                                    x-transition:enter-start="opacity-0 transform translate-y-8"
                                    x-transition:enter-end="opacity-100 transform translate-y-0">
                                    <span class="drop-shadow-2xl" 
                                          x-show="animated"
                                          x-transition:enter="transition ease-out duration-800 delay-500"
                                          x-transition:enter-start="opacity-0 transform translate-y-4"
                                          x-transition:enter-end="opacity-100 transform translate-y-0">Portal de</span><br>
                                    <span class="text-[#222A59] relative drop-shadow-2xl"
                                          x-show="animated"
                                          x-transition:enter="transition ease-out duration-800 delay-700"
                                          x-transition:enter-start="opacity-0 transform translate-y-4"
                                          x-transition:enter-end="opacity-100 transform translate-y-0">
                                        Transparencia
                                    </span>
                                </h2>
                            </div>

                            <div class="mt-2" {{-- Cambiado: mt-6 por mt-2 --}}
                                 x-data="{
                                    loaded: false,
                                    init() {
                                        setTimeout(() => this.loaded = true, 900);
                                    }
                                }">
                                <img src="{{ asset('images/logo-ministerio-blanco-celeste.png') }}"
                                     alt="Ministerio de Educación, Ciencia y Tecnología"
                                     class="h-38 lg:h-32 xl:h-36 w-auto object-contain transition-all duration-1000"
                                     :class="loaded ? ' transform translate-y-0' : 'opacity-0 transform translate-y-4'">
                            </div>
                        </div>

                        {{-- Estado 2: Acceso público a la información --}}
                        <div x-show="activeSlide === 1"
                             x-transition:enter="transition ease-out duration-1000"
                             x-transition:enter-start="opacity-0 transform translate-y-8 scale-95"
                             x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-700"
                             x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 transform -translate-y-8 scale-95"
                             class="absolute inset-0 flex flex-col justify-center space-y-4 presentacion-font max-w-2xl">

                            <div>
                                <h2 class="text-5xl lg:text-6xl xl:text-7xl leading-[1.1] font-bold mb-6">
                                    <span class="text-white drop-shadow-2xl">Acceso público a la</span><br>
                                    <span class="text-[#222A59] relative drop-shadow-2xl">
                                        Información
                                    </span>
                                </h2>
                            </div>

                            <div class="h-1 w-20 bg-gradient-to-r from-blue-200 to-white rounded-full my-4 shadow-md"></div>

                            <div x-data="typingEffect()">
                                <p class="text-lg lg:text-xl leading-relaxed font-medium text-white pr-6 bg-[#222A59] rounded-2xl p-5 border border-white/20 shadow-2xl text-justify min-h-[120px] flex items-center mb-4">
                                    <span x-text="displayedText" 
                                          class="inline-block whitespace-pre-wrap"></span>
                                    <span x-show="isTyping && activeSlide === 1" 
                                          class="inline-block w-1 h-6 bg-blue-300 ml-1 animate-pulse"></span>
                                </p>

                                {{-- Dirección de Transparencia Activa --}}
                                <div x-show="typingComplete"
                                     x-transition:enter="transition ease-out duration-500"
                                     x-transition:enter-start="opacity-0 transform translate-y-2"
                                     x-transition:enter-end="opacity-100 transform translate-y-0"
                                     class="text-center pt-2">
                                    <span class="text-[#222A59] text-lg lg:text-xl font-semibold border-b-2 border-[#222A59] pb-1 px-4 inline-block">
                                        Dirección de Transparencia Activa
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Script mejorado para el carousel con tiempos diferentes --}}
    <script>
        function bannerCarousel() {
            return {
                activeSlide: 0,
                totalSlides: 2,
                interval: null,
                
                init() {
                    this.startAutoPlay();
                },
                
                startAutoPlay() {
                    this.interval = setInterval(() => {
                        this.nextSlide();
                    }, this.getSlideDuration()); // Tiempo dinámico según el slide
                },
                
                stopAutoPlay() {
                    if (this.interval) {
                        clearInterval(this.interval);
                    }
                },
                
                nextSlide() {
                    this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
                    // Reiniciar el intervalo con el nuevo tiempo
                    this.stopAutoPlay();
                    setTimeout(() => {
                        this.startAutoPlay();
                    }, 100);
                },
                
                goToSlide(index) {
                    this.stopAutoPlay();
                    this.activeSlide = index;
                    // Reiniciar autoplay después de 5 segundos de inactividad
                    setTimeout(() => {
                        this.startAutoPlay();
                    }, 5000);
                },
                
                getSlideDuration() {
                    // Slide 0 (Portal de Transparencia): 2.8 segundos
                    // Slide 1 (Acceso a la información): 7 segundos
                    return this.activeSlide === 0 ? 2800 : 7000;
                }
            }
        }

        function typingEffect() {
            return {
                text: 'El Ministerio de Educación, Ciencia y Tecnología brinda a la ciudadanía acceso a la información sobre el funcionamiento de sus áreas, programas y uso de recursos públicos.',
                displayedText: '',
                index: 0,
                isTyping: false,
                typingComplete: false,
                init() {
                    this.$watch('activeSlide', (value) => {
                        if (value === 1 && !this.isTyping) {
                            this.startTyping();
                        }
                    });
                    if (this.activeSlide === 1) {
                        setTimeout(() => this.startTyping(), 100);
                    }
                },
                startTyping() {
                    this.isTyping = true;
                    this.typingComplete = false;
                    this.displayedText = '';
                    this.index = 0;
                    this.typeCharacter();
                },
                typeCharacter() {
                    if (this.index < this.text.length) {
                        this.displayedText += this.text.charAt(this.index);
                        this.index++;
                        setTimeout(() => this.typeCharacter(), 17);
                    } else {
                        this.isTyping = false;
                        this.typingComplete = true;
                    }
                }
            }
        }
    </script>

    {{-- Estilos específicos de la presentación --}}
    <style>
        .presentacion-font {
            font-family: 'Neue Haas Grotesk Display Pro', system-ui, -apple-system, BlinkMacSystemFont,
                'Segoe UI', sans-serif;
        }
        
        .drop-shadow-2xl {
            filter: drop-shadow(0 2px 4px rgba(64, 92, 164, 1));
        }
        
        .text-justify {
            text-align: justify;
            hyphens: auto;
        }
    </style>
</section>