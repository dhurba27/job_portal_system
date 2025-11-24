<?php

$host = "localhost";
$user = "suman";
$pass = "suman123";
$dbname = "job_portal";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
