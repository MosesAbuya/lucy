<?php include 'partials/nav.php'; ?>

<style>
    .faq-hero {
        padding-top: 150px;
        padding-bottom: 3rem;
        text-align: center;
    }

    /* Custom Accordion overrides for dark theme */
    .accordion {
        --bs-accordion-bg: transparent;
        --bs-accordion-color: var(--color-ivory);
        --bs-accordion-border-color: rgba(184, 147, 90, 0.3);
        --bs-accordion-border-width: 0;
        --bs-accordion-btn-bg: transparent;
        --bs-accordion-btn-color: var(--color-ivory);
        --bs-accordion-active-bg: transparent;
        --bs-accordion-active-color: var(--color-gold);
        --bs-accordion-btn-focus-box-shadow: none;
    }

    .accordion-item {
        border-bottom: 1px solid var(--bs-accordion-border-color);
        margin-bottom: 1rem;
    }

    .accordion-button {
        font-family: var(--font-heading);
        font-size: 1.5rem;
        padding: 1.5rem 0;
    }

    .accordion-button::after {
        filter: invert(1) brightness(100);
        transition: all 0.3s ease;
    }

    .accordion-button:not(.collapsed)::after {
        filter: sepia(1) hue-rotate(330deg) saturate(3) brightness(0.9);
    }

    .accordion-body {
        padding: 0 0 2rem 0;
        font-size: 1.1rem;
        opacity: 0.8;
        font-weight: 300;
    }
</style>

<section class="faq-hero">
    <div class="container">
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 6vw, 5rem); margin-bottom: 1rem;">Frequently
            Asked Questions</h1>
    </div>
</section>

<section class="pb-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="accordion" id="faqAccordion">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                                How much is the book?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                KES 2,500 per copy.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                How much is the gala event ticket?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                KES 3,500 per person.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                Can I get both the book and a ticket?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes - you can order both together on the tickets page for KES 6,000.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                Is there delivery?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, within Nairobi for an additional KES 300. Select delivery at checkout.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                How do I pay?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Via M-Pesa to Till Number 1717582. You'll enter your transaction code during checkout.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                                How long until my order is confirmed?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Within a few hours during business hours. You'll receive a confirmation email once
                                verified.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq7" aria-expanded="false" aria-controls="faq7">
                                What is the book about?
                            </button>
                        </h2>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <em>Finding Lucy</em> is a memoir of wellness, self-discovery, and transformation by
                                Lucy Mworia.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq8" aria-expanded="false" aria-controls="faq8">
                                Who published the book?
                            </button>
                        </h2>
                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ssali Publishing House. Chief Editor: Rose Ssali.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq9" aria-expanded="false" aria-controls="faq9">
                                Event venue and time?
                            </button>
                        </h2>
                        <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                To be announced. All confirmed ticket holders will be notified by email.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq10" aria-expanded="false" aria-controls="faq10">
                                Can I get a refund?
                            </button>
                        </h2>
                        <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Please see our Refund Policy for details.
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>