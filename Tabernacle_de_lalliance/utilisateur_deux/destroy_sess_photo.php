<?php
include_once("session_deux.php");
require_once("../setup/connection.php");
if(isset($_SESSION["id"]) && isset($_SESSION["in"]) ){
$_SESSION["id"];
$_SESSION["in"];
session_destroy(); 
}
echo "destroyed";
$con=Null;

 

?>