<?php
		   			
					include_once("../sessions/session_tresorier.php");
					require_once("../setup/connection.php");
					$bid=$_SESSION['bid'];

		   			$did=$_POST["did"];
		   			$date=$_POST["date"];
		   			$tid=$_POST["tid"];
		   			$mid=$_POST["mid"];
		   			$mon=$_POST["mon"];

		   			$update_dim=$con->prepare("update dime set membre=?, date=?, montant=?, usher=?, admin=?, confirmation=?  where diid=? and branche=? and tresorier=?;") or (print_r($con->errorInfo()));
		   			$update_dim->execute(array($mid, $date, $mon, '-', '-', '-', $did, $bid, $tid)) or (print_r($con->errorInfo()));

		   			if($update_dim){
		   				echo 'OK';
		   			}


?>