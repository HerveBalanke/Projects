<?php
		   			include_once("session_un.php");
		   			require_once("../setup/connection.php");

		   			$groupe=ucwords($_POST["groupe"]);
		   			$leader=$_POST["leader"];
		   			$gid=$_POST["gid"];

		   			$check=$con->query("select * from groupe where groupe='$groupe';") or (print_r($con->errorInfo()));
		   			$count_check=$check->rowCount();
		   			$fetch=$check->fetch();
		   			$fecth_new_id=$fetch['gid'];
		   			if($count_check>0 && $fecth_new_id!=$gid){
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