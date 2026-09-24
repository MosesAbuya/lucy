<?php
$extra_css = 'journey';
include 'partials/nav.php';
?>

<style>
    .journey-hero {
        padding-top: 150px;
        padding-bottom: 5rem;
        background: linear-gradient(to bottom, rgba(11, 11, 10, 0.9), rgba(11, 11, 10, 1)), url('assets/images/lucy/lucy3 portrait.jpg') center/cover;
        text-align: center;
    }

    .journey-step {
        display: flex;
        flex-direction: column;
        gap: 3rem;
        margin-bottom: 6rem;
        align-items: center;
    }

    @media (min-width: 992px) {
        .journey-step {
            flex-direction: row;
        }

        .journey-step:nth-child(even) {
            flex-direction: row-reverse;
        }
    }

    .journey-text {
        flex: 1;
    }

    .journey-image {
        flex: 1;
        position: relative;
        max-width: 450px;
        margin: 0 auto;
    }

    .journey-image img {
        width: 100%;
        border-radius: 8px;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(184, 147, 90, 0.2);
    }

    .journey-image::after {
        content: '';
        position: absolute;
        top: 20px;
        left: -20px;
        right: 20px;
        bottom: -20px;
        border: 1px solid var(--color-gold);
        border-radius: 8px;
        z-index: -1;
        opacity: 0.3;
    }

    .journey-step:nth-child(even) .journey-image::after {
        left: 20px;
        right: -20px;
    }

    .step-number {
        font-family: var(--font-heading);
        font-size: 5rem;
        color: rgba(184, 147, 90, 0.15);
        line-height: 1;
        position: absolute;
        top: -40px;
        left: -20px;
        z-index: -1;
    }
</style>

<section class="journey-hero">
    <div class="container relative z-2">
        <span class="eyebrow mb-3 d-block">The Journey</span>
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 6vw, 5rem); margin-bottom: 1rem;">Lost to
            Found</h1>
        <p class="lead mx-auto" style="max-width: 700px; opacity: 0.8; font-weight: 300;">
            This is not just a story of weight loss. It is the story of a woman who built a life for everyone else, lost
            herself in the process, and then fought bravely to get her back.
        </p>
    </div>
</section>

<section class="section-padding pt-5">
    <div class="container">

        <div class="journey-step">
            <div class="journey-text position-relative">
                <div class="step-number">01</div>
                <h3
                    style="font-family: var(--font-heading); color: var(--color-gold); font-size: 2rem; margin-bottom: 1.5rem;">
                    The Woman Who Led</h3>
                <p style="font-weight: 300; opacity: 0.9; line-height: 1.8; font-size: 1.1rem; margin-bottom: 1rem;">
                    For twenty years, Lucy Mworia lived in the United States, raising a family, nursing the sick, and
                    climbing the corporate ladder. She drove the pink Mary Kay Cadillac. She was successful by every
                    metric society respects.
                </p>
                <p style="font-weight: 300; opacity: 0.9; line-height: 1.8; font-size: 1.1rem;">
                    In 2012, she returned to Kenya to serve. Through three grueling election cycles (2013, 2017, and
                    2022), she poured every ounce of her energy into her community in Isiolo. She advocated for the
                    voiceless. She was the strong one. But in the quiet moments, a different reality was taking shape.
                </p>
            </div>
            <div class="journey-image">
                <img src="assets/images/lucy.png" alt="Lucy leading and speaking">
            </div>
        </div>

        <div class="journey-step">
            <div class="journey-text position-relative">
                <div class="step-number">02</div>
                <h3
                    style="font-family: var(--font-heading); color: var(--color-gold); font-size: 2rem; margin-bottom: 1.5rem;">
                    The Disappearance</h3>
                <p style="font-weight: 300; opacity: 0.9; line-height: 1.8; font-size: 1.1rem; margin-bottom: 1rem;">
                    "A woman can be powerful in the world and still become disconnected from herself in private."
                </p>
                <p style="font-weight: 300; opacity: 0.9; line-height: 1.8; font-size: 1.1rem;">
                    The weight crept on slowly. It wasn't just physical -it was the weight of unsaid words, postponed
                    dreams, and the heavy burden of being "Mama Safi," the one everyone relied on. By the end of 2022,
                    she weighed 115 kilograms. Her knees ached. Her breathing was labored. But more painfully, she
                    looked at a photograph of herself and realized she didn't recognize the woman looking back.
                </p>
            </div>
            <div class="journey-image">
                <img src="assets/images/lucy/lucy5 portrait.jpg" alt="A moment of reflection">
            </div>
        </div>

        <div class="journey-step">
            <div class="journey-text position-relative">
                <div class="step-number">03</div>
                <h3
                    style="font-family: var(--font-heading); color: var(--color-gold); font-size: 2rem; margin-bottom: 1.5rem;">
                    The Reclamation</h3>
                <p style="font-weight: 300; opacity: 0.9; line-height: 1.8; font-size: 1.1rem; margin-bottom: 1rem;">
                    She decided she was not done. Drawing a line in the sand, Lucy began the slow, unglamorous work of
                    choosing herself.
                </p>
                <p style="font-weight: 300; opacity: 0.9; line-height: 1.8; font-size: 1.1rem;">
                    It started with walking Bofa Road in Kilifi, one kilometer at a time. It meant confronting her
                    relationship with food, embracing intermittent fasting, and dancing alone in her living room to the
                    sounds of Miriam Makeba and Joseph Kamaru. Step by step, she shed 30 kilograms. But more
                    importantly, she shed the belief that her best years were behind her.
                </p>
            </div>
            <div class="journey-image">
                <img src="assets/images/lucy/lucy on a beach.jpg" alt="Walking and health">
            </div>
        </div>

        <div class="journey-step">
            <div class="journey-text position-relative">
                <div class="step-number">04</div>
                <h3
                    style="font-family: var(--font-heading); color: var(--color-gold); font-size: 2rem; margin-bottom: 1.5rem;">
                    The Wellness Villa</h3>
                <p style="font-weight: 300; opacity: 0.9; line-height: 1.8; font-size: 1.1rem; margin-bottom: 1rem;">
                    Healing is rarely meant to be done alone. Out of her own transformation, the Kilifi Wellness Villa
                    was born.
                </p>
                <p style="font-weight: 300; opacity: 0.9; line-height: 1.8; font-size: 1.1rem;">
                    A sanctuary for those seeking to pause, reflect, and reset. The Villa embodies Lucy's philosophy:
                    that health is holistic, age is an asset, and it is never too late to rewrite your story. Today, she
                    uses her journey to advocate for pro-ageing through KPAO (Kenya Pro-Ageing Organisation), proving
                    that life after sixty can be vibrant, purposeful, and profoundly joyful.
                </p>
                <a href="book" class="btn-gold-solid mt-4">Read the Full Story</a>
            </div>
            <div class="journey-image">
                <img src="assets/images/lucy/lucy smiling.jpg" alt="Wellness Villa">
            </div>
        </div>

    </div>
</section>

<!-- Make the last section blend with footer -->
<section class="section-padding bg-transparent text-center">
    <div class="container">
        <h3 style="color: var(--color-gold); font-family: var(--font-heading); margin-bottom: 2rem;">Ready to take your
            own journey?</h3>
        <a href="pledge" class="btn-gold px-5 py-3">Take the Pledge</a>
    </div>
</section>

<?php include 'partials/footer.php'; ?>