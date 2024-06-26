<?php
require_once 'db.php';

// display categories
function display_cat()
{
    global $con;
    $query = "select * from categories where status = 1";
    return $result = mysqli_query($con, $query);
}

// get products
function get_products($cat_id = '', $product_id = '')
{
    global $con;
    $query = "select * from products where status = 1 order by p_id desc";
    if ($cat_id != '') {
        $query = "select * from products where category_name = '$cat_id'";
    }

    if ($product_id != '') {
        $query = "select * from products where p_id = '$product_id'";
    }
    return $result = mysqli_query($con, $query);
}

// display cat links
function display_cat_links($category_id = '')
{
    global $con;


    $query = "SELECT products.p_id, products.category_name, categories.cat_name 
              FROM products 
              INNER JOIN categories ON products.category_name = categories.id 
              where products.category_name = '$category_id'";

    return mysqli_query($con, $query);
}

// get safe value
function safe_value($con, $value)
{
    return mysqli_real_escape_string($con, $value);
}

// Add to cart fun
function add_cart($pid, $qty)
{
    $_SESSION['CART'][$pid]['QTY'] = $qty;
}


// total cart value
function total_cart_value()
{
    if (isset($_SESSION['CART'])) {
        return count($_SESSION['CART']);
    } else {
        return 0;
    }
}

// get all products
function get_all_products()
{
    global $con;
    $query = "select * from products where status = 1 order by p_id desc";
    return $result = mysqli_query($con, $query);
}



// get related products
function get_related_products($cat_id)
{
    global $con;
    $query = "select * from products where status = 1 and category_name = '$cat_id' order by p_id desc";
    return $result = mysqli_query($con, $query);
}

///////////////////// cart /////////////////////////

function insert_giohang($data_cart)
{
    global $con;

    if (
        isset($data_cart['product_id']) &&
        isset($data_cart['product_title']) &&
        isset($data_cart['product_price']) &&
        isset($data_cart['product_image']) &&
        isset($data_cart['qty']) &&
        isset($data_cart['customer_id'])
    ) {
        $product_id = $data_cart['product_id'];
        $product_title = $data_cart['product_title'];
        $product_price = $data_cart['product_price'];
        $product_image = $data_cart['product_image'];
        $product_quantity = $data_cart['product_quantity'];
        $customer_id = $data_cart['customer_id'];

        // Chuẩn bị câu lệnh SQL và thực thi
        $sql = "INSERT INTO `cart` (product_id, product_title, product_price, product_image, product_quantity, customer_id) 
                VALUES ('$product_id', '$product_title', '$product_price', '$product_image', '$product_quantity', '$customer_id')";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            echo "Lỗi: " . mysqli_error($con);
        }
    } else {
        echo "Lỗi: Dữ liệu không đủ.";
    }
}

function update_quantity_soluong_giohang($product_id, $customer_id)
{
    global $con;
    $sql = "UPDATE `cart`
        SET product_quantity = product_quantity + 1
        WHERE product_id = $product_id AND customer_id = $customer_id";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Lỗi: " . mysqli_error($con);
    }
}

function delete_sanpham_giohang($product_id, $customer_id)
{
    global $con;

    $sql = "DELETE * FROM `cart`
            INNER JOIN products ON cart.product_id = products.p_id
        WHERE product_id = $product_id AND customer_id = $customer_id AND products.status = '1'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Lỗi: " . mysqli_error($con);
    }
}

function delete_giohang($customer_id)
{
    global $con;

    $sql = "DELETE FROM `cart`
        WHERE customer_id = $customer_id";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Lỗi: " . mysqli_error($con);
    }
}

function thaydoisoluong_sanpham_giohang($product_id, $customer_id, $qty)
{
    global $con;
    $sql = "UPDATE `cart`
        SET product_quantity = $qty;
        WHERE product_id = $product_id AND customer_id = $customer_id";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Lỗi: " . mysqli_error($con);
    }
}

function show_giohang($customer_id)
{
    global $con;
    $sql = "SELECT cart.product_id ,cart.product_quantity, cart.product_price, products.product_name as product_title, products.img as product_image
            FROM cart 
            INNER JOIN products ON cart.product_id = products.p_id
            WHERE cart.customer_id = $customer_id AND products.status = '1'";
    $listAll = mysqli_query($con, $sql);
    return $listAll;
}

////////////////// order ////////////////////////

function insert_donhang($data_order)
{
    global $con;

    if (
        isset($data_order['order_status']) && isset($data_order['order_code']) &&
        isset($data_order['order_date'])
    ) {
        $order_status = $data_order['order_status'];
        $order_code = $data_order['order_code'];
        $order_date = $data_order['order_date'];
        $customer_id = $data_order['customer_id'];

        $sql = "INSERT INTO `order` (order_code, order_date, order_status, customer_id) 
        VALUES ('$order_code', '$order_date', '$order_status', '$customer_id')";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            echo "Lỗi: " . mysqli_error($con);
        }
    } else {
        echo "Lỗi: Dữ liệu không đủ.";
    }
}

function insert_chitiet_donhang($data_order_detail)
{
    global $con;
    if (
        isset($data_order_detail['order_code']) &&
        isset($data_order_detail['product_id']) &&
        isset($data_order_detail['product_quantity']) &&
        isset($data_order_detail['product_price']) &&
        isset($data_order_detail['name']) &&
        isset($data_order_detail['address']) &&
        isset($data_order_detail['country']) &&
        isset($data_order_detail['zipcode']) &&
        isset($data_order_detail['phone']) &&
        isset($data_order_detail['fee_shipping'])
    ) {
        $order_code = $data_order_detail['order_code'];
        $product_id = $data_order_detail['product_id'];
        $product_quantity = $data_order_detail['product_quantity'];
        $product_price = $data_order_detail['product_price'];
        $name = $data_order_detail['name'];
        $address = $data_order_detail['address'];
        $country = $data_order_detail['country'];
        $phone = $data_order_detail['phone'];
        $zipcode = $data_order_detail['zipcode'];
        $fee_shipping = $data_order_detail['fee_shipping'];

        // Assuming you have a database connection ($pdo), you can use prepared statements
        $sql = "INSERT INTO order_detail (order_code, product_id, product_quantity, name, address, country, phone, zipcode, fee_shipping, product_price)
                VALUES ('$order_code', '$product_id', '$product_quantity','$name', '$address', '$country', '$phone', '$zipcode', '$fee_shipping', '$product_price')";

        $result = mysqli_query($con, $sql);

        if (!$result) {
            echo "Error: " . mysqli_error($con);
        } else {
            echo "Successful order";
        }
    } else {
        echo "Error: Insufficient data.";
    }
}

function tatca_donhang($customer_id)
{
    global $con;
    $sql = "SELECT `order`.*, SUM(order_detail.product_quantity * order_detail.product_price) AS total_order
            FROM `order`
            JOIN order_detail ON `order`.order_code = order_detail.order_code
            WHERE customer_id = '$customer_id'
            GROUP BY `order`.order_code";

    $listAll = mysqli_query($con, $sql);
    if (!$listAll) {
        echo "Lỗi: " . mysqli_error($con);
    }
    return $listAll;
}

function xem_chitiet_donhang($order_code)
{
    global $con;

    $sql = " SELECT order_detail.*, products.*
    FROM order_detail
    JOIN products ON order_detail.product_id = products.p_id
    WHERE order_detail.order_code = $order_code;
    ";
    $listAll = mysqli_query($con, $sql);

    if (!$listAll) {
        echo "Lỗi: " . mysqli_error($con);
    }
    return $listAll;
}

function kiem_tra_ma_don_hang($order_code)
{
    global $con;
    $sql = "SELECT COUNT(*) AS count FROM order_detail WHERE order_code = '$order_code'";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Lỗi: " . mysqli_error($con);
        return false;
    }

    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    // Trả về true nếu có mã đơn hàng trong bảng order_detail và false nếu không
    return $count > 0;
}

function get_order_code($vnp_banktranno)
{
    global $con;

    // Truy vấn để lấy giá trị của order_code từ bảng vnpay dựa trên vnp_BankTranNo
    $sql = "SELECT order_code FROM vnpay WHERE vnp_BankTranNo = '$vnp_banktranno'";

    // Thực thi truy vấn
    $result = mysqli_query($con, $sql);

    // Kiểm tra và trả về giá trị của order_code nếu tồn tại, null nếu không
    if ($row = mysqli_fetch_assoc($result)) {
        return $row['order_code'];
    } else {
        return null;
    }
}


////////////// search product by name /////////////////
function search_product($keyword)
{
    global $con;
    $sql = "SELECT * FROM `products` WHERE product_name like '%$keyword%'";
    $result = mysqli_query($con, $sql);
    return $result;
}

////////////// display value cart ////////////////////
function total_cart_num()
{
    if (isset($_SESSION['shopping_cart'])) {
        return count($_SESSION['shopping_cart']);
    } else {
        return 0;
    }
}


// ////////// view customers
function get_user_registers($customer_id)
{
    global $con;
    $sql = "SELECT * FROM `user_registers` where id = '$customer_id'";
    $result = mysqli_query($con, $sql);
    return $result;
}


function get_user_address($customer_id)
{
    global $con;
    $sql = "SELECT address FROM `user_registers` WHERE id = '$customer_id'";
    $result = mysqli_query($con, $sql);
    return $result;
}

function get_user_name($customer_id)
{
    global $con;
    $sql = "SELECT name FROM `user_registers` WHERE id = '$customer_id'";
    $result = mysqli_query($con, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        mysqli_free_result($result);
        return $row['name'];
    } else {
        return null;
    }
}

function get_user_phone($customer_id)
{
    global $con;
    $sql = "SELECT phone FROM `user_registers` WHERE id = '$customer_id'";
    $result = mysqli_query($con, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        mysqli_free_result($result);
        return $row['phone'];
    } else {
        return null;
    }
}


function get_info_vnpay($vnp_banktranno)
{
    global $con;
    $sql = "SELECT * FROM vnpay WHERE vnp_banktranno = '$vnp_banktranno'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result); // Giải phóng bộ nhớ của kết quả truy vấn
        return $row;
    } else {
        return null;
    }
}

function check_vnp_banktranno_exist($vnp_banktranno)
{
    global $con;
    $sql = "SELECT COUNT(*) AS count FROM vnpay WHERE vnp_banktranno = '$vnp_banktranno'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $row['count'] > 0;
}

function getMinPrice()
{
    global $con;
    $sql = "SELECT MIN(price) AS min_price FROM products";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);
    return isset($result['min_price']) ? $result['min_price'] : 0;
}

function getMaxPrice()
{
    global $con;
    $sql = "SELECT MAX(price) AS max_price FROM products";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);
    return isset($result['max_price']) ? $result['max_price'] : 0;
}


// check hinh thuc thanh toan

function check_payment_method($order_code)
{
    global $con;
    $sql = "SELECT * FROM vnpay WHERE order_code = '$order_code'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        mysqli_free_result($result);
        return true;
    } else {
        return false;
    }
}

function get_status_order($order_code)
{
    global $con;
    $sql = "SELECT order_status FROM `order` WHERE order_code = '$order_code'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $row['order_status'];
    } else {
        return null;
    }
}
