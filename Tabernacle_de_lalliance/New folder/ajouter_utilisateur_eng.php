<?php
					ob_start();
					session_start();
		   			require_once("../setup/connection.php");
		   			require '../gh/Smsgh/Api.php';

		   			$nom=ucwords($_POST["nom"]);
		   			$prenom=ucwords($_POST["prenom"]);
		   			$genre=$_POST["genre"];
		   			$date=$_POST["date"];
		   			$pays=$_POST["pays"];
		   			$prof=$_POST["prof"];
		   			$lha=ucwords($_POST["lha"]);
		   			$mail=$_POST["mail"];
		   			$fac=ucwords($_POST["fac"]);
		   			$tel=$_POST["tel"];
		   			$whatsapp=$_POST["whatsapp"];
		   			$ac=ucwords($_POST["ac"]);
		   			$prof_alt=ucwords($_POST["prof_alt"]);
		   			$ac_alt=ucwords($_POST["ac_alt"]);
		   			$pr=$_POST["pr"];






		   			if($prof_alt!==""){
		   					$check_prof=$con->query("select * from profession where profession='$prof_alt';") or (print_r($con->errorInfo()));
				   			$count_prof_out=$check_prof->rowCount();
				   			 if($count_prof_out>0){
					   			echo 'NO_prof';
					   				exit();
		   					}
		   					}

		   			if($ac_alt!==""){
		   					$check_ac=$con->query("select * from activite_ac where activite_ac='$ac_alt';") or (print_r($con->errorInfo()));
				   			$count_ac_out=$check_ac->rowCount();
				   			if($count_ac_out>0){
					   			echo 'NO_ac';
					   				exit();
		   					}
							}


		   			if($prof_alt!==""){

				   			$in_prof_alt=$con->query("insert into profession (profession) values ('$prof_alt');") or (print_r($con->errorInfo()));
				   			$prof_alt_out=$con->query("select * from profession order by pid desc limit 1;");
				   			$prof_alt_out=$prof_alt_out->fetch();
				   			$prof=$prof_alt_out['pid'];

				   			}

				   	if($ac_alt!==""){

				   			$in_ac_alt=$con->query("insert into activite_ac (activite_ac) values ('$ac_alt');") or (print_r($con->errorInfo()));
				   			$ac_alt_out=$con->query("select * from activite_ac order by acaid desc limit 1;");
				   			$ac_alt_out=$ac_alt_out->fetch();
				   			$ac=$ac_alt_out['acaid'];

				   			} 


				   			do{
				   				$chars_uname = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				   				$chars_pass = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
				   				$uname= substr( str_shuffle( $chars_uname ), 0, 8 );
								$password = substr( str_shuffle( $chars_pass ), 0, 8 );
								$check_ut_un=$con->query("select * from utilisateur_un where uname='$uname'") or (print_r($con->errorInfo()));
								$count_uname=$check_ut_un->rowCount();
								}while($count_uname>0);


				   			if($pr=='1'){
				   				$insert_utilisateur_un=$con->prepare("insert into utilisateur_un(nom, prenom, dob, genre, pays, email, tel, address, whatsapp, facebook, responsabilite, profession, photo, uname, pass, niveau)
		   										values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   						$insert_utilisateur_un->execute(array( $nom, $prenom, $date, $genre, $pays, $mail, $tel, $lha, $whatsapp, $fac, $ac, $prof, '-', $uname, $password, $pr)) or (print_r($con->errorInfo()));
				   				
				   				$out_ut_un=$con->query("select uid_un from utilisateur_un order by uid_un desc limit 1;") or (print_r($con->errorInfo()));
		   						$out_ut_un=$out_ut_un->fetch();
				   				$out_ut_un=$out_ut_un['uid_un'];
				   				if($insert_utilisateur_un){
		   							echo "OK";
		   							$_SESSION["id"]=$out_ut_un;
		   							$_SESSION["tel"]=$tel;
		   							$_SESSION["in"]=1;
		   						}
				   			}

				   		if($pr=='2'){
				   				$insert_utilisateur_deux=$con->prepare("insert into utilisateur_deux(nom, prenom, dob, genre, pays, email, tel, address, whatsapp, facebook, responsabilite, profession, photo, uname, pass, niveau)
		   										values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   						$insert_utilisateur_deux->execute(array( $nom, $prenom, $date, $genre, $pays, $mail, $tel, $lha, $whatsapp, $fac, $ac, $prof, '-', $uname, $password, $pr)) or (print_r($con->errorInfo()));
				   				
				   				$out_ut_deux=$con->query("select uid_deux from utilisateur_deux order by uid_deux desc limit 1;") or (print_r($con->errorInfo()));
		   						$out_ut_deux=$out_ut_deux->fetch();
				   				$out_ut_deux=$out_ut_deux['uid_deux'];
				   				if($insert_utilisateur_deux){
		   							echo "OK";
		   							$_SESSION["id"]=$out_ut_deux;
		   							$_SESSION["tel"]=$tel;
		   							$_SESSION["in"]=2;
		   						}
				   			}

				   		if($pr=='3'){
				   				$insert_utilisateur_admin=$con->prepare("insert into administrateur(nom, prenom, dob, genre, pays, email, tel, address, whatsapp, facebook, responsabilite, profession, photo, uname, pass, niveau)
		   										values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   						$insert_utilisateur_admin->execute(array( $nom, $prenom, $date, $genre, $pays, $mail, $tel, $lha, $whatsapp, $fac, $ac, $prof, '-', $uname, $password, $pr)) or (print_r($con->errorInfo()));

		   						$out_ad=$con->query("select aid from administrateur order by aid desc limit 1;") or (print_r($con->errorInfo()));
		   						$out_ad=$out_ad->fetch();
				   				$out_ad=$out_ad['aid'];
		   						if($insert_utilisateur_admin){
		   							echo"OK";
		   							$_SESSION["id"]=$out_ad;
		   							$_SESSION["tel"]=$tel;
		   							$_SESSION["in"]=3;
		   						}

				   			}

		   			$con=Null;





?>