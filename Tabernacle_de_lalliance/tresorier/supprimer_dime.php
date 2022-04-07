<?php
	include_once("../sessions/session_tresorier.php");
    require_once("../setup/connection.php");
    $bid=$_SESSION['bid'];
    $treso=$_SESSION['tresorier'];
    $did=$_POST["did"];
	$sup_check = $con->query("select * from dime where diid ='$did' and tresorier ='$treso' and branche='$bid';") or die(print_r($con->errorInfo()));
     $count_row=$sup_check->rowCount();
     if($count_row<=0){
			echo "USED";
		exit();
		}else if($count_row>0){

     $sup = $con->query("delete from dime where diid ='$did' and tresorier ='$treso' and branche='$bid';") or die(print_r($con->errorInfo()));
     
     if($sup){
     	echo "OK";
     }
     }
?>