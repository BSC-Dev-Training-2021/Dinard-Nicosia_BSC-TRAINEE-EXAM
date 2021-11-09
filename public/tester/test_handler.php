<?php
require("../library/lib_handler.php");
if ($db) {
    debug_console('Database:on');
} else {
    debug_console("Database:off");
}
?>