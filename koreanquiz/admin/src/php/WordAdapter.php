<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include 'AutoLoader.php';
    $path = "Location: ../../meanings";
    $pathToMFQ = "Location: ../../meanings-for-quiz";

    if (!isset($_POST['add-word']) && !isset($_POST['remove-from-quiz']) && !isset($_POST['add-to-quiz'])) {
        exit();
    } else if (isset($_POST['add-word'])) {

        $word = $_POST['word'];
        $nepali_meaning = $_POST['np_meaning'];
        $nepali_syllable = $_POST['np_syllable'];
        $english_meaning = $_POST['en_meaning'];
        $english_syllable = $_POST['en_syllable'];
        $category = $_POST['category'];
        $isAddedToQuiz = $_POST['add_to_quiz'];
        date_default_timezone_set("Asia/Kathmandu");
        $added_date = date("d D-M-Y");
        
        echo $word.$nepali_meaning.$nepali_syllable.$english_meaning.$english_syllable.$category.$isAddedToQuiz;
        $add = new WordAddController($word, $nepali_meaning, $nepali_syllable, $english_meaning, $english_syllable, $category, $isAddedToQuiz, $added_date);
        $add->expandWord();

        //checkError($path, $word, $nepali_meaning, $nepali_syllable, $english_meaning, $english_syllable);

        header($path."?msg=added");

    } else if (isset($_POST['remove-from-quiz'])) {
        $word_id = $_POST['remove-from-quiz'];
        $fromQuiz = "Not Added";
        if (explode("_", $word_id) == true) {
            $id = explode("_", $word_id);
            $word_id = $id[0];

            $remove = new WordModel($word_id, $fromQuiz);
            $remove->removeFromQuiz();

            header($pathToMFQ."?msg=removed");
        } else {
            $remove = new WordModel($word_id, $fromQuiz);
            $remove->removeFromQuiz();

            header($path."?msg=removed");
        }
        

    } else if (isset($_POST['add-to-quiz'])) {
        $word_id = $_POST['add-to-quiz'];
        $toQuiz = "Added";

        if (explode("_", $word_id) == true) {
            $id = explode("_", $word_id);
            $word_id = $id[0];

            $add = new WordModel($word_id, $toQuiz);
            $add->addToQuiz();

            header($pathToMFQ."?iatq=no&msg=added_to_quiz");
        } else {
            $add = new WordModel($word_id, $toQuiz);
            $add->addToQuiz();

            header($path."?msg=added_to_quiz");
        }

    }
?>