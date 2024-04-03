<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php require_once 'inc/nav.php'; ?>


<?php
$_SESSION['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$cart = show_giohang($_SESSION['user_id']);
// print_r($_SESSION["shopping_cart"]);
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
    // if (!isset($_SESSION['EMAIL_USER_LOGIN'])) {

    if (isset($_SESSION['shopping_cart'])) {
      $total = 0;
      foreach ($_SESSION['shopping_cart'] as $key => $value) {
        if ($value['qty'] == 0)
          continue;
        $subtotal = $value['product_price'] * $value['qty'];
        $total += $subtotal;
        $count_qty_product++;
    ?>
        <form action="update_cart.php" method="post">

          <!--ITEM 1-->
          <tr>
            <td>
              <div class="cart-info">
                <img src="admin/img/<?php echo $value['product_image']; ?>">
                <div>
                  <p><?php echo $value['product_title']; ?></p>
                  <small>Price: $<?php echo $value['product_price']; ?></small>
                  <br>
                  <!-- <a href="">Remove</a> -->
                  <!-- <button type="submit" class="btn btn-sm btn-warning" value="<?php echo $value['product_id']; ?>" name="delete_cart">Remove</button> -->
                  <button type="submit" class="btn btn-sm btn-warning" value="<?php echo $value['product_id']; ?>" name="delete_cart" style="background-color: transparent; border: none; color: #ff9800; cursor: pointer; padding: 0; font: inherit; text-decoration: none; font-family: inherit">Remove</button>
                </div>
              </div>
            </td>
            <td>
              <!-- <input type="number" value="1" min="1"> -->
              <input type="number" min="1" id="product_quantity_cart" name="qty[<?php echo $value['product_id']; ?>]" value="<?php echo $value['qty']; ?>">
              <button type="submit" class="btn btn-sm btn-warning" name="update_qty_cart" style="background-color: transparent; border: none; color: #ff9800; cursor: pointer; padding: 0; font: inherit; text-decoration: none; font-family: inherit">Update</button>
            </td>
            <td>$<?php echo $subtotal; ?></td>
          </tr>
        </form>
        <!--ITEM 2-->
        <!-- <tr>
        <td>
          <div class="cart-info">
            <img src="https://nekotwo.com/cdn/shop/products/Nekotwo-_Pre-order_-Genshin-Impact---Klee-_Knights-of-Favonius-Ver._1-7-Scale-Figure-Apex-1672866412_360x.jpg?v=1672866413">
            <div>
              <p>Genshin Impact - Klee (Knights of Favonius Ver.)1/7 Scale Figure Apex</p>
              <small>Price: $100</small>
              <br>
              <a href="">Remove</a>
            </div>
          </div>
        </td>
        <td><input type="number" value="1" min="1"></td>
        <td>$100</td>
      </tr> -->

        <!--ITEM 3-->
        <!-- <tr>
        <td>
          <div class="cart-info">
            <img src="https://nekotwo.com/cdn/shop/products/pre-order-arknights-nian-unfettered-freedom-ver-17-scale-figure-anigame-462608_360x.jpg?v=1657278435">
            <div>
              <p>Arknights - Nian (Unfettered Freedom Ver.) 1/7 Scale Figure AniGame</p>
              <small>Price: $150</small>
              <br>
              <a href="">Remove</a>
            </div>
          </div>
        </td>
        <td><input type="number" value="1" min="1"></td>
        <td>$150</td>
      </tr> -->

      <?php
      }
    } else {
      // Hiển thị thông báo khi giỏ hàng trống
      ?>
      <tr>
        <td colspan="4">
          <?php

          echo 'Cart is empty';
          ?>

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
        <td style="width: 19.5%;"><?php echo $total; ?>$</td>
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
      <a class="btn buy-btn cart-btn" href="checkout.php">Procced to checkout</a>
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


<?php require_once 'inc/footer.php'; ?>