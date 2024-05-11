<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php require_once 'inc/nav.php'; ?>

<?php
if (!isset($_SESSION['EMAIL_USER_LOGIN'])) {
    header("location: index.php");
}
?>

<?php
$_SESSION['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$allDonHang = tatca_donhang($_SESSION['user_id']);

// phan trang
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;


// $sql = "SELECT * FROM `order` WHERE customer_id = '{$_SESSION['user_id']}' LIMIT $start, $limit";

$sql = "SELECT `order`.*, SUM(order_detail.product_quantity * order_detail.product_price) AS total_order
FROM `order`
JOIN order_detail ON `order`.order_code = order_detail.order_code
WHERE customer_id = '{$_SESSION['user_id']}'
GROUP BY `order`.order_code
LIMIT $start, $limit";

$query = mysqli_query($con, $sql);
$sql_total = "SELECT COUNT(*) AS total FROM `order`
WHERE customer_id = '{$_SESSION['user_id']}'";


$query_total = mysqli_query($con, $sql_total);
$result_total = mysqli_fetch_assoc($query_total);
$total_pages = ceil($result_total['total'] / $limit);
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
?>

<section class="cart-section spad" style="padding-top: 0; margin-bottom: 400px; margin-top: 100px;">

    <div class="container">
        <h4>Your Order History </h4>
        <div class="site-pagination">
            <a href="index.php">Home</a> /
            <a href="">Your Order History</a>
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
                        <?php
                        // echo $total_pages;
                        if ($total_pages != 0) {
                        ?>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Code Bill</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Order date</th>
                                        <th style="text-align: center;">Total amount</th>

                                        <th style="text-align: center;">View order details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                    if ($allDonHang && mysqli_num_rows($allDonHang) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) { ?>
                                        <tr>
                                            <td><?php echo $row['order_code']; ?></td>

                                            <td>
                                                <?php
                                                if ($row['order_status'] == 1) {
                                                    echo "Confirmed";
                                                } elseif ($row['order_status'] == 2) {
                                                    echo "Delivered successfully";
                                                } elseif ($row['order_status'] == 3) {
                                                    echo "Canceled order";
                                                }
                                                ?>
                                            </td>

                                            <td><?php echo $row['order_date']; ?></td>
                                            <td><?php echo $row['total_order'];?> VND</td>

                                            <td>
                                                <a href="view_order_details_history.php?order_code=<?php echo $row['order_code']; ?>" class="edit" title="View" data-toggle="tooltip"><i class="flaticon-file"></i> View details</a>
                                            </td>
                                        </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                            <br>

                            <div class="clearfix">
                                <div class="pagination">
                                    <li class="btn-prev current-page">
                                        <a href="?page=<?php echo ($current_page > 1) ? ($current_page - 1) : 1; ?>" class="page-link">
                                            <</a>
                                    </li>
                                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                        <li class="current-page <?php echo ($i == $current_page) ? 'pg-active' : 'pg-disable'; ?>">
                                            <a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    <!-- <li class="btn-next current-page"><a class="page-link">></a></li> -->
                                    <li class="btn-next current-page">
                                        <a href="?page=<?php echo ($current_page < $total_pages) ? ($current_page + 1) : $total_pages; ?>" class="page-link">></a>
                                    </li>
                                </div>
                            <?php
                        } else {
                            ?>
                                <p>No orders yet!</p>
                            <?php
                        }
                            ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

<?php require_once 'inc/footer.php'; ?>