<?php
    class UserValidationModel extends DatabaseConfig {
        private $path;

		public function __construct() {
			$this->path = "Location: ../../view-user";
		}

        public function approveUser($userId, $status) {
            $approveStmt = $this->integrate()->prepare('UPDATE `users` SET `userStatus` = ? WHERE `userId` = ?;');
            
            if (!$approveStmt->execute(array($status, $userId))) {
                header($this->path."?msg=server_error");
                exit();
            }

            $approveStmt = null;
        }

        public function unapproveUser($userId, $status) {
            $approveStmt = $this->integrate()->prepare('UPDATE `users` SET `userStatus` = ? WHERE `userId` = ?;');
            
            if (!$approveStmt->execute(array($status, $userId))) {
                header($this->path."?msg=server_error");
                exit();
            }

            $approveStmt = null;
        }
    }
?>