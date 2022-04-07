<?php
include_once("../sessions/session_admin.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$admin=$_SESSION['admin'];

	$oid=$_POST["oid"];
	$sup_check = $con->query("select * from offrande where oid='$oid' and tresorier!='-' and usher='oui' and admin='-' and branche='$bid'; ") or die(print_r($con->errorInfo()));
     $count_row=$sup_check->rowCount();
     if($count_row<=0){
		echo "USED";
		exit();
		}else if($count_row>0){
     $up = $con->query("update offrande set admin='oui', admin_id='$admin' where oid='$oid' and tresorier!='-' and usher='oui' and admin='-' and branche='$bid';") or die(print_r($con->errorInfo()));
     
     if($up){
     	echo "OK";
     }
 }
?>