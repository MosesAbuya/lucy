<?php
require_once 'admin/config.php';
$extra_css = 'speakers';
include 'partials/nav.php';

$db = getDB();
$speakers_res = $db->query("SELECT * FROM event_speakers ORDER BY display_order ASC");
$speakers = $speakers_res ? $speakers_res->fetch_all(MYSQLI_ASSOC) : [];
?>

<section class="section-padding" style="padding-top: 150px; min-height: 80vh;">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-12">
                <span class="eyebrow mb-2">The Event</span>
                <h1 style="font-family: var(--font-heading); font-size: 3rem; margin-bottom: 1.5rem;">Speakers & Guests</h1>
                <div class="hairline-gold mx-auto mb-4"></div>
                <p style="opacity: 0.8; font-weight: 300; max-width: 600px; margin: 0 auto;">
                    Meet the remarkable individuals joining Lucy Mworia for the official launch of <em>Finding Lucy</em>.
                </p>
            </div>
        </div>

        <div class="row justify-content-center gy-5 mt-4">
            <?php if (count($speakers) > 0): ?>
                <?php foreach ($speakers as $speaker): ?>
                <div class="col-lg-4 col-md-6">
                    <div style="background: rgba(184, 147, 90, 0.03); border: 1px solid rgba(184, 147, 90, 0.15); padding: 3rem 2rem; height: 100%; text-align: center; border-radius: 4px;">
                        <div style="font-family: var(--font-ui); color: var(--color-gold); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1.5rem;">
                            <?= htmlspecialchars($speaker['role']) ?>
                        </div>
                        <h3 style="font-family: var(--font-heading); font-size: 1.8rem; margin-bottom: 0.5rem; color: #fff;">
                            <?= htmlspecialchars($speaker['name']) ?>
                        </h3>
                        <p style="opacity: 0.7; font-size: 1rem; font-weight: 300; margin-bottom: 0;">
                            <?= htmlspecialchars($speaker['title']) ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p style="opacity: 0.7; font-style: italic;">The speaker lineup will be announced shortly.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="row mt-5 pt-5 text-center">
            <div class="col-12">
                <a href="event" class="btn-gold">View Event Details</a>
                <a href="tickets" class="btn-gold-solid ms-3">Reserve Seat</a>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
