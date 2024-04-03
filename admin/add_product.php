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

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
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
            $("#myfileupload").html('<input type="file" id="uploadfile" name="img" onchange="readURL(this);" />');
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
            <li class="breadcrumb-item">List of products</li>
            <li class="breadcrumb-item"><a href="#">Add product</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Create new products</h3>
                <?php
                save_products();
                display_message();
                ?>
                <div class="tile-body">
                    <!-- <div class="row element-button">
                       
                    </div> -->
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-folder-plus"></i> Choose a supplier</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i class="fas fa-folder-plus"></i> Add category</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i class="fas fa-folder-plus"></i> Add status</a>
                        </div>
                    </div>

                    <form class="row" novalidate="novalidate" method="post" enctype="multipart/form-data">
                        <!-- <div class="form-group col-md-3">
                            <label class="control-label">Product's ID </label>
                            <input class="form-control" type="number" placeholder="">
                        </div> -->

                        <div class="form-group col-md-3">
                            <label class="control-label">Product's Name</label>
                            <input name="product_name" class="form-control" type="text">
                        </div>

                        <div class="form-group  col-md-3">
                            <label class="control-label">Quantity in stock</label>
                            <input class="form-control" type="number" name="qty" required>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Status</label>
                            <select name="cat_id" class="form-control" id="exampleSelect1" required>
                                <option value="">-- Select status --</option>
                                <option value="1">In stock</option>
                                <option value="0">Out of Stock</option>
                            </select>


                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleSelect1" class="control-label">Category</label>

                            <select name="cat_id" id="" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($cat)) {
                                ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
                                <?php
                                }

                                ?>
                            </select>

                            <!-- <select class="form-control" id="exampleSelect1">
                                <option>-- Choose a category --</option>
                                <option>MORSTORM & AniMester ONMYOJI Senhime 1/4 Scale Figure AniMester</option>
                                <option>Aki Hayakawa 1/7 Scale Figure eStream</option>
                                <option>Onmyoji - Suzuka Gozen 1/4 Scale Figure AniMester</option>
                                <option>LIV: LUMINANCE GENERIC FINAL (NORMAL EDITION & DELUXE EDITION) 1/7 Scale Figure</option>
                                <option>Chainsaw Man 1/7 Scale Figure eStream</option>
                                <option>Keqing (Piercing Thunderbolt Ver.) 1/7 Scale Figure Apex</option>
                                <option>Ganyu (Plenilune Gaze Ver.) 1/7 Scale Figure Apex</option>
                                <option>League of Legends - Jinx 1/7 Scale Figure Myethos</option>
                                <option>Suguru Geto 1/4 Scale Figure</option>
                                <option>Elementalist Lux Non-Scale Figure GSC</option>
                                <option>Rimuru Tempest (Ultimate Ver.) 1/7 Scale Figure Estream</option>
                                <option>Xiao (Guardian Yaksha Ver.) 1/7 Scale Figure Apex</option>
                                <option>Satoru Gojo 1/7 Scale Figure Animester</option>
                                <option>Kento Nanami 1/7 Scale Figure eStream</option>
                                <option>Kurumi Tokizaki (Pigeon Blood Ruby Dress Ver.) 1/7 Scale Figure Estream</option>
                                <option>Caster/Muarsaki Shikibu 1/7 Scale Figure Alter</option>
                            </select> -->

                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Provider</label>

                            <select name="provider_id" id="" class="form-control" required>
                                <option value="">-- Select Provider --</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($provider)) {
                                ?>
                                    <option value="<?php echo $row['provider_id'] ?>"><?php echo $row['provider_name'] ?></option>
                                <?php
                                }

                                ?>
                            </select>

                            <!-- <select class="form-control" id="exampleSelect1">
                                <option>-- Choose a supplier --</option>
                                <option>Toranoana</option>
                                <option>Mandarake</option>
                                <option>Neowing</option>
                                <option>Chara-ani</option>
                            </select> -->
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Selling price</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <!-- <div class="form-group col-md-3">
                            <label class="control-label">Capital price</label>
                            <input class="form-control" type="text">
                        </div> -->
                        <div class="form-group col-md-12">
                            <label class="control-label">Product's Image</label>
                            <div id="myfileupload">
                                <!--  name="ImageUpload" -->
                                <input required type="file" id="uploadfile" name="img" onchange="readURL(this);" />
                            </div>

                            <div id="thumbbox">
                                <img height="450" width="400" alt="Thumb image" id="thumbimage" style="display: none" />
                                <a class="removeimg" href="javascript:"></a>
                            </div>
                            <div id="boxchoice">
                                <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Choose image</a>
                                <p style="clear:both"></p>
                            </div>

                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Product Description</label>
                            <!-- name="mota" -->
                            <textarea class="form-control" name="desc" id="mota" required></textarea>
                            <script>
                                CKEDITOR.replace('mota');
                            </script>
                        </div>

                </div>
                <button class="btn btn-save" href="#" type="submit" name="pro_btn">Save</button>
                <a class="btn btn-cancel" href="add_product.php">Cancel</a>
                </form>
            </div>
</main>


<!--
  MODAL CHỨC VỤ 
-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
                        <span class="thong-tin-thanh-toan">
                            <h5>Add a new provider</h5>
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



<!--
  MODAL DANH MỤC
-->
<div class="modal fade" id="adddanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
                        <span class="thong-tin-thanh-toan">
                            <h5>Add new category </h5>
                        </span>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Enter a new category name</label>
                        <input class="form-control" type="text" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Product catalog currently available</label>
                        <ul style="padding-left: 20px;">
                            <li>MORSTORM & AniMester ONMYOJI Senhime 1/4 Scale Figure AniMester</li>
                            <li>Aki Hayakawa 1/7 Scale Figure eStream</li>
                            <li>Onmyoji - Suzuka Gozen 1/4 Scale Figure AniMester</li>
                            <li>LIV: LUMINANCE GENERIC FINAL (NORMAL EDITION & DELUXE EDITION) 1/7 Scale Figure</li>
                            <li>Chainsaw Man 1/7 Scale Figure eStream</li>
                            <li>Keqing (Piercing Thunderbolt Ver.) 1/7 Scale Figure Apex</li>
                            <li>Ganyu (Plenilune Gaze Ver.) 1/7 Scale Figure Apex</li>
                            <li>League of Legends - Jinx 1/7 Scale Figure Myethos</li>
                            <li>Suguru Geto 1/4 Scale Figure</li>
                            <li>Elementalist Lux Non-Scale Figure GSC</li>
                            <li>Rimuru Tempest (Ultimate Ver.) 1/7 Scale Figure Estream</li>
                            <li>Xiao (Guardian Yaksha Ver.) 1/7 Scale Figure Apex</li>
                        </ul>
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




<!--
  MODAL TÌNH TRẠNG
-->
<div class="modal fade" id="addtinhtrang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
                        <span class="thong-tin-thanh-toan">
                            <h5>Add new status</h5>
                        </span>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Enter new status</label>
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



<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/plugins/pace.min.js"></script>
<script>
    const inpFile = document.getElementById("inpFile");
    const loadFile = document.getElementById("loadFile");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
    inpFile.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            previewDefaultText.style.display = "none";
            previewImage.style.display = "block";
            reader.addEventListener("load", function() {
                previewImage.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });
</script>
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