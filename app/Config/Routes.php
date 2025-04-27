<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->post('/upload-data-virtualvisitors', 'Works::upload_data_virtualvisitors');
$routes->get('/portal', 'Home::display_login');
$routes->get('/register', 'Home::display_registration');
$routes->get('/testing', 'Works::testing');
$routes->get('/testing-lib', 'Home::testing_library');
$routes->get('/test', 'Home::test');
$routes->post('/testing-post', 'Home::testing_post');
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
$routes->get('/manage-layananmanual', 'Home::layananmanual_management');
$routes->get('/manage-socialmedia', 'Home::socialmedia_management');
$routes->get('/manage-themes', 'Home::themes_management');
$routes->get('/manage-landingpage', 'Home::landingpage_management');
$routes->get('/manage-wa-chat-rotator', 'Home::wa_chat_rotator_management');
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
$routes->post('/order-new-wa-chat-rotator', 'Works::wa_chat_rotator');
$routes->post('/order-new-landingpage', 'Works::jasa_landingpage_order');
$routes->post('/add-new-app', 'Works::app_add');
$routes->post('/add-new-layananmanual', 'Works::layananmanual_add');
$routes->post('/add-new-campaign', 'Works::campaign_add');
$routes->post('/add-new-user', 'Works::user_add');
$routes->post('/add-new-package', 'Works::package_add');
$routes->post('/add-new-deposit', 'Works::deposit_add');
$routes->post('/add-new-theme-landingpage', 'Works::theme_add');
$routes->post('/register-new-user', 'Works::user_register');
$routes->post('/delete-virtualvisitors', 'Works::virtualvisitors_delete');
$routes->post('/delete-app', 'Works::app_delete');
$routes->post('/delete-campaign', 'Works::campaign_delete');
$routes->post('/delete-theme-landingpage', 'Works::theme_delete');
$routes->post('/delete-user', 'Works::user_delete');
$routes->post('/delete-package', 'Works::package_delete');
$routes->post('/delete-jasa-order', 'Works::jasa_order_delete');
$routes->post('/delete-deposit', 'Works::deposit_delete');
$routes->post('/delete-layananmanual', 'Works::layananmanual_delete');
$routes->post('/delete-socialmedia', 'Works::socialmedia_delete');
$routes->post('/delete-wa-chat-rotator', 'Works::wa_chat_rotator_delete');
$routes->post('/edit-app', 'Works::app_edit');
$routes->post('/edit-user', 'Works::user_edit');
$routes->post('/edit-package', 'Works::package_edit');
$routes->post('/edit-theme-landingpage', 'Works::theme_edit');
$routes->post('/edit-deposit', 'Works::deposit_edit');
$routes->post('/edit-virtualvisitors', 'Works::virtualvisitors_edit');
$routes->post('/edit-layananmanual', 'Works::layananmanual_edit');
$routes->post('/edit-socialmedia', 'Works::socialmedia_edit');
$routes->post('/edit-wa-chat-rotator', 'Works::wa_chat_rotator_edit');
$routes->post('/edit-wa-chat-rotator-cs-schedule', 'Works::wa_chat_rotator_cs_schedule_edit');
$routes->post('/update-app', 'Works::app_update');
$routes->post('/update-user', 'Works::user_update');
$routes->post('/update-package', 'Works::package_update');
$routes->post('/update-settings', 'Works::settings_update');
$routes->post('/update-jasa-order', 'Works::jasa_order_update');
$routes->post('/update-theme-landingpage', 'Works::theme_update');
$routes->post('/update-deposit', 'Works::deposit_update');
$routes->post('/update-wa-chat-rotator', 'Works::wa_chat_rotator_update');
$routes->post('/update-wa-chat-rotator-cs-region', 'Works::wa_chat_rotator_cs_region_update');
$routes->post('/update-wa-chat-rotator-cs-schedule', 'Works::wa_chat_rotator_cs_schedule_update');

$routes->post('/request-statistics', 'Works::statistics_data');
$routes->post('/request-campaign', 'Works::campaign_data');
$routes->post('/request-single-campaign', 'Works::campaign_single_data');
$routes->post('/request-detail-jasa-order', 'Works::jasa_order_data');
$routes->post('/send-email', 'Works::send_email');
$routes->post('/check-email-exists', 'Works::user_email_check');
$routes->post('/check-wa-chat-rotator-script-gratis', 'Works::wa_chat_rotator_script_gratis');
$routes->post('/check-wa-chat-rotator-script-ready', 'Works::wa_chat_rotator_script_ready');

$routes->get('/client', 'Works::generate_js');
$routes->get('/client/fwd', 'Works::generate_php');
$routes->post('/client/next--index', 'Works::wa_chat_rotator_update_index_check');
$routes->post('/client/update-index', 'Works::wa_chat_rotator_update_index_record');

// we obtain the cs number based on their parameters
$routes->post('/client/next-device-cs-number', 'Works::wa_chat_rotator_next_device_cs');
$routes->post('/client/next-origin-cs-number', 'Works::wa_chat_rotator_next_origin_cs');
$routes->post('/client/make-it-short', 'Works::url_shortener');

$routes->post('/client/next-schedule-cs-number', 'Works::wa_chat_rotator_next_schedule_cs');
$routes->get('/client/preview-image/(:any)/(:any)', 'Works::preview_image/$1/$2');
