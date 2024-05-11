<?php require_once 'inc/header.php'; ?>
<?php
require_once 'inc/nav.php';
$cat = view_cat();
$provider = view_provider();

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
<script>
    function readURL(input, thumbimage) {
        if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#thumbimage").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else { // Sử dụng cho IE
            $("#thumbimage").attr('src', input.value);

        }
        $("#thumbimage").show();
        $('.filename').text($("#uploadfile").val());
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'default');
        $(".removeimg").show();
        $(".Choicefile").unbind('click');

    }
    $(document).ready(function() {
        $(".Choicefile").bind('click', function() {
            $("#uploadfile").click();

        });
        $(".removeimg").click(function() {
            $("#thumbimage").attr('src', '').hide();
            $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
            $(".removeimg").hide();
            $(".Choicefile").bind('click', function() {
                $("#uploadfile").click();
            });
            $('.Choicefile').css('background', '#14142B');
            $('.Choicefile').css('cursor', 'pointer');
            $(".filename").text("");
        });
    })
</script>


<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">List of Users</li>
            <li class="breadcrumb-item"><a href="#">Add more users</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">

                <h3 class="tile-title">Create new users</h3>
                <?php
                save_customers();
                display_message();
                ?>
                <div class="tile-body">
                    <!-- <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><b><i class="fas fa-folder-plus"></i> Create a new position</b></a>
                        </div>

                    </div> -->
                    <form class="row" novalidate="novalidate" method="post" enctype="multipart/form-data">
                        <!-- <div class="form-group col-md-4">
                <label class="control-label">Staff's ID</label>
                <input class="form-control" type="text">
              </div> -->
                        <div class="form-group col-md-4">
                            <label class="control-label">Name</label>
                            <input class="form-control" name="cus_name" type="text" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Email Address</label>
                            <input class="form-control" name="cus_email" type="text" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Password</label>
                            <input class="form-control" name="cus_pass" type="password" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Address</label>
                            <input class="form-control" name="cus_address" type="text" required>
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">Phone</label>
                            <input class="form-control" name="cus_phone" type="text" required>
                        </div>
                        <!-- <div class="form-group col-md-4">
                            <label class="control-label">Date of Birth</label>
                            <input class="form-control" name="cus_date" type="date">
                        </div> -->
                        <!-- <div class="form-group  col-md-3">
                <label class="control-label">Place of birth</label>
                <input class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Identity Card Number</label>
                <input class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Date Range</label>
                <input class="form-control" type="date" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Date of Work</label>
                <input class="form-control" type="date" required>
              </div> -->
                        <div class="form-group col-md-3">
                            <label class="control-label">Sex</label>
                            <select name="cus_sex" class="form-control" id="exampleSelect2" required>
                                <option>-- Choose your gender --</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                        </div>

                        <!-- <div class="form-group  col-md-3">
                <label for="exampleSelect1" class="control-label">Position</label>
                <select class="form-control" id="exampleSelect1">
                  <option>-- Choose position --</option>
                  <option>Sales</option>
                  <option>Advice</option>
                  <option>Customer Support</option>
                  <option>Warehouse manager</option>
                  <option>Maintaince Man</option>

                </select>
              </div> 
              <div class="form-group col-md-3">
                <label class="control-label">Degree</label>
                <select class="form-control" id="exampleSelect3">
                  <option>-- Choose your education level --</option>
                  <option>College graduates</option>
                  <option>Graduated from College</option>
                  <option>Graduated from High School</option>
                  <option>Not yet graduated</option>
                  <option>No degree</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Marriage status</label>
                <select class="form-control" id="exampleSelect2">
                  <option>-- Choose your marriage status --</option>
                  <option>Single</option>
                  <option>Married</option>
                  <option>Other</option>
                </select>
              </div> -->

                        <!-- <div class="form-group col-md-12">
                <label class="control-label">3x4 Image's staff</label>
                <div id="myfileupload">
                  <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);" />
                </div>
                <div id="thumbbox">
                  <img height="300" width="300" alt="Thumb image" id="thumbimage" style="display: none" />
                  <a class="removeimg" href="javascript:"></a>
                </div>
                <div id="boxchoice">
                  <a href="javascript:" class="Choicefile"><i class='bx bx-upload'></i></a>
                  <p style="clear:both"></p>
                </div>

              </div> -->



                </div>
                <button class="btn btn-save" href="#" type="submit" name="cus_btn">Save</button>
                <a class="btn btn-cancel" href="/doc/table-data-table.html">Cancel</a>
            </div>

</main>


<!--
  MODAL
-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
                        <span class="thong-tin-thanh-toan">
                            <h5>Create a new position</h5>
                        </span>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Enter the new position name</label>
                        <input class="form-control" type="text" required>
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
<!--
  MODAL
-->


<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- <script src="./js/saveButton.js"></script> -->

</body>

</html>

<style>
    .Choicefile {
        display: block;
        background: #14142B;
        border: 1px solid #fff;
        color: #fff;
        width: 150px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        padding: 5px 0px;
        border-radius: 5px;
        font-weight: 500;
        align-items: center;
        justify-content: center;
    }

    .Choicefile:hover {
        text-decoration: none;
        color: white;
    }

    #uploadfile,
    .removeimg {
        display: none;
    }

    #thumbbox {
        position: relative;
        width: 100%;
        margin-bottom: 20px;
    }

    .removeimg {
        height: 25px;
        position: absolute;
        background-repeat: no-repeat;
        top: 5px;
        left: 5px;
        background-size: 25px;
        width: 25px;
        /* border: 3px solid red; */
        border-radius: 50%;

    }

    .removeimg::before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        content: '';
        border: 1px solid red;
        background: red;
        text-align: center;
        display: block;
        margin-top: 11px;
        transform: rotate(45deg);
    }

    .removeimg::after {
        /* color: #FFF; */
        /* background-color: #DC403B; */
        content: '';
        background: red;
        border: 1px solid red;
        text-align: center;
        display: block;
        transform: rotate(-45deg);
        margin-top: -2px;
    }
</style>
<?php require_once 'inc/footer.php'; ?>