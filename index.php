<?php
session_start();

if(!isset($_SESSION['userId']))
{
  header('location:login.php');
}
 ?>
<?php require "function.php" ?>
<?php include_once 'includes/db.inc.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>
	miamala
	</title>
	<link rel="stylesheet" href="malipo.css">
	<style>
		h4{text-align:  center;}
		ul{margin: 2px;display: inline-block;}
		ul li{width: 120px;display: block;list-style: none;float:left;text-align: center;right: 0;}
		ul li a{text-decoration: none;color:#000000;cursor: pointer;display:block;}
		ul li a:hover{color:#FEFCFF;}
		ul li:hover{background:;}
    </style>
</head>
<body>
<?php include 'includes/header.php';?>
<div class="container">
    <header class="body">
		<ul>
			<li class="btn angelBlue"><a href="index.php">Home</a></li>
			<li class="btn angelBlue" ><a href="payment.php">Payment</a></li>
			<li class="btn angelBlue" ><a href="loan.php">Loans</a></li>
			<li class="btn angelBlue"><a href="profile.php">profile</a></li>
			<li class="btn angelBlue"><a href="about.php">About</a></li>
		</ul>
		
		<button class="btn-cool milk nav-right"><a href="logout.php">logout</a></button>
	</header>
	<div id ="Home">
		<div class="" style="background: url(./img/tznotes4.jpg);background-size: cover;width: 100%;height: 100%;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
						<div class="back ">
							<div class="btn dark transparent">
								Record and Monitor, Your money activities
							</div>
			</div>
			<div class="btn-cool sageBush flex">
			<div class ="about_us success">
				<div class="a_holder default"><h4>Loan</h4></div>
				<div class="inner"><p style="text-align:left;font-size: 20px;font-style:italic;">Loans in our life are inevitable, therefore keeping records of every money borrowed is necessary.<br><br>
					Under this category you will be able to Record all money borrowed from others in here.<br><br>
					Also, all money rented to others wil be recorded as well.<br><br>
					Therefore all your loan transactions will be recorded to your preferences. <br><br><br><br>
				</p></div>
				</div>
				<div class="contact ribbon">
					<div class ="c_holder  default"><h4>Profile</h4></div>
					<div class="inner"><p style="text-align:left;font-size: 20px;font-style:italic;">username and password are crucial to ensure safety of your account.
						It is your responsibility to make sure your account is safe, to avoid any leakage.<br><br>
					Login informations can be changed here as well, it is good to change password several times.<br> <br>This is to void 
					the risk to be captured by others through phishing or other threat methodologies.<br><br> Also, profile picture can be changed alongside your password.  <br><br> </p> </div>
				</div>			
			<div class ="about_us">
				<div class="a_holder default" ><h4>Payments</h4></div>
				<div class="inner">	  
				<p style="text-align:left;font-size: 20px;font-style:italic;">In this part, you are able to Record all money spent and all money received.<br><br>You could say it could help you identify what have you spent and for what purpose. <br><br>This way You can control your ways of spending your money,<br><br> Also, you can realize important sources of your money. <br><br>Thus you will be able to save important information about your transactions.<br><br>
				</p>
				</div>
			</div>
			<div class="contact dodgerBlue">
				<div class ="c_holder blonde"><h4>About</h4></div>
				<div class="inner">				
					<div class="circle mid twalibu"></div>
				<p>TWALIB O MIWAH<br>Chief Engineer</p>
			</div>
			<div class="inner">				
				 <div class="circle mid petro"></div><p>PETRO N MBENGALO<br>Chief Coordinator</p> 			
				<div class="circle mid juma"></div><p>JUMA O RASHID<br>Junior Engineer</p>
			 </div>
			</div>
		</div>
		</div>
	</div> 
	</div>
	<?php include 'includes/footer.php';?>
</div>
<script type="text/javascript" src="malipo.js"></script>
</body>
</html>
