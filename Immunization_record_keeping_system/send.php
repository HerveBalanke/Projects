<?php /*
include 'gh/Smsgh/Api.php';

$api = new SmsghApi('gvtmltsv', 'ejyrwxpk');
$api->setContextPath("v3");
$message = new ApiMessage();
$message->setFrom('Flex Vac ct');
$message->setTo('+233241729977');
$message->setContent('trial!');
$message->setRegisteredDelivery(true);
$response = $api->getMessages()->send($message);
# $response is an instance of ApiMessageResponse.*/


// Let us test the SDK


require 'gh/Smsgh/Api.php';

$auth = new BasicAuth("herve", "<Password>");
// instance of ApiHost
$apiHost = new ApiHost($auth);

// instance of AccountApi
$accountApi = new AccountApi($apiHost);
// Get the account profile
// Let us try to send some message
$messagingApi = new MessagingApi($apiHost);
try {
    // Send a quick message
    $messageResponse = $messagingApi->sendQuickMessage("Herve", "+233241729977", "Trial");
    if ($messageResponse instanceof MessageResponse) {
        echo $messageResponse->getStatus();
    } elseif ($messageResponse instanceof HttpResponse) {
        echo "\nServer Response Status : " . $messageResponse->getStatus();
    
    
    } catch (Exception $ex) {
    echo $ex->getTraceAsString();
}
}

?>