<?php 
session_start ();

if (!isset($_SESSION["admin"]) || (trim($_SESSION["admin"]=='')))
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

								$dose= $_POST["dose"];
								
								
								
						
						$in=$cons->prepare("insert into dose (dose) values (?)");
						$in->execute(array($dose)) or die(print_r($in->errorInfo()));
						if ($in){
						
						echo"<div class='alert alert-success text-center'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Dose Added!</strong>
</div>";
						}
								
						
						$cons=Null;
						
						
						?>