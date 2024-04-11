<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Reviews</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/review.css">

</head>
<body>
    <!-- Navigation -->
    <div class="navigation-container">
        <header class="bg-primary py-3 mb-4">
            <!-- Bootstrap Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="document.php">Upload Document</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search_document.php">Search Documents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login/logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="container">
        <!-- Content of the dashboard goes here -->
        <h2>Document Reviews</h2>
        <?php
        // Include necessary files and configurations
        include "../settings/connection.php";
        
        // Check if DocumentID is provided via GET parameter
        if(isset($_GET['document_id'])) {
            $document_id = intval($_GET['document_id']); // Convert to integer to avoid SQL injection
            
            // Query to fetch document details
            $document_query = "SELECT Title FROM DocumentStorage WHERE DocumentID = $document_id";
            $document_result = $con->query($document_query);
            
            if($document_result && $document_result->num_rows > 0) {
                $document = $document_result->fetch_assoc();
                echo "<h3>{$document['Title']}</h3>";
                // Display form to submit review
                echo "<form action='../action/submit_review.php' method='post'>";
                echo "<input type='hidden' name='document_id' value='$document_id'>";
                echo "<div class='form-group'>";
                echo "<label for='rating'>Rating:</label>";
                echo "<input type='number' id='rating' name='rating' min='1' max='5' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='review'>Review:</label>";
                echo "<textarea id='review' name='review' class='form-control' rows='5' required></textarea>";
                echo "</div>";
                echo "<button type='submit' class='btn btn-primary'>Submit Review</button>";
                echo "</form>";
            } else {
                echo "Document not found.";
            }
        } else {
            echo "Document ID not provided.";
        }
        ?>
    </div>
</body>
</html>
