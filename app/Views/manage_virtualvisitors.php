<?php
$v = random_int(1, 100);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include('container_header.php'); ?>
<link rel="stylesheet" href="/assets/virtualvisitors/themes/default.css" >

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
        Total Data Client: (<?= $total_vvisitors ?>)
      </h3>
      <img id="management-loading" src="/assets/plugins/images/loading.gif" class="mt-2" />
      <input type="hidden" id="vvisitors-order-id" value="<?= $order_id ?? '0';?>" >
      <input type="hidden" id="vvisitors-order-client-reff" value="<?= $order_client_reff ?? '0';?>" >
    </div>

 <div class="col-12 col-md-* d-flex justify-content-end flex-wrap gap-2">
  
     
   
     <a id="link-clear-all-virtualvisitors" href="#" class="btn btn-outline-secondary <?= $total_vvisitors > 0 ? '' : 'd-none'; ?>">Clear All</a>
    
      
     
      <a class="btn btn-outline-secondary link-virtualvisitors-code" 
         data-bs-toggle="modal" 
         data-bs-target="#code-virtualvisitors-form-modal" 
         href="/" 
         data-entity="virtualvisitors">
         Code
      </a>
    

    
      <a data-bs-toggle="modal" data-bs-target="#virtualvisitors-custom-modal" class="btn btn-outline-secondary link-virtualvisitors-custom">
        Message
      </a>
    

    
      <a id="link-test-virtualvisitors" href="#" class="<?= $total_vvisitors > 0 ? '' : 'd-none'; ?> btn btn-outline-secondary">Start Test</a>
    

  </div>
</div>

                            <div class="table-responsive">
                                
                                <section class="content pb-3">
      <div class="container-fluid h-100">
    <div class="row"> <div class="col-md-4"> <div class="card card-row card-default">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        Nama Client :
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-light card-outline">
                        <div class="card-header">
                            <p>Nama Client yang dipakai boleh nama singkat, ataupun nama lengkap.</p>
                        </div>
                        <div class="card-body">
                           <textarea id="vvisitors_name_clients" class="form-control" rows="7" placeholder="Masukkan daftar nama client, pisahkan dengan ENTER baris baru..."><?= $data_vvisitors_name_clients ?? ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div> <div class="col-md-4"> <div class="card card-row card-default">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        Nama Produk :
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-light card-outline">
                        <div class="card-header">
                           <p>Nama Produk ini menjadi fokus pemesanan produk tersebut.</p>
                        </div>
                        <div class="card-body">
                            <textarea id="vvisitors_name_products" class="form-control" rows="7" placeholder="Masukkan daftar nama produk, pisahkan dengan ENTER baris baru..."><?= $data_vvisitors_name_products ?? ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div> <div class="col-md-4"> <div class="card card-row card-default">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        Link Produk :
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-light card-outline">
                        <div class="card-header">
                             <p>Link yang ditulis akan disematkan pada setiap produk otomatis </p>
                        </div>
                        <div class="card-body">
                          <textarea id="vvisitors_link_products" class="form-control" rows="7" placeholder="Masukkan daftar link produk, pisahkan dengan ENTER baris baru..."><?= $data_vvisitors_link_products ?? ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div> </div> </div>
    </section>

                            </div>
                        </div>
                    </div>
             
                <?php include('modal_setting_form.php'); ?>
                <?php include('modal_data_virtualvisitors_form.php'); ?>
                <?php include('modal_add_deposit_client.php'); ?>
                <?php include('modal_code_virtualvisitors.php'); ?>
                <?php include('modal_message_virtualvisitors.php'); ?>
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
    <script src="/assets/js/reader-night-mode.js?v=<?=$v;?>"></script>
    <script src="/assets/js/ext-vvisitors.js?v=<?=$v;?>"></script>
</body>

</html>