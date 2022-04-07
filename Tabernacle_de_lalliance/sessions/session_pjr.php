<?php
ob_start();
session_start();
if (!isset($_SESSION['pjr']) || (trim($_SESSION['pjr']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>