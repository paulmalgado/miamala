<?php require "function.php" ?>
<?php include_once 'includes/db.inc.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
	<style type="text/css">
	<?php include 'malipo.css'; ?>

	</style>
	
</head>
<body style="background: url('img/tz.jpg');background-size: 100%">
	
<div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
  		<p class="">TRANSACTION RECORDING SYSTEM</p>
  	</div><br>

<div class="box-md joi pad" style="width: 40%;margin: auto;padding:4px 11px;margin-top: 11px;text-align: center;">
  	
	<div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
  		<p class="">USER REGISTRATION</p>
  	</div><br>
  <!-- /.login-logo -->
  	<form method="POST" enctype="multipart/form-data" >
			<div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" id="em" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
		  <div class="form-group has-feedback ">
				
        <input type="password" name="password" class="form-control" id="pas" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
			<div class="form-group has-feedback">
				
        <input type="password" name="confpassword" class="form-control" id="cpas" placeholder="confirm Password" required>
        
      </div>
			<div class="form-group has-feedback">
				
				<input type="text" name="name" class="form-control" id="nam" placeholder="name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
			<div class="form-group has-feedback">
				
				<input type="file" name="fileToUpload" 	class="form-control" id="fileToUpload" placeholder="picture" required>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				
        <input type="number" id="asa" name="number" class="form-control" placeholder="phone" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
									<a class="btn success " style="bacground-color:green;" href="login.php" name="saveDetail" role="button">Login</a>
									<button type="submit" name="saveP"  class="btn-cool primary" style="bacground-color:green;">Save

									<span class="glyphicon glyphicon-check"></span></button>

  

	</div>
  <br>
  <div class="alert alert-danger" id="error"  style="width: 25%;margin: auto;display: none;"></div>
  <div style="position: fixed;;top:0;background: rgba(0,0,0,0.7); width: 100%;height: 100%;z-index: -1"></div>

  <!-- /.login-box-body -->
</div>

</form>
<div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
  		<p class="">@2021 PRODUCTION  CIVE #G7 ICT-MCD</p>
  	</div><br>

</body>
</html>

<?php
if (isset($_POST['saveP']))
 {
	
	$result=$con->query("select * from users");
$checker=0;
	while($data = $result->fetch_assoc())
	{
		if($data['email']==$_POST['email']){
			$checker=1;
			 $notice ="<div style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' class='alert alert-danger'>User already exist, change email!!</div>";
			 echo $notice;
break;	}
		else{$checker=2;}
	}
	if($checker==2){
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
								if ($con->query("insert into Users (email,password,name,pic,number) values ('$_POST[email]','$pass','$_POST[name]','$target_file','$_POST[number]')"))
								{
									$notice ="<div class='alert success' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >Successfully Saved</div>";
									echo $notice;
								}
								else{
									$notice ="<div class='alert danger' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >User Registration Failed. Check server connection".$con->error."</div>";
									echo $notice;
									}
								}
}
}
?>
