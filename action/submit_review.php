<?php
// Include necessary files and configurations
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $document_id = $_POST['document_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review'];

    // Insert review into Reviews table
    $insert_review_query = "INSERT INTO Reviews (UserID, DocumentID, Rating, ReviewText) VALUES (1, $document_id, $rating, '$review_text')";
    if ($con->query($insert_review_query) === TRUE) {
        echo "Review submitted successfully.";
    } else {
        echo "Error submitting review: " . $con->error;
    }
}
?>
