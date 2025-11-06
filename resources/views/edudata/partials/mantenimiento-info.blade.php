@php
    $panelColor = $panelColor ?? '#f8fafc';
    $logoSrc = $logoSrc ?? asset('images/estadisticas.png');
    $triggerLabel = $triggerLabel ?? 'Datos';
    $openDefault = isset($openDefault) ? (bool) $openDefault : false;
    
    // Obtener datos del controlador
    $mantenimientoData = app('App\Http\Controllers\MantenimientoRealizadasController')->index(request());
    $registros = $mantenimientoData->getData()['registros'] ?? [];
    
    // Calcular totales por tipo de tarea
    $totales = [
        'APH' => collect($registros->get('APH', []))->count(),
        'ELEC' => collect($registros->get('ELEC', []))->count(),
        'DEZM' => collect($registros->get('DEZM', []))->count(),
    ];
    
    $totalGeneral = array_sum($totales);
@endphp

<script>
    window.EDUDATA_MANTENIMIENTO_TOTALS = @json($totales);
    window.EDUDATA_MANTENIMIENTO_OPEN = @json($openDefault);
</script>

<style>
    .mantenimiento-panel {
        --panel-bg: {{ $panelColor }};
        --panel-grad: linear-gradient(180deg, #f5cb58 0%, #e2e8f0 100%);
        --panel-text: #334155;
        --panel-border: rgba(100, 116, 139, 0.2);
        --shadow-soft: 0 20px 40px rgba(0, 0, 0, 0.1);
        --accent-primary: #3b82f6;
        --accent-secondary: #10b981;
        --accent-tertiary: #f59e0b;
        --accent-aph: #ef4444;
        --accent-elec: #f59e0b;
        --accent-dezm: #10b981;
        --hover-glow: 0 0 20px rgba(59, 130, 246, 0.3);
    }

    .mantenimiento-panel {
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        z-index: 90;
        pointer-events: none;
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    /* Solapa lateral */
    .mantenimiento-panel .mantenimiento-trigger {
        position: absolute;
        left: -100px;
        top: 50%;
        transform: translateY(-50%);
        width: 90px;
        border-radius: 20px 0 0 20px;
        background: #6bbde5;
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
        gap: .45rem;
        pointer-events: all;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(10px);
    }

    .mantenimiento-panel .mantenimiento-trigger:hover {
        transform: translateY(-50%) scale(1.08);
        box-shadow:
            var(--hover-glow),
            0 8px 25px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(59, 130, 246, 0.3);
        background: linear-gradient(180deg, #f1f5f9   0%, #6bbde5 100%);
    }

    .mantenimiento-panel .mantenimiento-trigger img {
        width: 42px;
        height: 42px;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        transition: all 0.3s ease;
    }

    .mantenimiento-panel .mantenimiento-trigger:hover img {
        transform: scale(1.1) rotate(5deg);
        filter: drop-shadow(0 4px 8px rgba(59, 130, 246, 0.3));
    }

    .mantenimiento-panel .mantenimiento-trigger .mantenimiento-trigger-label {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        font-size: .85rem;
        letter-spacing: .15em;
        font-weight: 700;
        text-transform: uppercase;
        color: #ffffff;
        
    }
    /* Panel principal - MÁS COMPACTO */
    .mantenimiento-panel .mantenimiento-surface {
        width: 55vw;
        max-width: 450px;
        min-width: 380px;
        max-height: 75vh;
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
    .mantenimiento-panel .mantenimiento-head {
        padding: 12px 16px;
        border-bottom: 1px solid rgba(100, 116, 139, 0.1);
        text-align: center;
        background: linear-gradient(90deg, rgba(59, 130, 246, 0.05), rgba(16, 185, 129, 0.05));
        position: relative;
        overflow: hidden;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mantenimiento-panel .mantenimiento-head::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary), var(--accent-tertiary));
        border-radius: 0 0 3px 3px;
    }

    .mantenimiento-panel .mantenimiento-head h3 {
        font-size: 1.5rem;
        font-weight: 800;
        margin: 0;
        position: relative;
        display: inline-block;
        background: linear-gradient(135deg, #162172, #132172, #162172);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.01em;
    }

    .mantenimiento-panel .mantenimiento-head h3::after {
        content: "📊";
        position: absolute;
        right: -22px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.9rem;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    /* Botón de cerrar */
    .mantenimiento-panel .mantenimiento-close {
        position: absolute;
        top: 8px;
        right: 12px;
        background: rgba(255, 255, 255, 0.9);
        color: #64748b;
        border: 1px solid rgba(100, 116, 139, 0.2);
        border-radius: 50%;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1rem;
        font-weight: bold;
        transition: all 0.3s ease;
        z-index: 10;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .mantenimiento-panel .mantenimiento-close:hover {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        border-color: rgba(239, 68, 68, 0.3);
        transform: scale(1.1);
    }

    /* Body MÁS COMPACTO */
    .mantenimiento-panel .mantenimiento-body {
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        flex: 1;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.9), rgba(248, 250, 252, 0.95));
        overflow-y: auto;
        overflow-x: hidden;
    }

    /* Tarjeta de total general - MÁS COMPACTA */
    .total-card {
        background: #162172;
        color: white; 
        border-radius: 12px;
        padding: 1rem;
        text-align: center;
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.25);
        position: relative;
        overflow: hidden;
    }

    .total-card::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    .total-label {
        font-size: 0.75rem;
        font-weight: 600;
        opacity: 0.9;
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .total-value {
        font-size: 1.75rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 0.25rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .total-subtitle {
        font-size: 0.7rem;
        opacity: 0.8;
        font-weight: 500;
    }

    /* Tarjetas de categorías - MÁS COMPACTAS */
    .category-cards {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .category-card {
        background: white;
        border-radius: 10px;
        padding: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        border-left: 3px solid;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .category-card:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .category-card.aph {
        border-left-color: var(--accent-aph);
    }

    .category-card.elec {
        border-left-color: var(--accent-elec);
    }

    .category-card.dezm {
        border-left-color: var(--accent-dezm);
    }

    .category-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .category-card.aph .category-icon {
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        color: var(--accent-aph);
    }

    .category-card.elec .category-icon {
        background: linear-gradient(135deg, #fffbeb, #fef3c7);
        color: var(--accent-elec);
    }

    .category-card.dezm .category-icon {
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        color: var(--accent-dezm);
    }

    .category-content {
        flex: 1;
    }

    .category-name {
        font-size: 1rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.1rem;
    }

    .category-description {
        font-size: 0.65rem;
        color: #6b7280;
        line-height: 1.2;
    }

    .category-count {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1f2937;
        min-width: 45px;
        text-align: right;
    }

    .category-card.aph .category-count {
        color: var(--accent-aph);
    }

    .category-card.elec .category-count {
        color: var(--accent-elec);
    }

    .category-card.dezm .category-count {
        color: var(--accent-dezm);
    }

    /* Barra de progreso */
    .progress-container {
        margin-top: 0.75rem;
        padding-top: 0.75rem;
        border-top: 1px solid rgba(100, 116, 139, 0.1);
    }

    .progress-label {
        font-size: 0.7rem;
        font-weight: 600;
        color: #475569;
        margin-bottom: 0.4rem;
    }

    .progress-bar {
        height: 4px;
        background: #e2e8f0;
        border-radius: 2px;
        overflow: hidden;
        position: relative;
        display: flex;
    }

    .progress-fill {
        height: 100%;
        border-radius: 2px;
        transition: width 1.5s ease-in-out;
    }

    .progress-fill.aph { background: linear-gradient(90deg, var(--accent-aph), #f87171); }
    .progress-fill.elec { background: linear-gradient(90deg, var(--accent-elec), #fbbf24); }
    .progress-fill.dezm { background: linear-gradient(90deg, var(--accent-dezm), #34d399); }

    /* Scrollbar personalizado */
    .mantenimiento-body::-webkit-scrollbar {
        width: 6px;
    }

    .mantenimiento-body::-webkit-scrollbar-track {
        background: rgba(100, 116, 139, 0.1);
        border-radius: 3px;
        margin: 1px 0;
    }

    .mantenimiento-body::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        border-radius: 3px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .mantenimiento-body::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #1d4ed8, #059669);
    }

    /* Animaciones para dinamismo */
    @keyframes pulse-glow {
        0% {
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
        }
        70% {
            box-shadow: 0 0 0 6px rgba(59, 130, 246, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
        }
    }

    .mantenimiento-trigger.pulse {
        animation: pulse-glow 2s infinite;
    }

    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(5px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .counting {
        animation: countUp 0.6s ease-out;
    }

    /* =========================== */
    /* MEDIA QUERIES PARA MÓVILES  */
    /* =========================== */
    
    @media (max-width: 1024px) {
        .mantenimiento-panel {
            position: fixed;
            top: auto;
            bottom: 20px;
            right: 20px;
            left: auto;
            transform: none;
            z-index: 90;
        }

        .mantenimiento-panel .mantenimiento-trigger {
            position: relative;
            left: auto;
            top: auto;
            transform: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid var(--panel-border);
            padding: 0;
            flex-direction: row;
            justify-content: center;
            box-shadow: 
                0 6px 20px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.8);
        }

        .mantenimiento-panel .mantenimiento-trigger:hover {
            transform: scale(1.05);
        }

        .mantenimiento-panel .mantenimiento-trigger .mantenimiento-trigger-label {
            display: none;
        }

        .mantenimiento-panel .mantenimiento-trigger img {
            width: 28px;
            height: 28px;
            margin: 0;
        }

        .mantenimiento-panel .mantenimiento-surface {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100vw;
            max-width: none;
            min-width: auto;
            max-height: 100vh;
            border-radius: 0;
            border: none;
            z-index: 100;
        }

        .mantenimiento-panel .mantenimiento-head {
            padding: 10px 14px;
        }

        .mantenimiento-panel .mantenimiento-head h3 {
            font-size: 0.9rem;
        }

        .mantenimiento-panel .mantenimiento-body {
            padding: 14px;
            gap: 0.75rem;
        }

        .total-value {
            font-size: 1.5rem;
        }

        .category-card {
            padding: 0.75rem;
        }

        .category-icon {
            width: 32px;
            height: 32px;
            font-size: 0.9rem;
        }

        .category-count {
            font-size: 1rem;
            min-width: 40px;
        }
    }

    @media (max-width: 480px) {
        .mantenimiento-panel {
            bottom: 15px;
            right: 15px;
        }

        .mantenimiento-panel .mantenimiento-trigger {
            width: 55px;
            height: 55px;
        }

        .mantenimiento-panel .mantenimiento-trigger img {
            width: 24px;
            height: 24px;
        }

        .mantenimiento-panel .mantenimiento-body {
            padding: 12px;
        }

        .total-value {
            font-size: 1.25rem;
        }

        .category-card {
            flex-direction: column;
            text-align: center;
            gap: 0.5rem;
            padding: 0.75rem;
        }

        .category-count {
            text-align: center;
            min-width: auto;
        }
    }
</style>

<div class="mantenimiento-panel" x-data="mantenimientoPanel({ 
    totals: window.EDUDATA_MANTENIMIENTO_TOTALS, 
    openDefault: window.EDUDATA_MANTENIMIENTO_OPEN 
})" x-init="init()">

    <button class="mantenimiento-trigger" :class="{ 'pulse': !isOpen }" @click="toggle()" :aria-expanded="isOpen ? 'true' : 'false'">
        <img src="{{ $logoSrc }}" alt="Estadísticas de mantenimiento">
        <span class="mantenimiento-trigger-label">{{ $triggerLabel }}</span>
    </button>

    <section class="mantenimiento-surface" x-cloak x-show="isOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-x-full"
             x-transition:enter-end="opacity-100 transform translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-x-0"
             x-transition:leave-end="opacity-0 transform translate-x-0">

        <header class="mantenimiento-head">
            <h3>Estadísticas de Mantenimiento</h3>
            <button class="mantenimiento-close" @click="toggle()" aria-label="Cerrar panel de estadísticas">×</button>
        </header>

        <div class="mantenimiento-body">
            <!-- Tarjeta de total general -->
            <div class="total-card">
                <div class="total-label">Total de Tareas Realizadas</div>
                <div class="total-value" x-text="animatedTotal" :class="{ 'counting': isCounting }"></div>
                <div class="total-subtitle">Año {{ date('Y') }}</div>
            </div>

            <!-- Tarjetas de categorías -->
            <div class="category-cards">
                <!-- Albañilería (APH) -->
                <div class="category-card aph">
                    <div class="category-icon">
                        🧱
                    </div>
                    <div class="category-content">
                        <div class="category-name">Albañilería</div>
                        <div class="category-description">Reparaciones de infraestructura</div>
                    </div>
                    <div class="category-count" x-text="animatedAph" :class="{ 'counting': isCounting }"></div>
                </div>

                <!-- Electricidad (ELEC) -->
                <div class="category-card elec">
                    <div class="category-icon">
                        ⚡
                    </div>
                    <div class="category-content">
                        <div class="category-name">Electricidad</div>
                        <div class="category-description">Instalaciones eléctricas</div>
                    </div>
                    <div class="category-count" x-text="animatedElec" :class="{ 'counting': isCounting }"></div>
                </div>

                <!-- Desmalezamiento (DEZM) -->
                <div class="category-card dezm">
                    <div class="category-icon">
                        🌿
                    </div>
                    <div class="category-content">
                        <div class="category-name">Desmalezamiento</div>
                        <div class="category-description">Limpieza de espacios verdes</div>
                    </div>
                    <div class="category-count" x-text="animatedDezm" :class="{ 'counting': isCounting }"></div>
                </div>
            </div>

            <!-- Barra de progreso -->
            <div class="progress-container">
                <div class="progress-label">
                    <span>Distribución por tipo de tarea</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill aph" :style="`width: ${aphPercentage}%`"></div>
                    <div class="progress-fill elec" :style="`width: ${elecPercentage}%`"></div>
                    <div class="progress-fill dezm" :style="`width: ${dezmPercentage}%`"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function mantenimientoPanel({ totals = {}, openDefault = false } = {}) {
        return {
            isOpen: !!openDefault,
            isCounting: false,
            animatedTotal: 0,
            animatedAph: 0,
            animatedElec: 0,
            animatedDezm: 0,
            
            // Valores reales
            get realTotals() {
                return {
                    total: (totals.APH || 0) + (totals.ELEC || 0) + (totals.DEZM || 0),
                    aph: totals.APH || 0,
                    elec: totals.ELEC || 0,
                    dezm: totals.DEZM || 0
                };
            },
            
            // Porcentajes para la barra de progreso
            get aphPercentage() {
                const total = this.realTotals.total;
                return total > 0 ? (this.realTotals.aph / total) * 100 : 0;
            },
            
            get elecPercentage() {
                const total = this.realTotals.total;
                return total > 0 ? (this.realTotals.elec / total) * 100 : 0;
            },
            
            get dezmPercentage() {
                const total = this.realTotals.total;
                return total > 0 ? (this.realTotals.dezm / total) * 100 : 0;
            },
            
            init() {
                // Inicializar contadores en 0
                this.animatedTotal = 0;
                this.animatedAph = 0;
                this.animatedElec = 0;
                this.animatedDezm = 0;
            },
            
            toggle() {
                this.isOpen = !this.isOpen;
                if (this.isOpen) {
                    // Iniciar animación de contadores cuando se abre el panel
                    this.startCounting();
                } else {
                    // Resetear contadores cuando se cierra
                    this.resetCounters();
                }
            },
            
            startCounting() {
                this.isCounting = true;
                const real = this.realTotals;
                const duration = 1500; // 1.5 segundos (más rápido)
                const steps = 50;
                const stepDuration = duration / steps;
                
                let currentStep = 0;
                
                const animate = () => {
                    if (currentStep <= steps) {
                        const progress = currentStep / steps;
                        
                        // Aplicar easing function para efecto más natural
                        const easeOut = 1 - Math.pow(1 - progress, 3);
                        
                        this.animatedTotal = Math.floor(real.total * easeOut);
                        this.animatedAph = Math.floor(real.aph * easeOut);
                        this.animatedElec = Math.floor(real.elec * easeOut);
                        this.animatedDezm = Math.floor(real.dezm * easeOut);
                        
                        currentStep++;
                        setTimeout(animate, stepDuration);
                    } else {
                        // Asegurar valores finales exactos
                        this.animatedTotal = real.total;
                        this.animatedAph = real.aph;
                        this.animatedElec = real.elec;
                        this.animatedDezm = real.dezm;
                        this.isCounting = false;
                    }
                };
                
                animate();
            },
            
            resetCounters() {
                this.animatedTotal = 0;
                this.animatedAph = 0;
                this.animatedElec = 0;
                this.animatedDezm = 0;
                this.isCounting = false;
            }
        }
    }
</script>