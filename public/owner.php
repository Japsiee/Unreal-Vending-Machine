<?php

$indextitle = 'owner';

require_once '../core/classes/Refill.controller.php';

session_start();

if (!isset($_SESSION['ownerid'])) {
	header('location: index.php');
} else {
	$ownerid = $_SESSION['ownerid'];
	$ownerusername = $_SESSION['ownerusername'];
	$collectedcoins = $_SESSION['collectedcoins'];
}

if (isset($_POST['addstocksbtn'])) {
	$cokeqty = $_POST['cokequantity'];
	$pepsiqty = $_POST['pepsiquantity'];
	$sodaqty = $_POST['sodaquantity'];
	$refill = new RefillController();
	$refill->pushStocks($cokeqty,$pepsiqty,$sodaqty);
}

?>

<!DOCTYPE html>
<html>
<?php include_once 'partials/head.php'; ?>
<body>
	<!-- <div class="deposit">
		<form action="" method="POST" accept-charset="utf-8" class='formdeposit'>
			<button type="button" class='close'><i class="fas fa-times"></i></button>
			<h2>Deposit Money</h2>
			<input type="hidden" name="depositid" value="<?php echo $id; ?>">
			<input type="text" name="depositmoney" placeholder="PHP Amount: ex. 140000">
			<button type="submit" name='confirmdeposit' class='confirmdeposit'>Transfer <i class="fas fa-exchange-alt"></i></button>
		</form>
	</div> -->

	<header>
		<div class="coins">
			<h3>Collected Coins : <?php echo $collectedcoins; ?></h3>
		</div>
		<nav>
			<ul class='navlist'>
				<li><a href="#" title="profile" id='profilebtn'><i class="far fa-user-circle"></i></a></li>
				<li><a href="../core/logout.php" title="logout" id='logoutbtn'><i class="fas fa-sign-out-alt"></i></a></li>
			</ul>
			<button type="button" class='navlistbtn'><i class="fas fa-long-arrow-alt-left"></i>&nbsp;&nbsp;&nbsp;<?php echo $ownerusername; ?></button>
		</nav>
	</header>

	<div class="container">
		<div class="stocks">
			<ul class='tabs'>
				<li data-target='#dashboard' class='active'>Dashboard</li>
				<li data-target='#refill'>Refill</li>
			</ul>
			<div id="dashboard" class='panel active'>
				<div class="dashboard">
					<h3>Dashboard</h3>
				</div>
			</div>
			<div id="refill" class='panel'>
				<div class="refill">
					<h3>Refill</h3>
						<div class="drink">
							<form action="" method="POST" accept-charset="utf-8">
								<div>
									<img src="img/coke.svg" alt="coke" class='drinks'>
									<input type="number" name="cokequantity" placeholder="Quantity of Coke (ex. 5)" value="0">
								</div>
								<div>
									<img src="img/pepsi.svg" alt="pepsi" class='drinks'>
									<input type="number" name="pepsiquantity" placeholder="Quantity of Pepsi (ex. 5)" value="0">
								</div>
								<div>
									<img src="img/soda.svg" alt="soda" class='drinks'>
									<input type="number" name="sodaquantity" placeholder="Quantity of Soda (ex. 5)" value="0">
								</div>
								<button type="submit" name="addstocksbtn">Add Stocks</button>
							</form>
						</div>
				</div>
			</div>
		</div>
	</div>
<script src='js/owner.app.js' type='text/javascript' charset='utf-8' async defer></script>
</body>
</html>