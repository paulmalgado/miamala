<?php
session_start();

if(!isset($_SESSION['userId']))
{
  header('location:login.php');
}
 ?>
<?php require "function.php" ?>
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
			<li class="btn angelBlue" ><a id="loantab" href="loan.php">Loans</a></li>
			<li class="btn angelBlue"><a href="profile.php">profile</a></li>
			<li class="btn angelBlue"><a href="about.php">About</a></li>
		</ul>
		<button class="btn-cool milk nav-right"><a href="logout.php">logout</a></button>
	</header>
	
		<div class="me" style="background: url(./img/mostwanted.png);background-size: cover;width: 100%;height: 100%;">
		<div class="back">
		<div class="btn dark transparent">
								<h2>LOANS</h2>
							</div>
		<div class="right">	<ul>
					<li></li>
					<button class="btn-cool about_us dodgerBlue" id="btn">Register New Loan</button>
				</ul>
				</div></div>
			<br>
			<br>
			<?php
  $notice="";
  if (isset($_POST['saveloan']))
  {

    if ($con->query("insert into loans (name,mode,context,amount,date,status,userid) value ('$_POST[fname]','$_POST[loanmode]','$_POST[lcontext]','$_POST[lamount]','$_POST[ldate]','$_POST[lstatus]',$_SESSION[userId])")) {
  
	$notice ="<div class='alert success' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: -1' >Loan Successfully added:".$con->error."</div>";
									echo $notice;
		    }
    else
  {	$notice ="<div class='alert danger' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >Loan failed to be recorded:".$con->error."</div>";
	echo $notice;
}
 }
   ?>
			<div class="btn-cool center block dodgerBlue" style="width: 45%;margin: auto;padding: 8px 4px;margin-top: 11px;">
			<h2 class="">LOAN TRANSACTIONS RECORDED</h2>
		</div>
			<table id="payment">
				<tr>
				  <th>#</th>
				  <th>Full Name</th>
				  <th>Loan Mode</th>
				  <th>Context</th>
				  <th>Amount</th>
				  <th>Date</th>
				  <th>Status</th>
				  <th>Action</th>
				</tr>
				<?php
				$loans=$con->query("select * from loans where userid='$_SESSION[userId]'");
				$i=0;
        while ($row = $loans->fetch_assoc())
        {
          $i=$i+1;
		  $id = $row['id'];
        ?>
		<tr>
				<td><?php echo $i; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['mode']; ?></td>
            <td><?php echo $row['context']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['status'];?></td>
			<td colspan="center"><a href="delete.php?item=<?php echo $row['id'] ?>&url=<?php echo $_SERVER['QUERY_STRING'] ?>"><button class='btn-cool danger btn-xs'>Delete Item</button></a><a href="update.php?item=<?php echo $row['id'] ?>&url=<?php echo $_SERVER['QUERY_STRING'] ?>"><button class='btn-cool dodgerBlue'>Update Record</button></a></td>				  
				  
				  <?php }?></tr>
				  <!-- gghgg -->
			  </table>
			  <form method="POST">
		<div class="modal" name="addloan" id="myModal">
			<!-- Modal content -->
			
			<div class="btn-cool modal-content">

			  <div class="btn-cool default platnum">
				<span class="close" data-dismis="modal">&times;</span>
				<h2>Record a Loan Transaction</h2>
			  </div>
			  <div class="modal-body">
			  <div class="form-group">
				  <input type="text" name="fname" id="" placeholder="Full Name" required>
			  </div>
	
			  <div class="form-group">
				<select name="loanmode" id="ltype" name="ltype" aria-placeholder="pay">
					<option value= "nonen" selected disabled>--Loan Mode Type--</option>
					<option value="Creditors">Cash In</option>
					<option value="Debtors">Cash Out</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="lcontext" id="" placeholder="Context" required>
			</div>
			<div class="form-group">
				<input type="number" name="lamount" id="" placeholder="AMOUNT" required>
			</div>
			<div class="form-group">
				<input type="date" name="ldate" id="" placeholder="Date" required>
			</div>
			<div class="form-group">
				<select name="lstatus" id="lstatus">
					<option value="none" selected disabled>--Loan Status--</option>
					<option value="Paid">Paid</option>
					<option value="Pending">Pending</option>
				</select>
			</div>
			  </div>
			  <div class="modal-footer">
				<!-- <h3>Modal Footer</h3> -->
				<button type="button" class="btn default" id="closeD" data-dismis="modal">Close</button>
        <button type="submit" class="btn primary" name="saveloan">Record Loan</button>
			  </div>
			</div>
		  </div>
		</div>
		</form>
		<?php include 'includes/footer.php';?>
<script type="text/javascript" src="malipo.js"></script>
<script type="text/javascript" src="modal.js"></script>
</body>
</html>
