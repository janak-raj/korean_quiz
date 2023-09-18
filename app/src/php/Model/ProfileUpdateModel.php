<?php
    class ProfileUpdateModel extends DatabaseConfig {

        private $path;

		public function __construct() {
			$this->path = "Location: ../../account-settings";
		}

        protected function amendUser($userId, $imageName, $fullname, $username, $email, $phoneNumber, $address, $state, $zipcode, $country, $language, $updateDate) {

			$rejuvenateStmt = $this->integrate()->prepare('UPDATE `user_details` SET `phoneNumber`=?, `address`=?, `state`=?, `zipcode`=?, `country`=?, `language`=?, `lastUpdatedDate`=? WHERE `userId` = ?;');

            if (!$rejuvenateStmt->execute(array($phoneNumber, $address, $state, $zipcode, $country, $language, $updateDate, $userId))) {
                header($this->path."?msg=server_error");
                exit();
            }

            $rejuvenateStmt = null;
		}

		protected function amendImage($userId, $imageName, $updateDate) {

			$rejuvenateStmt = $this->integrate()->prepare('UPDATE `profile_images` SET `userId`=?, `imageName`=?, `imageUploadDate`=? WHERE `userId` = ?;');

			if (!$rejuvenateStmt->execute(array($userId, $imageName, $updateDate, $userId))) {
				header($this->path."?msg=server_error");
				exit();
			}

			$rejuvenateStmt = null;
		}

		protected function appendImage($userId, $imageName, $updateDate) {

			$stashStmt = $this->integrate()->prepare('INSERT INTO `profile_images`(`userId`, `imageName`, `imageUploadDate`) VALUES (?, ?, ?);');

			if (!$stashStmt->execute(array($userId, $imageName, $updateDate))) {
				header($this->path."?msg=server_error");
				exit();
			}

			$stashStmt = null;
		}



		protected function checkImageTupleExistence($userId) {

			$catchStmt = $this->integrate()->prepare('SELECT * FROM `profile_images` WHERE `userId` = ?;');

			if (!$catchStmt->execute(array($userId))) {
				header($this->path."?msg=error");
				exit();
			}

			if ($catchStmt->rowCount() > 0) {
				$tupleExists = false;
			} else {
				$tupleExists = true;
			}

			return $tupleExists;
		}

        protected function checkUserExistence($username, $email) {

			$catchStmt = $this->integrate()->prepare('SELECT `username` FROM `users` WHERE `username` = ? OR `email` = ?;');

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