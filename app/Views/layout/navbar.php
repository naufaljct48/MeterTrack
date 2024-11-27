 <!-- Layout container -->
 <div class="layout-page">
     <!-- Navbar -->
     <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
         <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
             <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                 <i class="ti ti-menu-2 ti-md"></i>
             </a>
         </div>
         <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
             <ul class="navbar-nav flex-row align-items-center ms-auto">

                 <!-- Weather Notification -->
                 <li class="nav-item navbar-dropdown dropdown me-3 me-xl-2 position-relative">
                     <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                         <span class="position-relative">
                             <i id="weatherIcon" class="fas"></i>
                         </span>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end weather-dropdown">
                         <li>
                             <div class="weather-description p-3">
                                 <h6 id="weatherCondition" class="mb-2">Loading...</h6>
                                 <p id="temperatureText" class="mb-1">Loading...</p>
                                 <p id="weatherTime" style="display: none;">Just now</p>
                             </div>
                         </li>
                     </ul>
                 </li>
                 <!--/ Weather Notification -->

                 <!-- User -->
                 <li class="nav-item navbar-dropdown dropdown-user dropdown">
                     <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                         <div class="avatar avatar-online">
                             <img src="../../assets/img/avatars/1.png" alt class="rounded-circle">
                         </div>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end">
                         <li>
                             <a class="dropdown-item mt-0" href="pages-account-settings-account.html">
                                 <div class="d-flex align-items-center">
                                     <div class="flex-shrink-0 me-2">
                                         <div class="avatar avatar-online">
                                             <img src="../../assets/img/avatars/1.png" alt class="rounded-circle">
                                         </div>
                                     </div>
                                     <div class="flex-grow-1">
                                         <h6 class="mb-0"><?= session('user')['username']; ?></h6>
                                         <small class="text-muted"><?= session()->get('user')['role'] == '1' ? 'Admin' : (session()->get('user')['role'] == '2' ? 'Operator' : '') ?></small>
                                     </div>
                                 </div>
                             </a>
                         </li>
                         <li>
                             <div class="dropdown-divider my-1 mx-n2"></div>
                         </li>
                         <li>
                             <a class="dropdown-item" href="pages-profile-user.html">
                                 <i class="ti ti-user me-3 ti-md"></i><span class="align-middle">My Profile</span>
                             </a>
                         </li>
                         <li>
                             <a class="dropdown-item" href="pages-account-settings-account.html">
                                 <i class="ti ti-settings me-3 ti-md"></i><span class="align-middle">Settings</span>
                             </a>
                         </li>
                         <li>
                             <div class="d-grid px-2 pt-2 pb-1">
                                 <a class="btn btn-sm btn-danger d-flex" href="<?= base_url() ?>logout">
                                     <small class="align-middle">Logout</small>
                                     <i class="ti ti-logout ms-2 ti-14px"></i>
                                 </a>
                             </div>
                         </li>
                     </ul>
                 </li>
                 <!--/ User -->
             </ul>
         </div>

     </nav>

     <!-- / Navbar -->