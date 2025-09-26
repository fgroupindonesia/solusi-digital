  <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="<?= $search_display ?> in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                       <div class="dropdown">
                          <a class="profile-pic btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                             <img src="/assets/plugins/images/users/<?= $propic ?>" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium"><?= $username ?></span>
                                    <input type="hidden" value="<?= $fullname; ?>" id="nav-fullname" >
                                    <input type="hidden" value="<?= $username; ?>" id="nav-username" >
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a data-bs-toggle="modal" data-bs-target="#setting-form-modal" class="dropdown-item" href="/settings">
                               <i class="fa fa-cog" aria-hidden="true"></i>
                                     <span class="hide-menu">Settings</span>
                            </a></li>
                           <li><a class="dropdown-item" href="/logout">
                               <i class="fa fa-times" aria-hidden="true"></i>
                                     <span class="hide-menu">Logout</span>
                            </a></li>


                          </ul>
                        </div>

                         <?php if($role != 'admin'): ?>
                       <div class="dropdown dropdown-bantuan">
                          <a class="dropdown-bantuan dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/images/info.png" alt="user-img" width="36" class="img-circle">
                            <span class="text-white font-medium">Bantuan</span>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            
                            <li>
                               <a href="#" id="wa-help-bantuan-teknis" data-phone="6285795569337" class="dropdown-item d-flex align-items-center" >
                                <i class="fab fa-whatsapp text-success me-2" aria-hidden="true"></i>
                                <span>Tim CS</span>
                              </a>
                            </li>

                            <li>
                              <a class="dropdown-item d-flex align-items-center" href="/#faq">
                                <i class="fa fa-question-circle text-primary me-2" aria-hidden="true"></i>
                                <span>FAQ</span>
                              </a>
                            </li>

                          </ul>
                        </div>
                    <?php endif; ?>


                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>