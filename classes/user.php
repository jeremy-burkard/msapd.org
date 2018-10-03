<?php

class User{
	public $userID;
	public $firstName;
	public $lastName;
	public $email;
	private $password;
	private $loaded = false;
	
	public function GetUserByUserID($UserID){
		$this->userID = $UserID;
		
		$result = Query("select * from users where UserID = '$this->userID'");
		$row = Fetch($result);
		
		$this->firstName = $row['FirstName'];
		$this->lastName = $row['LastName'];
		$this->password = $row['Password'];
		$this->email = $row['Email'];
		
		$this->loaded = true;
		
		FreeResult($result);
		return $this->loaded;
	}

	public function LoadUser($UserID, $FirstName, $LastName, $Password, $Email){
		$this->userID = $UserID;
		$this->firstName = $FirstName;
		$this->lastName = $LastName;
		$this->password = $Password;
		$this->email = $Email;
		$this->loaded = true;
	}
	
	public function VerifyPassword($Password){
		if ($this->loaded == true) {
			return ($Password == $this->password);
		}
		else {
			die ("No user loaded, cannot verify.");
		}
	}
	
	public function UpdatePassword($Password){
		$this->password = $Password;
	}
	
	public function UpdateUser(){
		$result = Query("update users set FirstName = '$this->firstName', LastName = '$this->lastName', ".
			"Email = '$this->email', Password = '$this->password' where UserID = '$this->userID'")
			or die (mysql_error());
	}	
}
?>