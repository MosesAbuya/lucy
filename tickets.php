<?php 
require_once 'admin/config.php';
$db = getDB();
$settings_res = $db->query("SELECT setting_key, setting_value FROM site_settings");
$settings = [];
if ($settings_res) {
    while ($row = $settings_res->fetch_assoc()) {
        $settings[$row['setting_key']] = $row['setting_value'];
    }
}
$till_number = $settings['till_number'] ?? '1717582';

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
    width: 0%; /* Updates via JS */
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
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 5vw, 4rem);">Order & Reserve</h1>
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
                        <div class="step-dot" id="dot4"></div>
                    </div>
                </div>

                <!-- Step 1: Select Tier -->
                <div class="form-step active" id="step1">
                    <h3 class="mb-4 text-center" style="font-weight: 300;">Choose Your Item</h3>
                    
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <div class="ticket-card" data-tier="book" data-price="2500" onclick="selectTicket(this)">
                                <div class="ticket-tier">The Book</div>
                                <div class="ticket-price">KES 2,500</div>
                                <ul class="ticket-includes ps-3">
                                    <li>A copy of "Finding Lucy"</li>
                                    <li>Delivery or Pickup</li>
                                </ul>
                                <div class="mt-auto text-gold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.1em;">Select</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ticket-card" data-tier="ticket" data-price="3500" onclick="selectTicket(this)">
                                <div class="ticket-tier">Gala Ticket</div>
                                <div class="ticket-price">KES 3,500</div>
                                <ul class="ticket-includes ps-3">
                                    <li>Entry to the gala event</li>
                                    <li>Gala dinner & Q&A</li>
                                </ul>
                                <div class="mt-auto text-gold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.1em;">Select</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ticket-card" data-tier="bundle" data-price="6000" onclick="selectTicket(this)">
                                <div class="ticket-tier">Book + Ticket</div>
                                <div class="ticket-price">KES 6,000</div>
                                <ul class="ticket-includes ps-3">
                                    <li>Gala entry & dinner</li>
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
                    <h3 class="mb-4 text-center" style="font-weight: 300;">Your Details</h3>
                    
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <label class="eyebrow">Full Name *</label>
                            <input type="text" class="form-control checkout-input" id="guestName" placeholder="Enter full name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="eyebrow">Email Address *</label>
                            <input type="email" class="form-control checkout-input" id="guestEmail" placeholder="For confirmation & e-ticket" required>
                        </div>
                        <div class="col-md-6">
                            <label class="eyebrow">Phone Number *</label>
                            <input type="tel" class="form-control checkout-input" id="guestPhone" placeholder="07XX XXX XXX" required>
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

                    <div id="deliverySection" style="display: none;" class="mt-4">
                        <div class="form-check mt-3 mb-2">
                            <input class="form-check-input" type="checkbox" id="requireDelivery" onchange="updateTotal()">
                            <label class="form-check-label" for="requireDelivery" style="color: var(--color-gold);">
                                Deliver within Nairobi (+KES 300)
                            </label>
                        </div>
                        <div class="mt-2" id="deliveryAddressGroup" style="display: none;">
                            <label class="eyebrow">Delivery Address</label>
                            <textarea class="form-control checkout-input" id="guestAddress" rows="2" placeholder="Enter full delivery address"></textarea>
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
                        
                        <div style="background: rgba(11,11,10,0.5); border: 1px solid var(--color-gold); padding: 2rem; border-radius: 4px; margin-bottom: 2rem;">
                            <p style="font-size: 1.2rem; margin-bottom: 1rem;">Pay exactly <strong id="displayTotal" style="color: var(--color-gold); font-size: 1.5rem;"></strong> to:</p>
                            <div style="font-family: var(--font-heading); font-size: 2.5rem; color: var(--color-gold); letter-spacing: 2px; margin-bottom: 0.5rem;">
                                Till Number: <?= htmlspecialchars($till_number) ?>
                            </div>
                            <p style="opacity: 0.8; font-family: var(--font-ui); text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em;">Lucy Mworia</p>
                        </div>

                        <div class="text-start mb-4" style="opacity: 0.9; max-width: 400px; margin: 0 auto;">
                            <ol class="ps-3" style="font-weight: 300; line-height: 1.8;">
                                <li>Open <strong>M-Pesa</strong> on your phone</li>
                                <li>Select <strong>Lipa na M-Pesa</strong> → <strong>Buy Goods and Services</strong></li>
                                <li>Enter Till: <strong><?= htmlspecialchars($till_number) ?></strong></li>
                                <li>Enter amount and complete payment</li>
                                <li>Copy the M-Pesa confirmation code below</li>
                            </ol>
                        </div>
                        
                        <div class="text-start" style="max-width: 400px; margin: 0 auto;">
                            <label class="eyebrow" style="color: var(--color-gold);">Enter M-Pesa Transaction Code *</label>
                            <input type="text" class="form-control checkout-input mb-4" id="mpesaCode" placeholder="e.g. SFA1234XYZ" style="text-transform: uppercase;">
                            
                            <div id="paymentError" class="alert alert-danger" style="display: none; background: transparent; border-color: red; color: red;"></div>

                            <button class="btn-gold-solid w-100 mb-3" id="btnSubmitOrder" onclick="submitOrder()">Confirm My Order</button>
                            <button class="btn-gold w-100" style="border: none;" onclick="prevStep(2)">Back to Details</button>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Success -->
                <div class="form-step" id="step4">
                    <div class="text-center" style="padding: 3rem 0;">
                        <div style="color: var(--color-gold); font-size: 4rem; margin-bottom: 1rem;"><i class="fas fa-check-circle"></i></div>
                        <h2 style="font-family: var(--font-heading);">Order Received</h2>
                        <p style="opacity: 0.8; font-size: 1.1rem; margin-bottom: 0.5rem;">Your reference: <strong id="successRef" style="color: var(--color-gold);"></strong></p>
                        <p style="opacity: 0.7; max-width: 500px; margin: 1rem auto 2rem;">We will verify your M-Pesa payment shortly. Once confirmed, you will receive an email with your receipt and further details.</p>
                        <a href="index" class="btn-gold mt-4">Return Home</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
