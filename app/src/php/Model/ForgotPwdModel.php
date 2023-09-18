<?php
	
	class ForgotPwdModel extends DatabaseConfig {

		private $path;

		public function __construct() {

			$this->path = "Location: ../../forgot-password.php";

		}

		protected function sendEmail($email) {

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

			    $mail->setFrom('jrgframework@host.com', 'JRG Framework');
			    $mail->addAddress($email, 'Framework User');

			    //Content
			    $mail->isHTML(true);
			    $mail->Subject = 'Verification Code';
			    $mail->Body    = 'Your verification code for reseting your password is: 123456';
			    
			    $mail->send();
			    echo 'Message has been sent';
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}

		protected function checkUserExistance($email) {

			$catchStmt = $this->integrate()->prepare('SELECT `email` FROM `users` WHERE `email` = ?;');

			if (!$catchStmt->execute(array($email))) {
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