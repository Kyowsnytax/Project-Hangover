document.addEventListener('DOMContentLoaded', () => {
    // --- Existing Navbar and Mobile Menu Logic (Retained) ---
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMenu');

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            if (mobileMenu) mobileMenu.classList.add('active');
        });
    }

    if (closeMenu) {
        closeMenu.addEventListener('click', () => {
            if (mobileMenu) mobileMenu.classList.remove('active');
        });
    }

    document.querySelectorAll('.mobile-nav-links a').forEach(link => {
      link.addEventListener('click', () => {
        if (mobileMenu) mobileMenu.classList.remove('active');
      });
    });

    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (navbar) {
            if (window.scrollY > 50) { 
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }
    });

})
document.addEventListener("DOMContentLoaded", () => {
  // Select all toggle icons on the page
  const toggles = document.querySelectorAll(".password-toggle");

  toggles.forEach(toggle => {
    const icon = toggle.querySelector("i");
    const input = toggle.parentElement.querySelector(".password-field");

    if (icon && input) {
      toggle.addEventListener("click", () => {
        const isPassword = input.getAttribute("type") === "password";
        input.setAttribute("type", isPassword ? "text" : "password");

        // Toggle eye icon style
        icon.classList.toggle("bi-eye");
        icon.classList.toggle("bi-eye-slash");
      });
    }
  });
});
