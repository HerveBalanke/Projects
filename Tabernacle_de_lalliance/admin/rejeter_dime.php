<?php
include_once("../sessions/session_admin.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$admin=$_SESSION['admin'];

	$diid=$_POST["diid"];
	
	$up_check = $con->query("select * from dime where diid='$diid' and tresorier!='-' and usher='oui' and admin='-' and branche ='$bid'; ") or die(print_r($con->errorInfo()));
     $count_row=$up_check->rowCount();
     if($count_row<=0){
		echo "USED";
		exit();
		}else if($count_row>0){
     $up = $con->query("update dime set admin='non', admin_id='$admin' where diid='$diid' and tresorier!='-' and usher='oui' and admin='-' and branche ='$bid';") or die(print_r($con->errorInfo()));
     	if($up){
     	echo "OK";
     }
     }
?>