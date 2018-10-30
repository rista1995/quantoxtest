<?php 
require_once 'core.php';
if(isset($_SESSION['email'])){
	destroySession();
	$loggedIn=FALSE;
}
header("Location: index.php");
?>