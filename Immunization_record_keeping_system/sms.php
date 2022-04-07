<?php
	// Textlocal account details
	$username = 'jbalanke@yahoo.fr';
	$hash = 'b35efcd16dc5ee426e3e7fb3c7a0d50c738b3c89';
	
	// Message details
	$numbers = array(00233241729977);
	$sender = urlencode('Flex Center');
	$message = rawurlencode('we need supply of vaccine');
 
        $numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>