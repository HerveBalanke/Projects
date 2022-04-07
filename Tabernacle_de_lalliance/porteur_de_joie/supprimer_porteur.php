<?php
include_once("../sessions/session_pjr.php");
require_once("../setup/connection.php");
$pjr=$_SESSION['pjr'];


    $pid=$_POST["pid"];
    $sup = $con->query("delete from porteur where pid ='$pid'; ") or die(print_r($con->errorInfo()));
     
?>