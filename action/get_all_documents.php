<?php
// Include your database connection file
include "../settings/connection.php";

// Fetch document data from the database
$sql = "SELECT DocumentID, Title FROM DocumentStorage";
$result = $con->query($sql);

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
                    <a href='../action/download_document.php?id=" . $row["DocumentID"] . "'>Download</a> | 
                    <a href='../action/delete_document.php?id=" . $row["DocumentID"] . "'>Delete</a>
                </td>
              </tr>";
    }

    // Close the table
    echo "</table>";
} else {
    echo "No documents found";
}
$con->close();
?>
