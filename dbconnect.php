<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'globelab';

// create database connection
$conn = new mysqli($host, $user, $password, $database);

if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}