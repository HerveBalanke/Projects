<?php 
session_start ();

if (!isset($_SESSION['account']) || (trim($_SESSION['account']=='')))
{
header('location:../index.php');
exit();

}
?>
<?php
						try{
							$cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
						}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
						}

								$pid=$_POST["pid"];
								$fname= $_POST["fname"];
								$lname= $_POST["lname"];
								$gender= $_POST["gender"];
								$dob= $_POST["dob"];
								$email=$_POST["email"];
								$tel= $_POST["tel"];
								$add= $_POST["add"];
								
						
						$in=$cons->prepare("update patient set fname=?,lname=?, gender=?, dob=?, email=?,  tel=?, address=? where pid=?");
						$in->execute(array($fname, $lname, $gender, $dob, $email, $tel, $add, $pid )) or die(print_r($in->errorInfo()));
						if ($in){
						
						echo"
							<div class='progress'><div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar'aria-valuenow='40' 
							aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Patient Details Updated!</strong></div></div>
							";
						}
								
						
						$cons=Null;
						
						
						?>