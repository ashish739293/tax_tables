@include('includes.head', ['title' => 'Reset Password'])
@include('includes.navbar_index')

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="row w-100" style="max-width: 900px; gap: 30px;">
        <!-- Image Column -->
        <div class="col-md-5 d-flex align-items-center justify-content-center">
            <img src="image/forget_password.png" alt="Forgot Password" class="img-fluid" style="max-width: 100%; border-radius: 12px;">
        </div>
        
        <!-- Form Column -->
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center p-4 shadow-lg bg-white rounded">
            <h2 class="fw-bold text-left mb-3">Reset Password</h2>
            <p class="text-muted">Enter your new password below.</p>

            <form method="POST" action="{{ route('password.update') }}" class="w-100">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary text-white"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="New Password" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-success text-white"><i class="fas fa-check"></i></span>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
            </form>
        </div>
    </div>
</div>

<style>
body {
    background: linear-gradient(135deg, #f4f4f4, #d3d3d3);
}

button.btn-gradient:hover {
    opacity: 0.9;
    transform: scale(1.05);
}
.input-group-text {
    border: none;
    border-radius: 8px 0 0 8px;
}
.form-control {
    border-radius: 0 8px 8px 0;
}
.row {
    display: flex;
    justify-content: space-between;
}
.shadow-lg {
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}
</style>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
