<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div
    x-data="estadisticas($el)"
    x-init="init()"
    data-total-matricula="130125"
    data-total-estab="{{ (int) ($totalEstablecimientos ?? 0) }}"
    class="relative py-8"
>
    {{-- Fondo de contraste sutil --}}
    <div class="absolute inset-0 bg-gradient-to-b from-[color:var(--pri-50)]/30 via-transparent to-transparent pointer-events-none"></div>
    
    {{-- Efectos decorativos de fondo --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-20 -right-20 w-96 h-96 bg-[color:var(--pri-500)] opacity-[0.02] rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-[var(--ter-500)] opacity-[0.02] rounded-full blur-3xl"></div>
    </div>

    {{-- Título grande y llamativo pero más controlado --}}
    <div x-data="{show:false}" x-init="setTimeout(()=>show=true,120)" class="mb-10 text-center relative">
        <div class="relative inline-block">
            <h2 x-show="show"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                class="text-3xl md:text-4xl lg:text-5xl font-bold text-[color:var(--pri-900)] font-primary tracking-tight">
                Datos del <span class="text-transparent bg-clip-text bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)]">Ministerio de Educación,</span>
                <br class="hidden sm:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)]">Ciencia y Tecnología</span>
            </h2>
            
            {{-- Sombra del texto para dar profundidad --}}
            <div class="absolute -inset-2 bg-gradient-to-r from-[color:var(--pri-500)]/20 via-transparent to-[color:var(--ter-500)]/20 blur-2xl -z-10 rounded-full"></div>
        </div>
        
        {{-- Línea decorativa con puntos --}}
        <div class="flex items-center justify-center gap-1 mt-4">
            <span x-show="show"
                  x-transition.scale.origin-center.duration.500ms
                  class="inline-block h-[3px] w-12 bg-[color:var(--pri-300)] rounded-full">
            </span>
            <span x-show="show"
                  x-transition.scale.origin-center.duration.500ms.delay.100
                  class="inline-block h-[3px] w-20 bg-[color:var(--pri-500)] rounded-full">
            </span>
            <div class="flex gap-1.5 mx-2">
                <span x-show="show"
                      x-transition.scale.origin-center.duration.500ms.delay.200
                      class="inline-block h-1.5 w-1.5 bg-[color:var(--pri-400)] rounded-full">
                </span>
                <span x-show="show"
                      x-transition.scale.origin-center.duration.500ms.delay.250
                      class="inline-block h-1.5 w-1.5 bg-[color:var(--pri-500)] rounded-full">
                </span>
                <span x-show="show"
                      x-transition.scale.origin-center.duration.500ms.delay.300
                      class="inline-block h-1.5 w-1.5 bg-[color:var(--pri-600)] rounded-full">
                </span>
            </div>
            <span x-show="show"
                  x-transition.scale.origin-center.duration.500ms.delay.350
                  class="inline-block h-[3px] w-20 bg-[color:var(--pri-500)] rounded-full">
            </span>
            <span x-show="show"
                  x-transition.scale.origin-center.duration.500ms.delay.400
                  class="inline-block h-[3px] w-12 bg-[color:var(--pri-300)] rounded-full">
            </span>
        </div>
    </div>

    {{-- Tarjetas con tamaño ajustado --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-3xl mx-auto px-4 relative z-10">

        {{-- MATRÍCULA --}}
        <button type="button"
                @click="openModal('matricula', $event)"
                class="group relative overflow-hidden rounded-2xl bg-white px-6 py-8
                       shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-1 focus:outline-none
                       focus:ring-2 focus:ring-[color:var(--pri-500)] border border-gray-100">
            
            {{-- Efecto de borde en hover --}}
            <div class="absolute inset-0 rounded-2xl border-2 border-transparent group-hover:border-[color:var(--pri-500)]/20 transition-all duration-500"></div>
            
            {{-- Efecto de brillo sutil --}}
            <div class="absolute inset-0 bg-gradient-to-br from-[color:var(--pri-50)]/0 via-white to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            
            <div class="relative flex flex-col items-center text-center">
                {{-- Icono contenedor tamaño moderado --}}
                <div class="h-16 w-16 rounded-xl bg-gradient-to-br from-[color:var(--pri-50)] to-[color:var(--pri-100)] 
                            flex items-center justify-center mb-4 shadow-sm group-hover:shadow-md 
                            group-hover:scale-110 transition-all duration-500 border border-[color:var(--pri-200)]/30">
                    <i class="fas fa-user-graduate text-2xl text-[color:var(--pri-700)] group-hover:text-[color:var(--pri-900)] transition-colors duration-300"></i>
                </div>
                
                <div class="text-gray-500 font-medium text-xs uppercase tracking-wider mb-1">Matrícula Total</div>
                
                {{-- Contador --}}
                <div class="text-4xl leading-none font-bold text-[color:var(--pri-900)] tabular-nums mb-1 group-hover:scale-105 transition-transform duration-500">
                    <span x-text="formatNumber(counters.matricula)"></span>
                </div>
                
                <div class="text-xs text-gray-400 flex items-center gap-2">
                    <span class="w-1 h-1 bg-[color:var(--pri-400)] rounded-full"></span>
                    <span>estudiantes</span>
                    <span class="w-1 h-1 bg-[color:var(--pri-400)] rounded-full"></span>
                </div>

                {{-- Indicador de tendencia --}}
                <div class="absolute top-3 right-3 flex items-center gap-1 text-xs text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <i class="fas fa-arrow-up text-[10px]"></i>
                    <span>+2.3%</span>
                </div>
            </div>
        </button>

        {{-- ESTABLECIMIENTOS --}}
        <button type="button"
                @click="openModal('establecimientos', $event)"
                class="group relative overflow-hidden rounded-2xl bg-white px-6 py-8
                       shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-1 focus:outline-none
                       focus:ring-2 focus:ring-[var(--ter-500)] border border-gray-100">
            
            {{-- Efecto de borde en hover --}}
            <div class="absolute inset-0 rounded-2xl border-2 border-transparent group-hover:border-[var(--ter-500)]/20 transition-all duration-500"></div>
            
            {{-- Efecto de brillo sutil --}}
            <div class="absolute inset-0 bg-gradient-to-br from-[var(--ter-50)]/0 via-white to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            
            <div class="relative flex flex-col items-center text-center">
                {{-- Icono contenedor tamaño moderado --}}
                <div class="h-16 w-16 rounded-xl bg-gradient-to-br from-[var(--ter-50)] to-[var(--ter-100)] 
                            flex items-center justify-center mb-4 shadow-sm group-hover:shadow-md 
                            group-hover:scale-110 transition-all duration-500 border border-[var(--ter-200)]/30">
                    <i class="fas fa-school text-2xl text-[var(--ter-700)] group-hover:text-[var(--ter-900)] transition-colors duration-300"></i>
                </div>
                
                <div class="text-gray-500 font-medium text-xs uppercase tracking-wider mb-1">Establecimientos</div>
                
                {{-- Contador --}}
                <div class="text-4xl leading-none font-bold text-[color:var(--pri-900)] tabular-nums mb-1 group-hover:scale-105 transition-transform duration-500">
                    <span x-text="formatNumber(counters.establecimientos)"></span>
                </div>
                
                <div class="text-xs text-gray-400 flex items-center gap-2">
                    <span class="w-1 h-1 bg-[var(--ter-400)] rounded-full"></span>
                    <span>instituciones</span>
                    <span class="w-1 h-1 bg-[var(--ter-400)] rounded-full"></span>
                </div>

                {{-- Indicador de tendencia --}}
                <div class="absolute top-3 right-3 flex items-center gap-1 text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <i class="fas fa-arrow-up text-[10px]"></i>
                    <span>+1.8%</span>
                </div>
            </div>
        </button>
    </div>

    {{-- Leyenda inferior --}}
    <div x-data="{show:false}" x-init="setTimeout(()=>show=true,1000)" class="mt-8 text-center relative z-10">
        <div x-show="show" x-transition.opacity.duration.1000 
             class="inline-flex items-center gap-2 px-5 py-2 bg-white/80 backdrop-blur-sm rounded-full border border-gray-200 shadow-sm">
            <i class="fas fa-mouse-pointer text-[color:var(--pri-400)] text-xs"></i>
            <span class="text-xs text-gray-500">Click para ver análisis detallado</span>
        </div>
    </div>

    {{-- ===== Overlay (sin cambios) ===== --}}
    <div x-cloak x-show="modal !== null"
         x-transition.opacity
         class="fixed inset-0 z-[100] bg-black/30 backdrop-blur-sm"
         @click.self="closeModal()"
         @keydown.escape.window="closeModal()"></div>

    {{-- ===== MODAL MATRÍCULA (mantiene diseño anterior) ===== --}}
    <div x-cloak x-show="modal === 'matricula'"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed inset-0 z-[101] flex items-end sm:items-center justify-center p-0 sm:p-6">
        <div class="w-full sm:max-w-5xl sm:max-h-[90vh] h-[94vh] sm:h-auto bg-white rounded-t-2xl sm:rounded-2xl overflow-hidden shadow-2xl">
            {{-- Header --}}
            <div class="sticky top-0 z-10 bg-white border-b border-gray-200">
                <div class="px-8 py-5 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="h-14 w-14 rounded-xl bg-[color:var(--pri-50)] flex items-center justify-center">
                            <i class="fas fa-user-graduate text-2xl text-[color:var(--pri-700)]"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-xl text-[color:var(--pri-900)] font-primary">Matrícula Educativa</h3>
                            <p class="text-sm text-gray-500 mt-1 flex items-center gap-3">
                                <span>Total: <span class="font-semibold text-[color:var(--pri-700)]">130.125 estudiantes</span></span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span class="flex items-center gap-1"><i class="far fa-calendar-alt text-xs"></i>2024</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="hidden sm:flex items-center text-xs text-gray-400 bg-gray-50 px-3 py-1.5 rounded-full">
                            <i class="fas fa-info-circle mr-1"></i>
                            Secretaría de Planeamiento
                        </div>
                        <button @click="closeModal()"
                                class="h-10 w-10 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-all hover:rotate-90">
                            <i class="fas fa-times text-gray-500"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Cuerpo --}}
            <div class="p-8 max-h-[calc(94vh-140px)] sm:max-h-[70vh] overflow-y-auto scrollbar-thin">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    
                    {{-- Por Modalidad --}}
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-gray-100 pb-3">
                            <div class="h-8 w-1 bg-gradient-to-b from-[color:var(--pri-500)] to-[color:var(--pri-700)] rounded-full"></div>
                            <h4 class="font-semibold text-[color:var(--pri-900)] text-lg">Por Modalidad</h4>
                        </div>
                        
                        <div class="space-y-4">
                            {{-- Común --}}
                            <div class="group p-5 bg-gray-50 rounded-xl hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-[color:var(--pri-200)]">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-lg bg-white group-hover:bg-[color:var(--pri-50)] flex items-center justify-center shadow-sm">
                                            <i class="fas fa-users text-[color:var(--pri-600)]"></i>
                                        </div>
                                        <span class="font-medium text-gray-700">Común</span>
                                    </div>
                                    <span class="font-semibold text-[color:var(--pri-700)]">86,9%</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">113.065 estudiantes</span>
                                    <div class="w-32 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-500)] to-[color:var(--pri-700)] rounded-full" style="width: 86.9%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Adultos --}}
                            <div class="group p-5 bg-gray-50 rounded-xl hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-[color:var(--pri-200)]">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-lg bg-white group-hover:bg-[color:var(--pri-50)] flex items-center justify-center shadow-sm">
                                            <i class="fas fa-user-tie text-[color:var(--pri-600)]"></i>
                                        </div>
                                        <span class="font-medium text-gray-700">Adultos</span>
                                    </div>
                                    <span class="font-semibold text-[color:var(--pri-700)]">11,14%</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">14.873 estudiantes</span>
                                    <div class="w-32 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-500)] to-[color:var(--pri-700)] rounded-full" style="width: 11.14%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Especial --}}
                            <div class="group p-5 bg-gray-50 rounded-xl hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-[color:var(--pri-200)]">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-lg bg-white group-hover:bg-[color:var(--pri-50)] flex items-center justify-center shadow-sm">
                                            <i class="fas fa-universal-access text-[color:var(--pri-600)]"></i>
                                        </div>
                                        <span class="font-medium text-gray-700">Especial</span>
                                    </div>
                                    <span class="font-semibold text-[color:var(--pri-700)]">1,7%</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">2.178 estudiantes</span>
                                    <div class="w-32 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-500)] to-[color:var(--pri-700)] rounded-full" style="width: 1.7%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Por Gestión --}}
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-gray-100 pb-3">
                            <div class="h-8 w-1 bg-gradient-to-b from-[var(--ter-500)] to-[#5a9792] rounded-full"></div>
                            <h4 class="font-semibold text-[color:var(--pri-900)] text-lg">Por Gestión</h4>
                        </div>
                        
                        <div class="space-y-4">
                            {{-- Estatal --}}
                            <div class="group p-5 bg-gray-50 rounded-xl hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-[var(--ter-200)]">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-lg bg-white group-hover:bg-[var(--ter-50)] flex items-center justify-center shadow-sm">
                                            <i class="fas fa-landmark text-[var(--ter-600)]"></i>
                                        </div>
                                        <span class="font-medium text-gray-700">Estatal</span>
                                    </div>
                                    <span class="font-semibold text-[var(--ter-700)]">79,57%</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">103.542 estudiantes</span>
                                    <div class="w-32 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-1.5 bg-gradient-to-r from-[var(--ter-500)] to-[#5a9792] rounded-full" style="width: 79.57%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Privado --}}
                            <div class="group p-5 bg-gray-50 rounded-xl hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-[var(--acc-200)]">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-lg bg-white group-hover:bg-[var(--acc-50)] flex items-center justify-center shadow-sm">
                                            <i class="fas fa-building text-[var(--acc-600)]"></i>
                                        </div>
                                        <span class="font-medium text-gray-700">Privado</span>
                                    </div>
                                    <span class="font-semibold text-[var(--acc-700)]">20,43%</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">26.583 estudiantes</span>
                                    <div class="w-32 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-1.5 bg-gradient-to-r from-[var(--acc-500)] to-[#726f98] rounded-full" style="width: 20.43%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Por Nivel --}}
                    <div class="lg:col-span-2 mt-6">
                        <div class="flex items-center gap-3 border-b border-gray-100 pb-3 mb-6">
                            <div class="h-8 w-1 bg-gradient-to-b from-[color:var(--pri-400)] to-[color:var(--pri-600)] rounded-full"></div>
                            <h4 class="font-semibold text-[color:var(--pri-900)] text-lg">Distribución por Nivel</h4>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {{-- Común --}}
                            <div class="bg-gray-50 rounded-xl p-5">
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="h-6 w-1 bg-[color:var(--pri-500)] rounded-full"></div>
                                    <span class="font-medium text-gray-800">Común</span>
                                    <span class="text-xs bg-[color:var(--pri-100)] text-[color:var(--pri-700)] px-2 py-0.5 rounded-full ml-auto">86,9%</span>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Inicial</span>
                                        <span class="font-medium text-gray-800">13.911</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Primario</span>
                                        <span class="font-medium text-gray-800">40.887</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Secundario</span>
                                        <span class="font-medium text-gray-800">40.350</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Superior</span>
                                        <span class="font-medium text-gray-800">14.636</span>
                                    </div>
                                    <div class="flex justify-between text-sm pt-2 border-t border-gray-200">
                                        <span class="font-medium text-gray-700">Otros</span>
                                        <span class="font-medium text-gray-800">33.281</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Adultos --}}
                            <div class="bg-gray-50 rounded-xl p-5">
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="h-6 w-1 bg-[var(--ter-500)] rounded-full"></div>
                                    <span class="font-medium text-gray-800">Adultos</span>
                                    <span class="text-xs bg-[var(--ter-100)] text-[var(--ter-700)] px-2 py-0.5 rounded-full ml-auto">11,14%</span>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Primario</span>
                                        <span class="font-medium text-gray-800">309</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Secundario</span>
                                        <span class="font-medium text-gray-800">2.553</span>
                                    </div>
                                    <div class="flex justify-between text-sm pt-2 border-t border-gray-200">
                                        <span class="font-medium text-gray-700">Otros</span>
                                        <span class="font-medium text-gray-800">12.011</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Especial --}}
                            <div class="bg-gray-50 rounded-xl p-5">
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="h-6 w-1 bg-[var(--acc-500)] rounded-full"></div>
                                    <span class="font-medium text-gray-800">Especial</span>
                                    <span class="text-xs bg-[var(--acc-100)] text-[var(--acc-700)] px-2 py-0.5 rounded-full ml-auto">1,7%</span>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Matrícula Total</span>
                                        <span class="font-medium text-gray-800">2.178</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="px-8 py-4 border-t border-gray-200 bg-gray-50 flex justify-between items-center">
                <div class="text-xs text-gray-400 flex items-center gap-2">
                    <i class="far fa-clock"></i>
                    Actualizado: Enero 2024
                </div>
                <button @click="closeModal()"
                        class="px-6 py-2 rounded-lg bg-[color:var(--pri-500)] text-white text-sm font-medium hover:bg-[color:var(--pri-600)] transition-colors shadow-sm hover:shadow">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    {{-- ===== MODAL ESTABLECIMIENTOS (mantiene diseño anterior) ===== --}}
    <div x-cloak x-show="modal === 'establecimientos'"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed inset-0 z-[101] flex items-end sm:items-center justify-center p-0 sm:p-6">
        <div class="w-full sm:max-w-5xl sm:max-h-[90vh] h-[94vh] sm:h-auto bg-white rounded-t-2xl sm:rounded-2xl overflow-hidden shadow-2xl">
            {{-- Header --}}
            <div class="sticky top-0 z-10 bg-white border-b border-gray-200">
                <div class="px-8 py-5 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="h-14 w-14 rounded-xl bg-[var(--ter-50)] flex items-center justify-center">
                            <i class="fas fa-school text-2xl text-[var(--ter-700)]"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-xl text-[color:var(--pri-900)] font-primary">Establecimientos Educativos</h3>
                            <p class="text-sm text-gray-500 mt-1 flex items-center gap-3">
                                <span>Total: <span class="font-semibold text-[var(--ter-700)]" x-text="formatNumber(totalEstab)"></span> instituciones</span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span class="flex items-center gap-1"><i class="far fa-calendar-alt text-xs"></i>2024</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="hidden sm:flex items-center text-xs text-gray-400 bg-gray-50 px-3 py-1.5 rounded-full">
                            <i class="fas fa-info-circle mr-1"></i>
                            Secretaría de Planeamiento
                        </div>
                        <button @click="closeModal()"
                                class="h-10 w-10 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-all hover:rotate-90">
                            <i class="fas fa-times text-gray-500"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Cuerpo --}}
            <div class="p-8 max-h-[calc(94vh-140px)] sm:max-h-[70vh] overflow-y-auto scrollbar-thin">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    
                    {{-- Por Departamento --}}
                    <div class="space-y-5">
                        <div class="flex items-center gap-3 border-b border-gray-100 pb-3">
                            <div class="h-8 w-1 bg-gradient-to-b from-[var(--ter-500)] to-[#5a9792] rounded-full"></div>
                            <h4 class="font-semibold text-[color:var(--pri-900)] text-lg">Por Departamento</h4>
                        </div>
                        
                        @php $totalDepto = max(1, (int) ($estabPorDepartamento?->sum('total') ?? 0)); @endphp
                        <div class="space-y-3">
                            @forelse(($estabPorDepartamento ?? collect()) as $fila)
                                @php
                                    $pct = round(($fila->total / $totalDepto) * 100, 1);
                                    $departamento = ucfirst(mb_strtolower($fila->departamento ?? 'Sin dato'));
                                @endphp
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-white hover:shadow-sm transition-all border border-transparent hover:border-[var(--ter-200)]">
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-medium text-gray-400 w-6">{{ $loop->iteration }}</span>
                                        <span class="font-medium text-gray-700">{{ $departamento }}</span>
                                    </div>
                                    <div class="text-right">
                                        <span class="font-semibold text-[var(--ter-700)]">{{ $pct }}%</span>
                                        <span class="text-xs text-gray-400 ml-2">{{ $fila->total }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8 text-gray-400">Sin datos disponibles</div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Por Localidad --}}
                    <div class="space-y-5">
                        <div class="flex items-center gap-3 border-b border-gray-100 pb-3">
                            <div class="h-8 w-1 bg-gradient-to-b from-[var(--ter-500)] to-[#5a9792] rounded-full"></div>
                            <h4 class="font-semibold text-[color:var(--pri-900)] text-lg">Por Localidad</h4>
                            <span class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full ml-auto">{{ ($estabPorLocalidad ?? collect())->count() }}</span>
                        </div>
                        
                        @php $totalLoc = max(1, (int) ($estabPorLocalidad?->sum('total') ?? 0)); @endphp
                        <div class="space-y-2 max-h-96 overflow-y-auto pr-2 scrollbar-thin">
                            @forelse(($estabPorLocalidad ?? collect()) as $fila)
                                @php
                                    $pct = round(($fila->total / $totalLoc) * 100, 1);
                                    $localidad = ucfirst(mb_strtolower($fila->localidad ?? 'Sin dato'));
                                @endphp
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-white hover:shadow-sm transition-all">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-medium text-gray-400 w-5">{{ $loop->iteration }}</span>
                                        <span class="text-sm text-gray-700 truncate max-w-[150px]">{{ $localidad }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-medium text-[var(--ter-700)]">{{ $fila->total }}</span>
                                        <span class="text-xs text-gray-400">({{ $pct }}%)</span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8 text-gray-400">Sin datos disponibles</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="px-8 py-4 border-t border-gray-200 bg-gray-50 flex justify-between items-center">
                <div class="text-xs text-gray-400 flex items-center gap-2">
                    <i class="far fa-clock"></i>
                    Actualizado: Enero 2024
                </div>
                <button @click="closeModal()"
                        class="px-6 py-2 rounded-lg bg-[var(--ter-500)] text-white text-sm font-medium hover:bg-[var(--ter-600)] transition-colors shadow-sm hover:shadow">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function estadisticas($el) {
  return {
    modal: null,
    lastTriggerEl: null,
    totalMatricula: parseInt($el.getAttribute('data-total-matricula') || 0),
    totalEstab: parseInt($el.getAttribute('data-total-estab') || 0),
    counters: { matricula: 0, establecimientos: 0 },

    init() {
      this.animateTo('matricula', this.totalMatricula, 3500);
      this.animateTo('establecimientos', this.totalEstab, 3500);
    },

    animateTo(key, target, duration = 1200) {
      const start = performance.now();
      const step = (t) => {
        const p = Math.min(1, (t - start) / duration);
        const eased = 1 - Math.pow(1 - p, 4);
        this.counters[key] = Math.round(target * eased);
        if (p < 1) requestAnimationFrame(step);
      };
      requestAnimationFrame(step);
    },

    openModal(which, evt = null) {
      this.modal = which;
      this.lastTriggerEl = evt?.currentTarget || null;
      document.body.style.overflow = 'hidden';
    },

    closeModal() {
      this.modal = null;
      document.body.style.overflow = 'auto';
      if (this.lastTriggerEl) this.lastTriggerEl.focus();
    },

    formatNumber(n) {
      try { return new Intl.NumberFormat('es-AR').format(n); }
      catch(e){ return n; }
    }
  }
}
</script>