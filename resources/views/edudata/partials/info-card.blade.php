@php
    // Mapeo de iconos
    $icons = [
        'budget' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        'school' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
        // Agrega más iconos según necesites
    ];
@endphp

<div class="bg-white rounded-lg shadow-md overflow-hidden border-l-4 border-{{ $color }}-500 hover:shadow-lg transition-shadow">
    <div class="p-6">
        <div class="flex items-center mb-4">
            <div class="bg-{{ $color }}-100 p-3 rounded-full mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-{{ $color }}-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icons[$icon] ?? $icons['budget'] }}" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">{{ $title }}</h3>
        </div>
        <ul class="space-y-2 text-gray-600 mb-4">
            @foreach($points as $point)
            <li class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-{{ $color }}-500 mr-2 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>{{ $point }}</span>
            </li>
            @endforeach
        </ul>
        <a href="{{ $route }}" class="mt-4 inline-flex items-center px-4 py-2 bg-{{ $color }}-600 text-white rounded-md hover:bg-{{ $color }}-700 transition-colors">
            Consultar datos
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>
</div>