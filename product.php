<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php
require_once 'inc/nav.php';
$product_id = "";
if (isset($_GET['p_id'])) {
	$product_id = $_GET['p_id'];
}
$products = get_products('', $product_id);
$result = mysqli_fetch_assoc($products);
$related_product = get_related_products($result['category_name']);
?>


<div class="detail-container">
	<form action="add_cart.php" id="add_to_cart_form" method="post" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $result['p_id'] ?>" name="product_id">
		<input type="hidden" value="<?php echo $result['product_name'] ?>" name="product_title">
		<input type="hidden" value="<?php echo $result['img'] ?>" name="product_image">
		<input type="hidden" value="<?php echo $result['price'] ?>" name="product_price">
		<div class="detail">
			<div class="image">
				<img src="admin/img/<?php echo $result['img']; ?>" alt="">
			</div>

			<div class="content">
				<h1 class="name"><?php echo $result['product_name']; ?></h1>
				<div class="price"><?php echo $result['price']; ?> VND</div>
				<div class="description"><?php echo $result['description']; ?></div>

				<div class="product-configuration">
					<!-- <input type="number" value="1" min="1" max="99"> -->
					<input min="1" max="99" type="number" value="1" id="qty" name="qty" value="<?php echo $result['qty'] ?>">
					<?php
					if (!isset($_SESSION['USERNAME_USER_LOGIN'])) {
					?>
						<button type="button" onclick="alert('Please log in to add product!')" class="btn buy-btn">
							<a href="login.php" style="color: #fff; text-decoration: none;">Add to Cart</a>
						</button>
					<?php
					} else {
					?>
						<button type="submit" id="p_id" value="<?php echo $result['p_id'] ?>" class="btn buy-btn">Add to Cart</button>
					<?php

					}
					?>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function() {
						document.getElementById("add_to_cart_form").addEventListener("submit", function(event) {
							var quantity = document.getElementById("qty").value;
							if (quantity <= 0) {
								event.preventDefault();
								alert("Please select quantity of product at least 1!");
								document.getElementById("qty").value = 1;
							}
						});
					});
				</script>
			</div>
		</div>
	</form>
	<div class="title">Related Products</div>
	<div class="hr-line"></div>
	<div id="product" class="listProduct">
		<?php
		while ($row = mysqli_fetch_assoc($related_product)) {
		?>
			<a href="product.php?p_id=<?php echo $row['p_id'] ?>" class="item">
				<!-- <div class="cart-icon">
					<i class="bx bx-cart"></i>
				</div> -->
				<div class="image-product">
					<img src="./admin/img/<?php echo $row['img'] ?>" alt="Product img">
				</div>
				<h2><?php echo $row['product_name'] ?></h2>
				<div class="price"><?php echo $row['price'] ?> VND</div>
			</a>
		<?php
		}
		?>
	</div>
</div>



<?php require_once 'inc/footer.php'; ?>