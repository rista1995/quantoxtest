<?php
	require_once 'core.php';

	if(isset($_POST['email'])){
			$email=$_POST['email'];
			$result=queryMysql("SELECT * FROM `users` WHERE `email`='$email'");
			if($result->num_rows){
				echo "<span style='color:red'>&nbsp;&nbsp;Already registered! </span>";
			}
			else echo "<span style='color:green'>&nbsp;&nbsp;Not registered yet! </span>";
	}
?>