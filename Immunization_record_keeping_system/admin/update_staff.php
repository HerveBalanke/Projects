<?php
						try{
							$cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
						}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
						}
								$nid= $_POST["nid"];
								$fname= $_POST["fname"];
								$lname= $_POST["lname"];
								$gender= $_POST["gender"];
								$dob= $_POST["dob"];
								$email=$_POST["email"];
								$tel= $_POST["tel"];
								$add= $_POST["add"];
								
								
						
						$in=$cons->prepare("update nurse set fname=?, lname=?, dob=?, gender=?, email=?, tel=?, address=? where nid=?");
						$in->execute(array( $fname, $lname, $dob, $gender, $email, $tel, $add, $nid )) or die(print_r($cons->errorInfo()));
						if ($in){
						
						echo"<div class='alert alert-success text-center'>
  <a href='view_staff.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Nurse's Details Updated!</strong>
</div>";

	
						}
								
						
						$cons=Null;
						
						
						?>