<?php
ob_start();
session_start();
if (!isset($_SESSION['pasteur']) || (trim($_SESSION['pasteur']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>