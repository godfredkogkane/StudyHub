// Function to handle registration form submission
function registerUser(event) {
    event.preventDefault();

    // Get form data
    const formData = new FormData(event.target);

    // Get password and confirm password values
    const password = formData.get('password');
    const confirmPassword = formData.get('confirmPassword');

    // Check if passwords match
    if (password !== confirmPassword) {
        alert('Passwords do not match');
        return;
    }

    // Validate email pattern
    const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    const email = formData.get('email');
    if (!emailPattern.test(email)) {
        alert('Invalid email address');
        return;
    }

    // Validate username pattern
    const usernamePattern = /^[a-zA-Z0-9_-]{4,50}$/;
    const username = formData.get('username');
    if (!usernamePattern.test(username)) {
        alert('Username must be between 4 and 50 characters and may contain letters, numbers, underscores, and hyphens');
        return;
    }

    // Construct user object
    const user = {
        username: username,
        email: email,
        password: password
    };
    // Here, you can send the user object to your backend for registration
    console.log('Registered user:', user);
}
// Event listener for registration form submission
document.getElementById('registerForm').addEventListener('submit', registerUser);
