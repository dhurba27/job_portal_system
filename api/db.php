<?php
session_start();

$host = "localhost";
$user = "dhurba";
$pass = "dhurba123";
$dbname = "job_portal";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
