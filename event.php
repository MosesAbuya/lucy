<?php include 'partials/nav.php'; ?>

<style>
.event-hero {
    padding-top: 150px;
    padding-bottom: 5rem;
    text-align: center;
}

.event-details-box {
    border: 1px solid rgba(184, 147, 90, 0.3);
    padding: 3rem 2rem;
    position: relative;
}

.event-details-box::before {
    content: '';
    position: absolute;
    top: -5px;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 10px;
    background-color: var(--color-ink);
}

.event-details-box::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 10px;
    background-color: var(--color-ink);
}

.detail-label {
    font-family: var(--font-ui);
    text-transform: uppercase;
    letter-spacing: 0.15em;
    font-size: 0.75rem;
    color: var(--color-gold);
    margin-bottom: 0.5rem;
    display: block;
}

.detail-value {
    font-family: var(--font-heading);
    font-size: 1.8rem;
    margin-bottom: 2rem;
}

.agenda-item {
    display: flex;
    flex-direction: column;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid rgba(243, 238, 228, 0.1);
}

.agenda-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

@media (min-width: 768px) {
    .agenda-item {
        flex-direction: row;
        align-items: baseline;
    }
    .agenda-time {
        width: 25%;
        flex-shrink: 0;
    }
}

.agenda-time {
    font-family: var(--font-ui);
    color: var(--color-gold);
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.agenda-desc {
    font-family: var(--font-heading);
    font-size: 1.3rem;
}

.map-container {
    width: 100%;
    height: 400px;
    background-color: #1a1a1a;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(184, 147, 90, 0.2);
}
</style>

<section class="event-hero">
    <div class="container">
        <span class="eyebrow mb-3">6 October <?php echo date('Y'); ?></span>
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 6vw, 5rem); margin-bottom: 1rem;">The Gala Dinner</h1>
        <p class="lead mx-auto" style="max-width: 600px; opacity: 0.8; font-weight: 300;">
            Join Lucy Mworia for an evening of reflection, celebration, and purpose as we officially launch "I Was Lost But I Found Myself."
        </p>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="event-details-box text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="detail-label">Date</span>
                            <div class="detail-value">Sat, 6 Oct</div>
                        </div>
                        <div class="col-md-4">
                            <span class="detail-label">Time</span>
                            <div class="detail-value">TBD</div>
                        </div>
                        <div class="col-md-4">
                            <span class="detail-label">Venue</span>
                            <div class="detail-value">TBD</div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <span class="detail-label">Dress Code</span>
                            <div class="detail-value" style="margin-bottom: 0;">TBD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-ivory">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h2 style="color: var(--color-ink); margin-bottom: 1.5rem;">Evening<br>Program</h2>
                <div style="width: 50px; height: 1px; background-color: var(--color-gold);"></div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <!-- Agenda Items -->
                <div class="agenda-item">
                    <div class="agenda-time" style="color: var(--color-ink); opacity: 0.7;">Time TBD</div>
                    <div class="agenda-desc" style="color: var(--color-ink);">Arrival & Drinks Reception</div>
                </div>
                <div class="agenda-item">
                    <div class="agenda-time" style="color: var(--color-ink); opacity: 0.7;">Time TBD</div>
                    <div class="agenda-desc" style="color: var(--color-ink);">Book Presentation & Reading</div>
                </div>
                <div class="agenda-item">
                    <div class="agenda-time" style="color: var(--color-ink); opacity: 0.7;">Time TBD</div>
                    <div class="agenda-desc" style="color: var(--color-ink);">Talk & Q&A with Lucy Mworia</div>
                </div>
                <div class="agenda-item">
                    <div class="agenda-time" style="color: var(--color-ink); opacity: 0.7;">Time TBD</div>
                    <div class="agenda-desc" style="color: var(--color-ink);">Gala Dinner</div>
                </div>
                <div class="agenda-item">
                    <div class="agenda-time" style="color: var(--color-ink); opacity: 0.7;">Time TBD</div>
                    <div class="agenda-desc" style="color: var(--color-ink);">Book Signing</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container text-center">
        <h2 style="margin-bottom: 3rem;">Location</h2>
        
        <div class="map-container mb-5">
            <div style="font-family: var(--font-ui); color: var(--color-gold); letter-spacing: 0.1em; text-transform: uppercase;">
                Map will be embedded once venue is confirmed
            </div>
        </div>

        <div class="mt-5">
            <a href="tickets" class="btn-gold-solid">Reserve Your Seat</a>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
