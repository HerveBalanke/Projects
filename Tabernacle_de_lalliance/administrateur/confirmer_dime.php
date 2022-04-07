<?php
include_once("session_admin.php");
require_once("../setup/connection.php");

	$diid=$_POST["diid"];
	$id=$_POST["id"];
	$up_check = $con->query(" select * from dime where signataire_trois='-' and diid='$diid' and signataire_un is NOT NULL and signataire_deux!='-' and signataire_deux is NOT NULL; ") or die(print_r($con->errorInfo()));
     $count_row=$up_check->rowCount();
     if($count_row<=0){
			echo "USED";
		exit();
		}else if($count_row>0){

     $up = $con->query(" update dime set signataire_trois='$id' where diid='$diid' and signataire_un is NOT NULL and signataire_deux!='-' and signataire_deux is NOT NULL;") or die(print_r($con->errorInfo()));
     
     if($up){
     	echo "OK";
     }
     }
?>