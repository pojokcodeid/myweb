<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/tutorial', 'Tutorial::index');
$routes->get('/tutorial/(:segment)', 'Tutorial::view/$1');
$routes->post('/tutorial/comment/(:segment)/(:segment)', 'Tutorial::comment/$1/$2');
$routes->get('/kategori/(:segment)', 'Kategori::index/$1');
$routes->get('/register', 'Auth::register');
$routes->post('/register/insert', 'Auth::insert');
$routes->get('/login', 'Auth::login');
$routes->post('/login/auth', 'Auth::loginAuth');
$routes->get('/logout', 'Auth::logout');
$routes->get('/profile', 'Auth::profile');
$routes->post('/auth/updatefoto', 'Auth::updateFoto');
$routes->post('/auth/updateprofil', 'Auth::updateProfil');
$routes->post('/auth/updatepassword', 'Auth::updatePassword');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}