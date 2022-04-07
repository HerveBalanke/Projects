<?php


ob_start();
session_start();
//session_destroy();

			try{
							$cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
						}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
						}

								$uname= $_POST["uname"];
								$pass= $_POST["pass"];
								
								$query=$cons->query("select * from nurse where uname='$uname' AND pass='$pass'");
								$count=$query->rowCount();
								if($count>0){

											echo "ok";
										$_SESSION['account']=$uname;
										
								}

								$query1=$cons->query("select * from admin where uname='$uname' AND pass='$pass'");
								$count1=$query1->rowCount();
								if($count1>0){

										echo "ok1";
								$_SESSION['admin']=$uname;	
								}


											
								$query2=$cons->query("select * from user where uname='$uname' AND pass='$pass'");
								$count2=$query2->rowCount();
								if($count2>0){

									$_SESSION["registrar"]=$uname;
										echo "ok2";
									
								}

								if($count<=0 && $count1<=0 && $count2<=0){
									echo "no";
								}








?>