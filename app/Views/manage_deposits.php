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
                        <h4 class="page-title">Management Deposits</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li>Saldo Terkumpul Bulan ini : <strong><?= $monthly_balance; ?></strong></li>
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
               
               <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon">
                <i class="fas fa-money-bill-wave"></i>
              </span>

              <div class="info-box-content">
                <span class="info-box-text">Total Cash (purchased)</span>
                <span class="info-box-number"><?= $total_deposit_purchased; ?></span>

                <div class="progress">
                  <div class="progress-bar" style="width: <?= $percent_cash_purchased;?>"></div>
                </div>
                <span class="progress-description">
                  <?= $percent_cash_purchased;?> ok
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon">
                <i class="fas fa-hourglass-half"></i>
            </span>

              <div class="info-box-content">
                <span class="info-box-text">Total Cash (pending)</span>
                <span class="info-box-number"><?= $total_deposit_pending; ?></span>

                <div class="progress">
                  <div class="progress-bar" style="width: <?= $percent_cash_pending;?>"></div>
                </div>
                <span class="progress-description">
                  <?= $percent_cash_pending;?> belum
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fas fa-credit-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Purchased Deposit</span>
                <span class="info-box-number"><?= $total_deposit_purchased_count; ?>
                    <?= ($total_deposit_purchased_count > 1) ? ' items' : ' item'; ?>
                </span>

                <div class="progress">
                  <div class="progress-bar" style="width: <?= $percent_purchased;?>"></div>
                </div>
                <span class="progress-description">
                  <?= $percent_purchased;?> Profit
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fas fa-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending Deposit</span>
                <span class="info-box-number"><?= $total_deposit_pending_count; ?>
                    <?= ($total_deposit_pending_count > 1) ? ' items' : ' item'; ?>
                </span>

                <div class="progress">
                  <div class="progress-bar" style="width: <?= $percent_pending;?>"></div>
                </div>
                <span class="progress-description">
                  <?= $percent_pending;?> Stagnan
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
               
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                           <div class="d-md-flex mb-3">
    <h3 class="box-title mb-0">All Deposits (<?= $total_deposits ?>)</h3><br>
    <img id="management-loading" src="/assets/plugins/images/loading.gif" >
    <div class="col-md-4 col-sm-4 col-xs-6 ms-auto">
        <a data-bs-toggle="modal" data-bs-target="#add-deposit-admin-form-modal" class="link-add" id="link-add" href="/add-new-deposit">Add New</a>
        <span class="mx-2">|</span>
        <a class="link-edit" href="/edit-deposit" data-entity='deposits'>Edit</a>
        <span class="mx-2">|</span>
        <a class="link-delete" href="/delete-deposit" data-entity='deposits'>Delete</a>
    </div>
</div>

<!-- Bulk Action Section -->
<div class="bulk-actions-wrapper border rounded p-3 mt-3 bg-light shadow-sm">
  <div class="row g-3 align-items-center">
    <div class="col-12 col-md">
      
    </div>
    <div class="col-12 col-md-auto d-flex align-items-center gap-2">
      <label for="bulk-action-select" class="form-label mb-0">Apply Bulk Action:</label>
      <span class="mx-2">|</span>
      <select id="" class="bulk-action-select form-select form-select-sm">
        <option value="">-- Choose Action --</option>
        <option value="pending">Pending</option>
        <option value="purchased">Purchased</option>
        <option value="cancel">Cancel</option>
      </select>
    </div>
    <div class="col-12 col-md-auto">
      <button  class="btn-apply-bulk btn btn-sm btn-primary">
        Apply
      </button>
    </div>
  </div>
</div>

                           <div class="table-responsive">
  <table id="table-deposits" data-entity="deposits" class="table table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th id="check-all" data-state="inactive">#</th>
        <th>Username</th>
        <th>Status</th>
        <th>Amount</th>
        <th>Date Created</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($data_deposits) > 0): ?>                 
        <?php foreach($data_deposits as $key): ?>
          <tr>
            <td><input type="checkbox" class="form-check-input user-checked" data-id="<?= $key->id ?>" /></td>
            <td><?= $key->username ?></td>
            <td>
              <?php 
                $status = strtolower($key->status);
                $badgeClass = 'secondary';
                if ($status == 'pending') $badgeClass = 'warning';
                elseif ($status == 'approved' || $status == 'purchased') $badgeClass = 'success';
                elseif ($status == 'cancel' || $status == 'rejected') $badgeClass = 'danger';
              ?>
              <span class="badge bg-<?= $badgeClass ?>"><?= ucfirst($key->status) ?></span>
            </td>
            <td><?= $key->amount ?></td>
            <td><span class="text-success"><?= $key->date_created ?></span></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- Bulk Action Section -->
<div class="bulk-actions-wrapper border rounded p-3 mt-3 bg-light shadow-sm">
  <div class="row g-3 align-items-center">
    <div class="col-12 col-md">
      <span class="fw-semibold">
        Selected: <span id="active-checked" class="text-primary">0</span> data
      </span>
    </div>
    <div class="col-12 col-md-auto">
      <div class="d-flex align-items-center gap-2">
        <label for="bulk-action-select" class="form-label mb-0">Apply Bulk Action:</label>
        <select class="bulk-action-select form-select form-select-sm">
          <option value="">-- Choose Action --</option>
          <option value="pending">Pending</option>
          <option value="purchased">Purchased</option>
          <option value="cancel">Cancel</option>
        </select>
      </div>
    </div>
    <div class="col-12 col-md-auto">
      <button class="btn-apply-bulk btn btn-sm btn-primary">
        Apply
      </button>
    </div>
  </div>
</div>


                        </div>
                    </div>
                </div>
             
                <?php include('modal_setting_form.php'); ?>
                <?php include('modal_add_deposit_admin.php'); ?>

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
      <script src="/assets/js/reader-night-mode.js?v=<?=$v;?>"></script>
</body>

</html>