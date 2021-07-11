<?php

$indextitle = 'index';

session_start();

include '../core/classes/Users.view.php';

if (isset($_POST['loginbtn'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$userlogin = new UsersView();
	$userlogin->userloginview($username, $password);
}

if (isset($_POST['signupbtn'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$usersignup = new UsersView();
	$usersignup->usersignupview($firstname, $lastname, $username, $password);
}

?>

<!DOCTYPE html>
<html>
<?php include_once 'partials/head.php'; ?>
<body>
<div class="container">
	<form action="" method="POST" accept-charset="utf-8" class='loginform'>
		<h2>LOGIN</h2>
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<button type="submit" name='loginbtn'>Login</button>
	</form>

	<form action="" method="POST" accept-charset="utf-8" class='signupform'>
		<h2>SIGNUP</h2>
		<input type="text" name="firstname" placeholder="First Name">
		<input type="text" name="lastname" placeholder="Last Name">
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<button type="submit" name='signupbtn'>Signup</button>
	</form>

	<button type="button" class='switchformbutton'><i class="fas fa-chevron-right"></i></button>

</div>
</body>
</html>