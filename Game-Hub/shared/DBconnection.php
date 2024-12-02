<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "E_Game_Hub";

$connection = new mysqli($server, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
?>
