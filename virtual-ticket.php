<?php
$extra_css = 'virtual';
include 'partials/nav.php';
?>

<style>
    .virtual-hero {
        padding-top: 150px;
        padding-bottom: 5rem;
    }
</style>

<section class="virtual-hero text-center">
    <div class="container">
        <span class="eyebrow mb-3 d-block">Global Access</span>
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 5vw, 4.5rem); margin-bottom: 1.5rem;">
            Virtual Gala Ticket
        </h1>
        <p class="lead mx-auto" style="font-weight: 300; opacity: 0.9; max-width: 600px;">
            Join the <em>Finding Lucy</em> launch event from anywhere in the world.
        </p>
    </div>
</section>

<section class="section-padding pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div style="background: rgba(184, 147, 90, 0.05); border: 1px solid rgba(184, 147, 90, 0.2); padding: 3rem; border-radius: 8px;">
                    <i class="fas fa-video text-gold mb-4" style="font-size: 3rem;"></i>
                    <h2 style="font-family: var(--font-heading); color: var(--color-gold); margin-bottom: 1rem;">Coming Soon</h2>
                    <p style="opacity: 0.8; font-weight: 300; margin-bottom: 2rem;">
                        Virtual access details and streaming links will be available closer to the launch date (October 6th). Subscribers will be notified via email when virtual tickets go live.
                    </p>
                    
                    <a href="tickets" class="btn-gold-solid">View Physical Tickets</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
