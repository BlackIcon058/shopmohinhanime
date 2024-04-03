<?php require_once 'inc/header_login.php';
?>
<!-- Navigation -->
<?php
require_once 'inc/nav_login.php';

?>

<?php

if (isset($_SESSION['EMAIL_USER_LOGIN'])) {
  echo '<script>alert("Vui lòng đăng xuất trước khi đăng ký tài khoản mới!");</script>';
  echo '<script>window.location.href = "index.php";</script>';
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
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
    <a href="index.php" class="logo"><i class='bx bxl-flutter'></i>FIGURE SHOP</a>
  </header>

  <!-- form signup -->
  <div class="signup">
    <div class="signup__container">
      <h1>Sign up</h1>
      <div id="error" style="color: red; font-weight: bolder; text-align: center;"></div>
      <div id="success" style="color: green; font-weight: bolder;  text-align: center;"></div>
      <form class="contact-form" method="post">
        <!-- <h5>Full name</h5>
        <input type="text" class="input-signup-fullname" /> -->
        <h5>User name</h5>
        <input id="name" type="text" class="input-signup-username" />
        <h5>Email</h5>
        <input id="email" type="email" class="input-signup-username" />
        <h5>Password</h5>
        <input id="password" type="password" class="input-signup-password" />
        <h5>Confirm password</h5>
        <input id="cpassword" type="password" class="input-signup-password" />
        <h5>Gender</h5>
        <select id="gender" style="width: 50%; height: 7%; margin-bottom: 20px; padding-bottom: 3px;" class="form-control" id="exampleSelect2">
          <option value="">-- Choose your gender --</option>
          <option value="1">Male</option>
          <option value="0">Female</option>
        </select>
        <h5>Phone number</h5>
        <input id="phone" type="text" class="input-signup-phonenumber" />
        <h5>Address</h5>
        <input id="address" type="text" class="input-signup-address" />
        <button type="button" id="btn_register" class="signup__signInButton">Sign up</button>
      </form>
      <a href="./login.php" class="signup__registerButton">Already have account?</a>
    </div>
  </div>
</body>
<!-- <script src="./assets/JS/signup.js"></script>
<script src="./assets/JS/main.js"></script> -->

</html>