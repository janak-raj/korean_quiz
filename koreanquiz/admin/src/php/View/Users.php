<?php
class Users extends DatabaseConfig {
	public function getUsers() {
		$fetchSql = "SELECT * FROM `users`";
		$fetchExe = $this->integrate()->query($fetchSql);
		while ($get = $fetchExe->fetch(PDO::FETCH_ASSOC)) {
            $user_id = $get['userId'];
            $fetchProfileImageSql = "SELECT * FROM `profile_images` WHERE `userId` = '$user_id'";
            $fetchProfileImageExe = $this->integrate()->query($fetchProfileImageSql);

            if ($fetchProfileImageExe->rowCount() > 0) {
                $grab = $fetchProfileImageExe->fetch(PDO::FETCH_ASSOC);
                $profileImage = "../../app/src/profile/".$get['username']."/".$grab['imageName'];
            } else {
                $profileImage = "../../app/src/assets/img/avatars/Avatar.jpg";
            }
            
			echo '
			<tr>
                <td class="py-1">
                    <img src="'.$profileImage.'" alt="image"/>
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
                    <a href="view-user?uid='.$get['userId'].'"><button type="button" class="btn btn-success btn-icon-text">

                    <i class="typcn typcn-eye btn-icon-append"></i>                          
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