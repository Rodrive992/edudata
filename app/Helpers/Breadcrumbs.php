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

            // NORMATIVA (importante: usar los nombres de ruta reales)
            'edudata.normativa' => [
                'title' => 'Normativa',
                'parent' => 'edudata.index',
            ],
            'edudata.normativa.show' => [
                'title' => 'Archivos',
                'parent' => 'edudata.normativa',
            ],
            // Alias técnicos que deben comportarse como "show"
            'edudata.normativa.file' => [
                'title' => 'Archivos',
                'parent' => 'edudata.normativa',
            ],
            'edudata.normativa.download' => [
                'title' => 'Archivos',
                'parent' => 'edudata.normativa',
            ],

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
            'login' => [
                'title' => 'Iniciar sesión',
                'parent' => null,
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
