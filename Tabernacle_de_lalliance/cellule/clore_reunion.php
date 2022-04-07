<?php
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");


    $rid=$_POST["rid"];
    $in=$con->query("update reunion set statut='ON' where rid='$rid';") or die(print_r($con->errorInfo()));
     
?>