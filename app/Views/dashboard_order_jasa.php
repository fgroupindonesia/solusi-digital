<?php
$v = random_int(1, 100);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include('container_header.php'); ?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <?php include('nav_header.php'); ?>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
              <?php include('nav_top.php'); ?>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
          <?php include('nav_bar.php'); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Order Jasa</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li>Saldo Anda : <strong id="saldo-anda" data-cash="<?= $balance; ?>"><?= $balance_rp; ?></strong></li>
                            </ol>
                           
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="order-item white-box analytics-info" data-bs-toggle="modal" data-bs-target="#jasa-komen-form-modal">
                            <center>
                            <div class="social-medias">
                                <img src="/assets/images/fb-logo.png">
                                <img src="/assets/images/twitter-x-logo.png">
                                <img src="/assets/images/instagram-logo.png">
                                <img src="/assets/images/youtube-logo.png">
                                <img src="/assets/images/tiktok-logo.png">
                            </div>
                            <h3 class="box-title">Jasa Komen</h3>
                            <h5><?= $base_price_comment;?>,/1 komen</h5>
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="order-item white-box analytics-info" data-bs-toggle="modal"
                        data-bs-target="#jasa-view-form-modal" >
                            <center>
                            <div class="social-medias">
                                <img src="/assets/images/instagram-logo.png">
                                <img src="/assets/images/youtube-logo.png">
                                <img src="/assets/images/tiktok-logo.png">
                            </div>
                            <h3 class="box-title">Jasa View</h3>
                            <h5><?= $base_price_view;?>,/1 view</h5>
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                         <div class="order-item white-box analytics-info" data-bs-toggle="modal"
                        data-bs-target="#jasa-rating-form-modal" >
                            <center>
                            <div class="social-medias">
                                <img src="/assets/images/gmaps-logo.png">
                            </div>
                            <h3 class="box-title">Jasa Rating &amp; Review</h3>
                            <h5><?= $base_price_rating;?>,/1 rating</h5>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div data-bs-toggle="modal" data-bs-target="#jasa-follow-marketplace-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                                <img src="/assets/images/shopee-logo.png">
                                <img src="/assets/images/bukalapak-logo.png">
                                <img src="/assets/images/tokped-logo.png">
                                <img src="/assets/images/blibli-logo.png">
                            </div>
                            <h3 class="box-title">Jasa Marketplace Follow</h3>
                            <h5><?= $base_price_follow_marketplace;?>,/1 olshop</h5>
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div data-bs-toggle="modal" data-bs-target="#jasa-wishlist-marketplace-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                                <img src="/assets/images/shopee-logo.png">
                                <img src="/assets/images/bukalapak-logo.png">
                                <img src="/assets/images/tokped-logo.png">
                                <img src="/assets/images/blibli-logo.png">
                            </div>
                            <h3 class="box-title">Jasa Marketplace Wishlist</h3>
                            <h5><?= $base_price_wishlist_marketplace;?>,/1 olshop</h5>
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                         <div data-bs-toggle="modal" data-bs-target="#jasa-subscriber-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                                <img src="/assets/images/youtube-logo.png">
                                 <img src="/assets/images/instagram-logo.png">
                                  <img src="/assets/images/twitter-x-logo.png">
                                   <img src="/assets/images/tiktok-logo.png">
                            </div>
                            <h3 class="box-title">Jasa Subscriber &amp; Follower</h3>
                            <h5><?= $base_price_subscriber;?>,/1 subscriber</h5>
                            </center>
                        </div>
                    </div>
                </div>
              
              <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div data-bs-toggle="modal" data-bs-target="#jasa-pembuatanaplikasi-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                               <img src="/assets/images/java-logo.png">
                                <img src="/assets/images/js-logo.png">
                                <img src="/assets/images/cpp-logo.png">
                                <img src="/assets/images/csharp-logo.png">
                                <img src="/assets/images/vb-logo.png">
                                <img src="/assets/images/web-logo.png">
                                 <img src="/assets/images/others-logo.png">
                            </div>
                            <h3 class="box-title">Jasa Pembuatan Aplikasi</h3>
                            <h5><?= $base_price_pembuatanaplikasi;?>,/1 aplikasi</h5>
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div data-bs-toggle="modal" data-bs-target="#jasa-upgrade-fituraplikasi-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                                <img src="/assets/images/java-logo.png">
                                <img src="/assets/images/js-logo.png">
                                <img src="/assets/images/cpp-logo.png">
                                <img src="/assets/images/csharp-logo.png">
                                <img src="/assets/images/vb-logo.png">
                                <img src="/assets/images/web-logo.png">
                                  <img src="/assets/images/others-logo.png">                                
                            </div>
                            <h3 class="box-title">Jasa Upgrade Fitur Aplikasi</h3>
                            <h5><?= $base_price_upgrade_fituraplikasi;?>,/1 paket</h5>
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                         <div data-bs-toggle="modal" data-bs-target="#jasa-virtualvisitors-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                                 <img src="/assets/images/wp-logo.png">
                                 <img src="/assets/images/joomla-logo.png">
                                 <img src="/assets/images/drupal-logo.png">
                                 <img src="/assets/images/laravel-logo.png">
                            <img src="/assets/images/codeigniter-logo.png">    
                                   <img src="/assets/images/globe-logo.png">
                            </div>
                            <h3 class="box-title">Jasa Virtual Visitors</h3>
                            <h5><?= $base_price_virtualvisitors;?>,/1 visitor</h5>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div data-bs-toggle="modal" data-bs-target="#format-os-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                               <img src="/assets/images/win-logo.png">
                               <img src="/assets/images/linux-logo.png">
                            </div>
                            <h3 class="box-title">Jasa Format OS</h3>
                            <h5><?= $base_price_format_os;?>,/pc </h5>
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div data-bs-toggle="modal" data-bs-target="#jasa-upload-aplikasi-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                                <img src="/assets/images/android-logo.png">
                            </div>
                            <h3 class="box-title">Jasa Upload Aplikasi</h3>
                            <h5><?= $base_price_upload_aplikasi;?>,/1 app</h5>
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                         <div data-bs-toggle="modal" data-bs-target="#jasa-ketik-document-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                                 <img src="/assets/images/english-logo.png">
                                 <img src="/assets/images/document-logo.png">
                            </div>
                            <h3 class="box-title">Jasa Ketik Document</h3>
                            <h5><?= $base_price_ketik_document;?>,/1 paket</h5>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div data-bs-toggle="modal" data-bs-target="#wa-chat-rotator-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                               <img src="/assets/images/wa.png">
                            </div>
                            <h3 class="box-title">Jasa WA Chat Rotator</h3>
                            <h5><?= $base_price_wa_chat_rotator;?>,/1 akun</h5>
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div data-bs-toggle="modal" data-bs-target="#landingpage-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                                <img src="/assets/images/wp-logo.png">
                                 <img src="/assets/images/joomla-logo.png">
                                 <img src="/assets/images/drupal-logo.png">
                                 <img src="/assets/images/laravel-logo.png">
                                 <img src="/assets/images/codeigniter-logo.png">    
                                 
                            </div>
                            <h3 class="box-title">Jasa Landing Page</h3>
                            <h5><?= $base_price_landing_page;?>,/1 akun</h5>
                            </center>
                        </div>
                    </div>
                    
                </div>
              
                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="card white-box p-0">
                            <div class="card-body">
                                <h3 class="box-title mb-0">Riwayat Transaksi (<?= $total_orders ?>)</h3>
                            </div>
                            <div class="comment-widgets">
                                <!-- Comment Row -->
                               <?php if (isset($data_orders)): ?>                 
                                <?php foreach($data_orders as $key): ?>
                                <div class="d-flex flex-row comment-row p-3 mt-0">
                                    <?php $namaFileIcon = "order-" . $key->status . "-icon.png"; ?>
                                    <div class="p-2"><img src="/assets/images/<?= $namaFileIcon; ?>" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text ps-2 ps-md-3 w-100">
                                        <h5 class="font-medium">Order ID: #<?= strtoupper($key->order_client_reff); ?></h5>
                                        <span class="mb-3 d-block">Pemesanan <?= $key->order_type; ?>.</span>
                                        <div class="comment-footer d-md-flex align-items-center">
                                            <?php if($key->status == 'approved'): ?>
                                             <span class="badge bg-success rounded"><?= $key->status; ?></span>
                                         <?php elseif($key->status == 'cancel'): ?>
                                             <span class="badge bg-danger rounded"><?= $key->status; ?></span>
                                             <?php else: ?>
                                             <span class="badge bg-warning rounded"><?= $key->status; ?></span>
                                            <?php endif; ?>
                                             
                                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0"><?= $key->date_created; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <!-- Comment Row -->
                               
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card white-box p-0">
                            <div class="card-heading">
                                <h3 class="box-title mb-0">Riwayat Deposit (<?= $total_deposits ;?>)</h3>
                            </div>
                            <div class="card-body">
                                <ul class="chatonline">
                                      <?php if (isset($data_deposits)): ?>                 
                                    <?php foreach($data_deposits as $key): ?>
                                    <?php  $fileCash = "cash-" . $key->status . ".png"; ?>
                                    
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <img src="/assets/images/<?= $fileCash ;?>" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark"><?= $currency_helper->asCurrency($key->amount); ?> <small
                                                        class="d-block text-success d-block"><?= $key->status; ?></small></span>
                                                <span class="text-dark"><?= $date_helper->asFormat($key->date_created, "d-M-Y, h:i") . " WIB"; ?></span>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

      <?php include('modal_setting_form.php'); ?>
      <?php include('modal_add_deposit_client.php'); ?>
      <?php include('modal_jasa_komen.php'); ?>
      <?php include('modal_jasa_view.php'); ?>
      <?php include('modal_jasa_rating.php'); ?>
      <?php include('modal_jasa_subscriber.php'); ?>
      <?php include('modal_jasa_wishlist_marketplace.php'); ?>
      <?php include('modal_jasa_follow_marketplace.php'); ?>
      <?php include('modal_jasa_virtualvisitors.php'); ?>
      <?php include('modal_jasa_upgrade_fituraplikasi.php'); ?>
      <?php include('modal_jasa_pembuatanaplikasi.php'); ?>
      <?php include('modal_format_os.php'); ?>
      <?php include('modal_wa_chat_rotator.php'); ?>
      <?php include('modal_jasa_landingpage.php'); ?>
      <?php include('modal_wa_float.php'); ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include('footer.php'); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/assets/js/jquery-3.7.1.js?v=<?=$v;?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/bootstrap/dist/js/bootstrap.bundle.min.js?v=<?=$v;?>"></script>
    <script src="/assets/js/app-style-switcher.js?v=<?=$v;?>"></script>
    <script src="assets/js/sweetalert2@11.js?v=<?=$v;?>"></script>
   
    <!--Menu sidebar -->
    <script src="/assets/js/sidebarmenu.js?v=<?=$v;?>"></script>
    <!--Custom JavaScript -->
    <script src="/assets/js/custom.js?v=<?=$v;?>"></script>
    <script src="/assets/js/modal-works.js?v=<?=$v;?>"></script>
    <script src="/assets/js/reader-night-mode.js?v=<?=$v;?>"></script>

    <!--This page JavaScript -->
 
</body>

</html>