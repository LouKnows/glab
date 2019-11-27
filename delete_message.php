<?php
require('dbconnect.php');

$id = $_GET['id'];

$sql = "delete from messages where id = $id";

$conn->query($sql);
$conn->close();