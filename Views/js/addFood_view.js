window.onload = function() {
    document.querySelectorAll('form').forEach(form => form.style.display = 'none');
};
document.querySelectorAll('.product-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelectorAll('form').forEach(form => form.style.display = 'none');
        const category = this.getAttribute('data-category');
        document.querySelector('form[name="' + category + '"]').style.display = 'block';
        const productImageInput = form.querySelector('input[name="productImage"]');
    });
});