<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                
                  <h4 class="card-title">Users Table</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Admin
                          </th>
                          <th>
                            Username
                          </th>
                          <th>
                            E-Mail
                          </th>
                          <th>
                            Reg. Date
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $admins = new Users();
                          $admins->getUsers();
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            
            
          </div>
        </div>
        <!-- content-wrapper ends -->