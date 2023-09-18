<?php
	class ViewUser extends DatabaseConfig {
		public function getUser($uid) {
			$fetchSql = "SELECT * FROM `users` WHERE `userId` = '$uid'";
			$fetchExe = $this->integrate()->query($fetchSql);
			$get = $fetchExe->fetch(PDO::FETCH_ASSOC);
			echo '
			<div class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Fullname</label>
                      <input type="text" class="form-control" value="'.$get['fullname'].'" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" class="form-control" value="'.$get['username'].'" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" value="'.$get['email'].'" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Registered Date</label>
                      <input type="email" class="form-control" value="'.$get['regDate'].'" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">User Status</label>
                      <input type="email" class="form-control" value="'.$get['userStatus'].'" disabled>
                      <br>
                      ';
                      
                        
                        if ($get['userStatus'] == "Unapproved") {
                            echo '
                            <form action="src/php/UserAdapter.php" method="POST">
                                <button name="approve" type="submit" class="btn btn-success btn-icon-text" value="'.$get['userId'].'">
                                Approve
                                <i class="typcn typcn-tick btn-icon-append"></i>                          
                                </button>
                            </form>
                            ';
                        } else {
                            echo '
                            <form action="src/php/UserAdapter.php" method="POST">
                                <button name="unapprove" type="submit" class="btn btn-danger btn-icon-text" value="'.$get['userId'].'">
                                    Unapprove
                                    <i class="typcn typcn-tick btn-icon-append"></i>                          
                                </button>
                            </form>
                            ';
                        }
                    
            echo '
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email Status</label>
                      <input type="email" class="form-control" value="'.$get['emailStatus'].'" disabled>
                    </div>
                    
                    <a href="users"><button type="button" class="btn btn-light">Back</button></a>
                  </div>
			';
		}
	}
?>