<?php
	
	class SignupController extends SignupModel {

		private $fullname;
		private $username;
		private $email;
		private $password;
		private $confirmPassword;
		private $regDate;
		private $userStatus;
		private $emailStatus;
		private $path;

		public function __construct($fullname, $username, $email, $password, $confirm_password, $registration_date) {

			$this->fullname = $fullname;
			$this->username = $username;
			$this->email = $email;
			$this->password = $password;
			$this->confirmPassword = $confirm_password;
			$this->regDate = $registration_date;
			$this->userStatus = "Unapproved";
			$this->emailStatus = "Unverified";
			$this->path = "Location: ../../auth/registration";
		}

		public function expandUser() {

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

			if ($this->checkUser() == false) {
				header($this->path."?msg=already_exists");
				exit();
			}

			$this->appendUser($this->fullname, $this->username, $this->email, $this->password, $this->regDate, $this->userStatus, $this->emailStatus);
			$this->sendMail($this->email, $this->username);
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

		private function checkUser() {

			if (!$this->checkUserExistance($this->username, $this->email)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;
		}
	}
?>