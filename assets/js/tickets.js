/**
 * Tickets Booking Flow Logic
 */

let selectedTier = '';
let selectedPrice = 0;
let currentStep = 1;

function selectTicket(card) {
    // Remove selected class from all
    document.querySelectorAll('.ticket-card').forEach(c => c.classList.remove('selected'));
    
    // Add to clicked
    card.classList.add('selected');
    
    // Store values
    selectedTier = card.getAttribute('data-tier');
    selectedPrice = parseInt(card.getAttribute('data-price'));
    
    // Enable continue button
    document.getElementById('btnStep1').removeAttribute('disabled');
    
    updateTotal();
}

function updateTotal() {
    const qty = parseInt(document.getElementById('guestQty').value) || 1;
    const total = selectedPrice * qty;
    
    document.getElementById('totalDisplay').innerText = `KES ${total.toLocaleString()}`;
    document.getElementById('displayTotal').innerText = `KES ${total.toLocaleString()}`;
}

function updateProgress(step) {
    const fill = document.getElementById('progressFill');
    const dots = [document.getElementById('dot1'), document.getElementById('dot2'), document.getElementById('dot3')];
    
    // Reset all dots
    dots.forEach(dot => dot.classList.remove('active'));
    
    if (step === 1) {
        fill.style.width = '0%';
        dots[0].classList.add('active');
    } else if (step === 2) {
        fill.style.width = '50%';
        dots[0].classList.add('active');
        dots[1].classList.add('active');
    } else if (step === 3) {
        fill.style.width = '100%';
        dots.forEach(dot => dot.classList.add('active'));
    }
}

function showStep(step) {
    document.querySelectorAll('.form-step').forEach(el => el.classList.remove('active'));
    document.getElementById(`step${step}`).classList.add('active');
    updateProgress(step);
    currentStep = step;
}

function nextStep(targetStep) {
    if (targetStep === 2) {
        if (!selectedTier) return;
        showStep(2);
    } else if (targetStep === 3) {
        // Basic validation
        const name = document.getElementById('guestName').value;
        const email = document.getElementById('guestEmail').value;
        const phone = document.getElementById('guestPhone').value;
        
        if (!name || !email || !phone) {
            alert('Please fill in all fields.');
            return;
        }
        
        document.getElementById('displayPhone').innerText = phone;
        showStep(3);
    }
}

function prevStep(targetStep) {
    showStep(targetStep);
}

function triggerMpesa() {
    document.getElementById('paymentInitial').style.display = 'none';
    document.getElementById('paymentPolling').style.display = 'block';
    
    // Collect data
    const payload = {
        tier: selectedTier,
        qty: document.getElementById('guestQty').value,
        name: document.getElementById('guestName').value,
        email: document.getElementById('guestEmail').value,
        phone: document.getElementById('guestPhone').value
    };

    // Simulate API call to our backend (which would call Safaricom)
    fetch('api/mpesa.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        // Simulate polling for 5 seconds then success
        setTimeout(() => {
            document.getElementById('paymentPolling').style.display = 'none';
            document.getElementById('paymentSuccess').style.display = 'block';
        }, 5000);
    })
    .catch(err => {
        console.error(err);
        // Fallback simulation for local dev without PHP server
        setTimeout(() => {
            document.getElementById('paymentPolling').style.display = 'none';
            document.getElementById('paymentSuccess').style.display = 'block';
        }, 3000);
    });
}
