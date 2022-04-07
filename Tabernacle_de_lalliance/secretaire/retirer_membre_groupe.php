<?php
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$info=$_POST["info"];
$infos = explode('.', $info);
$mid=$infos[0];
$gid=$infos[1];

$ret=$con->query("delete from grou_mem where gid='$gid' and membre='$mid';") or die (print_r($con->errorInfo()));
if ($ret){
	echo "OK";
}
?>