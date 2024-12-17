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
    <title>Dashboard - Solusi Digital</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/solusi-digital-logo.png">
    <!-- Custom CSS -->
    <link href="/assets/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
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
              
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Your Apps</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                 
                                    <select id="date-recent-users" class="form-select shadow-none row border-top">
                                        <?php if(isset($filter_month)): ?>
                                            <?php foreach($filter_month as $val): ?>
                                                <option value="<?= $val; ?>"><?= $val; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <option>All Dates</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">App Name</th>
                                            <th class="border-top-0">Descriptions</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                   <?php if (count($data_apps) > 0): ?>  
                     <?php $startNum = 1; ?>                  
                  <?php foreach($data_apps as $key): ?>

                                        <tr>
                                             <td><?= $startNum++; ?></td>
                                            <td class="txt-oflo"> <?= $key->apps_name ?></td>
                                            <td><?= $key->descriptions ?>
                                            </td>
                                            <td class="txt-oflo"><?= $key->status ?></td>
                                              
                                            <td><span class="text-success"><?= $key->date_created ?></span></td>
                                        </tr>
                 <?php endforeach; ?>
                 <?php endif; ?>
                                    </tbody>
                                </table>
                                <a href="/manage-apps">
                                View All</a>
                            </div>
                        </div>
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
    <script src="/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="/assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/assets/js/custom.js"></script>
     <script src="/assets/js/modal-works.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="/assets/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="/assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/assets/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>