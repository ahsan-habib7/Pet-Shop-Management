document.querySelectorAll('.card button').forEach((button, index) => {
    button.addEventListener('click', () => {
        const plans = ['Basic', 'Standard', 'Premium'];
        const prices = ['$49/Mo', '$99/Mo', '$149/Mo'];

        document.getElementById('plan-type').value = plans[index];
        document.getElementById('total-price').value = prices[index];
        document.getElementById('bookingform').style.display = 'block';
        window.scrollTo({
            top: document.getElementById('bookingform').offsetTop,
            behavior: 'smooth'
        });
    });
});