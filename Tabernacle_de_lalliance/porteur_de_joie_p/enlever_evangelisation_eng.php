<?php
include_once("../sessions/session_pjr.php");
require_once("../setup/connection.php");
$pjr=$_SESSION['pjr'];


    $eid=$_POST["eid"];
    $zone=$_POST["zone"];
    $up = $con->query("update evangelisation set status='OFF' where eid='$eid'; ") or die(print_r($con->errorInfo()));
    echo $zone;
     
?>