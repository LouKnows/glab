<?php
require('dbconnect.php');

$sql = 'select m.id, m.text_msg, m.sender, s.access_token from messages m left join subscribers s on BINARY s.mobile_number = BINARY m.sender';
$result = $conn->query($sql);

$messages = $result->fetch_all(MYSQLI_ASSOC);


$conn->close();