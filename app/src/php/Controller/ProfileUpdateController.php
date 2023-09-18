<?php
    class ProfileUpdateController extends ProfileUpdateModel {

        private $userId;
        private $image;
        private $imageName;
        private $imageType;
        private $imageSize;
        private $imageTempName;
        private $destinationDirectory;
        private $fullname;
		private $username;
		private $email;
        private $phoneNumber;
        private $address;
        private $state;
        private $zipcode;
        private $country;
        private $language;
		private $updateDate;
		private $path;
        private $rootDir;
        private $newDir;

        public function __construct($image, $user_id, $image_name, $image_type, $image_size, $image_tmp_name, $fullname, $username, $email, $phonenumber, $address, $state, $zipcode, $country, $language, $update_date)
        {
            $this->rootDir = "../profile/";
            $this->newDir = $this->rootDir.$username;
            $this->userId = $user_id;
            $this->image = $image;
            $this->imageName = $image_name;
            $this->imageType = $image_type;
            $this->imageSize = $image_size;
            $this->imageTempName = $image_tmp_name;
            $this->destinationDirectory = $this->newDir."/".$image_name;
            $this->fullname = $fullname;
            $this->username = $username;
            $this->email = $email;
            $this->phoneNumber = $phonenumber;
            $this->address = $address;
            $this->state = $state;
            $this->zipcode = $zipcode;
            $this->country = $country;
            $this->language = $language;
            $this->updateDate = $update_date;
            $this->path = "Location: ../../account-settings";
        }

        public function expandUser() {

			$this->validateCoreComponents();

            $this->validateProfileImage();

            if ($this->checkUser() == false) {
                header($this->path."?msg=user_already_exists");
                exit();
            }

			$this->amendUser($this->userId, $this->imageName, $this->fullname, $this->username, $this->email, $this->phoneNumber, $this->address, $this->state, $this->zipcode, $this->country, $this->language, $this->updateDate);
		}

        private function validateCoreComponents() {
            
            if ($this->checkEmptyInput() == false) {
				header($this->path."?msg=empty_fields");
				exit();
			}

			if ($this->checkUsername() == false) {
				header($this->path."?msg=invalid_username");
				exit();
			}

			if ($this->checkEmail() == false) {
				header($this->path."?msg=invalid_email");
				exit();
			}

            if ($this->checkDirectoryExistence() == false) {
                $this->createDirectory();
            }
        }

        private function validateProfileImage() {

                if ($this->checkImageExistence() == false) {
                    $this->destroyImage();
                }
    
                if ($this->checkImageType() == false) {
                    header($this->path."?msg=invalid_image_type");
                    exit();
                }
    
                if ($this->checkImageSize() == false) {
                    header($this->path."?msg=image_size_too_large");
                    exit();
                }

                if ($this->checkDirectoryExistence() == false) {
                    $this->createDirectory();
                    $this->shipImage();
                } else {
                    $this->shipImage();
                }

                if ($this->checkImageTuple() == false) {
                    $this->amendImage($this->userId, $this->imageName, $this->updateDate);
                } else {
                    $this->appendImage($this->userId, $this->imageName, $this->updateDate);
                }
        }

        private function checkEmptyInput() {

			if (empty($this->fullname) || empty($this->username) || empty($this->email)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;
		}

		private function checkUsername() {

			if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;
		}

		private function checkEmail() {

			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;
		}

        private function checkImageExistence() {

            if (file_exists($this->destinationDirectory)) {
                $bool = false;
            } else {
                $bool = true;
            }

            return $bool;

        }

        private function checkImageType() {

            if ($this->imageType !== "" && $this->imageType !== "image/png" && $this->imageType !== "image/jpeg" && $this->imageType !== "image/jpg" && $this->imageType !== "image/gif") {
                $bool = false;
            } else {
                $bool = true;
            }

            return $bool;
        }

        private function checkImageSize() {

            if ($this->imageSize > 100000000) {
                $bool = false;
            } else {
                $bool = true;
            }

            return $bool;

        }

		private function checkUser() {

			if (!$this->checkUserExistence($this->username, $this->email)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;
		}

        private function checkImageTuple() {

            if (!$this->checkImageTupleExistence($this->userId)) {
                $bool = false;
            } else {
                $bool = true;
            }

            return $bool;
        }

        private function checkDirectoryExistence() {

            if (!is_dir($this->newDir)) {
                $bool = false;
            } else {
                $bool = true;
            }

            return $bool;

        }

        private function createDirectory() {

            if (!mkdir($this->newDir)) {
                $bool = false;
            } else {
                $bool = true;
            }

            return $bool;

        }

        private function checkImageShipment() {

            if (!move_uploaded_file($this->imageTempName, $this->destinationDirectory)) {
                $bool = false;
            } else {
                $bool = true;
            }

            return $bool;

        }

        private function destroyImage() {

            if (!unlink($this->destinationDirectory)) {
                $bool = false;
            } else {
                $bool = true;
            }

            return $bool;
        }

        private function shipImage() {

            move_uploaded_file($this->imageTempName, $this->destinationDirectory);

        }
    }
?>