<?php

require_once("../setup/connection.php");

	$oid=$_POST["oid"];
	//echo $eid;

     $sup = $con->query("delete from offrande where oid ='$oid'; ") or die(print_r($con->errorInfo()));
     
     if($sup){

     	//echo "ok";
     }
?>