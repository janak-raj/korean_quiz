<div class="main-panel">
<div class="content-wrapper">
   <div class="row">
      <div class="col-sm-6">
         <h3 class="mb-0 font-weight-bold">Meanings List</h3>
         <p>All the meanings you have added are here.</p>
      </div>
      <div class="col-sm-6">
         <div class="d-flex align-items-center justify-content-md-end">
            <div class="pr-1 mb-3 mb-xl-0">
               <button type="button" class="btn btn-sm bg-dark text-white btn-icon-text border" data-toggle="modal" data-target="#exampleModal"><i class="typcn typcn-plus-outline mr-2"></i>Add</button>
            </div>
            <div class="mb-3 mb-xl-0 pr-1">
               <div class="dropdown">
                  <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="typcn typcn-calendar-outline mr-2"></i>Last 7 days
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                     <h6 class="dropdown-header">Last 14 days</h6>
                     <a class="dropdown-item" href="#">Last 21 days</a>
                     <a class="dropdown-item" href="#">Last 28 days</a>
                  </div>
               </div>
            </div>
            <div class="pr-1 mb-3 mr-2 mb-xl-0">
               <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i class="typcn typcn-arrow-forward-outline mr-2"></i>Export</button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
               <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i class="typcn typcn-info-large-outline mr-2"></i>info</button>
            </div>
         </div>
      </div>
      <div class="col-12 mb-0 grid-margin">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Sort Words</h4>
               <form class="form-inline" action="#" method="POST">
                  <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                  <div class="input-group col-md-6 mb-2 mr-sm-2">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="typcn typcn-zoom"></i></div>
                     </div>
                     <input type="text" class="form-control"  id="wordSearch" onkeyup="searchWord()" placeholder="Type to search...">
                  </div>
                  <div class="form-check col-md-4 mx-sm-3">
                     <div class="form-group">
                        <select class="js-example-basic-single w-100" name="category" style="width: 100%;">
                           <option value="">Select Category</option>
                           <option value="All">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                           <option value="M1">Meaning 1</option>
                           <option value="M2">Meaning 2</option>
                           <option value="M3">Meaning 3</option>
                           <option value="M4">Meaning 4</option>
                           <option value="M5">Meaning 5</option>
                        </select>
                     </div>
                  </div>
                  <button type="submit" name="sort-word" class="btn btn-dark mb-2"><i class="typcn typcn-filter"></i> Sort</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <style>
   </style>
   <div class="row  mt-3" id="wordList">
      <?php
         if (!isset($_POST['sort-word'])) {
           $words = new Words();
           $words->getWords();
         } else {
           /*
           if (isset($_POST['category'])) {
             foreach ($_POST['category'] as $category) {
               return $category;
             }
           }
           */
           $category = $_POST['category'];
           if ($category == "All") {
             $words = new Words();
             $words->getWords();
           } else {
             $words_categorized = new WordsCategorized();
             $words_categorized->getWordsCategorized($category);
           }
         }
          
          ?>
   </div>
</div>
<!-- content-wrapper ends -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Meaning</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="src/php/WordAdapter.php" method="POST">
               <div class="row">
                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="form-group">
                              <label>Word (Korean)</label>
                              <input type="text" name="word" class="form-control form-control-sm" placeholder="Korean Word" aria-label="Username">
                           </div>
                           <div class="form-group">
                              <label>Meaning (Nepali)</label>
                              <input type="text" name="np_meaning" class="form-control form-control-sm" placeholder="Nepali Meaning" aria-label="Username">
                           </div>
                           <div class="form-group">
                              <label>Syllable (Nepali)</label>
                              <input type="text" name="np_syllable" class="form-control form-control-sm" placeholder="Nepali Syllable" aria-label="Username">
                           </div>
                           <div class="form-group">
                              <label>Meaning (English)</label>
                              <input type="text" name="en_meaning" class="form-control form-control-sm" placeholder="English Meaning" aria-label="Username">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                           <div class="form-group">
                              <label>Syllable (English)</label>
                              <input type="text" name="en_syllable" class="form-control form-control-sm" placeholder="English Syllable" aria-label="Username">
                           </div>
                           <div class="form-group">
                              <label>Select Category</label><br>
                              <select name="category" class="js-example-basic-single w-100" style="width: 100%;">
                                 <option value="">Select Category</option>
                                 <option value="M1">Meaning 1</option>
                                 <option value="M2">Meaning 2</option>
                                 <option value="M3">Meaning 3</option>
                                 <option value="M4">Meaning 4</option>
                                 <option value="M5">Meaning 5</option>
                              </select>
                           </div>
                           <div class="form-check form-check-success">
                              <label class="form-check-label">
                              <input type="checkbox" name="add_to_quiz" value="Not Added" class="form-check-input" hidden>
                              <input type="checkbox" name="add_to_quiz" value="Added" class="form-check-input" checked>
                              Add to Meaning Quiz
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
         <button type="submit" name="add-word" class="btn btn-primary">Save The Word</button>
         </div>
         </form>
      </div>
   </div>
</div>
<script>
   $('#myModal').on('shown.bs.modal', function () {
   $('#myInput').trigger('focus')
   })
</script>
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