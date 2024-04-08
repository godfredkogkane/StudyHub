<?php
// Include your core script to check login status
require_once "../settings/core.php";

// Check if the user is logged in
check_login();

// Include your database connection file
include "../settings/connection.php";

// Get the user ID from the session
$userID = $_SESSION['user_id'];

// Query to retrieve user information from the database
$sql = "SELECT Username, SchoolName, Yr, Email FROM Users WHERE UserID = $userID";
$result = $con->query($sql);

// Check if user information is found
if ($result->num_rows > 0) {
    // Store user information in an associative array
    $userInfo = $result->fetch_assoc();
} else {
    echo "User information not found.";
}

// Close the database connection
$con->close();
?>
