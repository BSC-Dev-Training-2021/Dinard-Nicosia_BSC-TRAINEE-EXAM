<?php
    session_start();
    if(!isset($_SESSION['email']) || $_SESSION['admin'] !=1){
        header("Location:../shopping/item.php");
    }else if($_SESSION['auth_time'] + $activity_time < time()){
        unset($_SESSION['email']);
        unset($_SESSION['admin']);
        unset($_SESSION['auth_time']);
        //debug_console($_SESSION['auth_time'] . "less than" . time());
        session_destroy();
        header("Location:../login/login.php");
    }else{
        $_SESSION['auth_time'] = strtotime("+60 minute"); 
        //debug_console($_SESSION['auth_time'] . "more than" . time());
    }
?>