<?php include 'partials/nav.php'; ?>

<style>
.gallery-hero {
    padding-top: 150px;
    padding-bottom: 3rem;
    text-align: center;
}

.gallery-grid {
    column-count: 1;
    column-gap: 1.5rem;
}

@media (min-width: 768px) {
    .gallery-grid {
        column-count: 2;
    }
}

@media (min-width: 992px) {
    .gallery-grid {
        column-count: 3;
    }
}

.gallery-item {
    break-inside: avoid;
    margin-bottom: 1.5rem;
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.gallery-img {
    width: 100%;
    height: auto;
    display: block;
    filter: grayscale(40%);
    transition: filter var(--transition-slow), transform var(--transition-slow);
}

.gallery-item:hover .gallery-img {
    filter: grayscale(0%);
    transform: scale(1.02);
}

.gallery-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 2rem 1rem 1rem;
    background: linear-gradient(transparent, rgba(11,11,10,0.9));
    color: var(--color-ivory);
    font-family: var(--font-ui);
    font-size: 0.85rem;
    letter-spacing: 0.05em;
    opacity: 0;
    transition: opacity var(--transition-base);
}

.gallery-item:hover .gallery-caption {
    opacity: 1;
}

/* Lightbox styles */
#lightbox {
    display: none;
    position: fixed;
    z-index: 1050;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(11, 11, 10, 0.95);
    backdrop-filter: blur(10px);
    justify-content: center;
    align-items: center;
}

#lightbox.active {
    display: flex;
}

#lightbox-img {
    max-width: 90%;
    max-height: 90vh;
    border: 1px solid rgba(184, 147, 90, 0.3);
}

.lightbox-close {
    position: absolute;
    top: 30px;
    right: 40px;
    color: var(--color-gold);
    font-size: 2.5rem;
    cursor: pointer;
    line-height: 1;
}
</style>

<section class="gallery-hero">
    <div class="container">
        <span class="eyebrow mb-3">The Journey</span>
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 6vw, 5rem); margin-bottom: 1rem;">Lost to Found</h1>
        <p class="lead mx-auto" style="max-width: 600px; opacity: 0.8; font-weight: 300;">
            A visual essay chronicling moments of advocacy, the joy of movement, and the courage to begin again.
        </p>
    </div>
</section>

<section class="pb-5 mb-5">
    <div class="container">
        <div class="gallery-grid">
            
            <div class="gallery-item" onclick="openLightbox('assets/images/book mockup.jpg')">
                <img src="assets/images/book mockup.jpg" class="gallery-img" alt="Book Mockup">
                <div class="gallery-caption">I Was Lost But I Found Myself</div>
            </div>
            
            <div class="gallery-item" onclick="openLightbox('assets/images/lucy.png')">
                <img src="assets/images/lucy.png" class="gallery-img" alt="Lucy Mworia">
                <div class="gallery-caption">Advocacy in Action</div>
            </div>
            
            <div class="gallery-item" onclick="openLightbox('assets/images/mockup on table.jpg')">
                <img src="assets/images/mockup on table.jpg" class="gallery-img" alt="Book on table">
                <div class="gallery-caption">The Courage to Begin Again</div>
            </div>

            <!-- Placeholders for future images -->
            <div class="gallery-item" style="background: #1a1a1a; padding-bottom: 100%;">
                 <div class="gallery-caption" style="opacity:1;">Reclaiming Joy & Movement</div>
            </div>
            
        </div>
    </div>
</section>

<!-- Lightbox Element -->
<div id="lightbox">
    <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
    <img id="lightbox-img" src="" alt="Enlarged Image">
</div>

<script>
function openLightbox(src) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden'; // Prevent scrolling
}

function closeLightbox() {
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow = 'auto';
}

// Close on escape key or clicking outside
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeLightbox();
});

document.getElementById('lightbox').addEventListener('click', (e) => {
    if (e.target.id === 'lightbox') closeLightbox();
});
</script>

<?php include 'partials/footer.php'; ?>
