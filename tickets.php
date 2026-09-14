<?php 
$extra_js = 'tickets';
include 'partials/nav.php'; 
?>

<style>
.tickets-hero {
    padding-top: 150px;
    padding-bottom: 2rem;
}

/* Progress Thread */
.progress-container {
    width: 100%;
    margin: 3rem 0;
    position: relative;
    padding: 0 10%;
}

.progress-track {
    height: 2px;
    background: rgba(184, 147, 90, 0.2);
    width: 100%;
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    z-index: 1;
}

.progress-fill {
    height: 2px;
    background: var(--color-gold);
    width: 0%; /* Updates via JS: 33%, 66%, 100% */
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    z-index: 2;
    transition: width var(--transition-slow);
}

.progress-steps {
    display: flex;
    justify-content: space-between;
    position: relative;
    z-index: 3;
}

.step-dot {
    width: 12px;
    height: 12px;
    background: var(--color-ink);
    border: 2px solid var(--color-gold);
    border-radius: 50%;
    transition: all var(--transition-slow);
}

.step-dot.active {
    background: var(--color-gold);
    box-shadow: 0 0 10px rgba(184, 147, 90, 0.5);
}

/* Ticket Cards */
.ticket-card {
    border: 1px solid rgba(184, 147, 90, 0.3);
    padding: 2.5rem 2rem;
    cursor: pointer;
    transition: all var(--transition-base);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.ticket-card:hover {
    border-color: var(--color-gold);
    background: rgba(184, 147, 90, 0.05);
}

.ticket-card.selected {
    border-color: var(--color-gold);
    background: rgba(184, 147, 90, 0.1);
}

.ticket-tier {
    font-family: var(--font-heading);
    font-size: 1.8rem;
    color: var(--color-gold);
    margin-bottom: 0.5rem;
}

.ticket-price {
    font-family: var(--font-ui);
    font-size: 1.2rem;
    font-weight: 500;
    margin-bottom: 1.5rem;
}

.ticket-includes {
    font-size: 0.9rem;
    opacity: 0.8;
    margin-bottom: 2rem;
    flex-grow: 1;
}

/* Form Steps */
.form-step {
    display: none;
    animation: fadeIn 0.5s ease;
}

.form-step.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.checkout-input {
    background: transparent;
    border: 1px solid rgba(184, 147, 90, 0.3);
    color: var(--color-ivory);
    padding: 1rem;
    border-radius: 0;
}

.checkout-input:focus {
    background: rgba(184, 147, 90, 0.05);
    border-color: var(--color-gold);
    color: var(--color-ivory);
    box-shadow: none;
}
</style>

<section class="tickets-hero text-center">
    <div class="container">
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 5vw, 4rem);">Reserve Your Seat</h1>
    </div>
</section>

<section class="pb-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <!-- Progress Indicator -->
                <div class="progress-container">
                    <div class="progress-track"></div>
                    <div class="progress-fill" id="progressFill"></div>
                    <div class="progress-steps">
                        <div class="step-dot active" id="dot1"></div>
                        <div class="step-dot" id="dot2"></div>
                        <div class="step-dot" id="dot3"></div>
                    </div>
                </div>

                <!-- Step 1: Select Tier -->
                <div class="form-step active" id="step1">
                    <h3 class="mb-4 text-center" style="font-weight: 300;">Choose Ticket Tier</h3>
                    
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="ticket-card" data-tier="standard" data-price="10000" onclick="selectTicket(this)">
                                <div class="ticket-tier">Standard</div>
                                <div class="ticket-price">KES 10,000</div>
                                <ul class="ticket-includes ps-3">
                                    <li>Entry to the gala event</li>
                                    <li>Participation in talk & Q&A</li>
                                    <li>Gala dinner</li>
                                </ul>
                                <div class="mt-auto text-gold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.1em;">Select</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ticket-card" data-tier="bundle" data-price="13000" onclick="selectTicket(this)">
                                <div class="ticket-tier">Standard + Book</div>
                                <div class="ticket-price">KES 13,000</div>
                                <ul class="ticket-includes ps-3">
                                    <li>Entry to the gala event</li>
                                    <li>Gala dinner</li>
                                    <li class="text-gold">Signed copy of the memoir</li>
                                </ul>
                                <div class="mt-auto text-gold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.1em;">Select</div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button class="btn-gold-solid" onclick="nextStep(2)" id="btnStep1" disabled>Continue</button>
                    </div>
                </div>

                <!-- Step 2: Details -->
                <div class="form-step" id="step2">
                    <h3 class="mb-4 text-center" style="font-weight: 300;">Guest Details</h3>
                    
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <label class="eyebrow">Full Name</label>
                            <input type="text" class="form-control checkout-input" id="guestName" placeholder="Enter full name">
                        </div>
                        <div class="col-md-6">
                            <label class="eyebrow">Email Address</label>
                            <input type="email" class="form-control checkout-input" id="guestEmail" placeholder="For e-ticket delivery">
                        </div>
                        <div class="col-md-6">
                            <label class="eyebrow">Phone (M-Pesa Number)</label>
                            <input type="tel" class="form-control checkout-input" id="guestPhone" placeholder="07XX XXX XXX">
                        </div>
                        <div class="col-md-6">
                            <label class="eyebrow">Quantity</label>
                            <select class="form-control checkout-input" id="guestQty" onchange="updateTotal()">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-5 p-4" style="background: rgba(184, 147, 90, 0.05); border: 1px solid rgba(184, 147, 90, 0.2);">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="eyebrow mb-0">Total Amount:</span>
                            <span style="font-family: var(--font-heading); font-size: 1.5rem; color: var(--color-gold);" id="totalDisplay">KES 0</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-5">
                        <button class="btn-gold" onclick="prevStep(1)">Back</button>
                        <button class="btn-gold-solid" onclick="nextStep(3)" id="btnStep2">Proceed to Payment</button>
                    </div>
                </div>

                <!-- Step 3: Payment -->
                <div class="form-step" id="step3">
                    <div class="text-center">
                        <h3 class="mb-4" style="font-weight: 300;">M-Pesa Payment</h3>
                        
                        <div id="paymentInitial">
                            <p style="opacity: 0.8; margin-bottom: 2rem;">
                                Click below to send an M-Pesa prompt to <strong><span id="displayPhone"></span></strong> for <strong><span id="displayTotal"></span></strong>.
                            </p>
                            <button class="btn-gold-solid w-100 mb-3" style="max-width: 300px;" onclick="triggerMpesa()">Pay with M-Pesa</button>
                            <button class="btn-gold w-100" style="max-width: 300px; border: none;" onclick="prevStep(2)">Back to Details</button>
                        </div>

                        <div id="paymentPolling" style="display: none; padding: 3rem 0;">
                            <div class="spinner-border text-gold mb-4" role="status" style="width: 3rem; height: 3rem; color: var(--color-gold);">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <h4 style="font-weight: 300;">Check your phone</h4>
                            <p style="opacity: 0.8;">Please enter your M-Pesa PIN to complete the transaction.</p>
                        </div>

                        <div id="paymentSuccess" style="display: none; padding: 3rem 0;">
                            <div style="color: var(--color-gold); font-size: 4rem; margin-bottom: 1rem;"><i class="fas fa-check-circle"></i></div>
                            <h2 style="font-family: var(--font-heading);">Booking Confirmed</h2>
                            <p style="opacity: 0.8;">Thank you! Your e-ticket has been sent to your email.</p>
                            <a href="index" class="btn-gold mt-4">Return Home</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
