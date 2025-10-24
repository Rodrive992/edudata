<nav class="sticky top-0 z-50 bg-[#6bbde5] before:content-[''] before:absolute before:inset-0 before:opacity-95">
  <div class="relative z-10"
       x-data="{ mobileMenuOpen: false, openSections: false, openTransp: false, openOrg: false }">

    <!-- TOP BAR -->
    <div class="px-4">
      <div class="max-w-7xl mx-auto py-3 md:py-2">
        <div class="flex items-center justify-between">

          <!-- Izquierda: Logo + título -->
          <div class="flex items-center gap-1 md:gap-2 flex-shrink-0">
            <a href="{{ route('edudata.index') }}" class="shrink-0">
              <img src="{{ asset('images/logoedudata-blanco.png') }}" alt="EDUDATA Logo"
                   class="h-10 sm:h-12 md:h-16">
            </a>

            <!-- Título (más compacto) -->
            <div class="select-none hidden sm:block">
              <div class="text-[12px] sm:text-[13px] md:text-[16px] font-medium tracking-wide text-white/95 leading-[1.1]">
                Dirección de
              </div>
              <div class="text-sm sm:text-base md:text-lg font-extrabold tracking-tight leading-[1.1] -mt-0.5">
                <span class="text-[#162172]">Transparencia</span>
                <span class="text-white/95 font-extrabold">Activa</span>
              </div>
            </div>
          </div>

          <!-- Menú para desktop -->
          <div class="hidden md:flex justify-end items-center gap-3">
            @php
              $menuBtn  = 'group inline-flex items-center px-3 py-2 rounded-md
                           text-white/95 hover:text-white
                           bg-white/5 hover:bg-white/10
                           border border-white/10
                           transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-white/30
                           text-[12px] font-semibold uppercase tracking-wide';
              $chev     = 'w-4 h-4 ml-2 transition-transform duration-200 group-aria-expanded:rotate-180';
              $panelBase= 'absolute right-0 mt-2 overflow-hidden rounded-xl z-40
                           border border-white/15 bg-white/95 backdrop-blur-md';
              $panelHead= 'px-4 pt-3 pb-2 text-xs uppercase tracking-wider
                           bg-white text-[#0A1143]/80 font-semibold';
              $itemBase = 'flex items-center px-4 py-2 rounded-md transition group/item
                           text-[#0A1143] text-[15px]';
              $itemFx   = 'hover:bg-[#f5f7ff]';
              $itemCaret= 'ml-auto text-[#1890FF] opacity-0 group-hover/item:opacity-100 transition';
            @endphp

            <!-- Secciones -->
            <div class="relative" @click.outside="openSections=false" :aria-expanded="openSections">
              <button @click="openSections = !openSections" class="{{ $menuBtn }}">
                Secciones
                <svg class="{{ $chev }}" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
              <div x-cloak x-show="openSections"
                   x-transition.opacity.duration.120ms
                   class="{{ $panelBase }} w-80">
                <div class="{{ $panelHead }}">Secciones disponibles</div>
                <ul class="px-2 py-2">
                  <li><a href="{{ route('edudata.mantenimiento')}}"class="{{ $itemBase }} {{ $itemFx }}">Mantenimiento Edilicio <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="{{ route('edudata.normativa')}}" class="{{ $itemBase }} {{ $itemFx }}">Digesto Normativo <span class="{{ $itemCaret }}">→</span></a></li>        
                  <li><a href="{{ route('edudata.edutecnica')}}" class="{{ $itemBase }} {{ $itemFx }}">Educación Técnica <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="{{ route('edudata.innovacion')}}" class="{{ $itemBase }} {{ $itemFx }}">Innovación Educativa <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="{{ route('edudata.formacion')}}" class="{{ $itemBase }} {{ $itemFx }}">Formación y Programación <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="{{ route('edudata.asuntos')}}" class="{{ $itemBase }} {{ $itemFx }}">Asuntos Jurídicos <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="{{ route('edudata.titulos')}}" class="{{ $itemBase }} {{ $itemFx }}">Títulos <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="{{ route('edudata.programas')}}" class="{{ $itemBase }} {{ $itemFx }}">Programas y Proyectos <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="{{ route('edudata.residencia')}}" class="{{ $itemBase }} {{ $itemFx }}">Residencia Universitaria <span class="{{ $itemCaret }}">→</span></a></li>
                </ul>
              </div>
            </div>

            <!-- Transparencia -->
            <div class="relative" @click.outside="openTransp=false" :aria-expanded="openTransp">
              <button @click="openTransp = !openTransp" class="{{ $menuBtn }}">
                Transparencia
                <svg class="{{ $chev }}" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
              <div x-cloak x-show="openTransp"
                   x-transition.opacity.duration.120ms
                   class="{{ $panelBase }} w-80">
                <div class="{{ $panelHead }}">Organigrama Institucional</div>
                <ul class="px-2 py-2">
                  <li><a href="{{ route('edudata.organigrama')}}" class="{{ $itemBase }} {{ $itemFx }}">Ver organigrama <span class="{{ $itemCaret }}">→</span></a></li>
                </ul>
              </div>
            </div>

            <!-- Solicitud-->
            <div class="relative" @click.outside="openOrg=false" :aria-expanded="openOrg">
              <button @click="openOrg = !openOrg" class="{{ $menuBtn }}">
                Solicitud
                <svg class="{{ $chev }}" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
              <div x-cloak x-show="openOrg"
                   x-transition.opacity.duration.120ms
                   class="{{ $panelBase }} w-64">
                <div class="{{ $panelHead }}">Solicitar Información</div>
                <ul class="px-2 py-2">
                  <li><a href="{{ route('edudata.solicitud-info') }}" class="{{ $itemBase }} {{ $itemFx }}">Ir al formulario<span class="{{ $itemCaret }}">→</span></a></li>
                </ul>
                <ul class="px-2 py-2">
                  <li><a href="{{ route('edudata.solicitud-info.registro_solicitudes_info') }}" class="{{ $itemBase }} {{ $itemFx }}">Registro de Solicitudes<span class="{{ $itemCaret }}">→</span></a></li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Botón menú móvil -->
          <div class="md:hidden">
            <button 
              @click="mobileMenuOpen = !mobileMenuOpen" 
              class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
              :aria-expanded="mobileMenuOpen">
              <span class="sr-only">Abrir menú principal</span>
              <!-- Icono hamburguesa -->
              <svg x-show="!mobileMenuOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!-- Icono X -->
              <svg x-show="mobileMenuOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

        </div>

        <!-- Menú móvil -->
        <div x-cloak x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="md:hidden mt-4 pb-4 border-t border-white/20 pt-4">
          
          <!-- Secciones móvil -->
          <div class="mb-3">
            <button 
              @click="openSections = !openSections"
              class="w-full flex justify-between items-center px-4 py-3 text-left text-white bg-white/10 rounded-lg">
              <span class="font-medium">Secciones</span>
              <svg :class="openSections ? 'rotate-180' : ''" class="w-5 h-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="openSections" class="mt-2 pl-4 space-y-2">
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Mantenimiento Edilicio</a>
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Digesto Normativo</a>
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Educación Técnica</a>
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Innovación Educativa</a>
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Formación y Programación</a>
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Asuntos Jurídicos</a>
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Títulos</a>
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Programas y Proyectos</a>
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Residencia Universitaria</a>
            </div>
          </div>

          <!-- Transparencia móvil -->
          <div class="mb-3">
            <button 
              @click="openTransp = !openTransp"
              class="w-full flex justify-between items-center px-4 py-3 text-left text-white bg-white/10 rounded-lg">
              <span class="font-medium">Transparencia</span>
              <svg :class="openTransp ? 'rotate-180' : ''" class="w-5 h-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="openTransp" class="mt-2 pl-4">
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Ver organigrama</a>
            </div>
          </div>

          <!-- Solicitud móvil -->
          <div class="mb-3">
            <button 
              @click="openOrg = !openOrg"
              class="w-full flex justify-between items-center px-4 py-3 text-left text-white bg-white/10 rounded-lg">
              <span class="font-medium">Solicitud de información</span>
              <svg :class="openOrg ? 'rotate-180' : ''" class="w-5 h-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="openOrg" class="mt-2 pl-4">
              <a href="#" class="block py-2 px-4 text-white/90 hover:bg-white/10 rounded-md transition">Ir al formulario</a>
            </div>
          </div>

        </div>
      </div>
    </div>  
  </div>
</nav>