<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/document.css">
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
                    <li class="nav-item">
                        <a class="nav-link" href="../login/login.php">Login</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="container">
        <h2>Upload a Document</h2>
        <form action="../action/document_upload.php" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br><br>
            
            <label for="file">Choose a file:</label><br>
            <input type="file" id="file" name="file" required><br><br>
            
            <label for="fileType">File Type:</label><br>
            <select id="fileType" name="fileType" required>
                <option value="PDF">PDF</option>
                <option value="Word">Word</option>
            </select><br><br>
            
            <input type="submit" value="Upload">
        </form>
    </div>
</body>
</html>
