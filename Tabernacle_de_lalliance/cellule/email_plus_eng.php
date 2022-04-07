<?php
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$cellule=$_SESSION['cellule'];
$zone_cel=$_SESSION['zone_cel'];
require '../SendingMail/classes/class.phpmailer.php';
require '../SendingMail/classes/class.smtp.php';
 
            
$zone=$_POST["zone"];           
$head=$_POST["head"];
$message=$_POST["mess"];
$choix=$_POST["choix"];
$date=date('Y-m-d');
$choix_array = explode(",", $choix);
$query=$con->query("insert into email_cel (entete, text, date, branche) values('$head', $message', '$date', '$zone')") or (print_r($cons->errorInfo()));
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
foreach ($choix_array as $ad) {
    $mail->AddAddress(trim($ad));     
}

        if(!$mail->send()) {
   			echo "NO";
      } else { 
        foreach ($choix_array as $ad) {
     $query=$con->query("insert into email_cel_envoi (emailcid, address) values('$in_mess', '$ad');") or (print_r($cons->errorInfo()));   
        }
			echo "OK";
			}

	?>
