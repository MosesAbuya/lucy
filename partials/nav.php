<?php
// Shared Header / Nav Partial
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucy Mworia - I Was Lost But I Found Myself</title>
    
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
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/thread.css">
    <?php if(isset($extra_css)): ?>
        <link rel="stylesheet" href="assets/css/pages/<?php echo $extra_css; ?>.css">
    <?php endif; ?>
</head>
<body>
    
    <!-- Page Transition Overlay -->
    <div class="page-transition-overlay" id="pageTransition">
        <div class="transition-thread"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top hairline-bottom" style="background-color: rgba(11, 11, 10, 0.95); backdrop-filter: blur(10px);">
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
                        <a class="nav-link px-3" href="faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="contact">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn-gold px-4 py-2" href="tickets" style="text-decoration: none;">Tickets</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
