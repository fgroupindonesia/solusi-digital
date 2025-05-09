<?php
$v = random_int(1, 100);
?>
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
    <title>Manage Virtual Visitors - Solusi Digital</title>
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
                        <h4 class="page-title">Management Virtual Visitors</h4>
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
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="container-fluid">
  <div class="d-md-flex align-items-start justify-content-between flex-wrap mb-3">
    <div class="mb-2 me-3">
      <h3 class="box-title mb-0">
        All Virtual Visitors (<?= $total_vvisitors ?>)
      </h3>
      <img id="management-loading" src="/assets/plugins/images/loading.gif" class="mt-2" />
    </div>

   <div class="col-md-3 col-sm-12">
  <div class="d-flex flex-column flex-sm-row flex-wrap align-items-start gap-2 ms-auto">
    <div class="d-flex flex-wrap gap-2">
      <a class="link-upload" href="/upload-data-virtualvisitors" data-entity="virtualvisitors" data-bs-toggle="modal" data-bs-target="#upload-virtualvisitors-form-modal">Upload</a>
      <a class="link-edit" href="/edit-data-virtualvisitors" data-entity="virtualvisitors">Edit</a>
      <a class="link-delete" href="/delete-data-virtualvisitors" data-entity="virtualvisitors">Delete</a>
      <a class="link-virtualvisitors-code" data-bs-toggle="modal" data-bs-target="#code-virtualvisitors-form-modal" href="/" data-entity="virtualvisitors">Code</a>
    </div>

   
  </div>
</div>

  </div>
</div>

                            <div class="table-responsive">
                                <table id="table-visitors" class="table no-wrap stripe">
                                    <thead>
                                        <tr>
                                            <th id="check-all" data-state="inactive" class="border-top-0">#</th>
                                            <th class="border-top-0">Client Name</th>
                                            <th class="border-top-0">Gender</th>
                                            <th class="border-top-0">City</th>
                                            <th class="border-top-0">Product Bought</th>
                                            <th class="border-top-0">URL</th>
                                            <th class="border-top-0">Theme</th>
                                             <?php if($role=='admin'): ?>
                                              <th class="border-top-0">Username</th>
                                            <?php endif; ?>
                                            <th class="border-top-0">Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                   <?php if (count($data_vvisitors) > 0): ?>                 
                  <?php foreach($data_vvisitors as $key): ?>

                                        <tr>
                                            <td><input type="checkbox" class="user-checked" data-id="<?= $key->id ?>" /></td>
                                            <td class="txt-oflo">
                                                <a href="#" data-id="<?= $key->id ?>" data-bs-toggle="modal" data-bs-target="#virtualvisitor-theme-modal">
                                             <?= $key->client_name ?>
                                         </a>
                                         </td>
                                            <td><?= $key->gender ?> </td>
                                            <td><?= $key->city ?> </td>
                                            <td><?= $key->product_bought ?> </td>
                                            <td><a href="<?= $key->product_url ?>">Link</a> </td>
                                            <td><?= $key->theme_display ?> </td>
                                            <?php if($role=='admin'): ?>
                                              <td><?= $key->username ?></td>
                                            <?php endif; ?>
                                            <td><span class="text-success"><?= $key->date_created ?></span></td>
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
                <?php include('modal_data_virtualvisitors_form.php'); ?>
                <?php include('modal_add_deposit_client.php'); ?>
                <?php include('modal_upload_virtualvisitors.php'); ?>
                <?php include('modal_code_virtualvisitors.php'); ?>
                <?php include('modal_change_virtualvisitors_theme.php'); ?>
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
     <script src="/assets/js/sweetalert2@11.js?v=<?=$v;?>"></script>
    <script src="/assets/js/app-style-switcher.js?v=<?=$v;?>"></script>
    <script src="/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js?v=<?=$v;?>"></script>
    <!--Wave Effects -->
    <script src="/assets/js/waves.js?v=<?=$v;?>"></script>
    <!--Menu sidebar -->
    <script src="/assets/js/sidebarmenu.js?v=<?=$v;?>"></script>
    <!--Custom JavaScript -->
    <script src="/assets/js/datatables.min.js?v=<?=$v;?>"></script>
    <script src="/assets/js/custom.js?v=<?=$v;?>"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
   
   
    <script src="/assets/js/modal-works.js?v=<?=$v;?>"></script>
</body>

</html>