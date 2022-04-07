<?php

require '../SendingMail/classes/class.phpmailer.php';
require '../SendingMail/classes/class.smtp.php';
            
$address=$_POST["address"];
$nom=$_POST["nom"];
$mail=$_POST["mail"];

$mail = new PHPMailer();
$mail->isSMTP(); 
$mail->SMTPDebug = 0;                                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hbalanke@gmail.com';                 // SMTP username
$mail->Password = 'YOSEPODALH';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;  
$mail->From      = $address;
$mail->Subject   = "Site Internet";
$mail->Body      = $nom. "   ".$mail;
$mail->AddAddress( trim($address)); 

        if(!$mail->send()) {
        echo "NO";
      } else { 
      echo "OK";
      }

	?>
