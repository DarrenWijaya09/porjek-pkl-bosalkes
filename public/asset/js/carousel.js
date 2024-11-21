document.addEventListener('DOMContentLoaded', function () {
    // Function to move to the next slide
    function nextSlide() {
        const slides = document.querySelector('.card-slider');
        const cardWidth = document.querySelector('.card-slide').offsetWidth + 24; // Including margin
        const totalWidth = slides.scrollWidth;
        const currentOffset = Math.abs(parseInt(window.getComputedStyle(slides).transform.split(',')[4])); // Get current offset of slider

        // Calculate next position (move to the right, and loop back to the start)
        const nextOffset = (currentOffset - cardWidth + totalWidth) % totalWidth;

        // Apply the transform to slide
        slides.style.transition = 'transform 1s ease-in-out'; // Add transition for smooth sliding
        slides.style.transform = `translateX(-${nextOffset}px)`;
    }

    // Set interval for auto sliding every 3 seconds
    setInterval(nextSlide, 1000); // Auto-slide every 3 seconds
});
