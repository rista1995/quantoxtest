<html>
<?php 
require_once "core.php";
?>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/custom-styles.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/component.css">
<link rel="stylesheet" href="css/font-awesome-ie7.css">
<link rel="stylesheet" href="css/our.css">
<title>Home </title>
</head>
<body>
<div class="top-bar b-radius" style='width:100%'>
   <div class="top-content" style='margin-left:10%;'>
		<h2 style="color:white; font-family:Palatino"> Quantox Test</h2>
	</div>
	<div class="social">
		<ul>
			<?php if(!$loggedIn){?>
			<li style='margin-top:10;'><a id="naslink" href="login.php">LOGIN &nbsp;&nbsp;</a></li>
			<li><a id="naslink" href="register.php">REGISTER &nbsp;&nbsp;</i></a></li>
			<?php 
			}else {
			?>
			<li style='margin-top:10;'><a id="naslink" href="#"><?php echo $name; //link to eventual page profile.php?>&nbsp;&nbsp;</a></li>
			<li style='margin-top:10;'><a id="naslink" href="logout.php">LOGOUT &nbsp;&nbsp;</i></a></li>
			<?php }?>
		</ul>
	</div>
</div>
<div class="banner" style="margin-top:60; margin-left:10%; margin-right:10%; ">
	<div class="carousel-inner" style="background-color:#F1E9E8; border-radius:8px; font-weight:bold">
		<h2 style='color:#0BAFC6'>Welcome to my Quantox Test solution, I hope you will like it!</h2><br><br>
		<h3 style='float:left; margin-left:30;'> Fill the form bellow to search: <h3><br>
		<form method="post" action="results.php" style="font-family:Arial; margin-left:2%;margin-top:2%;">
		<input type="text" style="height:30; float:left;" placeholder="name/email" name="query">
		<button class='btn1' style="float:left; margin-left:30; width:200; ">Search </button><br>
		</form>
	</div>
</div>
</body>
</html>
