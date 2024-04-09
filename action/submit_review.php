<?php
// Include necessary files and configurations
include "../settings/connection.php";

// Include core PHP file to ensure the user is logged in
include "../settings/core.php";
check_login();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $document_id = $_POST['document_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review'];
    $user_id = $_SESSION['user_id']; // Get the UserID from the session

    // Retrieve username from Users table based on UserID
    $username_query = "SELECT Username FROM Users WHERE UserID = ?";
    $stmt_username = $con->prepare($username_query);
    $stmt_username->bind_param("i", $user_id);
    $stmt_username->execute();
    $stmt_username->bind_result($username);
    $stmt_username->fetch();
    $stmt_username->close();

    // Insert review into Reviews table with the UserID and Username
    $insert_review_query = "INSERT INTO Reviews (UserID, Username, DocumentID, Rating, ReviewText) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($insert_review_query);
    $stmt->bind_param("isis", $user_id, $username, $document_id, $rating, $review_text);

    if ($stmt->execute() === TRUE) {
        echo "Review submitted successfully.";
    } else {
        echo "Error submitting review: " . $con->error;
    }

    $stmt->close();
}
?>
