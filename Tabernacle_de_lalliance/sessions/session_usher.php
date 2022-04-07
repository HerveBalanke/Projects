<?php
ob_start();
session_start();
if (!isset($_SESSION['usher']) || (trim($_SESSION['usher']) == '')) 
{
    header('location: ../index.php');
    exit();
	}
?>