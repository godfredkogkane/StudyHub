<?php
// Include your database connection file
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if(isset($_POST['title']) && isset($_FILES['file'])) {
        $title = $_POST['title'];

        // File upload handling
        $file_name = $_FILES['file']['name'];
        $file_temp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];

        // Read the file content
        $file_content = file_get_contents($file_temp);

        // Insert document information into DocumentStorage table
        $sql = "INSERT INTO DocumentStorage (Title, FileType, DocumentData) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sss", $title, $file_type, $file_content);

        if ($stmt->execute() === TRUE) {
            // Redirect to dashboard after successful upload
            header("Location: ../view/dashboard.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        $stmt->close();
    } else {
        // Handle if any required field is missing
        echo "All fields are required.";
    }
}
?>
