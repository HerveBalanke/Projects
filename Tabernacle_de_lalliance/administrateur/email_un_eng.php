<?php
 
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
require '../SendingMail/classes/class.phpmailer.php';
require '../SendingMail/classes/class.smtp.php';
            
$head=$_POST["head"];
$message=$_POST["mess"];
$email=$_POST["email"];
$date=date('Y-m-d');

    $query=$con->query("insert into email (entete, text, date) values('$head', '$message', '$date');") or (print_r($cons->errorInfo()));
    $out_mess=$con->query("select * from email order by emid desc limit 1;") or (print_r($cons->errorInfo()));
    $fetch_mess=$out_mess->fetch();
    $in_mess=$fetch_mess['emid'];

$mail = new PHPMailer();
$mail->isSMTP(); 
$mail->SMTPDebug = 0;                                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hbalanke@gmail.com';                 // SMTP username
$mail->Password = 'YOSEPODALH';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;  
$mail->From      = "hbalanke@gmail.com";
$mail->FromName  = "Tabernacle de L'Alliance";
$mail->Subject   = $head;
$mail->Body      = $message;
$mail->AddAddress( trim($email)); 

        if(!$mail->send()) {
        echo "NO";
      } else { 
      echo "OK";
      $query=$con->query("insert into email_envoi (emailid, address) values('$in_mess', '$email')") or (print_r($cons->errorInfo()));  
      }

	?>
