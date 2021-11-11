<?php
require("../auth.php");
require_once("../library/lib_handler.php");
if(isset($_POST['add_cart_bttn'])){
    $col_1 = $_POST['col_1'];
    $col_2 = $_POST['col_2'];
    $col_3 = $_POST['col_qty'];
    $col_4 = $_POST['col_4'];
    if($_POST['col_3'] >= $_POST['col_qty']){
        $total = $_POST['col_3'] - $_POST['col_qty'];
        $shp_tbl_class->tbl_update_qty($col_1, $total, $table_shop, $db);
        $crt_tbl_class->tbl_write($_SESSION['user_id'],$col_1, $col_2, $col_3, $col_4, $table_crt, $db);
        debug_console("added to cart successfully");
    }else{
        debug_console("Invalid quantity!");
    }
    
}
?>