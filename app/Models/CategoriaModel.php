<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table      = 'categorias_encuesta'; // Nombre de la tabla en la BD
    protected $primaryKey = 'id'; // Columna de la clave primaria

    protected $useAutoIncrement = true; // Indica si la PK es auto-incremental

    protected $returnType     = 'array'; // Tipo de retorno de los resultados (array u object)
    protected $useSoftDeletes = false; // No hay columna 'deleted_at'

    // Campos que se pueden rellenar masivamente (para insert/update)
    protected $allowedFields = ['nombre', 'descripcion'];

    // Timestamps
    protected $useTimestamps = false; // Esta tabla no tiene campos de fecha de creación/actualización
}