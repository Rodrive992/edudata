<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Edudata - Dirección de Transparencia Activa')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fafafa]">
    @include('edudata.partials.top-navbar')
    
    <main class="min-h-screen mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        @yield('content')
    </main>
    
    @include('edudata.partials.bottom-navbar')
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>