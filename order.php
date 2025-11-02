<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: Login.php');
  exit();
}
?>
<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hang Over</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style6.css">
  <script src="sidebar.js" defer></script>
  <script src="modal_script.js"></script>
  <style>
    /* Sidebar styling */
    #sidebar {
      position: fixed;
      top: 0;
      right: -300px;
      /* Hidden offscreen initially */
      width: 300px;
      height: 100%;
      background-color: #fff;
      box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
      transition: right 0.3s ease;
      z-index: 1051;
      padding: 20px;
    }

    .sidebar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }

    #sidebar.active {
      right: 0;
    }

    /* Overlay */
    #overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: none;
      z-index: 1050;
    }

    #overlay.active {
      display: block;
    }

    /* Floating button */
    #toggleSidebar {
      position: fixed;
      width: 6rem;
      height: 6rem;
      bottom: 35px;
      right: 40px;
      z-index: 1100;
    }
  </style>

</head>

<body style="min-height:100vh; display:flex; flex-direction:column; justify-content:space-between;">


  <!-- Overlay -->
  <div id="overlay"></div>

  <!-- Floating Button -->
  <button id="toggleSidebar" class="btn btn-primary rounded-circle p-3">
    <i class="bi bi-cart-check fs-3"></i>
  </button>




  <!-- Sidebar -->
  <div id="sidebar">
    <div class="sidebar-header">
      <h5>Your Orders</h5>
      <button type="button" class="btn-close " id="closeSidebar"></button>
    </div>

    <div id="orderList" class="sidebar-content">

      <p class="text-muted">No items added yet.</p>
    </div>

    <div class="sidebar-footer border-top mt-2 pt-2 text-end">
      Total: ₱<span id="orderTotal">0</span>
    </div>
    <div class="d-flex justify-content-between mt-3">
      <button id="cancelOrders" class="btn btn-danger btn-sm w-50 me-2">Cancel</button>
      <button id="confirmOrders" class="btn btn-success btn-sm w-50">Confirm</button>
    </div>
  </div>



  <script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const toggleSidebar = document.getElementById('toggleSidebar');
    const closeSidebar = document.getElementById('closeSidebar');

    // Open sidebar
    toggleSidebar.addEventListener('click', () => {
      sidebar.classList.add('active');
      overlay.classList.add('active');
      toggleSidebar.classList.add('d-none');
    });

    // Close sidebar
    closeSidebar.addEventListener('click', () => {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
      toggleSidebar.classList.remove('d-none');
    });

    // Close when clicking overlay
    overlay.addEventListener('click', () => {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
      toggleSidebar.classList.remove('d-none');
    });
  </script>




  <!-- NavBar -->
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
          <li class="nav-item"><a class="nav-link px-3" href="order.php"><i class="bi bi-cart-check"></i> Order</a></li>
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






  <!-- this is the items -->
  <section style="padding-top: 5rem;">
    <div class="container mt-5 mb-5">
      <div class="d-flex justify-content-center row">

        <!-- 🔎 Search + Category -->
        <div class="container d-flex justify-content-center mb-5 gap-4">
          <input type="text" id="searchInput" class="form-control w-50" style="border-radius: 0.5rem;" placeholder="Search for items...">

          <select id="categorySelect" class="form-select w-auto">
            <option value="all">All Categories</option>
            <option value="burger">Burgers</option>
            <option value="side dish">Side Dishes</option>
            <option value="kiddie meal">Kids Meals</option>
            <option value="coffee">Coffee</option>
            <option value="chicken wings">Chicken Wings</option>
            <option value="shakes">Shakes</option>
          </select>
        </div>

        <!-- 📦 Container where search results will load -->
        <div id="menuContainer" class="col-md-10 text-muted">

          <?php include './api/search.php'; ?>
          Loading items...
        </div>

      </div>
    </div>
  </section>
  <!-- end of items -->

  <!-- Modal buy -->
  <div id="myModalbuy" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between align-items-center">
          <h4 class="modal-title" id="modalItemName">Item Name</h4>
          <button type="button" class="btn btn-close text-dark fw-bold fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body text-center">
          <img id="modalItemImage" src="" alt="Item Image" class="img-fluid rounded mb-3" style="max-height: 150px;">
          <p id="modalItemDescription"></p>
          <h5 id="modalItemPrice" class="text-primary font-weight-bold"></h5>

          <label for="modalQuantity">Quantity:</label>
          <input type="number" id="modalQuantity" class="form-control w-50 mx-auto" value="1" min="1">
        </div>

        <div class="modal-footer d-flex justify-content-between align-items-center">
          <div>
            <span class="text-muted text-success" id="modalusername">
              <?= htmlspecialchars($_SESSION['username']) ?>
            </span>
          </div>
          <div>
            <button type="button" class="btn btn-success" id="confirmBuy">Confirm Buy</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelButton">Cancel</button>
          </div>
        </div>

      </div>
    </div>
  </div>




  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="script.js"></script>




  <script>
    $(document).ready(function() {
      // 🔍 Function to fetch results
      function fetchMenu() {
        const search = $("#searchInput").val();
        const category = $("#categorySelect").val();


        $.ajax({
          url: "./api/search.php",
          method: "get",
          data: {
            search,
            category: $("#categorySelect").val()
          },
          beforeSend: function() {
            $("#menuContainer").html("<p class='text-center text-muted'>Loading...</p>");
          },
          success: function(data) {
            $("#menuContainer").html(data);
          },
          error: function() {
            $("#menuContainer").html("<p class='text-danger text-center'>Failed to load items.</p>");
          }
        });
      }

      // 🧭 Real-time search and category change
      $("#searchInput").on("input", fetchMenu);
      $("#categorySelect").on("change", fetchMenu);
    });
  </script>

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

</html>