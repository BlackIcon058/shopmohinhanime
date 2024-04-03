<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php require_once 'inc/nav.php';
if (!isset($_SESSION['EMAIL_USER_LOGIN'])) {
	// header("location: index.php");
	echo "<script>window.location.href = 'index.php';</script>";
	exit;
}
?>

<?php
$view_customer = get_user_registers($_SESSION['user_id']);
$row = mysqli_fetch_assoc($view_customer);
$address = $row['address'];
?>

<div class="row-check">
	<div class="col-70">
		<div class="container">
			<!-- <form action=""> -->
			<form class="checkout-form" action="update_profile.php" method="post">
				<div class="row">

							<div class="col-50">
								<h3>Profile Info</h3>
								<label for="fname"><i class="fa fa-user"></i>Name</label>
								<input type="text" id="fname" name="name" placeholder="">

								<label for="Email"><i class="fa fa-user"></i>Email</label>
								<input type="text" id="Email" name="email" placeholder="">

								<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
								<input type="text" id="adr" name="address" value="<?php echo $address; ?>" placeholder="Your Address">

								<label for="city"><i class="fa fa-institution"></i> Phone Number</label>
								<input type="text" id="phone" name="phone" placeholder="">

								<label for="dateofbirth"><i class="fa fa-institution"></i> Date Of Birth</label>
								<input type="text" id="dateofbirth" name="dateofbirth" placeholder="">

								<label for="gender"><i class="fa fa-institution"></i> Gender</label>
								<input type="text" id="gender" name="gender" placeholder="">
							</div>



					<!-- <div class="col-50">
							<h3>Payment</h3>
							<label for="cname">Name on Card</label>
							<input type="text" id="cname" name="cardname" placeholder="">
							<label for="ccnum">Credit card number</label>
							<input type="text" id="ccnum" name="cardnumber" placeholder="">
							<label for="expmonth">Exp Month</label>
							<input type="text" id="expmonth" name="expmonth" placeholder="">
							<div class="row">
								<div class="col-50">
									<label for="expyear">Exp Year</label>
									<input type="text" id="expyear" name="expyear" placeholder="">
								</div>
								<div class="col-50">
									<label for="cvv">CVV</label>
									<input type="text" id="cvv" name="cvv" placeholder="">
								</div>
							</div>
						</div> -->
					<!-- </form> -->
				</div>

				<button type="submit" class="btn">Update</button>

				<!-- <a href="" class="btn">Pay by ATM/Visa/Master</a> -->
				<!-- </form> -->
		</div>
	</div>
</div>

<?php require_once 'inc/footer.php'; ?>