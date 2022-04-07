<?php
		   			

					include_once("../sessions/session_secretaire.php");
		   			require_once("../setup/connection.php");

		   			$bid=htmlspecialchars($_POST['bid']);
		   			$mid=htmlspecialchars($_POST['mid']);
		   			$nom=ucwords(htmlspecialchars($_POST["nom"]));
		   			$prenom=ucwords(htmlspecialchars($_POST["prenom"]));
		   			$genre=htmlspecialchars($_POST["genre"]);
		   			$date=htmlspecialchars($_POST["date"]);
		   			$pays=htmlspecialchars($_POST["pays"]);
		   			$prof=htmlspecialchars($_POST["prof"]);
		   			$fil=htmlspecialchars($_POST["fil"]);
		   			$ecole=htmlspecialchars($_POST["ecole"]);
		   			$sim=htmlspecialchars($_POST["sim"]);
		   			$ne=htmlspecialchars($_POST["ne"]);
		   			$lha=ucwords(htmlspecialchars($_POST["lha"]));
		   			$mail=htmlspecialchars($_POST["mail"]);
		   			$fac=ucwords(htmlspecialchars($_POST["fac"]));
		   			$codetel=htmlspecialchars($_POST["codetel"]);
		   			$tel=htmlspecialchars($_POST["tel"]);
		   			$codewhat=htmlspecialchars($_POST["codewhat"]);
		   			$whatsapp=htmlspecialchars($_POST["whatsapp"]);
		   			$temps=ucwords(htmlspecialchars($_POST["temps"]));
		   			$ae=ucwords(htmlspecialchars($_POST["ae"]));
		   			$bpt=htmlspecialchars($_POST["bpt"]);
		   			$ac=ucwords(htmlspecialchars($_POST["ac"]));
		   			$ac_ta=ucwords(htmlspecialchars($_POST["ac_ta"]));
		   			// $sta=ucwords($_POST["sta"]);
		   			$nom_ur=ucwords(htmlspecialchars($_POST["nom_ur"]));
		   			$prenom_ur=ucwords(htmlspecialchars($_POST["prenom_ur"]));
		   			$code_ur=htmlspecialchars($_POST["code_ur"]);
		   			$tel_ur=htmlspecialchars($_POST["tel_ur"]);
		   			$mail_ur=htmlspecialchars($_POST["mail_ur"]);
		   			$rel=ucwords(htmlspecialchars($_POST["rel"]));
		   			$da=htmlspecialchars($_POST["da"]);
		   			$prof_alt=ucwords(htmlspecialchars($_POST["prof_alt"]));
		   			$fil_alt=ucwords(htmlspecialchars($_POST["fil_alt"]));
		   			$ecole_alt=ucwords(htmlspecialchars($_POST["ecole_alt"]));
		   			$ae_alt=ucwords(htmlspecialchars($_POST["ae_alt"]));
		   			$ac_alt=ucwords(htmlspecialchars($_POST["ac_alt"]));
		   			$ac_ta_alt=ucwords(htmlspecialchars($_POST["ac_ta_alt"]));
		   			// $sta_alt=ucwords($_POST["sta_alt"]);
		   			$rel_alt=ucwords(htmlspecialchars($_POST["rel_alt"]));
		   			$info_spi=htmlspecialchars($_POST["info_spi"]);
		   			$per_urgence=htmlspecialchars($_POST["per_urgence"]);






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

		   			// if($sta_alt!=""){
		   			// 		$check_sta=$con->query("select * from t_membre where tmid='$sta_alt';") or (print_r($con->errorInfo()));
				   	// 		$count_sta_out=$check_sta->rowCount();
				   	// 		 if($count_sta_out>0){
					   // 			echo 'NO_sta';
					   // 				exit();
		   			// 		}

		   			// }

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
		   					$in_ae_alt=$con->query("insert into egilse (eglise) values ('$ae_alt');") or (print_r($con->errorInfo()));
				   			$ae_alt_out=$con->query("select * from eglise order by egid desc limit 1;");
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

		   			// if($sta_alt!=""){
		   			// 		$in_sta_alt=$con->query("insert into t_membre (type) values ('$sta_alt');") or (print_r($con->errorInfo()));
				   	// 		$sta_alt_out=$con->query("select * from t_membre order by tmid desc limit 1;");
				   	// 		$sta_alt_out=$sta_alt_out->fetch();
				   	// 		$sta=$sta_alt_out['tmid'];

		   			// }

		   			if($rel_alt!=""){
		   					$in_rel_alt=$con->query("insert into relation (relation) values ('$rel_alt');") or (print_r($con->errorInfo()));
				   			$ac_rel_out=$con->query("select * from relation order by rid desc limit 1;");
				   			$ac_rel_out=$ac_rel_out->fetch();
				   			$rel=$ac_rel_out['rid'];

		   			}




		   			$insert_info_spi=$con->prepare("update info_spi set temps=?, a_eglise=?, bapt_immersion=?, ae_activite=? where isid=?");
		   			$insert_info_spi->execute(array( $temps, $ae, $bpt, $ac, $info_spi)) or die(print_r($con->errorInfo()));

		   			$info_spi_out=$con->query("select * from info_spi where isid='$info_spi';");
		   			$info_spi_out=$info_spi_out->fetch();
		   			$iso=$info_spi_out['isid'];


		   			$insert_urgence=$con->prepare("update urgence set nom_ur=?, prenom_ur=?, codetel_ur=?, tel_ur=?, email_ur=?, relation=? where uid=?");
		   			$insert_urgence->execute(array( $nom_ur, $prenom_ur, $code_ur, $tel_ur, $mail_ur, $rel, $per_urgence)) or (print_r($con->errorInfo()));

		   			$urgence_out=$con->query("select * from urgence where uid='$per_urgence';");
		   			$urgence_out=$urgence_out->fetch();
		   			$ur=$urgence_out['uid'];


		   			$insert_membre=$con->prepare("update membre set nom=?, prenom=?, genre=?, dob=?, nbre_denfant=?, pays=?, profession=?, filiere=?, 
		   										ecole=?, sit_mat=?, codetel=?, tel=?, codewhat=?, whatsapp=?, email=?, facebook=?, address=?, activite_ac=?, info_spi=?, per_urgence=?, date_adhesion=?, branche=?
		   										where mid=?;") or (print_r($con->errorInfo()));
		   			$insert_membre->execute(array( $nom, $prenom, $genre, $date, $ne, $pays, $prof, $fil, $ecole, $sim, $codetel, $tel, 
		   											$codewhat, $whatsapp, $mail, $fac, $lha, $ac_ta, $iso, $ur, $da, $bid, $mid)) or (print_r($con->errorInfo()));

		   		
					if($insert_membre){
		   							echo "OK";
		   						}


		   			$con=Null;





?>