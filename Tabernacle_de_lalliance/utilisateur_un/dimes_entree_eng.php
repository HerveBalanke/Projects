<?php
		   			include_once("../sessions/session_tresorier.php");
					require_once("../setup/connection.php");
					$bid=$_SESSION['bid'];

		   			$tid=$_POST["tid"];
		   			$date=$_POST["date"];
		   			$id=$_POST["id"];
		   			$mon=$_POST["mon"];

		   			$insert_dim=$con->prepare("insert into dime (membre, date, montant, tresorier, usher, admin, confirmation, branche)
		   										values(?,?,?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   			$insert_dim->execute(array($id, $date, $mon, $tid, '-', '-', '-', $bid)) or (print_r($con->errorInfo()));

		   			if($insert_dim){
		   				echo 'OK';
		   			}


?>