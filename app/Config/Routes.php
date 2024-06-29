<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/portal', 'Home::display_login');
$routes->get('/portal?status=error', 'Home::display_login_error');
$routes->get('/portal?reloggin=true', 'Home::display_login_error');
$routes->get('/dashboard', 'Home::display_dashboard');
$routes->post('/verify', 'Works::verify_login');
$routes->get('/settings', 'Home::display_settings');
$routes->get('/manage-users', 'Home::user_management');
$routes->get('/manage-apps', 'Home::app_management');
$routes->get('/logout', 'Works::logout');
$routes->post('/add-new-app', 'Works::app_add');
$routes->post('/add-new-user', 'Works::user_add');
$routes->post('/delete-app', 'Works::app_delete');
$routes->post('/delete-user', 'Works::user_delete');
$routes->post('/edit-app', 'Works::app_edit');
$routes->post('/edit-user', 'Works::user_edit');
$routes->post('/update-app', 'Works::app_update');
$routes->post('/update-user', 'Works::user_update');
$routes->post('/update-settings', 'Works::settings_update');
$routes->post('/request-statistics', 'Works::statistics_data');