<?php
    if (isset($_POST['update_cart_bttn'])) {
        $col_1 = $_POST['col_1'];
        $col_2 = $_POST['col_2'];
        $col_3 = $_POST['col_3'];
        $col_4 = $_POST['col_4'];
        $col_5 = $_POST['col_qty'];
        $crt_tbl_class->tbl_update($col_1, $col_2, $col_5, $table_crt, $db);
    }
?>