<?php
// Include the connection file
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and assign each to a variable after sanitizing
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $schoolName = mysqli_real_escape_string($con, $_POST['schoolName']);
    $yearLevel = mysqli_real_escape_string($con, $_POST['yearLevel']);

    // Encrypt the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare insert query with placeholders
    $sql = "INSERT INTO Users (Username, Email, Passwd, SchoolName, Yr) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $hashed_password, $schoolName, $yearLevel);
        
        // Execute the statement
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            // Redirect to login page on success
            header("Location: ../login/login.php?registration=success");
            exit();
        } else {
            // Display error on the register page
            echo "Error: " . mysqli_error($con);
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Display error on the register page
        echo "Error: " . mysqli_error($con);
    }
}

// Close the connection
mysqli_close($con);
?>
