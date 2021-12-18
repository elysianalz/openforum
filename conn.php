<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "openforum";
$conn = new mysqli($servername, $username, $password, $dbName) or die("connection failed: " . $conn->connect_error);
?>
