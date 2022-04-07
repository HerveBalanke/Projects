<?php
include_once("session_deux.php");
require_once("../setup/connection.php");
$uid_un=$_POST["uid_un"];
$uid_deux=$_POST["uid_deux"];
$aid=$_POST["aid"];

if($uid_un!=''){
$sup_un=$con->query("delete from utilisateur_un where uid_un='$uid_un'") or die (print_r($con->errorInfo()));
if ($sup_un){
	print "OK";
}
}else if($uid_deux!=''){
	$sup_deux=$con->query("delete from utilisateur_deux where uid_deux='$uid_deux'") or die (print_r($con->errorInfo()));
	if ($sup_deux){
	print "OK";
}
}else if($aid!=''){
	$sup_admin=$con->query("delete from administrateur where aid='$aid'") or die (print_r($con->errorInfo()));
	if ($sup_admin){
	print "OK";
}
}
?>