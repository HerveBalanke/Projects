<?php
					include_once("session_admin.php");
		   			require_once("../setup/connection.php");

		   			$aid=$_POST["aid"];
		   			$nu=$_POST["nu"];
		   			$pass=$_POST["pass"];
		   			$check=$con->query("select * from administrateur where aid='$aid';") or die (print_r($con->errorInfo()));
		   			$count_check=$check->rowCount();
		   			if($count_check<=0){
		   				echo "NO";
		   			}else if($count_check>0) {
		   				$up=$con->prepare("update administrateur set uname=? and pass=? where aid=?;") or die (print_r($con->errorInfo()));
		   				$up->execute(array( $nu, $pass, $aid)) or die (print_r($con->errorInfo()));
		   				echo "YES";
		   			}

?>