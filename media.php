<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) $data = $_POST;
    
    $name = trim($data['name'] ?? '');
    $outlet = trim($data['outlet'] ?? '');
    $email = trim($data['email'] ?? '');
    $request_type = trim($data['request_type'] ?? '');
    $details = trim($data['details'] ?? '');
    
    if ($name && $outlet && $email && $details) {
        require_once 'admin/config.php';
        require_once 'partials/mailer.php';
        
        $subject = "Media Request: $outlet - $request_type";
        $body = "New media request received via the website.<br><br>"
              . "<strong>Name:</strong> $name<br>"
              . "<strong>Outlet/Publication:</strong> $outlet<br>"
              . "<strong>Email:</strong> $email<br>"
              . "<strong>Type:</strong> $request_type<br><br>"
              . "<strong>Details:</strong><br>" . nl2br(htmlspecialchars($details));
              
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO contact_messages (name, email, subject, message, source) VALUES (?, ?, ?, ?, 'media')");
        // Store plain text in DB, so strip tags for DB:
        $plain_body = strip_tags(str_replace('<br>', "\n", $body));
        $stmt->bind_param("ssss", $name, $email, $subject, $plain_body);
        $stmt->execute();
        $stmt->close();
              
        if (sendMail(ADMIN_EMAIL, $subject, $body, true, 'Media Request')) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
            exit;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'error' => 'Failed to send email via SMTP.']);
            exit;
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'Please fill in all required fields.']);
        exit;
    }
}
$extra_css = 'media';
include 'partials/nav.php';
?>

<section class="section-padding" style="padding-top: 150px; min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <span class="eyebrow mb-2">Press & Media</span>
                <h1 style="font-family: var(--font-heading); font-size: 2.5rem; margin-bottom: 1.5rem;">Media Request Form</h1>
                <p style="opacity: 0.8; font-weight: 300; margin-bottom: 3rem;">
                    Please use this form for interview requests, speaking engagements, and press inquiries.
                </p>

                    <form id="mediaForm" onsubmit="submitMedia(event)" class="text-start" style="background: rgba(184, 147, 90, 0.03); border: 1px solid rgba(184, 147, 90, 0.2); padding: 3rem; border-radius: 4px;">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <label class="eyebrow mb-2">Your Name *</label>
                                <input type="text" id="mediaName" class="form-control" style="background: transparent; color: white; border: 1px solid rgba(184, 147, 90, 0.3); padding: 0.8rem;" required>
                            </div>
                            <div class="col-md-6">
                                <label class="eyebrow mb-2">Media Outlet / Publication *</label>
                                <input type="text" id="mediaOutlet" class="form-control" style="background: transparent; color: white; border: 1px solid rgba(184, 147, 90, 0.3); padding: 0.8rem;" required>
                            </div>
                            <div class="col-md-6">
                                <label class="eyebrow mb-2">Email Address *</label>
                                <input type="email" id="mediaEmail" class="form-control" style="background: transparent; color: white; border: 1px solid rgba(184, 147, 90, 0.3); padding: 0.8rem;" required>
                            </div>
                            <div class="col-md-6">
                                <label class="eyebrow mb-2">Request Type</label>
                                <select id="mediaType" class="form-control" style="background: var(--color-bg); color: white; border: 1px solid rgba(184, 147, 90, 0.3); padding: 0.8rem;">
                                    <option value="Interview">Interview Request</option>
                                    <option value="Speaking">Speaking Engagement</option>
                                    <option value="Review Copy">Book Review Copy</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="eyebrow mb-2">Details / Deadline *</label>
                                <textarea id="mediaDetails" class="form-control" rows="5" style="background: transparent; color: white; border: 1px solid rgba(184, 147, 90, 0.3); padding: 0.8rem;" required></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" id="btnSubmitMedia" class="btn-gold-solid px-5">Submit Request</button>
                            </div>
                        </div>
                    </form>
                    
                    <script>
                    function submitMedia(e) {
                        e.preventDefault();
                        const btn = document.getElementById('btnSubmitMedia');
                        btn.disabled = true;
                        btn.innerText = 'Sending...';

                        const payload = {
                            name: document.getElementById('mediaName').value,
                            outlet: document.getElementById('mediaOutlet').value,
                            email: document.getElementById('mediaEmail').value,
                            request_type: document.getElementById('mediaType').value,
                            details: document.getElementById('mediaDetails').value
                        };

                        fetch('/media', {
                            method: 'POST',
                            headers: {'Content-Type': 'application/json'},
                            body: JSON.stringify(payload)
                        })
                        .then(res => res.json())
                        .then(data => {
                            if(data.success) {
                                showPopup('success', 'Request Sent', 'Your request has been submitted successfully. Our press team will be in touch shortly.');
                                document.getElementById('mediaForm').reset();
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
