<?php
					include_once("../sessions/session_tresorier.php");
					require_once("../setup/connection.php");
					$bid=$_SESSION['bid'];

		   			$soid=$_POST["soid"];
		   			$tid=$_POST["tid"];
		   			$date=$_POST["date"];
		   			$motif=$_POST["motif"];
		   			$desc=$_POST["desc"];
		   			$mon=$_POST["mon"];

		   			$update_dep=$con->prepare("update depense set date=?, motif=?, description=?, montant=?,  administrateur=?, branche=? where did=? and tresorier=? ") or (print_r($con->errorInfo()));
		   			$update_dep->execute(array($date, $motif, $desc, $mon, '-', $bid, $soid, $tid)) or (print_r($con->errorInfo()));

		   			if($update_dep){
		   				echo 'OK';
		   			}


?>