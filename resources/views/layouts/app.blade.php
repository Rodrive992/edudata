<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Edudata - Dirección de Transparencia Activa')</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/safari-pinned-tab.svg') }}" color="#222A59">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="theme-color" content="#222A59">

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <style>
        /* ====== ORGANIGRAMA: COLORES POR JERARQUÍA (PALETA 01–08) ====== */

        /* MINISTRO (07) */
        .role-ministro .card-accent {
            background: #C8217E;
        }

        .role-ministro .role-badge {
            background: rgba(200, 33, 126, .14);
            color: #C8217E;
            border-color: rgba(200, 33, 126, .38);
        }

        .role-ministro .action-btn {
            background: #C8217E;
            color: #fff;
        }

        .role-ministro .action-btn:hover {
            background: #222A59;
        }

        /* SECRETARÍAS (05) */
        .role-secretaria .card-accent {
            background: #65A8A3;
        }

        .role-secretaria .role-badge {
            background: rgba(101, 168, 163, .16);
            color: #222A59;
            border-color: rgba(101, 168, 163, .45);
        }

        .role-secretaria .action-btn {
            background: #65A8A3;
            color: #fff;
        }

        .role-secretaria .action-btn:hover {
            background: #405CA4;
        }

        /* DIRECCIONES (03) */
        .role-direccion .card-accent {
            background: #64A1D5;
        }

        .role-direccion .role-badge {
            background: rgba(100, 161, 213, .18);
            color: #222A59;
            border-color: rgba(100, 161, 213, .48);
        }

        .role-direccion .action-btn {
            background: #64A1D5;
            color: #222A59;
        }

        .role-direccion .action-btn:hover {
            background: #807DA8;
            color: #fff;
        }

        :root {
            --pri-900: #222A59;
            --pri-700: #405CA4;
            --pri-500: #64A1D5;
            --sec-500: #CBD03E;
            --ter-500: #65A8A3;
            --acc-500: #807DA8;
            --ink: #1f2937;
            --gray-200: #e5e7eb;
            --gray-100: #f3f4f6;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

        .font-primary {
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        .scrollbar-thin::-webkit-scrollbar {
            width: 8px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: var(--pri-500);
            border-radius: 4px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background-color: var(--pri-700);
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background-color: #e8f1fb;
        }

        .estadisticas-bg {
            position: relative;
        }

        .estadisticas-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .surface {
            background: #fff;
            border: 1px solid var(--gray-200);
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .06);
        }

        .surface-head {
            font-weight: 700;
            color: #fff;
            padding: .75rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, .2);
        }
    </style>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': {
                            900: '#222A59',
                            700: '#405CA4',
                            500: '#64A1D5',
                        },
                        'secondary': {
                            500: '#CBD03E',
                        },
                        'tertiary': {
                            500: '#65A8A3',
                        },
                        'accent': {
                            500: '#807DA8',
                        }
                    },
                    fontFamily: {
                        'primary': ['Helvetica Neue', 'Arial', 'sans-serif'],
                        'secondary': ['Open Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#ffffff] text-[color:var(--ink)] antialiased font-secondary">

    {{-- Top navbar --}}
    @if (Request::is('edured*'))
        @include('edured.partials.top-navbar')
    @else
        @include('edudata.partials.top-navbar')
    @endif

    {{-- Contenido principal --}}
    <main class="min-h-screen mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        @yield('content')
    </main>

    {{-- Bottom navbar --}}
    @if (Request::is('edured*'))
        @include('edured.partials.bottom-navbar')
    @else
        @include('edudata.partials.bottom-navbar')
    @endif
</body>

</html>