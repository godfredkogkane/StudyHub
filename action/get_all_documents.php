<?php
// Include your database connection file
include "../settings/connection.php";

// Check login status
include "../settings/core.php";
check_login();

$userID = $_SESSION['user_id']; // Get the UserID from the session

// Fetch documents uploaded by the user and reviews given by other users on those documents
$sql = "SELECT d.DocumentID, d.Title, r.Rating, r.ReviewText
        FROM DocumentStorage d
        LEFT JOIN Reviews r ON d.DocumentID = r.DocumentID
        WHERE d.UserID = $userID";
$result = $con->query($sql);

// Check if there are any documents and reviews
if ($result->num_rows > 0) {
    // Output table header
    echo "<table class='table'>";
    echo "<thead><tr><th>Title</th><th>Action</th></tr></thead>";
    echo "<tbody>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Title']}</td>";
        echo "<td>
                <a href='../action/download_document.php?id={$row['DocumentID']}'>Download</a> | 
                <a href='../action/delete_document.php?id={$row['DocumentID']}'>Delete</a>
              </td>";
        echo "</tr>";
        // Check if there are reviews for the document and display them if available
        if (!empty($row['Rating']) && !empty($row['ReviewText'])) {
            echo "<tr><td colspan='2'>
                    <strong>Rating:</strong> {$row['Rating']}/5 <br>
                    <strong>Review:</strong> {$row['ReviewText']}
                  </td></tr>";
        }
    }

    // Close the table
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No documents found";
}

$con->close();
?>
