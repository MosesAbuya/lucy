<?php
$extra_css = 'pledge';
include 'partials/nav.php';
?>

<style>
    .pledge-hero {
        padding-top: 150px;
        padding-bottom: 5rem;
        min-height: 85vh;
        display: flex;
        align-items: center;
        background: radial-gradient(circle at center, rgba(184, 147, 90, 0.1) 0%, transparent 60%);
    }

    .pledge-container {
        background: rgba(11, 11, 10, 0.7);
        border: 1px solid var(--color-gold);
        border-radius: 8px;
        padding: 3rem;
        max-width: 600px;
        margin: 0 auto;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        position: relative;
        overflow: hidden;
    }

    .pledge-step {
        display: none;
        animation: fadeIn 0.5s ease;
    }

    .pledge-step.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .pledge-input {
        background: transparent;
        border: none;
        border-bottom: 2px solid rgba(184, 147, 90, 0.3);
        color: var(--color-gold);
        font-family: var(--font-heading);
        font-size: 2.5rem;
        width: 100%;
        text-align: center;
        padding: 0.5rem;
        margin-bottom: 2rem;
        transition: border-color 0.3s;
    }

    .pledge-input:focus {
        outline: none;
        border-color: var(--color-gold);
    }

    .pledge-checkbox-group {
        text-align: left;
        margin: 2rem 0;
    }

    .pledge-checkbox-label {
        display: flex;
        align-items: flex-start;
        cursor: pointer;
        margin-bottom: 1rem;
        font-size: 1.1rem;
        opacity: 0.9;
        transition: opacity 0.3s;
    }

    .pledge-checkbox-label:hover {
        opacity: 1;
    }

    .pledge-checkbox {
        margin-top: 6px;
        margin-right: 15px;
        accent-color: var(--color-gold);
        transform: scale(1.3);
    }

    .signature-font {
        font-family: 'Brush Script MT', cursive;
        font-size: 3rem;
        color: var(--color-gold);
        transform: rotate(-5deg);
    }
</style>

<section class="pledge-hero">
    <div class="container text-center">

        <div class="pledge-container" id="pledgeApp">

            <!-- Step 1: Intro -->
            <div class="pledge-step active" id="step1">
                <i class="fas fa-feather-alt text-gold mb-4" style="font-size: 3rem;"></i>
                <h2
                    style="font-family: var(--font-heading); color: var(--color-gold); font-size: 2.5rem; margin-bottom: 1rem;">
                    The Choose Yourself Pledge</h2>
                <p style="font-size: 1.2rem; font-weight: 300; opacity: 0.9; margin-bottom: 2.5rem;">
                    Thousands of women are carrying weight that no scale can measure. This is your invitation to finally
                    put yourself back on your own list.
                </p>
                <button class="btn-gold-solid px-5 py-3" onclick="nextStep(1, 2)">Begin</button>
            </div>

            <!-- Step 2: Name -->
            <div class="pledge-step" id="step2">
                <h3 style="color: var(--color-ivory); margin-bottom: 2rem; font-family: var(--font-heading);">What is
                    your name?</h3>
                <input type="text" id="pledgeName" class="pledge-input" placeholder="Your Name" autocomplete="off">
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn-gold" onclick="nextStep(2, 1)">Back</button>
                    <button class="btn-gold-solid" onclick="validateNameAndNext()">Next</button>
                </div>
            </div>

            <!-- Step 3: Commitments -->
            <div class="pledge-step" id="step3">
                <h3 style="color: var(--color-ivory); margin-bottom: 1rem; font-family: var(--font-heading);">I, <span
                        id="displayName" class="text-gold"></span>, promise to...</h3>
                <div class="pledge-checkbox-group">
                    <label class="pledge-checkbox-label">
                        <input type="checkbox" class="pledge-checkbox" value="1">
                        Stop postponing my joy for 'when things settle down'.
                    </label>
                    <label class="pledge-checkbox-label">
                        <input type="checkbox" class="pledge-checkbox" value="2">
                        Look after my body as a responsibility, not a punishment.
                    </label>
                    <label class="pledge-checkbox-label">
                        <input type="checkbox" class="pledge-checkbox" value="3">
                        Recognise that choosing myself is not selfish; it is necessary.
                    </label>
                    <label class="pledge-checkbox-label">
                        <input type="checkbox" class="pledge-checkbox" value="4">
                        Refuse to believe that decline is the only story left for me.
                    </label>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn-gold" onclick="nextStep(3, 2)">Back</button>
                    <button class="btn-gold-solid" onclick="validateChecksAndNext()">Sign Pledge</button>
                </div>
            </div>

            <!-- Step 4: Complete -->
            <div class="pledge-step" id="step4">
                <i class="fas fa-check-circle text-gold mb-3" style="font-size: 3rem;"></i>
                <h3 style="color: var(--color-gold); margin-bottom: 1rem; font-family: var(--font-heading);">Pledge
                    Signed.</h3>
                <p style="opacity: 0.8; font-weight: 300; margin-bottom: 2rem;">Welcome back to yourself.</p>
                <div class="signature-font mb-4" id="displaySignature"></div>

                <p style="font-size: 0.9rem; opacity: 0.7; margin-bottom: 2rem;">
                    "The woman I was looking for was not behind me. She was waiting inside the life I was still willing
                    to build." - Lucy Mworia
                </p>

                <div class="d-flex flex-column gap-3">
                    <button class="btn-gold-solid" onclick="sharePledge()"><i class="fas fa-share-alt me-2"></i> Share
                        on WhatsApp</button>
                    <a href="book.php" class="btn-gold">Read the Book</a>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    let userName = '';

    function nextStep(current, next) {
        document.getElementById(`step${current}`).classList.remove('active');
        document.getElementById(`step${next}`).classList.add('active');
    }

    function validateNameAndNext() {
        const input = document.getElementById('pledgeName').value.trim();
        if (input.length < 2) {
            alert('Please enter your name.');
            return;
        }
        userName = input;
        document.getElementById('displayName').innerText = userName;
        nextStep(2, 3);
    }

    function validateChecksAndNext() {
        const checks = document.querySelectorAll('.pledge-checkbox:checked');
        if (checks.length === 0) {
            alert('Please select at least one promise to yourself.');
            return;
        }
        document.getElementById('displaySignature').innerText = userName;
        nextStep(3, 4);
    }

    function sharePledge() {
        const text = `I just took the Choose Yourself Pledge at Finding Lucy.\n\n"I promise to recognise that choosing myself is not selfish; it is necessary."\n\nTake the pledge here: ${window.location.href}`;
        const url = `https://api.whatsapp.com/send?text=${encodeURIComponent(text)}`;
        window.open(url, '_blank');
    }
</script>

<?php include 'partials/footer.php'; ?>