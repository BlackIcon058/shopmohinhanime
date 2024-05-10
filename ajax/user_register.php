<?php
    require_once '../functions/db.php';
    require_once '../functions/functions.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = safe_value($con, $_POST['Name']);
        $email = safe_value($con, $_POST['Email']);
        $password = safe_value($con, $_POST['Password']);

        $gender = safe_value($con, $_POST['Gender']);
        $phone = safe_value($con, $_POST['Phone']);
        $address = safe_value($con, $_POST['Address']);

        $query = "select * from user_registers where email='$email'";
        $result = mysqli_query($con, $query);


        $query1 = "select * from user_registers where name='$name'";
        $result1 = mysqli_query($con, $query1);

        if(mysqli_num_rows($result)){
            echo 'Email Already Exits ';
        }elseif(mysqli_num_rows($result1)){
            echo 'Username is already taken';
        }
        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO user_registers (name, email, address, phone, password, dateofbirth, sex, status) VALUES ('$name', '$email','$address','$phone', '$hash', '0000-00-00 00:00:00', '$gender', '1')";
            $result = mysqli_query($con, $query);
        
            if ($result) {
                echo " You have successfully Registered";
            }
        }
    
        
    }
?>