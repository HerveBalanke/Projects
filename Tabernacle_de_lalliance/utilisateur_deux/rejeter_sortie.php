<?php
include_once("session_deux.php");
require_once("../setup/connection.php");

	$sid=$_POST["sid"];
	$id=$_POST["id"];

     $up = $con->query("update depense set signataire_deux=NULL where did='$sid';") or die(print_r($con->errorInfo()));
     
     if($up){

     	echo "NO";
     }


    $sid=$_POST["sid"];
	$id=$_POST["id"];
	$sup_check = $con->query("select * from depense where did='$sid' and signataire_un!='-' and signataire_un is NOT NULL and signataire_deux='-' and signataire_trois='-'; ") or die(print_r($con->errorInfo()));
     $count_row=$sup_check->rowCount();
     if($count_row<=0){
		echo "USED";
		exit();
		}else if($count_row>0){
     $up = $con->query("update depense set signataire_deux= NULL where sid='$sid' and signataire_un!='-' and signataire_un is NOT NULL and signataire_deux='-' and signataire_trois='-';") or die(print_r($con->errorInfo()));
     
     if($up){
     	echo "OK";
     }
 }
?>