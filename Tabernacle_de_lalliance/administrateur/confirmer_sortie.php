<?php
include_once("../sessions/session_admin.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$admin=$_SESSION['admin'];

    $sid=$_POST["sid"];
	$up_check = $con->query(" select * from depense where tresorier!='-' and admin='-' and branche ='$bid'; ") or die(print_r($con->errorInfo()));
     $count_row=$up_check->rowCount();
     if($count_row<=0){
			echo "USED";
		exit();
		}else if($count_row>0){

     $up = $con->query(" update depense set admin='oui', admin_id='$admin' where did='$sid' and tresorier!='-' and admin='-' and branche ='$bid';") or die(print_r($con->errorInfo()));
     
     if($up){
     	echo "OK";
     }
     }
?>