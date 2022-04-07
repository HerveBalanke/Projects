<?php
    include_once("../sessions/session_tresorier.php");
    require_once("../setup/connection.php");
    $bid=$_SESSION['bid'];
    $treso=$_SESSION['tresorier'];

    $oid=$_POST["oid"];
	$sup_check = $con->query("select * from offrande where oid ='$oid' and tresorier='$treso' and (usher='non' OR admin='non') and branche='$bid';") or die(print_r($con->errorInfo()));
     $count_row=$sup_check->rowCount();
     if($count_row<=0){
			echo "USED";
		exit();
		}else if($count_row>0){

     $sup = $con->query("delete from offrande where oid ='$oid' and tresorier='$treso' and (usher='non' OR admin='non') and branche='$bid';") or die(print_r($con->errorInfo()));
     
     if($sup){
     	echo "OK";
     }
     }
?>