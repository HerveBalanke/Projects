<?php
		   			require_once("../setup/connection.php");

		   			$date=$_POST["date"];
		   			$id=$_POST["id"];
		   			$mon=$_POST["mon"];

		   			$insert_dim=$con->prepare("insert into dime (membre, date, montant)
		   										values(?,?,?);") or (print_r($con->errorInfo()));
		   			$insert_dim->execute(array($id, $date, $mon)) or (print_r($con->errorInfo()));

		   			if($insert_dim){
		   				echo 'OK';
		   			}


?>