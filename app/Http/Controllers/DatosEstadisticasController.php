<?php

namespace App\Http\Controllers;

use App\Models\DatosMatricula;
use App\Models\DatosEstablecimientos;
use Illuminate\Support\Facades\DB;

class DatosEstadisticasController extends Controller
{
    public function index()
    {
        // Totales
        $totalMatricula = (int) DatosMatricula::sum('cantidad');
        $totalEstablecimientos = (int) DatosEstablecimientos::count();

        // Matrícula por modalidad
        $matriculaPorModalidad = DatosMatricula::select('modalidad', DB::raw('SUM(cantidad) AS total'))
            ->groupBy('modalidad')
            ->orderByDesc('total')
            ->get();

        // NUEVO: Matrícula por nivel (oferta_tipo)
        $ordenNiveles = [
            'jardin de infantes',
            'jardin maternal',
            'primario',
            'secundario',
            'secundaria completa',
            'formacion profesional/capacitacion laborar',
            'educacion integral para adolescentes y jovenes',
            'cursos extra curriculares de la escuela especial',
        ];

        $matriculaPorNivel = DatosMatricula::select('oferta_tipo', DB::raw('SUM(cantidad) AS total'))
            ->whereNotNull('oferta_tipo')
            ->groupBy('oferta_tipo')
            // Orden fijo por criterio institucional
            ->orderByRaw("FIELD(oferta_tipo, ".implode(',', array_map(fn($v)=>DB::getPdo()->quote($v), $ordenNiveles)).")")
            ->get();

        // Establecimientos por dep/loc
        $estabPorDepartamento = DatosEstablecimientos::select('departamento', DB::raw('COUNT(*) AS total'))
            ->groupBy('departamento')
            ->orderByDesc('total')
            ->get();

        $estabPorLocalidad = DatosEstablecimientos::select('localidad', DB::raw('COUNT(*) AS total'))
            ->groupBy('localidad')
            ->orderByDesc('total')
            ->limit(300)
            ->get();

        // (Opcional) Matrícula por dependencia_tipo si lo tenías
        $matriculaPorDependencia = DatosMatricula::select('dependencia_tipo', DB::raw('SUM(cantidad) AS total'))
            ->groupBy('dependencia_tipo')
            ->orderByDesc('total')
            ->get();

        return view('edudata.index', compact(
            'totalMatricula',
            'totalEstablecimientos',
            'matriculaPorModalidad',
            'matriculaPorNivel',          // <- NUEVO
            'estabPorDepartamento',
            'estabPorLocalidad',
            'matriculaPorDependencia'
        ));
    }
}
