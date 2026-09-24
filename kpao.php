<?php
$extra_css = 'kpao';
include 'partials/nav.php';
?>

<style>
.kpao-hero {
    padding-top: 150px;
    padding-bottom: 5rem;
    position: relative;
    overflow: hidden;
}

.kpao-hero::after {
    content: '';
    position: absolute;
    bottom: -50px;
    right: -50px;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(184, 147, 90, 0.1) 0%, transparent 70%);
    pointer-events: none;
}

.mission-box {
    background: rgba(184, 147, 90, 0.05);
    border: 1px solid rgba(184, 147, 90, 0.2);
    padding: 3rem;
    border-radius: 4px;
}
</style>

<section class="kpao-hero">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <span class="eyebrow mb-3">Our Mission</span>
                <h1 style="font-family: var(--font-heading); font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 1.5rem;">Kenya Pro-Ageing Organisation</h1>
                <p class="lead" style="opacity: 0.8; font-weight: 300; max-width: 500px;">
                    Advocating for the rights, dignity, and inclusion of older persons across Kenya. We believe that ageing is a privilege, not a decline.
                </p>
                <div class="mt-4">
                    <a href="#article57" class="btn-gold">Read Article 57</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="assets/images/lucy/lucy with old man.jpg" alt="Lucy Mworia with community elder" class="img-fluid rounded" style="box-shadow: 15px 15px 0 rgba(184,147,90,0.2);">
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-ivory text-dark" id="article57">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 style="font-family: var(--font-heading); font-size: 2.5rem; margin-bottom: 2rem;">Rooted in the Constitution</h2>
                <div class="hairline-gold mx-auto mb-4"></div>
                <p class="fs-5" style="font-weight: 300; line-height: 1.8;">
                    The foundation of our work is <strong>Article 57 of the Constitution of Kenya (2010)</strong>, which mandates that the State shall take measures to ensure the rights of older persons:
                </p>
                
                <div class="mt-5 p-4 text-start" style="border-left: 3px solid var(--color-gold); background: rgba(184,147,90,0.05);">
                    <ul class="list-unstyled mb-0" style="font-family: var(--font-ui); font-size: 1rem; line-height: 1.8;">
                        <li class="mb-3"><strong>(a)</strong> To fully participate in the affairs of society;</li>
                        <li class="mb-3"><strong>(b)</strong> To pursue their personal development;</li>
                        <li class="mb-3"><strong>(c)</strong> To live in dignity and respect and be free from abuse; and</li>
                        <li><strong>(d)</strong> To receive reasonable care and assistance from their family and the State.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5">
                <div class="row gy-3">
                    <div class="col-6">
                        <img src="assets/images/lucy/lucy with old woman.jpg" class="img-fluid rounded" alt="Lucy with older woman">
                    </div>
                    <div class="col-6 mt-4">
                        <img src="assets/images/lucy/lucy with old woman 2.jpg" class="img-fluid rounded" alt="Lucy advocating for older woman">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <h2 style="font-family: var(--font-heading); font-size: 2.5rem; color: var(--color-gold); margin-bottom: 1.5rem;">What We Do</h2>
                
                <p style="opacity: 0.8; font-weight: 300; margin-bottom: 2rem;">
                    Through grassroots mobilization, legal advocacy, and community outreach, the Kenya Pro-Ageing Organisation works to dismantle ageism and create systemic support for the elderly in our communities.
                </p>
                
                <div class="d-flex mb-4">
                    <div class="me-3 mt-1">
                        <i class="fas fa-bullhorn text-gold fs-4"></i>
                    </div>
                    <div>
                        <h4 class="mb-2" style="font-size: 1.2rem;">Advocacy & Awareness</h4>
                        <p style="opacity: 0.7; font-size: 0.95rem;">Educating communities about the rights of older persons and combating elder abuse.</p>
                    </div>
                </div>
                
                <div class="d-flex mb-4">
                    <div class="me-3 mt-1">
                        <i class="fas fa-heart text-gold fs-4"></i>
                    </div>
                    <div>
                        <h4 class="mb-2" style="font-size: 1.2rem;">Healthcare Access</h4>
                        <p style="opacity: 0.7; font-size: 0.95rem;">Partnering with institutions to improve geriatric care and wellness programmes for the ageing population.</p>
                    </div>
                </div>
                
                <div class="d-flex">
                    <div class="me-3 mt-1">
                        <i class="fas fa-users text-gold fs-4"></i>
                    </div>
                    <div>
                        <h4 class="mb-2" style="font-size: 1.2rem;">Community Support</h4>
                        <p style="opacity: 0.7; font-size: 0.95rem;">Establishing networks that provide social, emotional, and economic support to prevent isolation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding" style="background: rgba(184, 147, 90, 0.05); border-top: 1px dashed rgba(184,147,90,0.3);">
    <div class="container text-center">
        <h2 style="font-family: var(--font-heading); font-size: 2.5rem; color: var(--color-gold); margin-bottom: 1.5rem;">Get Involved</h2>
        <p class="mx-auto" style="max-width: 600px; opacity: 0.8; font-weight: 300; margin-bottom: 2rem;">
            Building a society that honors its elders takes all of us. If you would like to partner with KPAO, volunteer, or learn more about our upcoming initiatives, we would love to hear from you.
        </p>
        <a href="contact" class="btn-gold-solid">Contact KPAO</a>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
