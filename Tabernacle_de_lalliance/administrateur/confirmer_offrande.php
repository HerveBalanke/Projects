<?php
include_once("session_admin.php");
require_once("../setup/connection.php");

    $oid=$_POST["oid"];
	$id=$_POST["id"];
	$up_check = $con->query(" select * from offrande where signataire_trois='-' and oid='$oid' and signataire_un is NOT NULL and signataire_deux!='-' and signataire_deux is NOT NULL; ") or die(print_r($con->errorInfo()));
     $count_row=$up_check->rowCount();
     if($count_row<=0){
			echo "USED";
		exit();
		}else if($count_row>0){

     $up = $con->query(" update offrande set signataire_trois='$id' where oid='$oid' and signataire_un is NOT NULL and signataire_deux!='-' and signataire_deux is NOT NULL; ") or die(print_r($con->errorInfo()));
     
     if($up){
     	echo "OK";
     }
     }
?>