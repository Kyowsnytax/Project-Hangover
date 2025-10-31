

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hang Over</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style6.css">

  <meta charset="utf-8">
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
          <li class="nav-item"><a class="nav-link px-3" href="home.html"><i class="bi bi-house-door"></i> Home</a></li>
          <li class="nav-item"><a class="nav-link px-3" href="about.html"><i class="bi bi-truck"></i> About</a></li>
          <li class="nav-item"><a class="nav-link px-3" href="location.html"><i class="bi bi-geo-alt"></i> Location</a></li>
          <li class="nav-item"><a class="nav-link px-3" href="menu.php"><i class="bi bi-egg-fried"></i> Menu</a></li>
          <li class="nav-item"><a class="nav-link px-3" href="order.php"><i class="bi bi-cart-check"></i> Order</a></li>
          <li class="nav-item" id="navbarAccountLink"><a class="nav-link px-3" href="account.php"><i class="bi bi-person-circle"></i><span id="navbarAccountText">Account</span></a></li>
        </ul>
      </div>
    </div>
  </nav>



  <div id="mobileMenu" class="mobile-menu">
    <button class="close-btn" id="closeMenu">&times;</button>
    <ul class="mobile-nav-links list-unstyled text-center">
      <li><a href="home.html"><i class="bi bi-house-door"></i> Home</a></li>
      <li><a href="about.html"><i class="bi bi-truck"></i> About</a></li>
      <li><a href="location.html"><i class="bi bi-geo-alt"></i> Location</a></li>
      <li><a href="menu.php"><i class="bi bi-egg-fried"></i> Menu</a></li>
      <li><a href="order.php"><i class="bi bi-cart-check"></i> Order</a></li>
      <li><a href="account.php"><i class="bi bi-person-circle"></i> Account</a></li>
    </ul>
  </div>


  <!-- this is the items -->
   <section style="padding-top: 5rem; padding-left: 10rem;">
    <div class="container mt-5 mb-5">
      <div class="d-flex justify-content-center row">

        <!-- 🔎 Search + Category -->
        <div class="container d-flex justify-content-center mb-5 gap-4">
          <input type="search" id="searchInput" class="form-control w-50" placeholder="Search for items...">

          <select id="categorySelect" class="form-select w-auto">
            <option value="all">All Categories</option>
            <option value="burger">Burgers</option>
            <option value="sidedish">Side Dishes</option>
            <option value="kiddiemeal">Kids Meals</option>
            <option value="coffee">Coffee</option>
            <option value="chickenwings">Chicken Wings</option>
            <option value="shakes">Shakes</option>
          </select>
        </div>

        <!-- 📦 Container where search results will load -->
        <div id="menuContainer" class="col-md-10 text-muted">
          Loading items...
        </div>

      </div>
    </div>
  </section>
  <!-- end of items -->




  <footer id="footer">
    <div class="footer-top container d-flex flex-wrap justify-content-between align-items-start">
      <div class="footer-logo-container">
        <img src="Images/GIF LOGO.gif" class="footer-logo" alt="HangOver Logo">
      </div>

      <div class="footer-section menu-section">
        <h5>MENU</h5>
        <ul>
          <li><a href="home.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="location.html">Location</a></li>
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




<!-- Modal buy -->
    <div id="myModalbuy" class="modal fade" role="dialog">
        <div class="modal-dialog">
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

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="confirmBuy">Confirm Buy</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelButton">Cancel</button>
                </div>
            </div>
        </div>
    </div>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="script.js"></script>



  <script>
document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('searchInput');
  const categorySelect = document.getElementById('categorySelect');
  const menuContainer = document.getElementById('menuContainer');

  function fetchResults() {
    const query = searchInput.value;
    const category = categorySelect.value;

    fetch(`./api/search.php?q=${encodeURIComponent(query)}&category=${encodeURIComponent(category)}`)
      .then(res => res.text())
      .then(html => {
        menuContainer.innerHTML = html;
      })
      .catch(err => {
        console.error(err);
        menuContainer.innerHTML = '<p class="text-danger">Error loading results.</p>';
      });
  }

  searchInput.addEventListener('input', fetchResults);
  categorySelect.addEventListener('change', fetchResults);

  // initial load
  fetchResults();



$(document).ready(function () {
  // Handle Buy button click
  $(".buybtn").on("click", function () {
    const name = $(this).data("name");
    const description = $(this).data("description");
    const price = $(this).data("price");
    const image = $(this).data("image");

    // Fill modal
    $("#modalItemName").text(name);
    $("#modalItemDescription").text(description);
    $("#modalItemPrice").text("₱" + parseFloat(price).toFixed(2));
    $("#modalItemImage").attr("src", image);
    $("#modalQuantity").val(1);

    // Update price dynamically
    $("#modalQuantity")
      .off("input")
      .on("input", function () {
        const qty = $(this).val();
        const totalPrice = parseFloat(price) * parseInt(qty);
        $("#modalItemPrice").text("₱" + totalPrice.toFixed(2));
      });
  });

  // Confirm Buy
  $("#confirmBuy").on("click", function () {
    const modal = $("#myModalbuy");
    const modalBody = modal.find(".modal-body");
    const modalFooter = modal.find(".modal-footer");

    const originalBody = modalBody.html();
    modalFooter.hide();
    modalBody.html('<h4 class="text-center text-success">Order Confirmed!</h4>');

    setTimeout(() => {
      modal.modal("hide");
      modalBody.html(originalBody);
      modalFooter.show();
      location.reload();
    }, 1500);
  });

  // Cancel Buy
  $("#cancelButton").on("click", function () {
    $("#myModalbuy").modal("hide");
  });
});

</script>

</body>

</html>