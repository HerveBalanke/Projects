	<?php
    require_once("../setup/connection.php");
    require '../gh/Smsgh/Api.php';
    $sms=$_POST["sms"];
    $choix=$_POST["choix"];
    $choix_array = explode(",", $choix);
    $numero = count($choix_array);

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

for ($i = 0; $i < $numero ; $i++) {
   
    $num=$choix_array[$i];
    $mesg = new Message();
    $mesg->setContent("$sms");
    $mesg->setTo("$num");
    $mesg->setFrom("TA");
    $mesg->setRegisteredDelivery(true);

    // Let us say we want to send the message 3 days from today
   // $mesg->setTime(date('Y-m-d H:i:s', strtotime('+1 week')));*/

    $messageResponse = $messagingApi->sendMessage($mesg);

    }

    if ($messageResponse instanceof MessageResponse) {
        echo "OK";
    } elseif ($messageResponse instanceof HttpResponse) {
        echo "NO";
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}


?>