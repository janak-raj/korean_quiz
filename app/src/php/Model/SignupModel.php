<?php
	
	class SignupModel extends DatabaseConfig {

		private $path;

		public function __construct() {
			$this->path = "Location: ../../auth/registration";
		}

		protected function appendUser($fullname, $username, $email, $password, $regDate, $userStatus, $emailStatus) {

			$stashStmt = $this->integrate()->prepare('INSERT INTO `users`(`fullname`, `username`, `email`, `password`, `regDate`, `userStatus`, `emailStatus`) VALUES (?, ?, ?, ?, ?, ?, ?);');

			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			if (!$stashStmt->execute(array($fullname, $username, $email, $hashedPassword, $regDate, $userStatus, $emailStatus))) {
				header($this->path."?msg=error");
				exit();
			}

			$stashStmt = null;
		}

		protected function sendMail($email, $username) {

			$mail = new PHPMailer(true);

			try {
			    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
			    $mail->isSMTP();                                            
			    $mail->Host       = 'smtp.gmail.com';
			    $mail->SMTPAuth   = true;
			    $mail->Username   = 'gahajanakraj4488@gmail.com';
			    $mail->Password   = 'sfleklebfsflnfqh';
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
			    $mail->Port       = 465;

			    $mail->setFrom('hangukquiz@host.com', 'Hanguk Quiz');
			    $mail->addAddress($email, $username);

			    //Content
			    $mail->isHTML(true);
			    $mail->Subject = 'Reminder !!!';
				$mail->Body = "You need to verify your gmail account for further processing. Please click the button below to verify your gmail.";
			    $mail->Body = 'Verify your G-Mail: <button style="border: none; background: #ff4500; color: white; padding: 10px;">Verify Now</button>';
			    
			    $mail->send();
			    echo 'Message has been sent';
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}

		protected function checkUserExistance($username, $email) {

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