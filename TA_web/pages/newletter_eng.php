<?php
require '../SendingMail/classes/class.phpmailer.php';
require '../SendingMail/classes/class.smtp.php';
require_once("../connection.php");
$nom=ucfirst($_POST['nom']);
$mail=ucfirst($_POST['mail']);
$in=$con->prepare("insert into newletter(nom, email) values(?,?);") or die(print_r($con->errorInfo()));
$in->execute(array($nom, $mail)) or (print_r($con->errorInfo()));

$text=" '$nom', Bienvenue au Tabernacle de l'Alliance! Vous recevrez des messages d'exhortation quotidiennement";

$mail = new PHPMailer();
$mail->isSMTP(); 
$mail->SMTPDebug = 0;                                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hbalanke@gmail.com';                 // SMTP username
$mail->Password = 'YOSEPODALH';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;  
$mail->From      = "Tabernacle de L'Alliance";
$mail->Subject   = "Messages d'exhortation";
$mail->Body      = $text;
$mail->AddAddress( trim($mail)); 

        if(!$mail->send()) {
        echo "NO";
      } else { 
      echo "OK";
      }
?>