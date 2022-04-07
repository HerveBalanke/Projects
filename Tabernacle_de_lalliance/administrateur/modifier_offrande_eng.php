<?php
		   			

					include_once("../sessions/session_tresorier.php");
					require_once("../setup/connection.php");

		   			$oid=$_POST["oid"];
		   			$tid=$_POST["tid"];
		   			$rec=$_POST["rec"];
		   			$date=$_POST["date"];
		   			$culte=ucwords($_POST["culte"]);
		   			$culte_alt=ucwords($_POST["culte_alt"]);

		   			if($culte_alt!=''){

		   			$check_culte=$con->query("select * from evenement where evenement='$culte_alt';") or (print_r($con->errorInfo()));
		   			$count_culte_out=$check_culte->rowCount();
		   			if($count_culte_out<=0){

		   			$in_culte_alt=$con->query("insert into evenement (evenement) values ('$culte_alt');") or (print_r($con->errorInfo()));
		   			$culte_alt_out=$con->query("select * from evenement order by eid desc limit 1;");
		   			$culte_alt_out=$culte_alt_out->fetch();
		   			$culte=$culte_alt_out['eid'];
		   			$update_offrande=$con->prepare("update offrande set date=?, recette=?, evenement=?, usher=?, admin=?, confirmation=?, branche=? where oid=? and tresorier=?;") or (print_r($con->errorInfo()));
		   			$update_offrande->execute(array($date, $rec, $culte, '-', '-','-' ,$bid, $oid, $tid)) or (print_r($con->errorInfo()));

		   			if($update_offrande){
		   				echo 'OK';
		   							}

		   			}else if($count_culte_out>0){
		   			echo 'NO';
		   				exit();
		   			}
		   		}else if($culte_alt=='') {

		   			$update_offrande=$con->prepare("update offrande set date=?, recette=?, evenement=?, usher=?, admin=?, confirmation=?, branche=? where oid=? and tresorier=?;") or (print_r($con->errorInfo()));
		   			$update_offrande->execute(array($date, $rec, $culte, '-', '-','-' ,$bid, $oid, $tid)) or (print_r($con->errorInfo()));

		   			if($update_offrande){
		   				echo 'OK';
		   							}
		   			}


?>