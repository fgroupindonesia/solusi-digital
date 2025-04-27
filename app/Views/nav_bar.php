    <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <hr>
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
                                <span class="hide-menu">&gt; Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-apps"
                                aria-expanded="false">
                                <i class="fa fa-desktop" aria-hidden="true"></i>
                                <span class="hide-menu"> Apps</span>
                            </a>
                        </li>
                          <li class="sidebar-item">
                            <a class="sidebar-link maintenance-link waves-effect waves-dark sidebar-link" href="/manage-landingpage"
                                aria-expanded="false">
                                <i class="fa fa-hashtag" aria-hidden="true"></i>
                                <span class="hide-menu"> Landing Page</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-virtualvisitors"
                                aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu"> V.Visitors</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-socialmedia"
                                aria-expanded="false">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                <span class="hide-menu"> Social Media</span>
                            </a>
                        </li>
                          <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-layananmanual"
                                aria-expanded="false">
                                <i class="fa fa-concierge-bell" aria-hidden="true"></i>
                                <span class="hide-menu"> Layanan Manual</span>
                            </a>
                        </li>
                       
                        <?php if($role == 'admin'): ?>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/manage-order-jasa"
                                aria-expanded="false">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                                <span class="hide-menu"> Order Jasa</span>
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

                         <hr>

                          <?php if($role != 'admin'): ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/order-jasa"
                                aria-expanded="false">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                                <span class="hide-menu">Order Jasa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a data-bs-toggle="modal" data-bs-target="#add-deposit-form-modal" class="sidebar-link waves-effect waves-dark sidebar-link" href="/add-deposit"
                                aria-expanded="false">
                                <i class="fa fa-wallet" aria-hidden="true"></i>
                                <span class="hide-menu">Setor Deposit</span>
                            </a>
                        </li>
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

        