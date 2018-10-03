<html>
<head>
  <link rel="stylesheet" type="text/css" href="standard.css" />
  <title>Maine St. Andrews Pipes and Drums - User List</title>
</head>

<body>
	<?php 
		include ("user.php");
		include ("users.php");
		include ("../includes/dbaccess.php");

		$user = new User;
		$user->GetUserByUserID('jeremy.burkard');
		print "Last Name: $user->lastName<br>";
		$user = null;
		
		$users = new Users;
		$users->GetUserList();
		foreach($users->userarr as $userID => $user1) {
			print "First Name: $user1->firstName<br>";
			print "Encrypted: ".Encrypt($user1->password)."<br>";
		}
		$users = null;
	?>
</body>
</html>