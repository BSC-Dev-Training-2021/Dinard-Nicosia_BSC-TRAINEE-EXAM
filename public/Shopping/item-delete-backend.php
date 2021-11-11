<?php

require_once("../library/lib_handler.php");

if (isset($_POST["delete_bttn"])) {
    $col_id = $_POST['col_1'];
    $shp_tbl_class->tbl_delete($col_id ,$table_shop, $db);
}

?>