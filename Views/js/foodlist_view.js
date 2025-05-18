let foodlistScrollAmount = 0;


function scrollFoodlistLeft() {
    const container = document.querySelector('.foodlist-items');
    const itemWidth = document.querySelector('.foodlist-item').offsetWidth + 20; // Include margin

    foodlistScrollAmount -= itemWidth;

    if (foodlistScrollAmount < 0) {
        foodlistScrollAmount = 0;
    }

    container.style.transform = `translateX(-${foodlistScrollAmount}px)`;
}

function scrollFoodlistRight() {
    const container = document.querySelector('.foodlist-items');
    const containerWidth = document.querySelector('.foodlist-container').offsetWidth;
    const itemWidth = document.querySelector('.foodlist-item').offsetWidth + 20; // Include margin
    const maxScroll = container.scrollWidth - containerWidth;

    foodlistScrollAmount += itemWidth;

    if (foodlistScrollAmount > maxScroll) {
        foodlistScrollAmount = maxScroll;
    }

    container.style.transform = `translateX(-${foodlistScrollAmount}px)`;
}