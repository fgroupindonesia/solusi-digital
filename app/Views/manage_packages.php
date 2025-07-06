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
                        <h4 class="page-title"><?= $page_name; ?></h4>
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
                <!-- All Packages  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">All Packages (<?= $total_packages ?>)</h3><br>
                                 <img id="management-loading" src="/assets/plugins/images/loading.gif" >

                                <select id="orderTypeFilter" class="form-select form-select-sm w-auto ms-3">
                                    <option value="all">-- Filter by Order Type --</option>
                                    <?php if(!empty($data_order_types)): ?>
                                    <?php foreach($data_order_types as $type) : ?>
                                       <option value="<?= $type->slug_name ?>"><?= ucwords($type->name) ?></option>
                                    <?php endforeach; ?>
                                    <?php endif;?>
                                </select>

                                <div class="col-md-4 col-sm-4 col-xs-6 ms-auto">
                                    
                                    <?php if($total_packages>0): ?>
                                    <a class="link-all" href="#" data-entity='packages'>Select All</a>
                                    <?php endif; ?>

                                  <a data-bs-toggle="modal" data-bs-target="#package-form-modal" class="link-add" id="link-add" href="/add-new-package">Add New</a>
                                    <a class="link-edit" href="/edit-package" data-entity='packages'>Edit</a>
                                    <a class="link-delete" href="/delete-package" data-entity='packages'>Delete</a>
                                   
                                </div>
                            </div>
                            <div class="table-responsive">
                           
               <?php if($total_packages != 0): ?>
<div class="row g-3">
    <?php foreach($data_packages as $package): ?>
        <div class="col-md-3 col-sm-6 mb-4 package-card" data-order-type="<?= $package->order_type ?>">

            <div class="card h-100 border-primary shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h5 class="card-title text-primary">
                            <i class="fas fa-box-open me-1"></i> <?= $package->name;?>
                        </h5>
                        <input type="checkbox" class="form-check-input package-checked mt-1"
                            data-id="<?= $package->id;?>" title="Select Package">
                    </div>

                    <div class="mt-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-semibold text-muted">Order Type:</span>
                            <span class="text-dark"><?= $package->order_type;?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-semibold text-muted">Base Price:</span>
                            <span class="text-success"><?= asCurrency($package->base_price);?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-semibold text-muted">Total Price:</span>
                            <span class="text-danger"><?= asCurrency($package->total_price);?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold text-muted">Quota:</span>
                            <span class="text-dark"><?= $package->quota;?></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>


                        </div>
                    </div>
                </div>
             
                <?php include('modal_setting_form.php'); ?>
                <?php include('modal_package_form.php'); ?>

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
    <script src="/assets/js/custom.js?v=<?=$v;?>"></script>
    <script src="/assets/js/modal-works.js?v=<?=$v;?>"></script>
    <script src="/assets/js/dropdown-filter-works.js?v=<?=$v;?>"></script>
    <script src="/assets/js/reader-night-mode.js?v=<?=$v;?>"></script>
    <!--This page JavaScript -->
    
   
   
    
</body>

</html>