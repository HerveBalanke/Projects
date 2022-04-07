<?php
require_once("../connection.php");

	$aid=$_POST["aid"];
     $sup = $con->query("delete from audios where aid ='$aid'; ") or die(print_r($con->errorInfo()));
     
     if($sup){

     	echo "OK";
     }
?>