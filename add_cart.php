<?php require_once './functions/db.php'; ?>
<?php require_once './functions/functions.php'; ?>
<?php session_start(); ?>
<?php
$_SESSION['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$customer_id = $_SESSION['user_id'];

if (isset($_POST['product_id'], $_POST['qty']) && ($_POST['qty'] > 0)) {
    $product_id = $_POST['product_id'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['qty'];

    $cartExist = "SELECT * FROM cart 
                WHERE customer_id = '$customer_id' AND product_id = '$product_id'";
    $result = mysqli_query($con, $cartExist);

    if (mysqli_num_rows($result) > 0) {
        $updateQuery = "UPDATE cart 
                    SET product_quantity = product_quantity + 1 
                    WHERE customer_id = '$customer_id' AND product_id = '$product_id'";
        $resultUpdate = mysqli_query($con, $updateQuery);
        if (!$resultUpdate) {
            echo "Lỗi: " . mysqli_error($con);
            $_SESSION['message'] = 'Lỗi!';
        } else {
            echo "Update quantity of product successful!";
            $_SESSION['message'] = 'Update quantity of product successful!';
        }
    } else {
        $data = [
            'customer_id' => $customer_id,
            'product_id' => $product_id,
            'product_price' => $product_price,
            'product_quantity' => $product_quantity
        ];

        $insertQuery = "INSERT INTO cart (customer_id, product_id, product_price, product_quantity) 
                VALUES ('$customer_id', '$product_id', '$product_price', '$product_quantity')";

        $result = mysqli_query($con, $insertQuery);
        if (!$result) {
            echo "Lỗi: " . mysqli_error($con);
            $_SESSION['message'] = 'Lỗi!';
        } else {
            echo "Add product successful!";
            $_SESSION['message'] = 'Add product successful!';
        }
    }
}

header("location: cart.php");
?>
