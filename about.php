<?php

session_start();


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hang Over</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style2.css">
  </head>
  <body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-2">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold ms-3" href="#">HANG OVER</a>

        <button class="navbar-toggler" id="menuToggle" type="button" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end d-none d-lg-block" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link px-3" href="home.php"><i class="bi bi-house-door"></i> Home</a></li>
            <li class="nav-item"><a class="nav-link px-3" href="about.php"><i class="bi bi-truck"></i> About</a></li>
            <li class="nav-item"><a class="nav-link px-3" href="location.php"><i class="bi bi-geo-alt"></i> Location</a></li>
            <li class="nav-item"><a class="nav-link px-3" href="menu.php"><i class="bi bi-egg-fried"></i> Menu</a></li>
            <li class="nav-item" id="navbarOrderLink"><a class="nav-link px-3" href="order.php" id="orderLink"><i class="bi bi-cart-check"></i> Order</a></li>
             <li class="nav-item" id="navbarAccountLink"><a class="nav-link px-3" href="<?php echo isset($_SESSION['username']) ? 'account.php' : 'Login.php'; ?>"><i class="bi bi-person-circle"></i><span id="navbarAccountText"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Account'; ?></span></a></li>
        </ul>
        </div>
      </div>
    </nav>

    <div id="mobileMenu" class="mobile-menu">
      <button class="close-btn" id="closeMenu">&times;</button>
      <ul class="mobile-nav-links list-unstyled text-center">
        <li><a href="home.php"><i class="bi bi-house-door"></i> Home</a></li>
        <li><a href="about.php"><i class="bi bi-truck"></i> About</a></li>
        <li><a href="location.php"><i class="bi bi-geo-alt"></i> Location</a></li>
        <li><a href="menu.php"><i class="bi bi-egg-fried"></i> Menu</a></li>
        <li><a href="order.php"><i class="bi bi-cart-check"></i> Order</a></li>
        <li><a href="<?php echo isset($_SESSION['username']) ? 'account.php' : 'Login.php'; ?>"><i class="bi bi-person-circle"></i> <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Account'; ?></a></li>
      </ul>
    </div>

    <main>
        <section id="our-story-hero" class="py-5 bg-white text-center content-start">
        <div class="container">
            <h1 class="story-title text-ho-red">OUR STORY</h1>
            <p class="lead fw-bold text-ho-dark mt-3" style="max-width: 800px; margin: 0 auto;">It all started with three friends, a shared craving, and a late-night idea.</p>
        </div>
    </section>

        <section id="story-chapter-1" class="story-chapter py-5">
            <div class="container my-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0 order-lg-2">
                        <img src="Images/Cover 2.jpg" alt="Late-night street image with neon lights" class="img-fluid rounded-3 chapter-img">
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <h2 class="chapter-year text-ho-red">2023</h2>
                        <h3 class="chapter-title">The Craving Begins</h3>
                        <p>It was one of those nights — music still ringing from the party, streets glowing with neon, and nowhere decent to grab a bite past midnight. That’s when three friends realized something was missing in the city’s nightlife: a place that truly understood the hunger that hits after a long night out.</p>
                        <p>They dreamed of serving hot, hearty meals that would hit the spot — not just another fast-food chain, but a late-night comfort zone for everyone coming from good times.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="story-chapter-2" class="story-chapter dark-bg py-5">
            <div class="container my-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0 order-lg-1">
                        <img src="Images/Cover 3.jpg" alt="Food truck concept art or menu item close-up" class="img-fluid rounded-3 chapter-img">
                    </div>
                    <div class="col-lg-6 order-lg-2 text-lg-end">
                        <h2 class="chapter-year text-ho-gold">2024</h2>
                        <h3 class="chapter-title">Cooking Up the Plan</h3>
                        <p>Over countless brainstorming sessions (and even more taste tests), the idea started to take shape. They called it Hang Over — a fast-food truck built for the night crowd.</p>
                        <p>From sizzling burgers to recovery-ready meals, every item on the menu was crafted to bring back energy and flavor after the party fades. The goal wasn’t just to serve food; it was to create a spot where night owls, partygoers, and insomniacs could all hang out, laugh, and refuel.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="story-chapter-3" class="story-chapter py-5">
            <div class="container my-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0 order-lg-2">
                        <img src="Images/cover 4.jpg" alt="Hang Over Food Truck at night with customers" class="img-fluid rounded-3 chapter-img">
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <h2 class="chapter-year text-ho-red">2025</h2>
                        <h3 class="chapter-title">The Night Spot is Born</h3>
                        <p>After months of planning, testing, and building, Hang Over officially hit the streets. Parked near the heart of the city’s party district, the truck quickly became a must-stop for anyone chasing late-night flavor.</p>
                        <p>Now open from 9 PM to 9 AM, Hang Over isn’t just a food truck — it’s a vibe. It’s where good food meets good times, and every night ends with something satisfying.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="story-tagline" class="py-5 bg-white text-center">
            <div class="container">
                <p class="lead fw-bold text-ho-dark mt-3">Because at Hang Over, we believe the night doesn’t have to end hungry.</p>
            </div>
        </section>

    </main>

    <footer id="footer">
      <div class="footer-top container d-flex flex-wrap justify-content-between align-items-start">
        <div class="footer-logo-container">
          <img src="Images/GIF LOGO.gif" class="footer-logo" alt="HangOver Logo">
        </div>

        <div class="footer-section menu-section">
          <h5>MENU</h5>
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="location.php">Location</a></li>
            <li><a href="menu.php">Menu List</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="order.php">Order Online</a></li>
          </ul>
        </div>

        <div class="footer-section social-section">
          <h5>GET IN TOUCH</h5>
          <ul class="social-links">
            <li><a href="https://www.facebook.com/"><i class="bi bi-facebook"></i> Facebook</a></li>
            <li><a href="https://www.instagram.com/"><i class="bi bi-instagram"></i> Instagram</a></li>
            <li><a href="https://www.tiktok.com/search?lang=en&q=intro%20edits&t=1756230180520"><i class="bi bi-tiktok"></i> TikTok</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom text-center">
        <p>Cure your Hangover! One Bite at a Time.</p>
      </div>
    </footer>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="loginToast" class="toast align-items-center text-bg-warning border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body fw-bold">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> You need to log in before accessing this page.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="script.js"></script>

     <!-- Toast Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="loginToast" class="toast align-items-center text-bg-warning border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body fw-bold">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> You need to log in before accessing this page.
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>

    <script>
      // Add click handler to order links
      document.querySelectorAll('a[href="order.php"]').forEach(link => {
        link.addEventListener('click', function(e) {
          // Check if user is logged in
          <?php if (!isset($_SESSION['username'])): ?>
          e.preventDefault();
          const toast = new bootstrap.Toast(document.getElementById('loginToast'));
          toast.show();
          setTimeout(() => {
            window.location.href = 'Login.php';
          }, 2000);
          <?php endif; ?>
        });
      });
    </script>
  </body>
</html>