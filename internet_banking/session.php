<?php 
session_start ();
if (!isset($_SESSION["account"]) || (trim($_SESSION["account"]=='')))
{
header('location:index.php');
exit();

}







?>