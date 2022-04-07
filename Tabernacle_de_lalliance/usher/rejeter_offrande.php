<?php
include_once("../sessions/session_usher.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$usher=$_SESSION['usher'];

     $oid=$_POST["oid"];
     $up_check = $con->query("select * from offrande where oid='$oid' and tresorier!='-' and usher='-' and branche='$bid';") or die(print_r($con->errorInfo()));
     $count_row=$up_check->rowCount();
     if($count_row<=0){
          echo "USED";
          exit();
          }else if($count_row>0){
     
     $up = $con->query("update offrande set usher='non', usher_id='$usher' where oid='$oid' and branche='$bid';") or die(print_r($con->errorInfo()));
          if($up){
          echo "OK";
     }
     }
?>