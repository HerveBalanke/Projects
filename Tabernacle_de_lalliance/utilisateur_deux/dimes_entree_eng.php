<?php

					include_once("session_deux.php");
		   			require_once("../setup/connection.php");

		   			$sid=$_POST["sid"];
		   			$date=$_POST["date"];
		   			$id=$_POST["id"];
		   			$mon=$_POST["mon"];

		   			$insert_dim=$con->prepare("insert into dime (membre, date, montant, signataire_un, signataire_deux, signataire_trois)
		   										values(?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   			$insert_dim->execute(array($id, $date, $mon, '-', $sid, '-')) or (print_r($con->errorInfo()));

		   			if($insert_dim){
		   				echo 'OK';
		   			}


?>