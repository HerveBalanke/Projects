<?php

try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }

/*$ret=$cons->query("select * from vaccine where nod=3;");
$row=$ret->rowCount();
$ret1=$ret->fetch();

echo $row;*/


//for($i=0; $i<$row; $i++){

					//$message= "we needs supply of 300 doses of ".$ret1["vcode"]. " ". $ret1["vname"];
$message= "we needs supply of 300 doses of ";
					//$email=$ret1["manuemail"];
					$email='jbalanke@yahoo.fr';
					
					$subject='supply';

					$temp=file_get_contents("sample.html");
					$temp .= $message."</body> </html>";

					$headers='MIME-Version: 1.0'."\r\n";
					$headers .='content-type:text/html; charset=iso-8859-1'. "\r\n";


					$headers .='From: hbalanke@gmail.com'. "\r\n";

					if(mail($email, $subject, $temp, $headers)){

						$file=fopen("mailsentlist.txt", "a+");
						fwrite($file, $email. "\r\n");
						fclose($file);
					}

					echo"yes";

					//}

					?>