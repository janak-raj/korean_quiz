<?php
	
	class LoginModel extends DatabaseConfig {

		private $path;

		public function __construct() {
			$this->path = "Location: ../../auth/authentication";
		}

		protected function initiateSession($emailUsername) {

			$catchStmt = $this->integrate()->prepare('SELECT `adminId`, `username` FROM `admins` WHERE `username` = ? OR `email` = ?;');

			if (!$catchStmt->execute(array($emailUsername, $emailUsername))) {
				header($this->path."?msg=error");
				exit();
			}

			$grab = $catchStmt->fetchAll(PDO::FETCH_ASSOC);
			$adminId = $grab[0]['adminId'];
			session_start();
			$_SESSION['admin_id'] = $grab[0]['adminId'];
			$_SESSION['username'] = $grab[0]['username'];

			$catchStmt = null;
		}

		protected function appendLogin($emailUsername, $userStatus, $lastLogin) {

			$catchStmt = $this->integrate()->prepare('SELECT `adminId` FROM `admins` WHERE `username` = ? OR `email` = ?;');

			if (!$catchStmt->execute(array($emailUsername, $emailUsername))) {
				header($this->path."?msg=error");
				exit();
			}

			$grab = $catchStmt->fetchAll(PDO::FETCH_ASSOC);
			$adminId = $grab[0]['adminId'];
			
			$stashStmt = $this->integrate()->prepare('INSERT INTO `admin_login_details`(`userId`, `userStatus`, `lastLogin`) VALUES (?, ?, ?);');

			if (!$stashStmt->execute(array($adminId, $userStatus, $lastLogin))) {
				header($this->path."?msg=server_error");
				exit();
			}

			$stashStmt = null;
		}

		protected function validatePassword($emailUsername, $password) {

			$catchStmt = $this->integrate()->prepare('SELECT `password` FROM `admins` WHERE `username` = ? OR `email` = ?;');

			if (!$catchStmt->execute(array($emailUsername, $emailUsername))) {
				header($this->path."?msg=error");
				exit();
			}

			$grab = $catchStmt->fetchAll(PDO::FETCH_ASSOC);
			$hashedPwd = $grab[0]['password'];
			$pwdValidation = password_verify($password, $hashedPwd);

			if (!$pwdValidation == true) {
				$validation = false;
			} else {
				$validation = true;
			}

			return $validation;
		}

		protected function checkAdminExistance($emailUsername) {

			$catchStmt = $this->integrate()->prepare('SELECT `username`, `email` FROM `admins` WHERE `username` = ? OR `email` = ?;');

			if (!$catchStmt->execute(array($emailUsername, $emailUsername))) {
				header($this->path."?msg=error");
				exit();
			}

			$tuple = $catchStmt->rowCount();

			if (!$tuple > 0) {
				$adminExists = false;
			} else {
				$adminExists = true;
			}

			return $adminExists;
		}
	}
?>