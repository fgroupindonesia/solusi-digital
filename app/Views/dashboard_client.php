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
                        <h4 class="page-title">Dashboard </h4>
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
        

                <div class="row">
                   <h3>Layanan Aktif</h3>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>

                <p>Landing Page</p>
              </div>
              <div class="icon">
             <i class="fas fa-desktop"></i>


              </div>
              <a href="#" class="maintenance-link small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $total_vvisitors;?></h3>

                <p>Popup Sales Notification</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-bar"></i>

              </div>
              <a href="/manage-virtualvisitors" class="<?= ($total_vvisitors) > 0 ? '' : 'order-pelayanan-link' ;?> small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $total_wa_chat_rotator; ?></h3>

                <p>WA Chat Rotator</p>
              </div>
              <div class="icon">
                   <i class="fab fa-whatsapp"></i>

              </div>
              <a href="/manage-wa-chat-rotator" class="<?= ($total_wa_chat_rotator) > 0 ? '' : 'order-pelayanan-link' ;?> small-box-footer">Selengkapnya  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $total_layananmanual; ?></h3>

                <p>Layanan Manual Terpakai</p>
              </div>
              <div class="icon">
               <i class="fas fa-receipt"></i>

              </div>
              <a href="#" class="maintenance-link small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row justify-content-center">
        <div class="col-md-4">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2 shadow-sm">
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-user-header bg-warning d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
      <div class="widget-user-image">
        <img class="img-circle elevation-2" src="assets/images/chat.png" alt="User Avatar">
      </div>
      <div class="ms-2">
        <h4 class="widget-user-username fw-bold m-0">Komen</h4>
        <h5 class="widget-user-desc m-0">Mengelola interaksi komentar</h5>
      </div>
    </div>
    <!-- Toggle button -->
    <button class="btn btn-sm btn-light toggle-footer-btn" title="Toggle Detail">
      <i class="fas fa-chevron-down"></i>
    </button>
  </div>

  <!-- Footer (toggled content) -->
  <div class="card-footer p-0 footer-content">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="#" class="nav-link">
          Total Order <span class="float-right badge bg-primary">0</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          Pending <span class="float-right badge bg-info">0</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          Success <span class="float-right badge bg-success">0</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          Total Seluruh Komentar <span class="float-right badge bg-danger">0</span>
        </a>
      </li>
    </ul>
  </div>
</div>

            <!-- /.widget-user -->
          </div>
                  
         <div class="col-md-4">
            <!-- Widget: user widget style 2 -->
           <div class="card card-widget widget-user-2 shadow-sm">
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-user-header bg-warning d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
      <div class="widget-user-image">
        <img class="img-circle elevation-2" src="assets/images/star.png" alt="User Avatar">
      </div>
      <div class="ms-2">
        <h4 class="widget-user-username fw-bold m-0">Rating &amp; Review</h4>
        <h5 class="widget-user-desc m-0">Mengelola penilaian pengunjung</h5>
      </div>
    </div>
    <!-- Toggle button -->
    <button class="btn btn-sm btn-light toggle-footer-btn" title="Toggle Detail">
      <i class="fas fa-chevron-down"></i>
    </button>
  </div>

  <!-- Footer (toggled content) -->
  <div class="card-footer p-0 footer-content">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="#" class="nav-link">
          Total Order <span class="float-right badge bg-primary">0</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          Pending <span class="float-right badge bg-info">0</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          Success <span class="float-right badge bg-success">0</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          Rata-Rata Rating <span class="float-right badge bg-danger">0</span>
        </a>
      </li>
    </ul>
  </div>
</div>

            <!-- /.widget-user -->
          </div>
                  
           <div class="col-md-4">
            <!-- Widget: user widget style 2 -->
             <div class="card card-widget widget-user-2 shadow-sm">
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-user-header bg-warning d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
      <div class="widget-user-image">
        <img class="img-circle elevation-2" src="assets/images/bell.png" alt="User Avatar">
      </div>
      <div class="ms-2">
        <h4 class="widget-user-username fw-bold m-0">Subs. &amp; Follower</h4>
        <h5 class="widget-user-desc m-0">Mengelola pengikut sosmed</h5>
      </div>
    </div>
    <!-- Toggle button -->
    <button class="btn btn-sm btn-light toggle-footer-btn" title="Toggle Detail">
      <i class="fas fa-chevron-down"></i>
    </button>
  </div>

  <!-- Footer (toggled content) -->
  <div class="card-footer p-0 footer-content">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="#" class="nav-link">
          Total Order <span class="float-right badge bg-primary">0</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          Pending <span class="float-right badge bg-info">0</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          Success <span class="float-right badge bg-success">0</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          Total Seluruh Followers <span class="float-right badge bg-danger">0</span>
        </a>
      </li>
    </ul>
  </div>
</div>
            <!-- /.widget-user -->
          </div>


                </div>
              
              <?php if($mode_affiliator == true): ?>
                <div class="row">
    <h3>Affiliate Progress</h3>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-money-bill-wave"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Profit (Keseluruhan)</span>
                <span class="info-box-number"><?= $total_affiliate_profit; ?></span>
            </div>
            </div>
        </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-shopping-cart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Pesanan (Bulan Ini)</span>
                <span class="info-box-number"><?= $total_affiliate_product_sales_this_month; ?> pesanan.</span>
            </div>
            </div>
        </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-box-open"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Pesanan (Bulan Lalu)</span>
                <span class="info-box-number"><?= $total_affiliate_product_sales_last_month; ?> pesanan.</span>
            </div>
            </div>
        </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fas fa-thumbs-up"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">93,139</span>
            </div>
            </div>
        </div>
    </div>

     

                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Perkembangan Pengunjung
                </h3>
                <div class="card-tools">
                
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="tab-content p-0">
                    <div id="myChart" class="ct-chart ct-perfect-fourth"></div>
                  </div>
                </div>

              <!-- /.card-body -->
            </div>
                </div>
                    <?php endif; ?>

                <div class="chartist-tooltip" style="display:none;">
                </div>
                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="card white-box p-0 ">
                            <div class="card-body">
                           <h3 class="box-title mb-0 heading-riwayat" style="cursor:pointer;" >
  <i class="fas fa-chevron-down me-2 icon-riwayat" ></i>Riwayat Transaksi Anda (<?= count($data_orders) ?? '0'; ?>)
</h3>


                            </div>
                            <div class="comment-widgets content-riwayat" >

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
                                <h3 class="box-title mb-0 heading-riwayat" style="cursor:pointer;">
                                  <i class="fas fa-chevron-down me-2 icon-riwayat" ></i>Riwayat Deposit Anda (<?= count($data_deposits) ?? '0' ;?>)</h3>
                            </div>
                            <div class="card-body content-riwayat">
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
    <script src="/assets/plugins/bower_components/jquery/dist/jquery.min.js?v=<?=$v;?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/bootstrap/dist/js/bootstrap.bundle.min.js?v=<?=$v;?>"></script>
    <script src="/assets/js/sweetalert2@11.js?v=<?=$v;?>"></script>
    <script src="/assets/js/app-style-switcher.js?v=<?=$v;?>"></script>
    <script src="/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js?v=<?=$v;?>"></script>
    <!--Wave Effects -->
    <script src="/assets/js/waves.js?v=<?=$v;?>"></script>
    <!--Menu sidebar -->
    <script src="/assets/js/sidebarmenu.js?v=<?=$v;?>"></script>
    <!--Custom JavaScript -->
    <script src="/assets/js/custom.js?v=<?=$v;?>"></script>
     <script src="/assets/js/modal-works.js?v=<?=$v;?>"></script>
     <script src="/assets/js/toggle-dashboard.js?v=<?=$v;?>"></script>
     
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="/assets/plugins/bower_components/chartist/dist/chartist.min.js?v=<?=$v;?>"></script>
    <script src="/assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js?v=<?=$v;?>"></script>
    <script src="/assets/js/pages/dashboards/dashboard1.js?v=<?=$v;?>"></script>

    <script type="text/javascript" src="/assets/js/dashboard-chart.js?v=<?=$v;?>"></script>
    <script src="/assets/js/reader-night-mode.js?v=<?=$v;?>"></script>
</body>

</html>