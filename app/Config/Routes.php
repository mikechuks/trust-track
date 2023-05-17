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
$routes->get('/', 'IndexPage::index');
$routes->get('about', 'About::index');
$routes->get('blog', 'Blog::index');
$routes->get('contact-us', 'ContactUs::index');
$routes->get('testimonial', 'Testimonial::index');
$routes->match(['get', 'post'], 'general-product', 'HomeProduct::index');
$routes->match(['get', 'post'], 'buy-now/(:num)', 'HomeProduct::buyNow/$1');

$routes->match(['get', 'post'], 'login', 'Login::index');
$routes->match(['get', 'post'], 'logout', 'Login::logout');
$routes->match(['get', 'post'], 'register', 'Register::index');
$routes->get('dashboard/(:num)', 'Dashboard::index/$1', ['filter' => 'authGuard']);
$routes->get('dashboard-admin/(:num)', 'DashboardAdmin::index/$1', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'edit-dashboard/(:num)', 'Dashboard::editSetting/$1', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'settings', 'Dashboard::Settings', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'view-product-admin', 'ProductAdmin::viewProduct', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'add-product-admin', 'ProductAdmin::addProductAdmin', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'update-product-admin', 'ProductAdmin::updateProductAdmin', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'edit-product-admin/(:num)', 'ProductAdmin::editProductAdmin/$1', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'delete-product-admin/(:num)', 'ProductAdmin::deleteProductAdmin/$1', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'final-delete-product-admin', 'ProductAdmin::finalDeleteadmin', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'view-category-admin', 'CategoryAdmin::viewCategory', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'add-category-admin', 'CategoryAdmin::addCategoryAdmin', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'update-category-admin',  'CategoryAdmin::updateCategoryAdmin', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'edit-category-admin/(:num)', 'CategoryAdmin::editCategoryAdmin/$1', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'view-all-product/(:num)/(:num)', 'Product::viewAllProduct/$1/$2', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'view-specific-product/(:num)/(:num)', 'Product::viewSpecificProduct/$1/$2', ['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'view-cart-details', 'ShopCart::viewCart', ['filter' => 'authGuard']);
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
