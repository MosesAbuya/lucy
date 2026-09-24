<?php
require_once 'admin/config.php';
$extra_css = 'resubmit';

$ref = $_GET['ref'] ?? '';
$error = '';
$success = '';
$order = null;

if ($ref) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM orders WHERE order_ref = ?");
    $stmt->bind_param("s", $ref);
    $stmt->execute();
    $order = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $order) {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) $data = $_POST;
    
    if ($order['status'] !== 'pending') {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'This order has already been confirmed and cannot be updated.']);
        exit;
    } else {
        $new_code = strtoupper(trim($data['mpesa_code'] ?? ''));
        if (empty($new_code)) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'error' => 'Please enter a valid M-Pesa transaction code.']);
            exit;
        } else {
            $stmt = $db->prepare("UPDATE orders SET mpesa_code = ? WHERE id = ?");
            $stmt->bind_param("si", $new_code, $order['id']);
            if ($stmt->execute()) {
                // Notify admin again
                require_once 'partials/mailer.php';
                $adminBody = "Order $ref has been updated by the customer.<br><br>"
                           . "<strong>New M-Pesa Code:</strong> $new_code<br><br>"
                           . "Please verify and confirm in the admin dashboard.";
                sendMail(ADMIN_EMAIL, "Order Updated - $ref", $adminBody, true, 'Order Updated');
                
                header('Content-Type: application/json');
                echo json_encode(['success' => true]);
                exit;
            } else {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'error' => 'Failed to update. Please try again.']);
                exit;
            }
            $stmt->close();
        }
    }
}

include 'partials/nav.php';
?>

<style>
.resubmit-hero {
    padding-top: 150px;
    padding-bottom: 5rem;
    min-height: 80vh;
    display: flex;
    align-items: center;
}
.order-card {
    background: rgba(184, 147, 90, 0.05);
    border: 1px dashed var(--color-gold);
    padding: 2rem;
    border-radius: 4px;
}
</style>

<section class="resubmit-hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 text-center">
                <h1 style="font-family: var(--font-heading); font-size: 2.5rem; margin-bottom: 1rem;">Update Transaction Code</h1>
                
                <?php if (!$ref || !$order): ?>
                    <div class="alert alert-danger bg-transparent" style="color: #ff6b6b; border-color: #ff6b6b;">
                        Invalid or missing order reference.
                    </div>
                <?php else: ?>
                    
                    <div class="order-card text-start mb-4">
                        <p class="mb-1 eyebrow">Order Reference</p>
                        <h4 class="text-white mb-3"><?= htmlspecialchars($order['order_ref']) ?></h4>
                        
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="mb-0 text-white-50">Name</p>
                                <p class="text-white"><?= htmlspecialchars($order['full_name']) ?></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-0 text-white-50">Amount Expected</p>
                                <p class="text-white">KES <?= number_format($order['amount']) ?></p>
                            </div>
                        </div>
                        
                        <p class="mb-0 text-white-50">Current M-Pesa Code</p>
                        <p class="text-gold mb-0 fw-bold" id="currentMpesaCode"><?= htmlspecialchars($order['mpesa_code']) ?></p>
                    </div>

                    <?php if ($order['status'] === 'pending'): ?>
                        <form id="resubmitForm" onsubmit="submitResubmit(event)">
                            <div class="mb-4 text-start">
                                <label class="eyebrow mb-2">New M-Pesa Code</label>
                                <input type="text" id="newMpesaCode" class="form-control" style="background: transparent; color: white; border: 1px solid rgba(184, 147, 90, 0.3); padding: 1rem; text-transform: uppercase;" placeholder="e.g. QWE123RTY" required>
                            </div>
                            <button type="submit" id="btnResubmit" class="btn-gold-solid w-100">Submit New Code</button>
                        </form>
                        <script>
                        function submitResubmit(e) {
                            e.preventDefault();
                            const btn = document.getElementById('btnResubmit');
                            btn.disabled = true;
                            btn.innerText = 'Submitting...';
                            
                            const payload = {
                                mpesa_code: document.getElementById('newMpesaCode').value
                            };
                            
                            fetch('resubmit.php?ref=<?= htmlspecialchars($ref) ?>', {
                                method: 'POST',
                                headers: {'Content-Type': 'application/json'},
                                body: JSON.stringify(payload)
                            })
                            .then(res => res.json())
                            .then(data => {
                                if(data.success) {
                                    showPopup('success', 'Code Updated', 'Transaction code updated successfully. Our team will verify it shortly.');
                                    document.getElementById('currentMpesaCode').innerText = payload.mpesa_code.toUpperCase();
                                    document.getElementById('resubmitForm').reset();
                                } else {
                                    showPopup('error', 'Error', data.error);
                                }
                            })
                            .catch(err => {
                                showPopup('error', 'Network Error', 'Please check your connection and try again.');
                            })
                            .finally(() => {
                                btn.disabled = false;
                                btn.innerText = 'Submit New Code';
                            });
                        }
                        </script>
                    <?php elseif ($order['status'] !== 'pending'): ?>
                        <div class="alert alert-info bg-transparent border-info text-info">
                            This order is already <strong><?= htmlspecialchars($order['status']) ?></strong>. No further updates are needed.
                        </div>
                    <?php endif; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
