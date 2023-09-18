<?php
	
	class WordAddModel extends DatabaseConfig {

		private $path;

		public function __construct() {
			$this->path = "Location: ../../meanings";
		}

		protected function appendWord($word, $nepaliMeaning, $nepaliSyllable, $englishMeaning, $englishSyllable, $category, $isAddedToQuiz, $addedDate)  {

			$stashStmt = $this->integrate()->prepare('INSERT INTO `words`(`word`, `nepaliMeaning`, `nepaliSyllable`, `englishMeaning`, `englishSyllable`, `category`, `isAddedToQuiz`, `addedDate`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');

            if (!$stashStmt->execute(array($word, $nepaliMeaning, $nepaliSyllable, $englishMeaning, $englishSyllable, $category, $isAddedToQuiz, $addedDate))) {
                header($this->path."?msg=server_error");
                exit();
            }

            $stashStmt = null;
		}

		protected function checkWordExistence($word, $nepaliMeaning, $englishMeaning) {

			$catchStmt = $this->integrate()->prepare('SELECT `word`, `nepaliMeaning`, `englishMeaning` FROM `words` WHERE `word` = ? AND `nepaliMeaning` = ? AND `englishMeaning` = ?;');

            if (!$catchStmt->execute(array($word, $nepaliMeaning, $englishMeaning))) {
                header($this->path."?msg=server_error");
                exit();
            }

            if ($catchStmt->rowCount() > 0) {
                $wordExists = false;
            } else {
                $wordExists = true;
            }

            return $wordExists;
		}
	}
?>