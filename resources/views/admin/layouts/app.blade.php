<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { display: flex; min-height: 100vh; }
        .sidebar { width: 250px;  color: black; height: 100vh; padding: 20px; position: fixed; transition: 0.3s; }
        .sidebar a { display: flex; align-items: center; text-decoration: none; color: black; padding: 12px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #374151; border-radius: 5px; }
        .sidebar i { margin-right: 10px; }
        .main-content { margin-left: 250px; width: 100%; padding: 20px; transition: 0.3s;background: #ebe7e2; }
        .top-navbar { background: white; padding: 10px 20px; display: flex; justify-content: space-between; box-shadow: 0px 3px 5px rgba(0,0,0,0.1); }
        .dropdown-menu { right: 10px; left: auto !important; }
        @media (max-width: 768px) {
            .sidebar { width: 0; overflow: hidden; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="mb-4"><i class="fab fa-laravel"></i> Admin Panel</h4>
        <a href="/appointments"><i class="fas fa-calendar-check"></i> Appointments</a>
    </div>

    <div class="main-content">
        <div class="top-navbar d-flex align-items-center">
            <h2>Dashboard</h2>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle"></i> Admin
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Log Out</a></li>
                </ul>
            </div>
        </div>

        <div class="container mt-4">
            @yield('content')

            @stack('scripts')

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
