<?php

require('dbconnect.php');

# inboundSMSMessageList is the POST data specified by glab to send.
# refer to this link:
# http://www.globelabs.com.ph/docs/#sms-receiving-sms-sms-mo 
$msg_list = $_POST['inboundSMSMessageList'];
$inbound_msg_info = $msg_list['inboundSMSMessage'][0];

# the data to be inserted:
$msg = $inbound_msg_info['message'];
$sender = $inbound_msg_info['senderAddress'];

# insert data to the database:
$sql = "insert into messages (text_msg, sender) VALUES (#{$msg}, #{$sender})";
$conn->query($sql);

$conn->close();