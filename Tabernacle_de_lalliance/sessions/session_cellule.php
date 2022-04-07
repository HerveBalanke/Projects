<?php
ob_start();
session_start();
if (!isset($_SESSION['cellule']) || (trim($_SESSION['cellule']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>