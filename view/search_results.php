<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/search.css">
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
        <?php
        // Include your database connection file
        include "../settings/connection.php";

        // Check if search query is provided
        if(isset($_GET['q'])) {
            // Sanitize the search query
            $searchQuery = mysqli_real_escape_string($con, $_GET['q']);

            // Perform a database query to find matching documents
            $sql = "SELECT DocumentID, Title FROM DocumentStorage WHERE Title LIKE '%$searchQuery%'";
            $result = $con->query($sql);

            if($result) {
                // Check if any documents are found
                if($result->num_rows > 0) {
                    // Output search results
                    echo "<h2>Search Results</h2>";
                    echo "<ul>";
                    while($row = $result->fetch_assoc()) {
                        // Add a link to the review page with document_id as GET parameter
                        echo "<li>" . $row['Title'] . " - <a href='review.php?document_id=" . $row["DocumentID"] . "'>Submit Review</a> - <a href='../action/download_document.php?id=" . $row["DocumentID"] . "'>Download</a></li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No documents found matching your search.</p>";
                }
            } else {
                echo "<p>Error executing search query: " . $con->error . "</p>";
            }
        } else {
            echo "<p>No search query provided.</p>";
        }

        // Close the database connection
        $con->close();
        ?>
    </div>
</body>
</html>
