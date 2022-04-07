<?php
include_once("../sessions/session_usher.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$usher=$_SESSION['usher'];

	$diid=$_POST["diid"];
	
	$up_check = $con->query("select * from dime where diid='$diid' and tresorier!='-' and usher='-' and branche ='$bid'; ") or die(print_r($con->errorInfo()));
     $count_row=$up_check->rowCount();
     if($count_row<=0){
		echo "USED";
		exit();
		}else if($count_row>0){
     $up = $con->query("update dime set usher='non', usher_id='$usher' where diid='$diid' and tresorier!='-' and usher='-' and branche ='$bid';") or die(print_r($con->errorInfo()));
     	if($up){
     	echo "OK";
     }
     }
?>