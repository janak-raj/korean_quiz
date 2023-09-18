<?php
	
	class LoginModel extends DatabaseConfig {

		private $path;

		public function __construct() {
			$this->path = "Location: ../../auth/authentication";
		}

		protected function initiateSession($emailUsername) {

			$catchStmt = $this->integrate()->prepare('SELECT `userId`, `username` FROM `users` WHERE `username` = ? OR `email` = ?;');

			if (!$catchStmt->execute(array($emailUsername, $emailUsername))) {
				header($this->path."?msg=error");
				exit();
			}

			$grab = $catchStmt->fetchAll(PDO::FETCH_ASSOC);
			session_start();
			$_SESSION['user_id'] = $grab[0]['userId'];
			$_SESSION['username'] = $grab[0]['username'];

			$catchStmt = null;
		}

		protected function validateUserApprovement($emailUsername) {

			$catchStmt = $this->integrate()->prepare('SELECT `userStatus` FROM `users` WHERE `username` = ? OR `email` = ?;');

			if (!$catchStmt->execute(array($emailUsername, $emailUsername))) {
				header($this->path."?msg=error");
				exit();
			}

			$grab = $catchStmt->fetchAll(PDO::FETCH_ASSOC);
			$isApproved = $grab[0]['userStatus'];

			if ($isApproved == "Approved") {
				$userValidation = true;
			} else {
				$userValidation = false;
			}

			return $userValidation;

		}

		protected function validatePassword($emailUsername, $password) {

			$catchStmt = $this->integrate()->prepare('SELECT `password` FROM `users` WHERE `username` = ? OR `email` = ?;');

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

		protected function checkUserExistance($emailUsername) {

			$catchStmt = $this->integrate()->prepare('SELECT `username`, `email` FROM `users` WHERE `username` = ? OR `email` = ?;');

			if (!$catchStmt->execute(array($emailUsername, $emailUsername))) {
				header($this->path."?msg=error");
				exit();
			}

			$tuple = $catchStmt->rowCount();

			if (!$tuple > 0) {
				$userExists = false;
			} else {
				$userExists = true;
			}

			return $userExists;
		}
	}
?>