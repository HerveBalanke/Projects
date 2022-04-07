	<?php

    include_once("../sessions/session_cellule.php");
    require_once("../setup/connection.php");
    $bid=$_SESSION['bid'];
    $cellule=$_SESSION['cellule'];
    $zone_cel=$_SESSION['zone_cel'];
    require_once("../setup/connection.php");
    require '../gh/Smsgh/Api.php';

    $sms=$_POST["sms"];
    $tel=$_POST["tel"];
    $date=date('Y-m-d');
    $emeteur=$_POST["zone"];

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

    $mesg = new Message();
    $mesg->setContent("$sms");
    $mesg->setTo("$tel");
    $mesg->setFrom("TA");
    $mesg->setRegisteredDelivery(true);

     //echo $tel;

    // Let us say we want to send the message 3 days from today
   // $mesg->setTime(date('Y-m-d H:i:s', strtotime('+1 week')));*/

   $messageResponse = $messagingApi->sendMessage($mesg);

   if ($messageResponse instanceof MessageResponse) {
        $query=$con->query("insert into sms_cellule (sms, date, branche) values('$sms', '$date', '$emeteur')") or (print_r($cons->errorInfo()));
        $out_sms=$con->query("select * from sms_cellule order by sms_cel_id desc limit 1;") or (print_r($cons->errorInfo()));
        $fetch_sms=$out_sms->fetch();
        $in_sms=$fetch_sms['sid'];
        $query=$con->query("insert into sms_cellule_envoi (sms_cel_ide, tel) values('$in_sms', '$tel')") or (print_r($cons->errorInfo()));
       // echo $tel;
        echo "OK";
        //$messageResponse->getStatus();
    } elseif ($messageResponse instanceof HttpResponse) {
        echo "NO";
       // "\nServer Response Status : " . $messageResponse->getStatus();
   }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}



?>