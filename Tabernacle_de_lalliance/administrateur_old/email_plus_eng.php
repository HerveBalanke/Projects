<?php
    
    		require_once("../setup/connection.php");
        require '../SendingMail/classes/class.phpmailer.php';
        require '../SendingMail/classes/class.smtp.php';
            
$head=$_POST["head"];
$message=$_POST["mess"];
$choix=$_POST["choix"];
$choix_array = explode(",", $choix);
$numero = count($choix_array);
echo $numero;
print_r($choix_array);

//for ($i = 0; $i < $numero ; $i++) {

//$email=$choix_array[$i];
$mail = new PHPMailer();

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP(); 
$mail->SMTPDebug = 0;                                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hbalanke@gmail.com';                 // SMTP username
$mail->Password = 'YOSEPODALH';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('hbalanke@gmail.com');
foreach($choix_array as $email)
{
   $mail->AddCC($email);
}
//$mail->addAddress($email);     // Add a recipient
//$mail->addAddress('');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML 

$mail->Subject = $head;
$mail->Body    = $message;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

/*if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}*/
//}
        if(!$mail->send()) {
   			echo "NO";
      } else { 
			echo "OK";
			}

	?>
