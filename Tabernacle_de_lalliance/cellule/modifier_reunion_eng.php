<?php

					include_once("../sessions/session_cellule.php");
					require_once("../setup/connection.php");

		   			$rid=$_POST["rid"];
		   			$theme=ucwords($_POST["theme"]);
		   			$date=$_POST["date"];

		   					$in=$con->prepare("update reunion set theme=?, date=? where rid=?;") or (print_r($con->errorInfo()));
		   					$in->execute(array( $theme, $date, $rid)) or (print_r($con->errorInfo()));

		   			if($in){  
		   				echo "OK";
							}

?>