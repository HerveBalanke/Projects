<?php

					include_once("../sessions/session_pasteur.php");
					require_once("../setup/connection.php");
					$bid=$_SESSION['bid'];
					$pasteur=$_SESSION['pasteur'];
		   			require '../SendingMail/classes/class.phpmailer.php';
					require '../SendingMail/classes/class.smtp.php';

		   			$nom=ucwords($_POST["nom"]);
		   			$prenom=ucwords($_POST["prenom"]);
		   			$tel=$_POST["tel"];
		   			$email=$_POST["email"];
		   			$zone_alt=$_POST["zone_alt"];
		   			$zone_cel=$_POST["zone"];


		   					if($zone_alt!==""){
		   					$check_zone=$con->query("select * from zone_cel where zone='$zone_alt';") or (print_r($con->errorInfo()));
				   			$count_zone_out=$check_zone->rowCount();
				   			 if($count_zone_out>0){
					   			echo 'NO_zone';
					   				exit();
		   					}
		   					}
				

		   					if($zone_alt!==""){

				   			$in_zone_alt=$con->query("insert into zone_cel (zone) values ('$zone_alt');") or (print_r($con->errorInfo()));
				   			$zone_alt_out=$con->query("select * from zone_cel order by zid_cel desc limit 1;");
				   			$zone_alt_out=$zone_alt_out->fetch();
				   			$zone_cel=$zone_alt_out['zid_cel'];

				   			}

		   					$check_tel=$con->query("select * from cellule where tel='$tel';") or (print_r($con->errorInfo()));
				   			$count_tel_out=$check_tel->rowCount();
				   			 if($count_tel_out>0){
					   			echo 'exist_tel';
					   				exit();
		   					}
		   			
		   					$check_email=$con->query("select * from cellule where email='$email';") or (print_r($con->errorInfo()));
				   			$count_email_out=$check_email->rowCount();
				   			 if($count_email_out>0){
					   			echo 'exist_email';
					   				exit();
		   					}

							do{
				   				$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
								$pass = substr( str_shuffle( $chars ), 0, 8 );
								$check_pass=$con->query("select * from cellule where pass='$pass'") or (print_r($con->errorInfo()));
								$count_pass=$check_pass->rowCount();
								}while($count_pass>0);

		   					$in=$con->prepare("insert into cellule (lnom, lprenom, uname, pass, tel, email, zone_cel, branche, desactivate) values(?,?,?,?,?,?,?,?,?) ;") or (print_r($con->errorInfo()));
		   					$in->execute(array( $nom, $prenom, 'LeaderCellule', $pass, $tel, $email, $zone_cel, $bid, 'off')) or (print_r($con->errorInfo()));

		   			if($in){
		   		// 			$head="Compte Zanzy Auto";
		   		// 			$message="Nom d'utilisateur: ZanzyAuto
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
							//       echo "envoi_OK";
							//       }	
									   
									   echo "envoi_OK";
									   					 }

?>