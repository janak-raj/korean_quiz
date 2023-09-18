<?php
	class UpdateAdmin extends DatabaseConfig {
		public function getAdmin($aid) {
			$fetchSql = "SELECT * FROM `admins` WHERE `adminId` = '$aid'";
			$fetchExe = $this->integrate()->query($fetchSql);
			$get = $fetchExe->fetch(PDO::FETCH_ASSOC);
			echo '
			<form class="forms-sample" action="src/php/AdminAdapter.php" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="fullname" value="'.$get['fullname'].'">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="username" value="'.$get['username'].'">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" name="email" value="'.$get['email'].'">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="update-admin" value="'.$get['adminId'].'">Add</button>
                    <a href="admins"><button type="button" class="btn btn-light">Cancel</button></a>
                  </form>
			';
		}
	}
?>