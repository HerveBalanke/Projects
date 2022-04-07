<?php
		   			
					include_once("session_deux.php");
					require_once("../setup/connection.php");
		   			$groupe=$_POST["groupe"];
		   			$choix=$_POST["choix"];
		   			$choix_array = explode(",", $choix);
    				$mid = count($choix_array);
    				for ($i = 0; $i < $mid ; $i++) {
    				$id=$choix_array[$i];
		   			$check=$con->query("select * from grou_mem where gid='$groupe' and membre='$id';")or (print_r($con->errorInfo()));
		   			$count_check=$check->rowCount();

		   			if($count_check<=0){
		   				$add_membre=$con->prepare("insert into grou_mem (gid, membre)
		   										values(?,?);") or (print_r($con->errorInfo()));
		   			$add_membre->execute(array($groupe, $id)) or (print_r($con->errorInfo()));
		   			}

		   			}
		   			
		   			 echo 'OK';	
		   				


?>