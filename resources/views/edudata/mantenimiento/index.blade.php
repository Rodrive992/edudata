@extends('layouts.app')

@section('title', 'Edudata - Mantenimiento Edilicio')

@section('content')
    <style>
        [x-cloak] { display: none !important }

        /* ===========================
           LOOK: LLAMATIVO PERO SOBRIO (AZULES)
        =========================== */

        /* Bloque general suavizado */
        .soft-card{
            background:#fff;
            border:1px solid rgba(148,163,184,.45);
            border-radius:16px;
            box-shadow:0 8px 24px rgba(15,23,42,.06);
        }

        /* Panel descriptivo */
        .hero-panel{
            background: linear-gradient(135deg, rgba(239,246,255,.95) 0%, rgba(224,242,254,.92) 45%, rgba(238,242,255,.92) 100%);
            border:1px solid rgba(148,163,184,.40);
            border-radius:16px;
            padding:1.25rem;
            box-shadow:0 10px 26px rgba(15,23,42,.06);
            position:relative;
            overflow:hidden;
        }
        .hero-panel::before{
            content:"";
            position:absolute;
            inset:-40%;
            background:
                radial-gradient(circle at 30% 30%, rgba(59,130,246,.18), transparent 55%),
                radial-gradient(circle at 70% 60%, rgba(37,99,235,.12), transparent 55%);
            transform: rotate(8deg);
            pointer-events:none;
        }
        .hero-panel>*{ position:relative; z-index:1; }

        .hero-text{
            color:#334155;
            line-height:1.7;
        }

        /* ===========================
           HERO + QUICK: MÁS COLOR + DINAMISMO (SOBRIO)
        =========================== */

        /* “Borde degradado” elegante para el hero */
        .hero-panel{ position:relative; }
        .hero-panel::after{
            content:"";
            position:absolute;
            inset:0;
            padding:1px;
            border-radius:16px;
            background: linear-gradient(135deg,
                rgba(59,130,246,.55),
                rgba(37,99,235,.35),
                rgba(14,165,233,.35)
            );
            -webkit-mask:
                linear-gradient(#000 0 0) content-box,
                linear-gradient(#000 0 0);
            -webkit-mask-composite:xor;
                    mask-composite:exclude;
            pointer-events:none;
            opacity:.85;
        }

        /* Accesos (sin íconos) */
        .quick-grid{
            display:grid;
            grid-template-columns:1fr;
            gap:1rem;
            margin-top:1rem;
        }
        @media (min-width:768px){
            .quick-grid{ grid-template-columns:repeat(3,1fr); gap:1rem; }
        }

        .quick-card{
            background: rgba(255,255,255,.92);
            border:1px solid rgba(148,163,184,.42);
            border-radius:14px;
            padding:1.05rem;
            box-shadow:0 8px 18px rgba(15,23,42,.05);
            transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease;
            position:relative;
            overflow:hidden;

            /* para que el botón quede abajo y las 3 queden parejas */
            display:flex;
            flex-direction:column;
            min-height: 180px;
        }

        .quick-card::before{
            content:"";
            position:absolute;
            left:0;
            top:0;
            bottom:0;
            width:7px;
            background: linear-gradient(180deg, rgba(59,130,246,1) 0%, rgba(37,99,235,1) 100%);
            border-radius:14px 0 0 14px;
            opacity:.95;
        }

        /* brillo suave animado (sobrio) */
        .quick-card::after{
            content:"";
            position:absolute;
            inset:-40%;
            background: radial-gradient(circle at 30% 30%, rgba(255,255,255,.55), transparent 55%);
            transform: translateX(-12%) rotate(8deg);
            opacity:0;
            transition: opacity .25s ease;
            pointer-events:none;
        }
        .quick-card:hover::after{ opacity:.35; }

        .quick-card:hover{
            transform: translateY(-2px);
            box-shadow:0 14px 28px rgba(15,23,42,.10);
            border-color: rgba(59,130,246,.45);
        }

        .quick-title{
            font-weight:900;
            color:#0f172a;
            font-size:1.02rem;
            margin-bottom:.35rem;
            padding-left:.4rem;
        }

        .quick-desc{
            color:#475569;
            font-size:.92rem;
            line-height:1.5;
            min-height:2.6rem;
            padding-left:.4rem;
            flex: 1 1 auto;
        }

        .quick-actions{
            margin-top:.9rem;
            display:flex;
            justify-content:center;
        }

        .btn-soft{
            width:100%;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:.65rem 1rem;
            border-radius:12px;
            font-weight:900;
            border:1px solid rgba(148,163,184,.55);
            background: rgba(255,255,255,.9);
            color:#0f172a;
            transition: all .18s ease;
        }
        .btn-soft:hover{
            background: rgba(239,246,255,.95);
            border-color: rgba(59,130,246,.55);
            transform: translateY(-1px);
        }

        .btn-blue{
            background: linear-gradient(135deg, rgba(59,130,246,1) 0%, rgba(37,99,235,1) 100%);
            border-color: rgba(37,99,235,.8);
            color:#fff;
            box-shadow:0 12px 20px rgba(37,99,235,.22);
        }
        .btn-blue:hover{
            filter: brightness(.98);
            box-shadow:0 14px 22px rgba(37,99,235,.26);
        }

        .btn-cyan{
            background: linear-gradient(135deg, rgba(14,165,233,1), rgba(59,130,246,1));
            border-color: rgba(14,165,233,.75);
            color:#fff;
            box-shadow:0 12px 20px rgba(14,165,233,.20);
        }
        .btn-indigo{
            background: linear-gradient(135deg, rgba(99,102,241,1), rgba(37,99,235,1));
            border-color: rgba(99,102,241,.70);
            color:#fff;
            box-shadow:0 12px 20px rgba(99,102,241,.20);
        }
        .btn-cyan:hover,.btn-indigo:hover{
            transform: translateY(-1px);
            filter: brightness(.98);
        }

        /* Variantes de color en barra y título */
        .quick-card.quick-realizadas::before{
            background: linear-gradient(180deg, rgba(59,130,246,1), rgba(37,99,235,1));
        }
        .quick-card.quick-mapa::before{
            background: linear-gradient(180deg, rgba(14,165,233,1), rgba(59,130,246,1));
        }
        .quick-card.quick-solicitudes::before{
            background: linear-gradient(180deg, rgba(99,102,241,1), rgba(37,99,235,1));
        }
        .quick-realizadas .quick-title{ color:#0b2a6f; }
        .quick-mapa .quick-title{ color:#064e73; }
        .quick-solicitudes .quick-title{ color:#312e81; }

        /* Chips */
        .meta-row{
            margin-top:1rem;
            display:flex;
            flex-wrap:wrap;
            gap:.5rem;
            align-items:center;
            justify-content:center;
        }
        .meta-chip{
            display:inline-flex;
            align-items:center;
            gap:.45rem;
            background: rgba(255,255,255,.7);
            color:#334155;
            border:1px solid rgba(148,163,184,.45);
            padding:.35rem .7rem;
            border-radius:999px;
            font-size:.82rem;
            font-weight:800;
            box-shadow:0 6px 14px rgba(15,23,42,.05);
        }
        .dot{
            width:8px;
            height:8px;
            border-radius:999px;
            background: linear-gradient(135deg, rgba(59,130,246,1), rgba(37,99,235,1));
        }

        /* ===========================
           BUSCADOR: AZUL + EFECTO SUAVE
        =========================== */
        .search-form-compact{
            background: linear-gradient(135deg, rgba(255,255,255,.95) 0%, rgba(239,246,255,.75) 100%);
            border:1px solid rgba(148,163,184,.45);
            border-radius:16px;
            padding:1.25rem;
            box-shadow:0 10px 26px rgba(15,23,42,.06);
        }
        @media (max-width:768px){
            .search-form-compact{ padding:1rem; }
        }

        .input-soft{
            width:100%;
            border-radius:12px;
            border:1px solid rgba(148,163,184,.60);
            background:#fff;
            padding:.7rem .95rem;
            font-size:.92rem;
            color:#0f172a;
            outline:none;
            transition:border-color .18s ease, box-shadow .18s ease;
        }
        .input-soft:focus{
            border-color: rgba(59,130,246,.85);
            box-shadow: 0 0 0 4px rgba(59,130,246,.16);
        }

        /* ===========================
           RESULTADOS: SOBRIO + AZULES
        =========================== */
        .results-grid{
            display:grid;
            grid-template-columns:1fr;
            gap:1rem;
        }
        @media (min-width:768px){
            .results-grid{ grid-template-columns:repeat(3,1fr); gap:1rem; }
        }

        .file-card{
            background:#fff;
            border:1px solid rgba(148,163,184,.45);
            border-radius:16px;
            overflow:hidden;
            box-shadow:0 10px 22px rgba(15,23,42,.06);
            transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }
        .file-card:hover{
            transform: translateY(-2px);
            box-shadow:0 16px 30px rgba(15,23,42,.10);
            border-color: rgba(59,130,246,.45);
        }

        .section-header{
            padding:.95rem 1rem;
            color:#fff;
            background: linear-gradient(135deg, rgba(59,130,246,1) 0%, rgba(37,99,235,1) 100%);
            border-bottom: 1px solid rgba(255,255,255,.12);
        }
        .section-header h3{
            font-size:.98rem;
            font-weight:900;
            letter-spacing:.2px;
        }

        .tasks-container{
            max-height: 420px;
            overflow-y:auto;
        }
        .tasks-container::-webkit-scrollbar{ width:7px; }
        .tasks-container::-webkit-scrollbar-track{ background:#eef2ff; }
        .tasks-container::-webkit-scrollbar-thumb{ background:#bfdbfe; border-radius:6px; }
        .tasks-container::-webkit-scrollbar-thumb:hover{ background:#93c5fd; }

        .task-row{
            margin:.75rem;
            border:1px solid rgba(148,163,184,.35);
            border-radius:14px;
            padding:.85rem .95rem;
            background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(239,246,255,.65) 100%);
            box-shadow:0 10px 20px rgba(15,23,42,.05);
            transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease;
        }
        .task-row:hover{
            transform: translateY(-1px);
            box-shadow:0 14px 26px rgba(15,23,42,.08);
            border-color: rgba(59,130,246,.40);
        }

        .task-top{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:.75rem;
            margin-bottom:.35rem;
        }
        .task-date{
            font-weight:900;
            font-size:.92rem;
            color:#0f172a;
        }

        .year-badge{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:.14rem .6rem;
            font-size:.72rem;
            font-weight:900;
            border-radius:999px;
            background: rgba(59,130,246,.10);
            border:1px solid rgba(59,130,246,.25);
            color:#1d4ed8;
        }

        .task-est{
            font-weight:900;
            color:#334155;
            font-size:.9rem;
            margin-bottom:.15rem;
        }
        .task-text{
            color:#0f172a;
            font-size:.9rem;
            line-height:1.45;
        }

        .empty-state{
            padding:1.2rem 1rem;
            text-align:center;
            color:#64748b;
            font-style:italic;
            font-size:.9rem;
        }

        /* Diferenciar columnas por tono (sutil) */
        .aph .section-header{
            background: linear-gradient(135deg, rgba(37,99,235,1) 0%, rgba(29,78,216,1) 100%);
        }
        .elec .section-header{
            background: linear-gradient(135deg, rgba(59,130,246,1) 0%, rgba(37,99,235,1) 100%);
        }
        .dezm .section-header{
            background: linear-gradient(135deg, rgba(14,165,233,1) 0%, rgba(37,99,235,1) 100%);
        }
    </style>

    <div class="container mx-auto px-4 py-6">
        <div class="soft-card overflow-hidden mb-6">
            <div class="p-4 md:p-6 pb-0">

                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-mantenimiento.png') }}" alt="Mantenimiento Edilicio"
                         class="w-full max-w-2xl h-auto object-contain rounded-xl">
                </div>

                {{-- PANEL (llamativo sobrio, sin iconos) --}}
                <div class="mb-4 md:mb-6">
                    <div class="hero-panel">
                        <div class="text-center">
                            <p class="hero-text text-base md:text-lg">
                                La <span class="font-extrabold text-[var(--pri-700)]">Dirección de Programación y
                                    Mantenimiento Edilicio</span>
                                se encarga del mantenimiento integral de los establecimientos escolares de la provincia,
                                llevando a cabo tareas diarias para conservar el estado óptimo de los edificios educativos.
                            </p>
                        </div>

                        <div class="quick-grid">
                            <div class="quick-card quick-realizadas">
                                <div class="quick-title font-primary">Tareas realizadas</div>
                                <div class="quick-desc font-secondary">
                                    Consulta pública de tareas ejecutadas (desde 2025 en adelante).
                                </div>
                                <div class="quick-actions">
                                    <a href="#tareas" class="btn-soft btn-blue font-primary">Buscar</a>
                                </div>
                            </div>

                            <div class="quick-card quick-mapa">
                                <div class="quick-title font-primary">Ubicación de establecimientos</div>
                                <div class="quick-desc font-secondary">
                                    Mapa con referencia geográfica de establecimientos.
                                </div>
                                <div class="quick-actions">
                                    <a href="https://nimble-gumdrop-ccc062.netlify.app/" target="_blank" rel="noopener"
                                       class="btn-soft btn-cyan font-primary">
                                        Ver mapa
                                    </a>
                                </div>
                            </div>

                            <div class="quick-card quick-solicitudes">
                                <div class="quick-title font-primary">Solicitudes de mantenimiento</div>
                                <div class="quick-desc font-secondary">
                                    Acceso a la plataforma para iniciar solicitudes.
                                </div>
                                <div class="quick-actions">
                                    <a href="https://tad.catamarca.gob.ar/tramitesadistancia" target="_blank" rel="noopener"
                                       class="btn-soft btn-indigo font-primary">
                                        Solicitar
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="meta-row">
                            <div class="meta-chip"><span class="dot"></span>Transparencia en la gestión</div>
                            <div class="meta-chip"><span class="dot"></span>Mantenimiento preventivo</div>
                            <div class="meta-chip"><span class="dot"></span>Comunidad educativa</div>
                        </div>
                    </div>
                </div>

                @include('edudata.partials.mantenimiento-fotos')

                {{-- =========================
                     SOLO REALIZADAS
                ========================== --}}
                <div id="tareas" class="pt-4">
                    <div class="mb-4 md:mb-6">
                        <div class="search-form-compact">
                            <form method="GET" action="{{ route('edudata.mantenimiento') }}#resultados">
                                <label class="block text-sm font-extrabold text-slate-700 mb-2 font-secondary">
                                    Buscar establecimiento
                                </label>

                                <div class="flex flex-col md:flex-row gap-2 items-center">
                                    {{-- Input --}}
                                    <input type="text" name="establecimiento" value="{{ request('establecimiento') }}"
                                           class="input-soft font-secondary flex-1 h-10"
                                           placeholder="Ingrese el nombre del establecimiento...">

                                    {{-- Buscar --}}
                                    <button type="submit"
                                            class="h-10 px-4 rounded-lg font-bold text-sm
                                                   bg-[var(--pri-700)] hover:bg-[var(--pri-800)]
                                                   text-white transition whitespace-nowrap">
                                        Buscar
                                    </button>

                                    {{-- Limpiar --}}
                                    <a href="{{ route('edudata.mantenimiento') }}#resultados"
                                       class="h-10 px-4 rounded-lg font-bold text-sm
                                              border border-slate-300 text-slate-700
                                              hover:bg-slate-100 transition
                                              inline-flex items-center justify-center whitespace-nowrap">
                                        Limpiar
                                    </a>
                                </div>

                                {{-- Chips --}}
                                <div class="flex flex-wrap gap-2 mt-3">
                                    <div class="meta-chip">
                                        <span class="dot"></span>
                                        Rango:
                                        <strong>{{ $minYear ?? 2025 }}</strong>–<strong>{{ $maxYear ?? date('Y') }}</strong>
                                    </div>

                                    @if (request('establecimiento'))
                                        <div class="meta-chip">
                                            <span class="dot"></span>
                                            Filtro: <strong>{{ request('establecimiento') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>

                        @php
                            $regAPH  = $registros['APH']  ?? collect();
                            $regELEC = $registros['ELEC'] ?? collect();
                            $regDEZM = $registros['DEZM'] ?? collect();
                        @endphp

                        <div id="resultados" class="results-grid mt-6">
                            {{-- APH --}}
                            <div class="file-card aph">
                                <div class="section-header">
                                    <h3 class="font-primary">Albañilería / Plomería / Herrería</h3>
                                </div>

                                <div class="tasks-container">
                                    @forelse($regAPH as $r)
                                        @php
                                            $c = \Carbon\Carbon::parse($r->fecha);
                                            $anioCard = (int) $c->format('Y');
                                        @endphp
                                        <div class="task-row">
                                            <div class="task-top">
                                                <div class="task-date font-secondary">{{ $c->format('d/m/Y') }}</div>
                                                <span class="year-badge">{{ $anioCard }}</span>
                                            </div>
                                            <div class="task-est font-secondary">{{ $r->establecimiento }}</div>
                                            <div class="task-text font-secondary">{{ $r->tarea }}</div>
                                        </div>
                                    @empty
                                        <div class="empty-state font-secondary">Sin tareas registradas</div>
                                    @endforelse
                                </div>
                            </div>

                            {{-- ELEC --}}
                            <div class="file-card elec">
                                <div class="section-header">
                                    <h3 class="font-primary">Electricidad</h3>
                                </div>

                                <div class="tasks-container">
                                    @forelse($regELEC as $r)
                                        @php
                                            $c = \Carbon\Carbon::parse($r->fecha);
                                            $anioCard = (int) $c->format('Y');
                                        @endphp
                                        <div class="task-row">
                                            <div class="task-top">
                                                <div class="task-date font-secondary">{{ $c->format('d/m/Y') }}</div>
                                                <span class="year-badge">{{ $anioCard }}</span>
                                            </div>
                                            <div class="task-est font-secondary">{{ $r->establecimiento }}</div>
                                            <div class="task-text font-secondary">{{ $r->tarea }}</div>
                                        </div>
                                    @empty
                                        <div class="empty-state font-secondary">Sin tareas registradas</div>
                                    @endforelse
                                </div>
                            </div>

                            {{-- DEZM --}}
                            <div class="file-card dezm">
                                <div class="section-header">
                                    <h3 class="font-primary">Desmalezamiento</h3>
                                </div>

                                <div class="tasks-container">
                                    @forelse($regDEZM as $r)
                                        @php
                                            $c = \Carbon\Carbon::parse($r->fecha);
                                            $anioCard = (int) $c->format('Y');
                                        @endphp
                                        <div class="task-row">
                                            <div class="task-top">
                                                <div class="task-date font-secondary">{{ $c->format('d/m/Y') }}</div>
                                                <span class="year-badge">{{ $anioCard }}</span>
                                            </div>
                                            <div class="task-est font-secondary">{{ $r->establecimiento }}</div>
                                            <div class="task-text font-secondary">{{ $r->tarea }}</div>
                                        </div>
                                    @empty
                                        <div class="empty-state font-secondary">Sin tareas registradas</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- FIN SOLO REALIZADAS --}}
            </div>
        </div>
    </div>

    @include('edudata.partials.mantenimiento-info')
@endsection 