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
$routes->get('/lp', 'Works::load_lp_vvvweb');
$routes->get('/testing-lib', 'Home::testing_library');
$routes->get('/test', 'Home::test');
$routes->post('/testing-post', 'Home::testing_post');
$routes->get('/portal?status=error', 'Home::display_login_error');
$routes->get('/dashboard', 'Home::display_dashboard');
$routes->get('/verify-manual', 'Works::verify_login_manual');
$routes->get('/settings', 'Home::display_settings');
$routes->get('/order-jasa', 'Home::order_jasa');
$routes->get('/order-jasa-lain', 'Home::order_jasa_lain');
$routes->get('/order-jasa-digital-marketing', 'Home::order_jasa_digital_marketing');
$routes->get('/order-pembuatan-app-web', 'Home::order_jasa_pembuatan_app_web');
$routes->get('/jasa-komen', 'Home::form_jasa_komen');
$routes->get('/jasa-view', 'Home::form_jasa_view');
$routes->get('/jasa-rating-review', 'Home::form_jasa_rating_review');
$routes->get('/jasa-marketplace-follow', 'Home::form_jasa_marketplace_follow');
$routes->get('/jasa-marketplace-wishlist', 'Home::form_jasa_marketplace_wishlist');
$routes->get('/jasa-subscriber-follower', 'Home::form_jasa_subscriber_follower');
$routes->get('/manage-virtualvisitors', 'Home::virtualvisitors_management');
$routes->get('/manage-qrcodes', 'Home::qrcode_management');
$routes->get('/manage-users', 'Home::user_management');
$routes->get('/manage-apps', 'Home::app_management');
$routes->get('/manage-packages', 'Home::package_management');
$routes->get('/manage-order-jasa', 'Home::order_jasa_management');
$routes->get('/manage-order-status', 'Home::order_jasa_management');
$routes->get('/manage-deposits', 'Home::deposit_management');
$routes->get('/manage-layananmanual', 'Home::layananmanual_management');
$routes->get('/manage-socialmedia', 'Home::socialmedia_management');
$routes->get('/manage-themes', 'Home::themes_management');
$routes->get('/manage-landingpage', 'Home::landingpage_management');
$routes->get('/manage-landingpage/builder', 'Home::landingpage_builder');
$routes->get('/manage-wa-chat-rotator', 'Home::wa_chat_rotator_management');
$routes->get('/manage-wa-chat-rotator/analysis', 'Home::wa_chat_rotator_analysis');
$routes->get('/logout', 'Works::logout');
$routes->post('/verify', 'Works::verify_login');
$routes->post('/order-new-jasa-uploadaplikasi', 'Works::jasa_uploadaplikasi_order');
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
$routes->post('/order-new-format-os', 'Works::jasa_lain_order');
$routes->post('/order-new-ketik-document', 'Works::jasa_lain_order');
$routes->post('/add-new-order-type', 'Works::order_type_add');
$routes->post('/add-new-app', 'Works::app_add');
$routes->post('/add-new-layananmanual', 'Works::layananmanual_add');
$routes->post('/add-new-campaign', 'Works::campaign_add');
$routes->post('/add-new-user', 'Works::user_add');
$routes->post('/add-new-package', 'Works::package_add');
$routes->post('/add-new-deposit', 'Works::deposit_add');
$routes->post('/add-new-theme-landingpage', 'Works::theme_add');
$routes->post('/add-new-affiliate-product', 'Works::affiliate_product_add');
$routes->post('/add-new-affiliate-product-category', 'Works::affiliate_product_category_add');
$routes->post('/add-new-affiliate-product-image', 'Works::affiliate_product_image_add');

// for wa chat rotator purposes
$routes->post('/delete-group-wa-chat-rotator', 'Works::wa_chat_rotator_delete_group');
$routes->post('/update-group-wa-chat-rotator', 'Works::wa_chat_rotator_update_group');

$routes->post('/delete-cs-wa-chat-rotator', 'Works::wa_chat_rotator_delete_cs');
$routes->post('/update-cs-wa-chat-rotator', 'Works::wa_chat_rotator_update_cs');

$routes->post('/register-new-user', 'Works::user_register');
$routes->post('/delete-affiliate-product', 'Works::affiliate_product_delete');
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
$routes->post('/delete-affiliate-product-image', 'Works::affiliate_product_images_delete');
$routes->post('/delete-affiliate-shop-profile-banner', 'Works::affiliate_shop_profile_banner_delete');
$routes->post('/delete-data-virtualvisitors', 'Works::virtualvisitors_data_delete');

$routes->post('/edit-affiliate-product', 'Works::affiliate_product_edit');
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
$routes->post('/update-end-result-detail-order', 'Works::update_end_result_detail_order');
$routes->post('/update-revisions-detail-order', 'Works::update_revisions_detail_order');
$routes->post('/update-end-result-detail-order-as-clients', 'Works::update_end_result_detail_order_as_clients');
$routes->post('/update-revisions-detail-order-as-clients', 'Works::update_revisions_detail_order_as_clients');
$routes->post('/delete-revisions-detail-order', 'Works::delete_revisions_detail_order');
$routes->post('/request-end-result-detail-order', 'Works::request_end_result_detail_order');
$routes->post('/request-revisions-detail-order', 'Works::request_revisions_detail_order');
$routes->post('/update-end-result-detail-order-file', 'Works::update_end_result_detail_order_file');
$routes->post('/update-jasa-order', 'Works::jasa_order_update');
$routes->post('/update-theme-landingpage', 'Works::theme_update');
$routes->post('/update-deposit', 'Works::deposit_update');
$routes->post('/update-deposit-bulk', 'Works::deposite_update_bulk');
$routes->post('/update-wa-chat-rotator-message', 'Works::wa_chat_rotator_update_message');
$routes->post('/update-wa-chat-rotator-cs-region', 'Works::wa_chat_rotator_cs_region_update');
$routes->post('/update-wa-chat-rotator-cs-schedule', 'Works::wa_chat_rotator_cs_schedule_update');
$routes->post('/update-affiliate-shop-profile', 'Works::affiliate_shop_profile_update');
$routes->post('/update-data-virtualvisitors', 'Works::virtualvisitors_data_update');
$routes->post('/update-message-virtualvisitors', 'Works::virtualvisitors_message_update');

$routes->get('/download-invoice', 'Works::download_invoice');
$routes->post('/request-affiliate-product-image', 'Works::affiliate_product_images_data');
$routes->post('/request-statistics', 'Works::statistics_data');
$routes->post('/request-wa-chat-rotator-analysis', 'Works::wa_chat_rotator_analysis_data');
$routes->post('/request-campaign', 'Works::campaign_data');
$routes->post('/request-single-campaign', 'Works::campaign_single_data');
$routes->post('/request-detail-jasa-order', 'Works::jasa_order_data');
$routes->post('/request-wa-chat-rotator-message', 'Works::wa_chat_rotator_request_message');
$routes->post('/request-wa-chat-rotator-cs-schedule', 'Works::wa_chat_rotator_request_cs_schedule');
$routes->post('/request-virtualvisitors-message', 'Works::virtualvisitors_request_message');
$routes->post('/send-email', 'Works::send_email');
$routes->post('/check-email-exists', 'Works::user_email_check');
$routes->post('/check-wa-chat-rotator-script-gratis', 'Works::wa_chat_rotator_script_gratis');
$routes->post('/check-wa-chat-rotator-script-ready', 'Works::wa_chat_rotator_script_ready');

$routes->get('/client', 'Works::generate_js');
$routes->get('/client/fwd', 'Works::generate_php');
$routes->get('/client/gac', 'Works::generate_php2');
$routes->get('/client/gvs', 'Works::generate_virtualvisitors_js');
$routes->post('/client/next-index', 'Works::wa_chat_rotator_update_index_check');
$routes->post('/client/update-index', 'Works::wa_chat_rotator_update_index_record');

// we obtain the cs number based on their parameters
$routes->post('/client/next-device-cs-number', 'Works::wa_chat_rotator_next_device_cs');
$routes->post('/client/next-origin-cs-number', 'Works::wa_chat_rotator_next_origin_cs');
$routes->post('/client/make-it-short', 'Works::url_shortener');

$routes->post('/client/next-schedule-cs-number', 'Works::wa_chat_rotator_next_schedule_cs');
$routes->get('/client/preview-image/(:any)/(:any)', 'Works::preview_image/$1/$2');

// untuk affiliate admin & team
$routes->get('/manage-affiliate/products', 'Home::display_all_affiliate_products');
$routes->get('/manage-affiliate/orders', 'Home::display_all_affiliate_sales_orders');
$routes->get('/manage-affiliate', 'Home::display_affiliate_dashboard');
$routes->post('/activate-affiliator-mode', 'Works::affiliate_activate');
$routes->post('/preview-virtualvisitors', 'Works::test_virtualvisitors');

// untuk affiliate user (pembeli)
$routes->get('/shop', 'Home::display_affiliate_shop');
$routes->get('/shop/cat/(:any)', 'Home::display_affiliate_shop_by_categories');
$routes->get('/shop/login', 'Home::display_affiliate_shop_login');
$routes->get('/shop/ketentuan', 'Home::display_affiliate_faq');
$routes->get('/shop/product', 'Home::display_affiliate_product');
$routes->get('/shop/cart', 'Home::display_affiliate_cart');

$routes->get('/roadmap', 'Home::display_roadmap');