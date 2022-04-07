<?php

					include_once("../sessions/session_pjr.php");
					require_once("../setup/connection.php");
					$pjr=$_SESSION['pjr'];
		   			/

					$pid=$_POST["pid"];
		   			$nom=ucwords($_POST["nom"]);
		   			$prenom=ucwords($_POST["prenom"]);
		   			$tel=$_POST["tel"];
		   			$email=$_POST["email"];

		   					$check_tel=$con->query("select * from porteur where pid!='$pid'and tel='$tel';") or (print_r($con->errorInfo()));
				   			$count_tel_out=$check_tel->rowCount();
				   			 if($count_tel_out>0){
					   			echo 'exist_tel';
					   				exit();
		   					}
		   			
		   					$check_email=$con->query("select * from porteur where email='$email' and pid!='$pid';") or (print_r($con->errorInfo()));
				   			$count_email_out=$check_email->rowCount();
				   			 if($count_email_out>0){
					   			echo 'exist_email';
					   				exit();
		   					}

							do{
				   				$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
								$pass = substr( str_shuffle( $chars ), 0, 8 );
								$check_pass=$con->query("select * from porteur where pass='$pass'") or (print_r($con->errorInfo()));
								$count_pass=$check_pass->rowCount();
								}while($count_pass>0);

		   					$in=$con->prepare("update porteur set nom=?, prenom=?, uname=?, pass=?, tel=?, email=?, desactivate=? where pid=? ;") or (print_r($con->errorInfo()));
		   					$in->execute(array( $nom, $prenom, 'PorteurDeJoie', $pass, $tel, $email, 'OFF', $pid)) or (print_r($con->errorInfo()));
		   					if($in) {
		   					echo "OK";
		   						}
		   	

?>