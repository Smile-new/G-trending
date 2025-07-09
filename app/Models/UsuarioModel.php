<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table          = 'usuarios';
    protected $primaryKey     = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false; // No hay columna 'deleted_at'

    // AÑADIR 'foto' A LOS CAMPOS PERMITIDOS
    protected $allowedFields = [
        'nombre_usuario', 'user', 'password', 'rol_id', 'activo', 'foto' // <--- ¡Campo 'foto' añadido!
    ];

    // Timestamps: solo tienes 'fecha_creacion', no 'fecha_actualizacion' en tu DDL para esta tabla
    protected $useTimestamps = true;
    protected $dateFormat     = 'datetime';
    protected $createdField   = 'fecha_creacion';
    protected $updatedField   = null; // No hay campo 'fecha_actualizacion' en tu tabla 'usuarios'
}