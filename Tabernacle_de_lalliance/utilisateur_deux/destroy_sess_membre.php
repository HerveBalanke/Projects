<?php
include_once("session_deux.php");
require_once("../setup/connection.php");
if(isset($_SESSION["id_mem"])){
$_SESSION["id_mem"];
session_destroy(); 
echo "destroyed";
}else{
	echo "redirect";
}

$con=Null;

 

?>