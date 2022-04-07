<?php
					include_once("../sessions/session_pasteur.php");
					require_once("../setup/connection.php");
					$pasteur=$_SESSION['pasteur'];
		   			require '../gh/Smsgh/Api.php';

		   			$bid=ucwords($_POST["bid"]);
		   			$nom=ucwords($_POST["nom"]);
		   			$prenom=ucwords($_POST["prenom"]);
		   			$genre=$_POST["genre"];
		   			$date=$_POST["date"];
		   			$pays=$_POST["pays"];
		   			$prof=$_POST["prof"];
		   			$lha=ucwords($_POST["lha"]);
		   			$mail=$_POST["mail"];
		   			$fac=ucwords($_POST["fac"]);
		   			$codet=$_POST["codet"];
		   			$tel=$_POST["tel"];
		   			$codew=$_POST["codew"];
		   			$whatsapp=$_POST["whatsapp"];
		   			$ni=ucwords($_POST["ni"]);
		   			$prof_alt=ucwords($_POST["prof_alt"]);
		   			






		   			if($prof_alt!==""){
		   					$check_prof=$con->query("select * from profession where profession='$prof_alt';") or (print_r($con->errorInfo()));
				   			$count_prof_out=$check_prof->rowCount();
				   			 if($count_prof_out>0){
					   			echo 'NO_prof';
					   				exit();
		   					}
		   					}
				

		   			if($prof_alt!==""){

				   			$in_prof_alt=$con->query("insert into profession (profession) values ('$prof_alt');") or (print_r($con->errorInfo()));
				   			$prof_alt_out=$con->query("select * from profession order by pid desc limit 1;");
				   			$prof_alt_out=$prof_alt_out->fetch();
				   			$prof=$prof_alt_out['pid'];

				   			}
				   				

				   			do{
				   				$chars_uname = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				   				$chars_pass = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				   				$uname= substr( str_shuffle( $chars_uname ), 0, 8 );
								$password = substr( str_shuffle( $chars_pass ), 0, 8 );
								$check_ut_un=$con->query("select * from utilisateur where uname='$uname'") or (print_r($con->errorInfo()));
								$count_uname=$check_ut_un->rowCount();
								}while($count_uname>0);


				   				$insert_utilisateur=$con->prepare("insert into utilisateur(nom, prenom, dob, genre, pays, email, codetel, tel, address, codewhat, whatsapp, facebook, niveau, departement, profession, photo, uname, pass, branche, desactivate)
		   										values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   						$insert_utilisateur->execute(array( $nom, $prenom, $date, $genre, $pays, $mail, $codet, $tel, $lha, $codew, $whatsapp, $fac, $ni, '-', $prof, '-', $uname, $password, $bid, 'off')) or (print_r($con->errorInfo()));
				   				
				   				$out_ut=$con->query("select uid from utilisateur order by uid desc limit 1;") or (print_r($con->errorInfo()));
		   						$out_ut=$out_ut->fetch();
				   				$out_ut=$out_ut['uid'];
				   				if($insert_utilisateur){
		   							echo "OK,".$out_ut;
		   						}

		   			$con=Null;





?>