<?php
require("../auth-admin.php");
require_once("../library/lib_handler.php");
include("item-update-backend.php");
include("item-delete-backend.php");
?>
<!doctype html>
<html lang="en">

<head>
<?php include("../html/head.php");?>
</head>

<body>
<?php include("../html/header.php");?>

    <div class="container" style="margin-top:120px;margin-bottom:100px;">
    <h2>Update Products</h2>
        <div class="row">
            <div class='col-sm-6' style='margin-bottom:20px;'>
                <div class='card'>
                    <div class='card-body'>
                        <form method="POST" action="item-update.php" enctype="multipart/form-data">
                            <div class="mb-3 ">
                                <label for="exampleInputEmail1" class="form-label">Name of Products</label>
                                <input type="text" class="form-control" name="item_name" value="<?php echo $col2; ?>">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $col1; ?>">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleInputEmail1" class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="item_qty" value="<?php echo $col3; ?>">
                                <div class="form-text"> </div>
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label">Product image</label>
                                <input class="form-control" type="file" name="uploadfile" accept="image/*" id="imgInp" value="<?php echo $col4;?>">
                                <div class="form-text"> </div>
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label"> </label>
                                <button type="submit" class="btn btn-warning" name="update_submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class='col-sm-6' >
                <div class='card' style='height:37vh;'>
                    <img id="blah" class='card-img-top' src="<?php echo '../image/' . $col4; ?>" alt="No Preview" style='height:36.5vh;' />
                    </form>
                </div>
            </div>

        </div>
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Quantity</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $shp_tbl_class->tbl_display_action($table_shop, $db);
                ?>
            </tbody>
        </table>
    </div>
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
    <?php include("../html/footer.php");?>
</body>

</html>