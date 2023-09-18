<?php
	class Profile extends DatabaseConfig {
		public function getUser($uid) {
			$fetchSql = "SELECT * FROM `users` WHERE `userId` = '$uid'";
            $fetchImageSql = "SELECT * FROM `profile_images` WHERE `userId` = '$uid'";
            $fetchUserDetailsSql = "SELECT * FROM `user_details` WHERE `userId` = '$uid'";

			      $fetchExe = $this->integrate()->query($fetchSql);
            $fetchImageExe = $this->integrate()->query($fetchImageSql);
            $fetchUserDetailsExe = $this->integrate()->query($fetchUserDetailsSql);

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

            if ($fetchUserDetailsExe->rowCount() > 0) {
                $get = $fetchUserDetailsExe->fetch(PDO::FETCH_ASSOC);
                $phoneNumber = $get['phoneNumber'];
                $address = $get['address'];
                $state = $get['state'];
                $zipcode = $get['zipcode'];
                $country = $get['country'];
                $language = $get['language'];
            } else {
                $phoneNumber = "";
                $address = "";
                $state = "";
                $zipcode = "";
                $country = "";
                $language = "";
            }
			echo '
            <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
               <img src="'.$image.'" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
            </div>
         </div>
         <hr class="my-0" />
         <div class="card-body">
         <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
               <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">User Name</label>
                  <input
                     class="form-control"
                     type="text"
                     id="firstName"
                     name="firstName"
                     value="'.$username.'"
                     autofocus
                     disabled
                     />
               </div>
               <div class="mb-3 col-md-6">
                  <label for="lastName" class="form-label">Full Name</label>
                  <input class="form-control" type="text" name="lastName" id="lastName" value="'.$fullname.'" disabled />
               </div>
               <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input
                     class="form-control"
                     type="text"
                     id="email"
                     name="email"
                     value="'.$email.'"
                     placeholder="john.doe@example.com"
                     disabled
                     />
                     ';

                     if ($emailStatus == "Unverified") {
                        echo '
                        <div class="mt-2">
                           
                              <button type="button" class="btn btn-danger">
                                 <span class="tf-icons bx bx-bug"></span>&nbsp; Unverified
                              </button>
                              
                                 <buttontype="button" class="btn btn-primary" data-bs-toggle="modal"
                                 data-bs-target="#validateModal'.$get['userId'].'">
                                    <span class="tf-icons bx bx-check-square"></span>&nbsp; Verify Now
                                 </button>
                              
                        </div>
                        ';
                     } else {
                        echo '
                        <div class="mt-2">
                           <form>
                              <a href="">
                                 <button type="button" class="btn btn-Success">
                                    <span class="tf-icons bx bx-check-square"></span>&nbsp; Verify Now
                                 </button>
                              </a>
                           </form>
                        </div>
                        ';
                     }

                     
                     echo '
               </div>
               <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                  <div class="input-group input-group-merge">
                     <span class="input-group-text">NP (+977)</span>
                     <input class="form-control" type="text" value="    '.$phoneNumber.'" disabled>
                  </div>
               </div>
               <div class="mb-3 col-md-6">
                  <label for="address" class="form-label">Address</label>
                  <input class="form-control" type="text" value="'.$address.'" disabled>
               </div>
               <div class="mb-3 col-md-6">
                  <label for="state" class="form-label">State</label>
                  <input class="form-control" type="text" value="'.$state.'" disabled>
               </div>
               <div class="mb-3 col-md-6">
                  <label for="zipCode" class="form-label">Zip Code</label>
                  <input class="form-control" type="text" value="'.$zipcode.'" disabled>
               </div>
               <div class="mb-3 col-md-6">
                  <label class="form-label" for="country">Country</label>
                  <input class="form-control" type="text" value="'.$country.'" disabled>
               </div>
               <div class="mb-3 col-md-6">
                  <label for="language" class="form-label">Language</label>
                  <input class="form-control" type="text" value="'.$language.'" disabled>
               </div>
            </div>
         </form>
         <!-- Modal -->
                        <div class="modal fade" id="validateModal'.$get['userId'].'" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Verify E-mail</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                              <p>Enter your E-mail Address to get E-mail verification link. We will provide the verification link to this email.</p>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Email Address</label>
                                    <input
                                      type="email"
                                      id="nameWithTitle"
                                      name="email"
                                      class="form-control"
                                      placeholder="Enter your email"
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Cancel
                                </button>
                                <button type="button" class="btn btn-primary">Get verification link</button>
                              </div>
                            </div>
                          </div>
                        </div>
            ';    
		}
	}
?>