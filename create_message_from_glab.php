<?php

require('dbconnect.php');

$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str, true);



# inboundSMSMessageList is the POST data specified by glab to send.
# refer to this link:
# http://www.globelabs.com.ph/docs/#sms-receiving-sms-sms-mo
$msg_list = $json_obj['inboundSMSMessageList'];
$inbound_msg_info = $msg_list['inboundSMSMessage'][0];

# the data to be inserted:
$msg = $inbound_msg_info['message'];
$sender = $inbound_msg_info['senderAddress'];

# insert data to the database:
$sql = "insert into messages (text_msg, sender) values ('#{$msg}', '#{$sender}')";
$conn->query($sql);

$conn->close();


/*
$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str, true);



file_put_contents("php://stderr", $json_str .PHP_EOL);

file_put_contents("php://stderr", "Data here ---> " . $json_obj['inboundSMSMessageList']['inboundSMSMessage'][0]['message'] . "<---- Data here" . PHP_EOL . PHP_EOL);

*/