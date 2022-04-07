<?php
ob_start();
session_start();
if (!isset($_SESSION['id_un']) || (trim($_SESSION['id_un']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>