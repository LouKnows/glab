<?php

require('dbconnect.php');

# get json post data from globe lab
$json_str = file_get_contents('php://input');
# decode json and convert json to associative array
$json_obj = json_decode($json_str, true);

# inboundSMSMessageList is the POST data specified by glab to send.
# refer to this link:
# http://www.globelabs.com.ph/docs/#sms-receiving-sms-sms-mo
$msg_list = $json_obj['inboundSMSMessageList'];
$inbound_msg_info = $msg_list['inboundSMSMessage'][0];

# the data to be inserted:
$msg = $inbound_msg_info['message'];
$sender = $inbound_msg_info['senderAddress'];

# cleanup the data
$msg = substr($msg,1);
$sender = preg_replace('/[^0-9\+]/','',$sender);

# insert data to the database:
$sql = "insert into messages (text_msg, sender) values ('#{$msg}', '#{$sender}')";
$conn->query($sql);

$conn->close();