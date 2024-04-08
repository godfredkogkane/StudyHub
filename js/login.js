// login.js

// Function to handle login form submission
function loginUser(event) {
    event.preventDefault();

    // Validate form
    if (!validateForm()) {
        return;
    }

    // Get form data
    const formData = new FormData(event.target);

    // Get email and password values
    const email = formData.get('email');
    const password = formData.get('password');

    // Construct user object
    const user = {
        email: email,
        password: password
    };

    // Here, you can send the user object to your backend for login
    console.log('Logged in user:', user);
}

// Function to validate login form
function validateForm() {
    const email = document.forms["login"]["email"].value;
    const password = document.forms["login"]["password"].value;

    if (email.trim() === "") {
        alert("Email must be filled");
        return false;
    } else if (!/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    if (password.trim() === "") {
        alert("Please enter a password");
        return false;
    } else if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(password)) {
        alert("Please enter a valid password");
        return false;
    }

    return true;
}

// Event listener for login form submission
document.getElementById('loginForm').addEventListener('submit', loginUser);
