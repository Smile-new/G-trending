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

     /**
     * Obtiene un usuario por su nombre de usuario, incluyendo el nombre de su rol.
     * @param string $user El nombre de usuario.
     * @return array|null Los datos del usuario o null si no se encuentra.
     */
    public function getUserByUsernameWithRole(string $user)
    {
        return $this->select('usuarios.*, roles.nombre_rol as nombre_rol')
                    ->join('roles', 'roles.id = usuarios.rol_id')
                    ->where('usuarios.user', $user)
                    ->first();
    }
}