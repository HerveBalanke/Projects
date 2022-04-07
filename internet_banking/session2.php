<?php 
session_start ();
if (!isset($_SESSION["uname"]) || (trim($_SESSION["uname"]=='')))
{
header('location:index.php');
exit();

}







?>