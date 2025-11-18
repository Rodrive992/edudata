<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div
    x-data="estadisticas($el)"
    x-init="init()"
    data-total-matricula="130125"
    data-total-estab="{{ (int) ($totalEstablecimientos ?? 0) }}"
    class="bg-transparent"
>
    {{-- Título (compacto) --}}
    <div x-data="{show:false}" x-init="setTimeout(()=>show=true,120)" class="mb-3 text-center">
        <h2 x-show="show"
            x-transition.opacity.duration.400ms
            class="text-xl md:text-3xl font-extrabold tracking-tight text-[color:var(--pri-900)] font-primary">
            Datos del Ministerio de Educación, Ciencia y Tecnología
        </h2>
        <span x-show="show"
              x-transition.scale.origin-center.duration.500ms
              class="mt-1 mx-auto block h-[3px] w-20 bg-gradient-to-r from-[color:var(--pri-500)] via-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded"></span>
    </div>

    {{-- Recuadros (compactos) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-3xl mx-auto">

        {{-- MATRÍCULA --}}
        <button type="button"
                @click="openModal('matricula', $event)"
                class="group relative overflow-hidden rounded-xl border-2 border-[color:var(--pri-500)] bg-white px-4 py-5
                       shadow-sm transition-all duration-150 hover:shadow-md hover:-translate-y-0.5 focus:outline-none
                       focus:ring-2 focus:ring-[color:var(--pri-500)] min-h-[140px]">
            <div class="flex flex-col items-center text-center">
                <div class="h-12 w-12 rounded-lg bg-[#e8f1fb] flex items-center justify-center mb-2.5">
                    <i class="fas fa-user-graduate text-[color:var(--pri-700)] text-xl"></i>
                </div>
                <div class="text-gray-800 font-semibold leading-tight">Matrícula</div>
                <div class="text-[32px] leading-none font-extrabold text-[color:var(--pri-700)] tabular-nums my-0.5">
                    <span x-text="formatNumber(counters.matricula)"></span>
                </div>
                <div class="text-[11px] text-gray-500">estudiantes</div>
            </div>
        </button>

        {{-- ESTABLECIMIENTOS --}}
        <button type="button"
                @click="openModal('establecimientos', $event)"
                class="group relative overflow-hidden rounded-xl border-2 border-[color:var(--pri-500)] bg-white px-4 py-5
                       shadow-sm transition-all duration-150 hover:shadow-md hover:-translate-y-0.5 focus:outline-none
                       focus:ring-2 focus:ring-[color:var(--pri-500)] min-h-[140px]">
            <div class="flex flex-col items-center text-center">
                <div class="h-12 w-12 rounded-lg bg-[#e8f1fb] flex items-center justify-center mb-2.5">
                    <i class="fas fa-school text-[color:var(--pri-700)] text-xl"></i>
                </div>
                <div class="text-gray-800 font-semibold leading-tight">Establecimientos</div>
                <div class="text-[32px] leading-none font-extrabold text-[color:var(--pri-700)] tabular-nums my-0.5">
                    <span x-text="formatNumber(counters.establecimientos)"></span>
                </div>
                <div class="text-[11px] text-gray-500">instituciones</div>
            </div>
        </button>
    </div>

    {{-- ===== Overlay ===== --}}
    <div x-cloak x-show="modal !== null"
         x-transition.opacity
         class="fixed inset-0 z-[100] bg-black/40 backdrop-blur-sm"
         @click.self="closeModal()"
         @keydown.escape.window="closeModal()"></div>

    {{-- ===== MODAL MATRÍCULA ===== --}}
    <div x-cloak x-show="modal === 'matricula'"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed inset-0 z-[101] flex items-end sm:items-center justify-center p-0 sm:p-4">
        <div class="w-full sm:max-w-5xl sm:max-h-[88vh] h-[92vh] sm:h-auto bg-white rounded-t-2xl sm:rounded-2xl overflow-hidden">
            {{-- Header --}}
            <div class="sticky top-0 z-10 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)]">
                <div class="px-6 py-4 text-white flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-lg bg-white/20 flex items-center justify-center">
                            <i class="fas fa-user-graduate text-base"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg font-primary">Distribución de Matrícula</h3>
                            <p class="text-[color:var(--pri-100)] text-xs mt-0.5">
                                Total: <span class="font-semibold">130.125</span> estudiantes
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Leyenda agregada aquí -->
                        <div class="hidden sm:flex items-center text-white/80 text-xs italic">
                            <i class="fas fa-info-circle mr-1 text-white/70"></i>
                            Datos proporcionados por la Secretaría de Planeamiento Educativo
                        </div>
                        <button @click="closeModal()"
                                class="h-9 px-3 rounded-lg bg-white/20 hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- Leyenda para móvil -->
                <div class="sm:hidden px-6 pb-2">
                    <div class="flex items-center text-white/80 text-xs italic">
                        <i class="fas fa-info-circle mr-1 text-white/70"></i>
                        Datos proporcionados por la Secretaría de Planeamiento Educativo
                    </div>
                </div>
            </div>

            {{-- Cuerpo --}}
            <div class="p-5 max-h-[calc(88vh-110px)] sm:max-h-[60vh] overflow-y-auto scrollbar-thin">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                    {{-- Por Modalidad --}}
                    <div class="space-y-3">
                        <h4 class="font-bold text-[color:var(--pri-900)] flex items-center font-primary">
                            <i class="fas fa-layer-group text-[color:var(--pri-700)] mr-3"></i>
                            Por Modalidad
                        </h4>
                        <div class="space-y-2.5">
                            {{-- Común --}}
                            <div class="flex items-center justify-between p-3.5 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                <div>
                                    <div class="font-semibold text-gray-800">Común</div>
                                    <div class="text-xs text-gray-600 mt-0.5">113.065 estudiantes</div>
                                </div>
                                <div class="text-right ml-4">
                                    <div class="font-bold text-gray-900 text-base mb-1">86,9%</div>
                                    <div class="w-24 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-2 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 86.9%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Adultos --}}
                            <div class="flex items-center justify-between p-3.5 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                <div>
                                    <div class="font-semibold text-gray-800">Adultos</div>
                                    <div class="text-xs text-gray-600 mt-0.5">14.873 estudiantes</div>
                                </div>
                                <div class="text-right ml-4">
                                    <div class="font-bold text-gray-900 text-base mb-1">11,14%</div>
                                    <div class="w-24 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-2 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 11.14%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Especial --}}
                            <div class="flex items-center justify-between p-3.5 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                <div>
                                    <div class="font-semibold text-gray-800">Especial</div>
                                    <div class="text-xs text-gray-600 mt-0.5">2.178 estudiantes</div>
                                </div>
                                <div class="text-right ml-4">
                                    <div class="font-bold text-gray-900 text-base mb-1">1,7%</div>
                                    <div class="w-24 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-2 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 1.7%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Por Dependencia --}}
                    <div class="space-y-3">
                        <h4 class="font-bold text-[color:var(--pri-900)] flex items-center font-primary">
                            <i class="fas fa-building text-[color:var(--pri-700)] mr-3"></i>
                            Por Gestión
                        </h4>
                        <div class="space-y-2.5">
                            {{-- Estatal --}}
                            <div class="flex items-center justify-between p-3.5 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                <div>
                                    <div class="font-semibold text-gray-800">Estatal</div>
                                    <div class="text-xs text-gray-600 mt-0.5">103.542 estudiantes</div>
                                </div>
                                <div class="text-right ml-4">
                                    <div class="font-bold text-gray-900 text-base mb-1">79,57%</div>
                                    <div class="w-24 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-2 bg-gradient-to-r from-[var(--ter-500)] to-[#5a9792] rounded-full" style="width: 79.57%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Privado --}}
                            <div class="flex items-center justify-between p-3.5 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                <div>
                                    <div class="font-semibold text-gray-800">Privado</div>
                                    <div class="text-xs text-gray-600 mt-0.5">26.583 estudiantes</div>
                                </div>
                                <div class="text-right ml-4">
                                    <div class="font-bold text-gray-900 text-base mb-1">20,43%</div>
                                    <div class="w-24 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-2 bg-gradient-to-r from-[var(--acc-500)] to-[#726f98] rounded-full" style="width: 20.43%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Por Nivel / Oferta Académica --}}
                    <div class="lg:col-span-2 mt-2">
                        <h4 class="font-bold text-[color:var(--pri-900)] flex items-center mb-3 font-primary">
                            <i class="fas fa-sitemap text-[color:var(--pri-700)] mr-3"></i>
                            Por Nivel / Oferta Académica
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            {{-- Común --}}
                            <div class="col-span-1 md:col-span-2">
                                <div class="font-semibold text-gray-700 mb-2 text-sm uppercase tracking-wide">Común</div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 ml-2">
                                    <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                        <div class="pr-3">
                                            <div class="font-medium text-gray-800 text-sm">Inicial - Común</div>
                                            <div class="text-xs text-gray-600 mt-0.5">13.911 estudiantes</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-gray-900 text-sm mb-1">10,7%</div>
                                            <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 10.7%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                        <div class="pr-3">
                                            <div class="font-medium text-gray-800 text-sm">Primario - Común</div>
                                            <div class="text-xs text-gray-600 mt-0.5">40.887 estudiantes</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-gray-900 text-sm mb-1">31,4%</div>
                                            <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 31.4%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                        <div class="pr-3">
                                            <div class="font-medium text-gray-800 text-sm">Secundario - Común</div>
                                            <div class="text-xs text-gray-600 mt-0.5">40.350 estudiantes</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-gray-900 text-sm mb-1">31,0%</div>
                                            <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 31.0%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                        <div class="pr-3">
                                            <div class="font-medium text-gray-800 text-sm">SNU (Superior)</div>
                                            <div class="text-xs text-gray-600 mt-0.5">14.636 estudiantes</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-gray-900 text-sm mb-1">11,2%</div>
                                            <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 11.2%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                        <div class="pr-3">
                                            <div class="font-medium text-gray-800 text-sm">Otros</div>
                                            <div class="text-xs text-gray-600 mt-0.5">33.281 estudiantes</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-gray-900 text-sm mb-1">25,6%</div>
                                            <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 25.6%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Adultos --}}
                            <div class="col-span-1 md:col-span-2 mt-3">
                                <div class="font-semibold text-gray-700 mb-2 text-sm uppercase tracking-wide">Adultos</div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 ml-2">
                                    <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                        <div class="pr-3">
                                            <div class="font-medium text-gray-800 text-sm">Primario - Adultos</div>
                                            <div class="text-xs text-gray-600 mt-0.5">309 estudiantes</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-gray-900 text-sm mb-1">0,2%</div>
                                            <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 0.2%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                        <div class="pr-3">
                                            <div class="font-medium text-gray-800 text-sm">Secundario - Adultos</div>
                                            <div class="text-xs text-gray-600 mt-0.5">2.553 estudiantes</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-gray-900 text-sm mb-1">2,0%</div>
                                            <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 2.0%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                        <div class="pr-3">
                                            <div class="font-medium text-gray-800 text-sm">Otros</div>
                                            <div class="text-xs text-gray-600 mt-0.5">12.011 estudiantes</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-gray-900 text-sm mb-1">9,2%</div>
                                            <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 9.2%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Especial --}}
                            <div class="col-span-1 md:col-span-2 mt-3">
                                <div class="font-semibold text-gray-700 mb-2 text-sm uppercase tracking-wide">Especial</div>
                                <div class="ml-2">
                                    <div class="flex items-center justify-between p-3 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-500)] transition">
                                        <div class="pr-3">
                                            <div class="font-medium text-gray-800 text-sm">Matrícula Total</div>
                                            <div class="text-xs text-gray-600 mt-0.5">2.178 estudiantes</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-gray-900 text-sm mb-1">1,7%</div>
                                            <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-1.5 bg-gradient-to-r from-[color:var(--pri-700)] to-[color:var(--pri-900)] rounded-full" style="width: 1.7%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-5 py-3 border-t border-gray-200 bg-gray-50 flex justify-end">
                <button @click="closeModal()"
                        class="px-4 py-2 rounded-md bg-white border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    {{-- ===== MODAL ESTABLECIMIENTOS ===== --}}
    <div x-cloak x-show="modal === 'establecimientos'"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed inset-0 z-[101] flex items-end sm:items-center justify-center p-0 sm:p-4">
        <div class="w-full sm:max-w-5xl sm:max-h-[88vh] h-[92vh] sm:h-auto bg-white rounded-t-2xl sm:rounded-2xl overflow-hidden">
            {{-- Header --}}
            <div class="sticky top-0 z-10 bg-gradient-to-r from-[var(--ter-500)] to-[#5a9792]">
                <div class="px-6 py-4 text-white flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-lg bg-white/20 flex items-center justify-center">
                            <i class="fas fa-school text-base"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg font-primary">Establecimientos Educativos</h3>
                            <p class="text-emerald-100 text-xs mt-0.5">
                                Total: <span x-text="formatNumber(totalEstab)" class="font-semibold"></span> establecimientos
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Leyenda agregada aquí -->
                        <div class="hidden sm:flex items-center text-white/80 text-xs italic">
                            <i class="fas fa-info-circle mr-1 text-white/70"></i>
                            Datos proporcionados por la Secretaría de Planeamiento Educativo
                        </div>
                        <button @click="closeModal()"
                                class="h-9 px-3 rounded-lg bg-white/20 hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- Leyenda para móvil -->
                <div class="sm:hidden px-6 pb-2">
                    <div class="flex items-center text-white/80 text-xs italic">
                        <i class="fas fa-info-circle mr-1 text-white/70"></i>
                        Datos proporcionados por la Secretaría de Planeamiento Educativo
                    </div>
                </div>
            </div>

            {{-- Cuerpo --}}
            <div class="p-5 max-h-[calc(88vh-110px)] sm:max-h-[60vh] overflow-y-auto scrollbar-thin">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                    {{-- Por Departamento --}}
                    <div class="space-y-3">
                        <h4 class="font-bold text-[color:var(--pri-900)] flex items-center font-primary">
                            <i class="fas fa-map-marked-alt text-[var(--ter-500)] mr-3"></i>
                            Por Departamento
                        </h4>
                        @php $totalDepto = max(1, (int) ($estabPorDepartamento?->sum('total') ?? 0)); @endphp
                        <div class="space-y-2.5">
                            @forelse(($estabPorDepartamento ?? collect()) as $fila)
                                @php
                                    $pct = round(($fila->total / $totalDepto) * 100, 1);
                                    $departamento = ucfirst(mb_strtolower($fila->departamento ?? 'Sin dato'));
                                @endphp
                                <div class="flex items-center justify-between p-3.5 bg-white rounded-md border border-gray-200 hover:border-[var(--ter-500)] transition">
                                    <div class="flex items-center gap-3 flex-1">
                                        <div class="h-8 w-8 rounded-full bg-[#e8f6f5] flex items-center justify-center font-bold text-[var(--ter-500)] text-xs">{{ $loop->iteration }}</div>
                                        <div class="font-semibold text-gray-800">{{ $departamento }}</div>
                                    </div>
                                    <div class="text-right ml-3">
                                        <div class="font-bold text-gray-900 text-sm mb-1">{{ $pct }}%</div>
                                        <div class="w-24 h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-2 bg-gradient-to-r from-[var(--ter-500)] to-[#5a9792] rounded-full" style="width: {{ $pct }}%"></div>
                                        </div>
                                        <div class="text-xs text-gray-600 mt-1">{{ $fila->total }} establecimientos</div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-6 text-gray-500 bg-white rounded-md border-2 border-dashed border-gray-200">
                                    <i class="fas fa-inbox text-2xl mb-2 opacity-50"></i>
                                    <p class="text-sm">Sin datos de departamentos.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Por Localidad --}}
                    <div class="space-y-3">
                        <h4 class="font-bold text-[color:var(--pri-900)] flex items-center font-primary">
                            <i class="fas fa-city text-[var(--ter-500)] mr-3"></i>
                            Por Localidad
                        </h4>
                        @php $totalLoc = max(1, (int) ($estabPorLocalidad?->sum('total') ?? 0)); @endphp
                        <div class="space-y-2 max-h-80 overflow-y-auto pr-2 scrollbar-thin">
                            @forelse(($estabPorLocalidad ?? collect()) as $fila)
                                @php
                                    $pct = round(($fila->total / $totalLoc) * 100, 1);
                                    $localidad = ucfirst(mb_strtolower($fila->localidad ?? 'Sin dato'));
                                @endphp
                                <div class="flex items-center justify-between p-2.5 bg-white rounded-md border border-gray-100 hover:border-[var(--ter-500)] transition">
                                    <div class="flex items-center gap-2.5 flex-1">
                                        <div class="h-7 w-7 rounded-full bg-[#e8f6f5] flex items-center justify-center font-bold text-[var(--ter-500)] text-[11px]">{{ $loop->iteration }}</div>
                                        <div class="font-medium text-gray-800 text-sm truncate">{{ $localidad }}</div>
                                    </div>
                                    <div class="text-right ml-3">
                                        <div class="font-bold text-gray-900 text-sm mb-0.5">
                                            {{ $fila->total }} <span class="text-gray-600 text-xs">({{ $pct }}%)</span>
                                        </div>
                                        <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-1.5 bg-gradient-to-r from-[var(--ter-500)] to-[#5a9792] rounded-full" style="width: {{ $pct }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-6 text-gray-500 bg-white rounded-md border-2 border-dashed border-gray-200">
                                    <i class="fas fa-inbox text-2xl mb-2 opacity-50"></i>
                                    <p class="text-sm">Sin datos de localidades.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>

            <div class="px-5 py-3 border-t border-gray-200 bg-gray-50 flex justify-end">
                <button @click="closeModal()"
                        class="px-4 py-2 rounded-md bg-white border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition">
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