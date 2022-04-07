<?php
include_once("session_un.php");
require_once("../setup/connection.php");

	$soid=$_POST["soid"];
	$id=$_POST["id"];
	//echo $eid;
	$sup_check = $con->query("delete from depense where did ='$soid' and signataire_un='$id' and signataire_deux is NULL and signataire_trois='-'; ") or die(print_r($con->errorInfo()));
     $sup = $con->query("delete from depense where did ='$soid' and signataire_un='$id' and signataire_deux is NULL and signataire_trois='-'; ") or die(print_r($con->errorInfo()));
     $count_row=$sup_check->rowCount();

		if($count_row<=0){
			echo "USED";
		exit();
		}

     if($sup){
     	echo "OK";
     }else{
     	echo "NO";
     }
?>