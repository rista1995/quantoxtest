<?php
$email=$password=$status="";
if(isset($_POST['email'])){
	$email=sanitizeString($_POST['email']);
	$password=sanitizeString($_POST['password']);
	if($email=='' || $password==''){
		$status="<br><span style='color:red; float:left;'>Some fields are not submitted!</span>";
	}
	else {
		$user=queryMysql("SELECT * FROM `users` WHERE `email`='".$email."'");
		if($user->num_rows==0){
			$status="<br><span style='color:red; float:left;'>There's no user with this email adress!<span>";
		}
		else {
			$user=$user->fetch_assoc();
			$encrypted=hash('ripemd128',"$salt1$password$salt2");
			if($encrypted!=$user['password']){
				$status="<br><span style='color:red; float:left;'>Wrong password</span>";
			}
			else {
				$_SESSION['email']=$email;
				$_SESSION['id']=$user['id'];
				$_SESSION['name']=sanitizeString($user['name']);
				$name=sanitizeString($user['name']);
				$loggedIn=TRUE;
				$email=$password=""; 
				$status="<br><span style='color:green; float:left;'>Welcome, ".$user['name']."! Redirecting to home page, please wait...</span>";
			}
		}
	}
}
?>