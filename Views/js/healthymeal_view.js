function updateTotal() {
    const dietSelect = document.getElementById('diet');
    const mealPlanSelect = document.getElementById('meal-plan');
    const totalAmountElement = document.getElementById('total-amount');

    const dietPrice = parseFloat(dietSelect.options[dietSelect.selectedIndex].getAttribute('data-price'));
    const mealMultiplier = parseFloat(mealPlanSelect.options[mealPlanSelect.selectedIndex].getAttribute('data-multiplier'));

    if (!isNaN(dietPrice) && !isNaN(mealMultiplier)) {
        const total = dietPrice * mealMultiplier;
        totalAmountElement.textContent = total.toFixed(2);
    } else {
        totalAmountElement.textContent = '0.00';
    }
}

document.getElementById('diet').addEventListener('change', updateTotal);
document.getElementById('meal-plan').addEventListener('change', updateTotal);
updateTotal();