<?php require 'includes/db.inc.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" href="malipo.css">
	<style type="text/css">
	</style>
</head>
<body style="background: url('img/tz.jpg');background-size: 100%">
<div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
  		<p class="">TRANSACTION RECORDING SYSTEM</p>
  	</div><br>
<div class="center block" style="width: 65%;margin: auto;padding: 8px 4px;margin-top: 11px;">
  	<div class="box-md pad" style="width: 55%;margin: auto;padding:4px 11px;margin-top: 111px;text-align: center;">
  		<h1 class="center">Login</h1>
  	</div>
  <!-- /.login-logo -->
  <div class="box-md" style="width: 55%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6">
  <p class="login-box-msg">Sign in to start your session</p>
		<form method="post">

      <div class="form-group ">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div>
		  <div class="form-group ">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="form-group ">
          <button type="submit" name="login" class="btn-cool primary block">Sign In</button>
</div>
          <a class="btn-cool success block" style="bacground-color:green;" href="register.php" role="button">Register today</a>
  </div>
	</div>
  <br>
  <div class="alert danger" id="error"  style="width: 25%;margin: auto;display: none;"></div>
  <div style="position: fixed;;top:0;background: rgba(0,0,4,0.7); width: 100%;height: 100%;z-index: -1"></div>
  <!-- /.login-box-body -->
</div>
</form>
<div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
  		<p class="">@2021 PRODUCTION  CIVE #G7 ICT-MCD</p>
  	</div><br>
</body>
</html>
<?php
if (isset($_POST['login']))
{
	$user = $_POST['email'];
    $pass = $_POST['password'];
    $pass=md5($pass);
    $result = $con->query("select * from users where email='$user' AND password='$pass'");
    if($result->num_rows>0)
    {
    	session_start();
    	$data = $result->fetch_assoc();
    	$_SESSION['userId']=$data['id'];       
	  header('location:index.php');
      }
    else
    {
      $notice ="<div class='alert danger' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >Login failed, check your Username And password".$con->error."</div>";
      echo $notice;   
     }
}
 ?>
