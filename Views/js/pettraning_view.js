function openForm(trainingType, trainingPrice) {
    document.getElementById('trainingType').textContent = trainingType;
    document.getElementById('trainingPrice').textContent = trainingPrice;
    document.getElementById('bookingForm').style.display = 'block';
    window.scrollTo({ top: document.getElementById('bookingForm').offsetTop, behavior: 'smooth' });
}