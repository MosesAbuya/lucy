<?php
require_once 'admin/config.php';
$extra_css = 'track';
include 'partials/nav.php';

$search = trim($_GET['ref'] ?? '');
$order = null;
$error = '';

if (!empty($search)) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM orders WHERE order_ref = ? OR email = ? ORDER BY created_at DESC LIMIT 1");
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        $error = "No order found matching that reference or email.";
    }
    $stmt->close();
}
?>

<style>
.track-hero {
    padding-top: 150px;
    padding-bottom: 5rem;
    min-height: 80vh;
    display: flex;
    align-items: center;
}

.status-indicator {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    margin: 3rem 0;
}

.status-indicator::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 2px;
    background: rgba(184, 147, 90, 0.2);
    z-index: 0;
}

.status-step {
    position: relative;
    z-index: 1;
    background: var(--color-bg);
    padding: 0 1rem;
    text-align: center;
    color: rgba(243, 238, 228, 0.5);
}

.status-step.active {
    color: var(--color-gold);
}

.status-step.completed {
    color: #4cd137;
}

.status-dot {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: currentColor;
    margin: 0 auto 0.5rem;
    border: 4px solid var(--color-bg);
}
</style>

<section class="track-hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 text-center">
                <span class="eyebrow mb-2">Customer Service</span>
                <h1 style="font-family: var(--font-heading); font-size: 2.5rem; margin-bottom: 2rem;">Track Your Order</h1>
                
                <form method="GET" class="mb-5 d-flex gap-2">
                    <input type="text" name="ref" class="form-control" placeholder="Enter Order Ref (e.g., LUCY-1234) or Email" value="<?= htmlspecialchars($search) ?>" style="background: transparent; color: white; border: 1px solid rgba(184, 147, 90, 0.3); padding: 1rem;" required>
                    <button type="submit" class="btn-gold-solid">Track</button>
                </form>

                <?php if ($error): ?>
                    <div class="alert alert-danger bg-transparent" style="color: #ff6b6b; border-color: #ff6b6b;">
                        <?= $error ?>
                    </div>
                <?php endif; ?>

                <?php if ($order): ?>
                    <div style="background: rgba(184, 147, 90, 0.05); border: 1px solid rgba(184, 147, 90, 0.2); padding: 2rem; border-radius: 4px; text-align: left;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0 text-white"><?= htmlspecialchars($order['order_ref']) ?></h4>
                            <span class="badge" style="background: var(--color-gold); color: var(--color-ink); font-family: var(--font-ui); text-transform: uppercase;"><?= htmlspecialchars($order['status']) ?></span>
                        </div>
                        
                        <p class="mb-1"><strong class="text-white-50">Name:</strong> <?= htmlspecialchars($order['full_name']) ?></p>
                        <p class="mb-1"><strong class="text-white-50">Item:</strong> <?= ucfirst(htmlspecialchars($order['order_type'])) ?> (x<?= htmlspecialchars($order['quantity']) ?>)</p>
                        <p class="mb-1"><strong class="text-white-50">Amount:</strong> KES <?= number_format($order['amount']) ?></p>
                        
                        <?php
                            $status = $order['status']; // pending, confirmed, fulfilled
                            $isPending = $status === 'pending';
                            $isConfirmed = $status === 'confirmed';
                            $isFulfilled = $status === 'fulfilled';
                        ?>
                        
                        <div class="status-indicator">
                            <div class="status-step <?= $isPending || $isConfirmed || $isFulfilled ? 'completed' : '' ?>">
                                <div class="status-dot"></div>
                                <div style="font-size: 0.8rem; text-transform: uppercase;">Placed</div>
                            </div>
                            <div class="status-step <?= $isConfirmed || $isFulfilled ? 'completed' : ($isPending ? 'active' : '') ?>">
                                <div class="status-dot"></div>
                                <div style="font-size: 0.8rem; text-transform: uppercase;">Confirmed</div>
                            </div>
                            <div class="status-step <?= $isFulfilled ? 'completed' : ($isConfirmed ? 'active' : '') ?>">
                                <div class="status-dot"></div>
                                <div style="font-size: 0.8rem; text-transform: uppercase;">Fulfilled</div>
                            </div>
                        </div>

                        <?php if ($isPending): ?>
                            <p class="text-white-50 mb-0" style="font-size: 0.9rem;">We are currently verifying your payment. If you made a mistake with your M-Pesa code, <a href="resubmit?ref=<?= htmlspecialchars($order['order_ref']) ?>" style="color: var(--color-gold);">update it here</a>.</p>
                        <?php elseif ($isConfirmed): ?>
                            <p class="text-white-50 mb-0" style="font-size: 0.9rem;">Your payment is confirmed. Please present your reference number at the event.</p>
                        <?php elseif ($isFulfilled): ?>
                            <p class="text-white-50 mb-0" style="font-size: 0.9rem;">Your order has been fully fulfilled. Thank you!</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
