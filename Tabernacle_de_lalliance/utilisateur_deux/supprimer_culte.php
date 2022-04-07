<?php
include_once("session_deux.php");
require_once("../setup/connection.php");

	$eid=$_POST["eid"];
	//echo $eid;

     $sup = $con->query("delete from evenement where eid ='$eid'; ") or die(print_r($con->errorInfo()));
     
     if($sup){

     	echo "OK";
     }
?>