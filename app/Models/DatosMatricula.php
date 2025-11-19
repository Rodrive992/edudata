<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosMatricula extends Model
{
    use HasFactory;

    protected $table = 'datos_matricula';

    protected $fillable = [
        'modalidad',
        'oferta_tipo',
        'dependencia',
        'dependencia_tipo',
        'cantidad',
    ];

    protected $casts = [
        'cantidad' => 'integer',
    ];
}