document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const priceRange = document.getElementById('priceRange');
    const accessoriesCategoryCheckboxes = document.querySelectorAll('.accessoriescategory');
    const accessoriesPetTypeCheckboxes = document.querySelectorAll('.accessoriespettype');
    const accessoriesList = document.querySelectorAll('.accessories');

    function filterAccessories() {
        const searchTerm = searchInput.value.toLowerCase();
        const maxPrice = parseFloat(priceRange.value);

        const selectedAccessoriesCategories = Array.from(accessoriesCategoryCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        const selectedPetTypes = Array.from(accessoriesPetTypeCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        accessoriesList.forEach(accessory => {
            const accessoryName = accessory.querySelector('h3').innerText.toLowerCase();
            const accessoryPrice = parseFloat(accessory.dataset.price.replace('$', ''));
            const accessoryCategory = accessory.classList.contains('training-kits') ? 'training-kits' :
                                      accessory.classList.contains('wellness-products') ? 'wellness-products' :
                                      accessory.classList.contains('beds') ? 'beds' :
                                      accessory.classList.contains('toys') ? 'toys' :
                                      accessory.classList.contains('carriers') ? 'carriers' : '';

            const accessoryPetType = accessory.classList.contains('cat') ? 'cat' :
                                     accessory.classList.contains('dog') ? 'dog' :
                                     accessory.classList.contains('fish') ? 'fish' :
                                     accessory.classList.contains('bird') ? 'bird' :
                                     accessory.classList.contains('rabbit') ? 'rabbit' : '';

            // Check if accessory matches selected filters
            const matchesCategory = selectedAccessoriesCategories.length === 0 || selectedAccessoriesCategories.includes(accessoryCategory);
            const matchesPetType = selectedPetTypes.length === 0 || selectedPetTypes.includes(accessoryPetType);
            const matchesSearch = accessoryName.includes(searchTerm);
            const matchesPrice = accessoryPrice <= maxPrice;

            // Show or hide accessories based on matches
            if (matchesCategory && matchesPetType && matchesSearch && matchesPrice) {
                accessory.style.display = 'block'; // Show the accessory
            } else {
                accessory.style.display = 'none'; // Hide the accessory
            }
        });
    }

    searchInput.addEventListener('input', filterAccessories);
    priceRange.addEventListener('input', filterAccessories);

    accessoriesCategoryCheckboxes.forEach(checkbox => checkbox.addEventListener('change', filterAccessories));
    accessoriesPetTypeCheckboxes.forEach(checkbox => checkbox.addEventListener('change', filterAccessories));
});