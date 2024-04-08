<?php
// Include your database connection file
include "../settings/connection.php";

// Check if DocumentID is provided
if(isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $documentId = mysqli_real_escape_string($con, $_GET['id']);

    // Fetch document data from the database
    $sql = "SELECT Title, FileType, DocumentData FROM DocumentStorage WHERE DocumentID = '$documentId'";
    $result = $con->query($sql);

    if($result) {
        // Check if the document exists
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $title = $row['Title'];
            $fileType = $row['FileType'];
            $documentData = $row['DocumentData'];

            // Set the appropriate Content-Type header for the file type
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=\"$title.$fileType\"");
            header("Content-Length: " . strlen($documentData));

            // Output the document data
            echo $documentData;
            exit();
        } else {
            echo "Document not found";
        }
    } else {
        echo "Error retrieving document: " . $con->error;
    }
} else {
    echo "Document ID not provided";
}

// Close the database connection
$con->close();
?>
