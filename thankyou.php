<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php require_once 'inc/nav.php';
if (!isset($_SESSION['EMAIL_USER_LOGIN']) || !isset($_GET['vnp_TransactionNo'])) {
  echo "<script>window.location.href = 'index.php';</script>";
  exit;
}
?>

<?php
if (isset($_GET['vnp_TransactionNo'])) {
  $vnp_amount = ($_GET['vnp_Amount'] / 23000) / 100;
  $vnp_bankcode = $_GET['vnp_BankCode'];
  $vnp_banktranno = $_GET['vnp_BankTranNo'];
  $vnp_cardtype = $_GET['vnp_CardType'];
  $vnp_orderinfo = $_GET['vnp_OrderInfo'];
  $vnp_paydate = $_GET['vnp_PayDate'];
  $vnp_responsecode = $_GET['vnp_ResponseCode'];
  $vnp_tmncode = $_GET['vnp_TmnCode'];
  $vnp_transactionno = $_GET['vnp_TransactionNo'];
  $order_code = $_SESSION['order_code'];
}

// Sử dụng hàm kiểm tra
if (!check_vnp_banktranno_exist($vnp_banktranno) && isset($_GET['vnp_BankTranNo'])) {
  //insert don hang va chi tiet don hang
  $table_order = "order";
  $table_order_details = "order_detail";
  $info_customer = get_user_registers($_SESSION['user_id']);
  $row = mysqli_fetch_assoc($info_customer);
  $name = $row['name'];
  $address = $row['address'];
  $phone = $row['phone'];
  $country = 'null';
  $zipcode = 'null';
  $fee_shipping = 'free';

  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $order_code = rand(0, 999999);
  $date = date("d/m/Y");
  $hour = date("h:i:sa");

  // insert don hang, va gio hang
  $data_order = array(
    'order_status' => '1',
    'order_code' => $order_code,
    'order_date' => $date . ' ' . $hour,
    'customer_id' => $_SESSION['user_id'],
  );

  insert_donhang($data_order);

  if (isset($_SESSION['shopping_cart'])) {
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
      $data_order_detail = array(
        'order_code' => $order_code,
        'product_id' => $value['product_id'],
        'product_quantity' => $value['qty'],
        'product_price' => $value['product_price'],
        'name' => $name,
        'address' => $address,
        'country' => $country,
        'zipcode' => $zipcode,
        'phone' => $phone,
        'fee_shipping' => $fee_shipping,
      );

      $success = insert_chitiet_donhang($data_order_detail);
    }
    unset($_SESSION["shopping_cart"]);
  }

  $insert_vnpay = "insert into vnpay(vnp_amount, vnp_bankcode, vnp_banktranno, vnp_cardtype, vnp_orderinfo, vnp_paydate, vnp_responsecode
, vnp_tmncode, vnp_transactionno, order_code) 
value('$vnp_amount', '$vnp_bankcode', '$vnp_banktranno', '$vnp_cardtype', '$vnp_orderinfo', '$vnp_paydate', 
'$vnp_responsecode', '$vnp_tmncode', '$vnp_transactionno', '$order_code')";

  $query = mysqli_query($con, $insert_vnpay);
  if ($query) {
    echo 'Thanh toán thành công thông qua VNPAY.';
    echo '<p>Vui lòng vào trang <a target="_blank" href="order_history">Xem lịch sử đơn hàng</a> Để xem chi tiết đơn hàng của bạn.</p>';
  } else {
    echo 'Giao dịch thất bại!';
  }
}

?>

<?php
if (check_vnp_banktranno_exist($vnp_banktranno) && !isset($_GET['vnp_BankTranNo'])) {
?>
  <section class="thank-you-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="thank-you-page-content">
            <a href="index.php" class="logo"><i class='bx bxl-flutter'></i>FIGURE SHOP</a>
            <h1>Thank you for your order! </h1>
            <?php
            if (isset($order_code)) {
            ?>
              <h2>Your order code: <?php echo $order_code ?></h2>
              <p>Vui lòng vào trang <a target="_blank" href="view_order_details_history.php?order_code=<?php echo $order_code ?>">Xem chi tiết đơn hàng của bạn</a></p>
              <br>
            <?php
            }
            ?>
            <a href="index.php" class="btn"> Go back to Homepage </a>
          </div>

        </div>
      </div>
    </div>
  </section>
<?php
} else {
  echo '<script>alert("Thanh toán không thành công!"); window.location.href="checkout.php";</script>';
}
?>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/css/thankyou.css">
<?php
unset($_SESSION['order_code']);
?>
<?php require_once 'inc/footer.php'; ?>