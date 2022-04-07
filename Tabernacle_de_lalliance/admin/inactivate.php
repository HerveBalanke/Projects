<?php
include_once("../sessions/session_admin.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$admin=$_SESSION['admin'];
$uid=$_POST["uid"];
$sup_un=$con->query("update utilisateur set desactivate='on' where uid='$uid' and branche='$bid';") or die (print_r($con->errorInfo()));
if ($sup){
	print "OK";
}
?>