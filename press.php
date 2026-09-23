<?php
$extra_css = 'press';
include 'partials/nav.php';
?>

<style>
    .press-hero {
        padding-top: 150px;
        padding-bottom: 3rem;
        position: relative;
        text-align: center;
    }

    .press-card {
        background: rgba(184, 147, 90, 0.03);
        border: 1px solid rgba(184, 147, 90, 0.15);
        padding: 2rem;
        height: 100%;
        transition: all var(--transition-base);
    }

    .press-card:hover {
        background: rgba(184, 147, 90, 0.08);
        border-color: var(--color-gold);
    }
</style>

<section class="press-hero">
    <div class="container">
        <span class="eyebrow mb-3">Press & Media</span>
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 5vw, 4.5rem); margin-bottom: 1.5rem;">Press
            Room</h1>
        <p class="lead mx-auto" style="max-width: 600px; opacity: 0.8; font-weight: 300;">
            Media resources, official portraits, and contact information for journalists and broadcasters regarding Lucy
            Mworia and <em>Finding Lucy</em>.
        </p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row mb-5 pb-4 border-bottom border-secondary border-opacity-25">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h3 style="color: var(--color-gold); font-family: var(--font-heading);">Official Bio</h3>
            </div>
            <div class="col-lg-8">
                <p style="opacity: 0.9; font-weight: 300; line-height: 1.8;">
                    Lucy Mworia is a Kenyan development professional, advocate, and wellness storyteller whose work has
                    centred on leadership, community development, and the dignity and inclusion of older persons.
                </p>
                <p style="opacity: 0.9; font-weight: 300; line-height: 1.8;">
                    She holds a Master of Development Studies (MDS), specialising in Organisation Development, and a
                    Bachelor's degree in Leadership and Management. She trained in nursing in the United States, where
                    she lived for over twenty years before returning to Kenya in 2012 to pursue public service. She is
                    the founder of the Kenya Pro-Ageing Organisation and the author of <em>Finding Lucy: A Journey of
                        Wellness, Self-Discovery and Transformation.</em>
                </p>
            </div>
        </div>

        <div class="row mb-5 pb-4 border-bottom border-secondary border-opacity-25">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h3 style="color: var(--color-gold); font-family: var(--font-heading);">High-Res Photos</h3>
                <p style="opacity: 0.7; font-size: 0.9rem;">Right-click to save images for publication.</p>
            </div>
            <div class="col-lg-8">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <img src="assets/images/lucy/lucy4 portrait.jpg" class="img-fluid rounded mb-2"
                            alt="Lucy Mworia Official Portrait 1">
                        <div style="font-family: var(--font-ui); font-size: 0.8rem; opacity: 0.7;">Official Portrait -
                            Print</div>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/images/lucy/lucy mworia 2.jpg" class="img-fluid rounded mb-2"
                            alt="Lucy Mworia Official Portrait 2">
                        <div style="font-family: var(--font-ui); font-size: 0.8rem; opacity: 0.7;">Official Portrait -
                            Web</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5 pb-4 border-bottom border-secondary border-opacity-25">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h3 style="color: var(--color-gold); font-family: var(--font-heading);">As Featured On</h3>
            </div>
            <div class="col-lg-8">
                <div class="row gy-4 text-center">
                    <div class="col-md-6">
                        <div class="press-card">
                            <h4
                                style="font-family: var(--font-heading); font-size: 1.8rem; letter-spacing: 0.05em; margin-bottom: 0;">
                                CITIZEN TV</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="press-card">
                            <h4
                                style="font-family: var(--font-heading); font-size: 1.8rem; letter-spacing: 0.05em; margin-bottom: 0;">
                                SPICE FM</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center mt-5 pt-4">
            <div class="col-12">
                <h3 style="color: var(--color-gold); font-family: var(--font-heading); margin-bottom: 1.5rem;">Interview
                    Requests</h3>
                <p style="opacity: 0.8; font-weight: 300; max-width: 500px; margin: 0 auto 2rem;">
                    For all media inquiries, interview requests, and speaking engagements, please use our dedicated
                    media form or email us directly.
                </p>
                <div class="d-flex justify-content-center gap-4">
                    <a href="media.php" class="btn-gold-solid">Submit Media Request</a>
                    <a href="mailto:info@lucymworia.com" class="btn-gold">Email Press Office</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>