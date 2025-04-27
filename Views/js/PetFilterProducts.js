document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const priceRange = document.getElementById('priceRange');
    const petCategories = document.querySelectorAll('.petcategory');
    const catCategories = document.querySelectorAll('.catcategory');
    const dogCategories = document.querySelectorAll('.dogcategory');
    const fishCategories = document.querySelectorAll('.fishcategory');
    const birdCategories = document.querySelectorAll('.birdcategory');
    const rabbitCategories = document.querySelectorAll('.rabbitcategory');
    const petList = document.getElementById('petlist');
    const products = document.querySelectorAll('.pet');

    function filterProducts() {
        const searchTerm = searchInput.value.toLowerCase();
        const maxPrice = priceRange.value;

    const selectedPetCategories = Array.from(petCategories)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    const selectedCatCategories = Array.from(catCategories)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    const selectedDogCategories = Array.from(dogCategories)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    const selectedFishCategories = Array.from(fishCategories)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    const selectedBirdCategories = Array.from(birdCategories)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    const selectedRabbitCategories = Array.from(rabbitCategories)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    products.forEach(product => {
        const productName = product.querySelector('h3').innerText.toLowerCase();
        const productPrice = parseFloat(product.dataset.price.replace('$', ''));
        const productCategory = product.classList.contains('cat') ? 'cat' : 
                product.classList.contains('dog') ? 'dog' :
                product.classList.contains('fish') ? 'fish' :
                product.classList.contains('bird') ? 'bird' :
                product.classList.contains('rabbit') ? 'rabbit' : '';

        const productType = product.classList.contains('persian') ? 'persian' :
                product.classList.contains('british-shorthair') ? 'british-shorthair' :
                product.classList.contains('bengal') ? 'bengal' :
                product.classList.contains('scottish-fold') ? 'scottish-fold' :
                product.classList.contains('munchkin') ? 'munchkin' :
                product.classList.contains('labrador-retriever') ? 'labrador-retriever' :
                product.classList.contains('golden-retriever') ? 'golden-retriever' :
                product.classList.contains('bulldog') ? 'bulldog' :
                product.classList.contains('poodle') ? 'poodle' :
                product.classList.contains('yorkshire-terrier') ? 'yorkshire-terrier' :
                product.classList.contains('goldfish') ? 'goldfish' :
                product.classList.contains('discus') ? 'discus' :
                product.classList.contains('betta') ? 'betta' :
                product.classList.contains('finch') ? 'finch' :
                product.classList.contains('canary') ? 'canary' :
                product.classList.contains('cockatoo') ? 'cockatoo' :
                product.classList.contains('budgerigar') ? 'budgerigar' :
                product.classList.contains('flemish-giant') ? 'flemish-giant' :
                product.classList.contains('mini-rex') ? 'mini-rex' : '';

        const matchesCategory = selectedPetCategories.length === 0 || selectedPetCategories.includes(productCategory);
        const matchesCatType = selectedCatCategories.length === 0 || selectedCatCategories.includes(productType);
        const matchesDogType = selectedDogCategories.length === 0 || selectedDogCategories.includes(productType);
        const matchesFishType = selectedFishCategories.length === 0 || selectedFishCategories.includes(productType);
        const matchesBirdType = selectedBirdCategories.length === 0 || selectedBirdCategories.includes(productType);
        const matchesRabbitType = selectedRabbitCategories.length === 0 || selectedRabbitCategories.includes(productType);
        const matchesSearch = productName.includes(searchTerm);
        const matchesPrice = productPrice <= maxPrice;

        if (matchesCategory && matchesCatType && matchesDogType && matchesFishType && matchesBirdType && matchesRabbitType && matchesSearch && matchesPrice) {
                product.style.display = 'block'; // Show the product
        } else {
                product.style.display = 'none'; // Hide the product
        }
    });
    }

    searchInput.addEventListener('input', filterProducts);
    priceRange.addEventListener('input', filterProducts);

    petCategories.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
    catCategories.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
    dogCategories.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
    fishCategories.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
    birdCategories.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
    rabbitCategories.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
});