<?php
include_once("session_deux.php");
require_once("../setup/connection.php");

	$soid=$_POST["soid"];
	$id=$_POST["id"];
	$sup_check = $con->query("select * from depense where did ='$soid' and signataire_un='-' and signataire_deux ='$id' and signataire_trois ='-' ;") or die(print_r($con->errorInfo()));
     $count_row=$sup_check->rowCount();
     if($count_row<=0){
			echo "USED";
		exit();
		}else if($count_row>0){

     $sup = $con->query("delete from depense where did ='$soid' and signataire_un='-' and signataire_deux ='$id' and signataire_trois ='-'; ") or die(print_r($con->errorInfo()));
     
     if($sup){
     	echo "OK";
     }
     }
?>