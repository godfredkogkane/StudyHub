<?php
session_start();
include "../settings/connection.php";

if (!$con) {
    die("Database connection error: " . mysqli_connect_error());
}

if (isset($_POST['login_button'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $select_query = "SELECT * FROM Users WHERE Email = '$email'";
    $result = mysqli_query($con, $select_query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['Passwd'])) {
                $_SESSION['user_id'] = $row['UserID'];
                $_SESSION['username'] = $row['Username'];

                // Update last login date
                $update_query = "UPDATE Users SET LastLoginDate = CURRENT_TIMESTAMP WHERE UserID = ".$_SESSION['user_id'];
                mysqli_query($con, $update_query);

                header("Location: ../view/dashboard.php");
                exit();
            } else {
                header("Location: login.php?msg=incorrect");
                exit();
            }
        } else {
            header("Location: login.php?msg=not_registered");
            exit();
        }
    } else {
        // Log the error for debugging
        error_log("Error executing query: " . mysqli_error($con));

        // Display a generic error message
        header("Location: login.php?msg=error");
        exit();
    }
} else {
    header("Location: login.php?msg=error");
    exit();
}
?>
