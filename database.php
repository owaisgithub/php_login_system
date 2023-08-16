<?php
$serverName = "localhost";
$userName = "root";
$password = "root";
$databaseName = "form_data";

$conn = new mysqli($serverName, $userName, $password, $databaseName);

if ($conn->connect_error) {
	die("Connection Failed: " . $conn->connect_error);
    exit();
}
?>