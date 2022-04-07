<?php
					ob_start();
					session_start();
		   			require_once("../setup/connection.php");
		   			require '../gh/Smsgh/Api.php';
		   			$bid=$_POST["bid"];
		   			$branche=ucwords($_POST["branche"]);


		   					$check_branche=$con->query("select * from branche where branche='$branche';") or (print_r($con->errorInfo()));
				   			$count_branche_out=$check_branche->rowCount();
				   			if($count_branche_out>0){
					   			echo 'NO_branche';
					   				exit();
		   					}else if($count_branche_out<=0){
							
				   			$in_branche=$con->prepare("update  branche set branche=? where bid=? ;") or (print_r($con->errorInfo()));
				   			$in_branche->execute(array($branche, $bid)) or (print_r($con->errorInfo()));
				   				if($in_branche){
		   							echo "OK";
		   						}
		   					}

		   			$con=NUll;





?>