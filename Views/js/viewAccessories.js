function editRow(button) {
    event.preventDefault();
    const row = button.closest('tr');
    row.querySelector('.edit-btn').style.display = 'none';
    row.querySelector('.save-btn').style.display = 'inline-block';
    row.querySelector('.cancel-btn').style.display = 'inline-block';
    row.querySelectorAll('.display-text').forEach(el => el.style.display = 'none'); // Assuming these are the text elements
    row.querySelectorAll('.edit-input').forEach(el => el.style.display = 'inline-block'); // Assuming these are the input fields
}

function saveRow(button) {
    const row = button.closest('tr');
    alert('Save button clicked');
    row.querySelector('.edit-btn').style.display = 'inline-block';
    row.querySelector('.save-btn').style.display = 'none';
    row.querySelector('.cancel-btn').style.display = 'none';
    row.querySelectorAll('.display-text').forEach(el => el.style.display = 'inline-block');
    row.querySelectorAll('.edit-input').forEach(el => el.style.display = 'none');
}

function cancelEdit(button) {
    const row = button.closest('tr');
    row.querySelector('.edit-btn').style.display = 'inline-block';
    row.querySelector('.save-btn').style.display = 'none';
    row.querySelector('.cancel-btn').style.display = 'none';
    row.querySelectorAll('.display-text').forEach(el => el.style.display = 'inline-block');
    row.querySelectorAll('.edit-input').forEach(el => el.style.display = 'none');
}