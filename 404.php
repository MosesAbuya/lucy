<?php 
http_response_code(404);
$extra_css = '404';
include 'partials/nav.php'; 
?>

<section class="section-padding" style="padding-top: 150px; min-height: 80vh; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div class="container">
        <h1 style="font-family: var(--font-heading); font-size: clamp(5rem, 10vw, 8rem); color: var(--color-gold); margin-bottom: 0; line-height: 1;">404</h1>
        <h3 style="font-family: var(--font-heading); font-size: 2rem; margin-bottom: 1.5rem;">Page Not Found</h3>
        <p style="opacity: 0.8; font-weight: 300; max-width: 500px; margin: 0 auto 3rem;">
            The page you are looking for seems to have gone missing. Sometimes we all get a little lost on the journey.
        </p>
        <a href="index.php" class="btn-gold-solid">Return Home</a>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
