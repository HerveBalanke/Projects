<?php

					include_once("session_deux.php");
		   			require_once("../setup/connection.php");
		   			$sid=$_POST["sid"];
		   			$date=$_POST["date"];
		   			$culte=$_POST["culte"];
		   			$rec=$_POST["rec"];
		   			$culte_alt=ucwords($_POST["culte_alt"]);

		   			if($culte_alt!=''){

		   			$check_culte=$con->query("select * from evenement where evenement='$culte_alt';") or (print_r($con->errorInfo()));
		   			$count_culte_out=$check_culte->rowCount();
		   			if($count_culte_out<=0){

		   			$in_culte_alt=$con->query("insert into evenement (evenement) values ('$culte_alt');") or (print_r($con->errorInfo()));
		   			$culte_alt_out=$con->query("select * from evenement order by eid desc limit 1;");
		   			$culte_alt_out=$culte_alt_out->fetch();
		   			$culte=$culte_alt_out['eid'];
		   			$insert_culte=$con->prepare("insert into offrande (date, recette, evenement, signataire_un, signataire_deux, signataire_trois)
		   										values(?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   			$insert_culte->execute(array($date, $rec, $culte, '-', $sid, '-')) or (print_r($con->errorInfo()));

		   			if($insert_culte){
		   				echo 'OK';
		   			}

		   			}else if($count_culte_out>0){
		   			echo 'NO';
		   				exit();
		   			}
		   		}else if($culte_alt=='') {
		   			$insert_culte=$con->prepare("insert into offrande (date, recette, evenement, signataire_un, signataire_deux, signataire_trois)
		   										values(?,?,?,?,?,?);") or (print_r($con->errorInfo()));
		   			$insert_culte->execute(array($date, $rec, $culte, '-', $sid, '-')) or (print_r($con->errorInfo()));

		   			if($insert_culte){
		   				echo 'OK';
		   			}
		   			}

		  


?>