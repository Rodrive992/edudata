<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoRealizadas extends Model
{
    use HasFactory;

    protected $table = 'mantenimiento_realizadas';

    protected $fillable = [
    'id',
    'fecha',
    'establecimiento',
    'tarea',
    'tipo_tarea',
    'cod_carga',
    ];
}