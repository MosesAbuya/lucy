<?php
$extra_css = 'order-success';
include 'partials/nav.php';
$ref = $_GET['ref'] ?? '';
?>

<style>
.success-hero {
    padding-top: 150px;
    padding-bottom: 5rem;
    min-height: 80vh;
    display: flex;
    align-items: center;
}
.success-card {
    background: rgba(184, 147, 90, 0.05);
    border: 1px dashed var(--color-gold);
    padding: 3rem 2rem;
    border-radius: 4px;
}
</style>

<section class="success-hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 text-center">
                <div class="success-card">
                    <div style="color: var(--color-gold); font-size: 4rem; margin-bottom: 1.5rem;"><i class="fas fa-check-circle"></i></div>
                    <h1 style="font-family: var(--font-heading); font-size: 2.5rem; margin-bottom: 1rem;">Order Received</h1>
                    
                    <?php if ($ref): ?>
                        <p style="opacity: 0.8; font-size: 1.1rem; margin-bottom: 0.5rem;">Your Tracking Reference:</p>
                        <h2 style="color: var(--color-gold); font-family: var(--font-ui); font-weight: bold; letter-spacing: 2px; margin-bottom: 2rem;"><?= htmlspecialchars($ref) ?></h2>
                    <?php endif; ?>
                    
                    <p style="opacity: 0.8; line-height: 1.8; margin-bottom: 2rem; font-weight: 300;">
                        We will be in touch shortly after verification. An email has been immediately sent to you with your order number and a link to resubmit your transaction code just in case there was a typo earlier.
                    </p>
                    
                    <a href="index" class="btn-gold-solid">Return to Home</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
