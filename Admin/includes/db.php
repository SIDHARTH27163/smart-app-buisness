<?php
// Database configuration
$servername = "localhost";
$username = "u676723665_lookin";
$password = "LookinDharamshala@123!";
// $username = "root";
// $password = "";
$dbname = "u676723665_lookin";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
// Select the database
$conn->select_db($dbname);

// Return the connection to be used elsewhere
return $conn;
?>
