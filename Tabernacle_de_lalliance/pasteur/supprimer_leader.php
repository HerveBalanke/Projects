<?php
include_once("../sessions/session_pasteur.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$pasteur=$_SESSION['pasteur'];


    $cid=$_POST["cid"];
    $sup = $con->query("delete from cellule where cid ='$cid'; ") or die(print_r($con->errorInfo()));
     
?>