   <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #212359; color: #ffff">
       <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top" style="background-color: #212359; color: #ffff">
           NT-IT-EMS
       </div>
       <ul class="nav">

           <li class="nav-item nav-category">
               <span class="nav-link text-white">Navigation</span>
           </li>

           <li class="nav-item menu-items">
                   <a class="nav-link" href="index.php">
                       <span class="menu-icon" bg-light>
                           <i class="mdi mdi-speedometer"></i>
                       </span>
                       <span class="menu-title text-white">Dashboard</span>
                   </a>
               </li>

           <?php

            if ($userType === 'ICT') { ?>

               <li class="nav-item menu-items">
                   <a class="nav-link" href="addItem.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-laptop"></i>
                       </span>
                       <span class="menu-title text-white">Record Item</span>
                   </a>
               </li>

               <li class="nav-item menu-items">
                   <a class="nav-link" href="addproduct.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-laptop"></i>
                       </span>
                       <span class="menu-title text-white">Record Product</span>
                   </a>
               </li>
           <?php
            }
            if ($userType == 'super') { ?>

               <li class="nav-item menu-items">
                   <a class="nav-link" href="department.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-briefcase"></i>
                       </span>
                       <span class="menu-title text-white">Department</span>
                   </a>
               </li>
               <li class="nav-item menu-items">
                   <a class="nav-link" href="users.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-account-multiple"></i>
                       </span>
                       <span class="menu-title text-white">User Management</span>
                   </a>
               </li>
               <li class="nav-item menu-items">
                   <a class="nav-link" href="employee.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-account-multiple-plus"></i>
                       </span>
                       <span class="menu-title text-white">Employee</span>
                   </a>
               </li>
               <li class="nav-item menu-items">
                   <a class="nav-link" href="errorCode.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-settings"></i>
                       </span>
                       <span class="menu-title text-white">Error code</span>
                   </a>
               </li>
           <?php
            }
            ?>
            <li class="nav-item menu-items">
               <a class="nav-link" href="product.php">
                   <span class="menu-icon">
                       <i class="mdi mdi-table"></i>
                   </span>
                   <span class="menu-title text-white">Products</span>
               </a>
           </li>
           <li class="nav-item menu-items">
               <a class="nav-link" href="report.php">
                   <span class="menu-icon">
                       <i class="mdi mdi-table"></i>
                   </span>
                   <span class="menu-title text-white">Report</span>
               </a>
           </li>
           <li class="nav-item menu-items">
               <a class="nav-link" href="setting.php">
                   <span class="menu-icon">
                       <i class="mdi mdi-settings"></i>
                   </span>
                   <span class="menu-title text-white">Setting</span>
               </a>
           </li>
           <li class="nav-item menu-items">
               <a class="nav-link" href="../backend/logout.php?to=admin">
                   <span class="menu-icon">
                       <i class="mdi mdi-logout"></i>
                   </span>
                   <span class="menu-title text-white">Sign out</span>
               </a>
           </li>

           <!-- <li class="nav-item menu-items">
               <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                   <span class="menu-icon">
                       <i class="mdi mdi-laptop"></i>
                   </span>
                   <span class="menu-title">Basic UI Elements</span>
                   <i class="menu-arrow"></i>
               </a>

               <div class="collapse" id="ui-basic">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                   </ul>
               </div>
           </li> -->

       </ul>
   </nav>