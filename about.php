<?php
session_start();

if(!isset($_SESSION['userId']))
{
  header('location:login.php');
}
 ?>

<?php require 'includes/db.inc.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Miamala
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
	<br>
	<div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
			<p class="">ABOUT TRANSACTIONS RECORDING SYSTEM</p>
		</div><br><br>
	<div class="box-md joi pad" style="width: 40%;margin: auto;padding:4px 11px;margin-top: 11px;text-align: left;">
	
	<h2>TRANSACTIONS RECORDING AND MANAGEMENT</h2><br><br>
			<p style="font-size:20px;">keeping records of your money movement, is all you need to do <br><br>to make sure that you know where every coin originate and where it is spent.<br><br>
				 
				Feel at home while using the system, as total privacy is assured not even admin can know what goes on to your account. <br><br>Be sure to keep your password and username safe. Another man knowing means another danger in your stake. <br><br>Remember to trust what you can. Enjoy!!

			</p><br>
</div>

	</div><br><br><br>
	<?php include 'includes/footer.php';?>
</body>
<script type="text/javascript" src="malipo.js">
</script>
</html>