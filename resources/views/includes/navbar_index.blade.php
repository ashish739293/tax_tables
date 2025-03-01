<!-- Navbar Start -->
<header id="navbar">
    <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top custom-navbar">
        <div class="container-fluid px-xl-5">
            <!-- Logo -->
            <a href="/" class="navbar-brand text-uppercase font-weight-bold">
                <span class="text-primary"><img src="https://taxtablet.in/wp-content/uploads/2024/05/cropped-image-removebg-preview-65.png" height="40"/></span>
            </a>

            <!-- Navbar Toggler -->
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a href="/shop" class="nav-link dropdown-toggle" id="shopDropdown" role="button" data-toggle="dropdown">Account</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Login</a>
                            <a class="dropdown-item" href="#">Password Reset</a>
                            <a class="dropdown-item" href="#">My Invoice</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="/blogs" class="nav-link">Blogs</a></li>
                    @auth
                    <li class="nav-item"><a href="/profile" class="nav-link">Profile</a></li>
                    <li class="nav-item"><a href="/logout" class="nav-link btn btn-danger text-light mx-2 rounded-pill">Logout</a></li>
                    @else
                    <!-- <li class="nav-item"><a href="/login" class="nav-link btn btn-outline-primary mx-2 rounded-pill">Login</a></li> -->
                    <li class="nav-item"><a href="/register" class="nav-link btn btn-primary text-light mx-2 rounded-pill">Appointment</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Navbar End -->

<!-- Banner Start -->
<!-- Show Banner Only on Home Page -->
@if(Request::is('/')) 
    @include('includes.banner')
@endif

<!-- Banner End -->

<style>
/* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Default Transparent Navbar */
.navbar {
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  z-index: 1000;
  background: transparent;
  transition: background 0.3s ease-in-out, padding 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Navbar Links - Default (White Text) */
.navbar-nav .nav-item .nav-link {
  color: white !important;
  transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
  padding: 10px 20px;
  border-radius: 5px;
}

/* Navbar Scroll Effect */
.navbar.scrolled {
  background: white;
  padding: 10px 0;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Navbar Links - After Scrolling (Black Text) */
.navbar.scrolled .nav-item .nav-link {
  color: black !important;
}

/* Navbar Menu Hover Effect */
.navbar-nav .nav-item .nav-link:hover {
  background: rgba(0, 0, 0, 0.1);
  color: #ff6b6b !important;
}

/* Banner Section - Increased Height */
.carousel-item {
  height: 700px; /* Increased height */
}

.carousel-caption {
  background: rgba(0, 0, 0, 0.5);
  border-radius: 10px;
  padding: 20px;
}

/* Login/Register Buttons */
.btn-login,
.btn-register {
  background: linear-gradient(45deg, #ff6b6b, #ffcc00);
  color: white !important;
  padding: 10px 15px;
  border-radius: 25px;
  transition: 0.3s ease-in-out;
  border: none;
}

.btn-login:hover,
.btn-register:hover {
  background: linear-gradient(45deg, #ffcc00, #ff6b6b);
  transform: scale(1.1);
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

/* Responsive Navbar */
@media (max-width: 992px) {
    .navbar-nav {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        padding: 10px;
        text-align: center;
    }
}
</style>

<script>
window.addEventListener("scroll", function () {
  let navbar = document.querySelector(".navbar");
  if (window.scrollY > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});


</script>
