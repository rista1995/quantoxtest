<html>
<?php 
require_once "core.php";
if($loggedIn) header("Location: index.php"); // if you are loggedIn you can't visit this page
require_once "login_logic.php";
if(isset($_SESSION['email'])) header('Refresh: 5; URL=index.php');
?>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/custom-styles.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/component.css">
<link rel="stylesheet" href="css/font-awesome-ie7.css">
<link rel="stylesheet" href="css/our.css">
<title>Login </title>
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
		<h2 style='color:#0BAFC6'>Fill the form bellow to login! </h2>
		<form method="post" action="login.php" style="font-family:Arial; margin-left:2%;margin-top:2%;">						
			<span style='float:left'><img src='img/mail.png' style='margin-left:2;margin-bottom:2; vertical-align: middle; width:18' >
			&nbsp;E-MAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="email" name="email" style="height:30;" value="<?php echo $email;?>" id="tlog1">
			<span id='ajax_span'> </span></span> 	<br><br>
			<span style='float:left'>
				<img src='img/sifra.png' style=' height:20; margin-bottom:3; margin-left:2;' align='center'>&nbsp;PASSWORD
				<input type="password" style="height:30;" name="password" value="">
			</span>		<br><br>
			<button class='btn1' style="float:left; margin-left:60; width:200; ">Login </button><br>
			<?php echo $status;?>
		</form>
	</div>
</div>
<?php ?>
</body>
</html>
