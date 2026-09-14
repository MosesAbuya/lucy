<?php
$extra_css = 'home';
$extra_js = 'countdown';
include 'partials/nav.php';
?>

<!-- Home Page Specific CSS -->
<style>
    .hero-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        padding-top: 150px;
        padding-bottom: 80px;
        overflow: hidden;
    }

    /* Frayed Thread SVG in Hero */
    .hero-thread-container {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 300px;
        transform: translateY(-50%);
        z-index: 1;
        pointer-events: none;
        opacity: 0.3;
    }

    .hero-thread-path {
        fill: none;
        stroke: var(--color-gold);
        stroke-width: 1.2;
        stroke-dasharray: 4000;
        stroke-dashoffset: 4000;
        animation: drawFrayed 4s ease-in-out forwards;
    }

    @keyframes drawFrayed {
        to {
            stroke-dashoffset: 0;
        }
    }

    .glow-bg {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 80vw;
        height: 80vw;
        background: radial-gradient(circle, rgba(184, 147, 90, 0.15) 0%, rgba(11, 11, 10, 0) 60%);
        transform: translate(-50%, -50%);
        z-index: 0;
        pointer-events: none;
    }

    /* Book Layout Styles */
    .hero-book-wrapper {
        position: relative;
        perspective: 1000px;
        margin: 0 auto;
        max-width: 320px;
    }

    .hero-book-img {
        width: 100%;
        height: auto;
        box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.8), -5px -5px 15px rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transform: rotateY(-8deg) rotateX(4deg);
        transition: transform var(--transition-slow);
    }

    .hero-book-wrapper:hover .hero-book-img {
        transform: rotateY(0deg) rotateX(0deg);
    }

    .gold-badge {
        position: absolute;
        top: -25px;
        right: -30px;
        background: var(--color-gold);
        color: var(--color-ink);
        width: 110px;
        height: 110px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-family: var(--font-ui);
        font-weight: 700;
        font-size: 0.8rem;
        line-height: 1.3;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.4);
        z-index: 10;
        text-transform: uppercase;
        transform: rotate(15deg);
        transition: transform var(--transition-base);
    }

    .hero-book-wrapper:hover .gold-badge {
        transform: rotate(25deg) scale(1.05);
    }

    .quote-block {
        text-align: center;
        padding: 0 1rem;
    }

    .stars {
        color: var(--color-gold);
        font-size: 1.3rem;
        letter-spacing: 3px;
        margin-bottom: 1.2rem;
    }

    .quote-text {
        font-family: var(--font-heading);
        font-size: 1.3rem;
        line-height: 1.5;
        margin-bottom: 1.2rem;
    }

    .quote-author {
        font-family: var(--font-ui);
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--color-gold);
    }

    .quote-sub {
        font-family: var(--font-ui);
        font-size: 0.75rem;
        opacity: 0.7;
        margin-top: 0.3rem;
    }

    .hero-title {
        font-family: var(--font-heading);
        font-size: clamp(2.5rem, 5vw, 4.2rem);
        line-height: 1.1;
        margin-top: 3rem;
        margin-bottom: 1.5rem;
    }

    .countdown-box {
        display: flex;
        gap: 2rem;
        font-family: var(--font-ui);
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    .countdown-item {
        display: flex;
        flex-direction: column;
    }

    .countdown-number {
        font-size: 2rem;
        color: var(--color-gold);
        font-weight: 300;
        line-height: 1;
        margin-bottom: 0.2rem;
    }

    .countdown-label {
        font-size: 0.75rem;
        opacity: 0.6;
    }
</style>

<section class="hero-section">
    <div class="glow-bg"></div>

    <!-- Tangled Thread Background -->
    <div class="hero-thread-container d-none d-lg-block">
        <svg width="100%" height="100%" viewBox="0 0 1000 300" preserveAspectRatio="none">
            <path class="hero-thread-path" vector-effect="non-scaling-stroke"
                d="M -50,150 C 100,50 150,250 300,150 C 400,50 350,-50 450,50 C 550,150 450,250 600,200 C 750,150 700,50 850,100 C 950,150 900,250 1050,150" />
            <path class="hero-thread-path" vector-effect="non-scaling-stroke" style="animation-delay: 0.5s;"
                d="M -50,100 C 50,200 200,50 350,150 C 500,250 450,100 600,100 C 750,100 650,250 800,150 C 900,50 950,200 1050,100" />
        </svg>
    </div>

    <div class="container relative text-center" style="z-index: 2;">

        <!-- Top Eyebrow Line -->
        <div class="d-flex align-items-center justify-content-center mb-5" style="opacity: 0.7;">
            <div style="flex-grow: 1; height: 1px; background: var(--color-ivory); max-width: 150px;"></div>
            <div class="px-4"
                style="font-family: var(--font-ui); text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.2em;">
                The Highly Anticipated Memoir</div>
            <div style="flex-grow: 1; height: 1px; background: var(--color-ivory); max-width: 150px;"></div>
        </div>

        <div class="row align-items-center justify-content-center mb-4">
            <!-- Left Quote (Hidden on mobile) -->
            <div class="col-lg-3 col-md-4 d-none d-md-block">
                <div class="quote-block">
                    <div class="stars">★★★★★</div>
                    <p class="quote-text">"A profoundly moving reflection on the tension between serving others and the
                        courage required to finally choose oneself."</p>
                    <div class="quote-author">Early Reader</div>
                    <div class="quote-sub">Advocate for the Elderly</div>
                </div>
            </div>

            <!-- Center Book -->
            <div class="col-lg-4 col-md-4 col-10 mx-auto z-3">
                <div class="hero-book-wrapper">
                    <div class="gold-badge">Official<br>Launch<br>Event</div>
                    <!-- Assuming book mockup.jpg is in the assets folder as provided -->
                    <img src="assets/images/book mockup.jpg" alt="I Was Lost But I Found Myself Book Cover"
                        class="hero-book-img rounded">
                </div>
            </div>

            <!-- Right Quote (Hidden on mobile) -->
            <div class="col-lg-3 col-md-4 d-none d-md-block">
                <div class="quote-block">
                    <div class="stars">★★★★★</div>
                    <p class="quote-text">"An inspiring testament to resilience, proving that while age and
                        disappointment are real, so is possibility."</p>
                    <div class="quote-author">The Eastleigh Voice</div>
                    <div class="quote-sub">Featured Profile</div>
                </div>
            </div>
        </div>

        <!-- Title & Subtitle -->
        <div class="row justify-content-center mt-4">
            <div class="col-lg-9">
                <h1 class="hero-title">I Was Lost But I Found Myself</h1>
                <p class="lead mx-auto mb-5" style="max-width: 750px; opacity: 0.85; font-weight: 300;">
                    This breakthrough memoir by Lucy Mworia is the definitive story of transitioning from the grueling
                    world of Kenyan politics to championing the rights and dignity of the elderly and finding oneself in
                    the process.
                </p>

                <div class="d-flex justify-content-center flex-wrap gap-4 mb-5">
                    <a href="tickets" class="btn-gold-solid">Reserve Gala Seat</a>
                    <a href="book" class="btn-gold">Explore The Book</a>
                </div>
            </div>
        </div>

        <!-- Event Countdown -->
        <div class="row justify-content-center mt-2">
            <div class="col-auto">
                <div class="countdown-box" id="countdown" style="justify-content: center;">
                    <div class="countdown-item">
                        <span class="countdown-number" id="cd-days">00</span>
                        <span class="countdown-label">Days</span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-number" id="cd-hours">00</span>
                        <span class="countdown-label">Hours</span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-number" id="cd-mins">00</span>
                        <span class="countdown-label">Mins</span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-number" id="cd-secs">00</span>
                        <span class="countdown-label">Secs</span>
                    </div>
                </div>
                <div class="mt-4"
                    style="font-size: 0.85rem; letter-spacing: 0.1em; opacity: 0.7; text-transform: uppercase;">
                    Until October 6th Gala Event
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional sections remain similar but with slightly refined styling -->

<!-- Quote Section -->
<section class="section-padding bg-ivory">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="pull-quote" style="border-left-color: var(--color-ink);">
                    "I had spent years directing my strength outward leading, advocating, and carrying responsibility. I
                    had to learn that a life of service should not require a woman to disappear from her own life."
                </div>
                <p class="text-end"
                    style="font-family: var(--font-ui); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 700; color: var(--color-ink);">
                    - Lucy Mworia
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Teaser Section -->
<section class="section-padding">
    <div class="container">
        <div class="row gy-5">
            <div class="col-md-6 pe-md-5">
                <h2 style="font-size: 2.5rem; color: var(--color-gold);">The Book</h2>
                <div class="hairline-gold"></div>
                <p style="opacity: 0.8; margin-bottom: 2rem;">
                    A profound exploration of transition from the rigorous, often unforgiving arena of Kenyan politics
                    to a life dedicated to championing the rights and dignity of the elderly.
                </p>
                <a href="book" class="btn-gold" style="padding: 0.75rem 1.5rem;">Explore the Memoir</a>
            </div>
            <div class="col-md-6 ps-md-5">
                <h2 style="font-size: 2.5rem; color: var(--color-gold);">The Author</h2>
                <div class="hairline-gold"></div>
                <p style="opacity: 0.8; margin-bottom: 2rem;">
                    Nurse, peace crusader, political aspirant, and founder of the Kenya Pro-Ageing Organisation. Lucy
                    Mworia's story is a testament to resilience and finding new purpose.
                </p>
                <a href="author" class="btn-gold" style="padding: 0.75rem 1.5rem;">Meet Lucy</a>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>