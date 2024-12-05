
document.addEventListener('DOMContentLoaded', () => {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.banner-slide');
    const totalSlides = slides.length;

    // Function to update the visibility of slides
    const updateSlides = () => {
        slides.forEach((slide, index) => {
            slide.classList.toggle('hidden', index !== currentSlide);
        });
    };

    // Next and Previous buttons
    document.getElementById('next').addEventListener('click', () => {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlides();
    });

    document.getElementById('prev').addEventListener('click', () => {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlides();
    });

    setInterval(function() {
        changeSlide(1);
    }, 5000); // This will auto-change the slide every 5 seconds
    // Initialize the first slide
    updateSlides();
});








