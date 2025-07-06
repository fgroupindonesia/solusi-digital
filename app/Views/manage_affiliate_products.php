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
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">All Products </h3><br>
                                 <img id="management-loading" src="/assets/plugins/images/loading.gif" >
                                <div class="col-md-5 col-sm-4 col-xs-6 ms-auto text-right">
                       
                       <a class="link-add" id="link-add" data-bs-toggle="modal" data-bs-target="#product-affiliate-form-modal" href="#" data-entity='affiliate_products'>Add</a>
                       <a class="link-edit" href="#" data-entity='affiliate_products'>Edit</a>
                        <a class="link-delete" href="#" data-entity='affiliate_products'>Delete</a>
                      
                     
                                   
                                </div>
                            </div>
                            <div class="table-responsive">
                               <table id="table-order-jasa" class="table table-striped table-hover align-middle">
    <thead class="table-light">
        <tr>
            <th id="check-all" data-state="inactive">#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Base Price</th>
            <th>Status</th>
            <th>Commision Rate</th>
            <th>Image Galleries</th>
            <th>Date Created</th>
        </tr>
    </thead>
    <tbody>
       <?php if(isset($data_products)): ?>
        <?php foreach($data_products as $key): ?>
            <tr>
            <td><input type="checkbox" class="user-checked" data-id="<?= $key->id ?>" /></td>
            <td class="txt-oflo"> <?= $key->name ?></td>
            <td class="txt-oflo"> <?= $key->category ?></td>
            <td class="txt-oflo"> Link </td>
            <td class="txt-oflo"> <?= $key->base_price ?></td>
            <td class="txt-oflo"> <?= $key->status ?></td>
            <td class="txt-oflo"> <?= $key->admin_commission_rate ?></td>
            <td class="txt-oflo"> <a class="link-image-gallery" href="#" data-id="<?= $key->id ;?>" data-bs-toggle="modal" data-bs-target="#product-image-gallery-modal" > Manage </a> </td>
            <td class="txt-oflo"> <?= $key->date_created ?></td>
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
                <?php include('modal_add_deposit_client.php'); ?>
                <?php include('modal_affiliate_product.php'); ?>
                <?php include('modal_affiliate_product_image_galleries.php'); ?>
                <?php include('modal_affiliate_product_image_form.php'); ?>
                <?php include('modal_affiliate_product_image_cinema.php'); ?>
                
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
    <script src="/assets/js/datatables.min.js?v=<?=$v;?>"></script>
    <script src="/assets/js/custom.js?v=<?=$v;?>"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
   
   
    <script src="/assets/js/modal-works.js?v=<?=$v;?>"></script>
    <script src="/assets/js/affiliate-works.js?v=<?=$v;?>"> </script>
      <script src="/assets/js/reader-night-mode.js?v=<?=$v;?>"></script>
</body>

</html>