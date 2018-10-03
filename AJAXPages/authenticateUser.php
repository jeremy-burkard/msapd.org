<?php
	include "../includes/constants.php";
	include "../classes/user.php";
	include "../includes/dbaccess.php";
	session_start();
	$userid = $_GET['userid'];
	$password = $_GET['password'];
	
	$user = new User;
	if ($user->GetUserByUserID($userid)) {
		if ($user->VerifyPassword($password)) {
			echo "Verified";
			$_SESSION['userid'] = $userid;
		}
		else {
			echo "The password does not match our records.  Please try again!";
		}
	}
	else {
		echo "This user ID does not exist.  Please try again!";
	}
?>