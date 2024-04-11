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

    // Insert review into Reviews table with the UserID
    $insert_review_query = "INSERT INTO Reviews (UserID, DocumentID, Rating, ReviewText) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($insert_review_query);
    $stmt->bind_param("iiss", $user_id, $document_id, $rating, $review_text);

    if ($stmt->execute() === TRUE) {
        // Redirect to the search_document.php page
        header("Location: ../view/search_document.php");
        exit; // Ensure that no other output is sent
    } else {
        echo "Error submitting review: " . $con->error;
    }

    $stmt->close();
}
?>
