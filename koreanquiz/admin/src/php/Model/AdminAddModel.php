<?php
	
	class AdminAddModel extends DatabaseConfig {

		private $path;

		public function __construct() {
			$this->path = "Location: ../../add-admin";
		}

		protected function appendAdmin($fullname, $username, $email, $password, $regDate) {

			$stashStmt = $this->integrate()->prepare('INSERT INTO `admins`(`fullname`, `username`, `email`, `password`, `regDate`) VALUES (?, ?, ?, ?, ?);');

			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			if (!$stashStmt->execute(array($fullname, $username, $email, $hashedPassword, $regDate))) {
				header($this->path."?msg=error");
				exit();
			}

			$stashStmt = null;
		}

		protected function checkAdminExistence($username, $email) {

			$catchStmt = $this->integrate()->prepare('SELECT `username` FROM `admins` WHERE `username` = ? OR `email` = ?;');

			if (!$catchStmt->execute(array($username, $email))) {
				header($this->path."?msg=error");
				exit();
			}

			if ($catchStmt->rowCount() > 0) {
				$userExists = false;
			} else {
				$userExists = true;
			}

			return $userExists;
		}
	}
?>