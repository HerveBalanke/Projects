<?php

					include_once("../sessions/session_secretaire.php");
		   			require_once("../setup/connection.php");

		   			$bid=$_POST["bid"];
		   			$groupe=ucwords($_POST["groupe"]);
		   			$leader=ucwords($_POST["leader"]);
		   			$check=$con->query("select * from groupe where groupe='$groupe' and branche='$bid';") or die (print_r($con->errorInfo()));
		   			$count_check=$check->rowCount();
		   			if($count_check>0){
		   				echo 'NO';
		   				exit();
		   			}else{

		   			$insert_groupe=$con->prepare("insert into groupe (groupe, leader, branche)
		   										values(?,?,?);") or die (print_r($con->errorInfo()));
		   			$insert_groupe->execute(array($groupe, $leader, $bid)) or die (print_r($con->errorInfo()));

		   			$out_gid=$con->query("select gid from groupe order by gid desc limit 1;") or die (print_r($con->errorInfo()));
		   			$fetch_gid=$out_gid->fetch();
		   			$ngroupe=$fetch_gid['gid'];

		   			$add_membre=$con->prepare("insert into grou_mem (gid, membre)
		   										values(?,?);") or die (print_r($con->errorInfo()));
		   			$add_membre->execute(array($ngroupe, $leader)) or die (print_r($con->errorInfo()));


		   			if($insert_groupe && $add_membre){
		   				echo 'OK';
		   			}
		   		}

?>