function openEditForm(documentId, currentTitle) {
    // Set the document ID and current title in the form
    document.getElementById('editDocumentId').value = documentId;
    document.getElementById('newTitle').value = currentTitle;

    // Display the edit form
    document.getElementById('editForm').style.display = 'block';
}
