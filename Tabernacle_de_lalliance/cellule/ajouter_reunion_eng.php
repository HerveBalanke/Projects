<?php

					include_once("../sessions/session_cellule.php");
					require_once("../setup/connection.php");
					$bid=$_SESSION['bid'];

		   			// $cid=$_POST["cid"];
		   			$cid=$_POST["cid"];
		   			$theme=ucwords($_POST["theme"]);
		   			$date=$_POST["date"];

		   				// echo $cid.$theme.$date;

		   					$in=$con->prepare("insert into reunion (theme, date, cellule, branche) values(?,?,?,?) ;") or (print_r($con->errorInfo()));
		   					$in->execute(array( $theme, $date, $cid, $bid)) or (print_r($con->errorInfo()));

		   					// $query1=$con->query("select * from membre_cel where date='$date';")  or (print_r($con->errorInfo()));
			       //           $count1=$query1->rowCount();
			       //          if($count1>0){
		   					// $query=$con->query("select * from reunion where date='$date';")  or (print_r($con->errorInfo()));
			       //          $count=$query->rowCount();
			                  
			       //            for($i=0; $i<$count; $i++){
			       //              $fetch=$query->fetch();
			       //              $rid=$fetch['rid'];

			       //              for($x=0; $x<$count1; $x++){
			       //                $fetch1=$query1->fetch();
			       //                $id=$fetch1['mcid'];
			       //                echo $id;
			                  //     $up=$con->query("insert into presence (statut, membre, reunion) values('-', '$id', '$rid');") or (print_r($con->errorInfo()));

			                  // }
			                  // }

                // }

		   			if($in){  
		   				echo "OK";
							}

?>