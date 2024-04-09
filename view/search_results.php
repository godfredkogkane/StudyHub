<?php
// Include your database connection file
include "../settings/connection.php";

// Include core PHP file to ensure the user is logged in
include "../settings/core.php";
check_login();

// Fetch document data from the database excluding documents uploaded by the current user
$user_id = $_SESSION['user_id']; // Get the UserID from the session
$sql = "SELECT DocumentID, Title FROM DocumentStorage WHERE UserID != ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are any documents
if ($result->num_rows > 0) {
    // Output table header
    echo "<table border='1'>
            <tr>
                <th>Title</th>
                <th>Action</th>
            </tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["Title"] . "</td>
                <td>
                    <a href='../action/download_document.php?id=" . $row["DocumentID"] . "'>Download</a>
                </td>
              </tr>";
    }

    // Close the table
    echo "</table>";
} else {
    echo "No documents found";
}

$stmt->close();
$con->close();
?>
