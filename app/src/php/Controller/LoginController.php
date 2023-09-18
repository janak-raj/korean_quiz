<?php
	
	class LoginController extends loginModel {

		private $emailUsername;
		private $password;
		private $loginDate;
		private $userStatus;
		private $path;

		public function __construct($email_username, $password, $login_date) {
			$this->emailUsername = $email_username;
			$this->password = $password;
			$this->loginDate = $login_date;
			$this->userStatus = "Online";
			$this->path = "Location: ../../auth/authentication";
		}

		public function introduceUser() {

			if ($this->checkEmptyInput() == false) {
				header($this->path."?msg=empty_fields");
				exit();
			}

			if ($this->checkEmailUsername() == false) {
				header($this->path."?msg=invalid_email_or_username");
				exit();
			}

			if ($this->checkUser() == false) {
				header($this->path."?msg=user_not_found");
				exit();
			}

			if ($this->checkPassword() == false) {
				header($this->path."?msg=wrong_pwd");
				exit();
			}

			if ($this->checkUserApprovementStatus() == false) {
				header($this->path."?msg=not_approved");
				exit();
			}

			$this->initiateSession($this->emailUsername);
		}

		private function checkEmptyInput() {

			if (empty($this->emailUsername) || empty($this->password)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;
		}

		private function checkEmailUsername() {

			if (!filter_var($this->emailUsername) && !preg_match("/^[a-zA-Z0-9]*$/", $this->emailUsername)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;

		}

		private function checkUser() {

			if (!$this->checkUserExistance($this->emailUsername)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;

		}

		private function checkPassword() {

			if (!$this->validatePassword($this->emailUsername, $this->password)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;

		}

		private function checkUserApprovementStatus() {

			if (!$this->validateUserApprovement($this->emailUsername)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;
		}
	}
?>