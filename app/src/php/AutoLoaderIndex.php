<?php
	
	spl_autoload_register('appAutoLoader');

	function appAutoLoader($classname) {
		// Paths
		$pathToCurrentDir = "./src/php/";
		$pathToDatabase = "./src/php/Database/";
		$pathToMailer = "./src/php/Mailer/PHPMailer/phpmailer/phpmailer/src/";
		$pathToContrDir = "./src/php/Controller/";
		$pathToModelDir = "./src/php/Model/";
		$pathToViewDir = "./src/php/View/";
		$extension = ".php";

		// Files
		$databaseFile = $pathToDatabase.$classname.$extension;
		$mailerFile = $pathToMailer.$classname.$extension;
		$controllerFile = $pathToContrDir.$classname.$extension;
		$modelFile = $pathToModelDir.$classname.$extension;
		$viewFile = $pathToViewDir.$classname.$extension;

		// Grabbing the files
		if (file_exists($databaseFile)) {
			require_once $databaseFile;
		}

		if (file_exists($controllerFile)) {
			require_once $controllerFile;
		}

		if (file_exists($modelFile)) {
			require_once $modelFile;
		}

		if (file_exists($viewFile)) {
			require_once $viewFile;
		}

		if (file_exists($mailerFile)) {
			require_once $mailerFile;
		}
	}
    
?>