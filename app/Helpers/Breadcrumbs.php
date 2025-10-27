<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class Breadcrumbs
{
    public static function generate()
    {
        $currentRoute = Route::currentRouteName();
        $breadcrumbs = [];

        // Mapa de jerarquía (usa NOMBRES DE RUTA reales)
        $hierarchy = [
             // EDUDATA
            'edudata.index' => [
                'title' => 'Inicio',
                'parent' => null,
            ],

            'edudata.organigrama' => [
                'title' => 'Estructura Orgánica',
                'parent' => 'edudata.index',
            ],
            'edudata.formacion' => [
                'title' => 'Formación Profesional',
                'parent' => 'edudata.index',
            ],
            'edudata.innovacion' => [
                'title' => 'Innovacion',
                'parent' => 'edudata.index',
            ],
            'edudata.mantenimiento' => [
                'title' => 'Mantenimiento',
                'parent' => 'edudata.index',
            ],
            'edudata.administracion' => [
                'title' => 'Administración',
                'parent' => 'edudata.index',
            ],
            'edudata.asuntos' => [
                'title' => 'Asuntos Jurídicos',
                'parent' => 'edudata.index',
            ],
            'edudata.titulos' => [
                'title' => 'Titulos',
                'parent' => 'edudata.index',
            ],
            'edudata.programas' => [
                'title' => 'Programación y Proyectos',
                'parent' => 'edudata.index',
            ],
            'edudata.edutecnica' => [
                'title' => 'Educación Técnica y Agrotecnica',
                'parent' => 'edudata.index',
            ],
            'edudata.residencia' => [
                'title' => 'Residencia Universitaria',
                'parent' => 'edudata.index',
            ],

            'edudata.normativa' => [
                'title' => 'Normativa',
                'parent' => 'edudata.index',
            ],
            'edudata.normativa.show' => [
                'title' => 'Archivos',
                'parent' => 'edudata.normativa',
            ],
            
            'edudata.normativa.file' => [
                'title' => 'Archivos',
                'parent' => 'edudata.normativa',
            ],
            'edudata.normativa.download' => [
                'title' => 'Archivos',
                'parent' => 'edudata.normativa',
            ],

            //EDURED
            'edured.index' => [
                'title' => 'EduRed',
                'parent' => null,
            ],
            'edured.herramientas.digesto.index' => [
                'title' => 'Carga Digesto',
                'parent' => 'edured.index',
            ],
            'edured.historial' => [
                'title' => 'Historial',
                'parent' => 'edured.index',
            ],
             'edured.herramientas.mantenimiento.realizadas.create' => [
                'title' => 'Carga tareas realizadas',
                'parent' => 'edured.index',
            ],
              'edured.herramientas.mantenimiento.realizadas.archivos.index' => [
                'title' => 'Archivos tareas realizadas',
                'parent' => 'edured.herramientas.mantenimiento.realizadas.create',
            ],
            'login' => [
                'title' => 'Iniciar sesión',
                'parent' => null,
            ],
            'edured.herramientas.solicitudes-info.index' => [
                'title' => 'Solicitudes',
                'parent' => 'edured.index',
            ],
            'edured.herramientas.solicitudes-info.paso1' => [
                'title' => 'Responder solicitud - Paso Nº1',
                'parent' => 'edured.herramientas.solicitudes-info.index',
            ],
            'edured.herramientas.solicitudes-info.paso2' => [
                'title' => 'Responder solicitud - Paso Nº2',
                'parent' => 'edured.herramientas.solicitudes-info.index',
            ],
        ];

        // Parámetros actuales de la ruta (p.ej. id)
        $params = request()->route()?->parameters() ?? [];

        // Construcción
        if (isset($hierarchy[$currentRoute])) {
            $route = $currentRoute;
            while ($route !== null) {
                $breadcrumbs = array_merge([[
                    'title'  => $hierarchy[$route]['title'],
                    'route'  => $route,
                    // pasamos SIEMPRE los params; para rutas sin params no afectan
                    'params' => $params,
                ]], $breadcrumbs);

                $route = $hierarchy[$route]['parent'] ?? null;
            }
        }

        return $breadcrumbs;
    }
}
