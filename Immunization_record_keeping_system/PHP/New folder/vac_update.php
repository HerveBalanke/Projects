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
								$dinterval=$_POST["interval"];
								$price= $_POST["price"];
								$manu= $_POST["manu"];
								$manuemail= $_POST["manuemail"];
						
						$in=$cons->prepare("update vaccine set vcode=?, vname=?, nod=?, dinterval=?,
						vprice=?, ad_length=?, manufacturer=?, manuemail=?  where vid=?;");
						$in->execute(array( $vcode, $vname, $nod, $dinterval, $price, $ad_length, $manu, $manuemail, $vid )) or die(print_r($in->errorInfo()));
						if ($in){
						
						echo"<div class='alert alert-success'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>	
  <strong>Vaccine Edited!</strong>
</div>";
						}
						
								
						
						$cons=Null;
						
						
						?>