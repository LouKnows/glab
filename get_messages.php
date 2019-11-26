<?php
require('dbconnect.php');

$sql = 'select text_msg, sender from messages';
$result = $conn->query($sql);

$messages = $result->fetch_all(MYSQLI_ASSOC);


$conn->close();