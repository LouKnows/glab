<?php
require('dbconnect.php');

$sql = 'select m.text_msg, m.sender, s.access_token from messages m left join subscribers s on s.mobile_number = m.sender';
$result = $conn->query($sql);

$messages = $result->fetch_all(MYSQLI_ASSOC);


$conn->close();