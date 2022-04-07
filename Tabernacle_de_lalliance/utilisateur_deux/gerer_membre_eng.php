<?php
		   			

					include_once("session_deux.php");
		   			require_once("../setup/connection.php");
		   			require '../gh/Smsgh/Api.php';

		   			$nom=ucwords($_POST["nom"]);
		   			$prenom=ucwords($_POST["prenom"]);
		   			$genre=$_POST["genre"];
		   			$date=$_POST["date"];
		   			$pays=$_POST["pays"];
		   			$prof=$_POST["prof"];
		   			$fil=$_POST["fil"];
		   			$ecole=$_POST["ecole"];
		   			$sim=$_POST["sim"];
		   			$ne=$_POST["ne"];
		   			$lha=ucwords($_POST["lha"]);
		   			$mail=$_POST["mail"];
		   			$fac=ucwords($_POST["fac"]);
		   			$codetel=$_POST["codetel"];
		   			$tel=$_POST["tel"];
		   			$codewhat=$_POST["codewhat"];
		   			$whatsapp=$_POST["whatsapp"];
		   			$temps=ucwords($_POST["temps"]);
		   			$ae=ucwords($_POST["ae"]);
		   			$bpt=$_POST["bpt"];
		   			$ac=ucwords($_POST["ac"]);
		   			$ac_ta=ucwords($_POST["ac_ta"]);
		   			$nom_ur=ucwords($_POST["nom_ur"]);
		   			$prenom_ur=ucwords($_POST["prenom_ur"]);
		   			$code_ur=$_POST["code_ur"];
		   			$tel_ur=$_POST["tel_ur"];
		   			$mail_ur=$_POST["mail_ur"];
		   			$rel=ucwords($_POST["rel"]);
		   			$da=$_POST["da"];
		   			$prof_alt=ucwords($_POST["prof_alt"]);
		   			$fil_alt=ucwords($_POST["fil_alt"]);
		   			$ecole_alt=ucwords($_POST["ecole_alt"]);
		   			$ae_alt=ucwords($_POST["ae_alt"]);
		   			$ac_alt=ucwords($_POST["ac_alt"]);
		   			$ac_ta_alt=ucwords($_POST["ac_ta_alt"]);
		   			$rel_alt=ucwords($_POST["rel_alt"]);



		   			if($prof_alt!=""){

		   					$check_prof=$con->query("select * from profession where profession='$prof_alt';") or (print_r($con->errorInfo()));
				   			$count_prof_out=$check_prof->rowCount();
				   			 if($count_prof_out>0){
					   			echo 'NO_prof';
					   				exit();
		   					}

		   			}

		   			if($fil_alt!=""){
		   					$check_fil=$con->query("select * from filiere where filiere='$fil_alt';") or (print_r($con->errorInfo()));
				   			$count_fil_out=$check_fil->rowCount();
				   			 if($count_fil_out>0){
					   			echo 'NO_fil';
					   				exit();
		   					}

		   			}

		   			if($ecole_alt!=""){
		   					$check_ecole=$con->query("select * from ecole where ecole='$ecole_alt';") or (print_r($con->errorInfo()));
				   			$count_ecole_out=$check_ecole->rowCount();
				   			 if($count_ecole_out>0){
					   			echo 'NO_ecole';
					   				exit();
		   					}

		   			}

		   			if($ae_alt!=""){
		   					$check_ae=$con->query("select * from eglise where eglise='$ae_alt';") or (print_r($con->errorInfo()));
				   			$count_ae_out=$check_ae->rowCount();
				   			 if($count_ae_out>0){
					   			echo 'NO_ae';
					   				exit();
		   					}
		   			}

		   			if($ac_alt!=""){
		   					$check_ac=$con->query("select * from activite where activite='$ac_alt';") or (print_r($con->errorInfo()));
				   			$count_ac_out=$check_ac->rowCount();
				   			 if($count_ac_out>0){
					   			echo 'NO_ac';
					   				exit();
		   					}

		   			}

		   			if($ac_ta_alt!=""){
		   					$check_ac_ta=$con->query("select * from activite_ac where activite_ac='$ac_ta_alt';") or (print_r($con->errorInfo()));
				   			$count_ac_ta_out=$check_ac_ta->rowCount();
				   			 if($count_ac_ta_out>0){
					   			echo 'NO_ac_ta';
					   				exit();
		   					}

		   			}

		   			if($rel_alt!=""){
		   					$check_rel=$con->query("select * from relation where relation='$rel_alt';") or (print_r($con->errorInfo()));
				   			$count_rel_out=$check_rel->rowCount();
				   			 if($count_rel_out>0){
					   			echo 'NO_rel';
					   				exit();
		   					}

		   			}




		   			if($prof_alt!=""){

		   					$in_prof_alt=$con->query("insert into profession (profession) values ('$prof_alt');") or (print_r($con->errorInfo()));
				   			$prof_alt_out=$con->query("select * from profession order by pid desc limit 1;");
				   			$prof_alt_out=$prof_alt_out->fetch();
				   			$prof=$prof_alt_out['pid'];

		   			}

		   			if($fil_alt!=""){
		   					$in_fil_alt=$con->query("insert into filiere (filiere) values ('$fil_alt');") or (print_r($con->errorInfo()));
				   			$fil_alt_out=$con->query("select * from filiere order by fid desc limit 1;");
				   			$fil_alt_out=$fil_alt_out->fetch();
				   			$fil=$fil_alt_out['fid'];

		   			}

		   			if($ecole_alt!=""){
		   					$in_ecole_alt=$con->query("insert into ecole (ecole) values ('$ecole_alt');") or (print_r($con->errorInfo()));
				   			$ecole_alt_out=$con->query("select * from ecole order by eid desc limit 1;");
				   			$ecole_alt_out=$ecole_alt_out->fetch();
				   			$ecole=$ecole_alt_out['eid'];

		   			}

		   			if($ae_alt!=""){
		   					$in_ae_alt=$con->query("insert into egilse (egilse) values ('$ae_alt');") or (print_r($con->errorInfo()));
				   			$ae_alt_out=$con->query("select * from egilse order by egid desc limit 1;");
				   			$ae_alt_out=$ae_alt_out->fetch();
				   			$ae=$ae_alt_out['egid'];
		   			}

		   			if($ac_alt!=""){
		   					$in_ac_alt=$con->query("insert into activite (activite) values ('$ac_alt');") or (print_r($con->errorInfo()));
				   			$ac_alt_out=$con->query("select * from activite order by acaid desc limit 1;");
				   			$ac_alt_out=$ac_alt_out->fetch();
				   			$ac=$ac_alt_out['acid'];

		   			}

		   			if($ac_ta_alt!=""){
		   					$in_ac_ta_alt=$con->query("insert into activite_ac (activite_ac) values ('$ac_ta_alt');") or (print_r($con->errorInfo()));
				   			$ac_ta_alt_out=$con->query("select * from activite_ac order by acaid desc limit 1;");
				   			$ac_ta_alt_out=$ac_ta_alt_out->fetch();
				   			$ac_ta=$ac_ta_alt_out['acaid'];

		   			}

		   			if($rel_alt!=""){
		   					$in_rel_alt=$con->query("insert into relation (relation) values ('$rel_alt');") or (print_r($con->errorInfo()));
				   			$ac_rel_out=$con->query("select * from relation order by rid desc limit 1;");
				   			$ac_rel_out=$ac_rel_out->fetch();
				   			$rel=$ac_rel_out['rid'];

		   			}


		   			$insert_info_spi=$con->prepare("insert into info_spi (temps, a_eglise, bapt_immersion, ae_activite) values(?,?,?,?)");
		   			$insert_info_spi->execute(array( $temps, $ae, $bpt, $ac)) or die(print_r($con->errorInfo()));

		   			$info_spi_out=$con->query("select * from info_spi order by isid desc limit 1;");
		   			$info_spi_out=$info_spi_out->fetch();
		   			$iso=$info_spi_out['isid'];


		   			$insert_urgence=$con->prepare("insert into urgence (nom_ur, prenom_ur, codetel_ur, tel_ur, email_ur, relation) values(?,?,?,?,?,?)");
		   			$insert_urgence->execute(array( $nom_ur, $prenom_ur, $code_ur, $tel_ur, $mail_ur, $rel)) or (print_r($con->errorInfo()));

		   			$urgence_out=$con->query("select * from urgence order by uid desc limit 1;");
		   			$urgence_out=$urgence_out->fetch();
		   			$ur=$urgence_out['uid'];

		   			//echo $date;

		   			$insert_membre=$con->prepare("insert into membre (nom, prenom, genre, dob, photo, nbre_denfant, pays, profession, filiere, ecole, sit_mat, codetel, tel, codewhat, whatsapp, email, facebook, address, activite_ac, info_spi, per_urgence, date_adhesion)
		   										values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   			$insert_membre->execute(array( $nom, $prenom, $genre, $date, '-', $ne, $pays, $prof, $fil, $ecole, $sim, $codetel, $tel, $codewhat, $whatsapp, $mail, $fac, $lha, $ac_ta, $iso, $ur, $da)) or (print_r($con->errorInfo()));
					
		   			$out_info=$con->query("select mid from membre order by mid desc limit 1;") or (print_r($con->errorInfo()));
		   						$out_info=$out_info->fetch();
				   				$out_info=$out_info['mid'];
					if($insert_membre){
		   							echo "OK";
		   							$_SESSION["id_mem"]=$out_info;
		   							$_SESSION["tel_mem"]=$tel;
		   						}


		   			/*if ($insert_membre){
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
    $mesg->setContent("$nom $prenom Bienvenue au Tabernacle de l'Alliance, L'auditorium de la transformation");
    $mesg->setTo("$tel");
    $mesg->setFrom("TA");
    $mesg->setRegisteredDelivery(true);*/

    // Let us say we want to send the message 3 days from today
   // $mesg->setTime(date('Y-m-d H:i:s', strtotime('+1 week')));*/

   /*,   $messageResponse = $messagingApi->sendMessage($mesg);

    if ($messageResponse instanceof MessageResponse) {
        echo $messageResponse->getStatus();
    } elseif ($messageResponse instanceof HttpResponse) {
        echo "\nServer Response Status : " . $messageResponse->getStatus();
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}

		   				echo "OK";
		   			}*/

		   			$con=Null;





?>