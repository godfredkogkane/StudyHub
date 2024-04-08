// dashboard.js

// Function to fetch document data via AJAX
function fetchDocumentData() {
    // Make an AJAX request
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Request was successful
                // Update the document data container with the response
                document.getElementById("documentDataContainer").innerHTML = xhr.responseText;
            } else {
                // Request failed
                console.error('Error fetching document data: ' + xhr.status);
            }
        }
    };

    // Open a GET request to the server endpoint that returns document data
    xhr.open("GET", "../action/get_all_documents.php", true);
    xhr.send();
}

// Call the fetchDocumentData function when the page is loaded
window.onload = function() {
    fetchDocumentData();
};
