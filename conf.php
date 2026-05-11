<?php
$host= "localhost";
$username = "root";
$password = "";
$database= "users_db";

// First, connect without selecting a database
$conn = new mysqli($host, $username, $password);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if($conn->query($sql) === TRUE){
    // Database created or already exists
} else {
    die("Error creating database: " . $conn->error);
}

// Now select the database
$conn->select_db($database);

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    age INT NOT NULL,
    password VARCHAR(255) NOT NULL,
    gender VARCHAR(10) NOT NULL
)";

if($conn->query($sql) === FALSE){
    die("Error creating table: " . $conn->error);
}

$conn->set_charset("utf8");
?>