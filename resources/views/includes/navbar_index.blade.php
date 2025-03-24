<!-- Navbar Start -->
<header id="navbar">
    <nav class="navbar navbar-expand-lg navbar-light p-3 fixed-top custom-navbar">
        <div class="container-fluid px-xl-5">
            <!-- Logo -->
            <a href="/" class="navbar-brand text-uppercase font-weight-bold">
                <span class="text-primary">
                    <img src="/image/TabTabletLogo.png" height="40"/>
                </span>
            </a>

            <!-- Navbar Toggler -->
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <ul class="navbar-nav">
                    <!-- Home Menu -->
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>

                    <!-- Services Dropdown -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="servicesDropdown" role="button">Services</a>
                        <div class="dropdown-menu mega-menu p-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="dropdown-header">Accounting Solutions</h6>
                                    <a class="dropdown-item" href="#">Accounting Outsourcing</a>
                                    <a class="dropdown-item" href="#">Accounts Payable</a>
                                    <a class="dropdown-item" href="#">Accounts Receivable</a>
                                    <a class="dropdown-item" href="#">Financial Reporting</a>
                                    <a class="dropdown-item" href="#">Payroll Outsourcing</a>
                                    <a class="dropdown-item" href="#">Invoice Processing</a>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="dropdown-header">Software Expertise</h6>
                                    <a class="dropdown-item" href="#">QuickBooks Accounting</a>
                                    <a class="dropdown-item" href="#">Xero Accounting</a>
                                    <a class="dropdown-item" href="#">Zoho Books Accounting</a>
                                    <a class="dropdown-item" href="#">Tally Accounting</a>
                                    <a class="dropdown-item" href="#">MS Dynamics Accounting</a>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="dropdown-header">Accounting For</h6>
                                    <a class="dropdown-item" href="#">Ecommerce</a>
                                    <a class="dropdown-item" href="#">Healthcare</a>
                                    <a class="dropdown-item" href="#">Hospitality</a>
                                    <a class="dropdown-item" href="#">Legal</a>
                                    <a class="dropdown-item" href="#">Media & Marketing</a>
                                    <a class="dropdown-item" href="#">Real Estate</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Virtual Account Menu -->
                    <li class="nav-item">
                        <a href="/" class="nav-link">Virtual Account</a>
                    </li>

                    <!-- Contact Menu -->
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>

                    <!-- Blogs Menu -->
                    <li class="nav-item">
                        <a href="/blog" class="nav-link">Blogs</a>
                    </li>

                    <!-- Blogs Menu -->
                    <li class="nav-item">
                        <a href="/about" class="nav-link">About</a>
                    </li>

                    <!-- Account Dropdown -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="shopDropdown" role="button">Account</a>
                        <div class="dropdown-menu">
                            @auth 
                             <a href="/logout" class="dropdown-item">Logout</a>
                            @else
                            <a class="dropdown-item" href="/login">Login</a>
                            @endauth
                            <a class="dropdown-item" href="/invoices">My Invoice</a>
                            <a class="dropdown-item" href="/subscriptions">My Subscriptions</a>
                            <a class="dropdown-item" href="/payment-confirmation">Payment Confirmation</a>
                            <a class="dropdown-item" href="/contact">Contact</a>
                        </div>
                    </li>

                    <!-- Profile Menu with Authentication -->
                    @auth
                    <li class="nav-item">
                        <a href="/profile" class="nav-link">Profile</a>
                    </li>

                    <!-- Appointment Menu -->
                    @else
                    <li class="nav-item">
                        <a href="https://wa.link/z5h1qf" class="nav-link btn text-light mx-2 rounded-pill" style="background: #05d69f;">Appointment</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Navbar End -->

<!-- Banner Start -->
@if(Request::is('/'))
@include('includes.banner')
@endif
<!-- Banner End -->

<style>
/* General Reset */
.navbar {
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000;
    background: transparent;
    transition: background 0.3s ease, padding 0.3s ease, box-shadow 0.3s ease;
}

.navbar.scrolled {
    background: white;
    padding: 6px 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    height: 65px;
}

.navbar .nav-link {
    color: white !important;
    transition: color 0.3s ease;
}

.navbar.scrolled .nav-link {
    color: black !important;
}

.navbar-nav .dropdown-menu {
    display: none;
    position: absolute;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.3s ease-in-out;
}

.nav-item.dropdown:hover .dropdown-menu {
    display: block;
}


/* Services Dropdown CSS */
.mega-menu {
    width: 620px;
    background: white;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.mega-menu .row {
    width: 100%;
    margin: 0;
    margin-right:30px;
}

.mega-menu .dropdown-header {
    font-weight: bold;
    color: #333;
}

.mega-menu .dropdown-item {
    padding: 5px 15px;
}

.mega-menu .dropdown-item:hover {
    background-color: rgba(6, 85, 46, 0.1);
    border-radius: 5px;
}

/* General dropdown styles */
.navbar-nav .dropdown-menu {
    display: none; /* Ensure it's hidden initially */
    position: absolute;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.3s ease-in-out;
}

/* Show only the hovered dropdown */
.nav-item.dropdown:hover > .dropdown-menu {
    display: block;
}

/* Mobile menu styles */
@media (max-width: 992px) {
    .navbar-nav {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        text-align: center;
        padding: 10px;
    }

    .nav-item.dropdown:hover .dropdown-menu {
        display: none;
    }
    .nav-item.dropdown.show .dropdown-menu {
        display: block;
    }

    .dropdown-menu {
        position: static;
        width: 100%;
        text-align: center;
    }

    .navbar-nav .dropdown-menu {
        display: none;
        position: static;
        width: 100%;
        text-align: center;
    }

    .nav-item.dropdown.show .dropdown-menu {
        display: block;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.navbar-nav .nav-link:hover {
    color:rgb(19, 14, 14) !important;
    background: rgba(6, 85, 46, 0.1);
    border-radius : 15px;
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

// Navbar Dropdown Fix for Mobile & Desktop
document.addEventListener("DOMContentLoaded", function () {
    let accountDropdown = document.getElementById("shopDropdown");
    let dropdownMenu = accountDropdown.nextElementSibling;

    function closeAllDropdowns() {
        document.querySelectorAll(".dropdown-menu").forEach(menu => {
            menu.style.display = "none";
        });
    }

    // Hover functionality for desktop
    if (window.innerWidth > 992) {
        document.querySelector(".nav-item.dropdown").addEventListener("mouseenter", function () {
            dropdownMenu.style.display = "block";
        });

        document.querySelector(".nav-item.dropdown").addEventListener("mouseleave", function () {
            dropdownMenu.style.display = "none";
        });
    }

    // Click functionality for mobile
    accountDropdown.addEventListener("click", function (e) {
        if (window.innerWidth <= 992) {
            e.preventDefault();
            if (dropdownMenu.style.display === "block") {
                dropdownMenu.style.display = "none";
            } else {
                closeAllDropdowns(); // Close other dropdowns
                dropdownMenu.style.display = "block";
            }
        }
    });

    // Close dropdowns when clicking outside
    document.addEventListener("click", function (e) {
        if (!e.target.closest(".nav-item.dropdown")) {
            closeAllDropdowns();
        }
    });
});

// Handle Services Dropdown by JS
document.addEventListener("DOMContentLoaded", function () {
    let dropdowns = document.querySelectorAll(".nav-item.dropdown");

    dropdowns.forEach(dropdown => {
        let dropdownToggle = dropdown.querySelector(".nav-link.dropdown-toggle");
        let dropdownMenu = dropdown.querySelector(".dropdown-menu");

        // Desktop hover effect (prevent multiple dropdowns opening)
        if (window.innerWidth > 992) {
            dropdown.addEventListener("mouseenter", function () {
                closeAllDropdowns();
                dropdownMenu.style.display = "block";
            });

            dropdown.addEventListener("mouseleave", function () {
                dropdownMenu.style.display = "none";
            });
        }

        // Mobile click effect
        dropdownToggle.addEventListener("click", function (e) {
            if (window.innerWidth <= 992) {
                e.preventDefault();
                let isOpen = dropdown.classList.contains("show");

                // Close all other dropdowns first
                closeAllDropdowns();

                // Toggle the clicked dropdown
                if (!isOpen) {
                    dropdown.classList.add("show");
                    dropdownMenu.style.display = "block";
                }
            }
        });
    });

    // Close all dropdowns when clicking outside
    document.addEventListener("click", function (e) {
        if (!e.target.closest(".nav-item.dropdown")) {
            closeAllDropdowns();
        }
    });

    function closeAllDropdowns() {
        document.querySelectorAll(".nav-item.dropdown").forEach(dropdown => {
            dropdown.classList.remove("show");
            let menu = dropdown.querySelector(".dropdown-menu");
            if (menu) {
                menu.style.display = "none";
            }
        });
    }
});

// Logout with AJAX
$(document).ready(function () {
    $('#logoutBtn').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "/logout",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                showToast('success', response.message);
                window.location.href = "/login";
            },
            error: function () {
                alert("Logout failed. Try again!");
            }
        });
    });
});
</script>
