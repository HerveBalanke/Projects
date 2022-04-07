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

								$fname= $_POST["fname"];
								$lname= $_POST["lname"];
								$gender= $_POST["gender"];
								$dob= $_POST["dob"];
								$email=$_POST["email"];
								$tel= $_POST["tel"];
								$add= $_POST["add"];
								
						
						$in=$cons->prepare("insert into Patient (fname, lname, dob, gender, email, tel, address) values (?,?,?,?,?,?,?)");
						$in->execute(array($fname, $lname, $dob, $gender, $email, $tel, $add )) or die(print_r($in->errorInfo()));
						if ($in){
						
						echo"<div class='alert alert-success text-center'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Patient Added!</strong>
</div>";
						}
								
						
						$cons=Null;
						
						
						?>