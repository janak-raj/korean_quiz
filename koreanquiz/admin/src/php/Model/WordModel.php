<?php

    class WordModel extends DatabaseConfig {

        private $wordId;
        private $isAddedToQuiz;
        private $path;

        public function __construct($word_id, $isAddedToQuiz)
        {
            $this->wordId = $word_id;
            $this->isAddedToQuiz = $isAddedToQuiz;
            $this->path = "Location: ../../meanings";
        }

        public function removeFromQuiz() {

            $rejuvenateStmt = $this->integrate()->prepare('UPDATE `words` SET `isAddedToQuiz`= ? WHERE `wordId` = ?;');

            if (!$rejuvenateStmt->execute(array($this->isAddedToQuiz, $this->wordId))) {
                header($this->path."?msg=server_error");
                exit();
            }

            $rejuvenateStmt = null;

        }

        public function addToQuiz() {

            $rejuvenateStmt = $this->integrate()->prepare('UPDATE `words` SET `isAddedToQuiz`= ? WHERE `wordId` = ?;');

            if (!$rejuvenateStmt->execute(array($this->isAddedToQuiz, $this->wordId))) {
                header($this->path."?msg=server_error");
                exit();
            }

            $rejuvenateStmt = null;
        }
    }
?>