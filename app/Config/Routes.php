<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Portal
$routes->get('/', 'Portal::index');
$routes->get('/about', 'Portal::about');
$routes->get('/causes', 'Portal::causes');
$routes->get('/contact', 'Portal::contact');


//Panel
 
    $routes->get('dashboard', 'Administrador::index'); 
    


    //Usuario CRUD
    $routes->get('users', 'Usuario::index'); // Lista de usuarios
    $routes->get('users/create', 'Usuario::create'); // Formulario de creación
    $routes->post('users/store', 'Usuario::store'); // Procesar creación
    $routes->get('users/edit/(:num)', 'Usuario::edit/$1'); // Formulario de edición
    $routes->post('users/update/(:num)', 'Usuario::update/$1'); // Procesar edición
    $routes->get('users/delete/(:num)', 'Usuario::delete/$1'); // Eliminar usuario
    $routes->post('users/toggleStatus/(:num)', 'Usuario::toggleStatus/$1'); // Cambiar estado
    $routes->get('users/generate-username-ajax', 'Usuario::generateUsernameAjax', ['as' => 'admin_generate_username_ajax']);
    $routes->get('users/generate-password-ajax', 'Usuario::generatePasswordAjax', ['as' => 'admin_generate_password_ajax']);



    //Categorias CRUD
    $routes->get('categorias', 'Categorias::index', ['as' => 'categorias_index']); // Lista de categorías
$routes->get('categorias/create', 'Categorias::create', ['as' => 'categorias_create']); // Formulario de creación
$routes->post('categorias/store', 'Categorias::store', ['as' => 'categorias_store']); // Procesar creación
$routes->get('categorias/edit/(:num)', 'Categorias::edit/$1', ['as' => 'categorias_edit']); // Formulario de edición
$routes->post('categorias/update/(:num)', 'Categorias::update/$1', ['as' => 'categorias_update']); // Procesar edición
$routes->post('categorias/delete/(:num)', 'Categorias::delete/$1', ['as' => 'categorias_delete']); // Eliminar categoría (POST recomendado)


//Publicaciones CRUD 
$routes->get('resultado', 'Resultados::index');
$routes->get('resultado/create', 'Resultados::create');
$routes->post('resultado/store', 'Resultados::store');
$routes->get('resultado/edit/(:num)', 'Resultados::edit/$1');
$routes->post('resultado/update/(:num)', 'Resultados::update/$1');
$routes->get('resultado/delete/(:num)', 'Resultados::delete/$1');
$routes->get('resultado/toggleStatus/(:num)', 'Resultados::toggleStatus/$1');


//Rutas Login
// app/Config/Routes.php
$routes->get('login', 'LoginController::index');
$routes->post('login/authenticate', 'LoginController::authenticate');
$routes->get('logout', 'LoginController::logout');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
