<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrespuestoEduGral extends Model
{
    use HasFactory;

    protected $table = 'prespuesto_edu_gral';

    protected $fillable = [
    'unidad_ejecutora',
    'concepto',
    'ano',
    'presupuesto_vigente',
    'devengado',
    'pagado',
    'fecha_pago',
    ];
}