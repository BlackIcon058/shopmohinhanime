<?php require_once './functions/db.php'; ?>
<?php require_once './functions/functions.php'; ?>
<?php session_start(); ?>

<?php
$_SESSION['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$customer_id = $_SESSION['user_id'];
// $cart = show_giohang($customer_id);

?>

<?php

if (!empty($_POST["address"]) ) {
    $address = $_POST["address"];
    $customer_id = $_SESSION['user_id'];
    $sql = "UPDATE user_registers SET address = '$address' WHERE id = $customer_id";
    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Successful update address!"); window.location.href="profile_info.php";</script>';
    } else {
        echo '<script>alert("Fail update address!"); window.location.href="profile_info.php";</script>';
    }
} else {
    echo '<script>alert("Please input address!"); window.location.href="profile_info.php";</script>';
}   


?>