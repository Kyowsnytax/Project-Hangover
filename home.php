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
    
    <link rel="stylesheet" href="style.css">
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

     <section id="home" class="main d-flex align-items-center justify-content-center" style="height: 100vh; position: relative; color: white;">

    <img src="Images/loc1.png" alt="Poblacion Makati Night Scene" class="hero-bg">
    
    <div class="hero-overlay"></div>
    
    <div class="container text-center" style="position: relative; z-index: 2;">
        <h1 class="fw-bold display-4">THE OVERNIGHT HANGOUT</h1>
        <h4 class="mb-3"><span class="typing">9 PM TILL 9 AM</span></h4>
    </div>
</section>
    
    <section id="menuscaro" class="py-5 bg-dark text-light">
      <div class="container text-center mb-4">
        <h2 class="fw-bold display-5 text-uppercase">YOUR SURVIVAL KIT</h2>
        <p class="lead">CRAVE IT. GET IT. RECOVER.</p>
      </div>

      <div id="menucarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000" data-bs-pause="hover">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#menucarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#menucarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#menucarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#menucarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#menucarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#menucarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>

        <div class="carousel-inner">

          <div class="carousel-item active">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-4 mb-4 mb-md-0">
                <img src="Images/h1.jpg" class="img-fluid rounded shadow-lg" alt="Burger: The Time-Stopper">
              </div>
              <div class="col-md-6 text-start">
                <h3 class="fw-bold text-ho-gold">Burger: The Time-Stopper</h3>
                <p class="mb-4">The heavyweight champ of midnight cravings. A thick, juicy patty, melted cheese, and all the fixings—guaranteed to stop the clock and save the night.</p>
                <a href="menu.php" class="btn btn-outline-warning btn-lg">Menu</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-4 mb-4 mb-md-0">
                <img src="Images/h2.jpg" class="img-fluid rounded shadow-lg" alt="Shakes: The Chill Pill">
              </div>
              <div class="col-md-6 text-start">
                <h3 class="fw-bold text-ho-gold">Shakes: The Chill Pill</h3>
                <p class="mb-4">Forget your worries. This thick, cold, and creamy shake is pure, sweet relief. The perfect sugar IV to soothe a savage case of the munchies.</p>
                <a href="menu.php" class="btn btn-outline-warning btn-lg">Menu</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-4 mb-4 mb-md-0">
                <img src="Images/h3.jpg" class="img-fluid rounded shadow-lg" alt="Cafe: The Morning-After Jolt">
              </div>
              <div class="col-md-6 text-start">
                <h3 class="fw-bold text-ho-gold">Cafe: The Morning-After Jolt</h3>
                <p class="mb-4">When the party's over, the recovery starts here. A strong, dark brew engineered to cut through the fog and deliver an instant, necessary reboot.</p>
                <a href="menu.php" class="btn btn-outline-warning btn-lg">Menu</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-4 mb-4 mb-md-0">
                <img src="Images/h4.jpg" class="img-fluid rounded shadow-lg" alt="Side Dish (Onion Rings): Halo Rings">
              </div>
              <div class="col-md-6 text-start">
                <h3 class="fw-bold text-ho-gold">Side Dish (Onion Rings): Halo Rings</h3>
                <p class="mb-4">Crispy, golden circles of comfort. These aren't just sides; they're the holy glow of deep-fried perfection, dipped in a sauce that promises salvation.</p>
                <a href="menu.php" class="btn btn-outline-warning btn-lg">Menu</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-4 mb-4 mb-md-0">
                <img src="Images/h5.jpg" class="img-fluid rounded shadow-lg" alt="Chicken Wings: Flamethrower Wings">
              </div>
              <div class="col-md-6 text-start">
                <h3 class="fw-bold text-ho-gold">Chicken Wings: Flamethrower Wings</h3>
                <p class="mb-4">Don't sleep on the spice. Drenched in our fiery, secret hot sauce, these wings deliver the full-body shock you need to feel alive again. Handle with caution!</p>
                <a href="menu.php" class="btn btn-outline-warning btn-lg">Menu</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-4 mb-4 mb-md-0">
                <img src="Images/h6.jpg" class="img-fluid rounded shadow-lg" alt="Kiddie Meal: Power-Up Pack">
              </div>
              <div class="col-md-6 text-start">
                <h3 class="fw-bold text-ho-gold">Kiddie Meal: Power-Up Pack</h3>
                <p class="mb-4">For the designated driver or the friend who tapped out early. A friendly, perfectly portioned meal built for maximum comfort without the complication.</p>
                <a href="menu.php" class="btn btn-outline-warning btn-lg">Menu</a>
              </div>
            </div>
          </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#menucarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#menucarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>


    <section id="about" class="py-5">
      <div class="container">
        <div class="row align-items-center">
            
          <div class="col-lg-4 text-center mb-4 mb-lg-0">
            <img src="Images/GIF LOGO.gif" alt="Logo" class="img-fluid rounded shadow">
          </div>
            
          <div class="col-lg-8">
            <h1 class="fw-bold mt-3 mt-lg-0">Hang Out Now!</h1>
            <h4>Whether it’s our loaded recovery fries, the burger that stops time, or a shake that perfectly cures a case of the late-night munchies, if it’s on our truck, it’s going to save the night. From 9 PM to 9 AM, we are the only place for your friends, your cravings, and your cure.</h4>
            <div class="abt-btn-container">
              <a href="about.php" class="menu-btn mt-5">GO TO ABOUT</a>
            </div>
          </div>
            
        </div>
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