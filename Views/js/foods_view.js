function attachHandlers() {
    var productItems = document.querySelectorAll(".product-item");

    productItems.forEach(function(item) {
        item.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent default link behavior
            var category = item.getAttribute("data-category");
            
            // Redirect to foodProduct_view.php with a URL parameter
            window.location.href = "foodProduct_view.php?category=" + encodeURIComponent(category);
        });
    });
}

// Run the function to attach handlers after the DOM is fully loaded
window.onload = attachHandlers;