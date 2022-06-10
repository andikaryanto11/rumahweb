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
$routes->get('/', 'user.controller:login');
$routes->get('/user', 'user.controller:index', ['filter' => 'AuthenticateWeb']);
$routes->get('/user/login', 'user.controller:login');
$routes->post('/user/do_login', 'user.controller:doLogin');
$routes->get('/user/logout', 'user.controller:logout');
$routes->get('/user/register', 'user.controller:register');
$routes->post('/user/do_register', 'user.controller:doRegister');
$routes->post('/user/create', 'user.controller:create');
$routes->put('/user/update', 'user.controller:update');
$routes->post('/user/list', 'user.controller:list');
$routes->post('/user/edit/(:any)', 'user.controller:edit');
$routes->delete('/user/delete/(:any)', 'user.controller:delete');

return $routes;
