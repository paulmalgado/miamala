<?php
session_start();
if(!isset($_SESSION['userId']))
{
  header('location:login.php');
}
else{}
 ?>
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
			<li class="btn angelBlue" ><a id="paytab" href="payment.php">Payment</a></li>
			<li class="btn angelBlue" ><a href="loan.php">Loans</a></li>
			<li class="btn angelBlue"><a href="profile.php">profile</a></li>
			<li class="btn angelBlue"><a href="about.php">About</a></li>
		</ul>
		<button class="btn-cool milk nav-right"><a href="logout.php">logout</a></button>
	</header>
	
		<div class="me" style="background-size: cover;width: 100%;height: 100%;">			
			
		<div class="ba">
		<div class="btn dark transparent">
								PAYMENTS
							</div>
			<div class="left">
					
			<a href="addpayment.php"><button class='btn-cool dodgerBlue'>Record New Transaction</button></a>
				
				</div>
			</div>
			</div>
			<div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
			<h2 class="">PAYMENTS AND RECEIPTS TRANSACTIONS RECORDED</h2>
		</div>
			<table id="payment">
				<tr>
				  <th>#</th>
				  <th>Payment Details</th>
				  <th>Payment Type</th>
				  <th>Payment Mode</th>
				  <th>Context</th>
				  <th>Amount</th>
				  <th>Date</th>
				  <th>Action</th>
				</tr>
				<tr>	<?php
				$payments=$con->query("select * from payments where userid='$_SESSION[userId]'");
				$i=0;
        while ($row = $payments->fetch_assoc())
        {
          $i=$i+1;
        ?>
				<tr>
				<td><?php echo $i; ?></td>
            <td><?php echo $row['details']; ?></td>
            <td><?php echo $row['type']; ?></td>
			<td><?php echo $row['mode']; ?></td>
            <td><?php echo $row['context']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['date']; ?></td>
			<td colspan="center"><a href="delete.php?items=<?php echo $row['id'] ?>&url=<?php echo $_SERVER['QUERY_STRING'] ?>"><button class='btn-cool danger btn-xs'>Delete Item</button></a><td>
			</tr>	 
			<?php } ?> 
		</table>
		
		<div class="modal" id="myModal1">
			<!-- Modal content -->
			<form method="POST">
			<div class="modal-content">
			  <div class="modal-header">
				<span class="close" data-dismis="modal">&times;</span>
				<h2>Add New Transaction</h2>
			  </div>
			  <div class="modal-body">
		  <div class="me">
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
		  </div>
			  </div>
			  <div class="modal-footer">
				<!-- <h3>Modal Footer</h3> -->
				<button type="button" class="btn default" id="closeD" data-dismis="modal">Close</button>
        <button type="submit" class="btn primary" name="savepay">Save Transaction</button>
			  </div>
			</div>
		  </div>
		</div>
		</form>
		<?php include 'includes/footer.php';?>
</div>

<script type="text/javascript" src="modal.js"></script>
</body>
</html>