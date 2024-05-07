<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php require_once 'inc/nav.php';
if (!isset($_SESSION['EMAIL_USER_LOGIN']) || (empty($_SESSION['shopping_cart']))) {
	// header("location: index.php");
	echo "<script>window.location.href = 'index.php';</script>";
	exit;
}
?>
<?php
$get_user_name = get_user_name($_SESSION['user_id']);
$get_user_phone = get_user_phone($_SESSION['user_id']);
$get_address_customer = get_user_address($_SESSION['user_id']);
$row = mysqli_fetch_assoc($get_address_customer);
$address = $row['address'];
?>

<div class="row-check">
	<div class="col-70">
		<div class="container">
			<!-- <form action=""> -->
			<form class="checkout-form" action="order.php" method="post">
				<div class="row">
					<!-- <form class="checkout-form" action="order.php" method="post"> -->
					<div class="col-50">
						<!-- <?php echo count($_SESSION['shopping_cart']); ?> -->

						<h3>Shipping Info</h3>


						<label for="fname"><i class="fa fa-user"></i> Full Name</label>
						<input style="font-weight: 700;" type="text" id="fname" name="name" placeholder="" value="<?php echo $get_user_name ?>">

						<label for="city"><i class="fa fa-institution"></i> Phone Number</label>
						<input style="font-weight: 700;" type="text" id="phone" name="phone" placeholder="" value="<?php echo $get_user_phone ?>">
						<!-- <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
							<input type="text" id="adr" name="address" readonly value="<?php echo $address ?>"> -->
						<br>
						<label for="" style="color: red; font-weight: bolder;"><i class="fa fa-user"></i> Please Choose Address to Cash Payment or Online Payment!</label>
						<div id="additional-address">
							<label for="use-default-address" class="checkbox-custom-label"><i class="fa fa-address-card-o"></i> Address</label>
							<input type="text" style="font-weight: bolder;" id="adr" name="address" readonly value="<?php echo $address ?>">
							<button type="button" id="add-address-btn">Add Address</button>
							<input type="text" id="additional-adr" name="additional_address" style="display: none; font-weight: bolder;" placeholder="Additional Address">
							<button type="button" id="delete-address-btn" style="display: none;">Delete</button>
							<button type="button" id="use-address-btn" style="display: none;">Use Address</button>
						</div>

						<br><br>

						<!-- <label for="zipcode"><i class="fa fa-envelope"></i> Zipcode</label> -->
						<input type="hidden" id="zipcode" name="zipcode" value="null" placeholder="">
						<!-- <label for="country"><i class="fa fa-envelope"></i> Country</label> -->
						<input type="hidden" id="zipcode" name="country" value="null" placeholder="">
						<input type="hidden" value="free" name="fee_shipping" id="ship-1">

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
				<button type="submit" name="cash_payment" value="cash_payment" class="btn">Payment upon delivery</button>
				<button type="submit" name="redirect" value="online_payment" class="btn">Pay by VNPAY</button>
				<!-- <a href="" class="btn"></a> -->
				<!-- </form> -->
		</div>
	</div>
</div>

<style>
	#delete-address-btn {
		background-color: #4CAF50;
		color: white;
		padding: 10px 20px;
		border: none;
		cursor: pointer;
		border-radius: 5px;
	}

	#use-address-btn {
		background-color: #4CAF50;
		color: white;
		padding: 10px 20px;
		border: none;
		cursor: pointer;
		border-radius: 5px;
	}

	#additional-address {
		margin-top: 20px;
		position: relative;
	}

	#add-address-btn {
		background-color: #4CAF50;
		color: white;
		padding: 10px 20px;
		border: none;
		cursor: pointer;
		border-radius: 5px;
	}

	#add-address-btn:hover {
		background-color: #45a049;
	}

	#additional-adr {
		margin-top: 10px;
		display: none;
	}
</style>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var addAddressBtn = document.getElementById('add-address-btn');
		var deleteAddressBtn = document.getElementById('delete-address-btn');
		var useAddressBtn = document.getElementById('use-address-btn');
		var additionalAddressInput = document.getElementById('additional-adr');

		addAddressBtn.addEventListener('click', function() {
			additionalAddressInput.style.display = 'block';
			additionalAddressInput.value = '';
			deleteAddressBtn.style.display = 'inline-block';
			useAddressBtn.style.display = 'inline-block'; // Hiển thị nút "Use Address"
		});

		deleteAddressBtn.addEventListener('click', function() {
			additionalAddressInput.style.display = 'none';
			deleteAddressBtn.style.display = 'none';
			useAddressBtn.style.display = 'none'; // Ẩn nút "Use Address" khi ẩn input
		});

		useAddressBtn.addEventListener('click', function() {
			// Code xử lý khi nhấn vào nút "Use Address"
			// Ví dụ: Gán giá trị của input vào một trường khác hoặc thực hiện các thao tác khác
		});
	});

	document.addEventListener('DOMContentLoaded', function() {
		var addAddressBtn = document.getElementById('add-address-btn');
		var deleteAddressBtn = document.getElementById('delete-address-btn');
		var useAddressBtn = document.getElementById('use-address-btn');
		var additionalAddressInput = document.getElementById('additional-adr');
		var mainAddressInput = document.getElementById('adr');

		useAddressBtn.addEventListener('click', function() {
			if (additionalAddressInput.value !== '') {
				var confirmation = confirm("Bạn có muốn chọn địa chỉ mới cho đơn hàng này!");
				if (confirmation) {
					mainAddressInput.value = additionalAddressInput.value;
					additionalAddressInput.style.display = 'none';
					deleteAddressBtn.style.display = 'none';
					useAddressBtn.style.display = 'none';
				}
			} else {
				alert("Vui lòng nhập địa chỉ mới trước khi chọn!");
			}
		});
	});
</script>

<?php require_once 'inc/footer.php'; ?>