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
    <title>Manage WA Chat Rotator - Solusi Digital</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/solusi-digital-logo.png">
    <!-- Custom CSS -->
    <link href="/assets/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="/assets/css/datatables.min.css" rel="stylesheet">    
    <link href="/assets/css/style.min.css" rel="stylesheet">
    <link href="/assets/css/style-custom.css" rel="stylesheet" >
     <link rel="stylesheet" href="/assets/css/adminlte.min.css">
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
                        <h4 class="page-title">Management WA Chat Rotator</h4>
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
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">All WA Chat Rotator (<?= $total_wa_chat_rotator ?>)</h3><br>
                                 
                                <div class="col-md-4 col-sm-4 col-xs-6 ms-auto">
                                  
                                    <a class="link-edit" href="/edit-user" data-entity='wa-chat-rotator'>Edit</a>
                                    <a class="link-delete" href="/delete-user" data-entity='wa-chat-rotator'>Delete</a>
                                   
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="table-wa-chat-rotator" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th id="check-all" data-state="inactive" class="border-top-0">#</th>
                                            <th class="border-top-0">Package</th>
                                            <th class="border-top-0">Total Nomor WA</th>
                                            <th class="border-top-0">Total Website Terkait</th>
                                            <th class="border-top-0">Date Created</th>
                                            <th class="border-top-0">Script</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                   <?php if (isset($data_wa_chat_rotator)): ?>                 
                  <?php foreach($data_wa_chat_rotator as $key): ?>

                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td><input type="checkbox" class="user-checked" data-id="<?= $key->id ?>" /></td>
                                            <td class="txt-oflo"> <?= $key->package ?></td>
                                            <td><?= $key->total_cs ?>
                                            </td>
                                            <td class="txt-oflo"><?= $key->total_web ?></td>
                                              <td class="txt-oflo"><?= $key->date_created ?></td>
                                            <td><span class="text-success">
                                                <a href="#" class="access-code" data-client-reff="<?= $key->order_client_reff; ?>" data-bs-toggle="modal" data-bs-target="#wa-chat-rotator-script-modal">Access</a></span></td>
                                           
                                        </tr>

                                         <tr class="expandable-body d-none">
                                          <td colspan="6">
                                            <p style="display: none;">
                                              <b>Nama Tema: </b><?= empty($key->custom_name) ? '-': $key->custom_name; ?> <br>  
                                              <b>Mode : </b><?= $key->rotator_mode; ?> <br>  
                                              <b>Nomor WA Tim CS : </b><?= $key->details_cs; ?> <br>
                                              <b>Web URL : </b> <?= $key->details_web; ?>
                                            </p>
                                          </td>
                                        </tr>
                 <?php endforeach; ?>
                 <?php endif; ?>
                                    </tbody>
                                </table>
                                <p>Selected : <span id="active-checked">0</span> data.</p>
                            </div>
                        </div>
                    </div>
                </div>
             
                <?php include('modal_setting_form.php'); ?>
                <?php include('modal_wa_chat_rotator.php'); ?>
                <?php include('modal_wa_chat_rotator_script.php'); ?>
                <?php include('modal_wa_chat_rotator_custom.php'); ?>
                <?php include('modal_wa_chat_rotator_region.php'); ?>
                <?php include('modal_wa_chat_rotator_schedule.php'); ?>

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
    <script src="/assets/plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="/assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/app-style-switcher.js"></script>
    <script src="/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!--Wave Effects -->
    <script src="/assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/assets/js/sidebarmenu.js"></script>
    <script src="/assets/js/datatables.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/assets/js/custom.js"></script>
    <!--This page JavaScript -->
    <script src="/assets/js/adminlte.js"></script>
   
    <script src="/assets/js/sweetalert2@11.js"></script>
    <script src="/assets/js/modal-works.js"></script>
</body>

</html>