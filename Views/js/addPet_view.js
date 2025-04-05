// Ensure all forms are hidden initially
window.onload = function() {
    // Hide all forms on load
    document.querySelectorAll('form').forEach(form => form.style.display = 'none');
};

// JavaScript to handle form visibility on button click
document.querySelectorAll('.pets-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Hide all forms
        document.querySelectorAll('form').forEach(form => form.style.display = 'none');
        
        // Get the category from data attribute
        const category = this.getAttribute('data-category');
        
        // Show the relevant form based on category by matching name attribute
        document.querySelector('form[name="' + category + '"]').style.display = 'block';

        const productImageInput = form.querySelector('input[name="productImage"]');
    });
});