<?php

class Users{

	public $userarr = array();
	
	public function GetUserList(){
		$result = Query("select * from users");
		
		while ($row = mysql_fetch_assoc($result)) {
			$user = new user;
			$user->LoadUser(
				$row['UserID'], 
				$row['FirstName'],
				$row['LastName'], 
				$row['Password'],
				$row['Email']);
			$this->userarr[$row['UserID']] = $user;
			$user = null;
		}

		FreeResult($result);
	}
}
?>