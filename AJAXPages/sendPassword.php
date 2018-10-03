<?php
	include "../includes/constants.php";
	include "../classes/user.php";
	include "../includes/dbaccess.php";
	$userid = $_GET['userid'];

	$user = new User;
	if ($user->GetUserByUserID($userid)==false) {
		die ("This user ID does not exist.  Please try again!");
	}
	
	$newpass = preg_replace("/([0-9])/e","chr((\\1+112))",rand(100000,999999));
	$user->UpdatePassword(sha1($newpass));
	$user->UpdateUser();

	$to = $user->email;
	$subject = "Password for MSAPD.org"; 
	$message = "Your new password for the member area of MSAPD.org is ".$newpass.".  Once you log into the members' area, you can change your
	password to a new one of your choice."; 
	$headers = "From: webmaster@msapd.org\r\nReply-To: webmaster@msapd.org";
	$mail_sent = @mail( $to, $subject, $message, $headers );
	echo $mail_sent ? "Your password sent to ".$user->email."." : "Mail failed";
?>