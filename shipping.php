<?php require_once 'inc/header.php'; ?>
<!-- Navigation -->
<?php require_once 'inc/nav.php';
$cart = show_giohang($_SESSION['user_id']);

if (!isset($_SESSION['EMAIL_USER_LOGIN']) || !($cart && $cart->num_rows > 0)) {
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
	
	<div class="small-container cart-page">
	<h2>SHIPPING INFORMATION</h2>
	<br>
		<h2>Cart</h2>
		<br>
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

					<form>
						<input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">

						<tr>
							<td>
								<div class="cart-info">
									<img src="admin/img/<?php echo $value['product_image']; ?>" style="width: 50px;">
									<div>
										<p><?php echo $value['product_title']; ?></p>
										<small>Price: <?php echo $value['product_price']; ?> VND</small>
										<br>
									</div>
								</div>
							</td>
							<td>
								<input type="number" readonly min="1" id="product_quantity_cart" name="product_quantity" value="<?php echo $value['product_quantity']; ?>">
							</td>
							<td><?php echo $subtotal; ?> VND</td>
						</tr>
					</form>
			<?php
				}
			}
			// }
			?>

		</table>
		<br>

		<!-- <div class="total-price"> -->
		<!-- <h4>Quantity of products: <?php echo $count_qty_product; ?></h4> -->

		<h4>Total : <?php echo $total; ?> VND</h4>
		<!-- <table style="height: 50%;">
				<tr>
					<td style="text-align: right; font-size: larger; font-weight: bold ;">
						<center>TOTAL :</center>
					</td>
					<td style="width: 25.7%;">></td>
					<td style="width: 19.5%;"><?php echo $total; ?> VND</td>
				</tr>
			</table> -->
		<!-- </div> -->
	</div>


	<div class="col-70">
		<div class="container">
			<!-- <form action=""> -->
			<form class="checkout-form" action="checkout.php" method="post">
				<div class="row">
					<!-- <form class="checkout-form" action="order.php" method="post"> -->
					<div class="col-50">

						<h3>Shipping Information</h3>

						<label for="fname"><i class="fa fa-user"></i> Full Name</label>
						<input style="font-weight: 700;" type="text" id="fname" name="name" placeholder="" value="<?php echo $get_user_name ?>">

						<label for="city"><i class="fa fa-institution"></i> Phone Number</label>
						<input style="font-weight: 700;" type="text" id="phone" name="phone" placeholder="" value="<?php echo $get_user_phone ?>">
						<!-- <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
							<input type="text" id="adr" name="address" readonly value="<?php echo $address ?>"> -->
						<!-- <br> -->
						<!-- <label for="" style="color: red; font-weight: bolder;"><i class="fa fa-user"></i> Please Choose Address to Cash Payment or Online Payment!</label> -->
						<div id="additional-address">
							<label for="use-default-address" class="checkbox-custom-label"><i class="fa fa-address-card-o"></i> Address</label>
							<input type="text" style="font-weight: bolder;" id="adr" name="address" readonly value="<?php echo $address ?>">
							<button type="button" id="add-address-btn">Add Address</button>
							<input type="text" id="additional-adr" name="additional_address" style="display: none; font-weight: bolder;" placeholder="Additional Address">
							<button type="button" id="delete-address-btn" style="display: none;">Delete</button>
							<button type="button" id="use-address-btn" style="display: none;">Use Address</button>
						</div>

						<br><br>
										

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

				<!-- <div>
					<select id="payment" name="payment_method" style="width: 50%; height: 7%; margin-bottom: 20px; padding-bottom: 3px;" class="form-control" id="exampleSelect2">
						<option value="default">-- Select your payment method --</option>
						<option value="cash_payment">Payment upon delivery</option>
						<option value="online_payment">Pay by VNPAY</option>
					</select>
				</div> -->

				<!-- <button type="submit" name="cash_payment" value="cash_payment" class="btn">Check out</button>
				<button type="submit" name="redirect" value="online_payment" class="btn">Check</button> -->
				<!-- <a href="" class="btn"></a> -->

				<!-- Nút submit cho phương thức thanh toán khi chọn "Payment upon delivery" -->
				<button type="submit" id="cashPaymentBtn" name="cash_payment" value="cash_payment" class="btn">Proceed to checkout</button>
				<!-- Nút submit cho phương thức thanh toán khi chọn "Pay by VNPAY" -->
				<!-- <button type="submit" id="onlinePaymentBtn" name="redirect" value="online_payment" class="btn" style="display: none;">Proceed to payment</button> -->
			</form>
		</div>
	</div>


</div>



<style>
	th {
		background-color: #ffffff;
	}

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
				var confirmation = confirm("Do you want to choose a new address for this order?");
				if (confirmation) {
					mainAddressInput.value = additionalAddressInput.value;
					additionalAddressInput.style.display = 'none';
					deleteAddressBtn.style.display = 'none';
					useAddressBtn.style.display = 'none';
				}
			} else {
				alert("Please enter new address before selecting!");
			}
		});
	});
</script>

<script>
	// Chọn phần tử select
	var paymentSelect = document.getElementById('payment');
	// Chọn phần tử button cho "Payment upon delivery"
	var cashPaymentBtn = document.getElementById('cashPaymentBtn');
	// Chọn phần tử button cho "Pay by VNPAY"
	var onlinePaymentBtn = document.getElementById('onlinePaymentBtn');

	// Thêm sự kiện change cho select
	paymentSelect.addEventListener('change', function() {
		// Nếu giá trị của select là 'cash_payment'
		if (paymentSelect.value === 'cash_payment') {
			// Hiển thị nút "Payment upon delivery" và ẩn nút "Pay by VNPAY"
			cashPaymentBtn.style.display = 'inline-block';
			onlinePaymentBtn.style.display = 'none';
		} else if (paymentSelect.value === 'online_payment') {
			// Nếu giá trị của select là 'online_payment'
			// Hiển thị nút "Pay by VNPAY" và ẩn nút "Payment upon delivery"
			cashPaymentBtn.style.display = 'none';
			onlinePaymentBtn.style.display = 'inline-block';
		} else {
			// Nếu không có lựa chọn nào được chọn, ẩn cả hai nút
			cashPaymentBtn.style.display = 'none';
			onlinePaymentBtn.style.display = 'none';
		}
	});
</script>

<?php require_once 'inc/footer.php'; ?>