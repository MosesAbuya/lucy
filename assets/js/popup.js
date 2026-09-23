function showPopup(type, title, message) {
    // Remove existing popup if any
    const existing = document.getElementById('lucy-popup-container');
    if (existing) {
        existing.remove();
    }

    // Add styles if not present
    if (!document.getElementById('lucy-popup-styles')) {
        const style = document.createElement('style');
        style.id = 'lucy-popup-styles';
        style.innerHTML = `
            .lucy-popup-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(11, 11, 10, 0.85);
                backdrop-filter: blur(5px);
                z-index: 10000;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            .lucy-popup-overlay.show {
                opacity: 1;
            }
            .lucy-popup-card {
                background: var(--color-bg, #0b0b0a);
                border: 1px solid var(--color-gold, #b8935a);
                padding: 2.5rem;
                border-radius: 8px;
                max-width: 420px;
                width: 90%;
                text-align: center;
                transform: scale(0.8);
                transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                box-shadow: 0 10px 40px rgba(0,0,0,0.5);
                position: relative;
            }
            .lucy-popup-overlay.show .lucy-popup-card {
                transform: scale(1);
            }
            .lucy-popup-icon {
                font-size: 3.5rem;
                margin-bottom: 1rem;
            }
            .lucy-popup-icon.success {
                color: #4cd137;
            }
            .lucy-popup-icon.error {
                color: #e84118;
            }
            .lucy-popup-title {
                font-family: var(--font-heading, serif);
                font-size: 1.8rem;
                margin-bottom: 1rem;
                color: #fff;
            }
            .lucy-popup-title.success {
                color: var(--color-gold, #b8935a);
            }
            .lucy-popup-title.error {
                color: #e84118;
            }
            .lucy-popup-message {
                color: rgba(255,255,255,0.8);
                font-size: 1rem;
                margin-bottom: 1.5rem;
                line-height: 1.6;
            }
            .lucy-popup-close {
                background: transparent;
                border: 1px solid rgba(255,255,255,0.2);
                color: #fff;
                padding: 0.5rem 1.5rem;
                border-radius: 4px;
                cursor: pointer;
                transition: all 0.2s;
            }
            .lucy-popup-close:hover {
                background: rgba(255,255,255,0.1);
            }
        `;
        document.head.appendChild(style);
    }

    const overlay = document.createElement('div');
    overlay.className = 'lucy-popup-overlay';
    overlay.id = 'lucy-popup-container';

    const iconClass = type === 'success' ? 'fa-check-circle success' : 'fa-exclamation-circle error';
    
    overlay.innerHTML = `
        <div class="lucy-popup-card">
            <i class="fas ${iconClass} lucy-popup-icon"></i>
            <h3 class="lucy-popup-title ${type}">${title}</h3>
            <div class="lucy-popup-message">${message}</div>
            <button class="lucy-popup-close" onclick="document.getElementById('lucy-popup-container').remove()">Close</button>
        </div>
    `;

    document.body.appendChild(overlay);
    
    // Trigger animation
    setTimeout(() => {
        overlay.classList.add('show');
    }, 10);

    // Close on click outside
    overlay.addEventListener('click', function(e) {
        if (e.target === overlay) {
            overlay.remove();
        }
    });
}
