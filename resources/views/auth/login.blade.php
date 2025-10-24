@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="relative">
    <!-- Fondo con degradé sutil y patrón -->
    <div class="absolute inset-0 -z-10 bg-gray-200"></div>

    <div class="container mx-auto px-4 py-10">
        <!-- Encabezado / Branding -->
        <div class="max-w-md mx-auto text-center mb-8">
            <div class="flex items-center justify-center gap-3">
                <img src="{{ asset('images/eduredlogo.png') }}" alt="EDURED" class="h-12 w-auto">
                <div class="text-left">
                    <p class="text-xs text-gray-500 leading-tight">Dirección de Transparencia Activa</p>
                    <h1 class="text-2xl font-bold text-gray-800">Acceso a EDURED</h1>
                </div>
            </div>
            @if (session('status'))
                <div class="mt-4 text-sm text-green-700 bg-green-50 border border-green-200 rounded-lg px-4 py-2">
                    {{ session('status') }}
                </div>
            @endif
            @if($errors->any())
                <div class="mt-4 text-sm text-red-700 bg-red-50 border border-red-200 rounded-lg px-4 py-2">
                    {{ $errors->first() }}
                </div>
            @endif
        </div>

        <!-- Card de Login -->
        <div
            x-data="{ showPass: false, loading: false }"
            class="max-w-md mx-auto bg-white/90 backdrop-blur border border-gray-200 shadow-xl rounded-2xl p-6 md:p-7"
        >
            <form method="POST" action="{{ route('login') }}" class="space-y-5" @submit="loading = true">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                    <div class="relative">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="w-full rounded-xl border-gray-300 focus:border-gray-800 focus:ring-2 focus:ring-gray-800/40 px-4 py-2.5 placeholder:text-gray-400"
                            placeholder="tucorreo@dominio.gob.ar"
                        >
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                            <!-- Icono correo -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                    <div class="relative">
                        <input
                            :type="showPass ? 'text' : 'password'"
                            id="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="w-full rounded-xl border-gray-300 focus:border-gray-800 focus:ring-2 focus:ring-gray-800/40 px-4 py-2.5 placeholder:text-gray-400 pr-11"
                            placeholder="••••••••"
                        >
                        <button
                            type="button"
                            @click="showPass = !showPass"
                            class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-gray-700"
                            aria-label="Mostrar u ocultar contraseña"
                        >
                            <template x-if="!showPass">
                                <!-- Ojo cerrado -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M3 3l18 18M10.584 10.587A3 3 0 0012 15a3 3 0 001.414-.374M7.362 7.365C5.39 8.427 3.95 10.06 3 12c2.5 5 8.5 7 13 4.5m-2.365-2.365C16.61 15.573 18.05 13.94 19 12c-1.25-2.5-3.25-4.167-5.5-4.875"/>
                                </svg>
                            </template>
                            <template x-if="showPass">
                                <!-- Ojo abierto -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7zm10-3a3 3 0 110 6 3 3 0 010-6z"/>
                                </svg>
                            </template>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Opciones -->
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-gray-800 focus:ring-gray-800/40">
                        Recordarme
                    </label>

                   
                </div>

                <!-- Botón -->
                <div class="pt-2">
                    <button
                        type="submit"
                        :class="loading ? 'opacity-75 cursor-not-allowed' : ''"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-gray-800 text-white px-4 py-2.5 font-semibold shadow-md hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 transition-all"
                    >
                        <svg x-show="loading" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-spin"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <circle cx="12" cy="12" r="9" stroke-width="1.5" class="opacity-30"/>
                            <path d="M21 12a9 9 0 00-9-9" stroke-width="1.5"/>
                        </svg>
                        <span x-text="loading ? 'Ingresando…' : 'Ingresar'">Ingresar</span>
                    </button>
                </div>
            </form>

            <!-- Pie institucional -->
            <div class="mt-5 text-center">
                <p class="text-xs text-gray-500">
                    Ministerio de Educación, Ciencia y Tecnología — Catamarca
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
