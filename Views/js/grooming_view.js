const groomingForm = document.getElementById('grooming-form');
const selectedServices = document.getElementById('grooming-selected-services');
const totalPrice = document.getElementById('grooming-total-price');
const bookNowButton = document.getElementById('grooming-book-now');
const bookingForm = document.getElementById('grooming-booking-form');
const groomingOptions = document.getElementById('grooming-options');

groomingForm.addEventListener('change', function () {
    const services = [];
    let total = 0;
        
    groomingForm.querySelectorAll('input[type="checkbox"]').forEach(function (checkbox) {
        if (checkbox.checked) {
            services.push(checkbox.parentNode.textContent.trim());
            total += parseFloat(checkbox.value);
        }
    });

    selectedServices.textContent = services.join(', ') || 'No services selected.';
    totalPrice.textContent = total.toFixed(2);
    groomingOptions.value = services.join(', ');
    });

    bookNowButton.addEventListener('click', function () {
        if (totalPrice.textContent === '0') {
            alert('Please select at least one service.');
        } else {
            bookingForm.style.display = 'block';
            bookNowButton.scrollIntoView({ behavior: 'smooth' });
        }
});