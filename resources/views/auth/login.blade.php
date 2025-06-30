@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Iniciar sesión</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Correo electrónico</label>
            <input type="email" name="email" class="w-full border px-3 py-2 rounded" required autofocus>
        </div>

        <div>
            <label class="block mb-1">Contraseña</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="flex justify-between items-center mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Ingresar
            </button>
        </div>
    </form>
</div>
@endsection