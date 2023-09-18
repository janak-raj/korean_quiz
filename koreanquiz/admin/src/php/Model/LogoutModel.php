<?php
	
	class LogoutModel extends DatabaseConfig {

		private $path;

		public function __construct() {
			$this->path = "Location: ../../";
		}

		public function amendLogin($adminId, $setUserStatus, $checkUserStatus) {

			$rejuvenateStmt = $this->integrate()->prepare('UPDATE `admin_login_details` SET `userStatus` = ?; WHERE `userId` = ? AND `userStatus` = ?');

			if (!$rejuvenateStmt->execute(array($setUserStatus, $adminId, $checkUserStatus))) {
				header($this->path."?msg=error");
				exit();
			}

			$rejuvenateStmt = null;
		}
	}
?>