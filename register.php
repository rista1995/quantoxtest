<html>
<?php 
require_once "core.php";
if($loggedIn) header("Location: index.php"); // if you are loggedIn you can't visit this page
$name=$email=$password=$repeat=$status="";

if(isset($_POST['name'])){
	$name=sanitizeString($_POST['name']);
	$email=sanitizeString($_POST['email']);
	$password=sanitizeString($_POST['password']);
	$repeat=sanitizeString($_POST['repeat']);
	if($name=='' || $email=='' || $password=='' || $repeat==''){
		$status="<br><span style='color:red; float:left;'>Some fields are not submitted!</span>";
	}
	else{
		if($password!=$repeat){
			$status="<br><span style='color:red; float:left;'>You didn't repeat password correctly!</span>";
		}
		else {
			$duplicateuser=queryMysql("SELECT * FROM `users` WHERE `email`='".$email."'");
			if($duplicateuser->num_rows==0){
				$encrypted=hash('ripemd128',"$salt1$password$salt2");
				queryMysql("INSERT INTO `users`(`email`, `name`, `password`) VALUES (
					'$email','$name','$encrypted')");
				$status="<br><span style='color:green; float:left;'>You finished registration and you can login now!</span>";
				$name="";
				$email="";
			}
			else {
				$status="<br><span style='color:red; float:left;'>There's another user with that email adress!</span>";
			}
		}
	}
}
?>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/custom-styles.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/component.css">
<link rel="stylesheet" href="css/font-awesome-ie7.css">
<link rel="stylesheet" href="css/our.css">
<script type="text/javascript" src="jquery-3.2.1.min.js"> </script>
<title>Register </title>
<script> 
		function usedemail(email){
			if(email.value==''){
				document.getElementById('ajax_span').innerHTML='';
				return;
			}
			$.ajax({
				method : "POST",
				url : "duplicateuser.php",
				data : {
					'email' : email.value
				},
				success: function(result){
					document.getElementById('ajax_span').innerHTML=result;
				}
			});
		}
</script>
</head>
<body>
<div class="top-bar b-radius" style='width:100%'>
   <div class="top-content" style='margin-left:10%;'>
		<a href="index.php"><h2 style="color:white; font-family:Palatino"> Quantox Test</h2></a>
	</div>
	<div class="social">
		<ul>
			<li style='margin-top:10;'><a id="naslink" href="login.php">LOGIN &nbsp;&nbsp;</a></li>
			<li><a id="naslink" href="register.php">REGISTER &nbsp;&nbsp;</i></a></li>
		</ul>
	</div>
</div>
<div class="banner" style="margin-top:60; margin-left:10%; margin-right:10%; ">
	<div class="carousel-inner" style="background-color:#F1E9E8; border-radius:8px; font-weight:bold">
		<h2 style='color:#0BAFC6'> Fill the form bellow to register! </h2>
		<form method="post" action="register.php" style="font-family:Arial; margin-left:2%;margin-top:2%;">
			<span style='float:left'>
				<img src='img/korisnicko.png' style='margin-left:2;margin-bottom:5; vertical-align: middle; width:18'>&nbsp;NAME&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="height:30;" name="name" value="<?php echo $name;?>"  >	
			</span>		<br><br>						
			<span style='float:left'><img src='img/mail.png' style='margin-left:2;margin-bottom:2; vertical-align: middle; width:18' >
			&nbsp;E-MAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="email" name="email" style="height:30;" value="<?php echo $email;?>" onBlur="usedemail(this)" id="tlog1">
			<span id='ajax_span'> </span></span> 	<br><br>
			<span style='float:left'>
				<img src='img/sifra.png' style=' height:20; margin-bottom:3; margin-left:2;' align='center'>&nbsp;PASSWORD
				<input type="password" style="height:30;" name="password" value="">
			</span>		<br><br>
			<span style='float:left'>
				<img src='img/sifra.png' style=' height:20; margin-bottom:3; margin-left:2;' align='center'>&nbsp;REPEAT
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" style="height:30;" name="repeat" value="">
			</span> <br><br>
			<button class='btn1' style="float:left; margin-left:60; width:200; ">Register </button><br>
			<?php echo $status;?>
		</form>
	</div>
</div>
<?php ?>
</body>
</html>
