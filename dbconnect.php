<?php

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

// create database connection
$conn = new mysqli($hostname, $username, $password, $database);

if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}