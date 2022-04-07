<?php
ob_start();
session_start();
if (!isset($_SESSION['rd_fin']) || (trim($_SESSION['rd_fin']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>