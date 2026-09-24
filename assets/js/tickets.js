/**
 * Tickets Booking Flow Logic - Manual Till
 */

let selectedTier = '';
let selectedPrice = 0;
let currentStep = 1;

function selectTicket(card) {
    document.querySelectorAll('.ticket-card').forEach(c => c.classList.remove('selected'));
    card.classList.add('selected');
    
    selectedTier = card.getAttribute('data-tier');
    selectedPrice = parseInt(card.getAttribute('data-price'));
    
    document.getElementById('btnStep1').removeAttribute('disabled');
    
    // Show delivery option only if book or bundle
    if (selectedTier === 'book' || selectedTier === 'bundle') {
        document.getElementById('deliverySection').style.display = 'block';
    } else {
        document.getElementById('deliverySection').style.display = 'none';
        document.getElementById('requireDelivery').checked = false;
        document.getElementById('deliveryAddressGroup').style.display = 'none';
    }
    
    updateTotal();
}

document.getElementById('requireDelivery')?.addEventListener('change', function() {
    if (this.checked) {
        document.getElementById('deliveryAddressGroup').style.display = 'block';
    } else {
        document.getElementById('deliveryAddressGroup').style.display = 'none';
    }
});

function updateTotal() {
    const qty = parseInt(document.getElementById('guestQty').value) || 1;
    let total = selectedPrice * qty;
    
    if (document.getElementById('requireDelivery').checked) {
        total += 300;
    }
    
    const formatted = `KES ${total.toLocaleString()}`;
    document.getElementById('totalDisplay').innerText = formatted;
    document.getElementById('displayTotal').innerText = formatted;
}

function updateProgress(step) {
    const fill = document.getElementById('progressFill');
    const dots = [
        document.getElementById('dot1'), 
        document.getElementById('dot2'), 
        document.getElementById('dot3'),
        document.getElementById('dot4')
    ];
    
    dots.forEach(dot => dot.classList.remove('active'));
    
    if (step === 1) {
        fill.style.width = '0%';
        dots[0].classList.add('active');
    } else if (step === 2) {
        fill.style.width = '33%';
        dots[0].classList.add('active');
        dots[1].classList.add('active');
    } else if (step === 3) {
        fill.style.width = '66%';
        dots[0].classList.add('active');
        dots[1].classList.add('active');
        dots[2].classList.add('active');
    } else if (step === 4) {
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
        const name = document.getElementById('guestName').value.trim();
        const email = document.getElementById('guestEmail').value.trim();
        const phone = document.getElementById('guestPhone').value.trim();
        const requireDelivery = document.getElementById('requireDelivery').checked;
        const address = document.getElementById('guestAddress').value.trim();
        
        if (!name || !email || !phone) {
            showPopup('error', 'Missing Information', 'Please fill in your name, email, and phone.');
            return;
        }
        
        if (requireDelivery && !address) {
            showPopup('error', 'Missing Information', 'Please enter a delivery address.');
            return;
        }
        
        showStep(3);
    }
}

function prevStep(targetStep) {
    showStep(targetStep);
}

function submitOrder() {
    const mpesaCode = document.getElementById('mpesaCode').value.trim();
    if (!mpesaCode) {
        showPopup('error', 'M-Pesa Code Required', 'Please enter your M-Pesa transaction code.');
        return;
    }
    
    const btn = document.getElementById('btnSubmitOrder');
    btn.disabled = true;
    btn.innerText = 'Processing...';
    
    const payload = {
        order_type: selectedTier,
        full_name: document.getElementById('guestName').value.trim(),
        email: document.getElementById('guestEmail').value.trim(),
        phone: document.getElementById('guestPhone').value.trim(),
        quantity: document.getElementById('guestQty').value,
        delivery: document.getElementById('requireDelivery').checked ? 1 : 0,
        delivery_address: document.getElementById('guestAddress').value.trim(),
        mpesa_code: mpesaCode
    };

    fetch('/api/order', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
    })
    .then(res => res.text())
    .then(text => {
        console.log('Server response:', text); // Debug: see full response
        let data;
        try {
            data = JSON.parse(text);
        } catch(e) {
            // Escape HTML so it displays as text, not rendered
            const escaped = text.substring(0, 500)
                .replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
            showPopup('error', 'Server Error', '<pre style="text-align:left;font-size:0.7rem;overflow:auto;max-height:150px;opacity:0.8">' + (escaped || '(empty response)') + '</pre>');
            btn.disabled = false;
            btn.innerText = 'Confirm My Order';
            return;
        }
        if (data.success) {
            showPopup('success', 'Order Received', 'Your reference is ' + data.order_ref + '. We will verify your M-Pesa payment shortly.');
            setTimeout(() => {
                window.location.href = 'order-success?ref=' + data.order_ref;
            }, 3000);
        } else {
            showPopup('error', 'Payment Error', data.error || 'An error occurred. Please try again.');
            btn.disabled = false;
            btn.innerText = 'Confirm My Order';
        }
    })
    .catch(err => {
        console.error(err);
        showPopup('error', 'Network Error', 'Could not reach the server. Please check your connection and try again.');
        btn.disabled = false;
        btn.innerText = 'Confirm My Order';
    });
}
