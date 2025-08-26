<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
         parent::initController($request, $response, $logger);

        // Inicializar modelo de publicaciones para todos los controllers
        $this->publicacionModel = new \App\Models\PublicacionModel();
    }

    /**
     * Obtiene las publicaciones recientes activas
     *
     * @param int $limit Número de publicaciones a mostrar
     * @return array
     */
    protected function obtenerRecientes(int $limit = 2): array
    {
        return $this->publicacionModel
                    ->where('activo', 1)
                    ->orderBy('fecha_publicacion', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
}
