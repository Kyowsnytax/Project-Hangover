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
    <link rel="stylesheet" href="style3.css">
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

    <section class="hero-location">
  <img src="Images/loc1.png" alt="Poblacion Makati Night Scene" class="hero-bg">

  <div class="hero-location-content text-center text-white">
    <h1>Our Location</h1>
    <p>
      Every great night in Manila deserves a great ending — and that’s where Hang Over rolls in.
      Parked right in the heart of Poblacion, Makati, our fast-food truck serves as the ultimate stop
      for night owls, partygoers, and late-shift heroes looking for something tasty after dark.
    </p>
    <p>
      We set up where the city truly comes alive — surrounded by neon lights, music, and the energy that never sleeps.
      Whether you’re fresh from a night out in the bars of Poblacion or just cruising through the city streets,
      our grill stays hot and ready from 9 PM to 9 AM.
    </p>
    <p>
      At Hang Over, it’s not just about food — it’s about keeping the night alive.
      Grab a bite, chill with friends, and recharge before heading home.
      So next time you’re wandering through Makati after hours, follow the glow, the laughter,
      and the smell of sizzling comfort food — you’ll find us waiting at Don Pedro Street corner Kalayaan Avenue, Poblacion, Makati City.
    </p>

    <button class="map-btn"
      onclick="window.open('https://www.google.com/maps?q=14.5653,121.0314', '_blank')">
      📍 View on Google Maps
    </button>
  </div>
</section>

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
            <i class="bi bi-exclamation-triangle-fill me-2"></i> You need to log in before accessing the Order page.
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
            window.location.href = '#';
          }, 2000);
          <?php endif; ?>
        });
      });
    </script>
  </body>
</html>