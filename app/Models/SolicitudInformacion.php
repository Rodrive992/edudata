<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudInformacion extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'solicitud_informacion';

    // Campos que pueden asignarse de forma masiva
    protected $fillable = [
        'dni_solicitante',
        'nombre_solicitante',
        'apellido_solicitante',
        'dni_imagen_frente',    
        'dni_imagen_reverso',
        'provincia_solicitante',
        'departamento_solicitante',
        'codigo_postal',
        'barrio_solicitante',
        'telefono_solicitante',
        'email_solicitante',
        'asunto_solicitud',
        'solicitud_texto',
        'fecha_respuesta',
        'usuario_respuesta',
        'estado_solicitud',
        'mostrar_solicitud',
        'asunto_respuesta_solicitud',
        'respuesta_solicitud',
        'archivo_respuesta_solicitud',
    ];

      protected $casts = [
        
        'fecha_respuesta' => 'datetime',
    ];

    // Opcional: Si querés definir valores por defecto
    protected $attributes = [
        'estado_solicitud' => 'pendiente',
        'mostrar_solicitud'  => 'no',
    ];
}