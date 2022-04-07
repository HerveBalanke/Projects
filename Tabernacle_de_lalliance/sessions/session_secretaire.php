<?php
ob_start();
session_start();
if (!isset($_SESSION['secretaire']) || (trim($_SESSION['secretaire']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>