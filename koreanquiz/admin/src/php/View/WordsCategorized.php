<?php
class WordsCategorized extends DatabaseConfig {
	public function getWordsCategorized($category) {
		$fetchSql = "SELECT * FROM `words` WHERE `category` = '$category'";
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