<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studyhub - Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <header>
        <h1>Create New Account</h1>
    </header>
    <main>
        <div class="container">
            <!-- Register form -->
            <form action="../action/register_user_action.php" method="post" name="registrationForm" id="registrationForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" pattern="[a-zA-Z0-9_-]{4,50}" title="Username must be between 4 and 50 characters and may contain letters, numbers, hyphens, and underscores" required>
                </div>
                <div class="form-group">
                    <label for="schoolName">School Name</label>
                    <input type="text" class="form-control" id="schoolName" name="schoolName" required>
                </div>
                <div class="form-group">
                    <label for="yearLevel">Year Level</label>
                    <select class="form-control" id="yearLevel" name="yearLevel" required>
                        <option value="">Select Year Level</option>
                        <option value="Freshman">Freshman</option>
                        <option value="Sophomore">Sophomore</option>
                        <option value="Junior">Junior</option>
                        <option value="Senior">Senior</option>
                        <option value="Graduated">Graduated</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid email address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p>If you already have an account, <a href="login.php">login here</a>.</p>
        </div>
    </main>
    <script src="../js/register.js"></script>
</body>
</html>
