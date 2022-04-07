<?php
include_once("../sessions/session_pasteur.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$pasteur=$_SESSION['pasteur'];
$cid=$_POST["cid"];
$sup_un=$con->query("update cellule set desactivate='off' where cid='$cid' and branche='$bid';") or die (print_r($con->errorInfo()));
if ($sup){
	print "OK";
}
?>