<?php

					include_once("../sessions/session_pjr.php");
					require_once("../setup/connection.php");
					$pjr=$_SESSION['pjr'];

		   			$nom=ucwords($_POST["nom"]);
		   			$prenom=ucwords($_POST["prenom"]);
		   			$tel=$_POST["tel"];
		   			$zone=ucwords($_POST["zone"]);
		   			$zone_alt=ucwords($_POST["zone_alt"]);
		   			$date=$_POST["date"];


		   			if($zone_alt!=""){

		   					$check_zone=$con->query("select * from zone where zone='$zone_alt';") or (print_r($con->errorInfo()));
				   			$count_zone_out=$check_zone->rowCount();
				   			 if($count_zone_out>0){
					   			echo 'NO_zone';
					   				exit();
		   					}

		   			}


		   			if($zone_alt!=""){

		   					$in_zone_alt=$con->query("insert into zone (zone) values ('$zone_alt');") or (print_r($con->errorInfo()));
				   			$zone_alt_out=$con->query("select * from zone order by zid desc limit 1;");
				   			$zone_alt_out=$zone_alt_out->fetch();
				   			$zone=$zone_alt_out['zid'];

		   			}

		   					$in=$con->prepare("insert into evangelisation (nom, prenom, tel, zone, date, status) values(?,?,?,?,?,?) ;") or (print_r($con->errorInfo()));
		   					$in->execute(array( $nom, $prenom, $tel, $zone, $date, 'OFF')) or (print_r($con->errorInfo()));

		   					if($in){
		   					echo "OK";
		   				}

?>