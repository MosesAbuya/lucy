<?php include 'partials/nav.php'; ?>

<style>
.author-hero {
    padding-top: 120px;
    padding-bottom: 4rem;
}

.portrait-wrapper {
    position: relative;
    padding: 1rem;
}

.portrait-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 80%;
    height: 100%;
    border: 1px solid var(--color-gold);
    opacity: 0.3;
    z-index: 0;
}

.author-portrait {
    position: relative;
    z-index: 1;
    width: 100%;
    height: auto;
    filter: grayscale(80%) contrast(1.1);
    transition: filter var(--transition-slow);
}

.author-portrait:hover {
    filter: grayscale(0%) contrast(1);
}

.bio-text p {
    margin-bottom: 1.5rem;
    font-size: 1.1rem;
    opacity: 0.8;
    font-weight: 300;
}

.big-quote {
    font-family: var(--font-heading);
    font-size: clamp(2rem, 4vw, 3.5rem);
    line-height: 1.2;
    color: var(--color-gold);
    margin: 4rem 0;
}
</style>

<section class="author-hero">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5">
                <div class="portrait-wrapper">
                    <!-- Referencing local image -->
                    <img src="assets/images/lucy.png" alt="Lucy Mworia Portrait" class="author-portrait">
                </div>
            </div>
            
            <div class="col-lg-6 offset-lg-1">
                <span class="eyebrow">The Author</span>
                <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 5vw, 4.5rem); margin-bottom: 2rem;">Lucy Mworia</h1>
                
                <div class="bio-text">
                    <p>
                        Lucy Mworia is a Kenyan development professional, advocate, community leader, and wellness storyteller whose work has centered on leadership, social development, and the dignity of others.
                    </p>
                    <p>
                        She holds a Master of Development Studies (MDS), specializing in Organisation Development, and a Bachelor's Degree in Leadership and Management from St Paul's University. She also trained in nursing and psychology in the United States, managing specialized care at Sonata Hospice.
                    </p>
                    <p>
                        Across her public life, Lucy has worked in healthcare, community development, and public service. For a decade, she navigated the murky, male-dominated world of Kenyan politics, making a 2013 run for Isiolo Woman Representative and two subsequent bids for Isiolo North MP.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Thread Transition -->
<div class="container my-2">
    <svg width="100%" height="40" viewBox="0 0 1000 40" preserveAspectRatio="none">
        <path class="scroll-thread thread-path" d="M 0,20 L 1000,20" />
    </svg>
</div>

<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <div class="big-quote">
                    "I thought I was trying to get the old Lucy back. I was not going backwards at all."
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-ivory">
    <div class="container">
        <div class="row gy-5 align-items-center">
            <div class="col-lg-6 order-2 order-lg-1 bio-text text-dark">
                <h2 style="color: var(--color-ink); margin-bottom: 2rem;">From Politics to Personal Reclamation</h2>
                <p style="color: var(--color-ink);">
                    The disappointment of the 2022 elections became a catalyst for profound personal awakening. At 115 kilograms, with painful knees and poor sleep, Lucy was told by many that her decline was simply part of ageing. She refused to accept that story.
                </p>
                <p style="color: var(--color-ink);">
                    Through extraordinary discipline—embracing One Meal a Day (OMAD), walking ten kilometers daily along Bofa Road in Kilifi, and dancing in her living room—she lost 30 kilograms and reclaimed her health.
                </p>
                <p style="color: var(--color-ink);">
                    This private physical reclamation mirrored a public one. She realized that she had spent years directing her strength outward. Transitioning from the ballot box to social advocacy, she founded the <strong>Kenya Pro-Ageing Organisation</strong> to fight for the rights, inclusion, and dignity of older persons under Article 57 of the Constitution.
                </p>
                <p style="color: var(--color-ink);">
                    Lucy lives with a deep belief that ageing should not mean surrendering curiosity, joy, or purpose. She continues to walk, dance, learn, serve, and—when the occasion deserves it—wear her heels.
                </p>
                
                <div class="mt-5">
                    <span class="eyebrow" style="color: var(--color-ink);">Connect with Lucy</span>
                    <div class="d-flex gap-4 mt-3">
                        <a href="https://www.facebook.com/lucy.mworia/" target="_blank" class="text-dark fs-4 hover-gold"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://ke.linkedin.com/in/lucy-mworia-31aa1a264" target="_blank" class="text-dark fs-4 hover-gold"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 offset-lg-1 order-1 order-lg-2">
                <!-- Abstract visual representation -->
                <div style="width: 100%; height: 400px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(11,11,10,0.1);">
                    <svg width="150" height="150" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="48" fill="none" stroke="var(--color-gold)" stroke-width="1" />
                        <circle cx="50" cy="50" r="30" fill="none" stroke="var(--color-ink)" stroke-width="1" opacity="0.3" />
                        <path class="scroll-thread thread-path" d="M -20,50 L 120,50" stroke="var(--color-gold)" stroke-width="1.5" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
