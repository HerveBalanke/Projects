<?php
require_once("../connection.php");

	$gid=$_POST["gid"];
     $sup = $con->query("delete from galerie where gid ='$gid'; ") or die(print_r($con->errorInfo()));
     
     if($sup){

     	echo "OK";
     }
?>