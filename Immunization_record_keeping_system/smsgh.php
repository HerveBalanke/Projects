  <?php

 

/*include 'gh/Smsgh/Api.php';
$api = new SmsghApi('gvtmltsv', 'ejyrwxpk');
$api->setContextPath("v3");
$message = new ApiMessage();
$message->setFrom('smsgh');
$message->setTo('%2B233241729977');
$message->setContent('hello, world!');
$message->setRegisteredDelivery(true);
$response = $api->getMessages()->send($message);
# $response is an instance of ApiMessageResponse.*/


require 'gh/Smsgh/Api.php';

$tel="+233241729977";
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
   // $messageResponse = $messagingApi->sendQuickMessage("Herve", "+233241729977", "I love you dearly Honey. See you in the evening...");
$mesg = new Message();
        $mesg->setContent("Hello $tel $tel kindly come for your vaccine dose tomorrow, $tel.
         Thank You.");
        $mesg->setTo("$tel");
        $mesg->setFrom("Herve");
        $mesg->setRegisteredDelivery(true);
        $mesg->setTime(date('Y-m-d H:i:s', strtotime('+0 days'))); // Here we are scheduling the message to be sent next week
        $messageResponse = $messagingApi->sendMessage($mesg);

    if ($messageResponse instanceof MessageResponse) {
        echo $messageResponse->getStatus();
    } elseif ($messageResponse instanceof HttpResponse) {
        echo "\nServer Response Status : " . $messageResponse->getStatus();
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}

    ?>