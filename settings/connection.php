<?php


// // Database connection parameters
// $dbHost = 'localhost';
// $dbUser = 'root';
// $dbPass = '';
// $dbName = 'studyhub';

// // Attempt to establish a connection to the database
// $con = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// // Check if the connection was successful
// if ($con->connect_errno) {
//     // Connection failed, display error and terminate script
//     die("Connection failed: " . $con->connect_error);
// }


//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
