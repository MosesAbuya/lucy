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
        filter: grayscale(20%) contrast(1.1);
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
        line-height: 1.8;
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
                    <!-- Updated Hero Image -->
                    <img src="assets/images/lucy/lucy mworia 2.jpg" alt="Lucy Mworia Portrait" class="author-portrait">
                </div>
            </div>

            <div class="col-lg-6 offset-lg-1">
                <span class="eyebrow">The Author</span>
                <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 5vw, 4.5rem); margin-bottom: 2rem;">
                    Lucy Mworia</h1>

                <div class="bio-text">
                    <p>
                        Lucy Mworia is a Kenyan development professional, advocate, and wellness storyteller whose work
                        has centred on leadership, community development, and the dignity and inclusion of older
                        persons.
                    </p>
                    <p>
                        She holds a Master of Development Studies (MDS), specialising in Organisation Development, and a
                        Bachelor's degree in Leadership and Management from St. Paul's University in Kenya. She also
                        trained in nursing in the United States, where she lived for over twenty years.
                    </p>
                    <p>
                        It was in America that she built a life - nursing, selling Mary Kay, driving the famous pink
                        Cadillac, and raising a family. But in 2012, she felt the pull to return. She packed up, moved
                        back to Kenya, and rented a house in Isiolo. "I was going home," she said. "I was going to
                        serve."
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
                    "I did not discover that I had lost myself while standing in front of a mirror. I discovered it in a
                    photograph."
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-ivory">
    <div class="container">
        <div class="row gy-5 align-items-center">
            <div class="col-lg-6 order-2 order-lg-1 bio-text text-dark">

                <h2 style="color: var(--color-ink); margin-bottom: 2rem; font-family: var(--font-heading);">Three
                    Campaigns</h2>
                <p style="color: var(--color-ink);">
                    Lucy contested elections in 2013, 2017, and 2022. Her campaign companion for the final run was her
                    longtime friend Mama Safi - who, by some unstated agreement, also became her driver and campaign
                    manager. By the last campaign, money was tight enough that they called Mama Safi's children to help
                    pay for petrol. On another drive toward Meru, the engine overheated. Lucy wrote about it plainly: "I
                    knew how to do the public part." That sentence, she said, would matter later.
                </p>

                <h2
                    style="color: var(--color-ink); margin-bottom: 2rem; margin-top: 4rem; font-family: var(--font-heading);">
                    The Wardrobe She Carried Across an Ocean</h2>
                <p style="color: var(--color-ink);">
                    When Lucy returned to Kenya, she sold almost everything - but she kept her beautiful clothes and
                    shoes. Including six pairs of four-inch heels she loved because she knew exactly which dress went
                    with which pair. Years later, at 115 kilograms, those heels stopped fitting as her knees worsened.
                </p>
                <p style="color: var(--color-ink);">
                    It was a visit to Dr. Maryam Badamana in Kilifi that changed everything. "Lucy, you need to lose
                    weight, and yes, you can do it. You just need to make a personal decision." What followed was not a
                    diet, but a decision to return to herself. She began walking ten kilometres daily along Bofa Road
                    and adopted OMAD (One Meal a Day).
                </p>

                <h2
                    style="color: var(--color-ink); margin-bottom: 2rem; margin-top: 4rem; font-family: var(--font-heading);">
                    The Woman She Found</h2>
                <p style="color: var(--color-ink);">
                    She went on to found the <strong>Kenya Pro-Ageing Organisation</strong>, advocating for the rights
                    of older persons under Article 57 of the Constitution. She established the <strong>Kilifi Wellness &
                        Holiday Villa</strong>. And she finally wore those heels again.
                </p>
                <p style="color: var(--color-ink);">
                    Lucy lives with a deep belief that ageing should not mean surrendering curiosity, joy, or purpose.
                    She continues to walk, dance, learn, and serve.
                </p>

                <div class="mt-5 pt-4" style="border-top: 1px solid rgba(0,0,0,0.1);">
                    <span class="eyebrow" style="color: var(--color-ink);">Connect with Lucy</span>
                    <div class="d-flex gap-4 mt-3">
                        <a href="https://www.facebook.com/lucy.mworia/" target="_blank" class="text-dark fs-4"
                            style="transition: color 0.3s;" onmouseover="this.style.color='var(--color-gold)'"
                            onmouseout="this.style.color='var(--color-ink)'"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://ke.linkedin.com/in/lucy-mworia-31aa1a264" target="_blank"
                            class="text-dark fs-4" style="transition: color 0.3s;"
                            onmouseover="this.style.color='var(--color-gold)'"
                            onmouseout="this.style.color='var(--color-ink)'"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.youtube.com/@lucymworianetwork" target="_blank" class="text-dark fs-4"
                            style="transition: color 0.3s;" onmouseover="this.style.color='var(--color-gold)'"
                            onmouseout="this.style.color='var(--color-ink)'"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1 order-1 order-lg-2">
                <div style="position: sticky; top: 120px;">
                    <img src="assets/images/lucy/lucy1.jpg" alt="Lucy Mworia smiling" class="img-fluid rounded mb-4"
                        style="box-shadow: 15px 15px 0 var(--color-gold);">
                    <img src="assets/images/lucy/lucy2.jpg" alt="Event speaking" class="img-fluid rounded"
                        style="box-shadow: 15px 15px 0 var(--color-gold);">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Blending Section -->
<section class="bg-transparent" style="padding-top: 3rem;"></section>

<?php include 'partials/footer.php'; ?>