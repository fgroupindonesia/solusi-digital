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
                        <h4 class="page-title"><?= $page_name;?></h4>
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
                       <div class="col-lg-4 col-md-12">
                        <div data-bs-toggle="modal" data-bs-target="#jasa-virtualvisitors-form-modal" class="order-item white-box analytics-info">
                            <center>
                            <div class="social-medias">
                                <img src="/assets/images/wp-logo.png">
                                 <img src="/assets/images/joomla-logo.png">
                                 <img src="/assets/images/drupal-logo.png">
                                 <img src="/assets/images/laravel-logo.png">
                                 <img src="/assets/images/codeigniter-logo.png">    
                                 
                            </div>
                            <h3 class="box-title">Jasa Popup Sales Notification</h3>
                            <h5><?= $base_price_virtualvisitors;?>,/1 akun</h5>
                            </center>
                        </div>
                    </div>
                    
                </div>
              
               
                <div class="row">
                   
                    
                </div>

      <?php include('modal_setting_form.php'); ?>
      <?php include('modal_add_deposit_client.php'); ?>
      <?php include('modal_wa_chat_rotator.php'); ?>
      <?php include('modal_jasa_komen.php'); ?>
      <?php include('modal_jasa_landingpage.php'); ?>
      <?php include('modal_jasa_view.php'); ?>
      <?php include('modal_jasa_rating.php'); ?>
      <?php include('modal_jasa_subscriber.php'); ?>
      <?php include('modal_jasa_wishlist_marketplace.php'); ?>
      <?php include('modal_jasa_follow_marketplace.php'); ?>
      <?php include('modal_jasa_virtualvisitors.php'); ?>
      <?php include('modal_wa_float.php'); ?>
        <?php include('modal_affiliate_shop_profile.php'); ?>
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