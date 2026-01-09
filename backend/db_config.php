<?php
$host = 'localhost';
$dbname = 'student_db'; 
$username = 'root';     
$password = '1234'; 


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->set_charset("utf8");
?>