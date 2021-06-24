<?php
session_start();
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
<br><br>
<div class="box-md joi pad" style="width: 40%;margin: auto;padding:4px 11px;margin-top: 11px;text-align: center;">
	  <div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
			<p class="">ADD NEW  TRANSACTION</p>
		</div><br>

		<form method="POST" enctype="multipart/form-data" >
        <div class="form-group">
				  <input type="text" name="details" id="" placeholder="Transaction Details" required>
			  </div>
			  <div class="form-group">
				<select name="paytype" id="ptype" aria-placeholder="pay">
					<option value= "nonen" selected disabled>--Transaction Type--</option>
					<option value="expense">Expenditure</option>
					<option value="receipt">Receipt</option>
				</select>
			</div>
			<div class="form-group">
				<select name="paymode" id="pmode">
					<option value="none" selected disabled>--Transaction Mode--</option>
					<option value="Cash">Cash</option>
					<option value="AirtelMoney">AirtelMoney</option>
					<option value="Mpesa">Mpesa</option>
					<option value="Tigopesa">Tigo Pesa</option>
					<option value="Tpesa">T-Pesa</option>
					<option value="Halopesa">Halopesa</option>
					<option value="ezypesa">ezypesa</option>
					<option value="Bank">Bank</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="context" id="context" placeholder="Context" required>
			</div>
			<div class="form-group">
				<input type="number" name="amount" id="Amount" placeholder="AMOUNT" required>
			</div>
			<div class="form-group">
				<input type="date" name="date" id="" placeholder="Date" required>
			</div>            
            <a href="payment.php" class="btn-cool success">Back To payments</a><button type="submit" name="savepay"  class="btn-cool primary" style="bacground-color:green;">Save Transaction</button>            
            </form>
            </div>
            <?php
 
 $notice="";
  if (isset($_POST['savepay']))
  {
    if ($con->query("insert into payments (details,mode,type,context,amount,date,userid) value ('$_POST[details]','$_POST[paymode]','$_POST[paytype]','$_POST[context]','$_POST[amount]','$_POST[date]',$_SESSION[userId])")) 
	{
		$notice ="<div class='alert success' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >Succesfully Added</div>";
		echo $notice;
    }
    else{
		$notice ="<div class='alert danger' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >Transaction failed:".$con->error."</div>";
		echo $notice;
	}	
  }
   ?>
 
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
									$notice ="<div class='alert danger'>Error is:".$con->error."</div>";
									echo $notice;
									}   
}
}?>
