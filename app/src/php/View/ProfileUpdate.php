<?php
	class ProfileUpdate extends DatabaseConfig {
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
            <form id="formAccountSettings" action="src/php/ProfileAdapter.php" method="POST" enctype="multipart/form-data">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="'.$image.'"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              name="img"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">User Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="username"
                              value="'.$username.'"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Full Name</label>
                            <input class="form-control" type="text" name="fullname" id="lastName" value="'.$fullname.'" />
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
                            />
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">NP (+977)</span>
                              <input
                                type="text"
                                id="phoneNumber"
                                name="phonenumber"
                                class="form-control"
                                value="'.$phoneNumber.'"
                                placeholder="202 555 0111"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="'.$address.'" placeholder="Address" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">State</label>
                            <input class="form-control" type="text" id="state" name="state" value="'.$state.'" placeholder="California" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input
                              type="text"
                              class="form-control"
                              id="zipCode"
                              name="zipcode"
                              value="'.$zipcode.'"
                              placeholder="231465"
                              maxlength="6"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Country</label>
                            <select id="country" name="country" value="'.$country.'" class="select2 form-select">
                              <option value="">Select</option>
                              <option value="Australia">Australia</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="Belarus">Belarus</option>
                              <option value="Brazil">Brazil</option>
                              <option value="Canada">Canada</option>
                              <option value="China">China</option>
                              <option value="France">France</option>
                              <option value="Germany">Germany</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Japan">Japan</option>
                              <option value="Korea">Korea, Republic of</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Nepal">Nepal</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Russia">Russian Federation</option>
                              <option value="South Africa">South Africa</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States">United States</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Language</label>
                            <select id="language" name="language" value="'.$language.'" class="select2 form-select">
                              <option value="">Select Language</option>
                              <option value="English">English</option>
                              <option value="French">French</option>
                              <option value="Nepali">Nepali</option>
                            </select>
                          </div>
                       
                          
                          
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="update-profile" value="'.$get['userId'].'" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      
                    </div>
                    </form>
			';
		}
	}
?>