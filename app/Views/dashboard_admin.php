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
                                <li></li>
                            </ol>
                            <ol>
                               
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
                            <h3 class="box-title">Total Users</h3>
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
                            <h3 class="box-title">Total Apps</h3>
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
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info">
            <i class="fas fa-money-bill-wave"></i>
            </span>

              <div class="info-box-content">
                <span class="info-box-text">Penghasilan Bulan ini</span>
                <span class="info-box-number"><?= $monthly_balance; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success">
               <i class="fas fa-receipt"></i>
            </span>

              <div class="info-box-content">
                <span class="info-box-text">Total Order</span>
                <span class="info-box-number"><?= $total_orders ;?> <?= ($total_orders > 1)? "items" : "item";?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning">
                <i class="fas fa-box-open"></i>
            </span>

              <div class="info-box-content">
                <span class="info-box-text">Total Packages</span>
                <span class="info-box-number"><?= $total_packages; ?> <?= ($total_packages > 1)? "items" : "item";?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Jasa</span>
                <span class="info-box-number">15 items.</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

                <!-- ============================================================== -->
                <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Male & Female Users</h3>
                            <div class="d-md-flex">
                                <ul class="list-inline d-flex ms-auto">
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-info"></i>Male</h5>
                                    </li>
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-inverse"></i>Female</h5>
                                    </li>
                                </ul>
                            </div>
                            <div id="ct-visits" style="height: 405px;">
                                <div class="chartist-tooltip" style="top: -17px; left: -12px;"><span
                                        class="chartist-tooltip-value">6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Recent Users</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                 
                                    <select id="date-recent-users" class="form-select shadow-none row border-top">
                                        <option>March 2021</option>
                                        <option>April 2021</option>
                                        <option>May 2021</option>
                                        <option>June 2021</option>
                                        <option>July 2021</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Whatsapp</th>
                                            <th class="border-top-0">Sex</th>
                                            <th class="border-top-0">Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                   <?php if (isset($data_users)): ?>
                   <?php $startNum = 1; ?>                 
                  <?php foreach($data_users as $key): ?>

                                        <tr>
                                            <td><?= $startNum++; ?></td>
                                            <td class="txt-oflo"> <?= $key->username ?></td>
                                            <td><?= $key->email ?>
                                            </td>
                                            <td class="txt-oflo"><?= $key->whatsapp ?></td>
                                              <td class="txt-oflo">
                                                  
                                              <?php if($key->sex == 'male'): ?>
                                                <img src="/assets/images/male-icon.png" class="img-dash img-fluid" >
                                              <?php else: ?>
                                                <img src="/assets/images/female-icon.png" class="img-dash img-fluid" >
                                              <?php endif; ?>

                                              </td>
                                            <td><span class="text-success"><?= $key->date_created ?></span></td>
                                        </tr>
                 <?php endforeach; ?>
                 <?php endif; ?>
                                    </tbody>
                                </table>
                                <a href="/manage-users">
                                View All</a>
                            </div>
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
                                <h3 class="box-title mb-0">Recent Orders</h3>
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
                                        <div class="call-chat">
                                            <button class="btn btn-success text-white btn-circle btn" type="button">
                                            <a href="tel:123"><i class="fas fa-phone"></i></a>
                                            </button>
                                            <button class="btn btn-info btn-circle btn" type="button">
                                                <i data-phone="085721261437" class="far fa-comments msg-user-wa text-white"></i>
                                            </button>
                                        </div>
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/varun.jpg" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Master Keren <small
                                                        class="d-block text-success d-block">10 Apps</small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="call-chat">
                                            <button class="btn btn-success text-white btn-circle btn" type="button">
                                                <a href="tel:123"><i class="fas fa-phone"></i></a>
                                            </button>
                                            <button class="btn btn-info btn-circle btn" type="button">
                                                 <i data-phone="085721261437" class="far fa-comments msg-user-wa text-white"></i>
                                            </button>
                                        </div>
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/genu.jpg" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Neng
                                                    Kidul<small class="d-block text-warning">1 App</small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="call-chat">
                                            <button class="btn btn-success text-white btn-circle btn" type="button">
                                              <a href="tel:123"><i class="fas fa-phone"></i></a>
                                            </button>
                                            <button class="btn btn-info btn-circle btn" type="button">
                                                  <i data-phone="085721261437" class="far fa-comments msg-user-wa text-white"></i>
                                            </button>
                                        </div>
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Gondrong Purnomo
                                                     <small class="d-block text-danger">0 App</small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="call-chat">
                                            <button class="btn btn-success text-white btn-circle btn" type="button">
                                          <a href="tel:123"><i class="fas fa-phone"></i></a>
                                            </button>
                                            <button class="btn btn-info btn-circle btn" type="button">
                                                 <i data-phone="085721261437" class="far fa-comments msg-user-wa text-white"></i>
                                            </button>
                                        </div>
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/arijit.jpg" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Dewa Sono
                                                     <small class="d-block text-muted">-</small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="call-chat">
                                            <button class="btn btn-success text-white btn-circle btn" type="button">
                                                <a href="tel:123"><i class="fas fa-phone"></i></a>
                                            </button>
                                            <button class="btn btn-info btn-circle btn" type="button">
                                                 <i data-phone="085721261437" class="far fa-comments msg-user-wa text-white"></i>
                                            </button>
                                        </div>
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
                                        <div class="call-chat">
                                            <button class="btn btn-success text-white btn-circle btn" type="button">
                                              <a href="tel:123"><i class="fas fa-phone"></i></a>
                                            </button>
                                            <button class="btn btn-info btn-circle btn" type="button">
                                                 <i data-phone="085721261437" class="far fa-comments text-white msg-user-wa"></i>
                                            </button>
                                        </div>
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="/assets/plugins/images/users/hritik.jpg" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark">Kentang
                                                    Goreng<small class="d-block text-success">7 Apps</small></span>
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
   <?php include('container_scripts.php'); ?>
</body>

</html>