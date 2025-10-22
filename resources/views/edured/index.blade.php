@extends('layouts.app')

@section('title', 'EduRed - Inicio')

@section('content')
    <div class="container mx-auto px-4 py-8">
        @php
            $dependencia = auth()->user()->dependencia ?? null;
        @endphp

        @if ($dependencia === 'dta')
            @include('edured.partials.admin-content')
        @elseif ($dependencia === 'dpme')
            @include('edured.partials.dpme-content')       
        @else
            <p class="text-red-500">No tiene permisos para ver esta sección.</p>
        @endif
    </div>
@endsection
