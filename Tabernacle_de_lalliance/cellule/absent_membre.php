<?php
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$cellule=$_SESSION['cellule'];
$zone_cel=$_SESSION['zone_cel'];

    $mid=$_POST["mid"];
    $rid=$_POST["rid"];
    $statut="a";
    $in=$con->prepare("insert into presence (statut, membre, reunion, branche) values(?,?,?,?) ;") or die(print_r($con->errorInfo()));
	$in->execute(array( $statut, $mid, $rid, $bid)) or die (print_r($con->errorInfo()));
     
?>