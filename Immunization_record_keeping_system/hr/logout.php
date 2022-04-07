<?php
ob_start();
session_start();
if(!isset($_SESSION['registrar']) || (trim($_SESSION['registrar']==""))){
header('location:../index.php');
exit;
}
session_destroy();
header('location:../index.php');
?>