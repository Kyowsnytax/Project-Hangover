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

    // // --- TOAST HELPER FUNCTION (TIMER REMOVED) ---
    // function showLoginToastAndRedirect() {
    //     const loginToastElement = document.getElementById('loginToast');
        
    //     // 1. Show the toast
    //     if (loginToastElement && window.bootstrap && window.bootstrap.Toast) {
    //         const toast = new bootstrap.Toast(loginToastElement);
    //         toast.show();
    //     }
        
    //     // 2. Check if redirection is needed
    //     const currentPath = window.location.pathname.split('/').pop();
        
    //     // Target page is account.php. If we are ALREADY there, do nothing after the toast.
    //     if (currentPath === 'account.php' || currentPath === 'register.php') {
    //          // Do not redirect, just let the toast disappear
    //          return; 
    //     }

    //     // 3. Immediate redirection (TIMER REMOVED)
    //     // Note: The toast may close itself before the user sees the page switch.
    //     window.location.href = 'account.php';
    // }


  
})