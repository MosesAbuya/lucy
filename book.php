<?php include 'partials/nav.php'; ?>

<style>
.book-hero {
    padding-top: 120px;
    padding-bottom: 4rem;
}

.book-cover-container {
    position: relative;
    box-shadow: 0 20px 50px rgba(0,0,0,0.5);
    background-color: var(--color-ink);
}

.book-cover-img {
    width: 100%;
    height: auto;
    display: block;
    border: 1px solid rgba(243, 238, 228, 0.1);
}

.book-title-display {
    font-family: var(--font-heading);
    font-size: clamp(2.5rem, 5vw, 4rem);
    color: var(--color-ivory);
    margin-bottom: 1.5rem;
    line-height: 1.1;
}

.theme-card {
    border-left: 1px solid var(--color-gold);
    padding-left: 1.5rem;
    margin-bottom: 3rem;
}
</style>

<section class="book-hero">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5">
                <div class="book-cover-container">
                    <!-- Referencing local image -->
                    <img src="assets/images/Front Cover - Lucy Mworia.png" alt="I Was Lost But I Found Myself Book Cover" class="book-cover-img">
                </div>
            </div>
            
            <div class="col-lg-6 offset-lg-1">
                <span class="eyebrow">The Memoir</span>
                <h1 class="book-title-display">I Was Lost But I Found Myself</h1>
                <p class="lead mb-5" style="opacity: 0.9; font-weight: 300;">
                    A candid, powerful reflection on the harsh realities of Kenyan politics, the pain of loss, and the profound journey to reclaiming one's life.
                </p>
                
                <div class="d-flex flex-wrap gap-3">
                    <a href="tickets" class="btn-gold-solid">Buy Book & Gala Ticket</a>
                    <a href="#synopsis" class="btn-gold">Read Synopsis</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Thread Transition -->
<div class="container my-5">
    <svg width="100%" height="40" viewBox="0 0 1000 40" preserveAspectRatio="none">
        <path class="scroll-thread thread-path" d="M 0,20 Q 500,-10 1000,20" />
    </svg>
</div>

<section id="synopsis" class="section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 style="color: var(--color-gold); margin-bottom: 2rem;">About the Book</h2>
                
                <div style="font-size: 1.1rem; opacity: 0.8; font-weight: 300;">
                    <p class="mb-4">
                        Lucy Mworia knew how to show up for other people. She had led, advocated, served, raised a family, carried responsibility, and walked into important rooms with confidence. For a decade, she navigated the murky, male-dominated world of Kenyan politics, battling discriminatory cultural norms and making repeated bids for public office.
                    </p>
                    <p class="mb-4">
                        But this is not just a story of political defeat. It is a story of transformation.
                    </p>
                    <p class="mb-4">
                        Then one day, after a meeting to advocate for the rights of older persons, she saw herself in a photograph and confronted a quieter truth: somewhere along the way, she had stopped feeling like herself. The disappointment of the 2022 elections catalyzed a profound shift.
                    </p>
                    <p>
                        <em>"I Was Lost But I Found Myself"</em> is a warm, candid, and often humorous story about self-trust, ageing, identity, and the complicated guilt women can feel when they finally include themselves among the people they care for. For the leader, the caregiver, and the woman beginning again, Lucy's story offers a simple invitation: choose yourself.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-ivory">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2 style="color: var(--color-ink);">Key Themes</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="theme-card" style="border-color: var(--color-ink);">
                    <h3 style="font-size: 1.5rem; color: var(--color-ink);">Politics & Perseverance</h3>
                    <p style="opacity: 0.8; color: var(--color-ink);">Navigating a patriarchal political landscape in Isiolo, facing betrayals, and finding the courage to run repeatedly against the odds.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="theme-card" style="border-color: var(--color-ink);">
                    <h3 style="font-size: 1.5rem; color: var(--color-ink);">Finding Purpose in Loss</h3>
                    <p style="opacity: 0.8; color: var(--color-ink);">How the disappointment of the 2022 elections became the catalyst for a profound personal awakening—realizing that usefulness shouldn't be the only way a woman knows her value.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="theme-card" style="border-color: var(--color-ink);">
                    <h3 style="font-size: 1.5rem; color: var(--color-ink);">The Elderly & Forgotten</h3>
                    <p style="opacity: 0.8; color: var(--color-ink);">Shining a light on the neglect of Kenya's senior citizens, shifting advocacy from the ballot box to the legislature, and demanding dignity.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <span class="eyebrow mb-4">Excerpt</span>
                <div class="pull-quote" style="border-left: none; text-align: center; margin: 0 auto;">
                    "The political rallies were loud, but the silence after the ballots were counted was deafening. It was in that silence I realised how much of myself I had given away. I had become so good at being needed that I forgot I was also someone worth caring for."
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
