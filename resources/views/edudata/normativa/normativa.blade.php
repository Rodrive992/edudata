@extends('layouts.app')

@section('title', 'Edudata - Normativa')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Encabezado mejorado --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 mb-6">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                <div class="min-w-0 flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="h-10 w-10 rounded-lg bg-gray-200 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-gray-900 truncate">
                            {{ $digesto->titulo }}
                        </h1>
                    </div>

                    @if(!empty($digesto->descripcion))
                        <p class="mt-2 text-gray-700 bg-gray-50 rounded-lg p-3 border border-gray-200">
                            {{ $digesto->descripcion }}
                        </p>
                    @endif

                    <div class="mt-4 text-sm text-gray-600 flex flex-wrap gap-4">
                        @if(!empty($digesto->fecha_subida))
                            <span class="inline-flex items-center bg-gray-100 px-3 py-1.5 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                {{ optional($digesto->fecha_subida)->format('d/m/Y H:i') }}
                            </span>
                        @endif
                        @if(!empty($digesto->tipo_archivo))
                            <span class="inline-flex items-center bg-gray-100 px-3 py-1.5 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                </svg>
                                {{ $digesto->tipo_archivo }}
                            </span>
                        @endif
                        @if(!empty($digesto->tamano_archivo))
                            <span class="inline-flex items-center bg-gray-100 px-3 py-1.5 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                {{ number_format($digesto->tamano_archivo/1024, 0, ',', '.') }} KB
                            </span>
                        @endif
                    </div>
                </div>

                <div class="flex items-center gap-3 shrink-0 flex-wrap">
                    {{-- Descargar --}}
                    <a href="{{ route('edudata.normativa.download', $digesto->id) }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium rounded-xl border border-gray-700 bg-gray-700 text-white hover:bg-gray-800 hover:border-gray-800 focus:outline-none shadow-sm transition-colors duration-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-y-0.5 transition-transform" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M7 10l5 5m0 0l5-5m-5 5V4"/>
                        </svg>
                        Descargar
                    </a>

                    {{-- Abrir en nueva pestaña --}}
                    <a href="{{ route('edudata.normativa.file', $digesto->id) }}"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium rounded-xl border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 focus:outline-none shadow-sm transition-colors duration-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:scale-110 transition-transform" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Abrir en nueva pestaña
                    </a>
                </div>
            </div>
        </div>

        {{-- Navegación adicional --}}
        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('edudata.normativa') }}"
               class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-xl border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al listado
            </a>
            
            @if($digesto->created_at)
                <div class="text-xs text-gray-500 bg-gray-100 px-3 py-1.5 rounded-lg">
                    Documento agregado el {{ $digesto->created_at->format('d/m/Y') }}
                </div>
            @endif
        </div>
    </div>
@endsection