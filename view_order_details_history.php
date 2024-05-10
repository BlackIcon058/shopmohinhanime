<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php require_once 'inc/nav.php'; ?>

<?php
if (!isset($_SESSION['EMAIL_USER_LOGIN'])) {
    header("location: index.php");
}
?>
<?php
if (isset($_GET['order_code']) && kiem_tra_ma_don_hang($_GET['order_code'])) {
    $order_details = xem_chitiet_donhang($_GET['order_code']);
} else {
    echo '<script>alert("Mã đơn hàng không hợp lệ!"); window.location.href="index.php";</script>';
}
?>
<?php
$_SESSION['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$allDonHang = tatca_donhang($_SESSION['user_id']);
$get_status_order = get_status_order($_GET['order_code']);
$check_payment_method = check_payment_method($_GET['order_code']);
?>

<!-- Page info end -->
<!-- cart section end -->
<section class="cart-section spad" style="padding-top: 0; margin-bottom: 400px; margin-top: 100px;">
    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Your Order History </h4>
            <div class="site-pagination">
                <a href="index.php">Home</a>/
                <a href="">Details Order</a>
            </div>
        </div>
    </div>

    <div class="container order">
        <div class="row">
        </div>
        <div class="container-xl order_customer">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div>
                            <p style="font-weight: 700;">MÃ ĐƠN HÀNG: <?php echo $_GET['order_code'] ?> -
                                <?php
                                if ($get_status_order == 1) {
                                    echo 'Đã xác nhận';
                                } elseif ($get_status_order == 2) {
                                    echo 'Đã giao thành công';
                                } else {
                                    echo 'Đã hủy';
                                }
                                ?>
                            </p>
                        </div>
                        <br>

                        <p style="font-weight: 700;">Địa Chỉ Nhận Hàng</p>
                        <br>
                        <ul>
                            <?php foreach ($order_details as $row) : ?>
                                <?php
                                extract($row)
                                ?>
                                <li>Người nhận: <?php echo $row['name'] ?></li>
                                <li>Số điện thoại: <?php echo $row['phone'] ?></li>
                                <li>Địa chỉ nhận: <?php echo $row['address'] ?></li>
                                <li>Hình thức thanh toán:
                                    <?php
                                    if ($check_payment_method) {
                                        echo 'VNPay';
                                    } else {
                                        echo 'Thanh toán khi nhận hàng';
                                    }
                                    ?>
                                </li>

                                <?php break; ?>
                            <?php endforeach ?>
                        </ul>

                        <div class="row">
                            <div class="col-12 text-left">
                                <h3 class="tm-block-title d-inline-block">

                                </h3>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container order">
        <div class="row">
        </div>
        <div class="container-xl order_customer">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">

                        <div class="row">
                            <div class="col-12 text-left">
                                <h7 class="tm-block-title d-inline-block" style="color: red;">

                                </h7>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_price = 0;
                                $i = 0;
                                ?>

                                <!-- @foreach($order_details as $key => $details) -->
                                <?php foreach ($order_details as $sp) : ?>
                                    <?php
                                    extract($sp)
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            $i++;
                                            echo $i;
                                            ?>
                                        </td>
                                        <td><?php echo $product_name ?></td>
                                        <td>
                                            <img src="admin/img/<?php echo $img; ?>" height="100" width="100" alt="">
                                        </td>
                                        <td>
                                            <input type="text" disabled value="<?= $product_quantity ?>" name="product_quantity">
                                        </td>

                                        <td><?php echo number_format($product_price) . ' VND'; ?></td>
                                        <td><?php echo number_format($product_quantity * $product_price) . ' VND'; ?></td>
                                    </tr>
                                    <?php
                                    $total_price += $product_quantity * $product_price;
                                    ?>
                                <?php endforeach ?>

                            <tfoot>
                                <tr>
                                    <td colspan="5"><strong>Total order:</strong></td>
                                    <td><strong><?php echo $total_price; ?> VND</strong></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>