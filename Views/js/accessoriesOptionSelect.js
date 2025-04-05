window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('category');
    if (category) {
        const checkbox = document.querySelector(`.accessoriescategory[value="${category}"]`);
        if (checkbox) {
            checkbox.checked = true;
            filterProducts();
        }
    }
};

function filterProducts() {
    const selectedCategories = Array.from(document.querySelectorAll('.accessoriescategory:checked')).map(cb => cb.value);
    const allProducts = document.querySelectorAll('.accessories');

    allProducts.forEach(product => {
        const productClasses = Array.from(product.classList);
        const isMatch = selectedCategories.some(category => productClasses.includes(category));
        product.style.display = isMatch ? 'block' : 'none';
    });
}

document.querySelectorAll('.accessoriescategory').forEach(checkbox => {
    checkbox.addEventListener('change', filterProducts);
});