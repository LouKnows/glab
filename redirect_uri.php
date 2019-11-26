<?php

require 'dbconnect.php';

$subscriber_token = $_GET['access_token'];
$subscriber_number = $_GET['subscriber_number'];

$sql = "insert into subscribers (access_token, mobile_number) values (#{$subscriber_token},#{$subscriber_number})";

$conn->query($sql);
$conn->close();

?>