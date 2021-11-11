<?php
require("../auth-admin.php");
require_once("../library/lib_handler.php");
include("item-add-backend.php");
?>
<!doctype html>
<html lang="en">

<head>
<?php include("../html/head.php"); ?>
</head>

<body>
<?php include("../html/header.php"); ?>
    <!-- end of menu bar -->
    <div class="container" style="margin-top:120px;margin-bottom:100px;">

        <h2>Add Products</h2>
        <div class="row">
            <div class='col-sm-6' style='margin-bottom:20px;'>
                <div class='card'>
                    <div class='card-body'>
                        <form method="POST" action="item-add.php" enctype="multipart/form-data">
                            <div class="mb-3 ">
                                <label for="exampleInputEmail1" class="form-label">Name of Products</label>
                                <input type="text" class="form-control" name="item_name">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleInputEmail1" class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="item_qty">
                                <div class="form-text"> </div>
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label">Product image</label>
                                <input class="form-control" type="file" name="uploadfile" accept="image/*" id="imgInp">
                                <div class="form-text"> </div>
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label"> </label>
                                <button type="submit" class="btn btn-primary" name="btn_add">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class='col-sm-6' >
                <div class='card' style='height:39.2vh;'>
                    <img id="blah" class='card-img-top' src="#" alt="No Preview" style='height:39.2vh;' />
                    </form>
                </div>
            </div>

        </div>
    </div>
    <?php include("../html/footer.php"); ?>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }else{
                blah.src = URL.createObjectURL("../image/nopreview.jpeg")
            }
        }
    </script>
</body>

</html>