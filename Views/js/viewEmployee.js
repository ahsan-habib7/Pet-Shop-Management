function editRow(button) {
    // Prevent default behavior (just in case)
    event.preventDefault();

    // Get the row containing the clicked edit button
    const row = button.closest('tr');

    // Hide the edit button and show the save & cancel buttons
    row.querySelector('.edit-btn').style.display = 'none';
    row.querySelector('.save-btn').style.display = 'inline-block';
    row.querySelector('.cancel-btn').style.display = 'inline-block';

    // Show editable input fields
    row.querySelectorAll('.display-text').forEach(el => el.style.display = 'none'); // Assuming these are the text elements
    row.querySelectorAll('.edit-input').forEach(el => el.style.display = 'inline-block'); // Assuming these are the input fields
}

function saveRow(button) {
    const row = button.closest('tr');

    // Perform the save action here (AJAX or form submission)
    alert('Save button clicked');

    // Hide save and cancel buttons and show edit button again
    row.querySelector('.edit-btn').style.display = 'inline-block';
    row.querySelector('.save-btn').style.display = 'none';
    row.querySelector('.cancel-btn').style.display = 'none';

    // Hide editable inputs and show text values again
    row.querySelectorAll('.display-text').forEach(el => el.style.display = 'inline-block');
    row.querySelectorAll('.edit-input').forEach(el => el.style.display = 'none');

    // Optionally, here you would handle the actual data submission to save changes
}

function cancelEdit(button) {
    // Restore original state
    const row = button.closest('tr');
    row.querySelector('.edit-btn').style.display = 'inline-block';
    row.querySelector('.save-btn').style.display = 'none';
    row.querySelector('.cancel-btn').style.display = 'none';

    // Hide editable inputs and show text values again
    row.querySelectorAll('.display-text').forEach(el => el.style.display = 'inline-block');
    row.querySelectorAll('.edit-input').forEach(el => el.style.display = 'none');
}