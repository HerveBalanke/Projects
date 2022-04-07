<?php
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");


    $mid=$_POST["mid"];
    $rid=$_POST["rid"];
    $in=$con->query("delete from presence where membre='$mid' and reunion='$rid';") or die(print_r($con->errorInfo()));
     
?>