<?php
		   			
					include_once("../sessions/session_secretaire.php");
					require_once("../setup/connection.php");
					$bid=$_SESSION['bid'];
		   			$groupe=$_POST["groupe"];
		   			$membre=$_POST["membre"];
		   			$check=$con->query("select * from grou_mem where gid='$groupe' and membre='$membre';")or (print_r($con->errorInfo()));
		   			$count_check=$check->rowCount();

		   			if($count_check>0){
		   				echo 'NO';
		   				exit();
		   			}else{

		   			$add_membre=$con->prepare("insert into grou_mem (gid, membre)
		   										values(?,?);") or (print_r($con->errorInfo()));
		   			$add_membre->execute(array($groupe, $membre)) or (print_r($con->errorInfo()));

		   			if($add_membre){
		   				echo 'OK';
		   			}
		   		}


?>