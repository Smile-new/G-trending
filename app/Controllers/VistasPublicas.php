<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PublicacionModel;

class VistasPublicas extends BaseController
{
    protected $publicacionModel;
    protected $helpers = ['url'];

    public function __construct()
    {
        // Inicializa el modelo de publicaciones
        $this->publicacionModel = new PublicacionModel();
    }

    /**
     * Muestra la página pública de "Causas" o listado de publicaciones activas.
     *
     * @return string
     */
    public function index(): string
    {
        // Obtener las publicaciones activas desde el modelo
        $data['publicaciones'] = $this->publicacionModel->getPublicacionesActivas();

        // Cargar la vista 'causes.php' ubicada en la carpeta 'portal'
        return view('portal/causes', $data);
    }

    // Puedes agregar otros métodos públicos si deseas
    // public function detalle(int $id): string { ... }
}
