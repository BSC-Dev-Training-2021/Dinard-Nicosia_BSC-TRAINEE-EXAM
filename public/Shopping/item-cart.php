<?php
include("../auth.php");
require_once("../library/lib_handler.php");
include("cart-update-backend.php");
include("cart-delete-backend.php");
?>
<!doctype html>
<html lang="en">

<head>
<?php include("../html/head.php");?>
</head>

<body>
<?php include("../html/header.php");?>
<!-- end of menu bar -->
    <div class="container" style="margin-top:120px;margin-bottom:100px;">
        <h2>Cart</h2>
        <?php $crt_tbl_class->tbl_display($_SESSION['user_id'], $table_crt, $db); 
        debug_console($_SESSION['user_id']);?>
    </div>
<!-- end of body     -->
    <?php include("../html/footer.php");?>
</body>

</html>