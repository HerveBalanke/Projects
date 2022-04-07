<?php
include_once("session_deux.php");
require_once("../setup/connection.php");
$info=$_POST["info"];
$infos = explode('.', $info);
$mid=$infos[0];
$gid=$infos[1];

$ret=$con->query("delete from grou_mem where gid='$gid' and membre='$mid';") or die (print_r($con->errorInfo()));
if ($ret){
	echo "OK";
}
?>