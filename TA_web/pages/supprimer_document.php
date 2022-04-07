<?php
require_once("../connection.php");

	$did=$_POST["did"];
     $sup = $con->query("delete from documents where did ='$did'; ") or die(print_r($con->errorInfo()));
     
     if($sup){

     	echo "OK";
     }
?>