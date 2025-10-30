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

    // --- TOAST HELPER FUNCTION (TIMER REMOVED) ---
    function showLoginToastAndRedirect() {
        const loginToastElement = document.getElementById('loginToast');
        
        // 1. Show the toast
        if (loginToastElement && window.bootstrap && window.bootstrap.Toast) {
            const toast = new bootstrap.Toast(loginToastElement);
            toast.show();
        }
        
        // 2. Check if redirection is needed
        const currentPath = window.location.pathname.split('/').pop();
        
        // Target page is account.html. If we are ALREADY there, do nothing after the toast.
        if (currentPath === 'account.html' || currentPath === 'register.html') {
             // Do not redirect, just let the toast disappear
             return; 
        }

        // 3. Immediate redirection (TIMER REMOVED)
        // Note: The toast may close itself before the user sees the page switch.
        window.location.href = 'account.html';
    }


    // --- DYNAMIC LOGIN/ACCOUNT LOGIC ---
    
    const loginContainer = document.getElementById('loginContainer');
    const navbarAccountText = document.getElementById('navbarAccountText');
    const defaultUsername = "Guest"; 
    
    // Check if the current page's initial form is the register form
    const isRegisterPage = document.getElementById('registerForm') !== null;
    
    // --- HTML Templates (Forms) ---
    const loginFormTemplate = (defaultUser) => `
 
        <h1 class="login-title text-center mb-1"><i class="bi bi-box-arrow-in-right me-2"></i>Log In</h1>
        <a href="register.html" class="account-question-btn text-center mb-4 text-decoration-none d-block">
          <small>Need an account? <b>Create an Account</b></small>
        </a>
        <form id="loginForm" class="login-form" method="POST" action="api/fetch_login.php">
          <div class="input-group mb-3">
            <input type="text" id="loginusername" name="username" placeholder="Username" class="form-control input-field" value="${defaultUser === 'Guest' ? '' : defaultUser}">
          </div>
          <div class="input-group mb-3 position-relative">
            <input type="password" id="loginpassword" name="password" placeholder="Password" class="form-control input-field password-field">
            <span class="password-toggle position-absolute top-50 end-0 translate-middle-y me-3">
              <i class="bi bi-eye-slash"></i>
            </span>
          </div>
          <button type="submit" class="sign-in-button w-100 btn btn-primary mt-3 mb-3 fw-bold">SIGN IN</button>
        </form>
    `;

    const registerFormTemplate = () => `
        <h1 class="login-title text-center mb-1 bi bi-person-circle"> Register</h1>
        <a href="account.html" class="account-question-btn text-center mb-4 text-decoration-none d-block">
          <small>Already have an account? Log In</small>
        </a>

        <form id="registerForm" class="login-form"  method="POST" action="api/create_account.php">
          <div class="input-group mb-3">
            <input type="text" id="username" name="registerusername" placeholder="Set Username" class="form-control input-field">
          </div>
          
          <div class="input-group mb-3 position-relative">
            <input type="password" id="password" name="registerpassword" placeholder="Set Password" class="form-control input-field password-field">
            <span class="password-toggle position-absolute top-50 end-0 translate-middle-y me-3">
              <i class="bi bi-eye-slash"></i>
            </span>
          </div>

          <button type="submit" class="sign-in-button w-100 btn btn-primary mt-3 mb-3 fw-bold">SIGN UP</button>
          </form>
    `;

    const accountFormTemplate = (username) => `
        <h1 class="login-title text-center mb-1"><i class="bi bi-person-fill me-2"></i>My Account</h1>
        <p class="text-light text-center mb-5">Welcome back, ${username}!</p>
        <form id="accountForm" class="login-form">
          <div class="input-group mb-4">
            <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
            <input type="text" value="${username}" readonly class="form-control input-field">
          </div>
          <button type="button" id="logoutButton" class="sign-in-button w-100 btn btn-danger fw-bold">LOG OUT</button>
        </form>
    `;
    
    // --- Core Function to Manage State and Handlers (Remains the same) ---

    function manageLoginState() {
        const storedLoginState = sessionStorage.getItem('isLoggedIn');
        const storedUsername = sessionStorage.getItem('currentUsername');
        
        const isLoggedIn = (storedLoginState === 'true' && storedUsername);
        const username = isLoggedIn ? storedUsername : 'Account';

        if (navbarAccountText) {
            navbarAccountText.textContent = username;
        }

        if (loginContainer) {
            
            if (isLoggedIn) {
                loginContainer.innerHTML = accountFormTemplate(storedUsername);
                const logoutButton = document.getElementById('logoutButton');
                if (logoutButton) {
                    logoutButton.addEventListener('click', handleLogout);
                }
                
            } else if (isRegisterPage) {
                loginContainer.innerHTML = registerFormTemplate();
                const registerForm = document.getElementById('registerForm');
                if (registerForm) {
                    registerForm.addEventListener('submit', handleRegister);
                }
                
            } else {
                loginContainer.innerHTML = loginFormTemplate(defaultUsername);
                const loginForm = document.getElementById('loginForm');
                if (loginForm) {
                    loginForm.addEventListener('submit', handleLogin);
                }
            }
        }
    }

    function handleRegister(event) {
        event.preventDefault();
        const inputUsername = document.getElementById('username').value.trim();
        const usernameToUse = inputUsername.length > 0 ? inputUsername : defaultUsername;
        setTimeout(() => {
            sessionStorage.setItem('isLoggedIn', 'true');
            sessionStorage.setItem('currentUsername', usernameToUse);
            manageLoginState(); 
        }, 500);
    }
    
    function handleLogin(event) {
        event.preventDefault();
        const inputUsername = document.getElementById('username').value.trim();
        const usernameToUse = inputUsername.length > 0 ? inputUsername : defaultUsername;
        setTimeout(() => {
            sessionStorage.setItem('isLoggedIn', 'true');
            sessionStorage.setItem('currentUsername', usernameToUse);
            manageLoginState(); 
        }, 500);
    }

    function handleLogout() {
        setTimeout(() => {
            sessionStorage.removeItem('isLoggedIn');
            sessionStorage.removeItem('currentUsername');
            manageLoginState();
        }, 300);
    }
    
    // --- Initialization ---
    manageLoginState();

    // --- Password Toggle Listener ---
    if (loginContainer) {
        loginContainer.addEventListener('click', function(e) {
            if (e.target.closest('.password-toggle')) {
                const toggleSpan = e.target.closest('.password-toggle');
                const passwordInput = toggleSpan.closest('.input-group').querySelector('.password-field');
                const icon = toggleSpan.querySelector('i');

                if (passwordInput && passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                } else if (passwordInput) {
                    passwordInput.type = 'password';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }
            }
        });
    }
    
    // --- Order Page Restriction Handler ---
    const orderLink = document.getElementById('orderLink');

    if (orderLink) {
        orderLink.addEventListener('click', (e) => {
            const isLoggedIn = sessionStorage.getItem('isLoggedIn') === 'true';
            
            if (!isLoggedIn) {
                e.preventDefault();       
                e.stopPropagation();    
                
                // Call the function to show toast and immediately redirect (if not already on login/register page)
                showLoginToastAndRedirect();
                return false;           
            } else {
                // Allow navigation if logged in
                window.location.href = 'order.html';
            }
        });
    }






});

