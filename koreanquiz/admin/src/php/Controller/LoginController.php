<?php
	
	class LoginController extends loginModel {

		private $emailUsername;
		private $password;
		private $lastLogin;
		private $userStatus;
		private $path;

		public function __construct($email_username, $password, $last_login) {
			$this->emailUsername = $email_username;
			$this->password = $password;
			$this->lastLogin = $last_login;
			$this->userStatus = "Online";
			$this->path = "Location: ../../auth/authentication";
		}

		public function introduceAdmin() {

			if ($this->checkEmptyInput() == false) {
				header($this->path."?msg=empty_fields");
				exit();
			}

			if ($this->checkEmailUsername() == false) {
				header($this->path."?msg=invalid_email_or_username");
				exit();
			}

			if ($this->checkAdmin() == false) {
				header($this->path."?msg=user_not_found");
				exit();
			}

			if ($this->checkPassword() == false) {
				header($this->path."?msg=wrong_pwd");
				exit();
			}

			$this->initiateSession($this->emailUsername, $this->lastLogin, $this->userStatus);
			$this->appendLogin($this->emailUsername, $this->userStatus, $this->lastLogin);
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

		private function checkAdmin() {

			if (!$this->checkAdminExistance($this->emailUsername)) {
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
	}
?>