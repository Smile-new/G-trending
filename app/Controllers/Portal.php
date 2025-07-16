<?php

namespace App\Controllers;

use CodeIgniter\Controller; // Asegúrate de importar la clase base Controller

class Portal extends Controller
{
    /**
     * Constructor del controlador.
     * Puedes cargar helpers, modelos, etc. aquí.
     */
    public function __construct()
    {
        // No es estrictamente necesario llamar a parent::__construct()
        // en CI4 para controladores que no extienden de BaseController.
        // Pero si tuvieras lógica común de inicialización para todos los métodos, iría aquí.

        // Cargar el helper 'url' para usar base_url()
        helper('url'); // Este helper es fundamental para base_url()

        // También asegúrate de que tus constantes estén definidas y accesibles.
        // Si Constants.php está en app/Config, ya debería estar cargado automáticamente.
    }

    /**
     * Muestra la página principal del portal (index.php).
     */
    public function index()
    {
        $data = [
            'page_title' => 'Trending Local - Inicio',
            // Puedes añadir más datos que necesites pasar a la vista
        ];

        // Carga la vista desde app/Views/portal/index.php
        return view('portal/index', $data);
    }

    /**
     * Muestra la página "Acerca de Nosotros" (about.php).
     */
    public function about()
    {
        $data = [
            'page_title' => 'Trending Local - Acerca de Nosotros',
        ];

        // Carga la vista desde app/Views/portal/about.php
        return view('portal/about', $data);
    }

    /**
     * Muestra la página "Causas" (causes.php).
     */
   

    /**
     * Muestra la página de "Contacto" (contact.php).
     */
    public function contact()
    {
        $data = [
            'page_title' => 'Trending Local - Contacto',
        ];

        // Carga la vista desde app/Views/portal/contact.php
        return view('portal/contact', $data);
    }

    // Si tuvieras un formulario de contacto, podrías agregar una función para manejar el POST:
    // public function submitContactForm()
    // {
    //     // Lógica para procesar el formulario de contacto (validación, guardar en DB, enviar email, etc.)
    //     // Puedes acceder a los datos del formulario con $this->request->getPost()
    //     // return redirect()->to(base_url('contact'))->with('message', 'Mensaje enviado con éxito!');
    // }
}