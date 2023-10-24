<?php

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db_name = 'blog';

//create new instance of connection
$conn = @new mysqli($host, $user, $pass, $db_name);

//if any error occurs, receive message
if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}