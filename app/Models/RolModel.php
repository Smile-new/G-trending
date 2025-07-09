<?php

namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{
    protected $table      = 'roles';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false; // No hay columna 'deleted_at'

    protected $allowedFields = ['nombre_rol'];

    protected $useTimestamps = false; // Esta tabla no tiene campos de fecha
}