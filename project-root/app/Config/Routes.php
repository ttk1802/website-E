<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// $routes->get('/', 'Home::index');
$routes->get('/', 'user\Uindex::index');

$routes->get('/login', 'Home::login');
$routes->post('/act_login', 'Home::act_login');

// $routes->get('/admin/news/(:segment)', 'admin\News::view/$1');
// $routes->get('/admin/news', 'admin\News::index');

//CLIENT

$routes->get('/Category/(:any)', 'user\Uindex::category/$1');



$routes->get('/Product/(:any)', 'user\Uindex::product/$1');

$routes->get('/Contact', 'user\Contact::contact');
$routes->post('/contact_sm', 'user\Contact::act_add');

$routes->get('/About', 'user\Contact::about');
$routes->Post('/Subscriber', 'user\Subscriber::act_add');

$routes->get('/Cart', 'user\Uindex::cart');
$routes->get('/AddCart/(:any)', 'user\Uindex::addcart/$1');
$routes->get('/Delcart/(:any)', 'user\Uindex::delcart/$1');

$routes->post('/updatecart', 'user\Uindex::updatecart');
$routes->get('/Checkout', 'user\Checkout::checkout');

$routes->get('/Login', 'user\Login::login');
$routes->get('/Logout', 'user\Login::logout');
$routes->post('/act_login_user', 'user\Login::act_login');
$routes->post('/sign_up_user', 'user\Login::act_signup');



$routes->get('/Thanks', 'user\Checkout::thanks');

$routes->get('/Search', 'user\Uindex::search');




$routes->post('/add_to_cart', 'user\Uindex::add_to_cart');
// checkout
$routes->post('/confirm_checkout', 'user\Checkout::confirm_checkout');
// Comment
$routes->post('/comment/send', 'user\Uindex::comment_send');

// ADMIN
$routes->get('/admin', 'admin\User::index');

$routes->get('/admin/user/list', 'admin\User::listUser');
$routes->post('/admin/user/atc_add', 'admin\User::act_add');
$routes->post('/admin/user/act_update', 'admin\User::act_update');
$routes->get('/admin/user/del/(:any)', 'admin\User::del/$1');
// Contact
$routes->get('/admin/contact/list', 'admin\Contact::listContact');
$routes->get('/admin/contact/del/(:any)', 'admin\Contact::del/$1');

// Subcriber
$routes->get('/admin/subscriber/list', 'admin\Subscriber::listsubscriber');
$routes->get('/admin/subscriber/del/(:any)', 'admin\Subscriber::del/$1');
// product
$routes->get('/admin/product/list', 'admin\Product::listProduct');
$routes->post('/admin/product/atc_add', 'admin\Product::act_add');
$routes->post('/admin/product/act_update', 'admin\Product::act_update');
$routes->get('/admin/product/del/(:any)', 'admin\Product::del/$1');

//Category
$routes->get('/admin/category/list', 'admin\Category::listCategory');
$routes->post('/admin/category/atc_add', 'admin\Category::act_add');
$routes->post('/admin/category/act_update', 'admin\Category::act_update');
$routes->get('/admin/category/del/(:any)', 'admin\Category::del/$1');

//Checkout Admin
// order
$routes->get('/admin/order/list', 'admin\order::listOrder');
$routes->get('/admin/order/del/(:any)', 'admin\order::del/$1');
// order details
$routes->get('/admin/order/view/(:any)', 'admin\Order_detail::listOrder_detail/$1');
$routes->post('/admin/order/atc_add', 'admin\order::act_add');
$routes->get('/admin/order/update/(:any)', 'admin\order::updorder/$1');
$routes->post('/admin/order/act_update', 'admin\order::act_update');
$routes->post('/admin/order/del', 'admin\order::del');
// xu ly don hang
$routes->post('/admin/order/process', 'admin\Order::process');


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
