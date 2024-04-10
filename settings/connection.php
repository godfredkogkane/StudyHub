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


define('DB_HOST', 'us-cluster-east-01.k8s.cleardb.net');
define('DB_USER', 'b2fe95fc104b1f');
define('DB_PASSWORD', 'af0534e5'); 
define('DB_NAME', 'heroku_3718b5dd7edcc36');


$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 



// //Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("mysql://b2fe95fc104b1f:af0534e5@us-cluster-east-01.k8s.cleardb.net/heroku_3718b5dd7edcc36?reconnect=true"));
// $cleardb_server = $cleardb_url["us-cluster-east-01.k8s.cleardb.net"];
// $cleardb_username = $cleardb_url["b2fe95fc104b1f"];
// $cleardb_password = $cleardb_url["af0534e5"];
// $cleardb_db = substr($cleardb_url["heroku_3718b5dd7edcc36"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
// ?>
