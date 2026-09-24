<?php 
require_once 'admin/config.php';
$db = getDB();

// Fetch settings
$settings_res = $db->query("SELECT setting_key, setting_value FROM site_settings");
$settings = [];
if ($settings_res) {
    while ($row = $settings_res->fetch_assoc()) {
        $settings[$row['setting_key']] = $row['setting_value'];
    }
}

// Fetch speakers
$speakers_res = $db->query("SELECT * FROM event_speakers ORDER BY display_order ASC");
$speakers = $speakers_res ? $speakers_res->fetch_all(MYSQLI_ASSOC) : [];

// Fetch programme
$programme_res = $db->query("SELECT * FROM event_programme ORDER BY display_order ASC");
$programme = $programme_res ? $programme_res->fetch_all(MYSQLI_ASSOC) : [];

include 'partials/nav.php'; 
?>

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
    background: rgba(184, 147, 90, 0.02);
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

.detail-value.tba {
    font-size: 1.2rem;
    font-style: italic;
    font-family: var(--font-ui);
    opacity: 0.7;
}

.speaker-card {
    border: 1px solid rgba(184, 147, 90, 0.2);
    padding: 2rem;
    height: 100%;
    transition: transform var(--transition-base);
}

.speaker-card:hover {
    transform: translateY(-5px);
    border-color: rgba(184, 147, 90, 0.5);
}

.speaker-role {
    font-family: var(--font-ui);
    color: var(--color-gold);
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 1rem;
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
        width: 30%;
        flex-shrink: 0;
    }
}

.agenda-time {
    font-family: var(--font-ui);
    color: var(--color-gold);
    font-weight: 500;
    margin-bottom: 0.5rem;
    font-style: italic;
}

.agenda-desc {
    font-family: var(--font-heading);
    font-size: 1.3rem;
}

.map-container {
    width: 100%;
    height: 300px;
    background-color: rgba(184, 147, 90, 0.05);
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px dashed rgba(184, 147, 90, 0.3);
}
</style>

<section class="event-hero">
    <div class="container">
        <?php
            $display_date = date('d F Y', strtotime($settings['event_date'] ?? '2026-10-06'));
        ?>
        <span class="eyebrow mb-3"><?= $display_date ?></span>
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 6vw, 5rem); margin-bottom: 1rem;">The Gala Dinner</h1>
        <p class="lead mx-auto" style="max-width: 600px; opacity: 0.8; font-weight: 300;">
            Join Lucy Mworia for an evening of reflection, celebration, and purpose as we officially launch <em>Finding Lucy: A Journey of Wellness, Self-Discovery and Transformation.</em>
        </p>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5">
                <img src="assets/images/mockup2.jpg" alt="Event Gatherings" class="img-fluid rounded" style="box-shadow: -15px -15px 0 var(--color-gold);">
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="event-details-box text-center text-lg-start">
                    <?php if (strtolower($settings['event_venue'] ?? '') === 'to be announced'): ?>
                        <p class="mb-4" style="font-style: italic; opacity: 0.8; font-size: 0.95rem;">Full event details will be announced shortly. Reserve your seat now.</p>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <span class="detail-label">Date</span>
                            <div class="detail-value" style="font-size: 1.4rem;"><?= date('D, d M Y', strtotime($settings['event_date'] ?? '2026-10-06')) ?></div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <span class="detail-label">Time</span>
                            <div class="detail-value <?= (strtolower($settings['event_time'] ?? '') === 'tba') ? 'tba' : '' ?>" style="font-size: 1.4rem;"><?= htmlspecialchars($settings['event_time'] ?? 'To be announced') ?></div>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-0">
                            <span class="detail-label">Venue</span>
                            <div class="detail-value <?= (strtolower($settings['event_venue'] ?? '') === 'to be announced') ? 'tba' : '' ?>" style="font-size: 1.4rem; margin-bottom: 0;"><?= htmlspecialchars($settings['event_venue'] ?? 'To be announced') ?></div>
                        </div>
                        <div class="col-md-6">
                            <span class="detail-label">Dress Code</span>
                            <div class="detail-value" style="font-size: 1.4rem; margin-bottom: 0;"><?= htmlspecialchars($settings['event_dress_code'] ?? 'Formal / Evening Wear') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (count($speakers) > 0): ?>
<section class="section-padding bg-ivory">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="color: var(--color-ink); font-size: 2.5rem;">Speakers & Guests</h2>
            <div class="hairline-gold mx-auto mt-3"></div>
        </div>
        <div class="row justify-content-center gy-4">
            <?php foreach ($speakers as $speaker): ?>
            <div class="col-lg-4 col-md-6">
                <div class="speaker-card text-center" style="color: var(--color-ink);">
                    <?php if (!empty($speaker['image_url'])): ?>
                        <img src="assets/images/lucy/<?= htmlspecialchars($speaker['image_url']) ?>" alt="<?= htmlspecialchars($speaker['name']) ?>" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%; margin-bottom: 1.5rem; border: 2px solid var(--color-gold); box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <?php endif; ?>
                    <div class="speaker-role"><?= htmlspecialchars($speaker['role']) ?></div>
                    <h3 style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 0.5rem;"><?= htmlspecialchars($speaker['name']) ?></h3>
                    <p style="opacity: 0.7; font-size: 0.95rem; font-weight: 300;"><?= htmlspecialchars($speaker['title']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section-padding <?= count($speakers) > 0 ? '' : 'bg-ivory' ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h2 style="<?= count($speakers) > 0 ? 'color: var(--color-gold);' : 'color: var(--color-ink);' ?> margin-bottom: 1.5rem;">Evening<br>Program</h2>
                <div style="width: 50px; height: 1px; background-color: var(--color-gold);"></div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <?php if (count($programme) > 0): ?>
                    <?php foreach ($programme as $item): ?>
                    <div class="agenda-item">
                        <div class="agenda-time" style="<?= count($speakers) > 0 ? 'color: var(--color-gold);' : 'color: var(--color-ink);' ?> opacity: 0.7; font-style: normal;"><?= htmlspecialchars($item['time_slot']) ?></div>
                        <div class="agenda-desc" style="<?= count($speakers) > 0 ? 'color: var(--color-ivory);' : 'color: var(--color-ink);' ?>"><?= htmlspecialchars($item['description']) ?></div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="agenda-item">
                        <div class="agenda-time" style="<?= count($speakers) > 0 ? 'color: var(--color-gold);' : 'color: var(--color-ink);' ?> opacity: 0.7;">To be announced</div>
                        <div class="agenda-desc" style="<?= count($speakers) > 0 ? 'color: var(--color-ivory);' : 'color: var(--color-ink);' ?>">Arrival & Drinks Reception</div>
                    </div>
                    <div class="agenda-item">
                        <div class="agenda-time" style="<?= count($speakers) > 0 ? 'color: var(--color-gold);' : 'color: var(--color-ink);' ?> opacity: 0.7;">To be announced</div>
                        <div class="agenda-desc" style="<?= count($speakers) > 0 ? 'color: var(--color-ivory);' : 'color: var(--color-ink);' ?>">Book Presentation & Reading</div>
                    </div>
                    <div class="agenda-item">
                        <div class="agenda-time" style="<?= count($speakers) > 0 ? 'color: var(--color-gold);' : 'color: var(--color-ink);' ?> opacity: 0.7;">To be announced</div>
                        <div class="agenda-desc" style="<?= count($speakers) > 0 ? 'color: var(--color-ivory);' : 'color: var(--color-ink);' ?>">Talk & Q&A with Lucy Mworia</div>
                    </div>
                    <div class="agenda-item">
                        <div class="agenda-time" style="<?= count($speakers) > 0 ? 'color: var(--color-gold);' : 'color: var(--color-ink);' ?> opacity: 0.7;">To be announced</div>
                        <div class="agenda-desc" style="<?= count($speakers) > 0 ? 'color: var(--color-ivory);' : 'color: var(--color-ink);' ?>">Gala Dinner</div>
                    </div>
                    <div class="agenda-item">
                        <div class="agenda-time" style="<?= count($speakers) > 0 ? 'color: var(--color-gold);' : 'color: var(--color-ink);' ?> opacity: 0.7;">To be announced</div>
                        <div class="agenda-desc" style="<?= count($speakers) > 0 ? 'color: var(--color-ivory);' : 'color: var(--color-ink);' ?>">Book Signing</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="section-padding text-center">
    <div class="container">
        <h2 style="margin-bottom: 3rem;">Location</h2>
        
        <div class="map-container mb-5">
            <div style="font-family: var(--font-ui); color: var(--color-gold); letter-spacing: 0.05em; font-size: 0.9rem;">
                Venue details will be shared with all confirmed guests via email.
            </div>
        </div>

        <div class="mt-5">
            <a href="tickets" class="btn-gold-solid">Reserve Your Seat</a>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
