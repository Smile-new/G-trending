<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicacionModel extends Model
{
    protected $table          = 'publicaciones_encuesta';
    protected $primaryKey     = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false; // No hay columna 'deleted_at'

    protected $allowedFields = [
        'titulo', 'descripcion', 'fecha_publicacion', // 'fecha_publicacion' es 'date' en la DB
        'ruta_foto', 'ruta_pdf', 'categoria_id', 'usuario_id', 'activo'
    ];

    // Timestamps
    protected $useTimestamps = false; // <<< CAMBIO IMPORTANTE: Desactivado porque no tienes 'fecha_actualizacion'
    protected $dateFormat    = 'date'; // <<< CAMBIO IMPORTANTE: Cambiado a 'date' porque 'fecha_publicacion' es 'date'
    protected $createdField  = 'fecha_publicacion'; // Se usará al insertar si useTimestamps fuera true, pero ahora lo manejaremos manualmente
    protected $updatedField  = ''; // <<< CAMBIO IMPORTANTE: Vacío porque no hay columna de actualización automática

    
}