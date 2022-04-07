<?php
require_once("../setup/connection.php");
$bid=$_POST["bid"];
$sup_un=$con->query("delete from branche where bid='$bid';") or die (print_r($con->errorInfo()));
if ($sup){
	print "OK";
}
?>