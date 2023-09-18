<?php
class Words extends DatabaseConfig {
	public function getWords() {
		$fetchSql = "SELECT * FROM `words`";
		$fetchExe = $this->integrate()->query($fetchSql);
		while ($get = $fetchExe->fetch(PDO::FETCH_ASSOC)) {
			echo '
			<div class="col-xl-4 d-flex grid-margin stretch-card">
                <div class="card word_card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">'.$get['word'].' - '.$get['nepaliMeaning'].'</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="d-flex justify-content-between mb-2">
                              <div>Category</div>
                              <div class="text-muted">'.$get['category'].'</div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                              <div>Nepali Meaning</div>
                              <div class="text-muted">'.$get['nepaliMeaning'].'</div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                              <div>English Meaning</div>
                              <span class="text-muted word">'.$get['englishMeaning'].'</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                              <div>Syllable</div>
                              <div class="text-muted">'.$get['nepaliSyllable'].'</div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                              <div>Added Date</div>
                              <div class="text-muted">'.$get['addedDate'].'</div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                              <div>Added To Quiz</div>
                              <div class="text-muted">'.$get['isAddedToQuiz'].'</div>
                            </div>
                            Rating - <span>20%</span>
                            <div class="progress progress-md mt-2">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="btn-group mt-3" role="group" aria-label="Basic example" style="width: 100%;">
                              <button type="button" class="btn btn-info" title="Edit">
                                <i class="typcn typcn-edit"></i>
                              </button>
                              <button type="button" class="btn btn-primary" title="Delete">
                                <i class="typcn typcn-trash"></i>
                              </button>
                              ';

                              if ($get['isAddedToQuiz'] == "Added") {
                                echo '
                                <form action="src/php/WordAdapter.php" method="POST">
                                <button type="submit" value="'.$get['wordId'].'" name="remove-from-quiz" class="btn btn-dark" title="Remove from Quiz">
                                  <i class="typcn typcn-times"></i>
                                </button>
                                <form>
                                ';
                              } else {
                                echo '
                                <form action="src/php/WordAdapter.php" method="POST">
                                <button type="submit" value="'.$get['wordId'].'" name="add-to-quiz" class="btn btn-success" title="Add to Quiz">
                                  <i class="typcn typcn-input-checked"></i>
                                </button>
                                <form>
                                ';
                              }

                              echo '
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			';
		}
	}
}


?>