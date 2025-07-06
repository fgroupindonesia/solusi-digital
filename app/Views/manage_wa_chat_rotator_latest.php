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
                        <h4 class="page-title">Management WA Chat Rotator</h4>
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
                                <h3 class="box-title mb-0">WA Chat Rotator (<?= $data_wa_chat_rotator[0]->package; ?>)</h3><br>
                                
                            </div>
                          
                              
                  <!-- bagian center tengan konten -->
                    <div class="row">
                        <div class="col-md-12">
                                   <div class="d-flex justify-content-end mb-3">
                                   
                                <a href="/manage-wa-chat-rotator/analysis">
                                    <button class="btn btn-secondary btn-sm">
                                        <i class="fas fa-chart-line me-2"></i>Analisis
                                    </button>
                                </a>
                                <button id="btn-add-group" class="btn btn-primary">+ Tambah Group</button>
                            </div>

        <!-- Container utama untuk group -->
        <div id="group-container">
            <!-- Group akan ditambahkan di sini -->
            <?php if(!empty($data_group_and_cs)): ?>
            <?php foreach ($data_group_and_cs as $group): ?>
    <div class="group-item card p-3 mb-4 shadow-sm" data-group-id="<?= $group->id ;?>">
        <input type="hidden" class="group-order-id" value="<?= $group->order_id; ?>">
        <input type="hidden" class="group-country" value="<?= $group->country; ?>">
        <input type="hidden" class="group-city" value="<?= $group->city; ?>">
        <input type="hidden" class="group-region" value="<?= $group->region; ?>">

        <div class="row mb-3">
            <div class="col-md-4">
                <label><strong>Nama Grup</strong></label>
                <input type="text" class="form-control group-name" value="<?= $group->nama; ?>">
            </div>
            <div class="col-md-3">
                <label><strong>Distribusi</strong></label>
                <select class="form-control group-distribusi">
                    
                    <option value="random" <?= $group->distribusi == 'random' ? 'selected' : ''; ?>>Random</option>
                    <option value="order" <?= $group->distribusi == 'order' ? 'selected' : ''; ?>>Berdasarkan Urutan</option>
                    <option value="device" <?= $group->distribusi == 'device' ? 'selected' : ''; ?>>Berdasarkan Device</option>
                    <option value="origin" <?= $group->distribusi == 'origin' ? 'selected' : ''; ?>>Berdasarkan Kota</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn-set-wa-chat-rotator-message  btn btn-primary" data-bs-toggle="modal" data-bs-target="#wa-chat-rotator-custom-modal" data-code-reff="<?= $group->group_code_reff; ?>" >
                                    <i class="fas fa-comment-dots me-2"></i> Set Message
                                </button>
            </div>

        </div>

                <div class="row mb-3 device-options <?= $group->distribusi == 'device' ? '' : 'd-none'; ?>">
                    <div class="col-md-12">
                        <label><strong>Pilih Device</strong></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input device-android" name="device" type="radio" <?= $group->client_target_device == 'android' ? 'checked' : ''; ?> value="android">
                            <label class="form-check-label" for="device-android">
                                <i class="fab fa-android"></i> Android
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input device-iphone" name="device" type="radio" <?= $group->client_target_device == 'iphone' ? 'checked' : ''; ?> value="iphone">
                            <label class="form-check-label" for="device-iphone">
                                <i class="fab fa-apple"></i> iPhone
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input device-laptop" name="device" type="radio" <?= $group->client_target_device == 'laptop' ? 'checked' : ''; ?> value="laptop">
                            <label class="form-check-label" for="device-laptop">
                                <i class="fas fa-laptop"></i> Laptop
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input device-all" name="device" type="radio" <?= $group->client_target_device == 'all' ? 'checked' : ''; ?> value="all">
                            <label class="form-check-label" for="device-all">
                                <i class="fas fa-globe"></i> All
                            </label>
                        </div>
                    </div>
                </div>

        <hr>
        <div class="cs-list">
            <?php if(!empty($group->cs_list)): ?>
            <?php foreach ($group->cs_list as $cs): ?>
                <div data-cs-id="<?= $cs->id; ?>" class="cs-item row align-items-center mb-2 p-2 border rounded">
                    <div class="col-md-3">
                        <input type="text" class="form-control form-control-sm cs-name" value="<?= $cs->cs_nama; ?>" placeholder="Nama">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control form-control-sm cs-phone" value="<?= $cs->cs_number; ?>" placeholder="08123456">
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">

                            <input type="checkbox" class="form-check-input cs-status" <?= ($cs->cs_status=='enabled') ? 'checked' : '' ?> >
                            <label class="form-check-label">Aktif</label>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <button data-cs-id="<?= $cs->id ;?>" data-cs-name="<?= $cs->cs_nama ;?>" class="btn btn-outline-secondary btn-sm me-2 btn-wa-schedule" data-bs-toggle="modal" data-bs-target="#wa-chat-rotator-schedule-modal">
                            <i class="fas fa-calendar-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm btn-delete-cs">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-between mt-3">
    <button class="btn-add-cs btn btn-primary btn-sm">+ Tambah CS</button>
    <div class="d-flex"> <button class="btn-delete-group btn btn-danger btn-sm me-2"> <i class="fas fa-trash"></i> Delete Group
        </button>
        <button data-code-reff="<?= $group->group_code_reff ?? ''; ?>" data-client-reff="<?= !empty($data_orderan_latest->order_client_reff) ? $data_orderan_latest->order_client_reff : ''; ?>" data-bs-toggle="modal" data-bs-target="#wa-chat-rotator-script-modal" class="btn-ambil-code-wa-chat-rotator btn btn-success">Generate Code</button>
    </div>
</div>
    </div>
<?php endforeach; ?>
<?php endif; ?>

        </div>

        <!-- Group Template (hidden) -->
        <div id="template-group" class="d-none">
            <div class="group-item card p-3 mb-4 shadow-sm">
                <input type="hidden" class="group-order-id" value="<?= $data_orderan_latest->order_id; ?>">
                <input type="hidden" class="group-country" >
                <input type="hidden" class="group-city" >
                <input type="hidden" class="group-region" >

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label><strong>Nama Grup</strong></label>
                        <input type="text" class="form-control group-name" value="">
                    </div>
                    <div class="col-md-3">
                        <label><strong>Distribusi</strong></label>
                        <select class="form-control group-distribusi">
                            
                            <option value="random">Random</option>
                            <option value="order">Berdasarkan Urutan</option>
                            <option value="device">Berdasarkan Device Pelanggan</option>
                            <option value="origin">Berdasarkan Kota Pelanggan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                <button class="d-none btn-set-wa-chat-rotator-message  btn btn-primary" data-bs-toggle="modal" data-bs-target="#wa-chat-rotator-custom-modal" data-code-reff="" >
                                    <i class="fas fa-comment-dots me-2"></i> Set Message
                                </button>
            </div>
                </div>

                <div class="row mb-3 device-options d-none">
                    <div class="col-md-12">
                        <label><strong>Pilih Device</strong></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input device-android" name="device" type="radio"  value="android">
                            <label class="form-check-label" for="device-android">
                                <i class="fab fa-android"></i> Android
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input device-iphone" name="device" type="radio"  value="iphone">
                            <label class="form-check-label" for="device-iphone">
                                <i class="fab fa-apple"></i> iPhone
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input device-laptop" name="device" type="radio"  value="laptop">
                            <label class="form-check-label" for="device-laptop">
                                <i class="fas fa-laptop"></i> Laptop
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input device-all" name="device" type="radio"  value="all">
                            <label class="form-check-label" for="device-all">
                                <i class="fas fa-globe"></i> All
                            </label>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Container untuk daftar CS -->
                <div class="cs-list">
                    <!-- CS akan ditambahkan di sini -->
                </div>

                <div class="d-flex justify-content-between mt-3">
    <button class="btn-add-cs btn btn-primary btn-sm">+ Tambah CS</button>
    <div class="d-flex"> <button class="btn-delete-group btn btn-danger btn-sm me-2"> <i class="fas fa-trash"></i> Delete Group
        </button>
        <button data-code-reff="" data-client-reff="<?= !empty($data_orderan_latest->order_client_reff) ? $data_orderan_latest->order_client_reff : ''; ?>" data-bs-toggle="modal" data-bs-target="#wa-chat-rotator-script-modal" class="btn-ambil-code-wa-chat-rotator btn btn-success">Generate Code</button>
    </div>
</div>
            </div>
        </div>

        <!-- CS Template (hidden) -->
        <div id="template-cs" class="d-none">
            <div class="cs-item row align-items-center mb-2 p-2 border rounded">
                <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm cs-name" placeholder="Nama">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control form-control-sm cs-phone" placeholder="08123456">
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input cs-status" checked>
                        <label class="form-check-label">Aktif</label>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                     <button data-cs-id="" data-cs-name="" class="btn btn-outline-secondary btn-sm me-2 btn-wa-schedule" data-bs-toggle="modal" data-bs-target="#wa-chat-rotator-schedule-modal">
                            <i class="fas fa-calendar-alt"></i>
                        </button>
                    <button class="btn btn-danger btn-sm btn-delete-cs">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- template data -->

<div class="row">
    <div class="col-md-12">
        <div class="card p-3 mb-4 shadow-sm">

            <!-- Group Template (hidden) -->
            <div id="template-group" class="d-none">
                <div class="group-item mb-3 p-3 border rounded">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label><strong>Nama Grup</strong></label>
                            <input type="text" class="form-control group-name" value="" >
                        </div>
                        <div class="col-md-3">
                            <label><strong>Distribusi</strong></label>
                            <select class="form-control group-distribusi" >
                                <option value="random">Random</option>
                                <option value="order">Berdasarkan Urutan</option>
                                <option value="device">Berdasarkan Device Pelanggan</option>
                                <option value="origin">Berdasarkan Kota Pelanggan</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                <button class="btn-set-wa-chat-rotator-message  btn btn-primary" data-bs-toggle="modal" data-bs-target="#wa-chat-rotator-custom-modal" data-code-reff="" >
                                    <i class="fas fa-comment-dots me-2"></i> Set Message
                                </button>
            </div>
                       
                    </div>

                    <!-- Container CS di dalam group -->
                    <div class="cs-list">
                        <!-- CS akan ditambah disini -->
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <button class="btn btn-primary btn-sm btn-add-cs">+ Tambah CS</button>
                    </div>
                </div>
            </div>

            <!-- CS Template (hidden) -->
            <div id="template-cs" class="d-none">
                <div class="cs-item row align-items-center mb-2 p-2 border rounded">
                    <div class="col-md-3">
                        <input type="text" class="form-control form-control-sm cs-name" placeholder="Nama" value="" >
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control form-control-sm cs-phone" placeholder="08123456" value="" >
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input cs-status" checked>
                            <label class="form-check-label">Aktif</label>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <button data-cs-id="" data-cs-name="" class="btn btn-outline-secondary btn-sm me-2 btn-wa-schedule" data-bs-toggle="modal" data-bs-target="#wa-chat-rotator-schedule-modal">
                            <i class="fas fa-calendar-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm btn-delete-cs">
                            <i class="fas fa-trash"></i> Delete CS
                        </button>
                    </div>
                </div>
            </div>

            <!-- Container utama untuk group -->
            <div id="group-container">
                <!-- Kalau mau ada group awal bisa isi disini -->
            </div>

            

        </div>
    </div>
</div>


<!-- template portion -->                                   
                              
                           
                        </div>
                    </div>
                </div>
             
                <?php include('modal_setting_form.php'); ?>
                <?php include('modal_wa_chat_rotator.php'); ?>
                <?php include('modal_wa_chat_rotator_script.php'); ?>
                <?php include('modal_wa_chat_rotator_custom.php'); ?>
                <?php include('modal_wa_chat_rotator_wizard.php'); ?>
                <?php include('modal_wa_chat_rotator_region.php'); ?>
                <?php include('modal_wa_chat_rotator_schedule.php'); ?>
                <?php include('modal_wa_float.php'); ?>
                <?php include('modal_affiliate_shop_profile.php'); ?>
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
    <script src="/assets/plugins/bower_components/jquery/dist/jquery.min.js?v=<?=$v;?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/plugins/bower_components/popper.js/dist/umd/popper.min.js?v=<?=$v;?>"></script>
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
    <script src="/assets/js/adminlte.js?v=<?=$v;?>"></script>
   
    <script src="/assets/js/sweetalert2@11.js?v=<?=$v;?>"></script>
    <script src="/assets/js/modal-works.js?v=<?=$v;?>"></script>
    <script src="/assets/js/ext-wa-chat-rotator.js?v=<?=$v;?>"></script>
    <script src="/assets/js/reader-night-mode.js?v=<?=$v;?>"></script>

</body>

</html>