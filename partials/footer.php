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
            <div style="position: absolute; top: 50%; left: 50%; width: 100%; height: 150px; background: radial-gradient(ellipse at center, rgba(184, 147, 90, 0.15) 0%, transparent 60%); transform: translate(-50%, -50%); pointer-events: none; z-index: 0;"></div>
            
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
                        "Finding Lucy: A Journey of Wellness, Self-Discovery and Transformation" <br>
                        Published by Ssali Publishing House, 2026.
                    </p>
                </div>
                
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="eyebrow">Explore</h5>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="book" style="color: inherit; opacity: 0.7;">The Book</a></li>
                        <li class="mb-2"><a href="author" style="color: inherit; opacity: 0.7;">The Author</a></li>
                        <li class="mb-2"><a href="journey" style="color: inherit; opacity: 0.7;">The Journey</a></li>
                        <li class="mb-2"><a href="gallery" style="color: inherit; opacity: 0.7;">Gallery</a></li>
                        <li class="mb-2"><a href="faq" style="color: inherit; opacity: 0.7;">FAQ</a></li>
                        <li class="mb-2"><a href="pledge" style="color: inherit; opacity: 0.7;">The Pledge</a></li>
                        <li class="mb-2"><a href="reader-stories" style="color: inherit; opacity: 0.7;">Reader Stories</a></li>
                        <li class="mb-2"><a href="publisher" style="color: inherit; opacity: 0.7;">The Publisher</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="eyebrow">Event & Press</h5>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="event" style="color: inherit; opacity: 0.7;">Gala Dinner</a></li>
                        <li class="mb-2"><a href="tickets" style="color: inherit; opacity: 0.7;">Buy Tickets</a></li>
                        <li class="mb-2"><a href="virtual-ticket" style="color: inherit; opacity: 0.7;">Virtual Access</a></li>
                        <li class="mb-2"><a href="speaking" style="color: inherit; opacity: 0.7;">Speaking Booking</a></li>
                        <li class="mb-2"><a href="press" style="color: inherit; opacity: 0.7;">Press & Media</a></li>
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
                        <a href="https://www.youtube.com/@lucymworianetwork" target="_blank" style="color: var(--color-gold); font-size: 1.2rem;">
                            <i class="fab fa-youtube"></i>
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
    <script src="assets/js/main.js?v=<?php echo filemtime('assets/js/main.js'); ?>"></script>
    <script src="assets/js/popup.js?v=<?php echo filemtime('assets/js/popup.js'); ?>"></script>
    <?php if(isset($extra_js)): ?>
        <script src="assets/js/<?php echo $extra_js; ?>.js?v=<?php echo filemtime('assets/js/' . $extra_js . '.js'); ?>"></script>
    <?php endif; ?>
    <!-- Global Technical Embeds -->
    
    <!-- Floating WhatsApp -->
    <a href="#" class="floating-wa" onclick="alert('WhatsApp contact coming soon.'); return false;">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <!-- Back to Top -->
    <a href="#" class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </a>
    
    <!-- Sticky CTA Strip -->
    <div class="sticky-cta-strip" id="stickyCta">
        <span class="d-none d-md-inline me-3">Finding Lucy is now available.</span>
        <a href="tickets" class="btn-gold-solid py-1 px-3" style="font-size: 0.85rem;">Order Now</a>
    </div>
    
    <!-- Cookie Consent -->
    <div class="cookie-banner" id="cookieBanner">
        <span>We use cookies to improve your experience.</span>
        <button class="btn-gold-solid py-1 px-3 ms-3" style="font-size: 0.85rem;" onclick="acceptCookies()">Accept</button>
    </div>
    
    <style>
        .floating-wa {
            position: fixed;
            bottom: 25px;
            left: 25px;
            background: #25D366;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            z-index: 999;
            transition: transform 0.3s;
            text-decoration: none;
        }
        .floating-wa:hover { transform: scale(1.1); color: white; }
        
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: var(--color-gold);
            color: var(--color-ink);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            z-index: 999;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s;
            text-decoration: none;
        }
        .back-to-top.visible { opacity: 1; pointer-events: auto; }
        
        .sticky-cta-strip {
            position: fixed;
            bottom: -60px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--color-ink-translucent);
            border: 1px solid var(--color-gold);
            padding: 10px 20px;
            border-radius: 30px 30px 0 0;
            z-index: 998;
            transition: bottom 0.3s;
            display: flex;
            align-items: center;
            box-shadow: 0 -4px 15px rgba(0,0,0,0.5);
            font-family: var(--font-ui);
            font-size: 0.9rem;
            white-space: nowrap;
        }
        .sticky-cta-strip.visible { bottom: 0; }
        
        .cookie-banner {
            position: fixed;
            bottom: -100px;
            left: 0;
            width: 100%;
            background: var(--color-ink);
            border-top: 1px solid var(--color-gold);
            padding: 15px;
            text-align: center;
            z-index: 1000;
            transition: bottom 0.5s;
            font-family: var(--font-ui);
            font-size: 0.9rem;
        }
        .cookie-banner.visible { bottom: 0; }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btt = document.getElementById('backToTop');
            const cta = document.getElementById('stickyCta');
            const cookieBanner = document.getElementById('cookieBanner');
            
            // Check cookies
            if (!localStorage.getItem('cookies_accepted')) {
                setTimeout(() => cookieBanner.classList.add('visible'), 2000);
            }
            
            window.acceptCookies = function() {
                localStorage.setItem('cookies_accepted', 'true');
                cookieBanner.classList.remove('visible');
            };
            
            // Scroll logic for BTT and Sticky CTA
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    btt.classList.add('visible');
                    cta.classList.add('visible');
                } else {
                    btt.classList.remove('visible');
                    cta.classList.remove('visible');
                }
            });
            
            btt.addEventListener('click', (e) => {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Theme Toggle Logic
            const themeBtn = document.getElementById('themeToggleBtn');
            const themeIcon = document.getElementById('themeToggleIcon');
            const sunSvg = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>';
            const moonSvg = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>';
            
            if (themeBtn) {
                // Set initial icon based on current mode
                if (document.documentElement.classList.contains('light-mode')) {
                    themeIcon.innerHTML = moonSvg; // Show moon to switch back to dark
                } else {
                    themeIcon.innerHTML = sunSvg; // Show sun to switch to light
                }

                themeBtn.addEventListener('click', () => {
                    document.documentElement.classList.toggle('light-mode');
                    if (document.documentElement.classList.contains('light-mode')) {
                        localStorage.setItem('theme', 'light');
                        themeIcon.innerHTML = moonSvg;
                    } else {
                        localStorage.setItem('theme', 'dark');
                        themeIcon.innerHTML = sunSvg;
                    }
                });
            }
        });
    </script>
</body>
</html>
