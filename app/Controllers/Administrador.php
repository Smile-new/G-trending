<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Administrador extends Controller
{
    public function __construct()
    {
        helper('url'); // Necesario para base_url()
        // Aquí podrías cargar otros helpers o servicios si los necesitas globalmente en el admin.
        // Por ejemplo, para manejar sesiones o autenticación.
        // $this->session = \Config\Services::session();
    }

    /**
     * Muestra la página principal del Dashboard de administración.
     * Corresponde a la vista app/Views/dashboard/dashboard.php
     */
    public function index()
    {
        $data = [
            'page_title' => 'Dashboard Principal | Administración',
            // Puedes añadir datos dinámicos que necesites en el dashboard
        ];
        return view('dashboard/dashboard', $data); // Apunta a app/Views/dashboard/dashboard.php
    }


}