<?php
include './api/sort.php';
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hang Over</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="style4.css" />
</head>

<body>
  <nav
    id="navbar"
    class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-2">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold ms-3" href="#">HANG OVER</a>

      <button
        class="navbar-toggler"
        id="menuToggle"
        type="button"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div
        class="collapse navbar-collapse justify-content-end d-none d-lg-block"
        id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link px-3" href="home.html"><i class="bi bi-house-door"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="about.html"><i class="bi bi-truck"></i> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="location.html"><i class="bi bi-geo-alt"></i> Location</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" href="menu.html"><i class="bi bi-egg-fried"></i> Menu</a>
          </li>
          <li class="nav-item" id="navbarOrderLink">
            <a class="nav-link px-3" href="#" id="orderLink"><i class="bi bi-cart-check"></i> Order</a>
          </li>
          <li class="nav-item" id="navbarAccountLink">
            <a class="nav-link px-3" href="account.html"><i class="bi bi-person-circle"></i><span id="navbarAccountText">Account</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div id="mobileMenu" class="mobile-menu">
    <button class="close-btn" id="closeMenu">&times;</button>
    <ul class="mobile-nav-links list-unstyled text-center">
      <li>
        <a href="home.html"><i class="bi bi-house-door"></i> Home</a>
      </li>
      <li>
        <a href="about.html"><i class="bi bi-truck"></i> About</a>
      </li>
      <li>
        <a href="location.html"><i class="bi bi-geo-alt"></i> Location</a>
      </li>
      <li>
        <a href="menu.html"><i class="bi bi-egg-fried"></i> Menu</a>
      </li>
      <li>
        <a href="order.html"><i class="bi bi-cart-check"></i> Order</a>
      </li>
      <li>
        <a href="account.html"><i class="bi bi-person-circle"></i> Account</a>
      </li>
    </ul>
  </div>





  <!-- this is the items -->
  <section style="padding-top: 5rem;">
    <div class="container mt-5 mb-5">
      <div class="d-flex justify-content-center row">


        <!-- create a 3 button here breakfast lunch and dinner -->

        <?php $active = $_GET['category'] ?? 'breakfast'; ?>
        <div class="container d-flex justify-content-center mb-5 gap-4">
          <a href="?category=breakfast" class="btn <?= $active == 'breakfast' ? 'btn-primary' : 'btn-outline-primary' ?>">Breakfast</a>
          <a href="?category=lunch" class="btn <?= $active == 'lunch' ? 'btn-primary' : 'btn-outline-primary' ?>">Lunch</a>
          <a href="?category=dinner" class="btn <?= $active == 'dinner' ? 'btn-primary' : 'btn-outline-primary' ?>">Dinner</a>
        </div>




        <div class="col-md-10">
          <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="row p-2 bg-white border rounded mb-3">
              
              <div class="col-md-3 mt-1"
                style="width: 16rem; height: 11rem; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 0.5rem;">
                <img
                  src="./Images/menus/<?= htmlspecialchars($row['item_name']) ?>.png"
                  alt="<?= htmlspecialchars($row['item_name']) ?>"
                  style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.5rem;" />
              </div>

              <div class="col-md-6 mt-1">
                <h5 id="product-name">
                  <?= htmlspecialchars($row['item_name']) ?>
                </h5>

                <p id="information" class="text-justify mb-0">
                  <?= htmlspecialchars($row['description']) ?>
                </p>
              </div>
              <div
                class="align-items-center align-content-center col-md-3 border-left mt-1">
                <div class="d-flex flex-row align-items-center">
                  <h4 id="price" class="mr-1">
                    <span>₱</span><?= number_format($row['price'], 2) ?>
                  </h4>
                </div>
                <span class="text-success">
                  <?= ucfirst(htmlspecialchars($category)) ?>
                </span>

                <!-- the buttons are here -->

                
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- end of items -->





  <footer id="footer">
    <div
      class="footer-top container d-flex flex-wrap justify-content-between align-items-start">
      <div class="footer-logo-container">
        <img
          src="Images/GIF LOGO.gif"
          class="footer-logo"
          alt="HangOver Logo" />
      </div>

      <div class="footer-section menu-section">
        <h5>MENU</h5>
        <ul>
          <li><a href="home.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="location.html">Location</a></li>
          <li><a href="menu.html">Menu List</a></li>
          <li><a href="account.html">Account</a></li>
          <li><a href="order.html">Order Online</a></li>
        </ul>
      </div>

      <div class="footer-section social-section">
        <h5>GET IN TOUCH</h5>
        <ul class="social-links">
          <li>
            <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i> Facebook</a>
          </li>
          <li>
            <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i> Instagram</a>
          </li>
          <li>
            <a
              href="https://www.tiktok.com/search?lang=en&q=intro%20edits&t=1756230180520"><i class="bi bi-tiktok"></i> TikTok</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom text-center">
      <p>Cure your Hangover! One Bite at a Time.</p>
    </div>
  </footer>
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div
      id="loginToast"
      class="toast align-items-center text-bg-warning border-0"
      role="alert"
      aria-live="assertive"
      aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body fw-bold">
          <i class="bi bi-exclamation-triangle-fill me-2"></i> You need to log
          in before accessing this page.
        </div>
        <button
          type="button"
          class="btn-close btn-close-white me-2 m-auto"
          data-bs-dismiss="toast"
          aria-label="Close"></button>
      </div>
    </div>
  </div>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>