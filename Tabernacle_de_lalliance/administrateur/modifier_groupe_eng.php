<?php
		   			include_once("../sessions/session_secretaire.php");
		   			require_once("../setup/connection.php");

		   			$bid=$_POST["bid"];
		   			$gid=$_POST["gid"];
		   			$groupe=ucwords($_POST["groupe"]);
		   			$leader=$_POST["leader"];
		   			

		   			$check=$con->query("select * from groupe where groupe='$groupe' and branche='$bid';") or (print_r($con->errorInfo()));
		   			$count_check=$check->rowCount();
		   			$fetch=$check->fetch();
		   			$fecth_new_id=$fetch['gid'];
		   			if($count_check>0 && $fecth_new_id!=$gid){
		   				echo 'NO';
		   				exit();
		   			}else{

		   			$update_groupe=$con->prepare("update groupe set groupe=?, leader=? where gid=? and branche=?;") or (print_r($con->errorInfo()));
		   			$update_groupe->execute(array($groupe, $leader, $gid, $bid)) or (print_r($con->errorInfo()));

		   			if($update_groupe){
		   				echo 'OK';
		   			}
		   		}


?>