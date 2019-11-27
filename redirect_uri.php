<?php

require 'dbconnect.php';

# if user subscribes, store their access_token
# on db so that we can reply to them
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['access_token']) && $_GET['subscriber_number']){
		$subscriber_token = $_GET['access_token'];
		$subscriber_number = '+63' . $_GET['subscriber_number'];

		$sql = "insert into subscribers (access_token, mobile_number) values ('$subscriber_token','$subscriber_number')";

		$conn->query($sql);
	}
}

# if request is post, meaning, the user has unsubscribed the app
# we need to remove the data from the database
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$json_str = file_get_contents('php://input');
	$json_obj = json_decode($json_str, true);

	$number = $json_obj['unsubscribed']['subscriber_number'];
	$number = '+63' . $number;

	$sql_remove_safe = 'SET SQL_SAFE_UPDATES = 0;';
	$sql_remove_subscriber = "delete from subscribers where BINARY mobile_number = BINARY '$number';";
	$sql_remove_messages = "delete from messages where BINARY sender = BINARY '$number';";
	$sql = $sql_remove_safe . $sql_remove_subscriber . $sql_remove_messages;

	$conn->query($sql);
}

$conn->close();

?>