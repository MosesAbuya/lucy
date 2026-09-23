// Home Page Interactions

(function() {
    console.log("home_interactions.js loaded");

    // 1. Quote Carousel
    const slides = document.querySelectorAll('.quote-slide');
    if (slides.length > 0) {
        let currentQuote = 0;
        let quoteInterval;

        window.nextQuote = function() {
            slides[currentQuote].classList.remove('active');
            currentQuote = (currentQuote + 1) % slides.length;
            slides[currentQuote].classList.add('active');
            resetInterval();
        };

        window.prevQuote = function() {
            slides[currentQuote].classList.remove('active');
            currentQuote = (currentQuote - 1 + slides.length) % slides.length;
            slides[currentQuote].classList.add('active');
            resetInterval();
        };

        function resetInterval() {
            if (quoteInterval) clearInterval(quoteInterval);
            quoteInterval = setInterval(window.nextQuote, 5000);
        }

        // Start interval
        resetInterval();
    }

    // 2. Scroll Animations (Infographic)
    const infographicSection = document.getElementById('weightInfographic');
    const invisibleWeights = document.querySelectorAll('.invisible-weight');
    let infographicStarted = false;

    function handleScroll() {
        if (!infographicSection || infographicStarted) return;
        
        const rect = infographicSection.getBoundingClientRect();
        // Trigger when the element enters the bottom 15% of the viewport (or is already higher)
        if (rect.top <= window.innerHeight * 0.85) {
            infographicStarted = true;
            invisibleWeights.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('visible');
                }, index * 400); // cascade delay
            });
        }
    }

    window.addEventListener('scroll', handleScroll);
    // Trigger on load if already in view
    setTimeout(handleScroll, 100);
})();
