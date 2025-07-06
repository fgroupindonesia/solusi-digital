<?php
$v = random_int(1, 100);

 // Contoh data PHP. Anda perlu mengganti ini dengan data aktual dari database Anda.
        $data_affiliate_sales = [
            (object)['invoice_number' => 'INV-2024001', 'product_name' => 'Baju Kemeja Pria', 'purchase_date' => '2024-06-01', 'quantity' => 2, 'selling_price' => 150000, 'commission' => 15000, 'customer_name' => 'Budi Santoso'],
            (object)['invoice_number' => 'INV-2024002', 'product_name' => 'Celana Jeans Wanita', 'purchase_date' => '2024-06-05', 'quantity' => 1, 'selling_price' => 200000, 'commission' => 20000, 'customer_name' => 'Siti Aminah'],
            (object)['invoice_number' => 'INV-2024003', 'product_name' => 'Sepatu Olahraga', 'purchase_date' => '2024-06-08', 'quantity' => 1, 'selling_price' => 350000, 'commission' => 35000, 'customer_name' => 'Agus Dharma'],
            (object)['invoice_number' => 'INV-2024004', 'product_name' => 'Tas Ransel', 'purchase_date' => '2024-06-10', 'quantity' => 1, 'selling_price' => 120000, 'commission' => 12000, 'customer_name' => 'Dewi Lestari'],
            (object)['invoice_number' => 'INV-2024005', 'product_name' => 'Jam Tangan Digital', 'purchase_date' => '2024-06-12', 'quantity' => 1, 'selling_price' => 250000, 'commission' => 25000, 'customer_name' => 'Rina Fitriani'],
        ];

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
                <?php if(!empty($data_affiliate_sales)): ?>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Semua Penjualan (<?= $total_sales ?>)</h3><br>
                                 <img id="management-loading" src="/assets/plugins/images/loading.gif" >
                                <div class="col-md-4 col-sm-4 col-xs-6 ms-auto">
                                  <a data-bs-toggle="modal" data-bs-target="#app-form-modal" class="link-add" id="link-add" href="/add-new-user">Cairkan Komisi</a>
                                    
                                    <a class="link-delete" href="/delete-user" data-entity='apps'>Batalkan</a>
                                   
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="table-affiliate-sales" class="table no-wrap">
    <thead>
        <tr>
            <th id="check-all-sales" data-state="inactive" class="border-top-0">#</th>
            <th class="border-top-0">No. Invoice</th>
            <th class="border-top-0">Nama Produk</th>
            <th class="border-top-0">Tgl. Pembelian</th>
            <th class="border-top-0">Quantity</th>
            <th class="border-top-0">Harga Terjual</th>
            <th class="border-top-0">Komisi</th>
            <th class="border-top-0">Nama Pelanggan</th>
        </tr>
    </thead>
    <tbody>
        <?php  if (count($data_affiliate_sales) > 0): ?>
            <?php foreach($data_affiliate_sales as $key): ?>
                <tr>
                    <td><input type="checkbox" class="sales-checked" data-id="<?= $key->invoice_number ?>" /></td>
                    <td class="txt-oflo"><?= $key->invoice_number ?></td>
                    <td><?= $key->product_name ?></td>
                    <td><?= $key->purchase_date ?></td>
                    <td class="txt-oflo"><?= $key->quantity ?></td>
                    <td class="txt-oflo">Rp <?= number_format($key->selling_price, 0, ',', '.') ?></td>
                    <td class="txt-oflo">Rp <?= number_format($key->commission, 0, ',', '.') ?></td>
                    <td><span class="text-success"><?= $key->customer_name ?></span></td>
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
                <?php endif; ?>

                <?php if(empty($data_affiliate_sales)): ?>
                    <div class="container">
                      <div class="row justify-content-center">
                        <div class="col-auto text-center">
                          <img src="/assets/images/no-access.png" class="img-fluid" alt="Centered Image" style="max-width: 200px;">
                        </div>
                      </div>
                    </div>
                <?php endif; ?>
             
                <?php include('modal_setting_form.php'); ?>
                <?php include('modal_add_deposit_client.php'); ?>
                <?php include('modal_wa_float.php'); ?>
                <?php include('modal_affiliate_shop_profile.php'); ?>

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
    <script src="/assets/js/datatables.min.js?v=<?=$v;?>"></script>
    <!--Custom JavaScript -->
    <script src="/assets/js/custom.js?v=<?=$v;?>"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
   
   
    <script src="/assets/js/modal-works.js?v=<?=$v;?>"></script>
</body>

</html>