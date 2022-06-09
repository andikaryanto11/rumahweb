<?php

use AndikGraphql\Route\GraphqlRoute;
use Config\Services;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the containerBuilder and ENVIRONMENT
// // can override as needed.
// if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
//     require SYSTEMPATH . 'Config/Routes.php';
// }
/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('App\Controllers\Customer\Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override('App\Controllers\Error404');
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'home.controller:index');
$routes->get('/user', 'user.controller:index');
$routes->get('/user/register', 'user.controller:register');
$routes->post('/user/do_register', 'user.controller:doRegister');
$routes->get('/user/create', 'user.controller:create');
$routes->get('/user/update', 'user.controller:update');
$routes->get('/user/delete', 'user.controller:delete');

return $routes;