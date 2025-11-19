<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosEstablecimientos extends Model
{
    use HasFactory;

    protected $table = 'datos_establecimientos';

    protected $fillable = [
        'cue',
        'anexo',
        'nombre',
        'dependencia',
        'oferta_tipo',
        'localidad',
        'departamento',
    ];

    protected $casts = [
        'cue'   => 'integer',
        'anexo' => 'integer',
    ];
}