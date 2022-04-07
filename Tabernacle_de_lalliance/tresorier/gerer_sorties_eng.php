<?php
					include_once("../sessions/session_tresorier.php");
					require_once("../setup/connection.php");
					$bid=$_SESSION['bid'];
					$treso=$_SESSION['tresorier'];
		   			$tid=$_POST["tid"];
		   			$date=$_POST["date"];
		   			$motif=ucwords($_POST["motif"]);
		   			$desc=$_POST["desc"];
		   			$mon=$_POST["mon"];

		   			$insert_dep=$con->prepare("insert into depense (date, motif, description, montant, tresorier, administrateur, admin_id, branche)
		   										values(?,?,?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   			$insert_dep->execute(array($date, $motif, $desc, $mon, $tid, '-', '-', $bid)) or (print_r($con->errorInfo()));

		   			if($insert_dep){
		   				echo 'OK';
		   			}


?>