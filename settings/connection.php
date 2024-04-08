<?php
// Database connection parameters
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'studyhub';

// Attempt to establish a connection to the database
$con = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check if the connection was successful
if ($con->connect_errno) {
    // Connection failed, display error and terminate script
    die("Connection failed: " . $con->connect_error);
}
?>
