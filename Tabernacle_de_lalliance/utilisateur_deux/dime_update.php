<?php

					include_once("session_deux.php");
		   			require_once("../setup/connection.php");

		   			$did=$_POST["did"];
		   			$date=$_POST["date"];
		   			$id=$_POST["id"];
		   			$sid=$_POST["sid"];
		   			$mon=$_POST["mon"];

		   			$update_dim=$con->prepare("update dime set membre=?, date=?, montant=?, signataire_un=?, signataire_trois=?  where diid=? and signataire_deux=?;") or (print_r($con->errorInfo()));
		   			$update_dim->execute(array($id, $date, $mon, '-', '-', $did, $sid)) or (print_r($con->errorInfo()));

		   			if($update_dim){
		   				echo 'OK';
		   			}


?>