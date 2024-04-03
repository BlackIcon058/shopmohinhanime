<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php require_once 'inc/nav.php'; ?>

<?php
$products = get_products("");
// $all_product = get_all_products();
$cat = display_cat();

//phân trang
$limit = 6; // Số sản phẩm trên mỗi trang
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Lấy số trang hiện tại
$start = ($page - 1) * $limit; // Tính vị trí bắt đầu
$sql = "SELECT products.* FROM products 
WHERE products.status = 1 LIMIT $start, $limit";
$query = mysqli_query($con, $sql);
$sql_total = "SELECT COUNT(*) AS total FROM products 
WHERE products.status = 1";
$query_total = mysqli_query($con, $sql_total);
$result_total = mysqli_fetch_assoc($query_total);
$total_pages = ceil($result_total['total'] / $limit); // Tính tổng số trang
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
?>


<div class="arrow-btn">
  <a href="#"><i class='bx bx-up-arrow-alt'></i></a>
</div>

<!--BANNER-->
<div class="banner-container">
  <div class="banner">
    <div class="banner-text">
      <h1 style="color: red ; text-shadow: 2px 2px #00ff40;"><i>WELCOME TO ANIME HEAVEN</i></h1>
      <a href="#product" class="banner-btn">SEE MORE</a>
    </div>
  </div>
</div>

<!--NEW ARRIVAL-->
<div id="new"></div>
<div class="arrival-container">
  <div class="title">New Arrival</div>
  <div class="hr-line"></div>

  <!--item 1-->
  <div class="arrival">
    <div class="arrival-img">
      <div class="arrival-price">Only $199.99</div>
      <img src="https://nekotwo.com/cdn/shop/files/2_25b2dce5-5d2d-400c-bfcb-df05b96e3486.jpg?v=1686760279">
    </div>

    <div class="arrival-content">
      <p>[Pre-order] Genshin Impact - Kamisato Ayaka(Frostflake Heron) 1/7 Scale Figure Apex Innovation</p>
      <h1>Ayaka</h1>
      <button class="btn buy-btn">Shop Now</button>
    </div>
  </div>

  <!--item 2-->
  <div class="arrival">
    <div class="arrival-content">
      <p>[Pre-order] Genshin Impact - HuTao Springy Chibi Mini Figure Apex Innovation</p>
      <h1>Hutao</h1>
      <button class="btn buy-btn">Shop Now</button>
    </div>

    <div class="arrival-img">
      <div class="arrival-price">Only $24.99</div>
      <img src="https://nekotwo.com/cdn/shop/files/1_1549ef87-3359-43bf-a0c6-2def02992710.jpg?v=1697078116">
    </div>
  </div>
</div>

<!--PRODUCTS-->
<div id="product"></div>
<div class="container">
  <div class="title">Products</div>
  <div class="hr-line"></div>

  <!--Hien thi theo phan loai-->
  <div class="grid__column">
    <div class="home-filter">
      <span class="home-filter__label"><b>Category:</b></span>
      <?php
      while ($row = mysqli_fetch_assoc($cat)) {
      ?>
        <li><span class="home-filter__btn1 btn1"><a href="category.php?id=<?php echo $row['id']; ?>"><b>
                <?php echo $row['cat_name'] ?>
              </b></a></span></li>
        <!-- <li><span class="home-filter__btn1 btn1 btn1--primary"><a href="onmyoji.html"><b>ONMYOJI</b></a></span></li>
        <li><span class="home-filter__btn1 btn1"><a href="estream.html"><b>ESTREAM</b></a></span></li>
        <li><span class="home-filter__btn1 btn1 btn1--primary"><a href="aniplex.html"><b>ANIPLEX</b></a></span></li>
        <li><span class="home-filter__btn1 btn1"><a href="alter.html"><b>ALTER</b></a></span></li>
        <li><span class="home-filter__btn1 btn1 btn1--primary"><a href="bandaispirits.html"><b>BANDAI_SPIRITS</b></a></span></li> -->
      <?php
      }
      ?>
    </div>
  </div>

  <div class="listProduct">
    <!-- Dữ liệu sản phẩm sẽ được nhúng vào đây -->

    <?php
    while ($result = mysqli_fetch_assoc($query)) {
    ?>
      <a href="product.php?p_id=<?php echo $result['p_id'] ?>" class="item">
        <!-- <div class="cart-icon">
          <i class="bx bx-cart"></i>
        </div> -->
        <div class="image-product">
          <img src="./admin/img/<?php echo $result['img'] ?>" alt="Product img">
        </div>
        <h2><?php echo $result['product_name'] ?></h2>
        <div class="price">$ <?php echo $result['price'] ?></div>
      </a>
    <?php
    }
    ?>


    <!-- <a href="prod/detail.html?id=2" class="item">
      <div class="cart-icon">
        <i class="bx bx-cart"></i>
      </div>
      <div class="image-product">
        <img src="https://nekotwo.com/cdn/shop/products/pre-order-punishing-gray-raven-liv-luminance-generic-final-normal-edition-deluxe-edition-17-scale-figure-unknown-model6974678880049-205018_1024x1024.jpg?v=1658339635" alt="Product 2">
      </div>
      <h2>Product 2</h2>
      <div class="price">$ 19.99</div>
    </a>
    <a href="prod/detail.html?id=2" class="item">
      <div class="cart-icon">
        <i class="bx bx-cart"></i>
      </div>
      <div class="image-product">
        <img src="https://nekotwo.com/cdn/shop/products/pre-order-punishing-gray-raven-liv-luminance-generic-final-normal-edition-deluxe-edition-17-scale-figure-unknown-model6974678880049-205018_1024x1024.jpg?v=1658339635" alt="Product 2">
      </div>
      <h2>Product 2</h2>
      <div class="price">$ 19.99</div>
    </a>
    <a href="prod/detail.html?id=2" class="item">
      <div class="cart-icon">
        <i class="bx bx-cart"></i>
      </div>
      <div class="image-product">
        <img src="https://nekotwo.com/cdn/shop/products/pre-order-punishing-gray-raven-liv-luminance-generic-final-normal-edition-deluxe-edition-17-scale-figure-unknown-model6974678880049-205018_1024x1024.jpg?v=1658339635" alt="Product 2">
      </div>
      <h2>Product 2</h2>
      <div class="price">$ 19.99</div>
    </a>
    <a href="prod/detail.html?id=2" class="item">
      <div class="cart-icon">
        <i class="bx bx-cart"></i>
      </div>
      <div class="image-product">
        <img src="https://nekotwo.com/cdn/shop/products/pre-order-punishing-gray-raven-liv-luminance-generic-final-normal-edition-deluxe-edition-17-scale-figure-unknown-model6974678880049-205018_1024x1024.jpg?v=1658339635" alt="Product 2">
      </div>
      <h2>Product 2</h2>
      <div class="price">$ 19.99</div>
    </a>
    <a href="prod/detail.html?id=2" class="item">
      <div class="cart-icon">
        <i class="bx bx-cart"></i>
      </div>
      <div class="image-product">
        <img src="https://nekotwo.com/cdn/shop/products/pre-order-punishing-gray-raven-liv-luminance-generic-final-normal-edition-deluxe-edition-17-scale-figure-unknown-model6974678880049-205018_1024x1024.jpg?v=1658339635" alt="Product 2">
      </div>
      <h2>Product 2</h2>
      <div class="price">$ 19.99</div>
    </a> -->
    <!-- Thêm các sản phẩm khác nếu cần -->
  </div>
</div>

<!--Phan trang-->
<?php
if ($total_pages != 0) {
?>


  <div class="pagination">
    <li class="btn-prev current-page">
      <a href="?page=<?php echo ($current_page > 1) ? ($current_page - 1) : 1; ?>" class="page-link">
        << /a>
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
}
?>

<!-- Footer  -->

<?php require_once 'inc/footer.php'; ?>