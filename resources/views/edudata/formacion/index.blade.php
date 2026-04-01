@extends('layouts.app')

@section('title', 'Formación y Desarrollo Profesional Docente')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap');
        
        :root {
            --primary: #405CA4;
            --primary-dark: #222A59;
            --primary-light: #64A1D5;
            --secondary: #CBD03E;
            --tertiary: #65A8A3;
            --accent: #807DA8;
            --success: #10b981;
            --warning: #f59e0b;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animate-fade-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        .animate-fade-scale {
            animation: fadeInScale 0.5s ease-out forwards;
        }
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 30px -12px rgba(34, 42, 89, 0.15);
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-section {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 50%, #f1f5f9 100%);
            position: relative;
            overflow: hidden;
        }

        .pill-primary {
            background: rgba(64, 92, 164, 0.12);
            color: var(--primary);
            border-radius: 100px;
            padding: 0.25rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 20px -10px rgba(64, 92, 164, 0.4);
        }

        .stat-card {
            background: white;
            border-radius: 1rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(100, 161, 213, 0.2);
        }
        .stat-card:hover {
            border-color: var(--primary-light);
            transform: translateY(-3px);
        }

        .modal-overlay {
            background: rgba(34, 42, 89, 0.9);
            backdrop-filter: blur(4px);
        }
        .modal-container {
            animation: fadeInScale 0.3s ease-out;
        }

        .icon-bg {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: rgba(64, 92, 164, 0.12);
            color: var(--primary);
        }

        .tech-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }
        .tech-card:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-4px);
        }
    </style>

    <div x-data="{ openModal: null }" class="min-h-screen">

        {{-- Hero Section --}}
        <div class="hero-section py-12 md:py-20">
            <div class="container mx-auto px-4 max-w-7xl">
                <div class="text-center max-w-4xl mx-auto">
                    <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm mb-6 animate-fade-up">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                        </span>
                        <span class="text-sm font-medium text-primary">Planificación Estratégica 2026-2028</span>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight text-slate-800 mb-6 animate-fade-up">
                        Formación y Desarrollo<br>
                        <span class="gradient-text">Profesional Docente</span>
                    </h1>
                    
                    <p class="text-lg text-slate-600 max-w-2xl mx-auto mb-8 animate-fade-up">
                        La <span class="font-semibold text-primary">Dirección Provincial de Desarrollo Profesional y Evaluación Educativa</span> establece las líneas prioritarias que guían la formación continua en la provincia de Catamarca.
                    </p>
                    
                    <div class="flex flex-wrap gap-4 justify-center animate-fade-up">
                        <a href="{{ $tadUrl }}" target="_blank" class="btn-primary inline-flex items-center gap-2 text-white font-semibold px-7 py-3 rounded-xl transition-all shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            Presentar propuesta en TAD
                        </a>
                        <a href="{{ route('edudata.formacion.2025') }}" class="inline-flex items-center gap-2 bg-white hover:bg-slate-50 text-slate-700 font-medium px-6 py-3 rounded-xl border border-slate-200 transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            Ver histórico 2025
                        </a>
                    </div>
                </div>

                {{-- Stats Cards --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-3xl mx-auto mt-12">
                    <div class="stat-card p-4 text-center">
                        <div class="text-2xl font-bold text-primary">{{ $resumen2025['total'] }}</div>
                        <div class="text-xs text-slate-500">Capacitaciones 2025</div>
                    </div>
                    <div class="stat-card p-4 text-center">
                        <div class="text-2xl font-bold text-tertiary">{{ $resumen2025['localidades'] }}</div>
                        <div class="text-xs text-slate-500">Localidades alcanzadas</div>
                    </div>
                    <div class="stat-card p-4 text-center">
                        <div class="text-2xl font-bold text-accent">{{ $resumen2025['oferentes'] }}</div>
                        <div class="text-xs text-slate-500">Oferentes</div>
                    </div>
                    <div class="stat-card p-4 text-center">
                        <div class="text-2xl font-bold text-secondary">{{ $resumen2025['virtuales'] }}</div>
                        <div class="text-xs text-slate-500">Propuestas virtuales</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contexto y diagnóstico --}}
        <div class="container mx-auto px-4 max-w-7xl py-12">
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm card-hover">
                    <div class="icon-bg mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Diagnóstico Aprender 2024-2025</h3>
                    <p class="text-slate-500 text-sm mt-2">Brechas significativas en comprensión lectora, producción escrita y desempeño matemático en primaria y secundaria.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm card-hover">
                    <div class="icon-bg mb-4" style="background: rgba(101, 168, 163, 0.12); color: var(--tertiary);">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Enseñanza disruptiva e innovación</h3>
                    <p class="text-slate-500 text-sm mt-2">Metodologías activas, integración de IA, cultura maker y enfoques STEAM. El docente como diseñador de experiencias.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm card-hover">
                    <div class="icon-bg mb-4" style="background: rgba(128, 125, 168, 0.12); color: var(--accent);">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Marco normativo nacional</h3>
                    <p class="text-slate-500 text-sm mt-2">Compromiso Federal por la Alfabetización (CFE 471/24) y por la Matemática (CFE 510/25).</p>
                </div>
            </div>
        </div>

        {{-- Líneas prioritarias de formación --}}
        <div class="container mx-auto px-4 max-w-7xl py-16">
            <div class="text-center mb-12">
                <span class="pill-primary inline-block mb-3">Ejes transversales</span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800">Líneas prioritarias de formación</h2>
                <p class="text-slate-500 mt-3 max-w-2xl mx-auto">Constituyen el núcleo de todas las propuestas de capacitación, abordando desafíos clave para mejorar los aprendizajes.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Alfabetización integral --}}
                <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm card-hover cursor-pointer" @click="openModal = 1">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Alfabetización integral</h3>
                    <p class="text-slate-500 text-sm">Lectura, escritura y comprensión crítica en todas las áreas del conocimiento.</p>
                    <div class="mt-4 text-xs font-medium text-blue-600">Click para más información →</div>
                </div>

                {{-- Enseñanza de la matemática --}}
                <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm card-hover cursor-pointer" @click="openModal = 2">
                    <div class="w-12 h-12 rounded-xl bg-teal-100 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Enseñanza de la matemática</h3>
                    <p class="text-slate-500 text-sm">Razonamiento, resolución de problemas y desarrollo del pensamiento lógico.</p>
                    <div class="mt-4 text-xs font-medium text-teal-600">Click para más información →</div>
                </div>

                {{-- Pensamiento científico --}}
                <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm card-hover cursor-pointer" @click="openModal = 3">
                    <div class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Pensamiento científico</h3>
                    <p class="text-slate-500 text-sm">Indagación, análisis crítico, ambiente y competencias tecnológicas vinculadas a IA.</p>
                    <div class="mt-4 text-xs font-medium text-yellow-600">Click para más información →</div>
                </div>

                {{-- Habilidades socioemocionales --}}
                <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm card-hover cursor-pointer" @click="openModal = 4">
                    <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Habilidades socioemocionales</h3>
                    <p class="text-slate-500 text-sm">Autoconocimiento, empatía, regulación emocional y convivencia escolar.</p>
                    <div class="mt-4 text-xs font-medium text-purple-600">Click para más información →</div>
                </div>
            </div>
        </div>

        {{-- Modales --}}
        {{-- Modal 1: Alfabetización --}}
        <div x-show="openModal === 1" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
            <div class="absolute inset-0 modal-overlay" @click="openModal = null"></div>
            <div class="modal-container relative bg-white rounded-2xl max-w-2xl w-full max-h-[85vh] overflow-y-auto shadow-2xl">
                <div class="sticky top-0 px-6 py-4 flex justify-between items-center bg-blue-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                        <h3 class="text-xl font-bold text-white">Alfabetización integral</h3>
                    </div>
                    <button @click="openModal = null" class="text-white/80 hover:text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
                </div>
                <div class="px-6 py-5 text-slate-600 text-sm space-y-3">
                    <p><strong class="text-blue-600">Alfabetización integral</strong> implica un proceso progresivo que abarca la lectura, la escritura y la comprensión crítica en todas las áreas del conocimiento.</p>
                    <div class="bg-blue-50 p-3 rounded-lg"><strong>Nivel Inicial:</strong> Desarrollo del lenguaje oral, narrativas digitales, cuentos interactivos, juegos lingüísticos.</div>
                    <div class="bg-teal-50 p-3 rounded-lg"><strong>Nivel Primario:</strong> Comprensión lectora profunda, escritura creativa, podcasts, blogs, proyectos colaborativos.</div>
                    <div class="bg-purple-50 p-3 rounded-lg"><strong>Nivel Secundario:</strong> Alfabetización académica, textos argumentativos, informes, proyectos de investigación escolar.</div>
                    <div class="bg-yellow-50 p-3 rounded-lg"><strong>Educación Superior:</strong> Producción de conocimiento disciplinar, pensamiento crítico avanzado.</div>
                </div>
                <div class="border-t px-6 py-4 bg-slate-50 rounded-b-2xl"><button @click="openModal = null" class="px-4 py-2 rounded-lg text-sm font-medium bg-blue-600 text-white">Cerrar</button></div>
            </div>
        </div>

        {{-- Modal 2: Matemática --}}
        <div x-show="openModal === 2" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
            <div class="absolute inset-0 modal-overlay" @click="openModal = null"></div>
            <div class="modal-container relative bg-white rounded-2xl max-w-2xl w-full max-h-[85vh] overflow-y-auto shadow-2xl">
                <div class="sticky top-0 px-6 py-4 flex justify-between items-center bg-teal-600">
                    <div class="flex items-center gap-2"><svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg><h3 class="text-xl font-bold text-white">Enseñanza de la matemática</h3></div>
                    <button @click="openModal = null" class="text-white/80 hover:text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
                </div>
                <div class="px-6 py-5 text-slate-600 text-sm space-y-3">
                    <p><strong class="text-teal-600">Enseñanza de la matemática</strong> con foco en comprensión conceptual, razonamiento lógico y resolución de problemas.</p>
                    <div class="bg-blue-50 p-3 rounded-lg"><strong>Nivel Inicial:</strong> Juego, exploración, manipulación, nociones de número, cantidad, clasificación.</div>
                    <div class="bg-teal-50 p-3 rounded-lg"><strong>Nivel Primario:</strong> Método Singapur, resolución de problemas contextualizados, aplicaciones interactivas.</div>
                    <div class="bg-purple-50 p-3 rounded-lg"><strong>Nivel Secundario:</strong> Modelización matemática, argumentación, representaciones múltiples, análisis de datos.</div>
                    <div class="bg-yellow-50 p-3 rounded-lg"><strong>Educación Técnica:</strong> Pensamiento computacional, simuladores científicos, software de visualización.</div>
                </div>
                <div class="border-t px-6 py-4 bg-slate-50 rounded-b-2xl"><button @click="openModal = null" class="px-4 py-2 rounded-lg text-sm font-medium bg-teal-600 text-white">Cerrar</button></div>
            </div>
        </div>

        {{-- Modal 3: Pensamiento científico --}}
        <div x-show="openModal === 3" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
            <div class="absolute inset-0 modal-overlay" @click="openModal = null"></div>
            <div class="modal-container relative bg-white rounded-2xl max-w-2xl w-full max-h-[85vh] overflow-y-auto shadow-2xl">
                <div class="sticky top-0 px-6 py-4 flex justify-between items-center bg-yellow-600">
                    <div class="flex items-center gap-2"><svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/></svg><h3 class="text-xl font-bold text-white">Pensamiento científico</h3></div>
                    <button @click="openModal = null" class="text-white/80 hover:text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
                </div>
                <div class="px-6 py-5 text-slate-600 text-sm space-y-3">
                    <p><strong class="text-yellow-600">Pensamiento científico</strong> desde una alfabetización científica que forma ciudadanos críticos.</p>
                    <div class="bg-green-50 p-3 rounded-lg"><strong>Educación Ambiental:</strong> Proyectos de sostenibilidad, economía circular, Escuelas Verdes, monitoreo ambiental, ciencia ciudadana.</div>
                    <div class="bg-blue-50 p-3 rounded-lg"><strong>Tecnologías e IA:</strong> IA generativa, análisis crítico de contenidos, ética digital, alfabetización en datos.</div>
                    <div class="bg-yellow-50 p-3 rounded-lg"><strong>STEAM:</strong> Integración de Ciencia, Tecnología, Ingeniería, Arte y Matemáticas en proyectos interdisciplinarios.</div>
                </div>
                <div class="border-t px-6 py-4 bg-slate-50 rounded-b-2xl"><button @click="openModal = null" class="px-4 py-2 rounded-lg text-sm font-medium bg-yellow-600 text-white">Cerrar</button></div>
            </div>
        </div>

        {{-- Modal 4: Socioemocional --}}
        <div x-show="openModal === 4" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
            <div class="absolute inset-0 modal-overlay" @click="openModal = null"></div>
            <div class="modal-container relative bg-white rounded-2xl max-w-2xl w-full max-h-[85vh] overflow-y-auto shadow-2xl">
                <div class="sticky top-0 px-6 py-4 flex justify-between items-center bg-purple-600">
                    <div class="flex items-center gap-2"><svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg><h3 class="text-xl font-bold text-white">Habilidades socioemocionales</h3></div>
                    <button @click="openModal = null" class="text-white/80 hover:text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
                </div>
                <div class="px-6 py-5 text-slate-600 text-sm space-y-3">
                    <p><strong class="text-purple-600">Habilidades socioemocionales</strong> como pilar fundamental del desarrollo integral.</p>
                    <div class="bg-pink-50 p-3 rounded-lg"><strong>Educación emocional:</strong> Reconocimiento y regulación de emociones, empatía, cooperación, autorregulación.</div>
                    <div class="bg-green-50 p-3 rounded-lg"><strong>Convivencia escolar:</strong> Vínculos positivos, resolución pacífica de conflictos, climas educativos seguros e inclusivos.</div>
                    <div class="bg-orange-50 p-3 rounded-lg"><strong>Nivel Secundario:</strong> Orientación vocacional, proyectos de vida, ciudadanía responsable.</div>
                    <div class="bg-blue-50 p-3 rounded-lg"><strong>Bienestar docente:</strong> Gestión emocional, mentalidad de crecimiento, desarrollo de habilidades blandas.</div>
                </div>
                <div class="border-t px-6 py-4 bg-slate-50 rounded-b-2xl"><button @click="openModal = null" class="px-4 py-2 rounded-lg text-sm font-medium bg-purple-600 text-white">Cerrar</button></div>
            </div>
        </div>

        {{-- Niveles y modalidades --}}
        <div class="container mx-auto px-4 max-w-7xl py-12">
            <div class="grid lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-slate-800 mb-4">📚 Niveles y modalidades educativas</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach(['Nivel Inicial', 'Nivel Primario', 'Nivel Secundario', 'Educación Técnica', 'Educación Superior', 'Educación Rural', 'EPJA', 'Educación Especial', 'Educación Artística', 'Educación Hospitalaria/Domiciliaria', 'Contexto de Encierro'] as $item)
                            <div class="bg-slate-50 rounded-lg px-3 py-2 text-sm text-slate-600 border border-slate-100">{{ $item }}</div>
                        @endforeach
                    </div>
                    <p class="text-xs text-slate-400 mt-4">Las propuestas deben focalizarse en un nivel y/o modalidad específica.</p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-slate-800 mb-4">⚡ Metodologías activas prioritarias</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['Aprendizaje Basado en Proyectos', 'Aprendizaje Basado en Problemas', 'Gamificación', 'Aula Invertida', 'Cultura Maker', 'STEAM', 'Pensamiento Computacional', 'Aprendizaje Colaborativo', 'Evaluación Formativa', 'Aprendizaje Dual', 'Robótica Educativa', 'IA aplicada'] as $met)
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-600 rounded-full text-xs border border-slate-100">{{ $met }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Educación Técnica --}}
        <div class="bg-gradient-to-r from-slate-900 to-slate-800 py-16 my-12">
            <div class="container mx-auto px-4 max-w-7xl">
                <div class="text-center mb-10">
                    <span class="inline-flex items-center gap-2 bg-white/10 px-4 py-1 rounded-full text-sm text-white mb-3">🏭 Industria 4.0</span>
                    <h2 class="text-3xl font-bold text-white">Educación Técnica: formación para el desarrollo productivo</h2>
                    <p class="text-slate-300 mt-2">Seis ejes estratégicos alineados con el desarrollo territorial de Catamarca</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach([
                        ['title' => 'Minería sostenible', 'desc' => 'Automatización minera, monitoreo ambiental, geotecnología, mantenimiento de maquinaria'],
                        ['title' => 'Energías renovables', 'desc' => 'Sistemas fotovoltaicos, parques solares, almacenamiento energético, redes inteligentes'],
                        ['title' => 'Agrotecnología', 'desc' => 'Agricultura de precisión, riego inteligente, sensores ambientales, drones agrícolas'],
                        ['title' => 'Economía del conocimiento', 'desc' => 'Programación, IA, análisis de datos, ciberseguridad, desarrollo de software'],
                        ['title' => 'Manufactura avanzada', 'desc' => 'Automatización industrial, robótica, fabricación digital, impresión 3D'],
                        ['title' => 'Innovación territorial', 'desc' => 'Soluciones tecnológicas para comunidades rurales, gestión del agua, energías renovables']
                    ] as $tech)
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-5 border border-white/20 hover:bg-white/20 transition">
                            <h4 class="text-white font-bold">{{ $tech['title'] }}</h4>
                            <p class="text-slate-300 text-sm mt-1">{{ $tech['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ESI y Nuevas Pedagogías --}}
        <div class="container mx-auto px-4 max-w-7xl py-12">
            <div class="grid lg:grid-cols-2 gap-8">
                <div class="bg-gradient-to-br from-pink-50 to-white rounded-2xl p-6 border border-pink-100">
                    <div class="flex items-center gap-3 mb-4"><div class="w-10 h-10 rounded-lg bg-pink-100 flex items-center justify-center text-pink-600 text-xl">❤️</div><h3 class="text-xl font-bold text-slate-800">Educación Sexual Integral (ESI)</h3></div>
                    <p class="text-sm text-slate-600 mb-3">Ley 26.150 - Estrategias pedagógicas por nivel educativo:</p>
                    <div class="space-y-2 text-sm"><div class="bg-white p-2 rounded-lg"><strong class="text-pink-600">Nivel Inicial:</strong> Juego simbólico, cuentos, reconocimiento del cuerpo, educación emocional, diversidad familiar.</div><div class="bg-white p-2 rounded-lg"><strong class="text-pink-600">Nivel Primario:</strong> Cambios corporales, prevención del abuso, igualdad de género, seguridad digital.</div><div class="bg-white p-2 rounded-lg"><strong class="text-pink-600">Nivel Secundario:</strong> Salud sexual y reproductiva, consentimiento, diversidad sexual, ciudadanía digital.</div><div class="bg-white p-2 rounded-lg"><strong class="text-pink-600">Educación Técnica:</strong> Igualdad de género en profesiones técnicas, prevención del acoso laboral.</div></div>
                </div>
                <div class="bg-gradient-to-br from-indigo-50 to-white rounded-2xl p-6 border border-indigo-100">
                    <div class="flex items-center gap-3 mb-4"><div class="w-10 h-10 rounded-lg bg-indigo-100 flex items-center justify-center text-indigo-600 text-xl">✨</div><h3 class="text-xl font-bold text-slate-800">Nuevas pedagogías emergentes</h3></div>
                    <div class="space-y-2 text-sm"><div class="bg-white p-2 rounded-lg"><strong class="text-indigo-600">Educación Rural:</strong> ABP comunitario, ciencia ciudadana, laboratorios rurales, monitoreo ambiental.</div><div class="bg-white p-2 rounded-lg"><strong class="text-indigo-600">Educación Especial:</strong> Tecnologías asistivas, analítica educativa, diseño universal para el aprendizaje.</div><div class="bg-white p-2 rounded-lg"><strong class="text-indigo-600">EPJA:</strong> Alfabetización multimodal, plataformas adaptativas con IA, flexibilidad curricular.</div><div class="bg-white p-2 rounded-lg"><strong class="text-indigo-600">Contextos de encierro/hospitalarios:</strong> Aulas híbridas, continuidad pedagógica mediante plataformas adaptativas.</div></div>
                </div>
            </div>
        </div>

        {{-- Requisitos --}}
        <div class="container mx-auto px-4 max-w-7xl py-12">
            <div class="bg-slate-900 rounded-2xl p-8">
                <div class="text-center mb-6"><h2 class="text-2xl font-bold text-white">Condiciones para las propuestas</h2><p class="text-slate-300 text-sm">Criterios obligatorios para la validación y certificación</p></div>
                <div class="grid sm:grid-cols-2 gap-3 max-w-3xl mx-auto">
                    @foreach(['Alineación con el diagnóstico educativo provincial', 'Contribución explícita a la alfabetización, matemática y/o pensamiento científico', 'Innovación pedagógica basada en evidencia', 'Transferibilidad efectiva a las prácticas de aula', 'Indicadores de impacto en los aprendizajes y criterios de evaluación', 'Focalización en un nivel y/o modalidad educativa específica'] as $req)
                        <div class="flex items-start gap-2 text-sm text-slate-300"><svg class="w-4 h-4 text-green-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>{{ $req }}</span></div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Cierre --}}
        <div class="container mx-auto px-4 max-w-7xl py-12 text-center">
            <div class="bg-white rounded-2xl border border-slate-100 p-8 shadow-sm">
                <svg class="w-12 h-12 text-primary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Accedé al detalle de las capacitaciones 2025</h3>
                <p class="text-slate-500 text-sm mb-6">Consultá la tabla completa con filtros, métricas y tarjetas visuales.</p>
                <a href="{{ route('edudata.formacion.2025') }}" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white font-medium px-6 py-3 rounded-xl transition-all">Explorar histórico completo <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
            </div>
        </div>
    </div>
@endsection