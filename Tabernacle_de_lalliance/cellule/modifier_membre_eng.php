<?php

					include_once("../sessions/session_cellule.php");
					require_once("../setup/connection.php");
					$bid=$_SESSION['bid'];
					$cellule=$_SESSION['cellule'];
					$zone_cel=$_SESSION['zone_cel'];

					$mid=$_POST["mid"];
		   			$nom=ucwords($_POST["nom"]);
		   			$prenom=ucwords($_POST["prenom"]);
		   			$tel=$_POST["tel"];
		   			$email=$_POST["email"];


		   					$in=$con->prepare("update membre_cel set nom=?, prenom=?, tel=?, email=? where mcid=? ;") or (print_r($con->errorInfo()));
		   					$in->execute(array( $nom, $prenom, $tel, $email, $mid)) or (print_r($con->errorInfo()));

		   					if($in){
							      echo "OK";
				   					}

?>