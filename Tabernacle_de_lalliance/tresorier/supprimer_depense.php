<?php
include_once("../sessions/session_tresorier.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$treso=$_SESSION['tresorier'];

    $soid=$_POST["soid"];
	$sup_check = $con->query("select * from depense where did ='$soid' and tresorier='$treso' and administrateur='-' and branche='$bid';") or die(print_r($con->errorInfo()));
     $count_row=$sup_check->rowCount();
     if($count_row<=0){
			echo "USED";
		exit();
		}else if($count_row>0){

     $sup = $con->query("delete from depense where did ='$soid' and tresorier='$treso' and administrateur='-' and branche='$bid';") or die(print_r($con->errorInfo()));
     
     if($sup){
     	echo "OK";
     }
     }
?>