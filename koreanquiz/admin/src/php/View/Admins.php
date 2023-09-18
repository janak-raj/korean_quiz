<?php
class Admins extends DatabaseConfig {
	public function getAdmins() {
		$fetchSql = "SELECT * FROM `admins`";
		$fetchExe = $this->integrate()->query($fetchSql);
		while ($get = $fetchExe->fetch(PDO::FETCH_ASSOC)) {
			echo '
			<tr>
                <td class="py-1">
                    <img src="src/images/Avatar.jpg" alt="image"/>
                </td>
                <td>
                    '.$get['username'].'
                </td>
                <td>
                    '.$get['email'].'
                </td>
                <td>
                    '.$get['regDate'].'
                </td>
                <td>
                    <a href="edit-admin?aid='.$get['adminId'].'"><button type="button" class="btn btn-success btn-icon-text">

                    <i class="typcn typcn-edit btn-icon-append"></i>                          
                </button></a>
                <a href=""><button type="button" class="btn btn-danger btn-icon-text">
                <i class="typcn typcn-trash btn-icon-append"></i>                          
              </button></a>
                </td>
            </tr>
			';
		}
	}
}


?>