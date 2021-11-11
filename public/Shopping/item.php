<?php
require_once("../library/lib_handler.php");
include("item-cart-add.php");
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("../html/head.php"); ?>
</head>

<body>
    <?php include("../html/header.php"); ?>

    <div class="container" style="margin-top:120px;margin-bottom:100px;">

        <div class="row">
            <?php $shp_tbl_class->tbl_display($table_shop, $db); ?>
        </div>
    </div>
    <?php include("../html/footer.php"); ?>
</body>

</html>