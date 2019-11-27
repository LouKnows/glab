<?php

error_reporting('E_ERROR');

 
 $myObj->outboundSMSMessageRequest->outboundSMSTextMessage->message = "Hello World";
 $myObj->outboundSMSMessageRequest->address = "9171234567";

 $myJSON = json_encode($myObj);

echo '<pre>'. $myJSON . '</pre>';

?>