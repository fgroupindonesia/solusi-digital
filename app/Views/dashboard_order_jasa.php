<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Order Jasa</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="/assets/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="/assets/css/icons/font-awesome/css/all.css">

    <!-- Custom CSS -->
    <link href="/assets/css/style.min.css" rel="stylesheet">
    <link href="/assets/css/style-custom.css" rel="stylesheet">
</head>

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
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="/dashboard">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="/assets/plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="/assets/plugins/images/logo-text.png" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="<?= $search_display ?> in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                         <div class="dropdown">
                          <a class="profile-pic btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                             <img src="/assets/plugins/images/users/<?= $propic ?>" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium"><?= $username ?></span>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a data-bs-toggle="modal" data-bs-target="#setting-form-modal" class="dropdown-item" href="/settings">
                               <i class="fa fa-cog" aria-hidden="true"></i>
                                     <span class="hide-menu">Settings</span>
                            </a></li>
                           <li><a class="dropdown-item" href="/logout">
                               <i class="fa fa-times" aria-hidden="true"></i>
                                     <span class="hide-menu">Logout</span>
                            </a></li>

                          </ul>
                        </div>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
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
                                <li>Saldo Anda : <strong><?= $balance; ?></strong></li>
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
                                             <span class="badge bg-primary rounded"><?= $key->status; ?></span>
                                             
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
                                                <span class="text-dark">Rp. <?= $key->amount; ?> <small
                                                        class="d-block text-success d-block"><?= $key->status; ?></small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    <li>
                                        <a href="#" id="wa-help" data-phone="6285795569337"  class="msg-user-wa d-flex align-items-center"><img
                                                src="/assets/images/wa.png" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Contact Admin
                                                    <small class="d-block text-success">Technical Issue</small></span>
                                            </div>
                                        </a>
                                    </li>
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
    <script src="/assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/app-style-switcher.js"></script>
   
   
    <!--Menu sidebar -->
    <script src="/assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/modal-works.js"></script>
    <!--This page JavaScript -->
 
</body>

</html>