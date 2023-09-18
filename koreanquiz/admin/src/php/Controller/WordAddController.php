<?php
	
	class WordAddController extends WordAddModel {

		private $word;
        private $nepaliMeaning;
        private $nepaliSyllable;
        private $englishMeaning;
        private $englishSyllable;
        private $category;
        private $isAddedToQuiz;
        private $addedDate;
        private $path;

		public function __construct($word, $nepali_meaning, $nepali_syllable, $english_meaning, $english_syllable, $category, $isAddedToQuiz, $added_date) {

			$this->word = $word;
            $this->nepaliMeaning = $nepali_meaning;
            $this->nepaliSyllable = $nepali_syllable;
            $this->englishMeaning = $english_meaning;
            $this->englishSyllable = $english_syllable;
            $this->category = $category;
            $this->isAddedToQuiz = $isAddedToQuiz;
            $this->addedDate = $added_date;
            $this->path = "Location: ../../meanings";
		}

		public function expandWord() {

			if ($this->checkEmptyInput() == false) {
				header($this->path."?msg=empty_fields");
				exit();
			}

			if ($this->checkWord() == false) {
                header($this->path."?msg=word_exists");
                exit();
            }

			$this->appendWord($this->word, $this->nepaliMeaning, $this->nepaliSyllable, $this->englishMeaning, $this->englishSyllable, $this->category, $this->isAddedToQuiz, $this->addedDate);
		}

		private function checkEmptyInput() {

			if (empty($this->word) || empty($this->nepaliMeaning) || empty($this->nepaliSyllable) || empty($this->englishMeaning) || empty($this->category)) {
                $bool = false;
            } else {
                $bool = true;
            }

            return $bool;
		}

		private function checkWord() {

            if (!$this->checkWordExistence($this->word, $this->nepaliMeaning, $this->englishMeaning)) {
                $bool = false;
            } else {
                $bool = true;
            }

            return $bool;

        }
	}
?>