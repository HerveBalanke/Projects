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

								$vid= $_POST["vid"];
								$vcode= $_POST["vcode"];
								$vname= $_POST["vname"];
								$nod= $_POST["nod"];
								$length= $_POST["length"];
								$price= $_POST["price"];
								$manu= $_POST["manu"];
								$manuemail= $_POST["manuemail"];
						
						$in=$cons->prepare("update vaccine set vcode=?, vname=?, nod=?,
						vprice=?, ad_length=?, manufacturer=?, manuemail=?  where vid=? ;");
						$in->execute(array( $vcode, $vname, $nod, $price, $length, $manu, $manuemail, $vid )) or die(print_r($in->errorInfo()));
						if ($in){
						
						echo"
								<div class='progress'><div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar'aria-valuenow='40' 
								aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Details of Vaccine Edited!</strong></div></div>
						";

//header("location:view_vaccine.php");
						}
						
								
						
						$cons=Null;
						
						
						?>