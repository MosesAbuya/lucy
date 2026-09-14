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
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 6vw, 5rem); margin-bottom: 1rem;">Frequently Asked Questions</h1>
    </div>
</section>

<section class="pb-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="accordion" id="faqAccordion">
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                                What is the dress code?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The dress code is currently TBD. We will update ticket holders with exact details closer to the event date.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                Where do I park?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Parking details will be provided once the venue is finalized. Ample security and guidance will be available on the day.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                What's included in my ticket?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The KES 10,000 standard ticket includes entry to the event, participation in the talk and Q&A, and the gala dinner. Books may be purchased separately or as part of a bundle if available on the tickets page.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                Will Lucy sign my book?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, there will be a dedicated book signing session after the dinner. You can bring your pre-purchased copy or buy one at the event.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                What is the refund policy?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Tickets are non-refundable but are transferable. If you are unable to attend, please contact us at info@lucymworia.com to transfer your ticket to another guest.
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
