<?php
$extra_css = 'speaking';
include 'partials/nav.php';
?>

<style>
    .speaking-hero {
        padding-top: 150px;
        padding-bottom: 5rem;
        background: linear-gradient(to right, rgba(11,11,10,0.9), rgba(11,11,10,0.4)), url('assets/images/lucy/lucy holding mic.jpg') center/cover;
        min-height: 70vh;
        display: flex;
        align-items: center;
    }
    
    .topic-card {
        background: rgba(184, 147, 90, 0.05);
        border: 1px solid rgba(184, 147, 90, 0.2);
        padding: 2.5rem;
        height: 100%;
        transition: all 0.3s ease;
    }
    .topic-card:hover {
        background: rgba(184, 147, 90, 0.1);
        border-color: var(--color-gold);
        transform: translateY(-5px);
    }
</style>

<section class="speaking-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <span class="eyebrow mb-3 d-block">Speaking & Workshops</span>
                <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 5vw, 4.5rem); margin-bottom: 1.5rem; line-height: 1.1;">
                    Invite Lucy to Speak
                </h1>
                <p class="lead mb-4" style="font-weight: 300; opacity: 0.9; max-width: 600px;">
                    From intimate wellness retreats to corporate leadership summits, Lucy Mworia delivers powerful, honest conversations about leadership, self-reclamation, and pro-ageing.
                </p>
                <a href="#inquire" class="btn-gold-solid">Request Booking</a>
            </div>
        </div>
    </div>
</section>

<!-- Thread Transition -->
<div class="container my-5">
    <svg width="100%" height="40" viewBox="0 0 1000 40" preserveAspectRatio="none">
        <path class="scroll-thread thread-path" d="M 0,20 Q 500,-10 1000,20" />
    </svg>
</div>

<section class="section-padding pt-0">
    <div class="container">
        <div class="text-center mb-5 pb-3">
            <h2 style="font-size: 2.5rem; color: var(--color-gold);">Signature Topics</h2>
            <p style="opacity: 0.8; max-width: 600px; margin: 0 auto;">Presentations tailored to your audience's needs.</p>
        </div>
        
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="topic-card">
                    <i class="fas fa-crown text-gold mb-4" style="font-size: 2.5rem;"></i>
                    <h3 style="font-family: var(--font-heading); color: var(--color-ivory); margin-bottom: 1rem;">Leadership & The Cost of Disappearing</h3>
                    <p style="opacity: 0.8; font-weight: 300; line-height: 1.6;">
                        For corporate audiences and women in leadership. Exploring how high-achieving women can lead effectively without abandoning their own health and priorities.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="topic-card">
                    <i class="fas fa-seedling text-gold mb-4" style="font-size: 2.5rem;"></i>
                    <h3 style="font-family: var(--font-heading); color: var(--color-ivory); margin-bottom: 1rem;">Choosing Yourself at Any Age</h3>
                    <p style="opacity: 0.8; font-weight: 300; line-height: 1.6;">
                        A deeply personal narrative on wellness, weight loss, and mindset shifts. Perfect for wellness summits and women's retreats focusing on holistic health.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="topic-card">
                    <i class="fas fa-hands-holding-circle text-gold mb-4" style="font-size: 2.5rem;"></i>
                    <h3 style="font-family: var(--font-heading); color: var(--color-ivory); margin-bottom: 1rem;">The Pro-Ageing Revolution</h3>
                    <p style="opacity: 0.8; font-weight: 300; line-height: 1.6;">
                        Drawing from her work with KPAO, Lucy discusses advocacy, dignity, and why the next decade of your life can be the most purposeful.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-ivory text-dark" id="inquire">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5">
                <h2 style="color: var(--color-ink); margin-bottom: 1.5rem;">Booking Enquiries</h2>
                <p style="color: var(--color-ink); opacity: 0.8; margin-bottom: 2rem;">
                    Please fill out the form with details about your event, including dates, location, and audience profile. Our team will get back to you within 48 hours.
                </p>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <i class="fas fa-envelope text-gold"></i>
                    <span style="color: var(--color-ink); font-weight: 600;">info@lucymworia.com</span>
                </div>
            </div>
            
            <div class="col-lg-6 offset-lg-1">
                <div class="card shadow-sm" style="border: none; background: white; padding: 2.5rem; border-radius: 8px;">
                    <form id="speakingForm" onsubmit="submitSpeaking(event)">
                        <div class="mb-3">
                            <label class="form-label text-dark fw-bold" style="font-size: 0.85rem; text-transform: uppercase;">Organization / Host Name *</label>
                            <input type="text" id="spk_name" class="form-control" style="background: transparent; border: 1px solid #ddd; color: #333;" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-dark fw-bold" style="font-size: 0.85rem; text-transform: uppercase;">Email Address *</label>
                            <input type="email" id="spk_email" class="form-control" style="background: transparent; border: 1px solid #ddd; color: #333;" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-bold" style="font-size: 0.85rem; text-transform: uppercase;">Event Date</label>
                                <input type="date" id="spk_date" class="form-control" style="background: transparent; border: 1px solid #ddd; color: #333;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-bold" style="font-size: 0.85rem; text-transform: uppercase;">Location / Format</label>
                                <input type="text" id="spk_location" class="form-control" placeholder="e.g. Nairobi or Virtual" style="background: transparent; border: 1px solid #ddd; color: #333;">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-dark fw-bold" style="font-size: 0.85rem; text-transform: uppercase;">Event Details *</label>
                            <textarea id="spk_message" class="form-control" rows="4" style="background: transparent; border: 1px solid #ddd; color: #333;" placeholder="Tell us about the audience and the topic you're interested in..." required></textarea>
                        </div>
                        <button type="submit" id="btnSpkSubmit" class="btn-gold-solid w-100">Submit Request</button>
                    </form>
                </div>
                <script>
                function submitSpeaking(e) {
                    e.preventDefault();
                    const btn = document.getElementById('btnSpkSubmit');
                    btn.disabled = true;
                    btn.innerText = 'Sending...';
                    
                    const payload = {
                        name: document.getElementById('spk_name').value,
                        email: document.getElementById('spk_email').value,
                        subject: 'Speaking Request: ' + document.getElementById('spk_date').value + ' - ' + document.getElementById('spk_location').value,
                        message: document.getElementById('spk_message').value,
                        source: 'speaking'
                    };
                    
                    fetch('/contact', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(payload)
                    })
                    .then(res => res.text())
                    .then(text => {
                        let data;
                        try { data = JSON.parse(text); } catch(e) {
                            showPopup('error', 'Server Error', 'Something went wrong. Your request may still have been saved.');
                            return;
                        }
                        if(data.success) {
                            showPopup('success', 'Request Sent', 'Thank you. Our team will be in touch shortly.');
                            document.getElementById('speakingForm').reset();
                        } else {
                            showPopup('error', 'Error', data.error);
                        }
                    })
                    .catch(err => {
                        showPopup('error', 'Network Error', 'Please check your connection and try again.');
                    })
                    .finally(() => {
                        btn.disabled = false;
                        btn.innerText = 'Submit Request';
                    });
                }
                </script>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
