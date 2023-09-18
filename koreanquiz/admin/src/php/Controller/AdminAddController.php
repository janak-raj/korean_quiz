<?php
	
	class AdminAddController extends AdminAddModel {

		private $fullname;
		private $username;
		private $email;
		private $password;
		private $confirmPassword;
		private $regDate;
		private $path;

		public function __construct($fullname, $username, $email, $password, $confirm_password, $registration_date) {

			$this->fullname = $fullname;
			$this->username = $username;
			$this->email = $email;
			$this->password = $password;
			$this->confirmPassword = $confirm_password;
			$this->regDate = $registration_date;
			$this->path = "Location: ../../add-admin";
		}

		public function expandAdmin() {

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

			if ($this->checkPasswordMatch() == false) {
				header($this->path."?msg=pwd_not_matched");
				exit();
			}

			if ($this->checkAdmin() == false) {
				header($this->path."?msg=already_exists");
				exit();
			}

			$this->appendAdmin($this->fullname, $this->username, $this->email, $this->password, $this->regDate);
		}

		private function checkEmptyInput() {

			if (empty($this->fullname) || empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirmPassword)) {
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

		private function checkPasswordMatch() {

			if ($this->password !== $this->confirmPassword) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;
		}

		private function checkAdmin() {

			if (!$this->checkAdminExistence($this->username, $this->email)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;
		}
	}
?>