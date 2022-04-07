<?php
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];

	$mid=$_POST["mid"];

     $up = $con->query("update membre set statut='partie' where id ='$mid'; ") or die(print_r($con->errorInfo()));
     
     if($up){

     	echo "ok";
     }
?>