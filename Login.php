<!doctype html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hang Over</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style5.css">
  </head>

  <body>
    <img src="Images/loc1.png" alt="Poblacion Makati Night Scene" class="hero-bg">

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
            <li class="nav-item"><a class="nav-link px-3" href="#"><i class="bi bi-cart-check"></i> Order</a></li>
            <li class="nav-item" id="navbarAccountLink">
                <a class="nav-link px-3" href="Login.php">
                    <i class="bi bi-person-circle"></i> 
                    <span id="navbarAccountText">Account</span>
                </a>
            </li>
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
        <li><a href="#"><i class="bi bi-cart-check"></i> Order</a></li>
        <li><a href="Login.php"><i class="bi bi-person-circle"></i> Account</a></li>
      </ul>
    </div>

    <main class="login-container d-flex justify-content-center"> 
      <div id="loginContainer" class="login-box p-4 p-md-5 shadow-lg rounded-3">
        <h1 class="login-title text-center mb-1 bi bi-person-circle"> Login</h1>
        <a href="register.php" class="account-question-btn text-center mb-4 text-decoration-none d-block">
          <small>Dont have an Account? Register</small>
        </a>

        <form id="registerForm" class="login-form" method="Post" action="./api/fetch_login.php">
          <div class="input-group mb-3">
            <input type="text" id="username" name="username" placeholder="Username" class="form-control input-field">
          </div>
          
          <div class="input-group mb-3 position-relative">
            <input type="password" id="password" name="password" placeholder="Password" class="form-control input-field password-field">
            <span class="password-toggle position-absolute top-50 end-0 translate-middle-y me-3">
              <i class="bi bi-eye-slash"></i>
            </span>
          </div>

          <button type="submit" class="sign-in-button w-100 btn btn-primary mt-3 mb-3 fw-bold">LOGIN</button>

          </form>
      </div>
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
            <li><a href="Login.php">Account</a></li>
            <li><a href="#">Order Online</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>