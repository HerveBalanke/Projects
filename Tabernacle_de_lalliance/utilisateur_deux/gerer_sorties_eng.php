<?php
					include_once("session_deux.php");
		   			require_once("../setup/connection.php");
		   			$sid=$_POST["sid"];
		   			$date=$_POST["date"];
		   			$motif=ucwords($_POST["motif"]);
		   			$desc=$_POST["desc"];
		   			$mon=$_POST["mon"];

		   			$insert_dep=$con->prepare("insert into depense (date, motif,description, montant, signataire_un, signataire_deux, signataire_trois)
		   										values(?,?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   			$insert_dep->execute(array($date, $motif, $desc, $mon, '-', $sid, '-')) or (print_r($con->errorInfo()));

		   			if($insert_dep){
		   				echo 'OK';
		   			}


?>