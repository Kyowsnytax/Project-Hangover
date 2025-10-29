// Select elements
const menuToggle = document.getElementById('menuToggle');
const mobileMenu = document.getElementById('mobileMenu');
const closeMenu = document.getElementById('closeMenu');

// Open menu
menuToggle.addEventListener('click', () => {
  mobileMenu.classList.add('active');
});

// Close menu
closeMenu.addEventListener('click', () => {
  mobileMenu.classList.remove('active');
});

// Optional: close when clicking a link
document.querySelectorAll('.mobile-nav-links a').forEach(link => {
  link.addEventListener('click', () => {
    mobileMenu.classList.remove('active');
  });
});

// Scroll behavior for navbar (This is the snapping function)
window.addEventListener('scroll', () => {
  const navbar = document.getElementById('navbar');
  if (window.scrollY > 50) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});




