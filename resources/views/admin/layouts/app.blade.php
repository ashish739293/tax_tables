<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { display: flex; min-height: 100vh; overflow-x: hidden; }
        
        /* Sidebar Styles */
        .sidebar { 
            width: 250px; 
            height: 100vh; 
            padding: 20px; 
            position: fixed; 
            transition: 0.3s; 
            background-color: #f8f9fa;
            z-index: 1000;
            top: 0; 
            left: -250px; /* Initially hidden on mobile */
        }

        .sidebar.open { 
            left: 0; /* Sidebar visible when open */
        }

        .sidebar a { 
            display: flex; 
            align-items: center; 
            text-decoration: none; 
            color: black; 
            padding: 12px; 
            transition: 0.3s; 
        }

        .sidebar a:hover, .sidebar a.active { 
            background: #374151; 
            border-radius: 5px; 
            color: white; 
        }

        .sidebar i { margin-right: 10px; }
        
        /* Close Button Inside Sidebar */
        .sidebar .close-btn { 
            position: absolute; 
            top: 10px; 
            right: 10px; 
            background: transparent; 
            border: none; 
            font-size: 20px; 
            color: #333;
        }

        /* Main Content */
        .main-content { 
            margin-left: 250px; 
            width: 100%; 
            padding: 20px; 
            transition: 0.3s; 
            background: #ebe7e2; 
        }

        .top-navbar { 
            background: white; 
            padding: 10px 20px; 
            display: flex; 
            justify-content: space-between; 
            box-shadow: 0px 3px 5px rgba(0,0,0,0.1); 
        }

        .dropdown-menu { right: 10px; left: auto !important; }
        
        /* Mobile View Adjustments */
        @media (max-width: 768px) {
            .sidebar { 
                position: fixed; 
                top: 0;
                left: -250px; 
                height: 100%; 
                width: 250px; 
                transition: 0.3s;
            }

            .sidebar.open { 
                left: 0; /* Show when open */
            }

            .main-content { 
                margin-left: 0; 
            }

            .toggle-btn {
                display: block;
            }

            /* Close button only visible in mobile when sidebar is open */
            .sidebar.open .close-btn {
                display: block;
            }

            /* Initially hide the close button */
            .sidebar .close-btn {
                display: none;
            }
        }

        /* Desktop View Adjustments */
        @media (min-width: 769px) {
            .sidebar {
                left: 0 !important; /* Always visible */
            }

            .main-content {
                margin-left: 250px;
            }

            .toggle-btn {
                display: block; /* Always show toggle button on desktop */
            }

            .sidebar .close-btn {
                display: none; /* Hide close button on desktop */
            }
        }
    </style>
    @yield('head')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <button class="btn close-btn" id="closeSidebar"><i class="fas fa-times"></i></button>
        <h4 class="mb-4"><i class="fab fa-laravel"></i> Admin Panel</h4>
        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="/appointments" class="{{ request()->is('appointments') ? 'active' : '' }}"><i class="fas fa-calendar-check"></i> Appointments</a>
        <a href="/services" class="{{ request()->is('services') ? 'active' : '' }}"><i class="fas fa-cogs"></i> Services</a>
        <a href="/income_details" class="{{ request()->is('income-data') ? 'active' : '' }}"><i class="fas fa-wallet"></i> Income Details</a>
        <a href="/blogs" class="{{ request()->is('blogs') ? 'active' : '' }}"><i class="fas fa-cogs"></i> Blogs</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar with Toggle Button for Mobile and Desktop -->
        <div class="top-navbar d-flex align-items-center">
            <button class="btn btn-light d-lg-none toggle-btn" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <h2>@yield('title')</h2>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle"></i> Admin
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="container mt-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>  
    <script>
        // JavaScript to toggle sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.querySelector('.sidebar').classList.toggle('open');
        });

        // JavaScript to close sidebar from within the sidebar (for mobile view)
        document.getElementById('closeSidebar').addEventListener('click', function () {
            document.querySelector('.sidebar').classList.remove('open');
        });
    </script>

    @stack('scripts')
</body>
</html>
