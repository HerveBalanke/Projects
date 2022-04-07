<?php
					ob_start();
					session_start();
		   			require_once("setup/connection.php");

		   			$pseudo=$_POST["pseudo"];
		   			$mp=$_POST["mp"];
		   			$des="off";

		   			if($pseudo=='LeaderCellule'){
		   			$check_outc=$con->prepare("select cid, uname, pass, zone_cel, branche from cellule where uname=? and pass=? and desactivate=?;") or (print_r($con->errorInfo()));
		   			$check_outc->execute(array($pseudo, $mp, $des)) or (print_r($con->errorInfo()));
		   			$countc=$check_outc->rowCount();
		   			$fetchc=$check_outc->fetch();

		   			if($countc>0){
	   				$_SESSION["zone_cel"]=$fetchc['zone_cel'];
	   				$_SESSION["bid"]=$fetchc['branche'];
	   				$_SESSION["uname"]=$fetchc['uname'];
	   				$_SESSION["cellule"]=$fetchc['cid'];
	   				echo '11';
		   			}else{

		   				echo 'NO';
		   			}

		   			}else if($pseudo=='PorteurDeJoie'){
		   			$check_outc=$con->prepare("select * from porteur where uname=? and pass=? and desactivate=?;") or (print_r($con->errorInfo()));
		   			$check_outc->execute(array($pseudo, $mp, $des)) or (print_r($con->errorInfo()));
		   			$countc=$check_outc->rowCount();
		   			$fetchc=$check_outc->fetch();

		   			if($countc>0){
	   				$_SESSION["pjr"]=$fetchc['pid'];
		   			$_SESSION["uname"]=$fetchc['uname'];
	   				echo '621';
		   			}else{

		   				echo 'NO';
		   			}

		   			}else{

		   			$check_out=$con->prepare("select uid, uname, pass, branche, niveau from utilisateur where uname=? and pass=? and desactivate=?;") or (print_r($con->errorInfo()));
		   			$check_out->execute(array($pseudo, $mp, $des)) or (print_r($con->errorInfo()));
		   			$count=$check_out->rowCount();
		   			$fetch=$check_out->fetch();

		   			if($count>0 && $fetch['niveau'] == 2){
		   				$_SESSION["secretaire"]=$fetch['uid'];
		   				$_SESSION["bid"]=$fetch['branche'];
		   				$_SESSION["uname"]=$fetch['uname'];
		   				echo '2';
		   			}else if($count>0 && $fetch['niveau'] == 5){
		   				$_SESSION["tresorier"]=$fetch['uid'];
		   				$_SESSION["bid"]=$fetch['branche'];
		   				$_SESSION["uname"]=$fetch['uname'];
		   				echo '5';
		   			}else if($count>0 && $fetch['niveau'] == 1){
		   				$_SESSION["usher"]=$fetch['uid'];
		   				$_SESSION["bid"]=$fetch['branche'];
		   				$_SESSION["uname"]=$fetch['uname'];
		   				echo '1';
		   			}else if($count>0 && $fetch['niveau'] == 3){
		   				$_SESSION["admin"]=$fetch['uid'];
		   				$_SESSION["bid"]=$fetch['branche'];
		   				$_SESSION["uname"]=$fetch['uname'];
		   				echo '3';
		   			}else if($count>0 && $fetch['niveau'] == 6){
		   				$uid=$fetch['uid'];
		   				$query=$con->query("select departement from utilisateur where uid='$uid';") or (print_r($con->errorInfo()));
		   				$fetch_dept=$query->fetch();
		   				if($fetch_dept['departement']== 1){
		   				$_SESSION["rd_fin"]=$uid;
		   				$_SESSION["uname"]=$fetch['uname'];
		   				echo '61';
		   				}else if($fetch_dept['departement']== 2){
		   				$_SESSION["pjr"]=$uid;
		   				$_SESSION["uname"]=$fetch['uname'];
		   				echo '62';
		   				}	

		   			}else if($count>0 && $fetch['niveau'] == 4){
		   				$_SESSION["pasteur"]=$fetch['uid'];
		   				$_SESSION["bid"]=$fetch['branche'];
		   				$_SESSION["uname"]=$fetch['uname'];
		   				echo '4';

		   			}else{
		   				echo 'NO';
		   			}

		   			}

?>