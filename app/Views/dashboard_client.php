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
                        <h4 class="page-title">Dashboard</h4>
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
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Apps</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success"><?= $total_users ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Rejected App</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple"><?= $total_apps ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Published App</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info"><?= $total_apps_published ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
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

                <p>VVisitors</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-bar"></i>

              </div>
              <a href="/manage-virtualvisitors" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="/manage-wa-chat-rotator" class="small-box-footer">Selengkapnya  <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="/manage-layananmanual" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
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

                <div class="chartist-tooltip" style="display:none;">
                </div>
                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="card white-box p-0">
                            <div class="card-body">
                                <h3 class="box-title mb-0">Recent Apps</h3>
                            </div>
                            <div class="comment-widgets">
                                <!-- Comment Row -->
                                  <?php if (isset($data_apps)): ?>                 
                                <?php foreach($data_apps as $key): ?>
                                <div class="d-flex flex-row comment-row p-3 mt-0">
                                    <div class="p-2"><img src="/assets/plugins/images/apps-02.png" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text ps-2 ps-md-3 w-100">
                                        <h5 class="font-medium"><?= $key->apps_name ;?></h5>
                                        <span class="mb-3 d-block"><?= $key->descriptions ;?> </span>
                                        <div class="comment-footer d-md-flex align-items-center">
                                             <span class="badge bg-primary rounded"><?= $key->status ;?></span>
                                             
                                            <div class="text-muted fs-2 ms-auto mt-2 mt-md-0"><?= $key->date_created ;?></div>
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
                                <h3 class="box-title mb-0">Top Users</h3>
                            </div>
                            <div class="card-body">
                                <ul class="chatonline">
                                    <li>
                                       
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/varun.jpg" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Master Keren <small
                                                        class="d-block text-success d-block">10 Apps</small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                       
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/genu.jpg" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Neng
                                                    Kidul <small class="d-block text-warning">1 App</small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Gondrong
                                                    Purnomo <small class="d-block text-danger">0 App</small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                       
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/arijit.jpg" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Dewa
                                                    Sono <small class="d-block text-muted">-</small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                      
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/govinda.jpg" alt="user-img"
                                                class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Gogolia
                                                    Star <small class="d-block text-success">9 Apps</small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                    
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/hritik.jpg" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Kentang Goreng
                                                    <small class="d-block text-success">7 Apps</small></span>
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
     
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="/assets/plugins/bower_components/chartist/dist/chartist.min.js?v=<?=$v;?>"></script>
    <script src="/assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js?v=<?=$v;?>"></script>
    <script src="/assets/js/pages/dashboards/dashboard1.js?v=<?=$v;?>"></script>

    <script type="text/javascript" src="/assets/js/dashboard-chart.js?v=<?=$v;?>"></script>
</body>

</html>