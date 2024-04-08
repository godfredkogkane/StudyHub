// search.js

// Function to perform search via AJAX
function performSearch() {
    // Get the search query from the input field
    var searchQuery = document.getElementById("search").value;

    // Make an AJAX request
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Request was successful
                // Update the search results container with the response
                document.getElementById("searchResultsContainer").innerHTML = xhr.responseText;
            } else {
                // Request failed
                console.error('Error fetching search results: ' + xhr.status);
            }
        }
    };

    // Open a GET request to the server endpoint that returns search results
    xhr.open("GET", "../view/search_results.php?q=" + encodeURIComponent(searchQuery), true);
    xhr.send();
}

// Call the performSearch function when the search form is submitted
document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting in the traditional way
    performSearch();
});
