<?php

					// include_once("session_admin.php");
		   			require_once("../setup/connection.php");
		   			require '../SendingMail/classes/class.phpmailer.php';
					require '../SendingMail/classes/class.smtp.php';

					$lid=$_POST["lid"];
		   			$nom=ucwords($_POST["nom"]);
		   			$prenom=ucwords($_POST["prenom"]);
		   			$tel=$_POST["tel"];
		   			$email=$_POST["email"];

		   					$check_tel=$con->query("select * from leader where lid!='$lid'and tel='$tel';") or (print_r($con->errorInfo()));
				   			$count_tel_out=$check_tel->rowCount();
				   			 if($count_tel_out>0){
					   			echo 'exist_tel';
					   				exit();
		   					}
		   			
		   					$check_email=$con->query("select * from leader where email='$email' and lid!='$lid';") or (print_r($con->errorInfo()));
				   			$count_email_out=$check_email->rowCount();
				   			 if($count_email_out>0){
					   			echo 'exist_email';
					   				exit();
		   					}

							do{
				   				$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
								$pass = substr( str_shuffle( $chars ), 0, 8 );
								$check_pass=$con->query("select * from leader where pass='$pass'") or (print_r($con->errorInfo()));
								$count_pass=$check_pass->rowCount();
								}while($count_pass>0);

		   					$in=$con->prepare("update leader set nom=?, prenom=?, uname=?, pass=?, tel=?, email=?, desactivate=? where lid=? ;") or (print_r($con->errorInfo()));
		   					$in->execute(array( $nom, $prenom, 'PorteurDeJoie', $pass, $tel, $email, 'ON', $lid)) or (print_r($con->errorInfo()));

		   					if($in){
		   		// 			$head="Compte Zanzy Auto";
		   		// 			$message="Nom d'porteur: ZanzyAuto
		   		// 					  Mot de Passe: ".$pass;	
		   		// 			$mail = new PHPMailer();
							// $mail->isSMTP(); 
							// $mail->SMTPDebug = 0;                                       
							// $mail->Host = 'smtp.gmail.com';  
							// $mail->SMTPAuth = true;               
							// $mail->Username = '';                 
							// $mail->Password = '';                           
							// $mail->SMTPSecure = 'ssl';                            
							// $mail->Port = 465;  
							// $mail->From      = "";
							// $mail->FromName  = "Zanzy Auto";
							// $mail->Subject   = $head;
							// $mail->Body      = $message;
							// $mail->AddAddress( trim($email)); 

							//         if(!$mail->send()) {
							//         echo "envoi_NO";
							//       } else { 
							      echo "envoi_OK";
							//       }	
									   					}

?>