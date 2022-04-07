<?php
include_once("session_deux.php");
require_once("../setup/connection.php");

    $did=$_POST["did"];
	$id=$_POST["id"];
	$sup_check = $con->query("select * from dime where diid ='$did' and signataire_un is NOT NULL and signataire_deux='$id' and signataire_trois is NULL;") or die(print_r($con->errorInfo()));
     $count_row=$sup_check->rowCount();
     if($count_row<=0){
			echo "USED";
		exit();
		}else if($count_row>0){

     $sup = $con->query("delete from dime where diid ='$did' and signataire_un is NOT NULL and signataire_deux='$id' and signataire_trois is NULL;") or die(print_r($con->errorInfo()));
     
     if($sup){
     	echo "OK";
     }
     }
?>