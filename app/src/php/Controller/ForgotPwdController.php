<?php
	
	class ForgotPwdController extends ForgotPwdModel {

		private $email;
		private $expires;
		private $path;

		public function __construct($email, $expires) {
			$this->email = $email;
			$this->expires = $expires;
			$this->path = "Location: ../../forgot-password.php";
		}

		public function expandForgotPwd() {

			if ($this->checkEmptyInput() == false) {
				header($this->path."?msg=empty_fields");
				exit();
			}

			if ($this->checkEmail() == false) {
				header($this->path."?msg=invalid_email");
				exit();
			}

			if ($this->checkUser() == false) {
				header($this->path."?msg=user_not_found");
				exit();
			}

			//$this->appendForgotPwd($this->email, $this->expires);
			$this->sendEmail($this->email);
		}

		private function checkEmptyInput() {

			$bool;

			if (empty($this->email)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;

		}

		private function checkEmail() {

			$bool;

			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;
		}

		private function checkUser() {

			$bool;

			if (!$this->checkUserExistance($this->email)) {
				$bool = false;
			} else {
				$bool = true;
			}

			return $bool;

		}
	}
?>