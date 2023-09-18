<?php
    class Nav extends DatabaseConfig {

        public function getUser($uid) {

            $fetchSql = "SELECT * FROM `users` WHERE `userId` = '$uid'";
            $fetchImageSql = "SELECT * FROM `profile_images` WHERE `userId` = '$uid'";

            $fetchExe = $this->integrate()->query($fetchSql);
            $fetchImageExe = $this->integrate()->query($fetchImageSql);

            if ($fetchExe->rowCount() > 0) {
                $get = $fetchExe->fetch(PDO::FETCH_ASSOC);
                $username = $get['username'];
                $email = $get['email'];
                $fullname = $get['fullname'];
                $emailStatus = $get['emailStatus'];
              } else {
                $username = "";
                $email = "";
                $fullname = "";
              }

            if ($fetchImageExe->rowCount() > 0) {
                $get = $fetchImageExe->fetch(PDO::FETCH_ASSOC);
                $imageName = $get['imageName'];

                if ($imageName !== "") {
                  $image = "./src/profile/".$username."/".$get['imageName'];
                } else {
                  $image = "./src/assets/img/avatars/Avatar.jpg";
                }
            } else {
                $image = "./src/assets/img/avatars/Avatar.jpg";
            }

            echo '
            <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                           <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                              <div class="avatar avatar-online">
                                 <img src="'.$image.'" alt class="w-px-40 h-auto rounded-circle" />
                              </div>
                           </a>
                           <ul class="dropdown-menu dropdown-menu-end">
                              <li>
                                 <a class="dropdown-item" href="#">
                                    <div class="d-flex">
                                       <div class="flex-shrink-0 me-3">
                                          <div class="avatar avatar-online">
                                             <img src="'.$image.'" alt class="w-px-40 h-auto rounded-circle" />
                                          </div>
                                       </div>
                                       <div class="flex-grow-1">
                                          <span class="fw-semibold d-block">'.$username.'</span>
                                          <span class="badge bg-success"><i class="bx bx-check"></i> KQ User</span>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <div class="dropdown-divider"></div>
                              </li>
                              <li>
                                 <a class="dropdown-item" href="profile">
                                 <i class="bx bx-user me-2"></i>
                                 <span class="align-middle">My Profile</span>
                                 </a>
                              </li>
                              <li>
                                 <a class="dropdown-item" href="account-settings">
                                 <i class="bx bx-cog me-2"></i>
                                 <span class="align-middle">Settings</span>
                                 </a>
                              </li>
                              
                              <li>
                                 <div class="dropdown-divider"></div>
                              </li>
                              <li>
                                 <a class="dropdown-item" href="src/php/Logout.php">
                                 <i class="bx bx-power-off me-2"></i>
                                 <span class="align-middle">Log Out</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <!--/ User -->
            ';
        }
    }
?>