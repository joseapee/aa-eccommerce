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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/products', 'Home::productPage');
$routes->get('/products/(:num)', 'Home::singleProduct/$1');
$routes->get('/category/(:num)', 'Home::productPage/$1');
$routes->get('/currency/(:any)', 'CurrencyController::setCurrency/$1');
$routes->add('/add-to-cart', 'Checkout::addToCart');
$routes->add('/remove-from-cart/(:num)', 'Checkout::removeFromCart/$1');
$routes->add('/cart', 'Home::cart');
$routes->add('/add-new-shipping', 'Checkout::newShipping');
$routes->get('/fetch-state/(:num)', 'Checkout::fetchStates/$1');
$routes->get('/save-shipping-address/(:num)', 'Checkout::saveShippingAddress/$1');
$routes->get('/save-shipping-method/(:any)', 'Checkout::saveShippingMethod/$1');
$routes->get('/verify-voucher/(:any)', 'Checkout::verifyVoucher/$1');

// user restricted routes
$routes->add('/checkout', 'Checkout::checkout', ['filter' => 'role:guests,admins']);


		// Admin routes
$routes->group('admin', ['filter' => 'role:admins'], function($routes) {

$routes->get('/', 'Admin/AdminController::index');
$routes->get('dashboard', 'Admin/AdminController::index');
$routes->get('catalogue/products', 'Admin/ProductController::index');
$routes->get('catalogue/categories', 'Admin/CategoryController::index');
// post routes
$routes->add('catalogue/products/new', 'Admin/ProductController::new');
$routes->add('catalogue/products/edit/(:num)', 'Admin\ProductController::edit/$1');
$routes->add('catalogue/categories/new', 'Admin/CategoryController::new');
$routes->add('catalogue/categories/edit/(:num)', 'Admin\CategoryController::edit/$1');

});

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
