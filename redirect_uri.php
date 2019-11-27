<?php

require 'dbconnect.php';

# if user subscribes, store their access_token
# on db so that we can reply to them
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['access_token']) && $_GET['subscriber_number']){
		$subscriber_token = $_GET['access_token'];
		$subscriber_number = $_GET['subscriber_number'];

		$sql = "insert into subscribers (access_token, mobile_number) values ('$subscriber_token','$subscriber_number')";

		$conn->query($sql);
	}
}

# if request is post, meaning, the user has unsubscribed the app
# we need to remove the data from the database
if($_SERVER['REQUEST_METHOD'] == 'POST'){

}

$conn->close();

?>