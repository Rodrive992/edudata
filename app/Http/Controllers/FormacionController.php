<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacitaciones;
use Carbon\Carbon;

class FormacionController extends Controller
{
    public function index(Request $request)
    {
        $tadUrl = 'https://tad.catamarca.gob.ar/tramitesadistancia/tad-publico';

        $lineasPrioritarias = [
            [
                'titulo' => 'Alfabetización integral',
                'descripcion' => 'Lectura, escritura y comprensión crítica en todas las áreas del conocimiento, con foco en aprendizajes fundamentales.',
                'icono' => '📘',
            ],
            [
                'titulo' => 'Enseñanza de la matemática',
                'descripcion' => 'Razonamiento, resolución de problemas y desarrollo del pensamiento lógico para fortalecer el desempeño de los estudiantes.',
                'icono' => '➗',
            ],
            [
                'titulo' => 'Pensamiento científico',
                'descripcion' => 'Indagación, análisis de información, ciudadanía crítica, ambiente y competencias tecnológicas vinculadas también a la inteligencia artificial.',
                'icono' => '🧪',
            ],
            [
                'titulo' => 'Habilidades socioemocionales',
                'descripcion' => 'Comprensión de sí mismo, relaciones con otros y adaptación a contextos complejos para fortalecer la convivencia y el aprendizaje.',
                'icono' => '💙',
            ],
        ];

        $niveles = [
            'Nivel Inicial',
            'Nivel Primario',
            'Nivel Secundario',
            'Educación Técnica Profesional',
            'Modalidades del sistema educativo',
            'Educación Superior',
        ];

        $metodologias = [
            'Aprendizaje basado en proyectos',
            'Aprendizaje basado en problemas',
            'Aprendizaje colaborativo',
            'Gamificación',
            'Cultura maker',
            'STEAM',
            'Aula invertida',
            'Evaluación formativa',
            'Tecnologías digitales',
            'Inteligencia artificial aplicada a la enseñanza',
        ];

        $requisitos = [
            'Inscripción obligatoria del oferente mediante TAD.',
            'Adecuación estricta a los ejes definidos en los Anexos I y II.',
            'Focalización por nivel educativo y/o modalidad.',
            'Innovación pedagógica basada en evidencia.',
            'Transferibilidad efectiva a las prácticas de aula.',
            'Indicadores de impacto en los aprendizajes y criterios de evaluación.',
        ];

        $datosResumen2025 = Capacitaciones::query()
            ->whereYear('fecha_inicio', 2025);

        $resumen2025 = [
            'total' => (clone $datosResumen2025)->count(),
            'oferentes' => (clone $datosResumen2025)->distinct('oferente')->count('oferente'),
            'localidades' => (clone $datosResumen2025)->distinct('localidad')->count('localidad'),
            'virtuales' => (clone $datosResumen2025)->where('modalidad', 'like', '%Virtual%')->count(),
            'presenciales' => (clone $datosResumen2025)->where('modalidad', 'like', '%Presencial%')->count(),
        ];

        return view('edudata.formacion.index', compact(
            'tadUrl',
            'lineasPrioritarias',
            'niveles',
            'metodologias',
            'requisitos',
            'resumen2025'
        ));
    }

    public function capacitaciones2025(Request $request)
    {
        $anio = 2025;
        $mes = $request->input('mes');
        $localidad = $request->input('localidad');
        $modalidad = $request->input('modalidad');

        $query = Capacitaciones::query()
            ->whereYear('fecha_inicio', 2025);

        if ($mes) {
            $query->whereMonth('fecha_inicio', $mes);
        }

        if ($localidad) {
            $query->where('localidad', 'like', '%' . $localidad . '%');
        }

        if ($modalidad) {
            $query->where('modalidad', 'like', '%' . $modalidad . '%');
        }

        $capacitaciones = $query
            ->orderBy('fecha_inicio')
            ->paginate(8)
            ->appends($request->query());

        $baseStats = Capacitaciones::query()->whereYear('fecha_inicio', 2025);

        $totalCapacitaciones = (clone $baseStats)->count();
        $totalOferentes = (clone $baseStats)->distinct('oferente')->count('oferente');
        $totalLocalidades = (clone $baseStats)->distinct('localidad')->count('localidad');
        $totalVirtuales = (clone $baseStats)->where('modalidad', 'like', '%Virtual%')->count();
        $totalPresenciales = (clone $baseStats)->where('modalidad', 'like', '%Presencial%')->count();

        $porMes = Capacitaciones::query()
            ->whereYear('fecha_inicio', 2025)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->fecha_inicio)->locale('es')->isoFormat('MMMM');
            })
            ->map(function ($items) {
                return $items->count();
            });

        return view('edudata.formacion.capacitaciones_2025', compact(
            'capacitaciones',
            'anio',
            'mes',
            'localidad',
            'modalidad',
            'totalCapacitaciones',
            'totalOferentes',
            'totalLocalidades',
            'totalVirtuales',
            'totalPresenciales',
            'porMes'
        ));
    }
}