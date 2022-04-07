<?php

					include_once("session_admin.php");
		   			require_once("../setup/connection.php");


		   			$did=$_POST["did"];
		   			$date=$_POST["date"];
		   			$id=$_POST["id"];
		   			$mid=$_POST["mid"];
		   			$mon=$_POST["mon"];

		   			$update_dim=$con->prepare("update dime set membre=?, date=?, montant=?, signataire_un=?, signataire_deux=? where diid=? and signataire_trois=?;") or (print_r($con->errorInfo()));
		   			$update_dim->execute(array($mid, $date, $mon, '-', '-', $did, $id)) or (print_r($con->errorInfo()));

		   			if($update_dim){
		   				echo 'OK';
		   			}


?>