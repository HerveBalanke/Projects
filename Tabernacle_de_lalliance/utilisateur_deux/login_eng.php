<?php

					include_once("session_deux.php");
		   			require_once("../setup/connection.php");

		   			$pseudo=$_POST["pseudo"];
		   			$mp=$_POST["mp"];
		   			// echo $pseudo;
		   			// echo $mp;

		   			$check_out_un=$con->query("select uname, pass from utilisateur_un where uname='$pseudo' and pass='$mp';") or (print_r($con->errorInfo()));
		   			$count_un=$check_out_un->rowCount();

		   			$check_out_deux=$con->query("select uname, pass from utilisateur_deux where uname='$pseudo' and pass='$mp';") or (print_r($con->errorInfo()));
		   			$count_deux=$check_out_deux->rowCount();

		   			$check_out_admin=$con->query("select uname, pass from administrateur where uname='$pseudo' and pass='$mp';") or (print_r($con->errorInfo()));
		   			$count_admin=$check_out_admin->rowCount();

		   			// $check_out_admin_super=$con->query("select uname, pass from administrateur_super where uname='$pseudo' and pass='$mp';") or (print_r($con->errorInfo()));
		   			// $count_admin_super=$check_out_admin_super->rowCount();

		   			if($count_un>0){
		   				echo 'OK_un';
		   			}else if($count_deux>0){
		   				echo 'OK_deux';
		   			}else if($count_admin>0){
		   				echo 'OK_admin';
		   			// }else if($count_admin_super>0){
		   				// echo "super";
		   			}else{
		   				echo "NO";
		   			}


?>