<?php
require_once("../connection.php");

	$titre=$_POST["titre"];
     $sup = $con->query("delete from galerie where titre ='$titre'; ") or die(print_r($con->errorInfo()));
     
     if($sup){

     	echo "OK";
     }
?>