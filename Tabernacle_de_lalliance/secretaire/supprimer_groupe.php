<?php
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$gid=$_POST["gid"];

$sup=$con->query("delete from groupe where gid='$gid'") or die (print_r($con->errorInfo()));
if ($sup){
	print "OK";
}
?>