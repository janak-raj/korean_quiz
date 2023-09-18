<!-- partial -->
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User</h4>
                  <?php
                      if (!isset($_GET['uid'])) {
                          exit();
                      } else {
                          $user_id = $_GET['uid'];
                          
                          $view_user = new ViewUser();
                          $view_user->getUser($user_id);
                      }
                  ?>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- content-wrapper ends -->