<?php
require_once("../library/lib_handler.php");
$item_name2 = "";
$col1 = "";
$col2 = "";
$col3 = "";
$col4 = "";
if (isset($_POST["update_bttn"])) {
    $col1 = $_POST['col_1'];
    $col2 = $_POST['col_2'];
    $col3 = $_POST['col_3'];
    $col4 = $_POST['col_4'];
}
if(isset($_POST['update_submit']))
{
    $col_1 = $_POST['id'];
    $col_2 = $_POST['item_name'];
    $col_3 = $_POST['item_qty'];
    $col_4 = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../image/" . $col_4;
    $shp_tbl_class->tbl_update($col_1, $col_2, $col_3, $col_4,$table_shop, $db);
    if (move_uploaded_file($tempname, $folder)) {
        debug_console("Image uploaded successfully");
    } else {
        debug_console("Failed to upload image");
    }
}   
