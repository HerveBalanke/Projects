<?php
  
include_once("session_admin.php");
require_once("../setup/connection.php");

	$mid=$_POST["mid"];
	echo $mid;

     $sup = $con->query("delete from membre where mid ='$mid'; ") or die(print_r($con->errorInfo()));
     
     if($sup){

     	echo "ok";
     }
?>