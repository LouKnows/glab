<?php

$senderAddress = '0609'; // last 4-digits of short code;
$access_token = $_POST['access_token'];
$address = $_POST['address'];
$message = $_POST['outbound-msg'];

error_reporting('E_ERROR');

$myObj->outboundSMSMessageRequest->outboundSMSTextMessage->message = $message;
$myObj->outboundSMSMessageRequest->address = $address;
$myObj->outboundSMSMessageRequest->senderAddress = $senderAddress;


$postData = json_encode($myObj);

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/".$senderAddress."/requests?access_token=".$access_token ,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $postData,
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo "Successfully sent the message";
}

?>

<a href="/">Back to index</a>