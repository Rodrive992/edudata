@extends('layouts.app')

@section('title', 'Edudata - Solicitud de Información Pública')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-4xl">
    <!-- Tarjeta principal -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <!-- Encabezado con color institucional -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-2">
            <div class="text-center">
                <h1 class="text-2xl font-semibold text-white mb-2">Solicitud de Información Pública</h1>
                <p class="text-blue-100 text-sm max-w-2xl mx-auto">
                    Ministerio de Educación, Ciencia y Tecnología de Catamarca
                </p>
            </div>
        </div>     

        <!-- Mensajes de estado -->
        <div class="px-6 pt-4">
            @if(session('ok'))
                <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium">{{ session('ok') }}</span>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-800 px-4 py-3">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium">Por favor, corrige los siguientes errores:</span>
                    </div>
                    <ul class="list-disc pl-5 space-y-1 text-xs">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Formulario -->
        <form action="{{ route('edudata.solicitud-info.store') }}" method="POST" enctype="multipart/form-data" class="p-2 space-y-6">
            @csrf

            <!-- Sección de datos del solicitante -->
            <section class="bg-blue-50 rounded-lg p-6 border border-blue-100">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 p-2 rounded mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-800">Datos del solicitante</h2>
                        <p class="text-blue-600 text-xs mt-1">Complete sus datos personales para el contacto</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            DNI <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="dni_solicitante" value="{{ old('dni_solicitante') }}"
                               class="w-full rounded border border-gray-300 py-2 px-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors placeholder-gray-400 text-sm"
                               placeholder="Ej.: 30123456" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Nombre <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nombre_solicitante" value="{{ old('nombre_solicitante') }}"
                               class="w-full rounded border border-gray-300 py-2 px-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors placeholder-gray-400 text-sm"
                               placeholder="Nombre" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Apellido <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="apellido_solicitante" value="{{ old('apellido_solicitante') }}"
                               class="w-full rounded border border-gray-300 py-2 px-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors placeholder-gray-400 text-sm"
                               placeholder="Apellido" required>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Provincia <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="provincia_solicitante" value="{{ old('provincia_solicitante', 'Catamarca') }}"
                               class="w-full rounded border border-gray-300 py-2 px-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors placeholder-gray-400 text-sm"
                               required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Departamento</label>
                        <input type="text" name="departamento_solicitante" value="{{ old('departamento_solicitante') }}"
                               class="w-full rounded border border-gray-300 py-2 px-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors placeholder-gray-400 text-sm"
                               placeholder="Departamento">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Código Postal</label>
                        <input type="text" name="codigo_postal" value="{{ old('codigo_postal') }}"
                               class="w-full rounded border border-gray-300 py-2 px-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors placeholder-gray-400 text-sm"
                               placeholder="4700">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Barrio</label>
                        <input type="text" name="barrio_solicitante" value="{{ old('barrio_solicitante') }}"
                               class="w-full rounded border border-gray-300 py-2 px-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors placeholder-gray-400 text-sm"
                               placeholder="Barrio o localidad">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Teléfono</label>
                        <input type="text" name="telefono_solicitante" value="{{ old('telefono_solicitante') }}"
                               class="w-full rounded border border-gray-300 py-2 px-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors placeholder-gray-400 text-sm"
                               placeholder="3834 123456">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Correo electrónico <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email_solicitante" value="{{ old('email_solicitante') }}"
                               class="w-full rounded border border-gray-300 py-2 px-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors placeholder-gray-400 text-sm"
                               placeholder="correo@ejemplo.com" required>
                    </div>

                    <!-- Archivos DNI -->
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">DNI (frente)</label>
                        <div class="relative">
                            <input type="file" name="dni_imagen_frente"
                                   class="block w-full text-xs text-gray-700 file:mr-3 file:py-2 file:px-3
                                          file:rounded file:border-0 file:text-xs file:font-medium
                                          file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors"
                                   accept=".jpg,.jpeg,.png,.webp,.pdf">
                        </div>
                        <p class="text-xs text-blue-600 mt-1">Máx. 4MB. Formatos: JPG/PNG/WebP/PDF.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">DNI (reverso)</label>
                        <div class="relative">
                            <input type="file" name="dni_imagen_reverso"
                                   class="block w-full text-xs text-gray-700 file:mr-3 file:py-2 file:px-3
                                          file:rounded file:border-0 file:text-xs file:font-medium
                                          file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors"
                                   accept=".jpg,.jpeg,.png,.webp,.pdf">
                        </div>
                        <p class="text-xs text-blue-600 mt-1">Máx. 4MB. Formatos: JPG/PNG/WebP/PDF.</p>
                    </div>
                </div>
            </section>

            <!-- Sección de información solicitada -->
            <section class="bg-green-50 rounded-lg p-6 border border-green-100">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 p-2 rounded mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-800">Información solicitada</h2>
                        <p class="text-green-600 text-xs mt-1">Describa detalladamente la información requerida</p>
                    </div>
                </div>

                 <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">
                        Asunto de la Solicitud <span class="text-red-500">*</span>
                    </label>
                    <textarea name="asunto_solicitud" rows="1"
                              class="w-full rounded border border-gray-300 py-2 px-3 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-colors resize-none placeholder-gray-400 text-sm"
                              placeholder="Describa brevemente el asunto de su solicitud de información"
                              required>{{ old('asunto_solicitud') }}</textarea>
                    <p class="text-xs text-green-600 mt-1">Sea específico para facilitar la búsqueda y respuesta.</p>
                </div>
                
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">
                        Descripción <span class="text-red-500">*</span>
                    </label>
                    <textarea name="solicitud_texto" rows="5"
                              class="w-full rounded border border-gray-300 py-2 px-3 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-colors resize-none placeholder-gray-400 text-sm"
                              placeholder="Describa con claridad la información que requiere. Incluya fechas, áreas específicas, documentos, o cualquier detalle que facilite la búsqueda..."
                              required>{{ old('solicitud_texto') }}</textarea>
                    <p class="text-xs text-green-600 mt-1">Sea específico para facilitar la búsqueda y respuesta.</p>
                </div>
            </section>

            <!-- Botón de envío -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-lg p-4 border border-blue-100">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex-1">
                        <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-green-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200 transform hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Enviar solicitud
                        </button>
                        <p class="text-xs text-gray-600 mt-2">
                            Al enviar, acepta el tratamiento de sus datos con fines de contacto y respuesta.
                        </p>
                    </div>
                    
                    <div class="flex justify-center sm:justify-end">
                        <span class="inline-flex items-center bg-white px-3 py-1.5 rounded-full text-xs text-blue-600 font-medium border border-blue-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Transparencia Activa
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection