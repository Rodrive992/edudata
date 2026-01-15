<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoMantenimiento extends Model
{
    protected $table = 'fotos_mantenimiento';

    protected $fillable = [
        'titulo',
        'descripcion',
        'alt_text',
        'imagen',
        'orden',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'orden'  => 'integer',
    ];
}
