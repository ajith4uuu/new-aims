<?php

$host = 'localhost'; // Replace with your database hostname
$username = 'db_username'; // Replace with your database username
$password = 'db_password'; // Replace with your database password
$database = 'db_name'; // Replace with your database name

// Create a new database connection
$db = new mysqli($host, $username, $password, $database);

// Check for errors
if ($db->connect_error) {
    die('Database connection failed: ' . $db->connect_error);
}
