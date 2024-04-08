<?php
// Include your database connection file
// Include your core script to check login status
require_once "../settings/core.php";

include "../settings/connection.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $school = $_POST['school'];
    $year = $_POST['year'];
    $email = $_POST['email'];

    // Update the user's information in the database
    $userID = $_SESSION['user_id']; // Assume the ID of the logged-in user is stored in the session
    $sql = "UPDATE Users SET Username = '$username', SchoolName = '$school', Yr = '$year', Email = '$email' WHERE UserID = $userID";

    if ($con->query($sql) === TRUE) {
        echo "Profile information updated successfully.";
    } else {
        echo "Error updating profile information: " . $con->error;
    }
}

// Close the database connection
$con->close();
?>
