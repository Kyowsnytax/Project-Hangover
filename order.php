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
  <script defer src="sidebar.js" ></script>
  <script defer src="modal_script.js "></script>
  <style>

/* --- Define Color Variables --- */
:root {
  --ho-red: #D22B2B;        
  --ho-red-hover: #A31F1F;
  --ho-gold: #FFC300;       
  --ho-dark: #1A1A1A;       
}

body {
  background-image: url("./Images/loc1.png");
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-color: #333333; 
}



/* --- Search Bar and Category Dropdown Styling --- */

/* Targets the text input field */
.form-control {
    /* Set dark background */
    background-color: var(--ho-dark) !important; 
    
    /* Change text to white for visibility */
    color: white !important; 
    
    /* Gold border to match the neon theme */
    border: 1px solid var(--ho-gold) !important;
    
    /* Ensure the focus state is also gold */
    box-shadow: none !important;
}

/* Ensure placeholder text is visible but subtle */
.form-control::placeholder {
    color: rgba(255, 255, 255, 0.5) !important; /* Subtle gray placeholder */
}

/* Targets the Category Dropdown (which often uses .form-select or .form-control) */
.form-select {
    /* Set dark background */
    background-color: var(--ho-dark) !important;
    
    /* Change text to white/gold */
    color: white !important; 
    
    /* Gold border to match the theme */
    border: 1px solid var(--ho-gold) !important;
    
    /* Change the dropdown arrow color (Bootstrap uses a background image for this) */
    /* This uses an SVG icon colored white/gold */
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23FFC300' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e") !important;
    
    /* Ensure the focus state is also gold */
    box-shadow: none !important;
}

/* Focus State: Gold Glow */
.form-control:focus, .form-select:focus {
    /* Use the gold color for the subtle glow when active */
    border-color: var(--ho-gold) !important;
    box-shadow: 0 0 0 0.25rem rgba(255, 195, 0, 0.5) !important; /* Gold glow effect */
}

/* --- Menu Card Specific Styles (To Contain Content) --- */

.menu-card-dark-fit {
    /* 🛑 FIX: Define a background color so the container is visible */
    background-color: var(--ho-dark) !important; /* Should be #1A1A1A */
    
    /* 🛑 FIX: Define the subtle border for the edge effect shown in Image 1 */
    border: 1px solid rgba(255, 255, 255, 0.1) !important; 
    
    /* Define rounded corners */
    border-radius: 0.5rem; 
    
    /* Ensure internal padding is present (from the HTML class p-2) */
    /* If p-2 wasn't enough, you can add more padding here: */
    /* padding: 1rem !important; */
    
    /* Ensure it has a margin to separate cards */
    /* margin-bottom: 1.5rem; */ 
    
    /* Remove any shadow */
    box-shadow: none !important; 
}

/* New style for the menu card on a dark page */
.menu-card-light {
  background-color: white !important; /* Ensure the card is white */
  border: 1px solid rgba(0, 0, 0, 0.1) !important; /* Optional: subtle light gray border */
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important; /* Optional: light shadow */
  padding: 1.5rem !important; 
  margin-bottom: 1.5rem;
  border-radius: 0.5rem; /* Round the corners */
}

/* Price - Gold, high contrast */
.item-price {
  font-weight: bold;
  color: var(--ho-gold) !important; /* Ensure gold color */
}

/* Category - Gold, high contrast */
.item-category {
  font-size: 1rem !important;
  color: var(--ho-gold) !important; /* Ensure gold color */
  margin-top: 0.25rem; 
}

/* --- Button Styling --- */

/* Primary "Buy" button (Solid Red) */
.custom-buy-btn {
  background-color: var(--ho-red) !important;
  border: 1px solid var(--ho-red) !important; 
  color: white !important; 
  font-weight: 600;
  padding: 0.6rem 1.5rem; 
  border-radius: 0.3rem; 
  width: 100%; /* Ensure full width */
}

.custom-buy-btn:hover {
  background-color: var(--ho-red-hover) !important;
  border-color: var(--ho-red-hover) !important;
}

/* "Add to list" button (Outline Gold) */
.custom-add-to-list-btn {
  background-color: transparent !important;
  border: 1px solid var(--ho-gold) !important; 
  color: var(--ho-gold) !important;
  font-weight: 600;
  padding: 0.6rem 1.5rem;
  border-radius: 0.3rem;
  width: 100%; /* Ensure full width */
}

.custom-add-to-list-btn:hover {
  background-color: rgba(255, 195, 0, 0.1) !important; 
  color: var(--ho-gold) !important; /* Ensure text remains gold on hover */
}

/* Sidebar styling */
#sidebar {
    position: fixed;
    top: 0;
    right: -300px;
    width: 300px;
    height: 100%;
    
    /* ⚡ THEME: Dark background */
    background-color: var(--ho-dark); /* #1A1A1A */
    color: var(--ho-light); 
    
    /* ⚡ THEME: Neon-like shadow with gold edge */
    box-shadow: -4px 0 15px rgba(0, 0, 0, 0.7), -1px 0 0 var(--ho-gold);
    
    transition: right 0.3s ease;
    z-index: 1051;
    padding: 20px;
    
    /* Enables scrolling list while keeping header/footer fixed */
    display: flex;
    flex-direction: column; 
}

.sidebar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    /* ⚡ THEME: Gold header text */
    color: var(--ho-gold); 
}

/* Make the close button white/light on the dark background */
.sidebar-header .btn-close {
    filter: invert(1) grayscale(100%) brightness(200%); 
}

/* Scrollable Content Area */
#orderList {
    flex-grow: 1; 
    overflow-y: auto;
    margin-bottom: 1rem;
    padding-right: 5px; 
}

/* Sidebar Footer (Total area) */
.sidebar-footer {
    padding-top: 1rem !important;
    margin-top: auto !important; 
    /* ⚡ THEME: Gold border and Gold text */
    border-top: 2px solid var(--ho-gold) !important;
    font-size: 1.2rem;
    font-weight: bold;
    color: var(--ho-gold);
}

/* Total Amount Number */
#orderTotal {
    color: var(--ho-red); /* Use Red to highlight the final amount */
    margin-left: 0.5rem;
}

/* Username */
#sidebarUsername {
    color: var(--ho-red) !important; 
    font-style: italic;
    font-size: 0.9rem;
    display: block;
    margin-top: 5px;
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
    background: rgba(0, 0, 0, 0.8); /* Darker overlay for better focus */
    display: none;
    z-index: 1050;
}
#overlay.active{
  display: block;
}

/* Floating button */
#toggleSidebar {
    position: fixed;
    width: 4rem; /* Adjusted size */
    height: 4rem;
    bottom: 35px;
    right: 40px;
    z-index: 1100;
    
    /* ⚡ THEME: Red button with Gold neon glow */
    background-color: var(--ho-red) !important;
    border: 3px solid var(--ho-gold) !important;
    box-shadow: 0 0 10px var(--ho-gold), 0 0 20px var(--ho-red) !important; 
    transition: all 0.3s ease;
}

#toggleSidebar:hover {
    background-color: var(--ho-red-hover) !important;
    border-color: var(--ho-gold) !important;
    transform: scale(1.05);
}
</style>

</head>

<body style="min-height:100vh; display:flex; flex-direction:column; justify-content:space-between;">


  <!-- Overlay -->
  <div id="overlay"></div>

  <!-- Floating Button -->
  <button id="toggleSidebar" class="btn btn-primary rounded-circle p-3 d-flex align-items-center justify-content-center">
    <i class="bi bi-cart-check fs-3"></i>
  </button>




  <!-- Sidebar -->
  <div id="sidebar">
    <div class="sidebar-header">
      <h5>Your Orders</h5>
      <button type="button" class="btn-close " id="closeSidebar"></button>
    </div>

    <div id="orderList" class="sidebar-content">

      <p class="text-muted placeholder-text">No Items Added yet!</p>
      
    </div>

    <div class="sidebar-footer border-top mt-2 pt-2 text-end">
      Total: ₱<span id="orderTotal">0</span>
    </div>
    <span class="fst-italic fs-6">Account: </span><span id="sidebarUsername" class="text-info fs-6"><?= htmlspecialchars($_SESSION['username']) ?></span>
    <div class="d-flex justify-content-between mt-3">
      <button id="cancelOrders" class="btn btn-danger btn-sm w-50 me-2">Remove All</button>

      <button id="confirmOrders" class="btn btn-success btn-sm w-50">Confirm</button>
    </div>
  </div>



<script>
  //WAG NA WAG MONG TATANGALIN TONG SCRIPT NATO HINDI MA TOGGLE-TOGGLE YUNG FLOATING BUTTON PAG WALA ITO DINE  AHAHHA
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
        <div id="menuContainer" class="col-md-10 text-muted"></div>


      </div>
    </div>
  </section>
  <!-- end of items -->

  <!-- Modal buy -->
  <div id="myModalbuy" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div  class="modal-dialog">
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

        <div class="modal-footer d-flex  align-items-center">
        
            <span class="d-none" id="modalusername">
              <?= htmlspecialchars($_SESSION['username']) ?>
            </span>
            <button type="button" class="btn btn-success" id="confirmBuy">Confirm Buy</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelButton">Cancel</button>
          
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

     <div id="orderSuccessToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body fw-bold">
        <i class="bi bi-check-circle-fill me-2"></i> All orders have been recorded successfully!
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>

  </div>



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