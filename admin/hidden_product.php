<?php
require_once 'inc/header.php';
?>

<?php
if (!isset($_SESSION['ADMIN']) || !isset($_GET['id'])) {
    header("location: index.php");
}
?>

<?php
// if ($_SESSION['ADMIN_ROLE'] != 1) {
//     header("location: dashboard.php");
// }

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // if ($_SESSION['ADMIN_ROLE'] == 1) {
    $query = "UPDATE products SET status = '0' WHERE p_id = '$product_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>alert("Sản phẩm đã được ẩn khỏi trang web.");</script>';
        header("location: manage_product.php");
        exit;
    }

    // } else {
    //     header("location: dashboard.php");
    // } 
}

?>