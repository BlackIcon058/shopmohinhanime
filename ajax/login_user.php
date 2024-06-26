<?php
session_start();
require_once '../functions/db.php';
require_once '../functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = safe_value($con, $_POST['Name']);
    $password = safe_value($con, $_POST['Password']);
    $query = "select * from user_registers where name='$name'";
    $result = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        if ($row['status'] == 0) {
            echo 'Locked';
            exit;
        }
        $desh = password_verify($password, $row['password']);
        if ($desh == false) {
            echo 'Invalid';
        }

        if ($desh == true) {
            echo 'Valid';
            $_SESSION['EMAIL_USER_LOGIN'] = $row['email'];
            $_SESSION['USERNAME_USER_LOGIN'] = $row['name'];
            $_SESSION['user_id'] = $row['id'];
        }
    } else {
        echo 'Invalid';
    }
}
