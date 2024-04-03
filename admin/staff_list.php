<?php
require_once 'inc/header.php';

$value = view_customer();

?>
<?php

// if (!isset($_SESSION['ADMIN'])) {
//     header("location: index.php");
// }
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
      <li class="breadcrumb-item active"><a href="#"><b>List of Staff</b></a></li>
    </ul>
    <div id="clock"></div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">

          <div class="row element-button">
            <div class="col-sm-2">
              <a class="btn btn-add btn-sm" href="form-add-nhan-vien.html" title="Thêm"><i class="fas fa-plus"></i>
                Create new staff</a>
            </div>
            <div class="col-sm-2">
              <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i class="fas fa-print"></i> Print Data</a>
            </div>
          </div>
          <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
            <thead>
              <tr>
                <th width="10"><input type="checkbox" id="all"></th>
                <th>Staff's ID</th>
                <th width="150">Name</th>
                <th width="20">Card Photo</th>
                <th width="300">Address</th>
                <th>Date of Birth</th>
                <th>Sex</th>
                <th>Phone/th>
                <th>Position</th>
                <th width="100">Function</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="10"><input type="checkbox" name="check1" value="1"></td>
                <td>#CD12837</td>
                <td>Dam Thi Ngoc Chau</td>
                <td><img class="img-card-person" src="https://afamilycdn.com/150157425591193600/2021/7/1/iu1-1625113727563158164722.jpg" alt="">
                </td>
                <td>273 An Duong Vuong street, district 5, Ho Chi Minh city</td>
                <td>1/1/2004</td>
                <td>Female</td>
                <td>0123456789</td>
                <td>Admin</td>
                <td class="table-td-center"><button class="btn btn-primary btn-sm trash" type="button" title="Delete" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                  </button>
                  <button class="btn btn-primary btn-sm edit" type="button" title="Edit" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td width="10"><input type="checkbox" name="check2" value="2"></td>
                <td>#SX22837</td>
                <td>Vo Hoang Kim Quyen</td>
                <td><img class="img-card-person" src="https://k-luv.leonparenzo.com/wp-content/uploads/2020/06/han-so-hee-says-she-doesnt-want-to-get-married-after-starring-in-the-world-of-the-married-3.jpg" alt=""></td>
                <td>105 Ba Huyen Thanh Quan street, district 3, Ho Chi Minh city</td>
                <td>27/1/2004</td>
                <td>Female</td>
                <td>0987654321</td>
                <td>Sales</td>
                <td><button class="btn btn-primary btn-sm trash" type="button" title="Delete" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                  </button>
                  <button class="btn btn-primary btn-sm edit" type="button" title="Edit" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td width="10"><input type="checkbox" name="check3" value="3"></td>
                <td>#LO2871</td>
                <td>Ho Ngoc Long</td>
                <td><img class="img-card-person" src="data:image/jpeg;base64,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" alt=""></td>
                <td>4 Ton Duc Thang street, district 1, Ho Chi Minh city</td>
                <td>02/06/2000</td>
                <td>Male</td>
                <td>0931491997</td>
                <td>Sales</td>
                <td><button class="btn btn-primary btn-sm trash" type="button" title="Delete" onclick="myFunction()"><i class="fas fa-trash-alt"></i>
                  </button>
                  <button class="btn btn-primary btn-sm edit" type="button" title="Edit" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                  </button>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<!--MODAL-->
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="row">
          <div class="form-group  col-md-12">
            <span class="thong-tin-thanh-toan">
              <h5>Edit basic employee information</h5>
            </span>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label class="control-label">Staff's ID</label>
            <input class="form-control" type="text" required value="#CD2187" disabled>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Name</label>
            <input class="form-control" type="text" required value="Admin">
          </div>
          <div class="form-group  col-md-6">
            <label class="control-label">Phone</label>
            <input class="form-control" type="text" required value="09267312388">
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Email Address</label>
            <input class="form-control" type="text" required value="keito.2004@gmail.com">
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Date of Birth</label>
            <input class="form-control" type="date" value="15/03/2000">
          </div>
          <div class="form-group  col-md-6">
            <label for="exampleSelect1" class="control-label">Position</label>
            <select class="form-control" id="exampleSelect1">
              <option>Sales</option>
              <option>Advice</option>
              <option>Customer Support</option>
              <option>Cashier</option>
              <option>Warehouse person</option>
              <option>Maintaince man</option>
              <option>Check goods</option>
            </select>
          </div>
        </div>
        <BR>
        <button class="btn btn-save" type="button">Save</button>
        <a class="btn btn-cancel" data-dismiss="modal" href="#">Cancel</a>
        <BR>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!--MODAL-->

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

          text: "Are you sure you want to delete this employee?",
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
</script>
<script src="./js/saveButton.js"></script>
</body>

</html>


<?php require_once 'inc/footer.php'; ?>