<?php require_once './functions/db.php'; ?>
<?php require_once './functions/functions.php'; ?>
<?php session_start(); ?>
<?php
$_SESSION['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$customer_id = $_SESSION['user_id'];

if (isset($_POST['delete_cart'])) {
    $product_id = $_POST['product_id'];
    $deleteItemCart = "DELETE FROM cart 
                WHERE customer_id = '$customer_id' AND product_id = '$product_id'";
    $resultDelete = mysqli_query($con, $deleteItemCart);
    if (!$resultDelete) {
        echo "Lỗi: " . mysqli_error($con);
        $_SESSION['message'] = 'Lỗi!';
    } else {
        echo "Product removed from cart!";
        $_SESSION['message'] = 'Product removed from cart!';
    }
} else {
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    $cartExist = "SELECT * FROM cart 
                WHERE customer_id = '$customer_id' AND product_id = '$product_id'";
    $result = mysqli_query($con, $cartExist);
    if (mysqli_num_rows($result) > 0) {
        $updateQuery = "UPDATE cart 
                    SET product_quantity = '$product_quantity' 
                    WHERE customer_id = '$customer_id' AND product_id = '$product_id'";
        $resultUpdate = mysqli_query($con, $updateQuery);
        if (!$resultUpdate) {
            echo "Lỗi: " . mysqli_error($con);
            $_SESSION['message'] = 'Lỗi!';
        } else {
            echo "Update successfully quantity of product!";
            $_SESSION['message'] = 'Update successfully quantity of product!';
        }
    }
}

header("location: cart.php");
?>
