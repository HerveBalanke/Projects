<?php
//include_once("session_admin.php");
require_once("../setup/connection.php");


    $lid=$_POST["lid"];
    $sup = $con->query("delete from leader where lid ='$lid'; ") or die(print_r($con->errorInfo()));
     
?>