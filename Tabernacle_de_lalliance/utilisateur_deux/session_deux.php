<?php
ob_start();
session_start();
if (!isset($_SESSION['id_deux']) || (trim($_SESSION['id_deux']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>