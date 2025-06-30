<?php

namespace Database\Factories;

use App\Models\PrespuestoEduGral;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrespuestoEduGralFactory extends Factory
{
    protected $model = PrespuestoEduGral::class;

    public function definition(): array
    {
        return [
            'unidad_ejecutora' => $this->faker->randomElement([
                'Ministerio de Educación',
                'Dirección General de Escuelas',
                'Subsecretaría de Planificación',
                'Consejo Provincial de Educación'
            ]),
            'concepto' => $this->faker->randomElement([
                'Obra 1',
                'Obra 2',
                'Escuela 1',
                'Escuela 2',
                'Programa 1',
                'Programa 2',
                'Mejora Edilicia',
                'Equipamiento Escolar',
                'Capacitación Docente',
                'Conectividad Escolar'
            ]),
            'ano' => $this->faker->numberBetween(2020, 2025),
            'presupuesto_vigente' => $this->faker->randomFloat(2, 100000, 5000000),
            'devengado' => $this->faker->randomFloat(2, 50000, 4000000),
            'pagado' => $this->faker->randomFloat(2, 20000, 3000000),
            'fecha_pago' => $this->faker->date(),
        ];
    }
}