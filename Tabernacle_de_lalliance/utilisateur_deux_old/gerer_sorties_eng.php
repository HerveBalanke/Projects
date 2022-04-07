<?php
		   			require_once("../setup/connection.php");

		   			$date=$_POST["date"];
		   			$motif=$_POST["motif"];
		   			$desc=$_POST["desc"];
		   			$mon=$_POST["mon"];

		   			$insert_dep=$con->prepare("insert into depense (date, description, montant)
		   										values(?,?,?);") or (print_r($con->errorInfo()));
		   			$insert_dep->execute(array($date, $desc, $mon)) or (print_r($con->errorInfo()));

		   			if($insert_dep){
		   				echo 'OK';
		   			}


?>