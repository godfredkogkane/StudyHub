// scripts.js

// Function to load content dynamically based on URL
function loadContent() {
    const urlParams = new URLSearchParams(window.location.search);
    const page = urlParams.get('page');

    if (page === 'login') {
        fetch('login.html')
            .then(response => response.text())
            .then(data => document.getElementById('content').innerHTML = data);
    } else if (page === 'upload') {
        fetch('upload.html')
            .then(response => response.text())
            .then(data => document.getElementById('content').innerHTML = data);
    } else if (page === 'search') {
        fetch('search.html')
            .then(response => response.text())
            .then(data => document.getElementById('content').innerHTML = data);
    }
    // Add more conditions for other pages if necessary
}

// Event listener to load content on page load
window.onload = function() {
    loadContent();
};
