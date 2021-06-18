<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/', 'Home::index');
$routes->get('/registerUser', 'RegisterUsuariosController::index');
$routes->POST('/addPropietario', 'RegisterUsuariosController::addPropietario');
$routes->get('/dashboard', 'RegisterUsuariosController::dashboard');
$routes->get('/login', 'RegisterUsuariosController::login');
$routes->POST('/signIn', 'RegisterUsuariosController::SignIn');
$routes->get('/perfilPropietario', 'PerfilController::index');
$routes->POST('/updatePerfil', 'PerfilController::updatePerfil');
$routes->get('/pagos', 'RegisterUsuariosController::pagos');
$routes->get('/signOut', 'RegisterUsuariosController::signOut');
$routes->get('/profile', 'RegisterUsuariosController::profile');
$routes->post('/updateApto', 'AptoController::updateApto');
$routes->get('/deleteApto', 'AptoController::deleteApto');
$routes->get('/registerApto', 'AptoController::registerApto');
$routes->POST('/pagarApto', 'AptoController::pagar');
$routes->post('/addApto', 'AptoController::addApto');



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
