<?php
// Include your database connection file
// Include your core script to check login status
require_once "../settings/core.php";

include "../settings/connection.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0) {
        $file = $_FILES["profile_picture"];

        // Specify upload directory and filename
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/studyhub/profile_pictures/";
        $uploadPath = $uploadDir . basename($file["name"]);

        // Move uploaded file to the specified directory
        if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
            // Update the profile picture path in the database for the logged-in user
            $userID = $_SESSION['user_id']; // Assume the ID of the logged-in user is stored in the session
            $sql = "UPDATE Users SET ProfilePicture = '$uploadPath' WHERE UserID = $userID";

            if ($con->query($sql) === TRUE) {
                echo "Profile picture uploaded successfully.";
            } else {
                echo "Error updating profile picture: " . $con->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file uploaded or an error occurred.";
    }
}

// Close the database connection
$con->close();
?>
