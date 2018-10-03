<?php
	//$host = "p50mysql161.secureserver.net";
	$host = "localhost";
	$database = "MSAPD";
	$db_user = "MSAPD";
	$db_pass = "ImTheSite7";
	
  $site = explode('.',$_SERVER['HTTP_HOST']);
	//$site = "http://www.msapd.org/";
	//$site = "http://localhost/msapd/trunk/";
	//$membersite = "http://member.msapd.org/";
	$membersite = "http://localhost/msapd/member/";
	$memberauthenticatepage = $membersite."/authenticate.php";
?>