<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-4">
        <!-- Sección EduRed compacta centrada -->
        <div class="max-w-3xl mx-auto mb-6 bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="flex flex-col sm:flex-row items-center justify-between p-4">
                <!-- Contenido de texto -->
                <div class="flex items-center mb-3 sm:mb-0">
                    <div class="bg-blue-100/50 rounded-full p-1.5 mr-3 border border-blue-200/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-medium text-blue-800">ACCESO RESTRINGIDO</div>
                        <h3 class="text-md font-bold text-gray-800">¿Pertenece a EduRed?</h3>
                    </div>
                </div>
                
                <!-- Botón -->
                <a href="{{ route('edured.index') }}" class="inline-flex items-center px-5 py-2 bg-gray-800 hover:bg-gray-900 text-white text-sm font-medium rounded-md transition-colors duration-300 shadow whitespace-nowrap">
                    <span>Ingresar al sistema</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 ml-1.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center text-sm text-gray-300 pt-4 border-t border-gray-700">
            <p>&copy; {{ date('Y') }} | Ministerio de Educación, Ciencia y Tecnología | Gobierno de Catamarca | Todos los derechos reservados.</p>
        </div>
    </div>
</footer>