/**
 * Global JavaScript
 */

document.addEventListener('DOMContentLoaded', () => {
    // Handle page transitions
    const transitionOverlay = document.getElementById('pageTransition');
    
    // Fade out overlay on load
    setTimeout(() => {
        if(transitionOverlay) {
            transitionOverlay.classList.remove('active');
        }
    }, 100);

    // Intercept internal links for transition effect
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function(e) {
            const target = this.getAttribute('href');
            
            // Only intercept internal links, not anchors or external
            if (target && 
                !target.startsWith('#') && 
                !target.startsWith('http') && 
                !target.startsWith('mailto') &&
                this.getAttribute('target') !== '_blank') {
                
                e.preventDefault();
                
                if(transitionOverlay) {
                    transitionOverlay.classList.add('active');
                }
                
                setTimeout(() => {
                    window.location.href = target;
                }, 800); // Matches var(--transition-slow) duration
            }
        });
    });

    // Simple scroll-based thread animation observer
    const threads = document.querySelectorAll('.scroll-thread');
    if (threads.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-draw');
                }
            });
        }, { threshold: 0.1 });

        threads.forEach(thread => {
            observer.observe(thread);
        });
    }
});
