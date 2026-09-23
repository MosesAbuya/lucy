<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) $data = $_POST;
    
    $name = trim($data['name'] ?? '');
    $email = trim($data['email'] ?? '');
    $message = trim($data['message'] ?? '');
    $subject = trim($data['subject'] ?? 'General Inquiry');
    $source = trim($data['source'] ?? 'contact');
    
    if(!empty($name) && !empty($email) && !empty($message)) {
        require_once 'admin/config.php';
        require_once 'partials/mailer.php';
        
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO contact_messages (name, email, subject, message, source) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $subject, $message, $source);
        $stmt->execute();
        $stmt->close();
        
        $body = "New message from $name ($email):<br><br><strong>Subject:</strong> $subject<br><br>" . nl2br(htmlspecialchars($message));
        sendMail(ADMIN_EMAIL, "Website: $subject", $body, true, 'New Enquiry');
        
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'Please fill in all fields.']);
        exit;
    }
}
?>
<?php include 'partials/nav.php'; ?>

<style>
.contact-hero {
    padding-top: 150px;
    padding-bottom: 3rem;
}

.contact-form .form-control {
    background: transparent;
    border: none;
    border-bottom: 1px solid rgba(184, 147, 90, 0.3);
    border-radius: 0;
    color: var(--color-ivory);
    padding: 1rem 0;
    font-family: var(--font-ui);
    transition: all 0.3s;
}

.contact-form .form-control:focus {
    box-shadow: none;
    border-color: var(--color-gold);
    background: transparent;
    color: var(--color-ivory);
}

.contact-form .form-control::placeholder {
    color: rgba(243, 238, 228, 0.4);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-size: 0.8rem;
}

.contact-info-block {
    padding: 3rem;
    background-color: var(--color-ink);
    border: 1px solid rgba(184, 147, 90, 0.2);
}
</style>

<section class="contact-hero">
    <div class="container">
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 6vw, 5rem); margin-bottom: 1rem;">Get in Touch</h1>
        <p class="lead" style="opacity: 0.8; font-weight: 300;">
            For press inquiries, speaking engagements, or questions about the book launch.
        </p>
    </div>
</section>

<section class="pb-5 mb-5">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-6">
                
                <form id="contactForm" class="contact-form pe-lg-5" onsubmit="submitContact(event)">
                    <div class="mb-4">
                        <input type="text" class="form-control" id="contactName" placeholder="Your Name *" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" class="form-control" id="contactEmail" placeholder="Email Address *" required>
                    </div>
                    <div class="mb-5">
                        <textarea class="form-control" id="contactMessage" rows="4" placeholder="Your Message *" required></textarea>
                    </div>
                    <button type="submit" class="btn-gold" id="btnSubmitContact">Send Message</button>
                </form>

                <script>
                function submitContact(e) {
                    e.preventDefault();
                    const btn = document.getElementById('btnSubmitContact');
                    btn.disabled = true;
                    btn.innerText = 'Sending...';

                    const payload = {
                        name: document.getElementById('contactName').value,
                        email: document.getElementById('contactEmail').value,
                        message: document.getElementById('contactMessage').value
                    };

                    fetch('contact.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(payload)
                    })
                    .then(res => res.json())
                    .then(data => {
                        if(data.success) {
                            showPopup('success', 'Message Sent', 'Thank you for reaching out. We will get back to you shortly.');
                            document.getElementById('contactForm').reset();
                        } else {
                            showPopup('error', 'Error', data.error);
                        }
                    })
                    .catch(err => {
                        showPopup('error', 'Network Error', 'Please check your connection and try again.');
                    })
                    .finally(() => {
                        btn.disabled = false;
                        btn.innerText = 'Send Message';
                    });
                }
                </script>
            </div>
            
            <div class="col-lg-5 offset-lg-1">
                <div class="contact-info-block h-100">
                    <h3 style="color: var(--color-gold); font-size: 1.5rem; margin-bottom: 2rem;">Contact Details</h3>
                    
                    <div class="mb-4">
                        <span class="eyebrow">General Inquiries & Bookings</span>
                        <a href="mailto:info@lucymworia.com" style="font-family: var(--font-heading); font-size: 1.2rem;">info@lucymworia.com</a>
                    </div>
                    
                    <div class="mb-4">
                        <span class="eyebrow">Social Media</span>
                        <div class="d-flex gap-3">
                            <a href="https://www.facebook.com/lucy.mworia/" target="_blank" style="color: var(--color-ivory);"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="https://ke.linkedin.com/in/lucy-mworia-31aa1a264" target="_blank" style="color: var(--color-ivory);"><i class="fab fa-linkedin-in fa-lg"></i></a>
                        </div>
                    </div>

                    <div class="mt-5 pt-4 hairline-top">
                        <span class="eyebrow">Event Operations</span>
                        <p style="opacity: 0.7; font-size: 0.9rem;">
                            For direct ticketing support or venue inquiries, please email info@lucymworia.com.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
