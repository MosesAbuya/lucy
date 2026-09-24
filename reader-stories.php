<?php
$extra_css = 'stories';
include 'partials/nav.php';
?>

<style>
    .stories-hero {
        padding-top: 150px;
        padding-bottom: 5rem;
    }

    .story-card {
        background: rgba(184, 147, 90, 0.05);
        border: 1px solid rgba(184, 147, 90, 0.2);
        padding: 2.5rem;
        border-radius: 4px;
        height: 100%;
        position: relative;
    }

    .story-quote-icon {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 3rem;
        color: var(--color-gold);
        opacity: 0.1;
    }

    .story-text {
        font-size: 1.1rem;
        line-height: 1.8;
        opacity: 0.9;
        margin-bottom: 2rem;
        position: relative;
        z-index: 2;
    }

    .story-author {
        font-family: var(--font-heading);
        color: var(--color-gold);
        font-size: 1.2rem;
    }
</style>

<section class="stories-hero text-center">
    <div class="container">
        <h1 style="font-family: var(--font-heading); font-size: clamp(3rem, 5vw, 4.5rem); margin-bottom: 1.5rem;">
            Reader Stories
        </h1>
        <p class="lead mx-auto" style="font-weight: 300; opacity: 0.9; max-width: 600px;">
            The journey to choosing yourself is universal. Read how <em>Finding Lucy</em> is impacting women across the
            globe, and share your own story.
        </p>
    </div>
</section>

<section class="section-padding pt-0">
    <div class="container">
        <div class="row gy-4">

            <div class="col-lg-6">
                <div class="story-card">
                    <i class="fas fa-quote-right story-quote-icon"></i>
                    <p class="story-text">
                        "I read 'The Woman I Missed' chapter and cried. I didn't realize how much of myself I had given
                        away to my career and my family until Lucy put it into words. Her journey gave me the permission
                        I didn't know I needed to finally start my own."
                    </p>
                    <div class="story-author">Grace M., Nairobi</div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="story-card">
                    <i class="fas fa-quote-right story-quote-icon"></i>
                    <p class="story-text">
                        "The part about the photograph struck me deeply. I had been avoiding mirrors for years. Lucy's
                        honest, practical approach -'one meal, one kilometre at a time' -felt doable, not overwhelming.
                        I took the pledge yesterday."
                    </p>
                    <div class="story-author">Sarah T., Mombasa</div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="story-card">
                    <i class="fas fa-quote-right story-quote-icon"></i>
                    <p class="story-text">
                        "As a woman over 55, society often tells you that your best years are behind you. Lucy
                        completely shatters that narrative. She showed me that the next chapter can be lived with
                        curiosity, joy, and purpose."
                    </p>
                    <div class="story-author">Dr. Achieng, Kisumu</div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="story-card">
                    <i class="fas fa-quote-right story-quote-icon"></i>
                    <p class="story-text">
                        "I loved the humor. The boat incident in Zanzibar had me laughing out loud, but it was wrapped
                        in such profound truth about our bodies and how we hide them. A beautiful, brave memoir."
                    </p>
                    <div class="story-author">Faith N., London</div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section-padding bg-ivory text-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 style="color: var(--color-ink); margin-bottom: 1.5rem;">Share Your Story</h2>
                <p
                    style="color: var(--color-ink); opacity: 0.8; margin-bottom: 2.5rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Have you taken the pledge? Has the book impacted your journey? We would love to hear from you.
                    Selected stories may be featured on this page (anonymously if preferred).
                </p>

                <div class="card shadow-sm text-start"
                    style="border: none; background: white; padding: 2.5rem; border-radius: 8px;">
                    <form id="storyForm" onsubmit="submitStory(event)">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-bold"
                                    style="font-size: 0.85rem; text-transform: uppercase;">First Name or Initials
                                    *</label>
                                <input type="text" id="st_name" class="form-control"
                                    style="background: transparent; border: 1px solid #ddd; color: #333;" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark fw-bold"
                                    style="font-size: 0.85rem; text-transform: uppercase;">City / Location</label>
                                <input type="text" id="st_location" class="form-control"
                                    style="background: transparent; border: 1px solid #ddd; color: #333;">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-dark fw-bold"
                                style="font-size: 0.85rem; text-transform: uppercase;">Your Story *</label>
                            <textarea id="st_message" class="form-control" rows="5"
                                style="background: transparent; border: 1px solid #ddd; color: #333;"
                                required></textarea>
                        </div>
                        <button type="submit" id="btnStSubmit" class="btn-gold-solid w-100">Submit Story</button>
                    </form>
                </div>
                <script>
                    function submitStory(e) {
                        e.preventDefault();
                        const btn = document.getElementById('btnStSubmit');
                        btn.disabled = true;
                        btn.innerText = 'Sending...';

                        const payload = {
                            name: document.getElementById('st_name').value + ' (' + document.getElementById('st_location').value + ')',
                            email: 'reader@lucymworia.com', // mock email for the DB
                            subject: 'Reader Story Submission',
                            message: document.getElementById('st_message').value,
                            source: 'stories'
                        };

                        fetch('contact.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(payload)
                        })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    showPopup('success', 'Story Received', 'Thank you for sharing your journey with us.');
                                    document.getElementById('storyForm').reset();
                                } else {
                                    showPopup('error', 'Error', data.error);
                                }
                            })
                            .catch(err => {
                                showPopup('error', 'Network Error', 'Please check your connection and try again.');
                            })
                            .finally(() => {
                                btn.disabled = false;
                                btn.innerText = 'Submit Story';
                            });
                    }
                </script>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>