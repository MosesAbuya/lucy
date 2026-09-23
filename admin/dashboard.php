<?php
require_once 'config.php';
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

$db = getDB();

// CSV Export Logic
if (isset($_GET['export']) && $_GET['export'] == 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="lucy_orders_'.date('Y-m-d').'.csv"');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Order Ref', 'Name', 'Email', 'Phone', 'Type', 'Quantity', 'Amount', 'Status', 'M-Pesa Code', 'Delivery', 'Address', 'Date']);
    $res = $db->query("SELECT * FROM orders ORDER BY created_at DESC");
    while ($row = $res->fetch_assoc()) {
        fputcsv($output, [$row['id'], $row['order_ref'], $row['full_name'], $row['email'], $row['phone'], $row['order_type'], $row['quantity'], $row['amount'], $row['status'], $row['mpesa_code'], $row['delivery'] ? 'Yes' : 'No', $row['delivery_address'], $row['created_at']]);
    }
    fclose($output);
    exit;
}

// Bulk Email Logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_bulk_email'])) {
    require_once '../partials/mailer.php';
    $subject = $_POST['email_subject'] ?? '';
    $message = $_POST['email_body'] ?? '';
    
    // Get confirmed ticket/bundle buyers
    $res = $db->query("SELECT email FROM orders WHERE status = 'confirmed' AND order_type IN ('ticket', 'bundle') GROUP BY email");
    $sentCount = 0;
    
    $html_body = nl2br(htmlspecialchars($message));
    
    while ($row = $res->fetch_assoc()) {
        sendMail($row['email'], $subject, $html_body, true, 'Event Update');
        $sentCount++;
    }
    $_SESSION['msg'] = "Bulk email sent to $sentCount attendees.";
    header("Location: dashboard.php?tab=communication");
    exit;
}

// Update Settings
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_settings'])) {
    $stmt = $db->prepare("REPLACE INTO site_settings (setting_key, setting_value) VALUES (?, ?)");
    foreach (['event_date', 'event_time', 'event_venue', 'event_dress_code', 'till_number'] as $key) {
        if (isset($_POST[$key])) {
            $val = $_POST[$key];
            $stmt->bind_param("ss", $key, $val);
            $stmt->execute();
        }
    }
    $stmt->close();
    $_SESSION['msg'] = "Settings updated.";
    header("Location: dashboard.php?tab=settings");
    exit;
}

// Update Order Status (Fulfill)
if (isset($_GET['fulfill_id'])) {
    $id = intval($_GET['fulfill_id']);
    $db->query("UPDATE orders SET status = 'fulfilled' WHERE id = $id");
    $_SESSION['msg'] = "Order fulfilled.";
    header("Location: dashboard.php?tab=delivery");
    exit;
}

// Add Guest
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_guest'])) {
    $name = $_POST['guest_name'];
    $title = $_POST['guest_title'];
    $role = $_POST['guest_role'];
    
    $image_url = null;
    if (isset($_FILES['guest_image']) && $_FILES['guest_image']['error'] == 0) {
        $target_dir = "../assets/images/lucy/";
        $filename = time() . '_' . basename($_FILES['guest_image']['name']);
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES['guest_image']['tmp_name'], $target_file)) {
            $image_url = $filename;
        }
    }
    
    $stmt = $db->prepare("INSERT INTO event_speakers (name, title, role, image_url, display_order) VALUES (?, ?, ?, ?, 0)");
    $stmt->bind_param("ssss", $name, $title, $role, $image_url);
    $stmt->execute();
    $stmt->close();
    $_SESSION['msg'] = "Guest added successfully.";
    header("Location: dashboard.php?tab=guests");
    exit;
}

// Delete Guest
if (isset($_GET['delete_guest_id'])) {
    $id = intval($_GET['delete_guest_id']);
    $db->query("DELETE FROM event_speakers WHERE id = $id");
    $_SESSION['msg'] = "Guest deleted.";
    header("Location: dashboard.php?tab=guests");
    exit;
}

// Fetch Metrics
$metrics = [
    'total_orders' => 0,
    'total_revenue' => 0,
    'pending' => 0,
    'confirmed' => 0,
    'fulfilled' => 0
];
$res = $db->query("SELECT status, SUM(amount) as amt, COUNT(*) as cnt FROM orders GROUP BY status");
while ($row = $res->fetch_assoc()) {
    $metrics['total_orders'] += $row['cnt'];
    if ($row['status'] !== 'pending') {
        $metrics['total_revenue'] += $row['amt'];
    }
    $metrics[$row['status']] = $row['cnt'];
}

// Orders Filter
$filter = $_GET['filter'] ?? 'all';
$search = $_GET['search'] ?? '';

$query = "SELECT * FROM orders WHERE 1=1";
if ($filter !== 'all') {
    $query .= " AND status = '" . $db->real_escape_string($filter) . "'";
}
if ($search) {
    $s = "%" . $db->real_escape_string($search) . "%";
    $query .= " AND (order_ref LIKE '$s' OR full_name LIKE '$s' OR email LIKE '$s')";
}
$query .= " ORDER BY created_at DESC LIMIT 100";
$orders = $db->query($query)->fetch_all(MYSQLI_ASSOC);

// Delivery Orders
$deliveries = $db->query("SELECT * FROM orders WHERE delivery = 1 AND status IN ('confirmed', 'pending', 'fulfilled') ORDER BY status ASC, created_at DESC")->fetch_all(MYSQLI_ASSOC);

// Subscribers
$subscribers = $db->query("SELECT * FROM subscribers ORDER BY created_at DESC")->fetch_all(MYSQLI_ASSOC);

// Settings
$settings_res = $db->query("SELECT setting_key, setting_value FROM site_settings");
$settings = [];
while ($row = $settings_res->fetch_assoc()) {
    $settings[$row['setting_key']] = $row['setting_value'];
}

// Enquiries
$enquiries = [];
try {
    $enquiries = $db->query("SELECT * FROM contact_messages ORDER BY created_at DESC")->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    // Just in case table doesn't exist somehow
}

$tab = $_GET['tab'] ?? 'orders';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background: #212529; color: #fff; }
        .sidebar a { color: rgba(255,255,255,0.8); text-decoration: none; padding: 10px 15px; display: block; border-radius: 4px; margin-bottom: 5px; }
        .sidebar a:hover, .sidebar a.active { background: #B8935A; color: #fff; }
        .stat-card { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .stat-value { font-size: 2rem; font-weight: bold; color: #B8935A; }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar p-3" style="width: 250px;">
        <h4 class="mb-4 text-center border-bottom pb-3" style="color: #B8935A;">Lucy Admin</h4>
        <a href="?tab=dashboard" class="<?= $tab == 'dashboard' ? 'active' : '' ?>"><i class="fas fa-chart-line me-2"></i> Dashboard</a>
        <a href="?tab=orders" class="<?= $tab == 'orders' ? 'active' : '' ?>">
            <i class="fas fa-shopping-cart me-2"></i> Orders
            <?php if($metrics['pending'] > 0): ?>
                <span class="badge bg-danger ms-2"><?= $metrics['pending'] ?></span>
            <?php endif; ?>
        </a>
        <a href="?tab=delivery" class="<?= $tab == 'delivery' ? 'active' : '' ?>"><i class="fas fa-truck me-2"></i> Deliveries</a>
        <a href="?tab=communication" class="<?= $tab == 'communication' ? 'active' : '' ?>"><i class="fas fa-envelope me-2"></i> Communication</a>
        <a href="?tab=enquiries" class="<?= $tab == 'enquiries' ? 'active' : '' ?>"><i class="fas fa-comment-dots me-2"></i> Enquiries</a>
        <a href="?tab=guests" class="<?= $tab == 'guests' ? 'active' : '' ?>"><i class="fas fa-users me-2"></i> Guests</a>
        <a href="gallery.php"><i class="fas fa-images me-2"></i> Gallery</a>
        <a href="?tab=settings" class="<?= $tab == 'settings' ? 'active' : '' ?>"><i class="fas fa-cog me-2"></i> Site Settings</a>
        <a href="logout.php" class="mt-5 text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
    </div>

    <div class="flex-grow-1 p-4" style="height: 100vh; overflow-y: auto;">
        
        <?php if(isset($_SESSION['msg'])): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?= $_SESSION['msg']; unset($_SESSION['msg']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($tab == 'dashboard'): ?>
            <h2>Revenue Overview</h2>
            <div class="row mt-4 gy-4">
                <div class="col-md-3">
                    <div class="stat-card text-center">
                        <div class="text-muted">Total Revenue</div>
                        <div class="stat-value">KES <?= number_format($metrics['total_revenue']) ?></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                        <div class="text-muted">Total Orders</div>
                        <div class="stat-value text-dark"><?= $metrics['total_orders'] ?></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                        <div class="text-muted">Pending Verification</div>
                        <div class="stat-value text-danger"><?= $metrics['pending'] ?></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                        <div class="text-muted">Confirmed & Fulfilled</div>
                        <div class="stat-value text-success"><?= $metrics['confirmed'] + $metrics['fulfilled'] ?></div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <a href="?export=csv" class="btn btn-primary"><i class="fas fa-download me-2"></i> Export All Orders to CSV</a>
            </div>

        <?php elseif ($tab == 'orders'): ?>
            <h2>Manage Orders</h2>
            
            <form class="row my-4 g-2" method="GET">
                <input type="hidden" name="tab" value="orders">
                <div class="col-md-3">
                    <select name="filter" class="form-select">
                        <option value="all" <?= $filter == 'all' ? 'selected' : '' ?>>All Statuses</option>
                        <option value="pending" <?= $filter == 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="confirmed" <?= $filter == 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                        <option value="fulfilled" <?= $filter == 'fulfilled' ? 'selected' : '' ?>>Fulfilled</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Search name, email, or order ref..." value="<?= htmlspecialchars($search) ?>">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-secondary w-100">Filter</button>
                </div>
            </form>

            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Ref</th>
                                <th>Customer</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>M-Pesa Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders as $o): ?>
                            <tr>
                                <td><?= $o['order_ref'] ?></td>
                                <td>
                                    <?= htmlspecialchars($o['full_name']) ?><br>
                                    <small class="text-muted"><?= $o['email'] ?> | <?= $o['phone'] ?></small>
                                </td>
                                <td><?= ucfirst($o['order_type']) ?> (x<?= $o['quantity'] ?>)</td>
                                <td>KES <?= number_format($o['amount']) ?></td>
                                <td><strong class="text-primary"><?= $o['mpesa_code'] ?></strong></td>
                                <td>
                                    <?php
                                        $badge = 'bg-secondary';
                                        if($o['status'] == 'pending') $badge = 'bg-warning text-dark';
                                        if($o['status'] == 'confirmed') $badge = 'bg-info text-dark';
                                        if($o['status'] == 'fulfilled') $badge = 'bg-success';
                                    ?>
                                    <span class="badge <?= $badge ?>"><?= strtoupper($o['status']) ?></span>
                                </td>
                                <td>
                                    <?php if($o['status'] == 'pending'): ?>
                                        <button class="btn btn-sm btn-success" onclick="confirmOrder(<?= $o['id'] ?>)">Confirm</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php elseif ($tab == 'delivery'): ?>
            <h2>Delivery Queue</h2>
            <p class="text-muted">Orders requiring physical delivery in Nairobi.</p>
            <div class="card shadow-sm mt-3">
                <table class="table mb-0 table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Ref</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($deliveries as $d): ?>
                        <tr>
                            <td><?= $d['order_ref'] ?></td>
                            <td><?= htmlspecialchars($d['full_name']) ?><br><small><?= $d['phone'] ?></small></td>
                            <td><?= htmlspecialchars($d['delivery_address']) ?></td>
                            <td><span class="badge bg-secondary"><?= strtoupper($d['status']) ?></span></td>
                            <td>
                                <?php if($d['status'] == 'confirmed'): ?>
                                    <a href="?tab=delivery&fulfill_id=<?= $d['id'] ?>" class="btn btn-sm btn-primary" onclick="return confirm('Mark as delivered?');">Mark Fulfilled</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php elseif ($tab == 'communication'): ?>
            <h2>Communication</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white"><strong>Send Bulk Email</strong></div>
                        <div class="card-body">
                            <p class="small text-muted">This will send an email to all <strong>Confirmed</strong> attendees (Tickets & Bundles).</p>
                            <form method="POST">
                                <div class="mb-3">
                                    <label>Subject</label>
                                    <input type="text" name="email_subject" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Message</label>
                                    <textarea name="email_body" class="form-control" rows="5" required></textarea>
                                </div>
                                <button type="submit" name="send_bulk_email" class="btn btn-primary" onclick="return confirm('Send email to all confirmed guests?');">Send Broadcast</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white"><strong>Newsletter Subscribers (<?= count($subscribers) ?>)</strong></div>
                        <div class="card-body p-0" style="max-height: 400px; overflow-y: auto;">
                            <ul class="list-group list-group-flush">
                                <?php foreach($subscribers as $sub): ?>
                                    <li class="list-group-item"><?= htmlspecialchars($sub['email']) ?> <span class="float-end text-muted small"><?= date('M d', strtotime($sub['created_at'])) ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($tab == 'enquiries'): ?>
            <h2>Enquiries & Messages</h2>
            <p class="text-muted">Messages from the Contact and Media Request pages.</p>
            <div class="card shadow-sm mt-3">
                <table class="table mb-0 table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Source</th>
                            <th>Sender</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($enquiries)): ?>
                            <tr><td colspan="5" class="text-center py-4 text-muted">No messages found.</td></tr>
                        <?php else: ?>
                            <?php foreach($enquiries as $msg): ?>
                            <tr>
                                <td><?= date('Y-m-d H:i', strtotime($msg['created_at'])) ?></td>
                                <td><span class="badge bg-secondary"><?= strtoupper($msg['source']) ?></span></td>
                                <td>
                                    <?= htmlspecialchars($msg['name']) ?><br>
                                    <small><a href="mailto:<?= htmlspecialchars($msg['email']) ?>"><?= htmlspecialchars($msg['email']) ?></a></small>
                                </td>
                                <td><?= htmlspecialchars($msg['subject']) ?></td>
                                <td style="max-width: 300px; white-space: pre-wrap; font-size: 0.9rem;"><?= htmlspecialchars($msg['message']) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        <?php elseif ($tab == 'settings'): ?>
            <h2>Site Settings</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white"><strong>Event Details</strong> (Updates the homepage and event page immediately)</div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label>Event Date</label>
                                    <input type="date" name="event_date" class="form-control" value="<?= htmlspecialchars($settings['event_date'] ?? '') ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Event Time (e.g. 18:00 or TBA)</label>
                                    <input type="text" name="event_time" class="form-control" value="<?= htmlspecialchars($settings['event_time'] ?? '') ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Venue Name / Location</label>
                                    <input type="text" name="event_venue" class="form-control" value="<?= htmlspecialchars($settings['event_venue'] ?? '') ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Dress Code</label>
                                    <input type="text" name="event_dress_code" class="form-control" value="<?= htmlspecialchars($settings['event_dress_code'] ?? '') ?>">
                                </div>
                                <div class="mb-3">
                                    <label>M-Pesa Till Number / Paybill</label>
                                    <input type="text" name="till_number" class="form-control" value="<?= htmlspecialchars($settings['till_number'] ?? '1717582') ?>">
                                </div>
                                <button type="submit" name="update_settings" class="btn btn-primary">Save Settings</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($tab == 'guests'): ?>
            <h2>Manage Event Guests</h2>
            
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white"><strong>Add New Guest</strong></div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="guest_name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Title / Description</label>
                                    <input type="text" name="guest_title" class="form-control" placeholder="e.g. Chief Guest">
                                </div>
                                <div class="mb-3">
                                    <label>Role</label>
                                    <input type="text" name="guest_role" class="form-control" placeholder="e.g. Speaker">
                                </div>
                                <div class="mb-3">
                                    <label>Photo (Optional)</label>
                                    <input type="file" name="guest_image" class="form-control" accept="image/*">
                                </div>
                                <button type="submit" name="add_guest" class="btn btn-primary">Add Guest</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <table class="table mb-0 table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $guests = $db->query("SELECT * FROM event_speakers ORDER BY display_order ASC, id DESC")->fetch_all(MYSQLI_ASSOC);
                                foreach($guests as $g): ?>
                                <tr>
                                    <td>
                                        <?php if($g['image_url']): ?>
                                            <img src="../assets/images/lucy/<?= htmlspecialchars($g['image_url']) ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                        <?php else: ?>
                                            <div style="width: 50px; height: 50px; background: #eee; border-radius: 50%; display: flex; align-items: center; justify-content: center;"><i class="fas fa-user text-muted"></i></div>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($g['name']) ?></td>
                                    <td><?= htmlspecialchars($g['title']) ?></td>
                                    <td><span class="badge bg-secondary"><?= htmlspecialchars($g['role']) ?></span></td>
                                    <td>
                                        <a href="?tab=guests&delete_guest_id=<?= $g['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this guest?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function confirmOrder(id) {
    if(confirm('Are you sure you want to confirm this payment? This will send a confirmation email to the customer.')) {
        fetch('../api/confirm_order.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: id })
        })
        .then(r => r.json())
        .then(data => {
            if(data.success) {
                alert('Order confirmed and email sent!');
                location.reload();
            } else {
                alert('Error: ' + data.error);
            }
        });
    }
}
</script>
</body>
</html>
