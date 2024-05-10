<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php require_once 'inc/nav.php'; ?>


<?php
$_SESSION['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$cart = show_giohang($_SESSION['user_id']);
?>


<?php
if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
?>
  <script>
    alert("<?php echo $_SESSION['message']; ?>");
    <?php unset($_SESSION['message']); ?>
  </script>
<?php
}



?>
<pre>
	<?php
  // print_r($_SESSION["shopping_cart"]);
  ?>
</pre>

<!--BANNER-->
<div class="cart-banner-container">
  <div class="cart-banner">
    <div class="cart-banner-text">
      <h1>YOUR CART</h1>
    </div>
  </div>
</div>

<?php
if ($_SESSION['user_id'] == 0) {
?>
  <br>
  <div class="small-container cart-page centered-div">
    <a class="btn buy-btn cart-btn" href="login.php" style="width: 300px;">Vui lòng đăng nhập!</a>
    <!-- <a class="btn buy-btn cart-btn" href="checkout.php">Procced to checkout</a> -->
  </div>
<?php
} else {
?>
  <!--CART-->
  <div class="small-container cart-page">
    <table>
      <?php
      $total = 0;
      $count_qty_product = 0;
      ?>

      <tr>
        <th>PRODUCT</th>
        <th>QUANITY</th>
        <th>TOTAL</th>
      </tr>

      <?php
      if ($cart && $cart->num_rows > 0) {
        $total = 0;
        foreach ($cart as $key => $value) {
          if ($value['product_quantity'] == 0)
            continue;
          $subtotal = $value['product_price'] * $value['product_quantity'];
          $total += $subtotal;
          $count_qty_product++;
      ?>


          <form action="update_cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
            <!--ITEM 1-->
            <tr>
              <td>
                <div class="cart-info">
                  <img src="admin/img/<?php echo $value['product_image']; ?>">
                  <div>
                    <p><?php echo $value['product_title']; ?></p>
                    <small>Price: <?php echo $value['product_price']; ?> VND</small>
                    <br>
                    <!-- <a href="">Remove</a> -->
                    <!-- <button type="submit" class="btn btn-sm btn-warning" value="<?php echo $value['product_id']; ?>" name="delete_cart">Remove</button> -->
                    <button type="submit" class="btn btn-sm btn-warning" value="<?php echo $value['product_id']; ?>" name="delete_cart" style="background-color: transparent; border: none; color: #ff9800; cursor: pointer; padding: 0; font: inherit; text-decoration: none; font-family: inherit">Remove</button>
                  </div>
                </div>
              </td>
              <td>
                <!-- <input type="number" value="1" min="1"> -->
                <input type="number" min="1" id="product_quantity_cart" name="product_quantity" value="<?php echo $value['product_quantity']; ?>">
                <button type="submit" class="btn btn-sm btn-warning" name="update_qty_cart" style="background-color: transparent; border: none; color: #ff9800; cursor: pointer; padding: 0; font: inherit; text-decoration: none; font-family: inherit">Update</button>
              </td>
              <td><?php echo $subtotal; ?> VND</td>
            </tr>
          </form>

        <?php
        }
      } else {
        // Hiển thị thông báo khi giỏ hàng trống
        ?>
        <tr>
          <td colspan="4">
            <h2 style="text-align: center;">Cart is empty!</h2>
          </td>
        </tr>
      <?php
      }
      // }
      ?>

    </table>
    <br>
    <div class="total-price">
      <table style="height: 50%;">
        <tr>
          <td style="text-align: right; font-size: larger; font-weight: bold ;">
            <center>TOTAL :</center>
          </td>
          <td style="width: 25.7%;"><?php echo $count_qty_product; ?></td>
          <td style="width: 19.5%;"><?php echo $total; ?> VND</td>
        </tr>
      </table>

    </div>

    <?php
    if ($_SESSION['user_id'] != 0) {
    ?>
      <?php

      if ($total == 0) {
      ?>
        <!-- <a href="#" class="site-btn">Cart is Empty</a> -->
      <?php
      } else {
      ?>
        <a class="btn buy-btn cart-btn" href="shipping.php">Procced to checkout</a>
      <?php
      }
      ?>

    <?php
    } else {
    ?>
      <?php

      if ($total == 0) {
      ?>

      <?php
      } else {
      ?>
        <a class="btn buy-btn cart-btn" href="login.php">Please Login to checkout</a>
      <?php
      }
      ?>

    <?php
    }
    ?>

    <a class="btn buy-btn cart-btn" href="index.php">Continue Shopping</a>
    <!-- <a class="btn buy-btn cart-btn" href="checkout.php">Procced to checkout</a> -->
  </div>
<?php
}

?>


<style>
  .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Chiều cao của màn hình */
    }
    .centered-div {
        text-align: center; /* Căn giữa nội dung của div */
    }
</style>

<?php require_once 'inc/footer.php'; ?>