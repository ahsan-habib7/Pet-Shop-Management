document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const priceRange = document.getElementById('priceRange');
    const categoryCheckboxes = document.querySelectorAll('.productcategory');
    const foodCategoryCheckboxes = document.querySelectorAll('.foodcategory');
    const typeCheckboxes = document.querySelectorAll('.quality');
    const products = document.querySelectorAll('.product');

    function filterProducts() {
        const searchTerm = searchInput.value.toLowerCase();
        const maxPrice = priceRange.value;

        const selectedCategories = Array.from(categoryCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

        const selectedFoodCategories = Array.from(foodCategoryCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

        const selectedTypes = Array.from(typeCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

        products.forEach(product => {
        const productName = product.querySelector('h3').innerText.toLowerCase();
        const productPrice = parseFloat(product.dataset.price.replace('$', ''));
        const productCategory = product.classList.contains('cat-food') ? 'cat-food' :
                    product.classList.contains('dog-food') ? 'dog-food' :
                    product.classList.contains('fish-food') ? 'fish-food' :
                    product.classList.contains('bird-food') ? 'bird-food' :
                    product.classList.contains('rabbit-food') ? 'rabbit-food' : '';

        const productFoodCategory = product.classList.contains('canned') ? 'canned' :
                        product.classList.contains('dry-kibble') ? 'dry-kibble' :
                        product.classList.contains('freeze-dried') ? 'freeze-dried' :
                        product.classList.contains('high-protein') ? 'high-protein' :
                        product.classList.contains('vegan') ? 'vegan' : '';

        const productType = product.classList.contains('basic') ? 'basic' :
                        product.classList.contains('premium') ? 'premium' : '';

        const matchesCategory = selectedCategories.length === 0 || selectedCategories.includes(productCategory);
        const matchesFoodCategory = selectedFoodCategories.length === 0 || selectedFoodCategories.includes(productFoodCategory);
        const matchesType = selectedTypes.length === 0 || selectedTypes.includes(productType);
        const matchesSearch = productName.includes(searchTerm);
        const matchesPrice = productPrice <= maxPrice;

        if (matchesCategory && matchesFoodCategory && matchesType && matchesSearch && matchesPrice) {
            product.style.display = 'block'; // Show the product
        } else {
            product.style.display = 'none'; // Hide the product
        }
        });
    }

    searchInput.addEventListener('input', filterProducts);
    priceRange.addEventListener('input', filterProducts);

    categoryCheckboxes.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
    foodCategoryCheckboxes.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
    typeCheckboxes.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
});