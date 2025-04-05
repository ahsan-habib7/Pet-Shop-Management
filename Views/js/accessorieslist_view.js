let accessorieslistscrollAmount = 0;

function scrollAccessorieslistLeft() {
    const container = document.querySelector('.accessorieslist-items');
    const itemWidth = document.querySelector('.accessorieslist-item').offsetWidth + 20; // Include margin

    accessorieslistscrollAmount -= itemWidth;

    if (accessorieslistscrollAmount < 0) {
        accessorieslistscrollAmount = 0;
    }

    container.style.transform = `translateX(-${accessorieslistscrollAmount}px)`;
}

function scrollAccessorieslistRight() {
    const container = document.querySelector('.accessorieslist-items');
    const containerWidth = document.querySelector('.accessorieslist-container').offsetWidth;
    const itemWidth = document.querySelector('.accessorieslist-item').offsetWidth + 20; // Include margin
    const maxScroll = container.scrollWidth - containerWidth;

    accessorieslistscrollAmount += itemWidth;

    if (accessorieslistscrollAmount > maxScroll) {
        accessorieslistscrollAmount = maxScroll;
    }

    container.style.transform = `translateX(-${accessorieslistscrollAmount}px)`;
}