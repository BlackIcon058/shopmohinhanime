<?php
require_once 'inc/header.php';


$value = view_product();
$allDonHang = tatca_donhang();

?>

<?php

if (!isset($_SESSION['ADMIN'])) {
    header("location: index.php");
}

?>

<?php
// if ($_SESSION['ADMIN_ROLE'] != 1) {
//     header("location: dashboard.php");
// }
?>

<?php
if (isset($_GET['order_code'])) {
    $order_details = xem_chitiet_donhang_admin($_GET['order_code']);
}
?>

<?php require_once 'inc/nav.php'; ?>

<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="app-title">
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><b>Order Details </b></a></li>
                </ul>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div>
                    <h3 class="tile-title">Customer information</h3>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Name Account</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order_details as $row) : ?>
                                <?php
                                extract($row)
                                ?>
                                <tr>
                                    <td><?php echo $row['user_name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>

                                </tr>
                                <?php break; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div>
                    <h3 class="tile-title">Shipping information</h3>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Fee Shipping</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order_details as $row) : ?>
                                <?php
                                extract($row)
                                ?>
                                <tr>
                                    <td><?php echo $row['name_shipping'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>
                                    <td><?php echo $row['fee_shipping'] ?></td>
                                </tr>
                                <?php break; ?>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div>
                    <h3 class="tile-title">Order Information</h3>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Product's Name</th>
                                <th>Image</th>
                                <!-- <th>Quantity-Inventory</th> -->
                                <th>Quantity</th>
                                <th>Product's Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_price = 0;
                            $i = 0;
                            ?>
                            <?php foreach ($order_details as $sp) : ?>
                                <?php
                                extract($sp)
                                ?>
                                <tr>
                                    <td><?php
                                        $i++;
                                        echo $i;
                                        ?></td>
                                    <td><?= $p_name ?></td>
                                    <td><img src="./img/<?php echo $img; ?>" alt="" width="100px;"></td>
                                    <!-- <td> -->
                                        <input type="hidden" name="order_qty_storage" class="order_qty_storage_<?php echo $p_id; ?>" value="<?php echo $qty; ?>">
                                        <!-- <input type="text" readonly value="<?php echo $qty ?>" name="product_quantity"> -->
                                        <input type="hidden" name="order_code" class="order_code_input" value="<?php echo $order_code ?>">
                                        <input type="hidden" name="order_product_id" class="order_product_id" value="<?php echo $p_id; ?>">
                                    <!-- </td> -->
                                    <td>
                                        <input type="text" readonly value="<?php echo $product_quantity ?>" name="product_sales_quantity" class="input_qty order_qty_<?php echo $p_id; ?>">
                                    </td>
                                    <td><?php echo $product_price ?> VND</td>
                                    <td><?php echo $product_quantity * $product_price; ?>VND</td>
                                    <!-- <td>Special</td> -->
                                </tr>
                                <?php
                                $total_price += $product_quantity * $product_price;
                                ?>
                            <?php endforeach ?>
                        </tbody>

                        <tr>
                            <td colspan="9" class="color_qty_{{$details->product_id}}">
                                <?php
                                if ($order_status == 1) {
                                ?>
                                    <form>
                                        <select class="order_details">
                                            <option value="">----Select order status----</option>
                                            <option id="<?php echo $order_id; ?>" value="1" selected>Confirmed</option>
                                            <option id="<?php echo $order_id; ?>" value="2">Successful delivery</option>
                                            <option id="<?php echo $order_id; ?>" value="3">Cancel order</option>
                                        </select>
                                    </form>
                                <?php
                                } elseif ($order_status == 2) {
                                ?>
                                    <form>
                                        <select class="order_details">
                                            <option value="">----Select order status----</option>
                                            <option id="<?php echo $order_id; ?>" value="1">Confirmed</option>
                                            <option id="<?php echo $order_id; ?>" value="2" selected>Successful delivery</option>
                                            <option id="<?php echo $order_id; ?>" value="3">Cancel order</option>

                                        </select>
                                    </form>
                                <?php
                                } elseif ($order_status == 3) {
                                ?>
                                    <form>
                                        <select class="order_details">
                                            <option value="">----Select order status----</option>
                                            <option id="<?php echo $order_id; ?>" value="1">Confirmed</option>
                                            <option id="<?php echo $order_id; ?>" value="2">Successful delivery</option>
                                            <option id="<?php echo $order_id; ?>" value="3" selected>Cancel order</option>
                                        </select>
                                    </form>
                                <?php
                                }
                                ?>

                            </td>
                        </tr>

                        <tr>
                            <th colspan="5">Total:</th>
                            <td><?php echo $total_price; ?> VND</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require_once 'inc/footer.php'; ?>