<?php
require_once("../connection.php");

	$pid=$_POST["pid"];
     $sup = $con->query("delete from affiches where afid ='$pid'; ") or die(print_r($con->errorInfo()));
     
     if($sup){

     	echo "OK";
     }
?>