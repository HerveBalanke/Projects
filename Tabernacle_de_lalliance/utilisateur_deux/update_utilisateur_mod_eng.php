<?php
					 
					include_once("session_deux.php");
		   			require_once("../setup/connection.php");
		   			require '../gh/Smsgh/Api.php';
		   			$id=$_POST["id"];
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


				   			if($pr=='1'){
				   				$update_utilisateur_un=$con->prepare("update utilisateur_un set nom=?, prenom=?, dob=?, genre=?, pays=?, email=?, tel=?, address=?, whatsapp=?, facebook=?, responsabilite=?, profession=?, niveau=? where uid_un=?;") or (print_r($con->errorInfo()));
		   						$update_utilisateur_un->execute(array( $nom, $prenom, $date, $genre, $pays, $mail, $tel, $lha, $whatsapp, $fac, $ac, $prof, $pr, $id)) or (print_r($con->errorInfo()));
				   				if($update_utilisateur_un){
		   							echo "OK";
		   							$_SESSION["id"]=$id;
		   							$_SESSION["in"]=1;
		   						}
				   			}

				   		if($pr=='2'){
				   				$update_utilisateur_deux=$con->prepare("update utilisateur_deux set nom=?, prenom=?, dob=?, genre=?, pays=?, email=?, tel=?, address=?, whatsapp=?, facebook=?, responsabilite=?, profession=?, niveau=? where uid_deux=?
		   						;") or (print_r($con->errorInfo()));
		   						$update_utilisateur_deux->execute(array( $nom, $prenom, $date, $genre, $pays, $mail, $tel, $lha, $whatsapp, $fac, $ac, $prof, $pr, $id)) or (print_r($con->errorInfo()));
				   				if($update_utilisateur_deux){
		   							echo "OK";
		   							$_SESSION["id"]=$id;
		   							$_SESSION["in"]=2;
		   						}
				   			}

				   		if($pr=='3'){
				   				$update_admin=$con->prepare("update administrateur set nom=?, prenom=?, dob=?, genre=?, pays=?, email=?, tel=?, address=?, whatsapp=?, facebook=?, responsabilite=?, profession=?, niveau=? where aid=?
		   						;") or (print_r($con->errorInfo()));
		   						$update_admin->execute(array( $nom, $prenom, $date, $genre, $pays, $mail, $tel, $lha, $whatsapp, $fac, $ac, $prof, $pr, $id)) or (print_r($con->errorInfo()));
		   						if($update_admin){
		   							echo"OK";
		   							$_SESSION["id"]=$id;
		   							$_SESSION["in"]=3;
		   						}

				   			}

		   			$con=Null;





?>