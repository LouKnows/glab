<?php

$notice = '';
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
  $notice = "cURL Error #:" . $err . ' ';
} else {
  $notice = "Successfully sent the message. Click ";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sent status</title>
</head>
<style type="text/css">
	body{
		background-color: #404040;
	}
	p{
		padding: 20px 30px;
		color: #31708f;
    	background-color: #d9edf7;
    	border-color: #bce8f1;
    	position: absolute;
    	top: 50%;
    	left: 50%;
    	transform: translate(-50%,-50%);
	}

	a{
		color: inherit;
		text-decoration: underline;
	}
	a:hover{
		color: #fff;
		text-decoration: none;
	}
</style>
<body>
<p><?php echo $notice ?><a href="/">back to index</a></p>
</body>
</html>
