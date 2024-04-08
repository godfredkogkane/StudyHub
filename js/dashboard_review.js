// Function to fetch reviews for each document via AJAX
function fetchReviewsForDocuments() {
    // Make an AJAX request
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Request was successful
                // Update the reviews container with the response
                document.getElementById("reviewsContainer").innerHTML = xhr.responseText;
            } else {
                // Request failed
                console.error('Error fetching reviews: ' + xhr.status);
            }
        }
    };

    // Open a GET request to the server endpoint that returns reviews
    xhr.open("GET", "../action/get_all_reviews.php", true);
    xhr.send();
}

// Call the fetchReviewsForDocuments function when the page is loaded
window.onload = function() {
    fetchReviewsForDocuments();
};
