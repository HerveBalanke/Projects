<?php
ob_start();
session_start();
if (!isset($_SESSION['admin']) || (trim($_SESSION['admin']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>