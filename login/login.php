<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studyhub - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="navigation-container">
    <header class="bg-primary py-3 mb-4">
        <!-- Bootstrap Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Studyhub</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <!-- New "Register" navigation link -->
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</div>
    <main>
        <div class="container">
            <!-- Login form -->
            <form action="../action/login_user_action.php" method="post" name="login" id="loginForm" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" style="color:var(--primary-color);" title="Invalid email address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" style="color:var(--primary-color);" title="Password must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters" required>
                </div>
                <button type="submit" name="login_button"class="btn btn-primary">Login</button>
            </form>
            <p>New User? <a href="register.php">Create new account</a></p>
        </div>
    </main>
    <script src="../css/login.js"></script>
</body>
</html>
