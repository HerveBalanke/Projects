<?php
include_once("../sessions/session_pjr.php");
require_once("../setup/connection.php");
$pjr=$_SESSION['pjr'];


    $eid=$_POST["eid"];
    $zone=$_POST["zone"];
    $sup = $con->query("delete from evangelisation where eid ='$eid'; ") or die(print_r($con->errorInfo()));
    echo $zone;
     
?>