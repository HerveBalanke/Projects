	<?php
    include_once("../sessions/session_secretaire.php");
    require '../gh/Smsgh/Api.php';
    require_once("../setup/connection.php");
    $bid=$_SESSION['bid'];

    $sms=$_POST["sms"];
    $date=date('Y-m-d');
    $choix=$_POST["choix"];
    $choix_array = explode(",", $choix);
    $count_tel= count($choix_array);

$auth = new BasicAuth("gvtmltsv", "ejyrwxpk");
// instance of ApiHost
$apiHost = new ApiHost($auth);

// instance of AccountApi
$accountApi = new AccountApi($apiHost);
// Get the account profile
// Let us try to send some message
$messagingApi = new MessagingApi($apiHost);
try {
    // Send a quick message
    //$messageResponse = $messagingApi->sendQuickMessage("TA", "+233".$tel, "$nom $prenom Bienvenue au Tabernacle de l'Alliance, L'auditorium de la transformation");

for ($i = 0; $i < $count_tel ; $i++) {
   
    $tel=$choix_array[$i];
    $mesg = new Message();
    $mesg->setContent("$sms");
    $mesg->setTo("$tel");
    $mesg->setFrom("TA");
    $mesg->setRegisteredDelivery(true);
    // Let us say we want to send the message 3 days from today
   // $mesg->setTime(date('Y-m-d H:i:s', strtotime('+1 week')));*/

     $messageResponse = $messagingApi->sendMessage($mesg);

    }

    if ($messageResponse instanceof MessageResponse) {

        for ($i = 0; $i < $count_tel ; $i++) {
    $tel=$choix_array[$i];
    $query=$con->query("insert into sms (sms, date, branche) values('$sms', '$date', '$bid')") or (print_r($cons->errorInfo()));
    $out_sms=$con->query("select * from sms order by sid desc limit 1;") or (print_r($cons->errorInfo()));
    $fetch_sms=$out_sms->fetch();
    $in_sms=$fetch_sms['sid'];
    $query=$con->query("insert into sms_envoi (smsid, tel) values('$in_sms', '$tel')") or (print_r($cons->errorInfo()));
    }
        echo "OK";
    } elseif ($messageResponse instanceof HttpResponse) {
        echo "NO";
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}


?>