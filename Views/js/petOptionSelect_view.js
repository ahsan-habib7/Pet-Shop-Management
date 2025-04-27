window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('category');
    if (category) {
        const checkbox = document.querySelector(`.petcategory[value="${category}"]`);
        if (checkbox) {
            checkbox.checked = true;
            filterProducts(); // Trigger the filter function to show relevant products
        }
    }
};

function filterProducts() {
    const selectedCategories = Array.from(document.querySelectorAll('.petcategory:checked')).map(cb => cb.value);
    const allProducts = document.querySelectorAll('.pet');

    allProducts.forEach(product => {
        const productClasses = Array.from(product.classList);
        const isMatch = selectedCategories.some(category => productClasses.includes(category));
        product.style.display = isMatch ? 'block' : 'none';
    });
}

// Attach the filterProducts function to the checkbox change event
document.querySelectorAll('.petcategory').forEach(checkbox => {
    checkbox.addEventListener('change', filterProducts);
});