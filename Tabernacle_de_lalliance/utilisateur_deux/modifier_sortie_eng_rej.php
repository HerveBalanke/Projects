<?php
					include_once("session_deux.php");
		   			require_once("../setup/connection.php");
		   			$soid=$_POST["soid"];
		   			$id=$_POST["id"];
		   			$date=$_POST["date"];
		   			$motif=$_POST["motif"];
		   			$desc=$_POST["desc"];
		   			$mon=$_POST["mon"];

		   			$update_dep=$con->prepare("update depense set date=?, motif=?, description=?, montant=?,  signataire_un=?, signataire_trois=? where did=? and signataire_deux=? ") or (print_r($con->errorInfo()));
		   			$update_dep->execute(array($date, $motif, $desc, $mon, '-', '-',$soid, $id)) or (print_r($con->errorInfo()));

		   			if($update_dep){
		   				echo 'OK';
		   			}


?>