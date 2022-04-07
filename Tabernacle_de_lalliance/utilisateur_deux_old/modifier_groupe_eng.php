<?php
		   			require_once("../setup/connection.php");

		   			$groupe=ucwords($_POST["groupe"]);
		   			$leader=$_POST["leader"];
		   			$gid=$_POST["gid"];

		   			$check=$con->query("select * from groupe where groupe='$groupe';") or (print_r($con->errorInfo()));
		   			$count_check=$check->rowCount();
		   			if($count_check>0){
		   				echo 'NO';
		   				exit();
		   			}else{

		   			$update_groupe=$con->prepare("update groupe set groupe=?, leader=? where gid=?;") or (print_r($con->errorInfo()));
		   			$update_groupe->execute(array($groupe, $leader, $gid)) or (print_r($con->errorInfo()));

		   			if($update_groupe){
		   				echo 'OK';
		   			}
		   		}


?>