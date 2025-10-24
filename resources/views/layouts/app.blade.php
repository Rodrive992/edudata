<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Edudata - Dirección de Transparencia Activa')</title>
    
    <!-- Favicon -->
    
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="images/site.webmanifest">
    
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
   <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body class="bg-gray-200 shadow-sm">

    @if (Request::is('edured*'))
        @include('edured.partials.top-navbar')
    @else
        @include('edudata.partials.top-navbar')
    @endif

    <main class="min-h-screen mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        @yield('content')
    </main>
    
    @if (Request::is('edured*'))
        @include('edured.partials.bottom-navbar')
    @else
        @include('edudata.partials.bottom-navbar')
    @endif

    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>