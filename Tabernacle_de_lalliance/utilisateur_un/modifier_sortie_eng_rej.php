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

		   			$update_dep=$con->prepare("update depense set date=?, motif=?, description=?, montant=?,  administrateur=?  where did=? and tresorier=? and branche=?") or (print_r($con->errorInfo()));
		   			$update_dep->execute(array($date, $motif, $desc, $mon, '-', $soid, $tid, $bid)) or (print_r($con->errorInfo()));

		   			if($update_dep){
		   				echo 'OK';
		   			}


?>