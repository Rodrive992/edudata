<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoEducacion extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'cargos_educacion';

    // Clave primaria
    protected $primaryKey = 'id';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'cue',
        'nombre_apellido',
        'dni',
        'cuil',
        'establecimiento',
        'cargo',
        'puntaje',
        'hs',
        'fecha_alta',
        'situacion_revista',
        'estado',
    ];

    // Si no usás created_at y updated_at
    public $timestamps = false;

    // Casts para convertir automáticamente los tipos de datos
    protected $casts = [
        'cue' => 'integer',
        'dni' => 'integer',
        'cuil' => 'integer',
        'puntaje' => 'integer',
        'hs' => 'integer',
        'fecha_alta' => 'date',
    ];
}