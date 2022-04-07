<?php

require_once("../setup/connection.php");
session_start();
if(isset($_SESSION["id_mem"])){
$_SESSION["id_mem"];
session_destroy(); 
echo "destroyed";
}else{
	echo "redirect";
}

$con=Null;

 

?>