<?php
include_once "constants.php";

function DBConnect(){
	global $host, $db_user, $db_pass, $database;
	$conn = mysql_connect($host, $db_user, $db_pass) or die("Could not connect to data host: " . mysql_error());
	mysql_select_db($database, $conn) or die("Could not connect to database: " . mysql_error());
	return $conn;
}

function DBClose($conn){
	mysql_close($conn);
}

function Encrypt($string) {
	$crypted = sha1($string);
	return $crypted;
}

function Query($string) {
	$conn = DBConnect();
	$result = mysql_query($string, $conn) or die("Could not execute query:" . mysql_error());
	DBClose($conn);
	return $result;
}

function Fetch($result) {
	$row = mysql_fetch_array($result) or die("Query did not return any rows: " . mysql_error());
	return $row;
}

function FreeResult($result) {
	mysql_free_result($result);
}

?>