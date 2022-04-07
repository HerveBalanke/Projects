<?php
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");

    $rid=$_POST["rid"];
    $sup = $con->query("delete from reunion where rid ='$rid'; ") or die(print_r($con->errorInfo()));
     
?>