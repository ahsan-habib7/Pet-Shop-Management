let scrollAmount = 0;

function scrollPetlistLeft() {
    const container = document.querySelector('.petlist-items');
    const itemWidth = document.querySelector('.petlist-item').offsetWidth + 20; // Include margin

    scrollAmount -= itemWidth;

    if (scrollAmount < 0) {
        scrollAmount = 0;
    }

    container.style.transform = `translateX(-${scrollAmount}px)`;
}

function scrollPetlistRight() {
    const container = document.querySelector('.petlist-items');
    const containerWidth = document.querySelector('.petlist-container').offsetWidth;
    const itemWidth = document.querySelector('.petlist-item').offsetWidth + 20; // Include margin
    const maxScroll = container.scrollWidth - containerWidth;

    scrollAmount += itemWidth;

    if (scrollAmount > maxScroll) {
        scrollAmount = maxScroll;
    }

    container.style.transform = `translateX(-${scrollAmount}px)`;
}