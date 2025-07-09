<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicacionModel extends Model
{
    protected $table      = 'publicaciones_encuesta';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false; // No hay columna 'deleted_at'

    protected $allowedFields = [
        'titulo', 'descripcion', 'fecha_publicacion',
        'ruta_foto', 'ruta_pdf', 'categoria_id', 'usuario_id', 'activo'
    ];

    // Timestamps: tienes 'fecha_creacion' y 'fecha_actualizacion'
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime'; // El formato debe coincidir con el de la DB
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_actualizacion';
    // Si tu `fecha_actualizacion` no es actualizada automáticamente por MySQL (ON UPDATE CURRENT_TIMESTAMP),
    // CodeIgniter la establecerá cuando hagas un update con este modelo.
}