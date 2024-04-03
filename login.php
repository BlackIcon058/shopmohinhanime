<?php require_once 'inc/header_login.php';
?>
<!-- Navigation -->
<?php
require_once 'inc/nav_login.php';

?>

<?php
if (isset($_SESSION['EMAIL_USER_LOGIN'])) {
	echo '<script>alert("Đăng nhập thành công!");</script>';
	echo '<script>
	window.location.href = "index.php";</script>';
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login Customer</title>
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/login.css">
	<!-- font roboto -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> <!-- ICON -->
	<script src="assets/js_functions_for_customers/jquery-3.2.1.min.js"></script>
	<script src="assets/js_functions_for_customers/jQuery.js"></script>

</head>

<body>
	<header>
		<!--LOGO SHOP-->
		<a href="index.php" class="logo" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<i class='bx bxl-flutter'></i>
			FIGURE SHOP
		</a>
	</header>

	<!-- from login -->
	<div class="login">
		<div class="login__container">
			<h1>Login</h1>
			<div id="error" style="color: red; font-weight: bolder; text-align: center;"></div>
			<div id="success" style="color: green; font-weight: bolder;  text-align: center;"></div>
			<form class="contact-form" method="post">
				<h5>Email</h5>
				<input id="email" type="text" class="input-login-username" />
				<h5>Password</h5>
				<input id="password" type="password" class="input-login-password" />
				<button type="button" id="btn_login">Login</button>
			</form>
			<a href="./register.php" class="login__registerButton">Don't have account?</a>
		</div>
	</div>
</body>
<!-- <script src="./assets/JS/validation.js"></script> -->
<!-- <script src="./assets/JS/main.js"></script> -->

</html>