<?php
require_once 'inc/header.php';


$value = view_product();
// $allDonHang = tatca_donhang();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$from_date = !empty($_GET["from_date"]) ? $_GET["from_date"] : '01-01-2024';

if (!empty($_GET["to_date"])) {
  $to_date = date('Y-m-d', strtotime($_GET["to_date"]));
} else {
  $to_date = date('Y-m-d');
}

$from_date = date("d-m-Y", strtotime($from_date));
$to_date = date("d-m-Y", strtotime($to_date));

if (!empty($_GET["to_date"])) {
  $temp = date('Y-m-d', strtotime($_GET["to_date"]));
} else {
  $temp = date('Y-m-d');
}

$temp = date('d-m-Y', strtotime('+1 day', strtotime(str_replace('-', '/', $temp))));

$sql_top_user = "SELECT user_registers.id AS 
customer_id, user_registers.name AS 
customer_name, SUM(order_detail.product_quantity * order_detail.product_price) AS 
total_purchase, order_date 
FROM order_detail 
JOIN `order` ON order_detail.order_code = `order`.order_code JOIN user_registers ON `order`.customer_id = user_registers.id 
WHERE `order`.order_status = 2 AND `order`.order_date BETWEEN '$from_date' AND '$temp' GROUP BY user_registers.id, user_registers.name ORDER BY total_purchase DESC LIMIT 5";
// echo $sql_top_user;

$query_top_user = mysqli_query($con, $sql_top_user);

?>
<?php

if (!isset($_SESSION['ADMIN'])) {
  header("location: index.php");
}

?>

<?php
// if ($_SESSION['ADMIN_ROLE'] != 1) {
//     header("location: dashboard.php");
// }
?>

<?php require_once 'inc/nav.php'; ?>

<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>List of orders</b></a></li>
    </ul>
    <div id="clock"></div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="row element-button">
            <div class="col-sm-2">

              <!-- <a class="btn btn-add btn-sm" href="#" title="Thêm"><i class="fas fa-plus"></i>
                Create new order</a> -->
            </div>
            <div class="col-sm-2">
              <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i class="fas fa-print"></i> Print data</a>
            </div>



            <div class="col-sm-8">
              <div style="display: flex; ">
                <span style="width: 80px; font-weight: bolder; padding: 5px 5px 0 5px; color: #03009a; cursor: pointer;" id="statistical-toggle">Statistical</span>
                <form id="statistical-container-wrapper" action="search_order_statistical.php" method="get" style="display: none; width: 300px; margin: 0 auto; text-align: center; border: 1px solid #000;border-radius: 10px; padding: 10px 10px;">
                  <input class="form-control" name="from_date" type="date" placeholder="From date" style="margin-right: 5px; height: 30px;">
                  <span style="margin-right: 5px;"> - </span>
                  <input class="form-control" name="to_date" type="date" placeholder="To date" style="height: 30px;">
                  <br>
                  <button type="submit" style="margin-left: 5px;width: 150px;">Search</button>
                </form>
              </div>
            </div>



          </div>
          <table class="table table-hover table-bordered">


          <div style="margin-bottom: 100px;">
          <span style="float: right; background-color: #bfbeef; color: #000; border-radius: 5px; height: 50px; padding: 3px 5px 5px 5px;" id="filter-button">
              <i class='bx bx-filter' id="filter-icon"></i>Filter
            </span>

            <div class="col-sm-8" id="filter-container-wrapper" style="display: none; margin: 0 auto; margin-bottom: 20px;">
              <div class="filter-container">
                <form class="header-search-form" action="search_order_advanced.php" method="get" style="align-items: center;">
                  <div class="filter-body">
                    <div class="filter-group">
                      <label for="status" style="font-weight: bold;">Status</label>
                      <br>
                      <select name="status">
                        <option value="">All</option>
                        <option value="1">Confirmed</option>
                        <option value="2">Successful delivery</option>
                        <option value="3">Canceled order</option>
                      </select>
                    </div>

                    <div class="filter-group" style="margin-top: -20px;">
                      <br>

                      <label for="" style="font-weight: bold;">Order Date</label>
                      <div class="price-range">
                        <!-- <input name="min_price" value="" type="number" id="min-price" placeholder="Low" min="1"> -->
                        <input class="form-control" name="from_date" type="date" placeholder="From date" style="margin-right: 5px; height: 30px;">
                        <span style="margin-left: 5px; margin-right: 5px;">-</span>
                        <!-- <input name="max_price" value="" type="number" id="max-price" placeholder="High" min="1"> -->
                        <input class="form-control" name="to_date" type="date" placeholder="To date" style="height: 30px;">

                      </div>
                    </div>

                    <div class="filter-group">
                      <br>
                      <label for="" style="font-weight: bold;">Address</label>
                      <div class="price-range">
                        <div style="margin-top: 5px;">
                          <label for="city" style="font-weight: bold;">City</label>
                          <select id="city" style="margin-left: 30px;" name="city">
                            <option value="">--- Choose City ---</option>
                            <option value="Ho Chi Minh">Ho Chi Minh</option>
                            <option value="Ha Noi">Ha Noi</option>
                            <option value="Da Nang">Da Nang</option>
                          </select>
                        </div>
                      </div>


                      <div style="margin-top: 5px;">
                        <label for="district" style="font-weight: bold;">District</label>
                        <select id="district" style="margin-left: 10px;" name="district">
                          <option value="">--- Choose District ---</option>
                        </select>
                      </div>

                      <script>
                        // Định nghĩa các quận tương ứng với mỗi thành phố
                        // const districts = {
                        //   "Ho Chi Minh": ["Quan 1", "Quan 2", "Quan 3"],
                        //   "Ha Noi": ["Quan Dong Da", "Quan Hoan Kiem", "Quan Hai Ba Trung"],
                        //   "Da Nang": ["Quan Thanh Khe", "Quan Hai Chau", "Quan Son Tra"]
                        // };

                        const districts = {
                          "Ho Chi Minh": ["District 1 - Quan 1", "District 2 - Quan 2", "District 3 - Quan 3", "District 4 - Quan 4", "District 5 - Quan 5", "District 6 - Quan 6", "District 7 - Quan 7", "District 8 - Quan 8", "District 9 - Quan 9", "District 10 - Quan 10", "District 11 - Quan 11", "District 12 - Quan 12", "Binh Tan District - Quan Binh Tan", "Binh Thanh District - Quan Binh Thanh", "Go Vap District - Quan Go Vap", "Phu Nhuan District - Quan Phu Nhuan", "Tan Binh District - Quan Tan Binh", "Tan Phu District - Quan Tan Phu", "Thu Duc District - Quan Thu Duc"],
                          "Ha Noi": ["Ba Dinh District - Quan Ba Dinh", "Hoan Kiem District - Quan Hoan Kiem", "Hai Ba Trung District - Quan Hai Ba Trung", "Dong Da District - Quan Dong Da", "Cau Giay District - Quan Cau Giay", "Thanh Xuan District - Quan Thanh Xuan", "Hoang Mai District - Quan Hoang Mai", "Long Bien District - Quan Long Bien", "Tay Ho District - Quan Tay Ho", "Nam Tu Liem District - Quan Nam Tu Liem", "Bac Tu Liem District - Quan Bac Tu Liem", "Ha Dong District - Quan Ha Dong", "Son Tay District - Quan Son Tay"],
                          "Da Nang": ["Hai Chau District - Quan Hai Chau", "Thanh Khe District - Quan Thanh Khe", "Son Tra District - Quan Son Tra", "Ngu Hanh Son District - Quan Ngu Hanh Son", "Lien Chieu District - Quan Lien Chieu", "Cam Le District - Quan Cam Le", "Hoa Vang District - Quan Hoa Vang"]
                        };

                        document.getElementById("city").addEventListener("change", function() {
                          const city = this.value;
                          const districtSelect = document.getElementById("district");
                          districtSelect.innerHTML = "";
                          districts[city].forEach(function(district) {
                            const option = document.createElement("option");
                            option.value = district;
                            option.textContent = district;
                            districtSelect.appendChild(option);
                          });
                        });
                      </script>
                      <label>
                        <br>
                        <button type="submit" style="background-color: #019af2ff; border: none; padding: 5px; font: inherit; cursor: pointer; color: #fff;">Search</button>
                      </label>
          </div>
            



                      <thead>
                        <?php
                        $i = 0;
                        ?>

                        <h4>5 Customers with the highest purchase level <span><?php echo '(' . $from_date . ')'; ?></span> to <span><?php echo '(' . $to_date . ')'; ?></span></h4>
                        <tr>
                          <!-- <th width="10"><input type="checkbox" id="all"></th> -->
                          <th>
                            Rank
                          </th>
                          <th>Customer Name</th>
                          <th>Total Purchase </th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($query_top_user as $info) : ?>
                          <tr>
                            <td>
                              <?php
                              $i++;
                              echo $i;
                              ?>
                            </td>
                            <td><?php echo $info['customer_name']; ?></td>
                            <!-- <td width="10"><input type="checkbox" name="check1" value="1"></td> -->
                            <td><?php echo $info['total_purchase']; ?> VND</td>

                          </tr>



                        <?php endforeach ?>
                      </tbody>
          </table>

          <div style="margin-bottom: 100px;"></div>
          <table class="table table-hover table-bordered">
            <thead>
              <?php
              $i = 0;
              ?>
              <h4>List of orders from top 5 customers</h4>
              <tr>
                <!-- <th width="10"><input type="checkbox" id="all"></th> -->
                <th>
                  Rank
                </th>
                <th>Customer Name</th>
                <th>Total Purchase </th>
                <th>List of orders</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($query_top_user as $info) : ?>
                <tr>
                  <td>
                    <?php
                    $i++;
                    echo $i;
                    ?>
                  </td>
                  <td><?php echo $info['customer_name']; ?></td>
                  <!-- <td width="10"><input type="checkbox" name="check1" value="1"></td> -->
                  <td>$<?php echo $info['total_purchase']; ?></td>

                  <td>
                    <ul style="list-style-type: decimal;">
                      <?php
                      $order_for_user = get_orders_by_customer_id($info['customer_id']);
                      if (!empty($order_for_user)) {
                        foreach ($order_for_user as $order) {
                      ?>
                          <li><span style="font-weight: bolder;">Order code:</span> <?php echo $order['order_code']; ?> - <span style="font-weight: bolder;">Total Order</span>: VND<?php echo  $order['total_amount']; ?> - <span style="font-weight: bolder;">Order date</span>: <?php echo $order['order_date']; ?> - <a href="order_details_master.php?order_code=<?php echo $order['order_code']; ?>">View Detail</a></li>

                          <br>
                      <?php

                        }
                      }
                      ?>
                    </ul>
                  </td>




                </tr>



              <?php endforeach ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</main>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="src/jquery.table2excel.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $('#sampleTable').DataTable();
</script>
<script>
  function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
  }
  jQuery(function() {
    jQuery(".trash").click(function() {
      swal({
          title: "Warning",

          text: "Are you sure you want to delete this order?",
          buttons: ["Cancel", "OK"],
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Deleted successfully !", {

            });
          }
        });
    });
  });
  oTable = $('#sampleTable').dataTable();
  $('#all').click(function(e) {
    $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
    e.stopImmediatePropagation();
  });

  //EXCEL
  // $(document).ready(function () {
  //   $('#').DataTable({

  //     dom: 'Bfrtip',
  //     "buttons": [
  //       'excel'
  //     ]
  //   });
  // });


  //Thời Gian
  function time() {
    var today = new Date();
    var weekday = new Array(7);
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";
    var day = weekday[today.getDay()];
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    nowTime = h + " hours " + m + " minutes " + s + " second";
    if (dd < 10) {
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }
    today = day + ', ' + dd + '/' + mm + '/' + yyyy;
    tmp = '<span class="date"> ' + today + ' - ' + nowTime +
      '</span>';
    document.getElementById("clock").innerHTML = tmp;
    clocktime = setTimeout("time()", "1000", "Javascript");

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
  }
  //In dữ liệu
  var myApp = new function() {
    this.printTable = function() {
      var tab = document.getElementById('sampleTable');
      var win = window.open('', '', 'height=700,width=700');
      win.document.write(tab.outerHTML);
      win.document.close();
      win.print();
    }
  }
  //     //Sao chép dữ liệu
  //     var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

  // copyTextareaBtn.addEventListener('click', function(event) {
  //   var copyTextarea = document.querySelector('.js-copytextarea');
  //   copyTextarea.focus();
  //   copyTextarea.select();

  //   try {
  //     var successful = document.execCommand('copy');
  //     var msg = successful ? 'successful' : 'unsuccessful';
  //     console.log('Copying text command was ' + msg);
  //   } catch (err) {
  //     console.log('Oops, unable to copy');
  //   }
  // });

  //Modal
  $("#show-emp").on("click", function() {
    $("#ModalUP").modal({
      backdrop: false,
      keyboard: false
    })
  });

 // chỉ hiện thị 1 cái
 var filterContainer = document.getElementById("filter-container-wrapper");
  var statisticalContainer = document.getElementById('statistical-container-wrapper');

  document.getElementById('filter-button').addEventListener('click', function() {
    if (filterContainer.style.display === "none") {
      filterContainer.style.display = "block";
      statisticalContainer.style.display = "none"; // Ẩn statistical container nếu đang hiển thị
    } else {
      filterContainer.style.display = "none";
    }
  });

  document.getElementById('statistical-toggle').addEventListener('click', function() {
    if (statisticalContainer.style.display === "none") {
      statisticalContainer.style.display = "block";
      filterContainer.style.display = "none"; // Ẩn filter container nếu đang hiển thị
    } else {
      statisticalContainer.style.display = "none";
    }
  });
</script>
<!-- <script src="./js/saveButton.js"></script> -->
</body>

</html>
<style>
 #filter-container-wrapper {
    border: 1px solid #000;
    border-radius: 10px;
    /* margin: 0 auto; */
    /* margin-left: 200px; */
    /* z-index: 9999; */
    /* hoặc bất kỳ giá trị nào phù hợp */
  }

  .filter-container {
    margin-top: 20px;
    padding: 10px;
    /* background-color: #f2f2f2; */
  }

  .header-search-form {
    display: flex;
    align-items: center;
  }

  .filter-body {
    display: flex;
    flex-wrap: wrap;
  }

  .filter-group {
    margin-right: 20px;
    /* Khoảng cách giữa các filter-group */
  }

  .filter-group:last-child {
    margin-right: 0;
    /* Loại bỏ margin-right của filter-group cuối cùng */
  }

  .label {
    margin-right: 10px;
    /* Khoảng cách giữa label và input/select */
  }

  .price-range {
    display: flex;
    align-items: center;
  }

  input[type="search"],
  input[type="number"],
  select {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  button[type="submit"] {
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  button[type="submit"]:hover {
    background-color: #0056b3;
  }
</style>
<?php require_once 'inc/footer.php'; ?>