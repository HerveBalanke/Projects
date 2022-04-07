<?php
					ob_start();
					session_start();
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
		   			$codet=$_POST["codet"];
		   			$tel=$_POST["tel"];
		   			$codew=$_POST["codew"];
		   			$whatsapp=$_POST["whatsapp"];
		   			$ni=ucwords($_POST["ni"]);
		   			$dept=ucwords($_POST["dept"]);
		   			$branche=ucwords($_POST["branche"]);
		   			$prof_alt=ucwords($_POST["prof_alt"]);
		   			$ni_alt=ucwords($_POST["ni_alt"]);
		   			$dept_alt=ucwords($_POST["dept_alt"]);
		   			$branche_alt=ucwords($_POST["branche_alt"]);






		   			if($prof_alt!==""){
		   					$check_prof=$con->query("select * from profession where profession='$prof_alt';") or (print_r($con->errorInfo()));
				   			$count_prof_out=$check_prof->rowCount();
				   			 if($count_prof_out>0){
					   			echo 'NO_prof';
					   				exit();
		   					}
		   					}

		   			if($ni_alt!==""){
		   					$check_ni=$con->query("select * from niveau where niveau='$ni_alt';") or (print_r($con->errorInfo()));
				   			$count_ni_out=$check_ni->rowCount();
				   			if($count_ni_out>0){
					   			echo 'NO_ni';
					   				exit();
		   					}
							}


					if($dept_alt!==""){
		   					$check_dept=$con->query("select * from departement where departement='$dept_alt';") or (print_r($con->errorInfo()));
				   			$count_dept_out=$check_dept->rowCount();
				   			if($count_dept_out>0){
					   			echo 'NO_dept';
					   				exit();
		   					}
							}

					if($branche_alt!==""){
		   					$check_branche=$con->query("select * from branche where branche='$branche_alt';") or (print_r($con->errorInfo()));
				   			$count_branche_out=$check_branche->rowCount();
				   			if($count_branche_out>0){
					   			echo 'NO_branche';
					   				exit();
		   					}
							}


		   			if($prof_alt!==""){

				   			$in_prof_alt=$con->query("insert into profession (profession) values ('$prof_alt');") or (print_r($con->errorInfo()));
				   			$prof_alt_out=$con->query("select * from profession order by pid desc limit 1;");
				   			$prof_alt_out=$prof_alt_out->fetch();
				   			$prof=$prof_alt_out['pid'];

				   			}

				   	if($ni_alt!==""){

				   			$in_ni_alt=$con->query("insert into niveau (niveau) values ('$ni_alt');") or (print_r($con->errorInfo()));
				   			$ni_alt_out=$con->query("select * from niveau order by niid desc limit 1;");
				   			$ni_alt_out=$ni_alt_out->fetch();
				   			$ni=$ni_alt_out['niid'];

				   			} 

				   	if($dept_alt!==""){

				   			$in_dept_alt=$con->query("insert into departement (departement) values ('$dept_alt');") or (print_r($con->errorInfo()));
				   			$dept_alt_out=$con->query("select * from departement order by deptid desc limit 1;");
				   			$dept_alt_out=$dept_alt_out->fetch();
				   			$dept=$dept_alt_out['deptid'];

				   			} 

				   	if($branche_alt!==""){

				   			$in_branche_alt=$con->query("insert into branche (branche) values ('$branche_alt');") or (print_r($con->errorInfo()));
				   			$branche_alt_out=$con->query("select * from branche order by bid desc limit 1;");
				   			$branche_alt_out=$branche_alt_out->fetch();
				   			$branche=$branche_alt_out['bid'];

				   			}

				   				$update_utilisateur=$con->prepare("update utilisateur set nom=?, prenom=?, dob=?, genre=?, pays=?, email=?, codetel=?, tel=?, address=?, codewhat=?, whatsapp=?, facebook=?, niveau=?, departement=?, profession=?, branche=? where uid=?;") or (print_r($con->errorInfo()));
		   						$update_utilisateur->execute(array( $nom, $prenom, $date, $genre, $pays, $mail, $codet, $tel, $lha, $codew, $whatsapp, $fac, $ni, $dept, $prof, $branche, $id)) or (print_r($con->errorInfo()));
				   				if($update_utilisateur){
		   							echo "OK,".$id;
		   						}

		   			$con=NUll;





?>