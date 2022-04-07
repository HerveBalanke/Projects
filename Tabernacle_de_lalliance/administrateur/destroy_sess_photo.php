<?php
include_once("session_admin.php");
require_once("../setup/connection.php");
session_start();
if(isset($_SESSION["id"]) && isset($_SESSION["in"]) ){
$_SESSION["id"];
$_SESSION["in"];
session_destroy(); 
}
echo "destroyed";
$con=Null;

 

?>