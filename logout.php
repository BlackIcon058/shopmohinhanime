<?php
session_start();
unset($_SESSION['EMAIL_USER_LOGIN']);
unset($_SESSION['user_id']);
unset($_SESSION['USERNAME_USER_LOGIN']);
unset($_SESSION['order_code']);
unset($_SESSION['name_checkout']);
unset($_SESSION['phone_checkout']);
unset($_SESSION['address_checkout']);

header("location:index.php");
?>
