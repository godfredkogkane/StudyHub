<?php
// Include your database connection file
include "../settings/connection.php";

// Check if document ID is provided
if(isset($_GET['id'])) {
    $documentId = $_GET['id'];

    // Prepare SQL statement to delete document
    $sql = "DELETE FROM DocumentStorage WHERE DocumentID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $documentId);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Document deleted successfully, redirect to dashboard or any other page
        header("Location: ../view/dashboard.php");
        exit();
    } else {
        // Error occurred while deleting document
        echo "Error deleting document: " . $con->error;
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
} else {
    // Document ID not provided
    echo "Document ID not provided";
}
?>
