<?php include 'partials/nav.php'; ?>

<style>
    .book-hero {
        padding-top: 120px;
        padding-bottom: 4rem;
    }

    .book-cover-container {
        position: relative;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        background-color: var(--color-ink);
    }

    .book-cover-img {
        width: 100%;
        height: auto;
        display: block;
        border: 1px solid rgba(243, 238, 228, 0.1);
    }

    .book-title-display {
        font-family: var(--font-heading);
        font-size: clamp(2.5rem, 5vw, 4rem);
        color: var(--color-ivory);
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .theme-card {
        border-left: 1px solid var(--color-gold);
        padding-left: 1.5rem;
        margin-bottom: 3rem;
    }
    
    .part-card {
        background: rgba(184, 147, 90, 0.03);
        border: 1px solid rgba(184, 147, 90, 0.15);
        padding: 2.5rem;
        margin-bottom: 2rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .part-card:hover {
        border-color: rgba(184, 147, 90, 0.4);
        transform: translateY(-3px);
        background: rgba(184, 147, 90, 0.06);
    }
    .part-title {
        font-family: var(--font-heading);
        color: var(--color-gold);
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        letter-spacing: 0.05em;
    }
    .part-quote {
        font-style: italic;
        opacity: 0.9;
        margin-bottom: 1.5rem;
        font-size: 1.15rem;
        line-height: 1.6;
    }
    .part-chapters {
        font-size: 0.9rem;
        opacity: 0.7;
        font-family: var(--font-ui);
        line-height: 1.8;
    }
    .inside-card {
        background: rgba(11, 11, 10, 0.5);
        border: 1px dashed rgba(184, 147, 90, 0.3);
        padding: 2rem;
        height: 100%;
        border-radius: 8px;
        text-align: center;
        transition: all 0.3s ease;
    }
    .inside-card:hover {
        border-style: solid;
        border-color: var(--color-gold);
        background: rgba(184, 147, 90, 0.05);
    }
</style>

<section class="book-hero">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5">
                <div class="book-cover-container">
                    <img src="assets/images/mockup1.png"
                        alt="Finding Lucy Book Cover" class="book-cover-img">
                </div>
            </div>

            <div class="col-lg-6 offset-lg-1">
                <span class="eyebrow">The Memoir</span>
                <h1 class="book-title-display">Finding Lucy</h1>
                <p class="lead mb-5" style="opacity: 0.9; font-weight: 300;">
                    A Journey of Wellness, Self-Discovery and Transformation — by Lucy Mworia | Published by Ssali Publishing House, 2026
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="tickets" class="btn-gold-solid">Order the Book — KES 2,500</a>
                    <a href="#synopsis" class="btn-gold">Read Synopsis</a>
                </div>
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

<section id="synopsis" class="section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 style="color: var(--color-gold); margin-bottom: 2rem;">About the Book</h2>

                <div style="font-size: 1.1rem; opacity: 0.8; font-weight: 300;">
                    <p class="mb-4">
                        Finding Lucy is about health. It is about weight loss — losing thirty kilograms was an important part of Lucy's story. It is about fasting, movement, food, choices, and the practical lessons that helped her change.
                    </p>
                    <p class="mb-4">
                        But it is also about something much bigger than any of those things.
                    </p>
                    <p class="mb-4">
                        It is for the woman who has achieved much and still wonders when she disappeared from her own priorities. It is for the mother who is always needed and has become accustomed to putting herself last. It is for the caregiver, the professional, the leader, the woman beginning again after disappointment or loss.
                    </p>
                    <p>
                        Told with warmth, honesty, and a great deal of humour — including a notorious incident on a boat in Zanzibar — this is Lucy Mworia's invitation to every woman: choosing yourself is not selfish. Beginning again does not belong only to the young.
                    </p>
                </div>
                
                <h2 style="color: var(--color-gold); margin-top: 4rem; margin-bottom: 2rem;">Who This Book Is For</h2>
                
                <ul class="list-unstyled" style="font-size: 1.1rem; font-weight: 300; opacity: 0.9; line-height: 1.8; margin-bottom: 3rem;">
                    <li class="mb-4 d-flex">
                        <i class="fas fa-check text-gold me-3 mt-2"></i>
                        <div>For the woman who has achieved much — and still wonders when she disappeared from her own priorities.</div>
                    </li>
                    <li class="mb-4 d-flex">
                        <i class="fas fa-check text-gold me-3 mt-2"></i>
                        <div>For the leader who is always needed, and has become accustomed to putting herself last.</div>
                    </li>
                    <li class="mb-4 d-flex">
                        <i class="fas fa-check text-gold me-3 mt-2"></i>
                        <div>For the caregiver searching for permission to finally include herself among the people she cares for.</div>
                    </li>
                    <li class="mb-4 d-flex">
                        <i class="fas fa-check text-gold me-3 mt-2"></i>
                        <div>For anyone beginning again after disappointment, discovering that decline is not the only story left.</div>
                    </li>
                </ul>
                
                <h2 style="color: var(--color-gold); margin-top: 4rem; margin-bottom: 2rem;">The Three-Part Journey</h2>
                
                <div class="part-card">
                    <div class="part-title">PART ONE — The Woman I Missed</div>
                    <div class="part-quote">"A woman can leave home and still carry a version of herself there. Sometimes returning is how she discovers how much both have changed."</div>
                    <div class="hairline-gold mb-3" style="width: 50px; opacity: 0.3;"></div>
                    <div class="part-chapters">
                        Going Home · When the Plan Does Not Become the Life · Huyu Mama Ni Kibonge · The Photograph · How Did I Get Here? · The Seed
                    </div>
                </div>

                <div class="part-card">
                    <div class="part-title">PART TWO — Choosing Lucy</div>
                    <div class="part-quote">"Haba na haba hujaza kibaba." — Little by little fills the measure.</div>
                    <div class="hairline-gold mb-3" style="width: 50px; opacity: 0.3;"></div>
                    <div class="part-chapters">
                        I Cleaned Out the Kitchen · Seven Kilograms of Evidence · The Hill Called Discipline · Bofa Road · I Danced My Way Back · The Photograph on My Screen
                    </div>
                </div>

                <div class="part-card">
                    <div class="part-title">PART THREE — The Woman I Found</div>
                    <div class="part-quote">"The woman I was looking for was not behind me. She was waiting inside the life I was still willing to build."</div>
                    <div class="hairline-gold mb-3" style="width: 50px; opacity: 0.3;"></div>
                    <div class="part-chapters">
                        The Weight I Really Lost · Taking Myself With Me · Food, Culture and the Right to Decide · Purpose Without Disappearing Again · Choose Yourself · The Woman I Found
                    </div>
                </div>
                
                <h2 style="color: var(--color-gold); margin-top: 4rem; margin-bottom: 2rem;">Also Inside</h2>
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="inside-card">
                            <i class="fas fa-feather-alt text-gold mb-3" style="font-size: 2rem;"></i>
                            <h5 style="font-family: var(--font-heading); color: var(--color-ivory); font-size: 1.4rem;">The Choose Yourself Pledge</h5>
                            <p style="opacity: 0.7; font-size: 0.95rem; margin: 0;">A declaration to put yourself back on the list.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inside-card">
                            <i class="fas fa-book-open text-gold mb-3" style="font-size: 2rem;"></i>
                            <h5 style="font-family: var(--font-heading); color: var(--color-ivory); font-size: 1.4rem;">Thirty Journal Invitations</h5>
                            <p style="opacity: 0.7; font-size: 0.95rem; margin: 0;">Questions designed for deep reflection.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inside-card">
                            <i class="fas fa-list-ol text-gold mb-3" style="font-size: 2rem;"></i>
                            <h5 style="font-family: var(--font-heading); color: var(--color-ivory); font-size: 1.4rem;">Eight Things I Know Now</h5>
                            <p style="opacity: 0.7; font-size: 0.95rem; margin: 0;">Hard-won truths about health and age.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inside-card">
                            <i class="fas fa-envelope-open-text text-gold mb-3" style="font-size: 2rem;"></i>
                            <h5 style="font-family: var(--font-heading); color: var(--color-ivory); font-size: 1.4rem;">Letters of Hope</h5>
                            <p style="opacity: 0.7; font-size: 0.95rem; margin: 0;">A note to her granddaughters, and to the woman almost giving up.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-ivory">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2 style="color: var(--color-ink);">Key Themes</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="theme-card" style="border-color: var(--color-ink);">
                    <h3 style="font-size: 1.5rem; color: var(--color-ink);">Reclaiming Your Health</h3>
                    <p style="opacity: 0.8; color: var(--color-ink);">How Lucy began at 115kg, walked Bofa Road in Kilifi daily, danced to Miriam Makeba in her living room, and lost 30 kilograms — one disciplined choice at a time.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="theme-card" style="border-color: var(--color-ink);">
                    <h3 style="font-size: 1.5rem; color: var(--color-ink);">Choosing Yourself</h3>
                    <p style="opacity: 0.8; color: var(--color-ink);">The discovery that putting yourself on your own list is not selfishness. It is the only form of responsibility that belongs entirely to you.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="theme-card" style="border-color: var(--color-ink);">
                    <h3 style="font-size: 1.5rem; color: var(--color-ink);">Ageing Without Disappearing</h3>
                    <p style="opacity: 0.8; color: var(--color-ink);">A challenge to the idea that decline is inevitable, and an invitation to live the next decade with curiosity, strength, and deliberate joy.</p>
                </div>
            </div>
        </div>
        
        <div class="mt-5 text-center" style="max-width: 600px; margin: 0 auto; color: var(--color-ink); padding: 2rem; border: 1px dashed rgba(11,11,10,0.2);">
            <p style="font-family: var(--font-heading); font-size: 1.2rem; margin-bottom: 0.5rem;">Dedicated to Murithi Mworia</p>
            <p style="font-style: italic; opacity: 0.8; margin-bottom: 0;">"Keep going, Mum." — His words are woven into every page of this book.</p>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <span class="eyebrow mb-4">Excerpt</span>
                <div class="pull-quote" style="border-left: none; text-align: center; margin: 0 auto;">
                    "I thought I was searching for a smaller body; I was really searching for myself."
                </div>
                <div class="mt-3 text-gold" style="font-family: var(--font-ui); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 700;">
                    - Lucy Mworia, Finding Lucy
                </div>
            </div>
        </div>
        
        <div class="row mt-5 pt-5 text-center">
            <div class="col-12" style="font-size: 0.8rem; opacity: 0.5; font-family: var(--font-ui); text-transform: uppercase; letter-spacing: 0.1em;">
                <p class="mb-1">Published by <strong>Ssali Publishing House</strong> | Chief Editor: Rose Ssali | 2026</p>
                <p class="mb-0">During this journey, Lucy also found and purchased the Kilifi Wellness & Holiday Villa — a place that has since become a marker of this chapter of her life.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
