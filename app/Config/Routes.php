<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/test', 'Home::test');
$routes->post('/upload-data-virtualvisitors', 'Works::upload_data_virtualvisitors');
$routes->get('/portal', 'Home::display_login');
$routes->get('/testing', 'Works::testing');
$routes->get('/portal?status=error', 'Home::display_login_error');
$routes->get('/dashboard', 'Home::display_dashboard');
$routes->get('/verify-manual', 'Works::verify_login_manual');
$routes->get('/settings', 'Home::display_settings');
$routes->get('/order-jasa', 'Home::order_jasa');
$routes->get('/jasa-komen', 'Home::form_jasa_komen');
$routes->get('/jasa-view', 'Home::form_jasa_view');
$routes->get('/jasa-rating-review', 'Home::form_jasa_rating_review');
$routes->get('/jasa-marketplace-follow', 'Home::form_jasa_marketplace_follow');
$routes->get('/jasa-marketplace-wishlist', 'Home::form_jasa_marketplace_wishlist');
$routes->get('/jasa-subscriber-follower', 'Home::form_jasa_subscriber_follower');
$routes->get('/manage-virtualvisitors', 'Home::virtualvisitors_management');
$routes->get('/manage-users', 'Home::user_management');
$routes->get('/manage-apps', 'Home::app_management');
$routes->get('/manage-packages', 'Home::package_management');
$routes->get('/manage-order-jasa', 'Home::order_jasa_management');
$routes->get('/manage-deposits', 'Home::deposit_management');
$routes->get('/logout', 'Works::logout');
$routes->post('/verify', 'Works::verify_login');
$routes->post('/order-new-jasa-pembuatanaplikasi', 'Works::jasa_pembuatanaplikasi_order');
$routes->post('/order-new-jasa-virtualvisitors', 'Works::jasa_virtualvisitors_order');
$routes->post('/order-new-jasa-upgrade-fituraplikasi', 'Works::jasa_upgrade_fituraplikasi_order');
$routes->post('/order-new-jasa-comment', 'Works::jasa_comment_order');
$routes->post('/order-new-jasa-view', 'Works::jasa_view_order');
$routes->post('/order-new-jasa-rating', 'Works::jasa_rating_order');
$routes->post('/order-new-jasa-follow-marketplace', 'Works::jasa_follow_marketplace_order');
$routes->post('/order-new-jasa-wishlist-marketplace', 'Works::jasa_wishlist_marketplace_order');
$routes->post('/order-new-jasa-subscriber', 'Works::jasa_subscriber_order');
$routes->post('/add-new-app', 'Works::app_add');
$routes->post('/add-new-campaign', 'Works::campaign_add');
$routes->post('/add-new-user', 'Works::user_add');
$routes->post('/add-new-package', 'Works::package_add');
$routes->post('/add-new-deposit', 'Works::deposit_add');
$routes->get('/register-new-user', 'Works::user_register');
$routes->post('/delete-virtualvisitors', 'Works::virtualvisitors_delete');
$routes->post('/delete-app', 'Works::app_delete');
$routes->post('/delete-campaign', 'Works::campaign_delete');
$routes->post('/delete-user', 'Works::user_delete');
$routes->post('/delete-package', 'Works::package_delete');
$routes->post('/delete-jasa-order', 'Works::jasa_order_delete');
$routes->post('/delete-deposit', 'Works::deposit_delete');
$routes->post('/edit-app', 'Works::app_edit');
$routes->post('/edit-user', 'Works::user_edit');
$routes->post('/edit-package', 'Works::package_edit');
$routes->post('/edit-deposit', 'Works::deposit_edit');
$routes->post('/edit-virtualvisitors', 'Works::virtualvisitors_edit');
$routes->post('/update-app', 'Works::app_update');
$routes->post('/update-user', 'Works::user_update');
$routes->post('/update-package', 'Works::package_update');
$routes->post('/update-settings', 'Works::settings_update');
$routes->post('/update-jasa-order', 'Works::jasa_order_update');
$routes->post('/update-deposit', 'Works::deposit_update');
$routes->post('/request-statistics', 'Works::statistics_data');
$routes->post('/request-campaign', 'Works::campaign_data');
$routes->post('/request-single-campaign', 'Works::campaign_single_data');
$routes->post('/request-detail-jasa-order', 'Works::jasa_order_data');
$routes->post('/send-email', 'Works::send_email');