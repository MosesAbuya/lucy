<?php
// Shared Footer Partial
?>
    <style>
    .footer-thread-path {
        fill: none;
        stroke: var(--color-gold);
        stroke-width: 1.5;
        stroke-dasharray: 4000;
        stroke-dashoffset: 4000;
        animation: drawFooterThread 4s ease-in-out forwards;
    }
    @keyframes drawFooterThread {
        to { stroke-dashoffset: 0; }
    }
    </style>
    <footer class="pt-0 pb-4 mt-auto" style="position: relative; overflow: hidden;">
        <!-- Animated Wavy thread with glow above footer (FULL WIDTH) -->
        <div class="w-100 position-relative mb-5" style="height: 120px;">
            <!-- Glow background specific to footer thread -->
            <div style="position: absolute; top: 50%; left: 50%; width: 100%; height: 150px; background: radial-gradient(ellipse at center, rgba(184, 147, 90, 0.15) 0%, rgba(11,11,10,0) 60%); transform: translate(-50%, -50%); pointer-events: none; z-index: 0;"></div>
            
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1;">
                <svg width="100%" height="100%" viewBox="0 0 1000 300" preserveAspectRatio="none">
                    <path class="footer-thread-path" vector-effect="non-scaling-stroke" d="M -50,150 C 100,50 150,250 300,150 C 400,50 350,-50 450,50 C 550,150 450,250 600,200 C 750,150 700,50 850,100 C 950,150 900,250 1050,150" opacity="0.6" />
                    <path class="footer-thread-path" vector-effect="non-scaling-stroke" style="animation-delay: 0.5s;" d="M -50,100 C 50,200 200,50 350,150 C 500,250 450,100 600,100 C 750,100 650,250 800,150 C 900,50 950,200 1050,100" opacity="0.4" />
                </svg>
            </div>
        </div>

        <div class="container relative z-2">
            <div class="row gy-4 position-relative" style="z-index: 2;">
                <div class="col-lg-4 col-md-6">
                    <h4 style="color: var(--color-gold); font-size: 1.5rem; margin-bottom: 1.5rem; font-family: var(--font-heading);">Lucy Mworia</h4>
                    <p style="opacity: 0.8; font-size: 0.9rem; max-width: 300px;">
                        "I Was Lost But I Found Myself" <br>
                        A memoir of politics, resilience, and reclaiming purpose.
                    </p>
                </div>
                
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="eyebrow">Explore</h5>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="book" style="color: inherit; opacity: 0.7;">The Book</a></li>
                        <li class="mb-2"><a href="author" style="color: inherit; opacity: 0.7;">The Author</a></li>
                        <li class="mb-2"><a href="journey" style="color: inherit; opacity: 0.7;">Journey</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="eyebrow">Event</h5>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="event" style="color: inherit; opacity: 0.7;">Gala Dinner</a></li>
                        <li class="mb-2"><a href="tickets" style="color: inherit; opacity: 0.7;">Tickets</a></li>
                        <li class="mb-2"><a href="faq" style="color: inherit; opacity: 0.7;">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h5 class="eyebrow">Connect</h5>
                    <p style="font-size: 0.9rem; opacity: 0.8; margin-bottom: 1rem;">
                        <a href="mailto:info@lucymworia.com" style="color: inherit; text-decoration: none;">info@lucymworia.com</a>
                    </p>
                    <div class="d-flex gap-3">
                        <a href="https://www.facebook.com/lucy.mworia/" target="_blank" style="color: var(--color-gold); font-size: 1.2rem;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://ke.linkedin.com/in/lucy-mworia-31aa1a264" target="_blank" style="color: var(--color-gold); font-size: 1.2rem;">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-4 hairline-top align-items-center position-relative" style="z-index: 2;">
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <p style="font-size: 0.8rem; opacity: 0.6; margin-bottom: 0;">&copy; <?php echo date('Y'); ?> Lucy Mworia. All rights reserved.</p>
                </div>
                <div class="col-md-8 text-center text-md-end">
                    <ul class="list-inline mb-0" style="font-size: 0.8rem; opacity: 0.6;">
                        <li class="list-inline-item"><a href="terms" style="color: inherit; text-decoration: none;">Terms of Service</a></li>
                        <li class="list-inline-item mx-2">|</li>
                        <li class="list-inline-item"><a href="privacy" style="color: inherit; text-decoration: none;">Privacy Policy</a></li>
                        <li class="list-inline-item mx-2">|</li>
                        <li class="list-inline-item"><a href="refund" style="color: inherit; text-decoration: none;">Refund Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome (for social icons) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    
    <!-- Global JS -->
    <script src="assets/js/main.js"></script>
    <?php if(isset($extra_js)): ?>
        <script src="assets/js/<?php echo $extra_js; ?>.js"></script>
    <?php endif; ?>
</body>
</html>
