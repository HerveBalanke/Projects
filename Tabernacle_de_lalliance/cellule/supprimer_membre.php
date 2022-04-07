<?php
//include_once("session_admin.php");
require_once("../setup/connection.php");


    $mid=$_POST["mid"];
    $sup = $con->query("delete from membre_cel where mcid ='$mid'; ") or die(print_r($con->errorInfo()));
     
?>