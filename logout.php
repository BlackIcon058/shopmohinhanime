<?php
session_start();
unset($_SESSION['EMAIL_USER_LOGIN']);
unset($_SESSION['user_id']);
unset($_SESSION['USERNAME_USER_LOGIN']);
unset($_SESSION['order_code']);
header("location:index.php");
?>
