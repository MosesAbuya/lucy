<?php
// Shared Header / Nav Partial
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucy Mworia - Finding Lucy</title>
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Finding Lucy: A Journey of Wellness, Self-Discovery and Transformation">
    <meta property="og:description" content="The definitive memoir by Lucy Mworia. Discover how she reclaimed her health, lost 30kg, and found herself again.">
    <meta property="og:image" content="https://lucymworia.com/assets/images/mockup1.png">
    <meta property="og:url" content="https://lucymworia.com/">
    <meta property="og:type" content="website">
    
    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Book",
      "name": "Finding Lucy: A Journey of Wellness, Self-Discovery and Transformation",
      "author": {
        "@type": "Person",
        "name": "Lucy Mworia"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Ssali Publishing House"
      },
      "datePublished": "2026",
      "inLanguage": "en",
      "genre": "Memoir"
    }
    </script>
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">
    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/main.css?v=<?php echo filemtime('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="assets/css/thread.css?v=<?php echo filemtime('assets/css/thread.css'); ?>">
    <?php if(isset($extra_css)): ?>
        <link rel="stylesheet" href="assets/css/pages/<?php echo $extra_css; ?>.css?v=<?php echo filemtime('assets/css/pages/' . $extra_css . '.css'); ?>">
    <?php endif; ?>

    <!-- Theme Initializer -->
    <script>
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.add('light-mode');
        }
    </script>
</head>
<body>
    
    <!-- Page Transition Overlay -->
    <div class="page-transition-overlay" id="pageTransition">
        <div class="transition-thread"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top hairline-bottom" style="background-color: var(--color-ink-translucent); backdrop-filter: blur(10px); transition: background-color var(--transition-slow);">
        <div class="container">
            <!-- Removed the slash/thread icon before text as requested -->
            <a class="navbar-brand" href="/lucy/" style="font-family: var(--font-heading); font-size: 1.5rem; letter-spacing: 0.05em; color: var(--color-gold);">
                Lucy Mworia
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="font-family: var(--font-ui); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em;">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="book">The Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="author">The Author</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="event">The Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="journey">Journey</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="contact">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn-gold px-4 py-2" href="tickets" style="text-decoration: none;">Tickets</a>
                    </li>
                    <li class="nav-item ms-lg-3 d-flex align-items-center mt-3 mt-lg-0">
                        <button id="themeToggleBtn" style="background: none; border: 1px solid var(--color-gold); color: var(--color-gold); padding: 0.4rem 0.6rem; border-radius: 4px; cursor: pointer; display: flex; align-items: center; justify-content: center; width: 34px; height: 34px;" title="Toggle Light/Dark Mode">
                            <span id="themeToggleIcon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                            </span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
