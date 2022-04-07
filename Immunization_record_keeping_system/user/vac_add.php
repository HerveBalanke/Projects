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

								$vcode= $_POST["vcode"];
								$vname= $_POST["vname"];
								$nod= $_POST["nod"];
								$length= $_POST["length"];
								$dinterval=$_POST["interval"];
								$price= $_POST["price"];
								$manu= $_POST["manu"];
								$manuemail= $_POST["manuemail"];
								$qty= $_POST["qty"];
								$date = $_POST["date"];

						
						$in=$cons->prepare("insert into vaccine (vcode,vname, nod, dinterval, vprice, ad_length, manufacturer, manuemail) values (?,?,?,?,?,?,?,?)");
						$in->execute(array($vcode, $vname, $nod, $dinterval, $price, $length,  $manu, $manuemail )) or die(print_r($in->errorInfo()));
						$qty=$cons->prepare("insert into quantity (vcode) values (?)");
						$qty->execute(array($vcode)) or die(print_r($in->errorInfo()));
						if ($in && $qty){
						
						echo"<div class='alert alert-success text-center'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>	
  <strong>Vaccine Added!</strong>
</div>";
						}
								
						
						$cons=Null;
						
						
						?>