<?php

try{
	$con=new PDO("mysql:host=localhost; dbname=TA_Manager", "root");
	}catch(PDOexception $e){
		die('ERROR: '.$e->getMessage());
	}

?>