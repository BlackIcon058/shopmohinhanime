<?php
require_once 'inc/header.php';
// active_status();

$value = view_product();
active_status_product();
$cat = view_cat();
$provider = view_provider();
?>
<?php

if (!isset($_SESSION['ADMIN'])) {
  header("location: index.php");
}
?>
<?php require_once 'inc/nav.php'; ?>

<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>List of products</b></a></li>
    </ul>
    <div id="clock"></div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="row element-button">
            <div class="col-sm-2">

              <a class="btn btn-add btn-sm" href="add_product.php" title="Thêm"><i class="fas fa-plus"></i>
                Create new products</a>
            </div>
            <div class="col-sm-2">
              <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i class="fas fa-print"></i> Print data</a>
            </div>
          </div>
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <!-- <th width="10"><input type="checkbox" id="all"></th> -->
                <th>Product's ID</th>
                <th>Product's Name</th>
                <th>Image</th>
                <th>Number</th>
                <th>Status</th>
                <th>Price</th>
                <th>Category</th>
                <th>Function</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($value)) {
              ?>

                <tr>
                  <!-- <td width="10"><input type="checkbox" name="check1" value="1"></td> -->
                  <td><?php echo $row['p_id']  ?></td>
                  <td><?php echo $row['product_name']  ?></td>
                  <td>
                    <img src="img/<?php echo $row['img']; ?>" alt="" width="100px;">
                  </td>
                  <td><?php echo $row['qty']  ?></td>
                  <td>
                    <span class="badge bg-success">
                      <?php
                      if ($row['status'] == '1') {
                        echo 'In Stock';
                      } else {
                        echo 'Out of Stock';
                      }
                      ?>
                    </span>
                  </td>
                  <td><?php echo $row['price']; ?> VND</td>
                  <td><?php echo $row['cat_name']  ?></td>
                  <td>
                    <!-- onclick="myFunction(this)"  -->
                    <!-- <button class="btn btn-primary btn-sm trash" type="button" title="Delete" onclick="confirmDelete(this)"><i class="fas fa-trash-alt"></i>
                    </button> -->
                    <?php
                    if ($row['product_sold'] > 0) {
                    ?>
                      <a href="hidden_product.php?id=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm trash" title="Delete" onclick="return confirmDelete();">
                        <i class="fas fa-trash-alt"></i>
                      </a>

                      <script>
                        function confirmDelete() {
                          var productName = "<?php echo $row['product_name']; ?>";
                          return confirm('Sản phẩm "' + productName + '" đã được bán ra. Hệ thống sẽ tiến hành ẩn sản phẩm trên trang web. Bạn có muốn tiếp tục không?');
                        }
                      </script>


<!-- 
                      <script>
                        function confirmDelete(element, productName) {

                          confirm('Bạn có chắc muốn xóa sản phẩm <?php echo $row['product_name']; ?> không?')
                          if (confirm('Sản phẩm "' + productName + '" đã được bán ra. Hệ thống sẽ tiến hành ẩn sản phẩm trên trang web. Bạn có muốn tiếp tục không?')) {
                            // Người dùng chọn "OK", thực hiện chuyển hướng
                            var url = 'hidden_product.php?id=<?php echo $row['p_id']; ?>';
                            window.location.href = url;
                          }
                        }
                      </script> -->
                    <?php
                    } else {
                    ?>
                      <a href="del_product.php?id=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm trash" title="Delete" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm <?php echo $row['product_name']; ?> không?')">
                        <i class="fas fa-trash-alt"></i>
                      </a>

                    <?php
                    }
                    ?>



                    <button onclick="openModal(<?php echo $row['p_id']; ?>)" class="btn btn-primary btn-sm edit" type="button" title="Edit" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                  </td>
                </tr>


                <!-- MODAL -->
                <script>
                  function openModal(productId) {
                    $('#ModalUP_' + productId).modal('show');
                  }
                </script>
                <!-- id="ModalUP" -->
                <div class="modal fade" id="ModalUP_<?php echo $row['p_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">

                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        <input type="hidden" id="product_id_input" name="product_id" value=">">

                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group  col-md-12">
                              <span class="thong-tin-thanh-toan">
                                <h5>Edit basic product information</h5>
                                <?php
                                update_record();
                                display_message();
                                ?>
                              </span>
                            </div>
                          </div>
                          <div class="row">
                            <!-- <div class="form-group col-md-6">
                            <label class="control-label">Product's ID </label>
                            <input class="form-control" type="number" value="71309005">
                          </div> -->
                            <div class="form-group col-md-6">
                              <label class="control-label">Product's Name</label>
                              <input class="form-control" name="product_name" type="text" required value="<?php echo $row['product_name']; ?>">
                              <input class="form-control" type="hidden" name="product_id" placeholder="product_id" value="<?php echo $row['p_id']; ?>">
                            </div>
                            <div class="form-group  col-md-6">
                              <label class="control-label">Number</label>
                              <input class="form-control" type="number" name="qty" required value="<?php echo $row['qty']; ?>" min="1">
                            </div>
                            <div class="form-group col-md-6 ">
                              <label class="control-label">Status Product</label>
                              <select name="status" class="form-control">

                                <!-- <option>Importing goods</option> -->

                                <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>In stock</option>
                                <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Out of Stock</option>
                              </select>


                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label class="control-label">Selling price</label>
                              <input class="form-control" type="number" name="price" value="<?php echo $row['price']; ?>">
                            </div>

                            <div class="form-group col-md-6">
                              <label for="exampleSelect1" class="control-label">Category</label>
                              <select name="cat_id" class="form-control" id="exampleSelect1">
                                <?php
                                $category_id = $row['category_name'];
                                mysqli_data_seek($cat, 0);
                                while ($row1 = mysqli_fetch_assoc($cat)) {
                                  if ($category_id == $row1['id']) {
                                ?>
                                    <option selected value="<?php echo $row1['id'] ?>"><?php echo $row1['cat_name'] ?></option>
                                  <?php

                                  } else {
                                  ?>
                                    <option value="<?php echo $row1['id'] ?>"><?php echo $row1['cat_name'] ?></option>
                                <?php
                                  }
                                }
                                ?>
                              </select>
                            </div>

                            <div class="form-group col-md-6">
                              <label class="control-label">Provider</label>
                              <select name="provider_id" class="form-control">
                                <?php

                                $provider_id = $row['provider_id'];
                                mysqli_data_seek($provider, 0);
                                while ($row1 = mysqli_fetch_assoc($provider)) {
                                  if ($provider_id == $row1['provider_id']) {
                                ?>
                                    <option selected value="<?php echo $row1['provider_id'] ?>"><?php echo $row1['provider_name'] ?></option>
                                  <?php

                                  } else {
                                  ?>
                                    <option value="<?php echo $row1['provider_id'] ?>"><?php echo $row1['provider_name'] ?></option>
                                <?php
                                  }
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label class="control-label">Image</label>
                              <input id="imgInput" class="form-control" type="file" name="img" value="<?php echo $row['price'] ?>">
                              <img id="previewImage" src="img/<?php echo $row['img']; ?>" height="125" width="100" alt="">

                              <script>
                                document.getElementById('imgInput').addEventListener('change', function(event) {
                                  var preview = document.getElementById('previewImage');
                                  var file = event.target.files[0];
                                  var reader = new FileReader();

                                  reader.onload = function(e) {
                                    preview.src = e.target.result;
                                  };

                                  reader.readAsDataURL(file);
                                });
                              </script>
                            </div>

                            <div class="form-group col-md-12">
                              <label class="control-label">Desc</label>
                              <textarea name="desc" id="" cols="" rows="" class="form-control" placeholder="Desc"><?php echo $row['description'] ?></textarea>
                            </div>


                          </div>
                          <BR>
                          <!-- <a href="#" style="float: right;font-weight: 600; color: #ea0000;">Advanced product editing</a> -->
                          <BR>
                          <BR>
                          <button class="btn btn-save" type="submit" name="pro_btn_edit">Save</button>
                          <a class="btn btn-cancel" data-dismiss="modal" href="#">Cancel</a>
                          <BR>
                        </div>
                        <div class="modal-footer">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!--
MODAL
-->

              <?php
              }
              ?>
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
</script>
<script>
  function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
  }

  // jQuery(function() {
  //   jQuery(".trash").click(function() {
  //     swal({
  //         title: "Warning",
  //         text: "Are you sure you want to delete this product?",
  //         buttons: ["Cancel", "OK"],
  //       })
  //       .then((willDelete) => {
  //         if (willDelete) {
  //           swal("Deleted successfully !", {

  //           });
  //         }
  //       });
  //   });
  // });

  oTable = $('#sampleTable').dataTable();
  $('#all').click(function(e) {
    $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
    e.stopImmediatePropagation();
  });
</script>
<!-- <script src="./js/saveButton.js"></script> -->
</body>

</html>

<?php require_once 'inc/footer.php'; ?>