<?php
require_once("../setup/connection.php");
$uid=$_POST["uid"];
$sup_un=$con->query("update utilisateur set desactivate='off' where uid='$uid';") or die (print_r($con->errorInfo()));
if ($sup){
	print "OK";
}
?>