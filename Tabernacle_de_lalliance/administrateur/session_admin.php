<?php
ob_start();
session_start();
if (!isset($_SESSION['id_admin']) || (trim($_SESSION['id_admin']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>