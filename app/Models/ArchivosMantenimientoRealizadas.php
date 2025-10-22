<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchivosMantenimientoRealizadas extends Model
{
    protected $table = 'archivos_mantenimiento_realizadas';

    protected $fillable = [
        'nombre_original',
        'nombre_guardado',
        'mime_type',
        'size_bytes',
        'ruta_publica',
        'usuario_id',
        'observacion',
    ];

    // Relación con las filas cargadas
    public function registros()
    {
        // Asumiendo que tu modelo de filas es Mantenimiento (tabla mantenimiento_realizadas)
        return $this->hasMany(MantenimientoRealizadas::class, 'cod_carga', 'id');
    }
}