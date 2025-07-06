    <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <hr>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link toggle-mode" href="#" 
                                aria-expanded="false">
                                <i class="fas fa-moon" aria-hidden="true"></i>
                                <span class="hide-menu">Reader Mode</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a data-bs-toggle="modal" data-bs-target="#setting-form-modal" class="sidebar-link waves-effect waves-dark sidebar-link" href="/settings"
                                aria-expanded="false">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                <span class="hide-menu">Settings</span>
                            </a>
                        </li>
                         <hr>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href=""
                                aria-expanded="false">
                                <span class="hide-menu">&gt; Pelayanan</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/order-jasa-digital-marketing"
                                aria-expanded="false">
                                <i class="fas fa-bullhorn" aria-hidden="true"></i>
                                <span class="hide-menu">Digital Marketing</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/order-pembuatan-app-web"
                                aria-expanded="false">
                               <i class="fas fa-laptop-code" aria-hidden="true"></i>
                                <span class="hide-menu"> Pembuatan App &amp; Web</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/order-jasa-lain"
                                aria-expanded="false">
                               <i class="fas fa-th-large" aria-hidden="true"></i>
                                <span class="hide-menu">Lainnya</span>
                            </a>
                        </li>

                        <hr>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href=""
                                aria-expanded="false">
                                <span class="hide-menu">&gt; Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-order-status"
                                aria-expanded="false">
                                <i class="fas fa-tasks" aria-hidden="true"></i>
                                <span class="hide-menu"> Status Order</span>
                            </a>
                        </li>
                         <?php if(!empty($data_apps)): ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-apps"
                                aria-expanded="false">
                                <i class="fa fa-desktop" aria-hidden="true"></i>
                                <span class="hide-menu"> Apps &amp; Web</span>
                            </a>
                        </li>
                          <?php endif; ?>
                        <?php if(!empty($data_wa_chat_rotator)): ?>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-wa-chat-rotator"
                                aria-expanded="false">
                                <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                <span class="hide-menu"> WA Rotator</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(!empty($data_vvisitors)): ?>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-virtualvisitors"
                                aria-expanded="false">
                               <i class="fas fa-bolt" aria-hidden="true"></i>
                                <span class="hide-menu"> Popup Sales Notif.</span>
                            </a>
                        </li>
                        <?php endif; ?>
                       
                       

                        

                        <?php if($role == 'admin'): ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-affiliate/products"
                                aria-expanded="false">
                                <i class="fa fa-tag" aria-hidden="true"></i>
                                <span class="hide-menu"> Products</span>
                            </a>
                        </li>    
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-users"
                                aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu"> Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-packages"
                                aria-expanded="false">
                                <i class="fa fa-box" aria-hidden="true"></i>
                                <span class="hide-menu"> Packages</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-themes"
                                aria-expanded="false">
                                <i class="fa fa-magic" aria-hidden="true"></i>
                                <span class="hide-menu"> Themes</span>
                            </a>
                        </li>
                       
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-deposits"
                                aria-expanded="false">
                                <i class="fa fa-money-check-alt" aria-hidden="true"></i>
                                <span class="hide-menu"> Deposits</span>
                            </a>
                        </li>
                        
                        <?php endif; ?>

                         <?php if($mode_affiliator === true): ?>
                            <hr>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href=""
                                aria-expanded="false">
                                <span class="hide-menu">&gt; Affiliate</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false" data-bs-toggle="modal" data-bs-target="#shopProfileModal">
                               <i class="fas fa-id-badge" aria-hidden="true"></i>
                                <span class="hide-menu"> Shop Profile</span>
                            </a>
                        </li>

                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-affiliate/orders"
                                aria-expanded="false" >
                               <i class="fas fa-receipt" aria-hidden="true"></i>
                                <span class="hide-menu"> Orderan Pelanggan</span>
                            </a>
                        </li>

                        <?php if(isset($affiliator_code)): ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/shop?reff=<?=$affiliator_code ?? '';?>"
                                aria-expanded="false" >
                               <i class="fas fa-store" aria-hidden="true"></i>
                                <span class="hide-menu"> Kunjungi Toko</span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php endif; ?>

                         <hr>

                          <?php if($role != 'admin'): ?>
                     
                        <li class="sidebar-item">
                            <a data-bs-toggle="modal" data-bs-target="#add-deposit-form-modal" class="sidebar-link waves-effect waves-dark sidebar-link" href="/add-deposit"
                                aria-expanded="false">
                                <i class="fa fa-wallet" aria-hidden="true"></i>
                                <span class="hide-menu">Setor Deposit</span>
                            </a>
                        </li>

                        <?php if($mode_affiliator === false): ?>
                        <li class="sidebar-item">
                            <a id="konfirmasi-affiliator" class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false">
                                <i class="fa fa-network-wired" aria-hidden="true"></i>
                                <span class="hide-menu">Mode Affiliator</span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php endif; ?>
                      
                      
                     
                        <li class="text-center p-20 upgrade-btn">
                            <a href="/logout"
                                class="btn d-grid btn-danger text-white" >
                                Logout</a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        