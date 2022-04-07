<?php
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];

	$mid=$_POST["mid"];

     $sup = $con->query("delete from membre where id ='$mid'; ") or die(print_r($con->errorInfo()));
     
     if($sup){

     	echo "ok";
     }
?>