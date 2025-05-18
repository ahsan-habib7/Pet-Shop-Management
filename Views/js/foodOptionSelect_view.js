window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const foodtype = urlParams.get('category');
    if (foodtype) {
        const checkbox = document.querySelector(`.foodcategory[value="${foodtype}"]`);
        if (checkbox) {
            checkbox.checked = true;
            filterProducts();
        }
    }
};

function filterProducts() {
    const selectedCategories = Array.from(document.querySelectorAll('.foodcategory:checked')).map(cb => cb.value);
    const allProducts = document.querySelectorAll('.product');

    allProducts.forEach(product => {
        const productClasses = Array.from(product.classList);
        const isMatch = selectedCategories.some(foodtype => productClasses.includes(foodtype));
        product.style.display = isMatch ? 'block' : 'none';
    });
}

document.querySelectorAll('.foodcategory').forEach(checkbox => {
    checkbox.addEventListener('change', filterProducts);
});