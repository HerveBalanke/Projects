<?php
ob_start();
session_start();
if (!isset($_SESSION['tresorier']) || (trim($_SESSION['tresorier']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>