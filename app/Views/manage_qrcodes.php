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
                        <h4 class="page-title">Management QR-Codes</h4>
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
                                <h3 class="box-title mb-0">All QR-Codes (<?= $total_qrcode ?>)</h3><br>
                                 
                                <div class="col-md-4 col-sm-4 col-xs-6 ms-auto">
                                  <a data-bs-toggle="modal" data-bs-target="#user-form-modal" class="link-add" id="link-add" href="/add-new-user">Add New</a>
                                    <a class="link-edit" href="/edit-user" data-entity='users'>Edit</a>
                                    <a class="link-delete" href="/delete-user" data-entity='users'>Delete</a>
                                   
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="table-users" class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th id="check-all" data-state="inactive" class="border-top-0">#</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Whatsapp</th>
                                            <th class="border-top-0">Sex</th>
                                            <th class="border-top-0">Date Created</th>
                                            <th class="border-top-0">Email Activation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                   <?php if (isset($data_users)): ?>                 
                  <?php foreach($data_users as $key): ?>

                                        <tr>
                                            <td><input type="checkbox" class="user-checked" data-id="<?= $key->id ?>" /></td>
                                            <td class="txt-oflo"> <?= $key->username ?></td>
                                            <td><?= $key->email ?>
                                            </td>
                                            <td class="txt-oflo"><?= $key->whatsapp ?></td>
                                              <td class="txt-oflo"><?= $key->sex ?></td>
                                            <td><span class="text-success"><?= $key->date_created ?></span></td>
                                            <td>
                    <a href="#" data-id="<?= $key->id ?>" class="activation-user-email btn d-grid btn-warning text-white">
                                Send</a>
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
                <?php include('modal_qrcode_form.php'); ?>

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
    <script src="/assets/js/datatables.min.js?v=<?=$v;?>"></script>
    <!--Custom JavaScript -->
    <script src="/assets/js/custom.js?v=<?=$v;?>"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
   
   
    <script src="/assets/js/modal-works.js?v=<?=$v;?>"></script>
    <script src="/assets/js/reader-night-mode.js?v=<?=$v;?>"></script>
</body>

</html>