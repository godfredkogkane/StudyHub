<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Documents</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="../login/login.php">Login</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="container">
        <h2>Search Documents</h2>
        <form action="search_results.php" method="get">
            <label for="search">Search:</label>
            <input type="text" id="search" name="q" required>
            <button type="submit">Search</button>
        </form>
    </div>
</body>
</html>
