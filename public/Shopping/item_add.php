<?php 
require_once("../library/lib_handler.php");

$item_name2 = "";
if (isset($_POST['btn_add'])) {
    $item_name = $_POST['item_name'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../image/" . $filename;
    $item_qty = $_POST['item_qty'];

    $shp_tbl_class->tbl_write($item_name, $item_qty, $filename, $table_shop, $db);
    
    if (move_uploaded_file($tempname, $folder)) {
        debug_console("Image uploaded successfully");
    } else {
        debug_console("Failed to upload image");
    }
}
?>