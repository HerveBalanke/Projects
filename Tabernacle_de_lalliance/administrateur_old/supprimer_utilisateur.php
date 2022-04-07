<?php
require_once("../setup/connection.php");
$uid=$_POST["uid"];
$sup_un=$con->query("delete from utilisateur where uid='$uid';") or die (print_r($con->errorInfo()));
if ($sup){
	print "OK";
}
?>