<html>
<?php 
require_once "core.php";
require_once "login_logic.php";
?>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/custom-styles.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/component.css">
<link rel="stylesheet" href="css/font-awesome-ie7.css">
<link rel="stylesheet" href="css/our.css">
<title>Results </title>
</head>
<body>
<div class="top-bar b-radius" style='width:100%'>
   <div class="top-content" style='margin-left:10%;'>
		<a href="index.php"><h2 style="color:white; font-family:Palatino"> Quantox Test</h2></a>
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
		<?php if($loggedIn){?>
		<h2 style='float:left; margin-left:30;'>Your results:</h2><br><br>
		<table class="table table-striped table-bordered" style='float:left;solid black; margin-left:30; width:400; '>
		<tr style='height:30'><td><center>Name </td><td><center>Email </td> </tr>
		<?php	
		if(isset($_POST['query'])){
			$users=queryMysql("SELECT * FROM `users`");
			if($users->num_rows!=0){
				for($i=0; $i<$users->num_rows; $i++){
					$user=$users->fetch_assoc();
					$p1=$p2=0;
					similar_text($user['name'], $_POST['query'], $p1);
					similar_text($user['email'], $_POST['query'], $p2);
					if($p1>34.9 || $p2>34.9){
						echo "<tr style='height:30'><td><center>".$user['name']."</td><td><center>".$user['email']."</td></tr>";
					}
				}
			}
		}
		?>
		</table>
		<?php }else {?>
		<h2 style='float:left; margin-left:30;'>Please login:</h2> <br>
		<form method="post" action="results.php" style="font-family:Arial; margin-left:2%;margin-top:2%;">						
			<span style='float:left'><img src='img/mail.png' style='margin-left:2;margin-bottom:2; vertical-align: middle; width:18' >
			&nbsp;E-MAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="email" name="email" style="height:30;" value="<?php echo $email;?>" onBlur="usedemail(this)" id="tlog1">
			<span id='ajax_span'> </span></span> 	<br><br>
			<span style='float:left'>
				<img src='img/sifra.png' style=' height:20; margin-bottom:3; margin-left:2;' align='center'>&nbsp;PASSWORD
				<input type="password" style="height:30;" name="password" value="">
			</span>		<br><br>
			<input type="hidden" name="query" value="<?php if(isset($_POST['query'])){ echo $_POST['query'];}?>">
			<button class='btn1' style="float:left; margin-left:60; width:200; ">Login </button><br>
			<?php echo $status;?>
		</form>
		<?php }?>
	</div>
</div>
</body>
</html>
