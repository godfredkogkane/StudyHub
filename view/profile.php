<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/profile.css">
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
        <!-- Display user information -->
        <?php include "../action/get_user_info.php"; ?>

        <div class="row">
            <!-- Display profile picture -->
            <div class="col-md-4 mb-4 text-center">
                <div class="profile-picture">
                    <?php if (!empty($userInfo['ProfilePicture'])): ?>
                        <img src="<?php echo $userInfo['ProfilePicture']; ?>" alt="Profile Picture" class="img-fluid rounded-circle">
                    <?php else: ?>
                        <!-- Use a default avatar as a placeholder -->
                        <img src="../img/avatar.jpg" alt="Avatar" class="img-fluid rounded-circle">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Upload profile picture form -->
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Upload Profile Picture</h3>
                        <form action="../action/upload_profile_picture.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="profile_picture" accept="image/*" class="form-control-file" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit profile information form -->
        <div class="profile-section">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Edit Profile Information</h3>
                    <form action="../action/update_profile.php" method="post">
                        <!-- Include form fields for editing profile information (username, school, year, email) -->
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="<?php echo $userInfo['Username']; ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="school">School:</label>
                            <input type="text" id="school" name="school" value="<?php echo $userInfo['SchoolName']; ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="year">Year:</label>
                            <input type="text" id="year" name="year" value="<?php echo $userInfo['Yr']; ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo $userInfo['Email']; ?>" class="form-control" required>
                        </div>

                        <!-- Add a submit button -->
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
