<!doctype html>
<html lang="en">

<head>
    <title>Login/Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="form/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

@include('includes.head', ['title' => 'Login'])
@include('includes.navbar_index')

<body>

<section class="ftco-section">
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100 bg-primary">
        <div class="form-container shadow-lg p-4 rounded-3 bg-white text-center">
            <h2 class="fw-bold form-heading" id="formHeading">Login Form</h2>

            <!-- Toggle Buttons -->
            <div class="toggle-buttons d-flex justify-content-center my-3">
                <button class="btn btn-toggle active me-2" id="loginTab">Login</button>
                <button class="btn btn-toggle" id="signupTab">Signup</button>
            </div>

            <!-- Login Form -->
            <form id="loginForm">
                @csrf
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="login" placeholder="Email or Username" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <a href="/password_reset" class="text-danger d-block text-start">Forgot password?</a>
                <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
            </form>

            <!-- Signup Form -->
            <form id="signupForm" style="display: none;">
                @csrf
                <div class="mb-2">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
                </div>
                <div class="mb-2">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-2">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="mb-2">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn btn-success w-100 mt-3">Register</button>
            </form>

            <p class="text-center mt-3">
                Not a member? <a href="#" class="text-danger" id="toggleSignup">Signup now</a>
            </p>
        </div>
    </div>
</section>

<style>
/* Form Container */
.form-container {
    width: 100%;
    max-width: 400px;
    background: white;
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    margin: 10% auto; /* Default for smaller screens */

}

/* Toggle Buttons */
.btn-toggle {
    flex: 1;
    padding: 10px;
    border: none;
    border-radius: 20px;
    background: #ddd;
    font-weight: bold;
    transition: 0.3s;
}
.btn-toggle.active {
    background: rgb(80, 63, 233);
    color: black;
}

/* Navbar margin fix for small screens */
@media (max-width: 992px) {
    .navbar-nav {
        background: rgba(255, 255, 255, 0.01);
        border-radius: 10px;
        padding: 10px;
        text-align: center;
    }
    .container-fluid {
        padding-top: 60px; /* Prevent overlap with navbar */
    }
    .form-container {
        margin-top: 80px; /* Adjust margin from navbar */
    }
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Toggle between Login & Signup forms
    $("#loginTab").click(function() {
        $("#loginForm").show();
        $("#signupForm").hide();
        $("#formHeading").text("Login Form"); 
        $(this).addClass("active");
        $("#signupTab").removeClass("active");
    });

    $("#signupTab").click(function() {
        $("#loginForm").hide();
        $("#signupForm").show();
        $("#formHeading").text("Registration Form"); 
        $(this).addClass("active");
        $("#loginTab").removeClass("active");
    });

    $("#toggleSignup").click(function(e) {
        e.preventDefault();
        $("#signupTab").click();
    });

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Set CSRF token in AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    // AJAX Login
    $("#loginForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "/signin",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                alert(response.message);
                window.location.href = response.redirect;
            },
            error: function(response) {
                let errorMessage = "Something went wrong";
                if (response.responseJSON && response.responseJSON.message) {
                    errorMessage = response.responseJSON.message;
                }
                alert(errorMessage);
            }
        });
    });

    // AJAX Registration
    $("#signupForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "/register_user",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                alert(response.message);
                $("#loginTab").click();
            },
            error: function(response) {
                let errorMessage = "Something went wrong";
                if (response.responseJSON && response.responseJSON.message) {
                    errorMessage = response.responseJSON.message;
                }
                alert(errorMessage);
            }
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
