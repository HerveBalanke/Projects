<?php
include_once("session_admin.php");
require_once("../setup/connection.php");
if(isset($_SESSION["id_mem"]) AND $_SESSION["id_mem"]!='-'){
$_SESSION["id_mem"]='-'; 
echo "destroyed";
}else if (isset($_SESSION["id_mem"]) AND $_SESSION["id_mem"]=='-'){
echo "redirect";
}

$con=Null;

 

?>