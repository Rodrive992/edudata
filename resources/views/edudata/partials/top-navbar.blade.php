<nav
    class="sticky top-0 z-50 bg-gradient-to-r from-[var(--pri-700)] via-[#3a56a0] to-[var(--pri-900)] shadow-sm backdrop-blur">
    <div class="relative z-10" x-data="{ mobileMenuOpen: false, openSections: false, openOrg: false, openSolicitud: false }">

        <!-- TOP BAR -->
        <div class="px-4">
            <div class="max-w-7xl mx-auto py-3 md:py-2">
                <div class="flex items-center justify-between">

                    <!-- Izquierda: Logo + título -->
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <a href="{{ route('edudata.index') }}" class="shrink-0">
                            <img src="{{ asset('images/logoedudata-blanco.png') }}" alt="EDUDATA Logo"
                                class="h-10 sm:h-12 md:h-14">
                        </a>

                        <!-- Título -->
                        <div class="select-none hidden sm:block leading-tight">
                            <div
                                class="text-[13px] md:text-[15px] font-medium tracking-wide text-white/90 font-secondary">
                                Dirección de
                            </div>
                            <div class="text-base md:text-ls font-bold tracking-tight font-primary">
                                <span class="bg-[#64A1D5] text-white px-1 py-1 ">Transparencia</span>
                                <span class="text-white font-extrabold ">Activa</span>
                            </div>
                        </div>
                    </div>

                    <!-- Menú para desktop -->
                    <div class="hidden md:flex justify-end items-center gap-3">

                        @php
                            $menuBtn = 'group inline-flex items-center px-4 py-2 rounded-md
                           text-white/95 hover:text-white bg-white/10 hover:bg-white/20
                           border border-white/20 shadow-sm
                           transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-white/40
                           text-[12px] font-semibold uppercase tracking-wide font-primary';
                            $chev = 'w-4 h-4 ml-2 transition-transform duration-200 group-aria-expanded:rotate-180';
                            $panelBase = 'absolute right-0 mt-2 overflow-hidden rounded-xl z-40
                           border border-white/15 bg-white/95 backdrop-blur-md shadow-lg';
                            $panelHead = 'px-4 pt-3 pb-2 text-xs uppercase tracking-wider
                           bg-white text-[color:var(--pri-900)] font-semibold border-b border-gray-200 font-primary';
                            $itemBase = 'flex items-center px-4 py-2 rounded-md transition group/item
                           text-[color:var(--pri-900)] text-[15px] font-secondary';
                            $itemFx = 'hover:bg-[#e8f1fb]';
                            $itemCaret =
                                'ml-auto text-[color:var(--pri-500)] opacity-0 group-hover/item:opacity-100 transition';
                        @endphp

                        <!-- SECCIONES -->
                        <div class="relative" @click.outside="openSections=false" :aria-expanded="openSections">
                            <button @click="openSections = !openSections" class="{{ $menuBtn }}">
                                Secciones
                                <svg class="{{ $chev }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-cloak x-show="openSections" x-transition.opacity.duration.120ms
                                class="{{ $panelBase }} w-80">
                                <div class="{{ $panelHead }}">Secciones disponibles</div>
                                <ul class="px-2 py-2">
                                    <li><a href="{{ route('edudata.mantenimiento') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Mantenimiento Edilicio <span
                                                class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.normativa') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Digesto Normativo <span
                                                class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.asambleas') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Cobertura de Cargos<span
                                                class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.formacion') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Capacitaciones <span
                                                class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.programas') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Programas y Proyectos
                                            <span class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.edutecnica') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Educación Técnica <span
                                                class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.innovacion') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Innovación Educativa <span
                                                class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.asuntos') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Asuntos Jurídicos <span
                                                class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.titulos') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Títulos <span
                                                class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.residencia') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Residencia Universitaria
                                            <span class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.sumario') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Sumario Docente
                                            <span class="{{ $itemCaret }}">→</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- ORGANIGRAMA -->
                        <div class="relative" @click.outside="openOrg=false" :aria-expanded="openOrg">
                            <button @click="openOrg = !openOrg" class="{{ $menuBtn }}">
                                Organigrama
                                <svg class="{{ $chev }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-cloak x-show="openOrg" x-transition.opacity.duration.120ms
                                class="{{ $panelBase }} w-80">
                                <div class="{{ $panelHead }}">Organigrama Institucional</div>
                                <ul class="px-2 py-2">
                                    <li><a href="{{ route('edudata.organigrama') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Ver organigrama <span
                                                class="{{ $itemCaret }}">→</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- SOLICITUD -->
                        <div class="relative" @click.outside="openSolicitud=false" :aria-expanded="openSolicitud">
                            <button @click="openSolicitud = !openSolicitud" class="{{ $menuBtn }}">
                                Solicitud
                                <svg class="{{ $chev }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-cloak x-show="openSolicitud" x-transition.opacity.duration.120ms
                                class="{{ $panelBase }} w-72">
                                <div class="{{ $panelHead }}">Solicitar Información</div>
                                <ul class="px-2 py-2">
                                    <li><a href="{{ route('edudata.solicitud-info') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Ir al formulario<span
                                                class="{{ $itemCaret }}">→</span></a></li>
                                    <li><a href="{{ route('edudata.solicitud-info.registro_solicitudes_info') }}"
                                            class="{{ $itemBase }} {{ $itemFx }}">Registro de
                                            Solicitudes<span class="{{ $itemCaret }}">→</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Botón menú móvil -->
                    <div class="md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen"
                            class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            :aria-expanded="mobileMenuOpen">
                            <span class="sr-only">Abrir menú principal</span>
                            <!-- Icono hamburguesa -->
                            <svg x-show="!mobileMenuOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Icono X -->
                            <svg x-show="mobileMenuOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                </div>

                <!-- Menú móvil -->
                <div x-cloak x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="md:hidden mt-4 pb-4 border-t border-white/20 pt-4 space-y-3">

                    <div>
                        <a href="{{ route('edudata.index') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-semibold font-secondary">Inicio</a>
                    </div>

                    <div>
                        <a href="{{ route('edudata.mantenimiento') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Mantenimiento
                            Edilicio</a>
                        <a href="{{ route('edudata.normativa') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Digesto
                            Normativo</a>
                        <a href="{{ route('edudata.asambleas') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Cobertura
                            de Cargos</a>
                        <a href="{{ route('edudata.formacion') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Capacitaciones</a>
                        <a href="{{ route('edudata.programas') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Programas
                            y Proyectos</a>
                        <a href="{{ route('edudata.edutecnica') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Educación
                            Técnica</a>
                        <a href="{{ route('edudata.innovacion') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Innovación
                            Educativa</a>
                        <a href="{{ route('edudata.asuntos') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Asuntos
                            Jurídicos</a>
                        <a href="{{ route('edudata.titulos') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Títulos</a>
                        <a href="{{ route('edudata.residencia') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Residencia
                            Universitaria</a>
                        <a href="{{ route('edudata.organigrama') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Organigrama</a>
                        <a href="{{ route('edudata.solicitud-info') }}"
                            class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition font-secondary">Solicitud
                            de Información</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
