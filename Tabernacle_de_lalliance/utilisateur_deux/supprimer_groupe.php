<?php
include_once("session_deux.php");
require_once("../setup/connection.php");
$gid=$_POST["gid"];

$sup=$con->query("delete from groupe where gid='$gid'") or die (print_r($con->errorInfo()));
if ($sup){
	print "OK";
}
?>