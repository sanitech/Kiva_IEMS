   <nav class="navbar p-0 fixed-top d-flex flex-row" style="background-color: #212359; color: #ffff">
       <!--<div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center" style="background-color: #212359; color: #ffff">
           <a class="navbar-brand brand-logo-mini" href="index.php">IEMS</a>
       </div> -->
       <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
           <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
               <span class="mdi mdi-menu"></span>
           </button>

           <ul class="navbar-nav navbar-nav-right">


               <!-- <li class="nav-item dropdown border-left">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="count bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Event today</p>
                                <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Settings</p>
                                <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-link-variant text-warning"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Launch Admin</p>
                                <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <p class="p-3 mb-0 text-center">See all notifications</p>
                    </div>
                </li> -->
               <li class="nav-item dropdown">
                   <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                       <div class="navbar-profile">
                           <?php
                            if ($userInfo['profile']) {
                                echo '<img class="img-xs rounded-circle" src="' . $userInfo['profile'] . '" alt="">';
                            } else {
                                $words = explode(" ", $userInfo['username']);
                                $fullName = "";

                                foreach ($words as $w) {
                                    $fullName .= mb_substr($w, 0, 1);
                                }
                                
                            ?>
                                <div class="img-xs rounded-circle no-profile bg-light text-danger text-center">
                                    <h4 style="margin-top: 8px;"><?php echo strtoupper($fullName); ?></h4>
                                </div>
                           <?php
                            }

                            ?>

                           <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo ucwords($userInfo['username']); ?></p>
                           <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                       </div>
                   </a>
                   <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown" style="background-color: #212359; color: #ffff">
                       <h6 class="p-3 mb-0">Profile</h6>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item preview-item" href="setting.php">
                           <div class="preview-thumbnail">
                               <div class="preview-icon bg-light rounded-circle">
                                   <i class="mdi mdi-settings text-success"></i>
                               </div>
                           </div>
                           <div class="preview-item-content">
                               <p class="preview-subject mb-1">Settings</p>
                           </div>
                       </a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item preview-item" href="../backend/logout.php?to=admin">
                           <div class="preview-thumbnail">
                               <div class="preview-icon bg-light rounded-circle">
                                   <i class="mdi mdi-logout text-danger"></i>
                               </div>
                           </div>
                           <div class="preview-item-content">
                               <p class="preview-subject mb-1">Sign out</p>
                           </div>
                       </a>

                   </div>
               </li>
           </ul>
           <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
               <span class="mdi mdi-format-line-spacing"></span>
           </button>
       </div>
   </nav>