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
                                <h3 class="box-title mb-0">Total Groups (<?= $total_wa_chat_rotator_groups ?>)</h3><br>
                                 <img id="management-loading" src="/assets/plugins/images/loading.gif" >

                            </div>

                           <div class="d-flex justify-content-start mb-3">
                                <a href="/manage-wa-chat-rotator">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa-brands fa-whatsapp"></i> Back to WA Chat Rotator
                                    </button>
                                </a>
                            </div>

                            <!-- start of table responsive -->
                            <div class="table-responsive">
                           
                            
                            <div class="container">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="chart-container">
                                            <h2 class="text-center">Ringkasan Jumlah Leads Tiap Grup</h2>
                                            <canvas id="clicksPerGroupChart"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row">
                                    Tampilkan Data Group :
                                    <select id="groupDistribusiFilter" class="form-select form-select-sm w-auto ms-3">
                                    <option value="">-- Pilih Salah Satu --</option>
                                    <?php if(!empty($data_wa_chat_rotator_groups)): ?>
                                    <?php foreach($data_wa_chat_rotator_groups as $dg): ?>
                                        <option value="<?= $dg->group_id; ?>"> <?= $dg->group_name;?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>    
                                    </select>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="chart-container">
                                            <h2 class="text-center">Distribusi <span id="jenis-distribusi-group"> </span> </h2>
                                            <canvas id="csDistributionChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="chart-container">
                                            <h2 class="text-center">Status Online CS</h2>
                                            <ul id="csStatusList" class="list-group list-group-flush">
                                                </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-end mb-3">
                                        <button id="wa-chat-rotator-btn-report" class="btn btn-danger btn-sm" style="display:none;color:white;"><i class="fa-solid fa-file-pdf"></i> Download Report </button>
                                        </div>
                                    </div>
                                </div>
                               

                            </div>


                            </div> <!-- end of table responsive -->
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/assets/js/wa-chat-rotator-analysis.js?v=<?=$v;?>"></script>
    <!--This page JavaScript -->
    
   
   
    
</body>

</html>