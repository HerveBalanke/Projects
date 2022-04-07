<?php

					include_once("../sessions/session_pjr.php");
					require_once("../setup/connection.php");
					$pjr=$_SESSION['pjr'];
					require '../gh/Smsgh/Api.php';

		   			$nom=ucwords($_POST["nom"]);
		   			$prenom=ucwords($_POST["prenom"]);
		   			$tel=$_POST["tel"];
		   			$email=$_POST["email"];

		   					$check_tel=$con->query("select * from porteur where tel='$tel';") or (print_r($con->errorInfo()));
				   			$count_tel_out=$check_tel->rowCount();
				   			 if($count_tel_out>0){
					   			echo 'extel';
					   				exit();
		   					}
		   			
		   					$check_email=$con->query("select * from porteur where email='$email';") or (print_r($con->errorInfo()));
				   			$count_email_out=$check_email->rowCount();
				   			 if($count_email_out>0){
					   			echo 'email';
					   				exit();
		   					}

							do{
				   				$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
								$pass = substr( str_shuffle( $chars ), 0, 8 );
								$check_pass=$con->query("select * from porteur where pass='$pass'") or (print_r($con->errorInfo()));
								$count_pass=$check_pass->rowCount();
								}while($count_pass>0);

		   					$in=$con->prepare("insert into porteur (nom, prenom, uname, pass, tel, email, desactivate) values(?,?,?,?,?,?,?) ;") or (print_r($con->errorInfo()));
		   					$in->execute(array( $nom, $prenom, 'PorteurDeJoie', $pass, $tel, $email, 'OFF')) or (print_r($con->errorInfo()));

		   			if ($in){
		   				$auth = new BasicAuth("gvtmltsv", "ejyrwxpk");
					// instance of ApiHost
					$apiHost = new ApiHost($auth);

					// instance of AccountApi
					$accountApi = new AccountApi($apiHost);
					// Get the account profile
					// Let us try to send some message
					$messagingApi = new MessagingApi($apiHost);
					try {
					    // Send a quick message
					   // $messageResponse = $messagingApi->sendQuickMessage("TA", "+233".$tel, "$nom $prenom Bienvenue au Tabernacle de l'Alliance, L'auditorium de la transformation");


					    $mesg = new Message();
					    $mesg->setContent("Bienvenue au TA manager, Porteur de Joie. Votre uname est: PorteurDeJoie et votre mot de passe est $pass.");
					    $mesg->setTo("$tel");
					    $mesg->setFrom("TA");
					    $mesg->setRegisteredDelivery(true);

					    // Let us say we want to send the message 3 days from today
					   // $mesg->setTime(date('Y-m-d H:i:s', strtotime('+1 week')));*/

					      $messageResponse = $messagingApi->sendMessage($mesg);

					    if ($messageResponse instanceof MessageResponse) {
					        echo "SENTY,".$mid;
					    } elseif ($messageResponse instanceof HttpResponse) {
					        echo "SENTN,".$mid;
					    }
					} catch (Exception $ex) {
					    echo $ex->getTraceAsString();
					}
							   			
						}
?>