<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php
require_once 'inc/nav.php';

$keyword = !empty($_GET["keyword"]) ? $_GET["keyword"] : '';
$result_find = search_product($keyword);

?>

<?php
$cat = display_cat();

$cat_id = "";
if (isset($_GET['id'])) {
	$cat_id = mysqli_real_escape_string($con, $_GET['id']);
}
$particular_product = get_products($cat_id);
$display_cat_links = display_cat_links($cat_id);
$result = mysqli_fetch_assoc($display_cat_links);

// phan trang
$limit = 6; // Số sản phẩm trên mỗi trang
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$sql = "SELECT * FROM `products` WHERE product_name like '%$keyword%' and products.status = 1 LIMIT $start, $limit ";
$query = mysqli_query($con, $sql);
$sql_total = "SELECT COUNT(*) AS total FROM `products` WHERE product_name like '%$keyword%' and products.status = 1";
$query_total = mysqli_query($con, $sql_total);
$result_total = mysqli_fetch_assoc($query_total);
$total_pages = ceil($result_total['total'] / $limit);
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
?>



<!--BANNER-->
<div class="banner-container">
	<div class="banner">
		<div class="banner-text">
			<h1 style="color: red ; text-shadow: 2px 2px #00ff40;"><i>WELCOME TO ANIME HEAVEN</i></h1>
			<a href="#product" class="banner-btn">SEE MORE</a>
		</div>
	</div>
</div>

<!--PRODUCTS-->
<div class="container">

	<div class="title">
		<h4>Search for: <?php echo $keyword; ?></h4>
		<p style="font-size: 20px;">Number of results found: <?php echo $result_total['total']; ?></p>
	</div>
	<div id="product" class="title">Products</div>
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
			<?php
			}
			?>
		</div>
	</div>

	<div class="listProduct">
		<?php
		$flag = true;
		if (mysqli_num_rows($query)) {

			while ($row = mysqli_fetch_assoc($query)) {
		?>
				<a href="product.php?p_id=<?php echo $row['p_id'] ?>" class="item">
					<div class="cart-icon">
						<i class="bx bx-cart"></i>
					</div>
					<div class="image-product">
						<img src="./admin/img/<?php echo $row['img'] ?>" alt="Product img">
					</div>
					<h2><?php echo $row['product_name'] ?></h2>
					<div class="price"><?php echo $row['price'] ?> VND</div>
				</a>
		<?php
			}
		} else {
			$flag = false;
			echo ' Record Not Found ';
		}
		?>
	</div>
</div>

<?php
if ($flag == true) {
?>
	<!--Phan trang-->
	<?php
	if ($total_pages != 0 && isset($_GET["keyword"])) {
	?>
		<div class="pagination">
			<li class="btn-prev current-page">
				<a href="?keyword=<?php echo $_GET["keyword"]; ?>&page=<?php echo ($current_page > 1) ? ($current_page - 1) : 1; ?>" class="page-link"><</a>
			</li>
			<?php for ($i = 1; $i <= $total_pages; $i++) : ?>
				<li class="current-page <?php echo ($i == $current_page) ? 'pg-active' : 'pg-disable'; ?>">
					<a href="?keyword=<?php echo $_GET["keyword"]; ?>&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
				</li>
			<?php endfor; ?>
			<li class="btn-next current-page">
				<a href="?keyword=<?php echo $_GET["keyword"]; ?>&page=<?php echo ($current_page < $total_pages) ? ($current_page + 1) : $total_pages; ?>" class="page-link">></a>
			</li>
		</div>
	<?php
	}
	?>
<?php
}
?>



<!-- Category section end -->
<?php require_once 'inc/footer.php'; ?>