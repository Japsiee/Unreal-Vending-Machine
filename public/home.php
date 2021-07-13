<?php

$indextitle = 'home';

session_start();

if (!isset($_SESSION['id'])) {
	header('location: index.php');
}

require '../core/classes/Inventory.view.php';
require '../core/classes/Deposit.controller.php';
require '../core/classes/Product.controller.php';
require '../core/classes/Product.view.php';

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$coins = $_SESSION['coins'];

// User Inventory fetch

$inventory = new InventoryView();
$inventory->viewInventory($id);

$inventoryId = $_SESSION['inventoryid'];
$coke = $_SESSION['coke'];
$pepsi = $_SESSION['pepsi'];
$soda = $_SESSION['soda'];

// Product item quantity fetch

$product = new ProductView();
$product->viewProduct();

$cokeqty = $_SESSION['cokequantity'];
$pepsiqty = $_SESSION['pepsiquantity'];
$sodaqty = $_SESSION['sodaquantity'];


// Deposit Process

if (isset($_POST['confirmdeposit'])) {
	$depositid = $_POST['depositid'];
	$depositmoney = $_POST['depositmoney'];
	if (empty($depositmoney)) {
		echo 'you didnt put a money value';
	} else {
		$transac = new DepositController();
		$transac->deposit($depositid, $depositmoney);
	}
}

// Buy Product | COKE | PEPSI | SODA

if (isset($_POST['buycoke'])) {
	$itemName = $_POST['itemCoke'];
	$buyCoke = new ProductController();
	$buyCoke->buyItem($id, $coins, $itemName);
	header('location: home.php');
}

if (isset($_POST['buypepsi'])) {
	$itemName = $_POST['itemPepsi'];
	$buyPepsi = new ProductController();
	$buyPepsi->buyItem($id, $coins, $itemName);
	header('location: home.php');
}

if (isset($_POST['buysoda'])) {
	$itemName = $_POST['itemSoda'];
	$buySoda = new ProductController();
	$buySoda->buyItem($id, $coins, $itemName);
	header('location: home.php');
}

// VARIABLES

// $id
// $username
// $password
// $firstname
// $lastname
// $coins

// $inventoryId
// $coke
// $pepsi
// $soda

// $cokeqty
// $pepsiqty
// $sodaqty

?>

<!DOCTYPE html>
<html>
<?php include_once 'partials/head.php'; ?>
<body>
	<div class="deposit">
		<form action="" method="POST" accept-charset="utf-8" class='formdeposit'>
			<button type="button" class='close'><i class="fas fa-times"></i></button>
			<h2>Deposit Money</h2>
			<input type="hidden" name="depositid" value="<?php echo $id; ?>">
			<input type="text" name="depositmoney" placeholder="PHP Amount: ex. 140000">
			<button type="submit" name='confirmdeposit' class='confirmdeposit'>Transfer <i class="fas fa-exchange-alt"></i></button>
		</form>
	</div>

	<header>
		<div class="coins">
			<h3><i class="fab fa-bitcoin"></i> : <?php echo $coins; ?></h3>
		</div>
		<nav>
			<ul class='navlist'>
				<li><a href="#" title="profile" id='profilebtn'><i class="far fa-user-circle"></i></a></li>
				<li><a href="#" title="deposit" id='depositbtn'><i class="fas fa-wallet"></i></a></li>
				<li><a href="../core/logout.php" title="logout" id='logoutbtn'><i class="fas fa-sign-out-alt"></i></a></li>
			</ul>
			<button type="button" class='navlistbtn'><i class="fas fa-long-arrow-alt-left"></i>&nbsp;&nbsp;&nbsp;<?php echo $firstname . ' ' . $lastname; ?></button>
		</nav>
	</header>

	<div class="container">
		<div class="products">
			<div class="item">
				<span class='quantity'><i class="fas fa-layer-group"></i> : <?php echo $cokeqty; ?></span>
				<span class='price'><i class="fab fa-bitcoin"></i> : 25</span>
				<img src="img/coke.svg" alt="coke" class='drinks'>
				<button type="button" class='itemBuyBtn'>Buy</button>
				<div class="blocker">
					<div class="question">
						<h2>Are you sure you want to buy this item?</h2>
						<div class="buttons">
							<form action="" method="POST" accept-charset="utf-8">
								<input type="hidden" name="itemCoke" value='coke'>
								<button type="submit" class='confirm' name='buycoke'>YES</button>
								<button type="button" class='cancel'>NO</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<span class='quantity'><i class="fas fa-layer-group"></i> : <?php echo $pepsiqty; ?></span>
				<span class='price'><i class="fab fa-bitcoin"></i> : 35</span>
				<img src="img/pepsi.svg" alt="pepsi" class='drinks'>
				<button type="button" class='itemBuyBtn'>Buy</button>
				<div class="blocker">
					<div class="question">
						<h2>Are you sure you want to buy this item?</h2>
						<div class="buttons">
							<form action="" method="POST" accept-charset="utf-8">
								<input type="hidden" name="itemPepsi" value='pepsi'>
								<button type="submit" class='confirm' name='buypepsi'>YES</button>
								<button type="button" class='cancel'>NO</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<span class='quantity'><i class="fas fa-layer-group"></i> : <?php echo $sodaqty; ?></span>
				<span class='price'><i class="fab fa-bitcoin"></i> : 45</span>
				<img src="img/soda.svg" alt="soda" class='drinks'>
				<button type="button" class='itemBuyBtn'>Buy</button>
				<div class="blocker">
					<div class="question">
						<h2>Are you sure you want to buy this item?</h2>
						<div class="buttons">
							<form action="" method="POST" accept-charset="utf-8">
								<input type="hidden" name="itemSoda" value='soda'>
								<button type="submit" class='confirm' name='buysoda'>YES</button>
								<button type="button" class='cancel'>NO</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="inventory">
			<h2>Inventory</h2>
			<div>
				<p>Coke: <span><?php echo $coke; ?></span></p>
				<p>Pepsi: <span><?php echo $pepsi; ?></span></p>
				<p>Soda: <span><?php echo $soda; ?></span></p>
			</div>
		</div>

	</div>
<script src='js/home.app2.js' type='text/javascript' charset='utf-8' async defer></script>
</body>
</html>