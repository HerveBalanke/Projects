<?php
						try{
							$cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
						}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
						}

								$vcode= $_POST["vcode"];
								$vname= $_POST["vname"];
								$nod= $_POST["nod"];
								$dur= $_POST["dur"];
								$qty= $_POST["qty"];
								$ins=$_POST["ins"];
								$price= $_POST["price"];
								$manu= $_POST["manu"];
								$memail= $_POST["memail"];
						
						$in=$cons->prepare("insert into vaccine (vcode,vname, nod, vinterval, vprice, vduration, qty, vmanufacturer, memail) values (?,?,?,?,?,?,?,?,?)");
						$in->execute(array($vcode, $vname, $nod, $ins, $price, $dur, $qty, $manu, $memail )) or die(print_r($in->errorInfo()));
						if ($in){
						
						echo"<div class='alert alert-success'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>	
  <strong>Vaccine Added!</strong>
</div>";
						}
								
						
						$cons=Null;
						
						
						?>