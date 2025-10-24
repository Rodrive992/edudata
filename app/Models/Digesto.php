<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Digesto extends Model
{
    use HasFactory;

    protected $table = 'digesto'; // nombre exacto de la tabla

    public $timestamps = false; // descativamos update  

    protected $fillable = [
        'titulo',
        'descripcion',
        'nombre_archivo',
        'ruta_archivo',
        'tipo_archivo',
        'tamano_archivo',
        'fecha_subida',
        'usuario_id',
        'estado',
    ];

    // Si querés manejar fechas como Carbon
    protected $dates = [
        'fecha_subida',
    ];

    protected $casts = [
        'fecha_subida' => 'datetime',
    ];

    // Relación opcional con usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}

