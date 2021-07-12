<?php

$indextitle = 'owner';

session_start();

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
			<h3>Collected Coins : </h3>
		</div>
		<nav>
			<ul class='navlist'>
				<li><a href="#" title="profile" id='profilebtn'><i class="far fa-user-circle"></i></a></li>
				<li><a href="../core/logout.php" title="logout" id='logoutbtn'><i class="fas fa-sign-out-alt"></i></a></li>
			</ul>
			<button type="button" class='navlistbtn'><i class="fas fa-long-arrow-alt-left"></i>&nbsp;&nbsp;&nbsp;Owner</button>
		</nav>
	</header>

	<div class="container">

	</div>
</body>
</html>