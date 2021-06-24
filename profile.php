<?php
session_start();
if(!isset($_SESSION['userId']))
{
  header('location:login.php');
}
else{

 ?>

<?php include_once 'includes/db.inc.php';?>

<?php
$notice="";
if (isset($_POST['saveP']))
 {		
							$pass1 = $_POST['password'];
							$pass2 = $_POST['confpassword'];
							$pass=md5($pass1);
							if($pass1 != $pass2)
                            {
								?>
								<div style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' class='alert alert-danger'>Error! Password do not match</div>
								<?php
							}
							else {
								// code...}
								$target_file = $_FILES["fileToUpload"]['name'];
								move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "img/".$_FILES["fileToUpload"]["name"]);
								if ($con->query("update users set password='$pass', pic='$target_file' where id='$_SESSION[userId]'"))
								{
									$notice ="<div class='alert success' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >Successfully Saved</div>";
									
								}
								else{
									$notice ="<div class='alert danger' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >Failed to update user Profile. Check connection".$con->error."</div>";
								
									}
                            }
                            }

						}?>

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
		<div class="logo">
		</div>
		<ul>
			<li class="btn angelBlue"><a href="index.php">Home</a></li>
			<li class="btn angelBlue" ><a href="payment.php">Payment</a></li>
			<li class="btn angelBlue" ><a href="loan.php">Loans</a></li>
			<li class="btn angelBlue"><a href="profile.php">profile</a></li>
			<li class="btn angelBlue"><a href="about.php">About</a></li>
		</ul>
		<button class="btn-cool milk nav-right"><a href="logout.php">logout</a></button>
		
	</header>
<!-- <section id ="profile" hidden></section> -->
<br>
<br><br>
<div class="box-md joi pad" style="width: 40%;margin: auto;padding:4px 11px;margin-top: 11px;text-align: center;">
  	
	  <div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
			<p class="">USER PROFILE SETTINGS</p>
		</div><br>
	<!-- /.login-logo -->
		<form method="POST" enctype="multipart/form-data" >
			<div class="form-group has-feedback ">
				  
		  <input type="password" name="password" class="form-control" id="pas" placeholder="Password" required>
		  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
			  <div class="form-group has-feedback">
				  
		  <input type="password" name="confpassword" class="form-control" id="cpas" placeholder="confirm Password" required>
		  
		</div>
			  <div class="form-group has-feedback">
				  
				  <input type="file" name="fileToUpload" 	class="form-control" id="fileToUpload" placeholder="picture" required>
				  <span class="glyphicon glyphicon-user form-control-feedback"></span>
			  </div>
			  					  
									  <button type="submit" name="saveP"  class="btn-cool success block" style="bacground-color:green;">Save</button>
	  </div>
	  <br><br><br><br><br>
	  <?php echo $notice;?>
	  <?php include 'includes/footer.php';?>
</div>
<script type="text/javascript" src="malipo.js"></script>
<script type="text/javascript" src="modal.js"></script>
</body>
</html>

