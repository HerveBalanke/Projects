<?php

try{
	$con=new PDO("mysql:host=localhost; dbname=TA_Web", "root");
	}catch(PDOexception $e){
		die('ERROR: '.$e->getMessage());
	}

?>