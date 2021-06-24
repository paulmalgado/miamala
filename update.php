<?php
session_start();
$row_id=$_GET['item'];
$_SESSION['Id']=$row_id;
if(!isset($_SESSION['userId']))
{
  header('location:login.php');
}
else{

 ?>

<?php include 'includes/db.inc.php';?>

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
<?php include 'includes/header.php';?>
<body>
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
<br><br>
<div class="box-md joi pad" style="width: 40%;margin: auto;padding:4px 11px;margin-top: 11px;text-align: center;">
  	
	  <div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
			<p class="">UPDATE LOAN INFORMATIONS</p>
		</div><br>
	<!-- /.login-logo -->
		<form method="POST" enctype="multipart/form-data" >
        <?php  

        $loan=$con->query("select * from loans where id='$row_id'");
				
        while ($row = $loan->fetch_assoc())
        {
        ?>

		<div class="form-group">
				  <input type="text" name="ufname" id="" placeholder="<?php echo $row['name']; ?>" disabled>
			  </div>
			  <div class="form-group">
              <input type="text" name="ulmode" id="" placeholder="<?php echo $row['mode']; ?>" disabled>
			</div>
			<div class="form-group">
				<input type="text" name="ulcontext" id="" placeholder="<?php echo $row['context']; ?>" disabled>
			</div>
			<div class="form-group">
				<input type="number" name="ulamount" id="" placeholder="<?php echo $row['amount']; ?>" required>
			</div>
            
			<div class="form-group">
				<input type="date" name="uldate" id="" placeholder="<?php echo $row['date']; ?>" required>
			</div>
			<div class="form-group">
				<select name="ulstatus" id="lstatus" required>
                <option value="<?php echo $row['status']; ?>" disabled>Paid</option>
                    <option value="Paid">Paid</option>
					<option value="Pending">Pending</option>
				</select>
			</div>			  
            <?php }?>
            <a href="loan.php" class="btn-cool success">Back To Loans</a><button type="submit" name="update"  class="btn-cool primary" style="bacground-color:green;">Update Loan</button>
			</form>
	  </div>
	  <br><br><br><br><br>
	  <?php include 'includes/footer.php';?>
</div>
<script type="text/javascript" src="malipo.js"></script>
<script type="text/javascript" src="modal.js"></script>
</body>
</html>


<?php
if (isset($_POST['update']))
 {
		
												
								if ($con->query("update loans SET amount='$_POST[ulamount]', status='$_POST[ulstatus]', date='$_POST[uldate]' where id='$_SESSION[Id]'"))
								{
									$notice ="<div class='alert success' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >Loan Successfully updated</div>";
									echo $notice;
								}
								else{
									$notice ="<div class='alert danger' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >Failed to update Loan information. Check connection".$con->error."</div>";
									echo $notice;
									}   
}
}?>
