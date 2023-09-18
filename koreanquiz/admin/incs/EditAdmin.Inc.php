<!-- partial -->
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Admin</h4>
                  <?php
                      if (!isset($_GET['aid'])) {
                          exit();
                      } else {
                          $admin_id = $_GET['aid'];
                          
                          $update_admin = new UpdateAdmin();
                          $update_admin->getAdmin($admin_id);
                      }
                  ?>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- content-wrapper ends -->