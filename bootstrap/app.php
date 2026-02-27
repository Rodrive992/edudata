<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // ✅ Para que Laravel detecte HTTPS real detrás de proxy y NO genere links http
        $middleware->append(\App\Http\Middleware\TrustProxies::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();