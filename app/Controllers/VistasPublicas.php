<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PublicacionModel;
use CodeIgniter\Exceptions\PageNotFoundException; // Importar para manejar publicaciones no encontradas

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
        return view('portal/causes', $data); // Asumo que causes.php es la vista que lista las publicaciones.
    }

    /**
     * Muestra el detalle de una publicación específica.
     *
     * @param int $id El ID de la publicación.
     * @return string
     */
    public function detallePublicacion(int $id): string
    {
        // Obtener la publicación por su ID, incluyendo el nombre de la categoría y el usuario
        // Necesitamos adaptar getPublicacionesActivas para obtener una sola publicación con JOINs
        // O crear un nuevo método en el modelo para este fin.
        $publicacion = $this->publicacionModel
                             ->select('publicaciones_encuesta.*, categorias_encuesta.nombre as categoria_nombre, usuarios.nombre_usuario as usuario_nombre')
                             ->join('categorias_encuesta', 'categorias_encuesta.id = publicaciones_encuesta.categoria_id')
                             ->join('usuarios', 'usuarios.id = publicaciones_encuesta.usuario_id')
                             ->find($id);

        // Si la publicación no se encuentra o no está activa
        if (!$publicacion || $publicacion['activo'] == 0) {
            throw new PageNotFoundException('La publicación no existe o no está disponible.');
        }

        $data['publicacion'] = $publicacion;

        // Cargar la vista 'publicacion_detalle.php' ubicada en la carpeta 'portal'
        return view('portal/publicacion_detalle', $data);
    }
}