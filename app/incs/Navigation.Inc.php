<!-- Layout container -->
<div class="layout-page">
               <!-- Navbar -->
               <nav
                  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                  id="layout-navbar"
                  >
                  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                     <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                     <i class="bx bx-menu bx-sm"></i>
                     </a>
                  </div>
                  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                     
                     <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <li class="nav-item lh-1 me-3">
                           <button type="button" class="btn btn-primary">
                              Notifications
                              <span class="badge bg-white text-primary">4</span>
                            </button>
                        </li>
                        
                        <?php
                           $user_nav = new Nav();
                           $user_nav->getUser($user_id);
                        ?>

                     </ul>
                  </div>
               </nav>
               <!-- / Navbar -->