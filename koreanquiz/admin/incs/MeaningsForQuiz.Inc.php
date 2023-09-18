<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0 font-weight-bold">Meanings For Quiz</h3>
                <p>All the meanings you have added for quiz are here.</p>
              </div>
              <div class="col-sm-6">
         <div class="d-flex align-items-center justify-content-md-end">
         <div class="nav-search">
              <div class="input-group">
                <input type="text" id="wordSearch" onkeyup="searchWord()" class="form-control" placeholder="Type to search..." aria-label="search" aria-describedby="search">
                <div class="input-group-append">
                  <span class="input-group-text" id="search">
                    <i class="typcn typcn-zoom"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="mb-3 mb-xl-0 pr-1">
               <div class="dropdown">
                  <button class="btn bg-white btn-lg dropdown-toggle btn-icon-text border ml-2 w-100" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="typcn typcn-calendar-outline mr-2"></i>Sort
                  </button>
                  <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                     <a class="dropdown-item" href="?iatq=yes">Added to quiz</a>
                     <a class="dropdown-item" href="?iatq=no">Not added to quiz</a>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
              
            </div>
            <div class="row  mt-3" id="wordList">
              <?php
                if (!isset($_GET['iatq'])) {
                  $words = new WordsAddedForQuiz();
                  $words->getWords();
                } else {

                  $iatq = $_GET['iatq'];

                  if ($iatq == "yes") {
                    $words = new WordsAddedForQuiz();
                    $words->getWords();
                  } else if ($iatq == "no") {
                    $words = new WordsNotAddedForQuiz();
                    $words->getWords();
                  }

                }
              ?>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- Button trigger modal -->
          <script>
   function searchWord() {
     // Declare variables
     var input, filter, cardContainer, card, wordContainer, word, i;
     input = document.getElementById("wordSearch");
     //console.log(input);
     filter = input.value.toUpperCase();
     console.log(filter);
     cardContainer = document.getElementById("wordList");
     card = cardContainer.getElementsByClassName("word_card");
     console.log(card.length);
   
     // Loop through all list items, and hide those who don't match the search query
     for (i = 0; i < card.length; i++) {
       wordContainer = card[i].getElementsByTagName("span")[0];
       word = wordContainer.innerHTML.toUpperCase();
       console.log(word);
       if (word.indexOf(filter) > -1) {
         //card[i].style.background = "green";
         card[i].style.display = "block";
       } else {
         //card[i].style.background = "white";
         card[i].style.display = "none";
       }
     }
   }
</script>