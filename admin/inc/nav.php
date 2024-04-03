<!-- Navbar-->
<header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


        <!-- User Menu-->
        <li><a class="app-nav__item" href="logout.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>
            
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://i.pinimg.com/564x/57/00/c0/5700c04197ee9a4372a35ef16eb78f4e.jpg" width="50px" alt="User Image">
        <div>
            <a href="dashboard.php" style="color: white;" class="app-sidebar__user-name">
            <b>
            <?php
                    if (isset($_SESSION['ADMIN'])) {
                    ?>
                        <?php echo $_SESSION['ADMIN']; ?>
                    <?php
                    } else {
                    ?>

                    <?php
                    }
                    ?>
            </b>
        </a>
            <p class="app-sidebar__user-designation">Welcome Back</p>
        </div>
    </div>
    <hr>

    <ul class="app-menu">
        <li><a class="app-menu__item " href="#"><i class='app-menu__icon bx bx-id-card'></i> <span class="app-menu__label">information Admin</span></a></li>
        <li><a class="app-menu__item " href="dashboard.php"><i class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="user_list.php"><i class='app-menu__icon bx bx-id-card'></i> <span class="app-menu__label">User Management</span></a></li>
        <li><a class="app-menu__item" href="manage_product.php"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Product Management</span></a></li>
        <li><a class="app-menu__item" href="order_master.php"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Order Management</span></a></li>
        <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-run'></i><span class="app-menu__label">Restricted Users</span></a></li>
        <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Sales Report</span></a></li>
        <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-calendar-check'></i><span class="app-menu__label">Staff Management </span></a></li>
    </ul>
</aside>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.order_details').change(function() {
            var order_id = $(this).children(":selected").attr("id");
            var order_status = $(this).val();
            var _token = $('input[name="_token"]').val();
            var qty = [];
            $("input[name='product_sales_quantity']").each(function() {
                qty.push($(this).val());
            });
            var order_product_id = [];
            $("input[name='order_product_id']").each(function() {
                order_product_id.push($(this).val());
            });

            // alert(order_id);
            // alert(order_status);
            // alert(order_product_id);
            // alert(qty);

            number = 0;
            j = 0;
            for (i = 0; i < order_product_id.length; i++) {
                //so luong khach dat
                number++;
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                //so luong ton kho
                var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
                // alert(order_qty);
                // alert(order_qty_storage);
                // console.log(order_qty);
                // console.log(order_qty_storage);

                if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                    j = j + 1;
                    if (j == 1) {
                        alert('Product number ' + number + ' - Insufficient quantity in stock!');
                        $('.color_qty_' + order_product_id[i]).css('background', '#000');
                    }
                }
            }
            if (j == 0) {
                $.ajax({
                    url: "update_order_quantity.php",
                    type: 'POST',
                    data: {
                        _token: _token,
                        order_status: order_status,
                        order_id: order_id,
                        qty: qty,
                        order_product_id: order_product_id,
                    },

                    success: function(data) {
                        // console.log(data);
                        alert('Change order status successfully!');
                        location.reload();

                        // if (data === "Success") {
                        //     alert('Thay đổi tình trạng đơn hàng thành công!');
                        //     location.reload();
                        // } else {
                        //     alert('Có lỗi xảy ra khi xử lý đơn hàng.');
                        // }
                    }
                });
            }
        });
    });
</script>