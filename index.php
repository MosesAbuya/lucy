<?php
$extra_css = 'home';
$extra_js = 'home_interactions';
include 'partials/nav.php';
?>

<style>
    /* Hero Section */
    .hero-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        padding-top: 150px;
        padding-bottom: 80px;
        overflow: hidden;
    }

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
        background: radial-gradient(circle, rgba(184, 147, 90, 0.15) 0%, transparent 60%);
        transform: translate(-50%, -50%);
        z-index: 0;
        pointer-events: none;
    }

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

    /* Section 1: Timeline */
    .timeline-container {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 0;
    }

    .timeline-line {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 50%;
        width: 1px;
        background: rgba(184, 147, 90, 0.3);
        transform: translateX(-50%);
    }

    .timeline-item {
        position: relative;
        margin-bottom: 4rem;
        width: 50%;
        padding-right: 3rem;
    }

    .timeline-item:nth-child(even) {
        margin-left: 50%;
        padding-right: 0;
        padding-left: 3rem;
    }

    .timeline-dot {
        position: absolute;
        top: 5px;
        right: -6px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: var(--color-gold);
        box-shadow: 0 0 10px rgba(184, 147, 90, 0.5);
    }

    .timeline-item:nth-child(even) .timeline-dot {
        left: -6px;
        right: auto;
    }

    .timeline-date {
        font-family: var(--font-heading);
        color: var(--color-gold);
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .timeline-text {
        opacity: 0.8;
        font-weight: 300;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .timeline-line {
            left: 20px;
            transform: none;
        }

        .timeline-item {
            width: 100%;
            padding-left: 50px !important;
            padding-right: 0 !important;
            margin-left: 0 !important;
        }

        .timeline-dot {
            left: 15px !important;
            right: auto !important;
        }
    }

    /* Section 2: Weight Infographic */
    .weight-infographic {
        display: flex;
        align-items: center;
        gap: 3rem;
        max-width: 900px;
        margin: 0 auto;
        background: rgba(184, 147, 90, 0.03);
        padding: 3rem;
        border-radius: 12px;
        border: 1px solid rgba(184, 147, 90, 0.2);
    }

    .weight-left {
        flex: 0 0 35%;
        text-align: right;
        border-right: 1px dashed rgba(184, 147, 90, 0.4);
        padding-right: 3rem;
    }

    .weight-right {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 1.2rem;
    }

    .invisible-weight {
        opacity: 0;
        transform: translateX(20px);
        transition: all 0.8s ease;
        font-size: 1.15rem;
        color: var(--color-ivory);
        font-weight: 300;
    }

    .invisible-weight i {
        color: var(--color-gold);
        margin-right: 10px;
        font-size: 1rem;
    }

    .invisible-weight.visible {
        opacity: 0.8 !important;
        transform: translateX(0);
    }

    @media (max-width: 768px) {
        .weight-infographic {
            flex-direction: column;
            text-align: center;
            gap: 2rem;
            padding: 2rem 1.5rem;
        }

        .weight-left {
            text-align: center;
            border-right: none;
            border-bottom: 1px dashed rgba(184, 147, 90, 0.4);
            padding-right: 0;
            padding-bottom: 2rem;
        }

        .invisible-weight {
            transform: translateY(20px);
            font-size: 1.05rem;
        }

        .invisible-weight.visible {
            transform: translateY(0);
        }
    }

    /* Section 3: Quote Carousel */
    .quote-carousel {
        position: relative;
        min-height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quote-slide {
        position: absolute;
        opacity: 0;
        transition: opacity 1s ease;
        text-align: center;
        width: 100%;
        pointer-events: none;
    }

    .quote-slide.active {
        opacity: 1;
        pointer-events: auto;
    }

    .carousel-quote-text {
        font-family: var(--font-heading);
        font-size: clamp(1.5rem, 4vw, 2.5rem);
        color: var(--color-ivory);
        font-style: italic;
        line-height: 1.4;
        margin-bottom: 1.5rem;
    }

    .carousel-nav {
        cursor: pointer;
        color: var(--color-gold);
        font-size: 2rem;
        opacity: 0.5;
        transition: opacity 0.3s;
        padding: 1rem;
    }

    .carousel-nav:hover {
        opacity: 1;
    }

    /* Section 5: Soundtrack */
    .soundtrack-wrapper {
        position: relative;
    }

    .artist-card {
        border: 1px solid rgba(184, 147, 90, 0.2);
        padding: 2.5rem 2rem;
        border-radius: 8px;
        background: rgba(11, 11, 10, 0.7);
        transition: all 0.4s ease;
        height: 100%;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .artist-card::before {
        content: '\f025';
        /* headphones */
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        top: -15px;
        right: -15px;
        font-size: 5rem;
        color: rgba(184, 147, 90, 0.05);
        transform: rotate(-15deg);
        transition: all 0.4s ease;
    }

    .artist-card:hover::before {
        color: rgba(184, 147, 90, 0.15);
        transform: rotate(0deg) scale(1.1);
    }

    .artist-card:hover {
        border-color: var(--color-gold);
        transform: translateY(-5px);
        background: rgba(184, 147, 90, 0.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
    }

    .artist-icon {
        font-size: 2rem;
        color: var(--color-gold);
        margin-bottom: 1rem;
    }

    .artist-name {
        font-family: var(--font-heading);
        color: var(--color-ivory);
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .artist-quote {
        font-style: italic;
        opacity: 0.8;
        font-size: 0.95rem;
        line-height: 1.6;
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="glow-bg"></div>
    <div class="hero-thread-container d-none d-lg-block">
        <svg width="100%" height="100%" viewBox="0 0 1000 300" preserveAspectRatio="none">
            <path class="hero-thread-path" vector-effect="non-scaling-stroke"
                d="M -50,150 C 100,50 150,250 300,150 C 400,50 350,-50 450,50 C 550,150 450,250 600,200 C 750,150 700,50 850,100 C 950,150 900,250 1050,150" />
            <path class="hero-thread-path" vector-effect="non-scaling-stroke" style="animation-delay: 0.5s;"
                d="M -50,100 C 50,200 200,50 350,150 C 500,250 450,100 600,100 C 750,100 650,250 800,150 C 900,50 950,200 1050,100" />
        </svg>
    </div>

    <div class="container relative text-center" style="z-index: 2;">
        <div
            style="background: var(--color-gold); color: var(--color-ink); text-align: center; padding: 0.6rem 1rem; font-family: var(--font-ui); font-size: 0.8rem; letter-spacing: 0.08em; font-weight: 600; text-transform: uppercase; margin: 0 auto 3rem; border-radius: 4px; max-width: 600px;">
            <i class="fas fa-book-open" style="margin-right: 8px;"></i> Finding Lucy is here - KES 2,500 &nbsp;·&nbsp;
            <a href="tickets" style="color: var(--color-ink); text-decoration: underline;">Order your copy →</a>
        </div>

        <div class="d-flex align-items-center justify-content-center mb-5" style="opacity: 0.7;">
            <div style="flex-grow: 1; height: 1px; background: var(--color-ivory); max-width: 150px;"></div>
            <div class="px-4"
                style="font-family: var(--font-ui); text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.2em;">
                A Journey of Wellness, Self-Discovery and Transformation</div>
            <div style="flex-grow: 1; height: 1px; background: var(--color-ivory); max-width: 150px;"></div>
        </div>

        <div class="row align-items-center justify-content-center mb-4">
            <!-- Left Quote (Hidden on mobile) -->
            <div class="col-lg-3 col-md-4 d-none d-md-block">
                <div class="quote-block">
                    <div class="stars">★★★★★</div>
                    <p class="quote-text">"A woman can be powerful in the world and still become disconnected from
                        herself in private."</p>
                    <div class="quote-author">Lucy Mworia</div>
                    <div class="quote-sub">From Finding Lucy, 2026</div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-10 mx-auto z-3">
                <div class="hero-book-wrapper">
                    <div class="gold-badge">Official<br>Launch<br>Event</div>
                    <img src="assets/images/mockup1.png" alt="Finding Lucy Book Cover" class="hero-book-img rounded">
                </div>
            </div>

            <!-- Right Quote (Hidden on mobile) -->
            <div class="col-lg-3 col-md-4 d-none d-md-block">
                <div class="quote-block">
                    <div class="stars">★★★★★</div>
                    <p class="quote-text">"The greatest weight I lost was the belief that decline was the only story
                        left for me."</p>
                    <div class="quote-author">Lucy Mworia</div>
                    <div class="quote-sub">From Finding Lucy, 2026</div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-9">
                <h1 class="hero-title">Finding Lucy</h1>
                <p class="lead mx-auto mb-5" style="max-width: 750px; opacity: 0.85; font-weight: 300;">
                    She built a career across continents. She led, she advocated, she served and somewhere along the
                    way, she stopped appearing on her own list. <em>Finding Lucy</em> is the memoir of a woman who,
                    after a lifetime of showing up for everyone else, finally chose herself. This is that story.
                </p>
                <div class="d-flex justify-content-center flex-wrap gap-4 mb-5">
                    <a href="tickets" class="btn-gold-solid">Reserve Gala Seat</a>
                    <a href="book" class="btn-gold">Explore The Book</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 1: Timeline -->
<section class="section-padding"
    style="background: rgba(184, 147, 90, 0.03); border-top: 1px solid rgba(184, 147, 90, 0.1);">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="font-size: 2.5rem; color: var(--color-gold);">She Led Before She Wrote</h2>
            <p style="opacity: 0.8; font-weight: 300; max-width: 600px; margin: 0 auto;">A snapshot of the life that
                shaped the journey.</p>
        </div>

        <div class="timeline-container">
            <div class="timeline-line"></div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-date">Oceanside, California</div>
                <div class="timeline-text">Over 20 years in the United States - nursing, Mary Kay, the pink Cadillac,
                    and building a life abroad.</div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-date">2012</div>
                <div class="timeline-text">Returns to Kenya permanently. Rents a house in Isiolo. <em>"I was going home.
                        I was going to serve."</em></div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-date">2013, 2017, 2022</div>
                <div class="timeline-text">Three public elections contested - three private acts of courage. A
                    relentless commitment to community leadership.</div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-date">Post-2022</div>
                <div class="timeline-text">A photograph. A turning point. 115kg. A decision is finally made to return to
                    herself.</div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-date">The Journey</div>
                <div class="timeline-text">Walking Bofa Road daily. Intermittent fasting. Dancing in the living room.
                    Establishing the Kilifi Wellness Villa.</div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-date">2026</div>
                <div class="timeline-text"><em>Finding Lucy</em> is published. The launch of a definitive memoir.</div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="journey" class="btn-gold">Discover Her Journey</a>
        </div>
    </div>
</section>

<!-- Section 2: The Weight She Really Lost -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="font-size: 2.5rem; color: var(--color-gold);">The Weight She Really Lost</h2>
        </div>

        <div class="weight-infographic" id="weightInfographic">
            <div class="weight-left">
                <div
                    style="font-family: var(--font-heading); font-size: clamp(4rem, 6vw, 6rem); line-height: 1; color: var(--color-ivory); opacity: 0.9;">
                    30<span style="font-size: 0.6em;">kg</span></div>
                <div
                    style="font-family: var(--font-ui); font-size: 1rem; text-transform: uppercase; letter-spacing: 0.1em; opacity: 0.7; margin-top: 10px;">
                    Physical Weight</div>
            </div>
            <div class="weight-right">
                <div class="invisible-weight"><i class="fas fa-feather-alt"></i> The weight of constantly putting
                    everyone else first.</div>
                <div class="invisible-weight"><i class="fas fa-feather-alt"></i> The weight of "I'll start tomorrow."
                </div>
                <div class="invisible-weight"><i class="fas fa-feather-alt"></i> The weight of staying quiet in rooms
                    where she had things to say.</div>
                <div class="invisible-weight"><i class="fas fa-feather-alt"></i> The weight of a version of herself she
                    stopped recognising.</div>
                <div class="invisible-weight"><i class="fas fa-feather-alt"></i> The weight of believing that decline
                    was the only story left.</div>
            </div>
        </div>

        <div class="text-center mt-5 pt-4">
            <p style="font-size: 1.2rem; font-style: italic; opacity: 0.9;">"The number on the scale was never the real
                story."</p>
            <a href="author" class="btn-gold mt-3">Meet Lucy</a>
        </div>
    </div>
</section>

<!-- Section 3: Quote Carousel -->
<section class="section-padding"
    style="background: rgba(184, 147, 90, 0.05); border-top: 1px solid rgba(184, 147, 90, 0.1); border-bottom: 1px solid rgba(184, 147, 90, 0.1);">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <i class="fas fa-chevron-left carousel-nav" onclick="prevQuote()"></i>

            <div class="quote-carousel w-100 mx-3">
                <div class="quote-slide active">
                    <div class="carousel-quote-text">"I began the journey wanting to lose weight, but somewhere along
                        the way, I found Lucy."</div>
                    <div class="quote-author">Lucy Mworia</div>
                </div>
                <div class="quote-slide">
                    <div class="carousel-quote-text">"I thought I was searching for a smaller body; I was really
                        searching for myself."</div>
                    <div class="quote-author">Lucy Mworia</div>
                </div>
                <div class="quote-slide">
                    <div class="carousel-quote-text">"A woman can be powerful in the world and still become disconnected
                        from herself in private."</div>
                    <div class="quote-author">Lucy Mworia</div>
                </div>
                <div class="quote-slide">
                    <div class="carousel-quote-text">"I did not discover that I had lost myself while standing in front
                        of a mirror. I discovered it in a photograph."</div>
                    <div class="quote-author">Lucy Mworia</div>
                </div>
                <div class="quote-slide">
                    <div class="carousel-quote-text">"The greatest weight I lost was the belief that decline was the
                        only story left for me."</div>
                    <div class="quote-author">Lucy Mworia</div>
                </div>
                <div class="quote-slide">
                    <div class="carousel-quote-text">"This is not merely a story of weight loss. It is the story of a
                        woman returning to herself."</div>
                    <div class="quote-author">Lucy Mworia</div>
                </div>
            </div>

            <i class="fas fa-chevron-right carousel-nav" onclick="nextQuote()"></i>
        </div>
    </div>
</section>

<!-- Section 5: Soundtrack -->
<section class="section-padding">
    <div class="container soundtrack-wrapper">
        <div class="text-center mb-5 pb-3">
            <h2 style="font-size: 2.5rem; color: var(--color-gold);">The Soundtrack of Her Journey</h2>
            <p style="opacity: 0.8; font-weight: 300; max-width: 600px; margin: 0 auto;">In the living room, alone, Lucy
                danced. These are the voices that moved her.</p>
        </div>

        <div class="row gy-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="artist-card">
                    <i class="fas fa-music artist-icon"></i>
                    <div class="artist-name">Miriam Makeba</div>
                    <div class="artist-quote">"Her voice crossed borders, generations and moods."</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="artist-card">
                    <i class="fas fa-record-vinyl artist-icon"></i>
                    <div class="artist-name">Yvonne Chaka Chaka</div>
                    <div class="artist-quote">"Power across generations. You could not stay still."</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="artist-card">
                    <i class="fas fa-guitar artist-icon"></i>
                    <div class="artist-name">Joseph Kamaru</div>
                    <div class="artist-quote">"Over 1,000 songs. He put rhythm under your feet and quietly taught you
                        something of value."</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="artist-card">
                    <i class="fas fa-headphones-alt artist-icon"></i>
                    <div class="artist-name">Tabu Ley</div>
                    <div class="artist-quote">"Soulful and searching - reached beyond the beat and asked questions of
                        the heart."</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="artist-card">
                    <i class="fas fa-compact-disc artist-icon"></i>
                    <div class="artist-name">Nakei Nairobi</div>
                    <div class="artist-quote">"(Mbiliabel). Designed to make you move your waist. Not asking politely."
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Pledge Teaser -->
<section class="section-padding"
    style="background: rgba(184, 147, 90, 0.05); border-top: 1px solid rgba(184, 147, 90, 0.1);">
    <div class="container text-center">
        <h2 style="font-size: 2.5rem; color: var(--color-gold); margin-bottom: 1.5rem;">She Chose Herself - Now It's
            Your Turn</h2>
        <p
            style="opacity: 0.9; font-weight: 300; max-width: 700px; margin: 0 auto 3rem; font-size: 1.2rem; line-height: 1.6;">
            Thousands of women are carrying weight that no scale can measure. This is your invitation to put yourself
            back on your own list.
        </p>
        <a href="pledge" class="btn-gold-solid px-5 py-3" style="font-size: 1.1rem;">Take the Pledge</a>
    </div>
</section>

<!-- A Message from Lucy (Video Embed) -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 style="font-size: 2.5rem; color: var(--color-gold);">A Message from Lucy</h2>
                <div class="hairline-gold mx-auto"></div>
                <p style="opacity: 0.8; font-weight: 300;">Listen to Lucy's thoughts on pro-ageing, advocacy, and
                    finding purpose.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="ratio ratio-16x9 shadow" style="border: 1px solid var(--color-gold);">
                    <iframe src="https://www.youtube.com/embed/PxHE_bk-rhE" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Press & Media Mentions -->
<section class="section-padding" style="background: rgba(184, 147, 90, 0.02);">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="font-size: 2rem; color: var(--color-gold);">As Featured On</h2>
        </div>
        <div class="row justify-content-center align-items-center opacity-75">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <h4 style="font-family: var(--font-heading); font-size: 1.8rem; letter-spacing: 0.05em;">CITIZEN TV</h4>
            </div>
            <div class="col-md-2 text-center mb-4 mb-md-0 d-none d-md-block">
                <div style="width: 1px; height: 40px; background: var(--color-gold); margin: 0 auto;"></div>
            </div>
            <div class="col-md-4 text-center">
                <h4 style="font-family: var(--font-heading); font-size: 1.8rem; letter-spacing: 0.05em;">SPICE FM</h4>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter / Community -->
<!-- Made transparent so it blends seamlessly into the footer -->
<section class="section-padding bg-transparent">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <h2 style="font-size: 2.2rem; color: var(--color-gold); margin-bottom: 1rem;">Join The Community</h2>
                <p style="opacity: 0.8; font-weight: 300; margin-bottom: 2rem;">Sign up to receive updates about the
                    book launch, exclusive excerpts, and wellness insights from Lucy.</p>

                <form id="subscribeForm" onsubmit="submitSubscribe(event)" class="d-flex flex-column flex-md-row gap-2">
                    <input type="email" id="subscribeEmail" class="form-control" placeholder="Your email address"
                        style="background: transparent; color: #fff; border: 1px solid var(--color-gold); padding: 0.75rem 1rem;"
                        required>
                    <button type="submit" id="btnSubscribe" class="btn-gold-solid">Subscribe</button>
                </form>
                <script>
                    function submitSubscribe(e) {
                        e.preventDefault();
                        const btn = document.getElementById('btnSubscribe');
                        btn.disabled = true;
                        btn.innerText = 'Subscribing...';

                        const payload = new FormData();
                        payload.append('email', document.getElementById('subscribeEmail').value);

                        fetch('api/subscribe.php', {
                            method: 'POST',
                            body: payload
                        })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    showPopup('success', 'Subscribed', 'Thank you for joining our community.');
                                    document.getElementById('subscribeForm').reset();
                                } else {
                                    showPopup('error', 'Error', data.error || 'Subscription failed.');
                                }
                            })
                            .catch(err => {
                                showPopup('error', 'Network Error', 'Please check your connection and try again.');
                            })
                            .finally(() => {
                                btn.disabled = false;
                                btn.innerText = 'Subscribe';
                            });
                    }
                </script>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>