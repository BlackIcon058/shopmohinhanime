<?php

// Set Session Message
function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['MESSAGE'] = $msg;
    } else {
        $msg = "";
    }
}


// Display Message
function display_message()
{
    if (isset($_SESSION['MESSAGE'])) {
        echo $_SESSION['MESSAGE'];
        unset($_SESSION['MESSAGE']);
    }
}

// Error Message
function display_error($error)
{
    return "<p class='alert alert-danger text-center' style='color: red; background-color: #fff'>$error</p>";
}


// $error = display_error("Please Fill in the Blank");

// set_message(display_error("Please Fill in the Blank"));

// Sucess Message
function display_success($success)
{
    return "<p class='alert alert-success text-center'>$success</p>";
}

// get safe value
function safe_value($con, $value)
{
    return mysqli_real_escape_string($con, $value);
}

// login checking

function login_system()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bth_login'])) {
        global $con;
        $username = safe_value($con, $_POST['username']);
        $password = safe_value($con, $_POST['password']);
        // echo $username." ".$password;
        if (empty($username) || empty($password)) {
            set_message(display_error("Please Fill in the Blanks"));
        } else {
            // query
            // $query = "select * from users where username='$username' or email='$username' and password = '$password'";
            $query = "SELECT * FROM users WHERE (username='$username' OR email='$username') AND password='$password'";
            $result = mysqli_query($con, $query);
            $userData = mysqli_fetch_assoc($result);
            if ($userData) {
                $_SESSION['ADMIN'] = $userData['username'];
                $_SESSION['ADMIN_ROLE'] = $userData['role'];
                $_SESSION['ADMIN_ID'] = $userData['id'];
                header("location: ./dashboard.php");
            } else {
                set_message(display_error("You Have Entered Wrong Password or UserName"));
            }
        }
    }
}



// login checking
function signup_system()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_signup'])) {

        global $con;
        $username = safe_value($con, $_POST['username']);
        $email = safe_value($con, $_POST['email']);
        $password = safe_value($con, $_POST['password']);
        $cpassword = safe_value($con, $_POST['cpassword']);

        // echo $username." ".$password;

        if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
            set_message(display_error("Please Fill in the Blanks"));
        } elseif ($password != $cpassword) {
            set_message(display_error("Password Not Matched"));
        } else {
            $query = "select * from users where email='$email'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result)) {
                set_message(display_error("Email Already Exits"));
            } else {
                $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '2')";
                $result = mysqli_query($con, $query);

                if ($result) {
                    set_message(display_success("You have successfully Registed"));
                }
            }
        }
    }
}



// add category function
function add_category()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cat_btn'])) {
        // echo "Working";
        global $con;
        $category = safe_value($con, $_POST['category']);

        if (empty($category)) {
            set_message(display_error("Please Enter Category Name"));
        } else {
            $sql = "select * from categories where cat_name='$category'";
            $check = mysqli_query($con, $sql);
            if (mysqli_fetch_assoc($check)) {
                set_message(display_success(" Category Already Exists "));
            } else {
                $query = "insert into categories(cat_name, status) values('$category', '1')";
                $result = mysqli_query($con, $query);
                if ($result) {
                    set_message(display_success(" Category Has Been Saved in the Database "));
                    echo "<a href='manage_category.php'>View Category</a>";
                }
            }
        }
    }
}


// view category
function view_cat()
{
    global $con;
    $sql = "select * from categories";
    return mysqli_query($con, $sql);
}
// view provider
function view_provider()
{
    global $con;
    $sql = "select * from providers";
    return mysqli_query($con, $sql);
}


// Active & Deactive
function active_status()
{
    global $con;

    if (isset($_GET['opr']) && $_GET['opr'] != "") {
        $operation = safe_value($con, $_GET['opr']);
        $id = safe_value($con, $_GET['id']);

        if ($operation == 'active') {
            $status = 1;
        } else {
            $status = 0;
        }

        if ($_SESSION['ADMIN_ROLE'] != 1) {
            header("location: manage_category.php");
        } else {
            $query = "update categories set status='$status' where id = '$id'";
            $result = mysqli_query($con, $query);

            if ($result) {
                header("location: manage_category.php");
            }
        }
    }
}


// update category
function update_cat()
{
    global $con;
    if (isset($_POST['cat_btn_up'])) {
        $category_name = safe_value($con, $_POST['category_up']);
        $id = safe_value($con, $_POST['cat_id']);
        if (!empty($category_name)) {

            $sql = "update categories set cat_name='$category_name' where id='$id'";
            $result = mysqli_query($con, $sql);
            if ($result) {
                header("location: manage_category.php");
            }
        }
    }
}

// -------------------------------------- add customer from admin
function save_customers()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cus_btn'])) {

        global $con;
        $username = safe_value($con, $_POST['cus_name']);
        $email = safe_value($con, $_POST['cus_email']);
        $password = safe_value($con, $_POST['cus_pass']);
        // $password_hashed = md5($password);
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $address = safe_value($con, $_POST['cus_address']);
        $phone = safe_value($con, $_POST['cus_phone']);
        $dateofbirth = safe_value($con, $_POST['cus_date']);
        $sex = safe_value($con, $_POST['cus_sex']);
        // echo $username." ".$password;

        if (empty($username) || empty($email) || empty($password) || empty($address) || empty($phone) || empty($dateofbirth)) {
            set_message(display_error("Please Fill in the Blanks"));
        } elseif (!preg_match('/^0\d{9,10}$/', $phone)) {
            set_message(display_error("Please Check Phone Number"));
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            set_message(display_error("Please Check Your Email"));
        } else {
            $query = "select * from user_registers where email='$email'";
            $result = mysqli_query($con, $query);

            $query1 = "select * from user_registers where name='$username'";
            $result1 = mysqli_query($con, $query1);

            if (mysqli_num_rows($result)) {
                set_message(display_error("Email Already Exits"));
            } elseif (mysqli_num_rows($result1))
                set_message(display_error("The customer name already exists, please change!"));
            else {
                $query = "INSERT INTO user_registers (name, email, address, phone, password, dateofbirth, sex, status) VALUES ('$username', '$email', '$address', '$phone', '$password_hashed', '$dateofbirth', '$sex', '1')";
                $result = mysqli_query($con, $query);
                if ($result) {
                    set_message(display_success("Successfully registered customer account"));
                }
            }
        }
    }
}

function update_customer_record()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cus_btn_edit'])) {

        global $con;
        $user_id = safe_value($con, $_POST['cutomer_id']);
        $username = safe_value($con, $_POST['cus_name']);
        // $email = safe_value($con, $_POST['cus_email']);
        // $password = safe_value($con, $_POST['cus_pass']);
        // $password_hashed = md5($password);

        $address = safe_value($con, $_POST['cus_address']);
        $phone = safe_value($con, $_POST['cus_phone']);
        $dateofbirth = safe_value($con, $_POST['cus_date']);
        $sex = safe_value($con, $_POST['cus_sex']);

        // echo $username." ".$password;
        // if (empty($username)) {
        //     set_message(display_error("Please Fill in the Blanks"));
        // } elseif (!preg_match('/^0\d{9,10}$/', $phone)) {
        //     set_message(display_error("Please Check Phone Number"));
        // } 
        if (!empty($phone) && !preg_match('/^0\d{9,10}$/', $phone)) {
            set_message(display_error("Please Check Phone Number"));
        }
        // elseif (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     set_message(display_error("Please Check Email Address"));
        // }
        else {
            // $query = "update user_registers (name, email, address, phone, password, dateofbirth, sex, status) VALUES ('$username', '$email', '$address', '$phone', '$password_hashed', '$dateofbirth', '$sex', '1')";
            if ($sex != 2) {
                $query = "UPDATE user_registers SET 
    name = '$username', 
      address = '$address', 
      phone = '$phone', 
      dateofbirth = '$dateofbirth', 
      sex = '$sex'
    WHERE id = '$user_id'";
                $result = mysqli_query($con, $query);
                if ($result) {
                    set_message(display_success("Updated account information successfully"));
                    header("Location: user_list.php");
                    exit;
                }
            }else{
                $query = "UPDATE user_registers SET 
                name = '$username', 
                  address = '$address', 
                  phone = '$phone', 
                  dateofbirth = '$dateofbirth',
                  sex = null
                WHERE id = '$user_id'";
            $result = mysqli_query($con, $query);
            if ($result) {
                set_message(display_success("Updated account information successfully"));
                header("Location: user_list.php");
                exit;
            }
            }
        }
    }
}


// --------------------------------------- Product page --------------------------------------
function save_products()
{
    global $con;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pro_btn'])) {

        $cat_id = safe_value($con, $_POST['cat_id']);
        $provider_id = safe_value($con, $_POST['provider_id']);

        $product_name = safe_value($con, $_POST['product_name']);
        $mrp = null;
        $price = safe_value($con, $_POST['price']);
        $qty = safe_value($con, $_POST['qty']);
        $desc = safe_value($con, $_POST['desc']);
        // var_dump($_FILES['img']);

        $img = $_FILES['img']['name'];
        // var_dump($img);
        $type = $_FILES['img']['type'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $size = $_FILES['img']['size'];

        $img_ext = explode('.', $img);
        $img_correct_ext = strtolower(end($img_ext));
        $allow = array('jpg', 'png', 'jpeg');
        $path = "img/" . $img;


        if (empty($product_name) || empty($price) || empty($qty) || empty($desc)) {
            set_message(display_error(" Please Fill in the Blanks "));
        } elseif (empty($img))
            set_message(display_error(" Please Choose Image "));
        else {
            if (in_array($img_correct_ext, $allow)) {
                if ($size < 500000) {
                    if ($cat_id == null) {
                        set_message(display_error(" Please Select Category "));
                    } elseif (empty($provider_id)) {
                        set_message(display_error(" Please Select Provider "));
                    } else {
                        $exit = "select * from products where product_name = '$product_name'";
                        $sql  = mysqli_query($con, $exit);
                        if (mysqli_fetch_assoc($sql)) {
                            set_message(display_error(" Product Already Exits "));
                        } else {
                            $query = "insert into products (category_name, provider_id, product_name, MRP, price, qty, product_sold, img, description, status) values('$cat_id', '$provider_id', '$product_name', '$mrp', '$price', '$qty', '0', '$img', '$desc', '1')";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                                set_message(display_success(" Product Has Been Saved in the Database "));
                                move_uploaded_file($tmp_name, $path);
                            }
                        }
                    }
                } else {
                    set_message(display_error("Your Image Size Too Large"));
                }
            } else {
                set_message(display_error("You Can't Store this file"));
            }
        }
    }
}


// view products
function view_product()
{
    global $con;
    $query = "SELECT products.*, categories.cat_name FROM products 
    INNER JOIN categories ON products.category_name = categories.id";
    return $result = mysqli_query($con, $query);
}


//Status Active & Deactive Product
function active_status_product()
{
    global $con;
    if (isset($_GET['opr']) && $_GET['opr'] != "") {
        $operation = safe_value($con, $_GET['opr']);
        $id = safe_value($con, $_GET['id']);

        if ($operation == 'active') {
            $status = 1;
        } else {
            $status = 0;
        }

        if ($_SESSION['ADMIN_ROLE'] != 1) {
            header("location: dashboard.php");
        } else {
            $query = "update products set status='$status' where p_id = '$id'";
            $result = mysqli_query($con, $query);

            if ($result) {
                header("location: manage_product.php");
            }
        }
    }
}

// status active & deactive user
//Status Active & Deactive Product
function active_status_user()
{
    global $con;
    if (isset($_GET['opr']) && $_GET['opr'] != "") {
        $operation = safe_value($con, $_GET['opr']);
        $id = safe_value($con, $_GET['id']);

        if ($operation == 'active') {
            $status = 1;
        } else {
            $status = 0;
        }

        // if ($_SESSION['ADMIN_ROLE'] != 1) {
        //     header("location: dashboard.php");
        // } else {
            $query = "update user_registers set status='$status' where id = '$id'";
            $result = mysqli_query($con, $query);

            if ($result) {
                header("location: user_list.php");
            }
        // }
    }
}

// edit product function
function edit_record()
{
    global $con;
    if (isset($_GET['id'])) {
        $edit_id = safe_value($con, $_GET['id']);
        $sql = "select * from products where p_id = '$edit_id'";
        $res = mysqli_query($con, $sql);
        return $res;
    }
}

// update record
function update_record()
{
    global $con;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pro_btn_edit'])) {

        $provider_id = safe_value($con, $_POST['provider_id']);

        $cat_id = safe_value($con, $_POST['cat_id']);
        $product_id = safe_value($con, $_POST['product_id']);
        $product_name = safe_value($con, $_POST['product_name']);
        $mrp = null;
        $price = safe_value($con, $_POST['price']);
        $qty = safe_value($con, $_POST['qty']);
        $desc = safe_value($con, $_POST['desc']);
        $status = safe_value($con, $_POST['status']);

        $img = $_FILES['img']['name'];
        $type = $_FILES['img']['type'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $size = $_FILES['img']['size'];

        $img_ext = explode('.', $img);
        $img_correct_ext = strtolower(end($img_ext));
        $allow = array('jpg', 'png', 'jpeg');
        $path = "img/" . $img;

        if (empty($product_name) || empty($price) || empty($qty) || empty($desc) || empty($provider_id)) {
            set_message(display_error(" Please Fill in the Blanks "));
        } else {
            if (empty($img)) {
                if ($cat_id == null) {
                    set_message(display_error(" Please Select Category "));
                } else {
                    $query = "update products set category_name='$cat_id', provider_id='$provider_id', product_name='$product_name', MRP ='$mrp', price='$price', qty='$qty', description='$desc', status = '$status' where p_id = '$product_id'";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        set_message(display_success(" Record Has Been Updated "));
                        move_uploaded_file($tmp_name, $path);

                        header("Location: manage_product.php");
                        exit;
                    }
                }
            } else {
                if ($size < 500000) {
                    if (in_array($img_correct_ext, $allow)) {
                        $query = "update products set category_name='$cat_id', provider_id='$provider_id', product_name='$product_name', MRP ='$mrp', price='$price', qty='$qty', img='$img', description='$desc', status = '$status' where p_id = '$product_id'";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            set_message(display_success(" Record Has Been Updated "));
                            move_uploaded_file($tmp_name, $path);


                            header("Location: manage_product.php");
                            exit;
                        }
                    } else {
                        set_message(display_error("You Can't Store this file"));
                    }
                } else {
                    set_message(display_error("Your Image Size Too Large"));
                }
            }
        }
    }
}

/////////////////////////////// Contact ///////////////////////////////
function contact()
{
    global $con;
    $sql = "select * from contact";
    $query = mysqli_query($con, $sql);
    return $query;
}


///////////////////////////// Order Master //////////////////////////////
function tatca_donhang()
{
    global $con;
    $sql = "SELECT `order`.*, user_registers.*, SUM(order_detail.product_quantity * order_detail.product_price) AS total_order
    FROM `order`
    JOIN user_registers ON `order`.customer_id = user_registers.id
    JOIN order_detail ON `order`.order_code = order_detail.order_code
    GROUP BY `order`.order_code;";

    $listAll = mysqli_query($con, $sql);
    if (!$listAll) {
        echo "Lỗi: " . mysqli_error($con);
    }
    return $listAll;
}

function xem_chitiet_donhang_admin($order_code)
{
    global $con;
    $sql = "SELECT `order`.*, products.*, order_detail.*, user_registers.* ,order_detail.name AS name_shipping, user_registers.name AS user_name, products.product_name AS p_name
    FROM order_detail
    JOIN products ON order_detail.product_id = products.p_id
    JOIN `order` ON order_detail.order_code = `order`.order_code
    JOIN user_registers ON `order`.customer_id = user_registers.id
    WHERE order_detail.order_code = '$order_code'";
    $listAll = mysqli_query($con, $sql);
    if (!$listAll) {
        echo "Lỗi: " . mysqli_error($con);
    }
    return $listAll;
}

//////////////// user /////////////////////
// view category
function view_user()
{
    global $con;
    $sql = "select * from users";
    return mysqli_query($con, $sql);
}

function view_customer()
{
    global $con;
    $sql = "select * from user_registers";
    return mysqli_query($con, $sql);
}


///////////// role //////////////////////
function check_role($user_id)
{
    global $con;
    $sql = "SELECT role FROM users WHERE id = '$user_id'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        // Log the error or print it for debugging
        echo 'MySQL Error: ' . mysqli_error($con);
        return false;
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return isset($row['role']) && $row['role'] == 1;
    }

    return false;
}


function total_order()
{
    global $con;
    $sql = "SELECT COUNT(*) AS total_orders FROM `order`";

    $query = mysqli_query($con, $sql);

    if ($query) {
        $result = mysqli_fetch_assoc($query);
        return isset($result['total_orders']) ? $result['total_orders'] : 0;
    } else {
        return 0;
    }
}

function total_user_registers()
{
    global $con;
    $sql = "SELECT COUNT(*) AS total_registers FROM `user_registers`";

    $query = mysqli_query($con, $sql);

    if ($query) {
        $result = mysqli_fetch_assoc($query);
        return isset($result['total_registers']) ? $result['total_registers'] : 0;
    } else {
        return 0;
    }
}

function total_product()
{
    global $con;
    $sql = "SELECT COUNT(*) AS total_product FROM `products`";

    $query = mysqli_query($con, $sql);

    if ($query) {
        $result = mysqli_fetch_assoc($query);
        return isset($result['total_product']) ? $result['total_product'] : 0;
    } else {
        return 0;
    }
}


function total_order_amount()
{
    global $con;

    $sql = "SELECT SUM(od.product_price * od.product_quantity) AS total_amount
            FROM order_detail od
            INNER JOIN `order` o ON od.order_code = o.order_code
            WHERE o.order_status = 2";

    $query = mysqli_query($con, $sql);

    if ($query) {
        $result = mysqli_fetch_assoc($query);
        return isset($result['total_amount']) ? $result['total_amount'] : 0;
    } else {
        return 0;
    }
}

function total_orders_with_status_1()
{
    global $con;

    $sql = "SELECT COUNT(*) AS total_orders
            FROM `order`
            WHERE order_status = 1";

    $query = mysqli_query($con, $sql);

    if ($query) {
        $result = mysqli_fetch_assoc($query);
        return isset($result['total_orders']) ? $result['total_orders'] : 0;
    } else {
        return 0;
    }
}


function get_orders_by_customer_id($customer_id)
{
    global $con;

    $sql = "SELECT `order`.*, SUM(order_detail.product_quantity * order_detail.product_price) AS total_amount
            FROM `order`
            JOIN order_detail ON `order`.order_code = order_detail.order_code
            WHERE `order`.customer_id = '$customer_id' and `order`.order_status = 2
            GROUP BY `order`.order_code
            ORDER BY total_amount DESC";

    $query = mysqli_query($con, $sql);

    $orders = array();

    if ($query && mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $orders[] = $row;
        }
    }

    return $orders;
}

