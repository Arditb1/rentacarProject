<?php
$servername = "db4free.net";
$username = "rentacar1";
$password = "rentacar1";
$dbname = "rentacar1";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
