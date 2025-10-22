 <nav class="bg-gray-200 shadow-sm" x-data="{ openEduData: false }">
     <div class="container mx-auto px-5 py-4">
         <div class="flex items-center justify-between">
             <!-- Logo y título a la izquierda -->
             <div class="flex items-center space-x-4">
                 <a href="{{ route('edudata.index') }}">
                     <img src="{{ asset('images/eduredlogo.png') }}" alt="EDURED Logo" class="h-12">
                 </a>
                 <div class="text-left leading-tight">
                     <div class="text-xs font-medium text-gray-700 tracking-tight">DIRECCIÓN DE</div>
                     <div class="text-sm font-semibold text-gray-800 tracking-tight">TRANSPARENCIA ACTIVA</div>
                 </div>
             </div>


             <!-- Botón derecho -->
             <div class="flex items-center space-x-3">
                 <button @click="openEduData = !openEduData"
                     class="px-4 py-2 bg-gray-800 hover:bg-gray-600 text-white text-sm font-medium rounded-md shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                     ¿Qué es EDURED?
                 </button>

                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button type="submit"
                         class="p-2 bg-red-800 hover:bg-red-700 text-white rounded-md shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                         title="Cerrar sesión"> <!-- Tooltip para accesibilidad -->
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                         </svg>
                     </button>
                 </form>
             </div>
         </div>
     </div>


     <!-- Sub-nav con breadcrumbs -->
     <div class="bg-gray-900 py-2 border-t border-gray-700">
         <div class="container mx-auto px-5">
             <nav class="flex" aria-label="Breadcrumb">
                 <ol class="inline-flex items-center space-x-1 md:space-x-3">
                     @foreach (App\Helpers\Breadcrumbs::generate() as $index => $breadcrumb)
                         <li class="inline-flex items-center">
                             @if ($index < count(App\Helpers\Breadcrumbs::generate()) - 1)
                                 <a href="{{ route($breadcrumb['route']) }}"
                                     class="inline-flex items-center text-sm font-medium text-gray-300 hover:text-white">
                                     @if ($index === 0)
                                         <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 20 20">
                                             <path
                                                 d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                         </svg>
                                     @endif
                                     {{ $breadcrumb['title'] }}
                                 </a>
                             @else
                                 <span class="inline-flex items-center text-sm font-medium text-white">
                                     {{ $breadcrumb['title'] }}
                                 </span>
                             @endif
                         </li>
                         @if ($index < count(App\Helpers\Breadcrumbs::generate()) - 1)
                             <li>
                                 <div class="flex items-center">
                                     <svg class="w-4 h-4 mx-1 text-gray-500" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                             stroke-width="2" d="m1 9 4-4-4-4" />
                                     </svg>
                                 </div>
                             </li>
                         @endif
                     @endforeach
                 </ol>
             </nav>
         </div>
     </div>

     <!-- Panel desplegable -->
     <div x-show="openEduData" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-300/30 backdrop-blur-sm">

         <div class="w-full max-w-2xl bg-white shadow-xl rounded-xl border border-gray-200 overflow-hidden">
             <div class="max-h-[80vh] overflow-y-auto">
                 <!-- Encabezado -->
                 <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                     <div class="flex items-center">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                         </svg>
                         <h3 class="ml-3 text-xl font-bold text-white">SISTEMA DE GESTIÓN Y CARGA "EDURED"</h3>
                     </div>
                 </div>

                 <!-- Contenido -->
                 <div class="p-6">
                     <!-- Presentación -->
                     <div class="mb-6">
                         <p class="text-gray-700 mb-3">
                             EDURED es un sistema digital desarrollado por el Ministerio de Educación, Ciencia y
                             Tecnología
                             de la Provincia de Catamarca para adminstrar y gestionar el portal de transparencia EDUDATA.
                         </p>
                         <p class="text-gray-700">
                             A través de este portal, las instituciones educativas podrán gestionar de manera
                             centralizada y
                             ágil una variedad de requerimientos, destinados a ser atendidos por las áreas responsables
                             correspondientes.
                         </p>
                     </div>

                     <!-- Funcionalidades -->
                     <div class="mb-6 bg-blue-50/60 rounded-lg p-4">
                         <h4 class="text-lg font-semibold text-gray-800 mb-2">¿Qué se puede gestionar con EDURED?</h4>
                         <ul class="list-disc pl-5 space-y-2 text-gray-700">
                             <li>Solicitudes de insumos escolares</li>
                             <li>Requerimientos de cobertura de vacantes por suplencias</li>
                             <li>Gestiones administrativas varias</li>
                             <li>Canalización directa hacia las áreas ministeriales correspondientes</li>
                         </ul>
                     </div>

                     <!-- Objetivo -->
                     <div class="mb-6">
                         <h4 class="text-lg font-semibold text-gray-800 mb-2">Objetivo General</h4>
                         <p class="text-gray-700">
                             Facilitar la atención oportuna, ordenada y transparente de las solicitudes realizadas por
                             instituciones educativas de todos los niveles y modalidades, fortaleciendo la gestión
                             pública.
                         </p>
                     </div>

                     <!-- Pie con botón -->
                     <div class="pt-4 border-t border-gray-200 text-right">
                         <button @click="openEduData = false"
                             class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition-colors duration-200">
                             Cerrar
                         </button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </nav>
