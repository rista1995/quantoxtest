<?php 
$dbhost='localhost';
$dbname='quantox_test';
$dbuser='root';
$dbpass='';

$salt1="qm&h*";
$salt2="pg!@"; 

$connection=new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($connection->connect_error){
	die($connection->connect_error);
}

session_start();

if(isset($_SESSION['email'])){
	$id=$_SESSION['id'];
	$email=$_SESSION['email'];
	$name=$_SESSION['name'];
	$loggedIn=TRUE;
}
else {
	$loggedIn=FALSE;
}

function queryMysql($query){
	global $connection;
	$result=$connection->query($query);
	if(!$result) die($connection->error);
	return $result;
}

function sanitizeString($var){
	$var=strip_tags($var);
	$var=htmlentities($var);
	$var=stripslashes($var);
	global $connection;
	return $connection->real_escape_string($var);
}

function destroySession(){
	$_SESSION=array();
	session_destroy();
}

?>