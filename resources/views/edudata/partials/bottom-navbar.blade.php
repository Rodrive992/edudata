<footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto px-6">
        <div class="flex flex-col sm:flex-row items-center justify-between">
            <!-- Copyright con mejor jerarquía -->
            <div class="text-center text-sm text-gray-300 flex-1 mb-4 sm:mb-0">
                <p class="font-sans leading-relaxed">
                    <span class="font-bold text-white border-b-2 border-blue-400 pb-0.5">Ministerio de Educación, Ciencia y Tecnología</span>
                    <br class="sm:hidden">
                    <span class="hidden sm:inline"> | </span>
                    <span class="font-medium">Gobierno de Catamarca</span>
                    <br class="sm:hidden">
                    <span class="hidden sm:inline"> | </span>
                    <span class="text-gray-400">&copy; {{ date('Y') }} - Todos los derechos reservados</span>
                </p>
            </div>

            <!-- Botón EduRed en esquina derecha -->
            <div class="sm:ml-8">
                <a href="{{ route('edured.index') }}" 
                   class="flex items-center justify-center transition-opacity duration-200 hover:opacity-80"
                   title="Acceder a EduRed">
                    <img src="{{ asset('images/logoedured-2.png') }}" 
                         alt="EduRed" 
                         class="h-16 w-auto">
                </a>
            </div>
        </div>
    </div>
</footer>