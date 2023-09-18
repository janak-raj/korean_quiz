<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div>
                    <a href="add-admin">
                    <button type="button" class="btn btn-info btn-md btn-block" style="float: right; width: 20%;">
                        <i class="typcn typcn-plus"></i>                      
                        Add Admin
                        </button>
                    </a>
                  </div>
                  <h4 class="card-title">Admins Table</h4>
                  
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
                          $admins = new Admins();
                          $admins->getAdmins();
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