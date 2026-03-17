@extends('layouts.app')

@section('title', 'Cobertura de Cargos')

@section('content')
    <style>
        [x-cloak] {
            display: none !important;
        }

        .year-shell {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(148, 163, 184, .22);
            border-radius: 1.25rem;
            box-shadow: 0 14px 34px rgba(15, 23, 42, .08);
            overflow: hidden;
            width: 100%;
        }

        .hero-year {
            background:
                radial-gradient(circle at top right, rgba(96, 165, 250, .18), transparent 32%),
                radial-gradient(circle at bottom left, rgba(45, 212, 191, .14), transparent 28%),
                linear-gradient(135deg, #f8fbff 0%, #eef5ff 50%, #f8fafc 100%);
            border-bottom: 1px solid rgba(148, 163, 184, .18);
        }

        .year-switcher {
            display: flex;
            flex-wrap: wrap;
            gap: .75rem;
            justify-content: center;
        }

        .year-btn {
            border: 1px solid rgba(148, 163, 184, .25);
            background: #fff;
            color: #334155;
            font-weight: 700;
            padding: .85rem 1.25rem;
            border-radius: 999px;
            transition: .25s ease;
            box-shadow: 0 4px 14px rgba(15, 23, 42, .05);
            font-size: clamp(0.8rem, 3vw, 1rem);
            white-space: nowrap;
        }

        @media (max-width: 480px) {
            .year-btn {
                padding: .65rem 1rem;
                font-size: 0.85rem;
                white-space: normal;
                width: 100%;
                max-width: 280px;
            }
        }

        .year-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(15, 23, 42, .08);
        }

        .year-btn.active-2026 {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            border-color: transparent;
        }

        .year-btn.active-2025 {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: #fff;
            border-color: transparent;
        }

        .intro-card {
            background: rgba(255, 255, 255, .78);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(148, 163, 184, .18);
            border-radius: 1rem;
            box-shadow: 0 10px 28px rgba(15, 23, 42, .05);
        }

        .section-block {
            padding: 1.25rem;
        }

        @media (min-width: 768px) {
            .section-block {
                padding: 2rem;
            }
        }

        /* Eliminar márgenes y padding del body que puedan estar causando compresión */
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Asegurar que el contenedor principal ocupe todo el ancho */
        .container {
            width: 100%;
            max-width: 100%;
            padding-left: 1rem;
            padding-right: 1rem;
            margin-left: auto;
            margin-right: auto;
        }

        @media (min-width: 1400px) {
            .container {
                max-width: 1400px;
            }
        }
    </style>

    <div class="container-fluid px-0 md:px-4 py-6"
         x-data="coberturasPorAnio()"
         x-init="init()">

        <div class="year-shell mb-6 mx-2 md:mx-0">
            <div class="hero-year p-4 md:p-6">
                <div class="rounded-xl overflow-hidden mb-4 md:mb-6 flex justify-center">
                    <img src="{{ asset('images/titulo-coberturas.png') }}"
                         alt="Cobertura de Cargos"
                         class="w-full max-w-2xl h-auto object-contain rounded-xl"
                         loading="lazy">
                </div>

                <div class="intro-card p-4 md:p-6">
                    <div class="text-center max-w-4xl mx-auto">
                        <p class="text-slate-600 text-base md:text-lg leading-relaxed mb-5">
                            Espacio de consulta pública sobre la oferta de cargos en asambleas y llamados de cobertura,
                            organizada por año y por nivel educativo.
                        </p>

                        <div class="year-switcher">
                            <button type="button"
                                    class="year-btn"
                                    :class="activeYear === '2026' ? 'active-2026' : ''"
                                    @click="switchYear('2026')">
                                Cobertura 2026
                            </button>

                            <button type="button"
                                    class="year-btn"
                                    :class="activeYear === '2025' ? 'active-2025' : ''"
                                    @click="switchYear('2025')">
                                Cobertura 2025
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-block">
                <section x-show="activeYear === '2026'" x-cloak>
                    @include('edudata.asambleas.partials.coberturas_2026')
                </section>

                <section x-show="activeYear === '2025'" x-cloak>
                    @include('edudata.asambleas.partials.coberturas_2025')
                </section>
            </div>
        </div>
    </div>

    @include('edudata.asambleas.partials.coberturas-info')

    <script>
        function coberturasPorAnio() {
            return {
                activeYear: '2026',

                init() {
                    const url = new URL(window.location.href);
                    const q = url.searchParams.get('anio');

                    if (q && ['2025', '2026'].includes(q)) {
                        this.activeYear = q;
                    } else {
                        url.searchParams.set('anio', '2026');
                        window.history.replaceState({}, '', url.toString());
                    }
                },

                switchYear(year) {
                    if (this.activeYear === year) return;

                    this.activeYear = year;

                    const url = new URL(window.location.href);
                    url.searchParams.set('anio', year);
                    window.history.pushState({}, '', url.toString());
                }
            }
        }
    </script>
@endsection