function showForm(packageName, packageCost) {
    const formSection = document.getElementById('form-section');
    formSection.classList.add('show');
    document.getElementById('package-cost').innerText = `${packageName} - $${packageCost.toFixed(2)}`;
    formSection.scrollIntoView({ behavior: 'smooth' });
}

function submitForm() {
    const form = document.getElementById('exercise-form');

    if (form.checkValidity()) {
        const button = document.querySelector('.submit-button');
        button.classList.add('submitting');

        setTimeout(() => {
            button.classList.remove('submitting');
            alert('Your exercise plan has been submitted!');
            form.reset(); 
            form.scrollIntoView({ behavior: 'smooth' });
        }, 2000);
    } else {
        alert('Please complete all required fields.');
    }
}