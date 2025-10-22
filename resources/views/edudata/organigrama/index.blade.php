@extends('layouts.app')

@section('title', 'Edudata - Organigrama Ministerial')

@section('content')
    <div class="container mx-auto px-4">
        {{-- Carrusel full-bleed --}}
        <section x-data="{
            i: 0,
            imgs: [
                '{{ asset('images/bannerorganigrama1-v4.png') }}',
                '{{ asset('images/bannerorganigrama2-v4.png') }}'
            ],
            intervalId: null,
            start() { this.intervalId = setInterval(() => this.next(), 4000) },
            stop() { if (this.intervalId) clearInterval(this.intervalId) },
            next() { this.i = (this.i + 1) % this.imgs.length },
            prev() { this.i = (this.i - 1 + this.imgs.length) % this.imgs.length }
        }" x-init="start()" @mouseenter="stop()" @mouseleave="start()"
            class="relative left-1/2 right-1/2 -mx-[50vw] w-screen mb-10">
            <div class="relative w-full h-[100px] sm:h-[340px] md:h-[420px] lg:h-[435px] bg-[#1e2939]">
                <!-- Slides -->
                <template x-for="(src, idx) in imgs" :key="idx">
                    <div x-show="i === idx" x-transition.opacity.duration.500ms
                        class="absolute inset-0 flex items-center justify-center">
                        <img :src="src" :alt="`Banner ${idx+1}`" class="w-full h-full object-contain"
                            loading="eager" fetchpriority="high" />
                    </div>
                </template>

                <!-- Controles -->
                <button @click="prev()"
                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 rounded-full p-2 shadow outline-none"
                    aria-label="Anterior">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next()"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 rounded-full p-2 shadow outline-none"
                    aria-label="Siguiente">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Indicadores -->
                <div class="absolute bottom-3 w-full flex items-center justify-center gap-2">
                    <template x-for="(src, idx) in imgs" :key="idx">
                        <button @click="i = idx" class="h-2.5 w-2.5 rounded-full transition-all"
                            :class="i === idx ? 'bg-white w-4' : 'bg-white/40'" aria-label="Ir a la imagen"></button>
                    </template>
                </div>
            </div>
        </section>

        <!-- Presentación -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
            <div class="bg-white rounded-xl shadow-sm border border-[#1e2939]/15 p-6 flex flex-col h-full">
                <div class="flex items-center mb-4">
                    <div class="bg-[#1e2939]/10 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1e2939]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-[#1e2939]">Estructura Organizativa</h2>
                </div>
                <p class="text-gray-700 leading-relaxed flex-grow">
                    El Ministerio de Educación, Ciencia y Tecnología de la Provincia de Catamarca está compuesto por
                    diversas secretarías y direcciones provinciales que trabajan de manera coordinada para garantizar una
                    educación de calidad en todos los niveles y modalidades del sistema educativo provincial.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-[#1e2939]/15 p-6 flex flex-col h-full">
                <div class="flex items-center mb-4">
                    <div class="bg-[#1e2939]/10 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1e2939]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 0 014 0zM7 10a2 2 0 11-4 0 2 0 014 0z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-[#1e2939]">Equipo de Gestión</h2>
                </div>
                <p class="text-gray-700 leading-relaxed flex-grow">
                    Bajo el liderazgo del Ministro Nicolás Rosales Matienzo, el Ministerio cuenta con un equipo de
                    secretarios y directores provinciales especializados en cada área, trabajando de manera articulada para
                    implementar políticas educativas innovadoras y de calidad para todos los ciudadanos de Catamarca.
                </p>
            </div>
        </div>

        <!-- Nivel Ministerial -->
        <div class="bg-white rounded-xl shadow-lg border border-[#1e2939]/20 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-[#1e2939]/10 bg-[#1e2939]/5">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-[#1e2939]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-[#1e2939]">Nivel Ministerial</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="bg-[#1e2939]/5 p-5 rounded-lg border border-[#1e2939]/15 mb-6">
                    <h4 class="text-lg font-semibold text-[#1e2939] mb-2">Ministro</h4>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between">
                        <div>
                            <p class="text-[#1e2939] font-bold text-xl">Nicolás Rosales Matienzo</p>
                            <p class="text-gray-600">Pabellón N° 11 - CAPE</p>
                            <p class="text-gray-600">educacion@catamarca.edu.ar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Secretarías -->
        <div class="bg-white rounded-xl shadow-lg border border-[#1e2939]/20 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-[#1e2939]/10 bg-[#1e2939]/5">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1e2939] mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <h3 class="text-xl font-semibold text-[#1e2939]">Secretarías</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @php
                        $secretarias = [
                            ['t' => 'Innovación Educativa', 'n' => 'Cesar Garetto', 'l' => 'Pabellón N° 13 - CAPE', 'e' => 'innovacion@catamarca.edu.ar'],
                            ['t' => 'Articulación Institucional', 'n' => 'Milena Chasampi Rios', 'l' => 'Pabellón N° 15 - CAPE', 'e' => 'innovacion@catamarca.edu.ar'],
                            ['t' => 'Planeamiento Educativo', 'n' => 'Angela Sonia Aibar', 'l' => 'Pabellón N° 11 - CAPE', 'e' => 'planeamiento@catamarca.edu.ar'],
                            ['t' => 'Educación', 'n' => 'Roxana María Inés Monasterio', 'l' => 'Pabellón N° 12 - CAPE', 'e' => 'innovacion@catamarca.edu.ar'],
                            ['t' => 'Ciencia y Tecnología', 'n' => 'Luis Rafael Castro', 'l' => 'Pabellón N° 11 - CAPE', 'e' => 'innovacion@catamarca.edu.ar'],
                        ];
                    @endphp

                    @foreach ($secretarias as $s)
                        <div class="bg-[#1e2939]/5 p-5 rounded-lg border border-[#1e2939]/15 hover:border-[#1e2939]/30 transition">
                            <h4 class="text-lg font-semibold text-[#1e2939] mb-2">{{ $s['t'] }}</h4>
                            <p class="text-[#1e2939] font-semibold">{{ $s['n'] }}</p>
                            <p class="text-gray-600 text-sm">{{ $s['l'] }}</p>
                            <p class="text-gray-600 text-sm">{{ $s['e'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Direcciones Provinciales -->
        <div class="bg-white rounded-xl shadow-lg border border-[#1e2939]/20 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-[#1e2939]/10 bg-[#1e2939]/5">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1e2939] mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <h3 class="text-xl font-semibold text-[#1e2939]">Direcciones Provinciales</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @php
                        $direcciones = [
                            ['t'=>'Inteligencia Artificial y Alfabetización Digital','n'=>'Deborah Nancy Dumitru','l'=>'Pabellón N° 13 - CAPE','e'=>'dirinteligenciaartificial@catamarca.edu.ar'],
                            ['t'=>'Despacho','n'=>'Guillermo Eduardo Osella','l'=>'Pabellón N° 11 - CAPE','e'=>'mesadeentradas-despacho@catamarca.edu.ar'],
                            ['t'=>'Sumario Docente','n'=>'Samhara Saleme','l'=>'Pabellón N° 12 - CAPE','e'=>'dirsumariodocente@catamarca.gov.ar'],
                            ['t'=>'Asuntos Jurídicos','n'=>'Carolina del Valle Reynoso','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Programación y Mantenimiento Edilicio','n'=>'Silvia Inés Zalazar','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Transparencia Activa','n'=>'Renzo Augusto Gonzalez','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Unidad Ejecutora de Programas y Proyectos','n'=>'Victoria María Gonzalez Rojas','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Administración','n'=>'Lucas Rojas','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Parque Automotor','n'=>'Cristian Eduardo Agüero Arreguez','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Desarrollo Profesional y Evaluación Educativa','n'=>'Melisa Ludmila Schonhals','l'=>'Pabellón N° 11 - CAPE','e'=>'capacitacion@catamarca.edu.ar'],
                            ['t'=>'Estadística Educativa y Análisis Poblacional','n'=>'Ivana Elizabeth Herrera','l'=>'Pabellón N° 11 - CAPE','e'=>'estadistica@catamarca.edu.ar'],
                            ['t'=>'Educación Inicial','n'=>'Flavia Vanesa Chasampi','l'=>'Pabellón N° 13 - CAPE','e'=>'educacioninicial@catamarca.edu.ar'],
                            ['t'=>'Educación Primaria','n'=>'León Camij','l'=>'Pabellón N° 14 - CAPE','e'=>'educacionprimaria@catamarca.edu.ar'],
                            ['t'=>'Educación Secundaria','n'=>'Andrea María Silvina Perea','l'=>'Pabellón N° 13 - CAPE','e'=>'educacionsecundaria@catamarca.edu.ar'],
                            ['t'=>'Educación Superior','n'=>'Cintia Brizuela','l'=>'Pabellón N° 13 - CAPE','e'=>'educacionsuperior@catamarca.edu.ar'],
                            ['t'=>'Modalidades Educativas','n'=>'Fuente, Andrea Julieta','l'=>'Pabellón N° 14 - CAPE','e'=>'modalidadeseducativas@catamarca.edu.ar'],
                            ['t'=>'Educación de Gestión Municipal Privada, Social y Cooperativa','n'=>'Pablo Javier Figueroa','l'=>'Pabellón N° 13 - CAPE','e'=>'educacionprivadaymunicipal@catamarca.edu.ar'],
                            ['t'=>'Educación Técnica, Agrotécnica y Formación Profesional','n'=>'Matías Andrés Cabrera','l'=>'Pabellón N° 26 - CAPE','e'=>'educaciontecnicaagrotecticayfp@catamarca.edu.ar'],
                            ['t'=>'Startups y Ecosistema Emprendedor','n'=>'Ivanna Alejandra del V. Altamiranda','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Ciencia Aplicada y Formación Tecnológica','n'=>'María Luz Diaz Rodriguez','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Transformación Digital e Infraestructura Tecnológica','n'=>'Carlos David Ponce','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Legalización y Registro de Títulos','n'=>'Julio Rubén Quiroga','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Residencia Universitaria','n'=>'Alejandro Renée Bambicha','l'=>'Maximio Victoria S/N','e'=>'rup@catamarca.edu.ar'],
                            ['t'=>'Tesorería','n'=>'Florencia Anahí Merep','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Compras','n'=>'Daina Montivero','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Sistemas y Desarrollo Tecnológico','n'=>'Pablo Pedemonte','l'=>'Pabellón N° 13 - CAPE','e'=>'dsdt@catamarca.edu.ar'],
                            ['t'=>'Administración, Ejecución y Financiamiento Científico','n'=>'Jesica Alejandra Aybar','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                            ['t'=>'Investigación, Innovación y Extensión','n'=>'María Fernanda Carrizo Lopez','l'=>'Pabellón N° 11 - CAPE','e'=>'innovacion@catamarca.edu.ar'],
                        ];
                    @endphp

                    @foreach ($direcciones as $d)
                        <div class="bg-[#1e2939]/5 p-5 rounded-lg border border-[#1e2939]/15 hover:border-[#1e2939]/30 transition">
                            <h4 class="text-lg font-semibold text-[#1e2939] mb-2">{{ $d['t'] }}</h4>
                            <p class="text-[#1e2939] font-semibold">{{ $d['n'] }}</p>
                            <p class="text-gray-600 text-sm">{{ $d['l'] }}</p>
                            <p class="text-gray-600 text-sm">{{ $d['e'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
